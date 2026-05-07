## Assignment Tracker

Assignment Tracker is web based application for students to manage their assignment. User can add, edit, delete and mark them as complete. Built with Laravel for backend, Bootstrap for responsive user interface and custom CSS for styling.

## Features
- Add new assignments with Course Name, Title, Description and Due Date.
- Edit Existing Assignments.
- Mark Assignmentds as complete or pending
- Responsive Design for both mobile and Desktop

## Tech Stack
- Backend: Laravel
- Frontend: Bootstrap, Blade templates and CSS
- Database: MySQL
- Package Manager: Composer and NPM

## Installation and Setup

1. Clone the Repository
- Open the Terminal or Git bash then run the following command respectively.
- [git clone https://github.com/ridhwaan-art/Assignment-tracker.git]

- [cd Assignment-tracker]

2. Install Dependecies
- Installing PHP dependecies will be done by running the command below. make sure you are within Assignment-tracker directory

- [composer install]

- Install frontend dependecies by running the commmand below
- [npm install]

## Environmental Setup
- Copy the example environment file and generate app key by running the following command in windows. Make sure you're within the Assignment-tracker directory.

1. first run [cp .env.example .env]
2. Then run [php artisan key:generate]


## Database Setup
Update your .env file with your database credentials for example:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Assignment_tracker
DB_USERNAME=root
DB_PASSWORD=[your_password]

- Create the database in MySQL or Xampp named: [assigment_tracker]
- Then run [php artisan migrate] within the Assignment-tracker directory

Compile the Bootstrap and CSS assets by running [npm run dev]


## Run the Application
Start the Laravel development server by running 
[composer run dev or php artisan serve]

Then visit http://localhost:8000 in your browser