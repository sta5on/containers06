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
    <main class="page">
        <section class="hero">
            <p class="eyebrow">Лабораторная работа №6</p>
            <h1>PHP приложение в двух контейнерах</h1>
            <p class="lead">
                Страница обслуживается контейнером nginx, а PHP-код выполняется в контейнере php-fpm.
            </p>
        </section>

        <section class="grid">
            <article class="card">
                <h2>Состояние приложения</h2>
                <ul>
                    <li>Текущее время сервера: <?= htmlspecialchars($serverTime, ENT_QUOTES, 'UTF-8') ?></li>
                    <li>Версия PHP: <?= htmlspecialchars($phpVersion, ENT_QUOTES, 'UTF-8') ?></li>
                    <li>Режим PHP: <?= htmlspecialchars($sapi, ENT_QUOTES, 'UTF-8') ?></li>
                    <li>Имя контейнера: <?= htmlspecialchars($containerHost, ENT_QUOTES, 'UTF-8') ?></li>
                </ul>
            </article>

            <article class="card">
                <h2>Что проверять для скриншотов</h2>
                <ol>
                    <li>Создана сеть <code>internal</code>.</li>
                    <li>Запущен контейнер <code>backend</code> на образе <code>php:7.4-fpm</code>.</li>
                    <li>Запущен контейнер <code>frontend</code> на образе <code>nginx:1.23-alpine</code>.</li>
                    <li>Сайт открывается по адресу <code>http://localhost</code>.</li>
                </ol>
            </article>
        </section>
    </main>
</body>
</html>
