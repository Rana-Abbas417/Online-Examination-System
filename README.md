# Online Examination System

A responsive **Online Examination System** developed as a student-level web application using **PHP, MySQL, HTML5, CSS3, and JavaScript**. The system provides separate workflows for candidates and administrators, allowing online examinations to be created, attempted, managed, and evaluated through a simple web interface.

The project is designed for **educational and portfolio purposes**, demonstrating practical implementation of authentication, database operations, CRUD functionality, online examinations, automatic result calculation, and responsive web design.

---

## Features

### Candidate Features

- Candidate registration
- Candidate login and logout
- Candidate dashboard
- View available examinations
- Attempt online examinations
- Multiple-choice questions
- Submit examination answers
- Automatic result calculation
- View examination score and percentage
- View previous examination results

### Administrator Features

- Administrator login
- Administrator dashboard
- Create new examinations
- View existing examinations
- Manage examination questions
- Add examination questions
- Delete examination questions
- Delete examinations
- View registered candidates

### User Interface

- Responsive design for desktop, tablet, and mobile devices
- Mobile drawer navigation
- Modern card-based interface
- Responsive examination and result tables
- Form validation
- Interactive buttons and navigation
- Consistent styling across candidate and administrator pages

---

## Technologies Used

| Technology | Purpose |
|---|---|
| **HTML5** | Page structure and semantic markup |
| **CSS3** | Styling, responsive design, animations, and layout |
| **JavaScript** | Client-side validation and mobile navigation |
| **PHP** | Server-side application logic |
| **MySQL** | Database management |
| **MySQLi** | PHP-MySQL database connectivity |
| **XAMPP** | Local development environment |
| **Visual Studio Code** | Source-code editing |

---

## Project Structure

```text
Online-Examination-System/
│
├── index.php
├── README.md
├── LICENSE
├── .gitignore
│
├── about/
│   └── about.php
│
├── admin/
│   ├── admin.php
│   ├── admin_login.php
│   └── manage_exams.php
│
├── candidate/
│   ├── dashboard.php
│   ├── take_exam.php
│   ├── submit_exam.php
│   └── result_view.php
│
├── auth/
│   ├── login.php
│   ├── register.php
│   └── logout.php
│
├── config/
│   └── db.php
│
├── assets/
│   ├── css/
│   │   └── style.css
│   │
│   └── js/
│       └── validation.js
│
└── database/
    └── online_exam_db.sql
```

---

## Installation and Setup

### 1. Install XAMPP

Download and install **XAMPP** or another local PHP/MySQL development environment.

### 2. Copy the Project

Copy the project folder into the XAMPP web root:

```text
C:\xampp\htdocs\
```

The resulting path should look similar to:

```text
C:\xampp\htdocs\Online-Examination-System\
```

### 3. Start Apache and MySQL

Open the **XAMPP Control Panel** and start:

- Apache
- MySQL

### 4. Create the Database

Open **phpMyAdmin** in your browser:

```text
http://localhost/phpmyadmin/
```

Create/import the database using the included SQL file:

```text
database/online_exam_db.sql
```

### 5. Configure Database Connection

Open:

```text
config/db.php
```

Check the database connection settings and update them if your local MySQL configuration is different.

Typical XAMPP settings are:

```text
Host: localhost
Username: root
Password: 
```

The database name should match the database created from the SQL file.

### 6. Run the Project

Open the project in your browser:

```text
http://localhost/Online-Examination-System/
```

---

## Database

The project includes the following SQL file:

```text
database/online_exam_db.sql
```

This file contains the database structure and required initial data for the application.

Import this file into **phpMyAdmin** before running the application.

---

## Application Workflow

### Candidate Workflow

```text
Register
   ↓
Login
   ↓
Candidate Dashboard
   ↓
View Available Exams
   ↓
Start Exam
   ↓
Answer Questions
   ↓
Submit Exam
   ↓
Automatic Result Calculation
   ↓
View Result
```

### Administrator Workflow

```text
Admin Login
   ↓
Admin Dashboard
   ↓
Create Exam
   ↓
Manage Questions
   ↓
Add / Delete Questions
   ↓
Manage Existing Exams
   ↓
View Registered Candidates
```

---

## Project Purpose

The Online Examination System was developed to demonstrate practical knowledge of:

- PHP web development
- MySQL database integration
- CRUD operations
- User authentication
- Form handling and validation
- Multiple-choice examination systems
- Automatic result calculation
- Responsive web design
- JavaScript-based client-side interaction
- Structured project organization

---

## Security Notice

This project is intended for **educational and portfolio purposes**.

Before deploying the application in a production environment, additional security measures should be implemented and reviewed, including:

- Secure password hashing and verification
- Authentication and authorization controls
- Prepared SQL statements
- Input validation and sanitization
- CSRF protection
- Session security
- Secure error handling
- Database credential protection
- Production server configuration

Do not publish real database credentials or other sensitive configuration information in a public repository.

---

## License

This project is licensed under the **MIT License**.

See the [`LICENSE`](LICENSE) file for complete license information.

---

## Author

**Muhammad Abbas**

Computer Science Student  
Web Developer | Software Developer | SEO Enthusiast