# Online Examination System

A web-based **Online Examination System** built with PHP, MySQL, HTML, and CSS. The project provides separate candidate and administrator workflows for managing and attempting online exams.

## Features

### Candidate
- Candidate registration
- Candidate login/logout
- Dashboard with available exams
- Online exam attempt interface
- Automatic result submission and result viewing
- Previous results overview

### Administrator
- Admin authentication
- Create and manage exams
- Add and manage exam questions
- View registered candidates

## Technologies Used

- **Backend:** PHP
- **Database:** MySQL
- **Frontend:** HTML5, CSS3
- **Database Access:** MySQLi/PHP database connection
- **Local Development:** XAMPP or another PHP/MySQL server environment

## Project Structure

```text
.
├── about.php
├── admin.php
├── admin_login.php
├── dashboard.php
├── db.php
├── index.php
├── login.php
├── logout.php
├── manage_exams.php
├── online_exam_db.sql
├── register.php
├── result_view.php
├── style.css
├── submit_exam.php
└── take_exam.php
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
