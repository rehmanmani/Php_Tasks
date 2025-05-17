<?php
include 'connect.php';

$student_id = $_GET["ID"];

$course_id_query = "SELECT course_id FROM student_info WHERE student_id = {$student_id}";
$course_id_result = mysqli_query($con, $course_id_query);
$course_id_row = mysqli_fetch_assoc($course_id_result);
$course_id = $course_id_row['course_id'];

$delete_student_query = "DELETE FROM student_info WHERE student_id = {$student_id}";
$delete_course_query = "DELETE FROM course WHERE course_id = {$course_id}";

$result1 = mysqli_query($con, $delete_student_query);

if ($result1) {
    $result2 = mysqli_query($con, $delete_course_query);
    if ($result2) {
        echo "<br>Result deleted successfully";
        header("Location: students_list.php");
        exit();
    } else {
        echo "<br>Error deleting course: " . mysqli_error($con);
    }
} else {
    echo "<br>Error deleting student info: " . mysqli_error($con);
}

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

mysqli_close($con);
