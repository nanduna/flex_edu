<?php
// session_start(); // Initialize the session

// if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION["user_name"])) {
//   $session_id = $_SESSION["user_name"];
//   $session_user_name = htmlspecialchars($_SESSION["User_email"]);

//   $sql = "SELECT `User_id`, `User_fname`, `User_lname`, `User_email`, `User_tp`, `User_password`, `User_type`, `Level` FROM `user` WHERE `User_email` LIKE '$session_user_name'";
//   $result = $link->query($sql);
//   while ($row = $result->fetch_assoc()) {
//     $session_first_name = $row['User_fname'];
//     $session_last_name = $row['User_lname'];
//     $session_student_number = $row['User_email'];
//     $session_email = $row['Level'];
//     $session_user_level = $row['User_type'];
//   }

//   // Check if the user is logged in, if not then redirect him to login page
//   if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
//     // header("location: ./login");
//     // exit;
//   }
// } else {
//   // handle the case when the session or user_name variable is not set
// }

// // Check if the user is logged in, if not then redirect him to login page
// if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
//   header("location: login");
//   exit;
// }
