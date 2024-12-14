<?php

// app/Http/Controllers/OrderController.php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Get all orders
    public function index()
    {
        $orders = Order::all();
        return response()->json($orders);
    }

    // Get a single order by ID
    public function show($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        return response()->json($order);
    }

    // Create a new order
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'product' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
        ]);

        $order = Order::create($validated);
        return response()->json($order, 201);
    }

    // Update an existing order
    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $validated = $request->validate([
            'customer_name' => 'nullable|string|max:255',
            'product' => 'nullable|string|max:255',
            'quantity' => 'nullable|integer|min:1',
            'total_price' => 'nullable|numeric|min:0',
            'status' => 'nullable|in:pending,shipped,delivered,canceled',
        ]);

        $order->update($validated);
        return response()->json($order);
    }

    // Delete an order
    public function destroy($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $order->delete();
        return response()->json(['message' => 'Order deleted successfully']);
    }
}
