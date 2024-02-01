<?php
require_once './include/config.php'; //create database connection
include './include/function.php';



if ($_SERVER["REQUEST_METHOD"] == "GET") {

$email = $_GET['user_email'];
$token = $_GET['otp'];

$sql = "SELECT * FROM account_verification WHERE email = '$email' AND token='$token'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// If the stock entry doesn't exist, insert a new one
$sql = "UPDATE user SET account_status = 1 WHERE User_email LIKE ?";

if ($stmt_sql = mysqli_prepare($conn, $sql)) {
mysqli_stmt_bind_param($stmt_sql, "s", $email);
if (mysqli_stmt_execute($stmt_sql)) {
$error = 'Account Updated successfully';
header("Location: Home.html");
} else {
$error = 'Something went wrong. Please try again later. ' . $conn->error;
}
mysqli_stmt_close($stmt_sql);
} else {
$error = 'Something went wrong. Please try again later. ' . $conn->error;
}
} else {
    echo "invalid!";
}

echo $error;
}


?>