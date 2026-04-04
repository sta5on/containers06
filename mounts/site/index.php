<?php
$serverTime = date('Y-m-d H:i:s');
$phpVersion = phpversion();
$sapi = php_sapi_name();
$containerHost = gethostname();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Containers06 Lab</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <h1>Лабораторная работа №6</h1>
    <p>PHP приложение в двух контейнерах: nginx и php-fpm.</p>

    <h2>Состояние приложения</h2>
    <ul>
        <li>Текущее время сервера: <?= htmlspecialchars($serverTime, ENT_QUOTES, 'UTF-8') ?></li>
        <li>Версия PHP: <?= htmlspecialchars($phpVersion, ENT_QUOTES, 'UTF-8') ?></li>
        <li>Режим PHP: <?= htmlspecialchars($sapi, ENT_QUOTES, 'UTF-8') ?></li>
        <li>Имя контейнера: <?= htmlspecialchars($containerHost, ENT_QUOTES, 'UTF-8') ?></li>
    </ul>

    <h2>Проверка</h2>
    <ol>
        <li>Создана сеть <code>internal</code>.</li>
        <li>Запущен контейнер <code>backend</code>.</li>
        <li>Запущен контейнер <code>frontend</code>.</li>
        <li>Сайт открывается по адресу <code>http://localhost</code>.</li>
    </ol>
</body>
</html>
