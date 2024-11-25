Berikut adalah contoh teks README untuk project **ToDoList API** yang dibuat menggunakan **Laravel** dan **Tailwind CSS**:

---

# ToDoList API - Laravel & Tailwind CSS

This project is a simple To-Do List API built with **Laravel** and styled with **Tailwind CSS**. It allows users to manage tasks, providing endpoints for creating, reading, updating, and deleting tasks.

## Features

- CRUD operations for tasks (Create, Read, Update, Delete)
- API documentation for ease of use

## Prerequisites

- PHP >= 11.0
- Composer
- MySQL or any database supported by Laravel
- Node.js & npm (for Tailwind CSS)
- Postman or any API testing tool

## Installation

### 1. Clone the repository

```bash
git clone https://github.com/Zan-Dev/Todolist_API.git
cd Todolist_API
```

### 2. Install dependencies

Run the following commands to install PHP and Node.js dependencies:

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies for Tailwind CSS
npm install
```

### 3. Configure the environment

Create a `.env` file by copying from the provided `.env.example`:

```bash
cp .env.example .env
```

Update the `.env` file with your database and other configurations.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_todolist
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Migrate the database

Run the migration to set up the database:

```bash
php artisan migrate
```

### 5. Install Tailwind CSS

To compile the Tailwind CSS for the frontend:

```bash
npm run dev
```

### 8. Seed the database (optional)

You can seed the database with dummy data using:

```bash
php artisan db:seed
```

## Running the Application

### 1. Serve the application

Start the Laravel development server:

```bash
php artisan serve
```

By default, the API will be accessible at `http://127.0.0.1:8000`.

### 2. Testing the API Endpoints

You can use **Postman** or any other API client to test the following endpoints:

- `POST /api/todolists` – Add tasks
- `GET /api/todolists` – Get all tasks
- `GET /api/todolists/{id}` – Get task by ID
- `PUT /api/todolists/{id}` – Update task
- `DELETE /api/todolists/{id}` – Delete task
