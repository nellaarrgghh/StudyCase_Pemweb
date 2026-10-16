# AmbaCafe - Coffee Shop Web Application

## Overview
This is for Web Programming class Study Case.

> "A coffee shop owner needs a web application for ordering coffee. An administrator should be able to add products, set images, and set prices. If a customer registers and logs in to place an order, they receive a 10% discount. However, if a customer visits the website and places an order without logging in, the regular price applies. Help the owner build this application!"

## Database Setup
1. Create a database named `coffeeshop` in MySQL.
2. Import `database.sql` via phpMyAdmin or terminal:
   ```bash
   mysql -u root coffeeshop < database.sql
   ```

## How to Run

### Option 1: PHP Built-in Server
Run inside the project folder:
```bash
php -S localhost:8000
```
Open in browser: `http://localhost:8000`

### Option 2: XAMPP Apache
Place this folder in your XAMPP `htdocs` directory and open:
`http://localhost/Coffeshop`

## Test Accounts

| Username | Password | Role | Description |
|---|---|---|---|
| admin | admin | Admin | Full access (Add, edit, delete products and users) |
| Amba | tukam | Admin | Full access (Add, edit, delete products and users) |
| Rusdi | ngawi | Member | Receives 10% discount on coffee menu |
| Aku | kucing | Member | Receives 10% discount on coffee menu |
| Kamu | Meow | Member | Receives 10% discount on coffee menu |
| Guest | *(none)* | Guest | Orders at regular price without logging in |
