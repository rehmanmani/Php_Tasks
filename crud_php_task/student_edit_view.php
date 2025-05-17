<?php
include 'connect.php';

$ID = mysqli_real_escape_string($con, $_GET["ID"]);
$result_query = "SELECT student_info.student_id, student_info.student_name, student_info.student_semester, course.course_id, course.course_title, course.course_description, course.course_credits FROM student_info JOIN course ON course.course_id = student_info.course_id WHERE student_info.student_id = {$ID}";

$result = mysqli_query($con, $result_query);
$row = mysqli_fetch_array($result);

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Enrollment - Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="col-md-6">
            <div class="card bg-dark border-light">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h5 class="mb-0 fw-bold">Student Enrollment - Edit Student</h5>
                </div>
                <div class="card-body p-4">
                    <form action="student_edit_logic.php" method="post">
                        <input type="hidden" id="student_id" name="ID" value="' . $row['student_id'] . '">
                        <div class="mb-3">
                            <label for="name" class="form-label text-light">Name</label>
                            <input type="text" class="form-control bg-dark text-light border-secondary" name="name" value="' . $row['student_name'] . '" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="semester" class="form-label text-light">Semester</label>
                            <select class="form-select bg-dark text-light border-secondary" name="semester" id="semester" required>
                                <option value="" disabled>Select Semester</option>
                                <option value="Semester 1"' . ($row['student_semester'] == 'Semester 1' ? ' selected' : '') . '>Semester 1</option>
                                <option value="Semester 2"' . ($row['student_semester'] == 'Semester 2' ? ' selected' : '') . '>Semester 2</option>
                                <option value="Semester 3"' . ($row['student_semester'] == 'Semester 3' ? ' selected' : '') . '>Semester 3</option>
                                <option value="Semester 4"' . ($row['student_semester'] == 'Semester 4' ? ' selected' : '') . '>Semester 4</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="course_title" class="form-label text-light">Course Title</label>
                            <input type="text" class="form-control bg-dark text-light border-secondary" name="course_title" value="' . $row['course_title'] . '" id="course_title" required>
                        </div>
                        <div class="mb-3">
                            <label for="course_description" class="form-label text-light">Course Description</label>
                            <input type="text" class="form-control bg-dark text-light border-secondary" name="course_description" value="' . $row['course_description'] . '" id="course_description" required>
                        </div>
                        <div class="mb-3">
                            <label for="course_credits" class="form-label text-light">Course Credits</label>
                            <input type="number" class="form-control bg-dark text-light border-secondary" name="course_credits" value="' . $row['course_credits'] . '" id="course_credits" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-outline-light w-100">Edit Info</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>';

mysqli_close($con);
