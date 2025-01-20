<?php
session_start();
require_once 'question_and_function.php';

if (!isset($_SESSION['score'], $_SESSION['name'])) {
    header('Location: index.php');
    exit;
}

$name = $_SESSION['name'];
$score = $_SESSION['score'];
$scoreDistribution = calculateScoreDistribution();

saveResults($name, $score);

session_destroy();

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результаты</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    <h1>Your result: <?php echo $score; ?> из 5</h1>
    <div style="text-align: center;">
        <canvas id="distributionChart" style="width: 1000px; height: 1000px;"></canvas>
    </div>
    <script>
    const ctx = document.getElementById('distributionChart').getContext('2d');
    let chart;

    chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['0', '1', '2', '3', '4', '5'],
            datasets: [{
                label: 'вы на графике',
                data: <?php echo json_encode($scoreDistribution); ?>,
                backgroundColor: [],
                borderColor: 'black',
                borderWidth: 1
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            layout: {
                padding: 10
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Количество правильных ответов'
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    },
                    title: {
                        display: true,
                        text: 'Количество пользователей'
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        font: {
                            size: 10
                        }
                    }
                }
            }
        }
    });

    // Функция для обновления цвета баров
    function updateBarColors(score) {
        const dataset = chart.data.datasets[0];
        
        // Определяем индекс бара, соответствующего текущему счету пользователя
        const targetIndex = dataset.data.indexOf(score);
        
        // Обновляем цвета баров
        dataset.backgroundColor = [];
        dataset.data.forEach((value, index) => {
            if (index === score) {
                dataset.backgroundColor.push('red');
            } else {
                dataset.backgroundColor.push('#808080'); // Серый цвет
            }
        });
        
        chart.update();
    }

    // Вызываем функцию с текущим счетом пользователя
    updateBarColors(<?php echo $score; ?>);
</script>

    <a href="../index.html" class="back-button">Вернуться на главную</a>
</body>
</html>
