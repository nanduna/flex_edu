<?php

function getcategories($conn)
{
    $ArrayResult = array();
    $sql = "SELECT `Category_id`, `C_Name`, `description`, `image_path` FROM `category`";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $ArrayResult[$row['Category_id']] = $row;
        }
    }
    return $ArrayResult;
}


function getUser($conn)
{
    $ArrayResult = array();
    $sql = "SELECT `User_id`, `User_fname`, `User_lname`, `User_email`, `User_tp`, `User_password`, `User_type`, `Level` FROM `user`";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $ArrayResult[$row['User_id']] = $row;
        }
    }
    return $ArrayResult;
}




function SaveCourse($conn, $courseName, $categoryType, $coursePrice, $mainCategory, $subCategoryId)
{
    $error = array();
    $current_time = date("Y-m-d H:i:s");

    $sql = "INSERT INTO `course`(`C_name`, `C_type`, `C_price`, `SC_id`, `sub_cate_id`) VALUES (?, ?, ? ,?, ?)";

    if ($stmt_sql = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt_sql, "sssss", $courseName, $categoryType, $coursePrice, $mainCategory, $subCategoryId);
        if (mysqli_stmt_execute($stmt_sql)) {
            $error = array('status' => 'success', 'message' => 'Course Saved successfully');
        } else {
            $error = array('status' => 'error', 'message' => 'Something went wrong. Please try again later. ' . $conn->error);
        }
        mysqli_stmt_close($stmt_sql);
    } else {
        $error = array('status' => 'error', 'message' => 'Something went wrong. Please try again later. ' . $conn->error);
    }

    return $error;
}


function getSubCategories($conn)
{
    $ArrayResult = array();
    $sql = "SELECT * FROM `sub_category`";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $ArrayResult[$row['SC_id']] = $row;
        }
    }
    return $ArrayResult;
}


function getCourses($conn)
{
    $sql = "SELECT * FROM `course`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $ArrayResult[$row['C_id']] = $row;
        }
    }
    return $ArrayResult;
}


function saveCourseDetails($conn, $C_id, $l_material, $references)
{
    $error = array();
    $current_time = date("Y-m-d H:i:s");

    $sql = "INSERT INTO `course_material`(`C_id`, `l_material`, `references`) VALUES (?, ?, ?)";

    if ($stmt_sql = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt_sql, "sss", $C_id, $l_material, $references);
        if (mysqli_stmt_execute($stmt_sql)) {
            $error = array('status' => 'success', 'message' => 'Saved successfully');
        } else {
            $error = array('status' => 'error', 'message' => 'Something went wrong. Please try again later. ' . $conn->error);
        }
        mysqli_stmt_close($stmt_sql);
    } else {
        $error = array('status' => 'error', 'message' => 'Something went wrong. Please try again later. ' . $conn->error);
    }

    return $error;
}


function SaveLocation($conn, $answer1, $answer2, $answer3, $answer4, $correct_answer,$quizz_id,$question)
{
    $error = "";
    $current_time = date("Y-m-d H:i:s");

    $sql = "INSERT INTO question (`answer1`,`answer2`,`answer3`,`answer4`,`correct_answer`,`quizz_id`,`question`) VALUES (?, ?, ?, ?, ?, ?,?)";
   

        if ($stmt_sql = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt_sql, "sssssss", $answer1, $answer2, $answer3, $answer4, $correct_answer,$quizz_id,$question);
        if (mysqli_stmt_execute($stmt_sql)) {
            $error = "";
        } else {
            $error ='Something went wrong. Please try again later. ' . $conn->error;
        }
        mysqli_stmt_close($stmt_sql);
    } else {
        $error = 'Something went wrong. Please try again later. ' . $conn->error;
    }
    return $error;
}

function generateToken() {
    $characters = '0123456789';
    $token = '';

    // Generate a random 16-digit token
    for ($i = 0; $i < 6; $i++) {
        $token .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $token;
}

function insertToken($conn, $email, $token)
{
    $error = array();
    $current_time = date("Y-m-d H:i:s");

    $sql = "INSERT INTO `account_verification`(`email`, `token`) VALUES (?, ?)";

    if ($stmt_sql = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt_sql, "ss", $email, $token);
        if (mysqli_stmt_execute($stmt_sql)) {
            $error = array('status' => 'success', 'message' => 'Saved successfully');
        } else {
            $error = array('status' => 'error', 'message' => 'Something went wrong. Please try again later. ' . $conn->error);
        }
        mysqli_stmt_close($stmt_sql);
    } else {
        $error = array('status' => 'error', 'message' => 'Something went wrong. Please try again later. ' . $conn->error);
    }

    return $error;
}