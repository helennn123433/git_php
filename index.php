<?php
session_start();
$savedFacts = isset($_SESSION['savedFacts']) ? $_SESSION['savedFacts'] : [];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon">
    <link type="image/x-icon" href="/assets/images/favicon.ico" rel="shortcut icon">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main>
        <h1>Добро пожаловать!</h1>
    </main>
    <?php include 'includes/footer.php'; ?>
    <script src="/assets/js/script.js"></script>
</body>
</html>