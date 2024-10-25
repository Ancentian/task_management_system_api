# Task Management System API

This is a simple RESTful API built with Laravel Lumen for managing tasks. The API supports basic CRUD operations and includes additional features like task filtering, pagination, and search functionality.

## Clone the Application

To clone the application, use the following command:

```bash
git clone https://github.com/Ancentian/task_management_system_api.git
```

## Copy the Application Files to Your Server

After cloning the repository, navigate to the application directory:

```bash
cd task_management_system_api
```

## Install Dependencies

Run the following command to install all dependencies:

```bash
composer install
```

## Start the Application

You can start the application using the built-in PHP server:

```bash
php -S localhost:8000 -t public
```

## Database Connection

### Create a Database

Create a new PostgreSQL database, for example, `task_management_system`.

### Configuration

Add the following configurations to your `.env` file:

```plaintext
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=YOUR_DATABASE_NAME
DB_USERNAME=YOUR_DB_USERNAME
DB_PASSWORD=YOUR_DB_PASSWORD
```

**Note:** Remember to change the respective credentials according to your PostgreSQL setup.

## Run Migrations

To set up your database schema, run the following command:

```bash
php artisan migrate
```

## Populate the Database

To populate your database with initial data, run the following command:

```bash
php artisan db:seed
```

## API Endpoints

- **Create a Task**: `POST /tasks` [Create Task](http://localhost:8000/store)
- **Get All Tasks**: `GET /tasks`   [ALL TASKS](http://localhost:8000/tasks)
- **Get a Specific Task**: `GET /tasks/{id}`    [SHOW TASK](http://localhost:8000/tasks/{id})
- **Update a Task**: `PUT /tasks/{id}`      [UPDATE](http://localhost:8000/update-task/{id})
- **Delete a Task**: `DELETE /tasks/{id}`   [DELETE](http://localhost:8000/delete-task/{id})

1. Create a Task
http://localhost:8000/store

2. Get All Tasks
http://localhost:8000/tasks

3. Get a Specific Task
http://localhost:8000/tasks/{id}

4. Update a Task
http://localhost:8000/update-task/{id}

5. Delete a Task
http://localhost:8000/delete-task/{id}


## Bonus Features

- Task filtering by status and due date.
[SEARCH STATUS & DUE DATE](http://localhost:8000/tasks?status=pending)

- Pagination for the task listing endpoint.
[PAGINATION](http://localhost:8000/tasks?page=1)

- Search functionality to find tasks by title.
[SEARCH TITLE](http://localhost:8000/tasks?title=title)

1. Filter by Status
http://localhost:8000/tasks?status=pending

2. Pagination
http://localhost:8000/tasks?page=1

3. Search Title
http://localhost:8000/tasks?title=title


## Testing the API

You can use tools like [Postman](https://www.postman.com/) to test the API endpoints. Ensure that you set the appropriate request methods and headers when making API calls.

## License
Ancent Mbithi
ancentmbithi8@gmail.com

THANK YOU.
