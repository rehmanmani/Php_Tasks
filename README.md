# Student Course CRUD PHP Project

## Overview
This project is a simple PHP CRUD (Create, Read, Update, Delete) application for managing student enrollments and their associated courses. It uses MySQL as the database and Bootstrap for styling.

## Features
- Add a student and their course information
- View all students and their courses
- Edit student and course information
- Delete a student and their course

## Database Schema
You need to create a MySQL database named `my_student_profile` and two tables: `course` and `student_info`. The `student_info` table has a foreign key referencing the `course` table.

### SQL to Create Tables
```
CREATE TABLE course (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    course_title VARCHAR(255) NOT NULL,
    course_description TEXT NOT NULL,
    course_credits INT NOT NULL
);

CREATE TABLE student_info (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(255) NOT NULL,
    student_semester VARCHAR(50) NOT NULL,
    course_id INT NOT NULL,
    FOREIGN KEY (course_id) REFERENCES course(course_id) ON DELETE CASCADE
);
```

## Setup Instructions
1. **Clone or copy the project files** to your XAMPP `htdocs` directory (e.g., `/xampp/htdocs/crud_php_task`).
2. **Create the database and tables** using the SQL above in phpMyAdmin or MySQL CLI.
3. **Configure database connection** in `connect.php` if your MySQL credentials differ from the defaults (`root`/no password).
4. **Start Apache and MySQL** from XAMPP control panel.
5. **Access the app** in your browser at `http://localhost/crud_php_task/student_add_form.php`.

## File Structure
- `connect.php`: Handles database connection.
- `student_add_form.php`: Form to add a new student and course.
- `student_add.php`: Logic to add a student and course (with duplicate course check).
- `students_list.php`: Displays all students and their courses.
- `student_edit_view.php`: Form to edit student and course info.
- `student_edit_logic.php`: Logic to update student and course info.
- `student_delete.php`: Logic to delete a student and their course.

## Approach & Security
- **Relational Design**: Each student is linked to a course via a foreign key. Courses are reused if identical (title, description, credits).
- **Error Handling**: Database connection and query errors are handled gracefully.
- **No Output Before Headers**: Ensures redirects work correctly.

## Notes
- This is a basic educational CRUD app. For production, use prepared statements and more robust authentication/authorization.
- The UI uses Bootstrap 5 for a modern look.
