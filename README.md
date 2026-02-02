Online Bank Management System (PHP + MySQL)

A simple web-based banking system built with PHP, MySQL, and Bootstrap 4.
It provides two modules: User and Manager, simulating common online banking operations.

Features

User: Login, account details, balance check, statements, funds transfer, update profile.

Manager: Login, add/manage user accounts.

Setup

Copy the project into htdocs/ (XAMPP) or www/ (WAMP).

Create a database iubat_bank in phpMyAdmin.

Import new.sql to set up schema and demo data.

Open in browser:

User: login.php

Manager: manager_login.php

Demo Accounts

# User → admin123@gmail.com / 1234

# Manager → manager@manager.com / 1234

Database settings are in includes/db_conn.php (default: localhost).