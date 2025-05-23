# 📂 Portfolio Projects CRUD Application

This is a **Laravel 12** based CRUD web application for managing portfolio projects. It allows users to add, edit, view, and delete projects, complete with validation, pagination, and image upload support.

---

## 🚀 Laravel Version

- **Laravel v12**

---

## ⚙️ Setup Instructions (Windows)

### 1. Install PHP & Composer

To install PHP and Composer on Windows, open **PowerShell as Administrator** and run the following command:

```powershell
Set-ExecutionPolicy Bypass -Scope Process -Force; `
[System.Net.ServicePointManager]::SecurityProtocol = `
[System.Net.ServicePointManager]::SecurityProtocol -bor 3072; `
iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.4'))
```

### 2. Install Laravel Installer

```bash
composer global require laravel/installer
```

### 3. Create Laravel Project

```bash
composer create-project laravel/laravel portfolio-projects-CRUD-application
```

### 4. Install XAMPP

Download and install XAMPP from [https://www.apachefriends.org](https://www.apachefriends.org).  
Start the **Apache** and **MySQL** services from the XAMPP Control Panel.

### 5. Create the MySQL Database

- Visit [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
- Create a new database with the following name:

```
portfolio-projects-crud-application
```

### 6. Configure Laravel to Use MySQL

Open the `.env` file in the project root and update these lines:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio-projects-crud-application
DB_USERNAME=root
DB_PASSWORD=  # (Leave empty unless you've set a password)
```

### 7. Run Migrations

```bash
php artisan migrate
```

### 8. Start the Development Server

```bash
php artisan serve
```

Open your browser and go to: [http://localhost:8000](http://localhost:8000)

---

## 🗄️ Database Information

- **Database Type:** MySQL
- **Database Name:** `portfolio-projects-crud-application`
- **Database Password:** N/A

---

## 📝 Additional Notes

- ✅ **Class-based controllers** are used instead of function-based ones.
- 📄 **Pagination** is implemented with **2 projects per page** for better visualization.
- 🌐 **Project URLs** are split into:
  - Repository URL
  - Live URL
- 📥 **Form validation** is performed on the backend:
  - Invalid fields are marked with red borders.
  - Error messages are shown inline below the inputs.
- 📌 Required fields during project creation:
  - `Title`
  - `Image`
  - `Status`
- 🖼️ **Image is optional during editing**.
- 🧾 **A single form** is used for both creating and editing projects.

---

## 📌 Summary

| Feature            | Status       |
|--------------------|--------------|
| Laravel 12         | ✅            |
| MySQL Integration  | ✅            |
| Pagination         | ✅ (2 per page) |
| Validation         | ✅            |
| CRUD Operations    | ✅            |
| Image Upload       | ✅ (Required on create, optional on edit) |
| Clean UX           | ✅            |

---

