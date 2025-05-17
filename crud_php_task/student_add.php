<?php
include 'connect.php';

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST["submit"])) {

    $student_name =  $_POST["student_name"];
    $student_semester =  $_POST["student_semester"];
    $course_title =  $_POST["course_title"];
    $course_description =  $_POST["course_description"];
    $course_credits =  $_POST["course_credits"];

    if ($student_name != "" && $student_semester != "" && $course_title != "" && $course_description != "" && $course_credits != "") {

        $check_course_query = "SELECT course_id FROM course WHERE course_title = '$course_title' AND course_description = '$course_description' AND course_credits = '$course_credits'";
        $check_course_result = mysqli_query($con, $check_course_query);
        if (mysqli_num_rows($check_course_result) > 0) {
            $course_row = mysqli_fetch_assoc($check_course_result);
            $course_id = $course_row['course_id'];
        } else {
            $add_course_query = "INSERT INTO course (course_title, course_description, course_credits) VALUES ('$course_title', '$course_description', '$course_credits')";
            $result1 = mysqli_query($con, $add_course_query);
            if ($result1) {
                $course_id = mysqli_insert_id($con);
            } else {
                echo "Error adding course: " . mysqli_error($con);
                exit();
            }
        }

        $add_student_query = "INSERT INTO student_info (student_name, student_semester, course_id) VALUES ('$student_name', '$student_semester', '$course_id')";
        $result2 = mysqli_query($con, $add_student_query);

        if ($result2) {
            header("Location: students_list.php");
            exit();
        } else {
            echo "Error adding student: " . mysqli_error($con);
        }

        if ($result1 && $result2) {
            header("Location: students_list.php");
        } else {
            echo "<br>Error adding result: " . mysqli_error($con);
        }
    }
} else {
    echo "Invalid request";
}

mysqli_close($con);
