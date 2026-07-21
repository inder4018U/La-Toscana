# 🍝 La Toscana

La Toscana is a restaurant ordering web application built using **PHP**, **MySQL**, **HTML**, **CSS**, **JavaScript**, and **jQuery**. It allows customers to browse dishes, create an account, add items to a shopping cart, and place orders, while administrators can manage cuisines, dishes, and customer orders through a dedicated admin panel.

---

## Features

### Customer

- User Registration
- User Login
- Forgot Password
- Browse Restaurant Menu
- Search Dishes
- Filter by Cuisine
- Shopping Cart
- Place Orders
- View Order Status

### Administrator

- Secure Admin Login
- Dashboard
- Add/Edit/Delete Cuisines
- Add/Edit/Delete Dishes
- Upload Dish Images
- View Customer Orders
- Update Order Status

---

## Technologies Used

- PHP
- MySQL
- HTML5
- CSS3
- JavaScript
- jQuery
- XAMPP

---

## Project Structure

```
italian/
│
├── admin/
│   ├── index.php
│   ├── adminpanel.php
│   ├── adddish.php
│   ├── updatedish.php
│   ├── deletedish.php
│   ├── addcuisine.php
│   ├── updatecuisine.php
│   └── updateorderstatus.php
│
├── dishimages/
├── uploads/
├── config.php
├── index.php
├── display.php
├── login.php
├── signup.php
├── cart.php
├── placeorder.php
└── italian.sql
```

---

## Installation

1. Clone the repository.

```bash
git clone https://github.com/yourusername/la-toscana.git
```

2. Copy the project into your XAMPP `htdocs` folder.

3. Start **Apache** and **MySQL**.

4. Open phpMyAdmin.

5. Create a database named:

```
italian
```

6. Import:

```
italian.sql
```

7. Open your browser and visit:

```
http://localhost/italian
```

---

## Default Admin Login

Create an admin account using the records included in `italian.sql`, or use the credentials configured in your imported database.

---

## Screenshots

You can add screenshots here.

- Home Page
- Menu
- Shopping Cart
- Login
- Admin Dashboard

---

## Learning Outcomes

This project demonstrates:

- PHP CRUD Operations
- MySQL Database Integration
- User Authentication
- Session Management
- File Uploads
- Search and Filtering
- Shopping Cart using PHP Sessions
- Admin Panel Development
- Responsive Web Design

---

## Future Improvements

- Prepared Statements (SQL Injection Protection)
- Password Hashing
- Payment Gateway Integration
- Email Notifications
- Order History
- Mobile Responsive Improvements

---

## License

This project was developed for educational purposes as part of a web development internship and academic learning.