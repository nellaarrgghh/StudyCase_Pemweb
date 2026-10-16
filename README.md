# AmbaCafe - Coffee Shop Web Application
> **Study Case: Pemrograman Web (Web Programming)**

A full-stack PHP & MySQL web application built for coffee ordering with role-based access control (Admin, Member, and Guest), dynamic product management, and an automatic discount calculation system.

---

## 📌 Project Overview & Requirements

- **Administrator Privileges**:
  - Add new coffee products with name, price, and image URL.
  - Edit existing coffee products.
  - Delete coffee products.
  - View and manage users.
- **Member / Customer Benefits**:
  - Registered and logged-in customers receive an automatic **10% discount** on all menu items.
  - Original prices are struck through (`<strike>`), displaying the discounted price.
- **Guest Access**:
  - Visitors can order coffee directly at regular prices without logging in.
- **Security & Architecture**:
  - Prepared statements (`mysqli_prepare`) to prevent SQL Injection.
  - Secure password hashing using PHP's `password_hash()` (bcrypt) with backwards-compatible fallback.
  - Session protection (`session_regenerate_id()`) against session fixation.
  - Role-based authorization gates (`require_admin()`).

---

## 🛠️ Tech Stack

- **Backend**: PHP 8.x
- **Database**: MySQL / MariaDB
- **Frontend**: HTML5, CSS3, Bootstrap 5
- **Environment**: XAMPP (Apache & MySQL) / Built-in PHP Server

---

## 📂 Project Structure

```text
Coffeshop/
├── auth.php        # Session initiation & role authorization helpers
├── config.php      # Database connection configuration (MySQLi)
├── create.php      # Admin: Add new coffee product
├── database.sql    # Database schema & initial seed data
├── delete.php      # Admin: Delete coffee product
├── edit.php        # Admin: Edit coffee product
├── index.php       # Coffee menu & ordering dashboard (10% off logic)
├── login.php       # User login page (AmbaCafe)
├── logout.php      # Session destroy & logout redirect
├── navbar.php      # Reusable navigation bar component
├── register.php    # Customer registration page (assigned role: Member)
├── users.php       # Admin: User management dashboard
└── README.md       # Project documentation
```

---

## 🗄️ Database Setup

1. Open **phpMyAdmin** at [http://localhost/phpmyadmin](http://localhost/phpmyadmin) (or use your MySQL CLI).
2. Create a database named `coffeeshop` (or simply import `database.sql` directly):
   ```sql
   CREATE DATABASE IF NOT EXISTS `coffeeshop`;
   ```
3. Import the provided **`database.sql`** file located in this repository:
   - **Via phpMyAdmin**: Go to the **Import** tab $\rightarrow$ Choose `database.sql` $\rightarrow$ Click **Import**.
   - **Via Terminal**:
     ```bash
     mysql -u root < database.sql
     ```

### Database Tables:
- **`users`**: Stores user credentials (`id`, `username`, `password`, `role`).
- **`product`**: Stores coffee items (`id`, `name`, `price`, `url_image`).

---

## 🚀 How to Run Locally

### Option A: Using Built-in PHP Server (Quickest)
1. Open terminal in the project directory:
   ```bash
   cd /path/to/Coffeshop
   ```
2. Start the development server:
   ```bash
   php -S localhost:8000
   ```
3. Open your browser and navigate to:  
   👉 **[http://localhost:8000](http://localhost:8000)**

---

### Option B: Using XAMPP
1. Move or clone this project folder into your XAMPP `htdocs` directory:
   ```text
   /Applications/XAMPP/xamppfiles/htdocs/Coffeshop   (macOS)
   C:\xampp\htdocs\Coffeshop                         (Windows)
   ```
2. Open **XAMPP Control Panel** and start **Apache** and **MySQL**.
3. Open your browser and navigate to:  
   👉 **[http://localhost/Coffeshop](http://localhost/Coffeshop)**

---

## 👥 Test Accounts Reference

| # | Username | Password | Role | Permissions & Behavior |
|---|---|---|---|---|
| 1 | **admin** | `admin` | **Admin** | Full management (Add, Edit, Delete coffee products & manage users) |
| 2 | **Amba** | `tukam` | **Admin** | Full management (Add, Edit, Delete coffee products & manage users) |
| 3 | **Rusdi** | `ngawi` | **Member** | Orders with **10% discount** applied |
| 4 | **Aku** | `kucing` | **Member** | Orders with **10% discount** applied |
| 5 | **Kamu** | `Meow` | **Member** | Orders with **10% discount** applied |
| 6 | *Guest* | *(none)* | *guest* | Can browse and order at **regular price** without logging in |
