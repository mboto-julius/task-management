# Task Management System (Laravel 11)

A simple task management system built with Laravel 11 and PHP 8.3.  
It allows users to manage projects and tasks, and reorder tasks using drag and drop with automatic priority updates.

---

## 🚀 Features

- Create, update, delete Projects
- Create, update, delete Tasks
- Assign tasks to projects
- View tasks under each project
- Drag & drop task reordering
- Automatic priority update (1 = highest priority)
- Project-based task organization
- Dashboard with totals

---

## 🧱 Tech Stack

- PHP 8.3+
- Laravel 11
- MySQL
- Bootstrap 5
- jQuery + jQuery UI (Drag & Drop)

---

## 📦 Installation Guide

### 1. Clone the project

```bash
git clone https://github.com/mboto-julius/task-management.git
cd task-management
```

### 2. Install dependencies

```bash
composer install
```

### 3. Create environment file

```bash
cp .env.example .env
```

### 4. Configure database

Open `.env` and update:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=your_port
DB_DATABASE=your_db_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 5. Generate application key

```bash
php artisan key:generate
```

### 6. Run migrations and seed database

```bash
php artisan migrate:fresh --seed
```

This will create:
- 5 Projects
- 10 Tasks per project
- Automatic priority values (1–10)

### 7. Start development server

```bash
php artisan serve
```

Open in browser:

```
http://127.0.0.1:8000
```