<?php
require_once './include/config.php'; //create database connection
include './include/function.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $question = $_POST['question'];
    $answer1 = $_POST['answer1'];
    $answer2 = $_POST['answer2'];
    $answer3 = $_POST['answer3'];
    $answer4 = $_POST['answer4'];
    $correct_answer = $_POST['correct_answer'];
   // $quizz_id = $_POST['quizz_id'];

   $quizz_id = 1;
    $question = $_POST['question'];
    $result = SaveLocation($conn, $answer1, $answer2, $answer3, $answer4, $correct_answer,$quizz_id,$question);
    echo $result;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Adding Page</title>
    <link rel="stylesheet" href="Style.css">
    <style>
    .quiz-container {
        background-color: #2d2c2c;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        color: #ffff;
        width: 300px;
        align-items: center;
        margin-left: 300px;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
    }

    input,
    button {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        margin-bottom: 15px;
        border: none;
        border-radius: 4px;
    }

    button {
        background-color: #2574a9;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #2574a9;
    }

    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        background-color: #4caf50;
        color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }


    .container {
        display: flex;
    }

    .image-container {

        text-align: right;
        padding: 20px;
        display: flex;
        width: auto;
        height: 500px;

    }

    .image-container img {
        width: auto;
        height: 500px;

    }
    </style>
</head>

<body>

    <?php include './include/teacherHeader.php' ?>
    <br>
    <div class="container">

        <div class=" quiz-container">
            <form method="post" action="#">
                <h2>Quiz Adding Page</h2>

                <label for="answer1">Type Question</label>
                <input type="text" id="answer1" name="question" required>

                <label for="answer1">Type Answer 1</label>
                <input type="text" id="answer1" name="answer1" required>

                <label for="answer2">Type Answer 2</label>
                <input type="text" id="answer2" name="answer2" required>

                <label for="answer3">Type Answer 3</label>
                <input type="text" id="answer3" name="answer3" required>

                <label for="answer4">Type Answer 4</label>
                <input type="text" id="answer4" name="answer4" required>

                <label for="answer4">correct answer</label>
                <input type="text" id="correct_answer" name="correct_answer" required>


                <button type="submit" onclick="showSuccessPopup()">Submit</button>
                <button type="submit" onclick="exitForm()">exit</button>
                <div id="successPopup" class="popup">
                    <p>Operation Successful!</p>
                </div>
        </div>
        <div class="image-container">
            <img src="./assets/images/quiz.jpg" alt="Image Description">
        </div>
    </div>


    </form>


    <script>
    function submitQuiz() {
        // Implement your submit logic here
    }

    function clearFields() {
        // Implement your clear logic here
    }

    function nextQuestion() {
        // Implement your next question logic here
    }

    function exitForm() {
        if (confirm("Are you sure you want to exit?")) {
            window.location.href = "./index1.php"; // Redirect to another page or use "#" to close the form
        }
    }

    function showSuccessPopup() {
        // Get the success popup element
        var popup = document.getElementById('successPopup');

        // Display the popup
        popup.style.display = 'block';

        // Automatically hide the popup after 3 seconds (adjust as needed)
        setTimeout(function() {
            popup.style.display = 'none';
        }, 3000);
    }
    </script>

    <br>
    <footer>
        <?php include './include/footer.php'; ?>
    </footer>
</body>

</html>