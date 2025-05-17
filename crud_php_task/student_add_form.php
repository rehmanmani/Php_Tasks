<?php
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Enrollment - Add New Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="col-md-6">
            <div class="card bg-dark border-light">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h5 class="mb-0 fw-bold">Student Enrollment - Add New Student</h5>
                </div>
                <div class="card-body p-4">
                    <form action="student_add.php" method="post">
                        <div class="mb-3">
                            <label for="student_name" class="form-label text-light">Name</label>
                            <input type="text" class="form-control bg-dark text-light border-secondary" name="student_name" id="student_name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="student_semester" class="form-label text-light">Semester</label>
                            <select class="form-select bg-dark text-light border-secondary" name="student_semester" id="student_semester" required>
                                <option value="" disabled selected>Select Semester</option>
                                <option value="Semester 1">Semester 1</option>
                                <option value="Semester 2">Semester 2</option>
                                <option value="Semester 3">Semester 3</option>
                                <option value="Semester 4">Semester 4</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="course_title" class="form-label text-light">Course Title</label>
                            <input type="text" class="form-control bg-dark text-light border-secondary" name="course_title" id="course_title" required>
                        </div>
                        <div class="mb-3">
                        <label for="course_description" class="form-label text-light">Course Description</label>
                        <input type="text" class="form-control bg-dark text-light border-secondary" name="course_description" id="course_description" required>
                    </div>
                    <div class="mb-3">
                    <label for="course_credits" class="form-label text-light">Course credits</label>
                    <input type="number" class="form-control bg-dark text-light border-secondary" name="course_credits" id="course_credits" required>
                </div>
                        
                        <button type="submit" name="submit" class="btn btn-outline-light w-100">Add Details</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>';
