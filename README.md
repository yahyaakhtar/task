
## Task System 

Task system where you can just create tasks against project  and delete it and drag and drop it to reorder it

## Prerequisites

Before installing the project, ensure you have the following installed on your local machine:

- PHP >= 8.0
- Composer
- MySQL
- Laravel 

## Configure the Environment 
Copy the .env.example file to .env:

Then, open the .env file and configure the following:

DB_CONNECTION: Set this to mysql.

DB_HOST: Set this to 127.0.0.1 or your MySQL server IP.

DB_PORT: The default MySQL port is 3306.

DB_DATABASE: Set this to your database name (e.g., tasks).

DB_USERNAME: Set this to your MySQL username.

DB_PASSWORD: Set this to your MySQL password.

## Generate Application Key

php artisan key:generate

##  Run Migrations

php artisan migrate

##  Run Seeder
Run seeder to input the sample project 

php artisan db:seed --class=ProjectsSeeder


##  Start Laravel 

php artisan serve
