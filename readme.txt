With the link provided; clone the application for the my Github
LINK:https://github.com/Ancentian/task_management_system_api.git

Copy the Application files to Your respective server:

In Terminal navigate to the Application
RUN:
composer install --- to install all dependencies

Start Application
php -S localhost:8000 -t public

DB Connection
Create a database in your Postgres
EG. task_management_system

Add the following configurations to your .env file

NB: REMEMBER TO CHANGE THE RESPECTIVE CREDENTIALS

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=YOUR DATABASE NAME
DB_USERNAME=DB_USERNAME
DB_PASSWORD=DB_PASSWORD

Run migration
php artisan migrate

Top Populate data in database run:
php artisan db:seed

using PostMan You can test the API endpoints

API Endpoints:
Create a Task
• http://localhost:8000/store
Get All Tasks
• http://localhost:8000/tasks
Get a Specific Task
• http://localhost:8000/tasks/{id}
Update a Task
• http://localhost:8000/update-task/{id}
Delete a Task
http://localhost:8000/delete-task/{id}
