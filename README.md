# Online Examination System

A web-based **Online Examination System** built with PHP, MySQL, HTML5, CSS3, and JavaScript.

The system provides separate workflows for candidates and administrators. Candidates can register, log in, attempt available examinations, submit answers, and view their results. Administrators can manage examinations and questions and view registered candidates.

---

## Features

### Candidate

- Candidate registration
- Candidate login and logout
- Candidate dashboard
- View available examinations
- Attempt online examinations
- Multiple-choice questions
- Automatic result calculation
- View examination percentage
- View previous examination results

### Administrator

- Administrator login
- Administrator dashboard
- Create examinations
- Manage examination questions
- Delete questions
- Delete examinations
- View registered candidates

---

## Technologies Used

- **Frontend:** HTML5, CSS3, JavaScript
- **Backend:** PHP
- **Database:** MySQL
- **Database Access:** MySQLi
- **Local Development:** XAMPP
- **Code Editor:** Visual Studio Code

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

## Installation

1. Install **XAMPP** (or an equivalent PHP/MySQL environment).
2. Copy the project folder into the server's web root, for example:
   - `xampp/htdocs/`
3. Start **Apache** and **MySQL** from the XAMPP Control Panel.
4. Open **phpMyAdmin**.
5. Import `online_exam_db.sql`.
6. Check `db.php` and update the database connection settings if your local MySQL configuration differs.
7. Open the project in a browser through your local server, for example:
   `http://localhost/Online%20Examination%20System/`

## Database

The included `online_exam_db.sql` file contains the database structure and data required by the application.

## Notes

This project is intended for **educational and portfolio purposes**. Before using it in a production environment, review authentication, authorization, input validation, CSRF protection, error handling, and database/security configuration.

## License

This project is licensed under the **MIT License**. See the `LICENSE` file for details.

## Author

**Muhammad Abbas**
