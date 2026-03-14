# 🏠 BestArt Interior Design Web Application

## 📌 Project Overview

**BestArt Interior Design** is a modern full-stack web application developed to help users explore, visualize, and estimate interior designs digitally.

The platform allows customers to browse interior concepts, customize room spaces, calculate design costs, and communicate with interior consultants.

This project demonstrates real-world web development skills including:

* User authentication systems
* Dynamic user interface
* Database integration
* Session management
* Responsive web design

---

## 🚀 Features

### 👤 Authentication System

* User Signup & Login
* Admin Login Panel
* Session-based authentication
* Profile dropdown system

> Without login, important features like quote selection and customization are restricted.

---

### 🎨 Interior Design Platform

* Interior design gallery
* Room-wise design exploration
* Modern responsive UI
* Interactive sliders and sections

---

### 📐 Customization System

Users can:

* Enter room dimensions
* Choose room type
* Explore customized interior designs

---

### 💰 Cost Estimation

* Full Home Interior estimate
* Kitchen estimate
* Wardrobe estimate

---

### 🧑‍💼 Admin Panel

Admin can:

* Access dashboard
* Manage system features
* Monitor platform usage

---

## 🔐 Login Required Protection

Some features work only after login.

The following PHP session validation is used:

```php
// Redirect if user not logged in
if (!isset($_SESSION['user']['email'])) {
    header("Location: login.php");
    exit();
}
```

This ensures secure access control across the platform.

---

## 🧪 Demo Login Accounts

### 👨‍💼 Admin Account

Name: Bestart
Email: [admin@gmail.com](mailto:admin@gmail.com)
Password: admin123

---

### 👤 User Accounts

**User 1**
Name: Gagan
Email: [gagan@gmail.com](mailto:gagan@gmail.com)
Password: gagan123

**User 2**
Name: Harman
Email: [user@gmail.com](mailto:user@gmail.com)
Password: user123

---

## 🛠️ Technologies Used

### Frontend

* HTML5
* CSS3
* JavaScript
* Font Awesome

### Backend

* PHP
* MySQL

### Tools

* XAMPP / Localhost Server
* Git & GitHub

---

## 📁 Project Structure

```
BestArt-Interior/
│
├── index.php
├── login.php
├── signup.php
├── admin.php
├── user-dashboard.php
├── settings.php
│
├── index.css
├── index.js
│
├── images/
│   ├── logo.png
│   ├── gallery images
│   └── user images
│
└── estimate pages
```

---

## ⚙️ Installation Guide

1. Clone the repository

```
git clone https://github.com/yourusername/bestart-interior.git
```

2. Move project into **htdocs** folder (XAMPP).

3. Start Apache and MySQL.

4. Import database into phpMyAdmin.

5. Open browser:

```
http://localhost/bestart-interior
```

---

## 📸 Screenshots

(Add screenshots here)

```
![Homepage](images/homepage.png)
![Gallery](images/gallery.png)
```

---

## 🌟 Learning Outcomes

This project helped in understanding:

* Full-stack web development
* PHP session handling
* Authentication systems
* Database connectivity
* Responsive UI design
* Real-world project structure

---

## 👨‍💻 Developer

**Harmanpreet Singh**
Bachelor of Computer Applications (BCA) Graduate

Skills:

* HTML
* CSS
* JavaScript
* PHP
* MySQL
* Web Development

---

## 📄 License

This project is developed for educational and portfolio purposes.
