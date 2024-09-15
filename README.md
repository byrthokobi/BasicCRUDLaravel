<h1>Employee Management System by H M Sazzad Quadir</h1>

This is a simple Employee CRUD (Create, Read, Update, Delete) application built using Laravel 11. This application allows you to manage employee records including their picture, email, name, date of birth, and phone number.

<h2>Features</h2>
Add Employee: Add new employee records including picture, email, name, date of birth, and phone number.
View Employees: View a list of all employees with their details.
Edit Employee: Update existing employee information.
Delete Employee: Remove employee records from the system.
Upload Employee Picture: Store and display employee pictures.

<h2>Prerequisites</h2>
PHP >= 8.1
Composer
Laravel 11
A web server (e.g., Apache, Nginx)
MySQL
Installation
Clone the repository


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
Run database migrations

php artisan migrate

php artisan serve

The application will be available at http://localhost:8000.

Usage
To add a new employee, navigate to the 'Add Employee' section and fill in the required details.
To view the list of employees, go to the 'Employees' section.
To edit or delete an employee, use the options available in the employee list.
Screenshots
Include screenshots of your application here to give users a preview of what to expect.

Technologies Used
Laravel 11: PHP Framework for building robust applications.
Bootstrap/Tailwind CSS: For styling and layout (specify which one you used).
MySQL: Database for storing employee records.
Composer: Dependency management.
