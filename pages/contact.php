<?php 
include '../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');
    
    $to = 'your@email.com';
    $subject = 'Новое сообщение с сайта';
    $body = "Имя: $name\nEmail: $email\nСообщение:\n$message";
    $headers = "From: $email";

    $success = true;
}
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
    <main>
        <h1>Контакты</h1>
        
        <?php if ($success): ?>
            <div class="alert success">
                Спасибо! Ваше сообщение отправлено.
            </div>
        <?php else: ?>
            <form method="post">
                <div class="form-group">
                    <input type="text" name="name" placeholder="Имя" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
                    <?php if (isset($errors['name'])): ?>
                        <span class="error"><?= $errors['name'] ?></span>
                    <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                    <?php if (isset($errors['email'])): ?>
                        <span class="error"><?= $errors['email'] ?></span>
                    <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <textarea name="message" placeholder="Ваше сообщение"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                    <?php if (isset($errors['message'])): ?>
                        <span class="error"><?= $errors['message'] ?></span>
                    <?php endif; ?>
                </div>
                
                <button type="submit">Отправить</button>
            </form>
        <?php endif; ?>
    </main>

    <?php include '../includes/footer.php'; ?>
</body>
</html>