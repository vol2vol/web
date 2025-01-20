<?php
$questions = [
    [
        'question' => 'Как называется разъём для подключения к интернет сети',
        'answers' => ['c13', 'rj45', 'vga', 'hdmi', '24pin', 'sata'],
        'correct' => 1
    ],
    [
        'question' => 'Какое устройство используется для соединения локальных сетей?',
        'answers' => ['Модем', 'Коммутатор', 'Маршрутизатор', 'Кабель', 'Хаб', 'Концентратор'],
        'correct' => 2
    ],
    [
        'question' => 'Что такое IP-адрес?',
        'answers' => ['Протокол передачи данных', 'Идентификатор устройства в сети', 'Код страны', 'Доменное имя', 'MAC-адрес', 'DNS-запись'],
        'correct' => 1
    ],
    [
        'question' => 'Какой диапазон адресов относится к частным IP-адресам?',
        'answers' => ['192.168.0.0 - 192.168.255.255', '8.8.8.0 - 8.8.8.255', '127.0.0.0 - 127.255.255.255', '10.0.0.0 - 10.255.255.255', '172.16.0.0 - 172.31.255.255', '255.255.255.255'],
        'correct' => 0
    ],
    [
        'question' => 'Что обозначает аббревиатура DNS?',
        'answers' => ['Dynamic Name System', 'Domain Name Server', 'Domain Name System', 'Data Network System', 'Device Naming System', 'Digital Network Server'],
        'correct' => 2
    ],
    [
        'question' => 'Какой порт используется для HTTPS?',
        'answers' => ['21', '80', '22', '443', '110', '25'],
        'correct' => 3
    ],
    [
        'question' => 'Какие обязанности у инженера АСУТП?',
        'answers' => ['Восстанавливать автоматику', 'Ремонтировать принтеры в офисе', 'Пить чай с печеньками', 'Воровать кабель', 'Ремонтировать станки', 'Копать траншею под кабель'],
        'correct' => 2
    ],
    [
        'question' => 'Какой протокол отвечает за преобразование доменных имен в IP-адреса?',
        'answers' => ['FTP', 'DNS', 'HTTP', 'ARP', 'DHCP', 'ICMP'],
        'correct' => 1
    ],
    [
        'question' => 'Какой стандарт Wi-Fi обеспечивает скорость до 54 Мбит/с?',
        'answers' => ['802.11a', '802.11b', '802.11g', '802.11n', '802.11ac', '802.11ax'],
        'correct' => 2
    ],
    [
        'question' => 'Что такое MAC-адрес?',
        'answers' => ['Идентификатор устройства в сети на уровне канального уровня', 'IP-адрес', 'DNS-запись', 'Протокол маршрутизации', 'Локальный адрес устройства', 'Шлюз по умолчанию'],
        'correct' => 0
    ],
    [
        'question' => 'Какой слой модели OSI отвечает за маршрутизацию пакетов данных?',
        'answers' => ['Сетевой', 'Физический', 'Транспортный', 'Канальный', 'Сеансовый', 'Представительный'],
        'correct' => 0
    ],
    [
        'question' => 'Какой стандарт Wi-Fi обеспечивает скорость до 1 Гбит/с?',
        'answers' => ['802.11n', '802.11b', '802.11g', '802.11ac', '802.11a', '802.11ax'],
        'correct' => 3
    ],
    [
        'question' => 'Как называется процесс преобразования доменного имени в IP-адрес?',
        'answers' => ['Пингование', 'Маршрутизация', 'Резолвинг', 'Шифрование', 'Коммутация', 'Хеширование'],
        'correct' => 2
    ],
    [
        'question' => 'Какой протокол используется для безопасной передачи данных в интернете?',
        'answers' => ['FTP', 'HTTPS', 'SMTP', 'Telnet', 'HTTP', 'IMAP'],
        'correct' => 1
    ],
    [
        'question' => 'Какой из адресов является IPv6?',
        'answers' => ['192.168.1.1', '10.0.0.1', '255.255.255.0', '2001:0db8:85a3:0000:0000:8a2e:0370:7334', '127.0.0.1', '172.16.0.1'],
        'correct' => 3
    ],
    [
        'question' => 'Какой порт по умолчанию используется для протокола FTP?',
        'answers' => ['21', '80', '443', '23', '110', '25'],
        'correct' => 0
    ],
    [
        'question' => 'Какое из следующих устройств относится к уровню доступа в сетевой архитектуре?',
        'answers' => ['Маршрутизатор', 'Коммутатор', 'Концентратор', 'Модем', 'Кабель', 'Файрвол'],
        'correct' => 1
    ],
    [
        'question' => 'Что обозначает аббревиатура DHCP?',
        'answers' => ['Domain Host Configuration Protocol', 'Dynamic Host Configuration Protocol', 'Data Hyper Configuration Protocol', 'Digital Host Control Protocol', 'Dynamic Hypertext Control Protocol', 'Device Host Configuration Protocol'],
        'correct' => 1
    ],
    [
        'question' => 'Какой из следующих адресов является примером частного IP-адреса?',
        'answers' => ['192.168.0.1', '8.8.8.8', '1.1.1.1', '172.217.3.110', '10.255.255.255', '127.0.0.1'],
        'correct' => 0
    ],
    [
        'question' => 'Какой протокол используется для передачи электронной почты?',
        'answers' => ['POP3', 'SMTP', 'IMAP', 'FTP', 'HTTP', 'DHCP'],
        'correct' => 1
    ]
];


function getRandomAnswers(array $allAnswers, int $correctIndex): array {
    $answersWithoutCorrect = $allAnswers;
    unset($answersWithoutCorrect[$correctIndex]);
    $answersWithoutCorrect = array_values($answersWithoutCorrect);
    shuffle($answersWithoutCorrect);
    $randomAnswers = array_slice(array: $answersWithoutCorrect, offset: 0, length: 3);
    $randomAnswers[] = $allAnswers[$correctIndex];
    shuffle(array: $randomAnswers);
    return $randomAnswers;
}

function getRandomQuestions(array $questions, int $count = 5): array {
    shuffle(array: $questions);
    $selectedQuestions = array_slice(array: $questions, offset: 0, length: $count);
    foreach ($selectedQuestions as &$question) {
        $question['answers'] = getRandomAnswers(allAnswers: $question['answers'], correctIndex: $question['correct']);
    }
    return $selectedQuestions;
}

function saveResults($name, $score): void {
    $file = 'results.txt';
    $data = "$name,$score\n";
    file_put_contents(filename: $file, data: $data, flags: FILE_APPEND);
}

function calculateScoreDistribution(): array {
    $file = 'results.txt';
    if (!file_exists(filename: $file)) {
        return array_fill(start_index: 0, count: 6, value: 0);
    }

    $results = file(filename: $file, flags: FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $distribution = array_fill(start_index: 0, count: 6, value: 0);

    foreach ($results as $result) {
        list(, $score) = explode(separator: ',', string: $result);
        $distribution[(int)$score]++;
    }

    return $distribution;
}