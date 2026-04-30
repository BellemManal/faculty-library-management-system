#  Faculty Library Management System

A full-stack web application for managing a faculty library system.  
This project was developed as part of an academic assignment for 3rd year AI students (Academic Year 2025–2026).

---

##  Project Overview

The Faculty Library Management System (FLMS) digitizes library operations and allows efficient management of books, users, and borrowing activities.

It supports different user roles with different permissions:
- Students
- Faculty
- Librarians
- Admins

---

##  Features

###  Authentication System
- User registration and login
- Secure password hashing
- Session-based authentication
- Logout functionality
- Role-based access control

---

###  Book Catalog Management
- Add new books (Librarian/Admin)
- Edit book details
- Delete books (only if no active loans)
- View all books
- Track total and available copies
- Prevent direct modification of available copies

---

###  Search & Browse
- Search books by title, author, ISBN
- Filter books by availability
- Simple catalog browsing system

---

###  Borrowing System
- Students and Faculty can borrow books
- Automatic due date assignment:
  - Students: 14 days
  - Faculty: 30 days
- Prevent borrowing if no copies available
- Prevent duplicate borrowing
- Track active and past loans

---

###  Return System
- Return borrowed books
- Automatically increase available copies
- Update loan status to "returned"

---

###  User Roles

| Role       | Permissions |
|------------|-------------|
| Student    | Browse, borrow, return books |
| Faculty    | Higher borrowing limit + longer duration |
| Librarian  | Manage books + process returns |
| Admin      | Full system control + user management |

---

###  User Management (Admin only)
- View all users
- Change user roles
- Activate/deactivate accounts

---

##  Technologies Used

- PHP (Backend)
- MySQL (Database)
- HTML / CSS (Frontend)
- XAMPP (Local development server)

---

##  Project Structure
