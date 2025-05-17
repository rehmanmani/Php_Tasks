<?php
include 'connect.php';

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

$show_result_query = "SELECT * FROM student_info JOIN course ON course.course_id = student_info.course_id";
$result = mysqli_query($con, $show_result_query);
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

echo '<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Student Enrollment - All Students</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> 
</head> 
<body class="bg-dark text-light"> 
    <div class="container py-5"> 
        <h2 class="mb-4 text-center fw-bold text-primary">Student Enrollment - All Students</h2> 
        <div class="card bg-dark border-light"> 
            <div class="card-body"> 
                <table class="table table-dark table-hover"> 
                    <thead> 
                        <tr> 
                            <th scope="col">ID</th> 
                            <th scope="col">Name</th> 
                            <th scope="col">Semester</th> 
                            <th scope="col">Course Title</th> 
                            <th scope="col">Course Description</th> 
                            <th scope="col">Course Credits</th> 
                            <th scope="col">Actions</th> 
                        </tr> 
                    </thead> 
                    <tbody>';

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        echo '<tr> 
                <td>' . $row['student_id'] . '</td> 
                <td>' . $row['student_name'] . '</td> 
                <td>' . $row['student_semester'] . '</td> 
                <td>' . $row['course_title'] . '</td> 
                <td>' . $row['course_description'] . '</td> 
                <td>' . $row['course_credits'] . '</td> 
                <td> 
                    <a href="student_edit_view.php?ID=' . $row['student_id'] . '" class="btn btn-sm btn-primary me-2">Edit</a> 
                    <a href="student_delete.php?ID=' . $row['student_id'] . '" class="btn btn-sm btn-outline-danger">Delete</a> 
                </td> 
              </tr>';
    }
} else {
    echo "error showing result";
}

mysqli_close($con);
