<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once './include/config.php';
include './include/function.php';



// Get data from the registration form
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$telephone = $_POST['telephone'];
$level = $_POST['level'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST["confirmPassword"];



// Hash the password for security
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert data into the database
$sql = "INSERT INTO USER(User_fname,User_lname,User_email,User_tp,User_password,User_type,Level) VALUES ('$firstName','$lastName','$email','$telephone','$hashedPassword','Learner','$level')";
//$stmt = $conn->prepare($sql);
//$stmt->bind_param("sssssss", $firstName, $lastName, $telephone, $level, $email, $hashedPassword);

// Compare the passwords
if ($password === $confirmPassword) {
    
    $token = generateToken();
    $token_entry = insertToken($conn, $email, $token);
    print_r ($token_entry);


//Load Composer's autoloader
require 'vendor/autoload.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //Enable verbose debug output
    
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'acapulco.hostns.io';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'test-mail@payshia.com';                     //SMTP username
    $mail->Password   = 'C*mFu,&xSsVG';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('test-mail@payshia.com', 'flexi_edu');
    $mail->addAddress($email,$firstName);     //Add a recipient
         //Name is optional



    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'account activation';
    $mail->Body    = 'OTP code -'.$token;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send(); //send the email to mail
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


    
    
    $result =mysqli_query($conn,$sql);

    if($result){
       // Redirect to another HTML page
       header("Location: register_success.php?user_email=$email");
       exit(); // Make sure to exit after the header to prevent 
    }
}
 
else {
    // Passwords do not match, dis
    header("Location: register.html");
    exit();
    
}
$conn->close();

?>