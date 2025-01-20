<?php
session_start();
require_once 'question_and_function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['questions'], $_SESSION['current_question'], $_SESSION['score'])) {
        header(header: 'Location: index.php');
        exit;
    }

    $currentQuestionIndex = $_SESSION['current_question'];
    $currentQuestion = $_SESSION['questions'][$currentQuestionIndex];
    $selectedAnswer = htmlspecialchars(string: $_POST['answer']);

    if ($selectedAnswer === null || !in_array(needle: $selectedAnswer, haystack: $currentQuestion['answers'], strict: true)) {
        $_SESSION['feedback'] = 'Некорректный выбор ответа.';
        header(header: 'Location: index.php');
        exit;
    }

    $correctAnswer = null;
    foreach ($questions as $question) {
        if ($question['question'] === $currentQuestion['question']) {
            $correctAnswer = $question['answers'][$question['correct']];
            break;
        }
    }

    if ($selectedAnswer === $correctAnswer) {
        $_SESSION['score'] = ($_SESSION['score'] ?? 0) + 1;
        $_SESSION['feedback'] = 'Ответ правильный!';
    } else {
        $_SESSION['feedback'] = 'Ответ неправильный. Вы выбрали: ' . 
            $selectedAnswer . '. Правильный ответ: ' . $correctAnswer;
    }

    $_SESSION['current_question']++;

    if ($_SESSION['current_question'] >= count(value: $_SESSION['questions'])) {
        header(header: 'Location: results.php');
        exit;
    }

    header(header: 'Location: index.php');
    exit;
}
