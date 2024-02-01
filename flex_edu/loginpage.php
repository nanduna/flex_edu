<?php
// Define your database connection parameters
$servername = "localhost"; // Change this to your database server hostname or IP address
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "flex_edu";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start a session
session_start();

// Login check
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query the database for the user
    $sql = "SELECT * FROM user WHERE User_email = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        //two step verification 
        if($row["account_status"]==0){
            echo "Account not activated";
            exit();
        }

        
        if (password_verify($password, $row["User_password"])) {
            // Password matches, set session and redirect to a welcome page
            $_SESSION['User_email'] = $username;
            if ($row['User_type'] == "Teacher") {
                header("Location: instructor.php");
                exit();
            }
            else if($row['User_type'] == "Learner"){
                header("Location: index1.php");
                exit();
            }
           
  
        } else {
            // Password does not match
            echo "Invalid password.";
            
        }
    } else {
        // User not found
       echo "Invalid username.";
    }
}

$conn->close();
?>