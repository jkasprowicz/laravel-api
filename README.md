# Laravel API

## Description
This is a simple Laravel-based API for order management. It allows users to create, view, update, and delete orders.

## Features
- Create an order
- Retrieve all orders
- Retrieve a single order
- Update an order
- Delete an order

## Endpoints
| Method | Endpoint         | Description             |
|--------|------------------|-------------------------|
| GET    | `/api/orders`     | Get all orders          |
| GET    | `/api/orders/{id}`| Get a specific order    |
| POST   | `/api/orders`     | Create a new order      |
| PUT    | `/api/orders/{id}`| Update an existing order|
| DELETE | `/api/orders/{id}`| Delete an order         |

## Setup Instructions
1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/laravel-api.git
   cd laravel-api
