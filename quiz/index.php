<?php
session_start();
require_once 'question_and_function.php';

if (!isset($_SESSION['name'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
        $_SESSION['name'] = htmlspecialchars(string: $_POST['name']);
        $_SESSION['questions'] = getRandomQuestions($questions, 5);
        $_SESSION['current_question'] = 0;
        $_SESSION['score'] = 0;
    } else {
        ?>
        <!DOCTYPE html>
        <html lang="ru">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Тест</title>
            <style>
                .back-button {
                    -webkit-writing-mode: horizontal-tb !important;
                    -webkit-appearance: button;
                    border-color: rgb(121, 121, 121);
                    background-color:rgb(240,240,240);
                    border-style: solid;
                    border-width: 1px;
                    border-radius: 2px;
                    padding: 1px 7px 2px;
                    text-rendering: auto;
                    color: initial;
                    display: inline-block;
                    text-align: start;
                    margin: 0em;
                    font: 400 12px system-ui;
                    text-decoration: none;
                }
                .back-button:hover {
                    background-color:rgb(233, 233, 233);
                }
            </style>
        </head>
        <body>
            <h1>Welcome to the quiz</h1>
            <form method="POST">
                <label>
                    Name:
                    <input type="text" name="name" required>
                </label>
                <button type="submit">Start</button>
                <a href="../index.html" class="back-button">Home</a>
            </form>
        </body>
        </html>
        <?php 
        exit;
    }
}

$currentQuestionIndex = $_SESSION['current_question'];
$currentQuestion = $_SESSION['questions'][$currentQuestionIndex];
$answers = $currentQuestion['answers'];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
    <h1>Question <?php echo $currentQuestionIndex + 1; ?> from 5</h1>
    
    <form method="POST" action="process.php">
        <fieldset>
            <legend><?php echo htmlspecialchars(string: $currentQuestion['question']); ?></legend>
            <?php foreach ($answers as $answer): ?>
                <label>
                    <input type="radio" name="answer" value="<?php echo htmlspecialchars(string: $answer); ?>" required>
                    <?php echo htmlspecialchars(string: $answer); ?>
                </label><br>
            <?php endforeach; ?>
        </fieldset>
        <button type="submit">answer the question</button>
    </form>
</body>
</html>
