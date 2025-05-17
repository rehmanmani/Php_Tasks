<?php
include 'connect.php';

if (isset($_POST["submit"])) {
    $ID = $_POST["ID"];
    $name = $_POST["name"];
    $semester = $_POST["semester"];
    $course_title = $_POST["course_title"];
    $course_description = $_POST["course_description"];
    $course_credits = $_POST["course_credits"];

    if ($name != "" && $semester != "" && $course_title != "" && $course_description != "" && $course_credits != "") {
        $update_student_query = "UPDATE student_info SET student_name = '$name', student_semester = '$semester' WHERE student_id = {$ID}";
        $result1 = mysqli_query($con, $update_student_query);
        $update_course_query = "UPDATE course SET course_title = '$course_title', course_description = '$course_description', course_credits = '$course_credits' WHERE course_id = (SELECT course_id FROM student_info WHERE student_id = {$ID})";
        $result2 = mysqli_query($con, $update_course_query);
        if ($result1 && $result2) {
            header("Location: students_list.php");
            exit();
        } else {
            echo "<br>Error Editing result: " . mysqli_error($con);
        }
    } else {
        echo "<br>All fields are required.";
    }
} else {
    echo "Invalid request";
}

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

mysqli_close($con);
