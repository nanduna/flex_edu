<?php
require_once './include/config.php'; //create database connection
include './include/function.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query the database for the user
    $sql = "SELECT * FROM user WHERE User_email = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["User_password"])) {
            // Password matches, set session and redirect to a welcome page
            $_SESSION['User_email'] = $username;
            session_start();
            header("Location: Navigation.html");
            exit();
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


<!DOCTYPE html>
<html lang="en">

<?php include './include/head.php' ?>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">FLEX EDU</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Courses</a>
                        </li>

                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="row mt-4">
            <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-body text-center">
                        <form class="" action="#" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-container">
                                        <i class="fas fa-envelope icon"></i>
                                        <input type="text" class="form-control icon-input input-field" name="username"
                                            id="username" placeholder="Email Address or User Name (Eg- PAXXXXX)">
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="input-container">
                                        <i class="fas fa-key icon"></i>
                                        <input class="form-control icon-input input-field" type="password" id="password"
                                            name="password" placeholder="Password">
                                    </div>
                                </div>
                            </div>

                            <p class="mt-5 forget-text pb-2"><a href="#">Forget your password?</a></p>
                            <button class="btn btn-success sign-button" type="submit">SIGN IN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>