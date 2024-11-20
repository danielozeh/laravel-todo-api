# Laravel To-Do API

## API Documentation


Laravel To-Do API is a RESTful API application designed for managing a simple to-do list. This project provides endpoints to create, retrieve, update, and delete to-do items. It is built using Laravel, adhering to modern development best practices.


## Features

- Create a new to-do item
- Retrieve a specific to-do item
- Update an existing to-do item
- Delete a to-do item
- Pagination
- Sorting
- Filtering


## Prerequisites

- PHP 8.1 or higher
- Composer
- MySQL
- Laravel CLI
- Git
- Postman

## Getting Started

1. Clone the repository 
```
git clone https://github.com/your-username/laravel-todo-api.git
```
2. Navigate to the project directory 
```
cd laravel-todo-api
```
3. Setting up the environment variables
copy the `.env.example` file to `.env` and update the database credentials
```
cp .env.example .env
```
4. Install dependencies
```
composer install
```
5. Create a new database
Create the database (laravel-todo) OR:
```
CREATE DATABASE laravel-todo;
```
6. Run migrations
```
php artisan migrate
```
7. Run the server
```
php artisan serve
```
8. Use Postman to test the API endpoints



## API Endpoints

All API routes are prefixed with `/api/v1`

### Todos

#### Create a new todo
Endpoint: POST `/api/v1/todos`
```
{
    "title": "My first todo",
    "description": "This is a description of my first todo",
    "completed": false
}
```
#### Response
Response: `201 Created`
```
{
    "status": true,
    "message": "Todo created successfully",
    "data": {...}
}
```


#### Get all todos
Endpoint: GET `/api/v1/todos`
Response: `200 OK`
```
{
    "status": true,
    "message": "Todos retrieved successfully",
    "data": {...}
}
```


#### Get a single todo
Endpoint: GET `/api/v1/todos/{id}`
Response: `200 OK`
```
{
    "status": true,
    "message": "Todo retrieved successfully",
    "data": {...}
}
```


#### Update a todo
Endpoint: PUT `/api/v1/todos/{id}`
Response: `200 OK`
```
{
    "status": true,
    "message": "Todo updated successfully",
    "data": {...}
}
```

#### Delete a todo
Endpoint: DELETE `/api/v1/todos/{id}`
Response: `200 OK`
```
{
    "status": true,
    "message": "Todo deleted successfully"
}
```

### Testing the api
You can use Postman to test the API endpoints.
Link to the Postman collection: [Laravel To-Do API](https://documenter.getpostman.com/view/6890514/2sAYBSiCrS)

Using curl:
```
curl -X POST http://localhost:8000/api/v1/todos -H "Content-Type: application/json" -d '{"title": "My first todo", "description": "This is a description of my first todo", "completed": false}'
```


## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Fork the project, create a new branch, make your changes and submit a pull request.
```
git checkout -b feature-name
```
```
git commit -m "Feature name"
```
```
git push origin feature-name
```

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
