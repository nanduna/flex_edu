<!DOCTYPE html>

<?php
$email=$_GET['user_email'] ;
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        text-align: center;
        margin: 50px;
    }

    h1 {
        color: #4CAF50;
    }

    p {
        color: #333;
    }

    button {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        cursor: pointer;
    }
    </style>
</head>

<body>

    <h1>Activate account</h1>
    <div>
        <form action="register_successfully.php" method="get">
            <p>
                Input OTP for <?= $email ?>
                <input type="text" name="otp" id="otp">

            </p>

            <input type="hidden" name="user_email" id="user_email" value="<?= $email ?>">
            <button type="submit">Submit</button>
        </form>

    </div>
    <script>
    function goToLoginPage() {
        // Redirect to the login page (replace 'login.html' with your actual login page)
        window.location.href = 'loginpage.html';
    }
    </script>

</body>

</html>