# Products, Orders, and Categories Management System

## Requirements
- PHP >= 8.3
- Composer
- MySQL
- laravel 10
## Overview

This project is a Laravel-based application that manages products, orders, and categories. It includes resource controllers for admins to manage products, orders, and categories from a dashboard. Additionally, an API is available for customers to interact with the system. Laravel Sanctum is used for authentication.

## Features

- Admin Dashboard for managing products, orders, and categories
- User authentication and authorization using Laravel Sanctum
- API endpoints for customers
- Middleware to restrict dashboard access to admins only
- Seeders for initial admin user
- Middleware to ensure customers must be logged in to place orders
- Code reusability and modularity through traits

## In order for the project to work 
You need an instruction to migrate tables to the database and create the existing database in File .env
``` php artisan migarte ```
And you need to turn on the Seder in order to create the Admin 
``` php artisan db:seed```
Log in to the site and log in with the administrator account to access the control unit of the online store
We can see Navbar and Sedibar has buttons to go to view the products, items and orders that have been registered by customers and at each order process for the product the quantity of the product decreases.  
The user interface is the API can not create a request until after logging in use for this Laravel Sanctum

## To Open collection 
https://documenter.getpostman.com/view/39062755/2sAY4uCNhQ

## function in ApiController
### 1 ApiResponsetTrait :
 1. . apiResponse: This function formats a consistent JSON response for the API, including data, a message, and an HTTP status code.
 2. . Apivalidation: This function validates the provided data for required fields (name and price). If validation fails, it returns an error response.

### 2 AuthController :
 1. .register: This function handles user registration by validating input, creating a new user, generating an auth token, and returning the user with the token.
 2. .login: This function authenticates a user with provided email and password, returning user data and a success message if credentials are correct, or an error if not.
 3. .logout: This function logs out the authenticated user by revoking all of their tokens and returning a success message.

### 3 ProductController :
 1. .index: Fetches all products along with their categories and returns them in an API response.

 2. .show: Retrieves a single product by its ID along with its categories and returns it in an API response.

 3. .search: Searches for products by name and returns matching products.

### 4 OrderController :
 1. .index: Retrieves all orders for the authenticated user and returns them in an API response.

 2. .store: Creates a new order for a product, decreases the product's quantity, and returns the created order in an API response.

 3. .create: Retrieves all products and returns them in an API response.

 4. .update: Updates an existing order with a new product ID and returns the updated order in an API response.

 5. .show: Retrieves a specific order by its ID and returns it in an API response.

 6. .destroy: Deletes an existing order by its ID and returns a success message in an API response.

