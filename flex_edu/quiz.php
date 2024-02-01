<?php
$questions = array(
    array(
        'question' => 'What is the capital of France?',
        'options' => array('Berlin', 'Madrid', 'Paris', 'Rome'),
        'correct' => 'Paris'
    ),
    array(
        'question' => 'Which planet is known as the Red Planet?',
        'options' => array('Mars', 'Venus', 'Earth', 'Jupiter'),
        'correct' => 'Mars'
    )
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = 0;

    foreach ($questions as $key => $question) {
        $user_answer = $_POST['q' . $key];
        $correct_answer = $question['correct'];

        echo '<p>Question ' . ($key + 1) . ': ' . $question['question'] . '</p>';
        echo '<p>Your Answer: ' . $user_answer . '</p>';
        echo '<p>Correct Answer: ' . $correct_answer . '</p>';

        if ($user_answer === $correct_answer) {
            $score++;
        }
    }

    echo '<h2>Your Score: ' . $score . '/' . count($questions) . '</h2>';
} else {
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    .quiz-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f5f5f5;
        border-radius: 10px;
    }

    h1 {
        text-align: center;
    }

    form {
        text-align: left;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }
    </style>
    <title>Course Quiz</title>
</head>

<body>
    <div class="quiz-container">
        <h1>Course Quiz</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <?php
            foreach ($questions as $key => $question) {
                echo '<label for="q' . $key . '">' . $question['question'] . '</label>';
                foreach ($question['options'] as $option) {
                    echo '<input type="radio" name="q' . $key . '" value="' . $option . '">' . $option . '<br>';
                }
            }
            ?>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>
<?php
}
?>