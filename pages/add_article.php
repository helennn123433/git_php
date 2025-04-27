<?php
include '../includes/db.php';
include '../includes/header.php';

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    
    if (empty($title)) {
        $errors['title'] = 'Заголовок обязателен';
    } elseif (strlen($title) > 255) {
        $errors['title'] = 'Заголовок слишком длинный (максимум 255 символов)';
    }
    
    if (empty($content)) {
        $errors['content'] = 'Содержание статьи обязательно';
    }
    
    if (empty($errors)) {
        $result = pg_query_params(
            $conn,
            "INSERT INTO articles (title, content) VALUES ($1, $2)",
            [$title, $content]
        );
        
        if ($result) {
            $success = true;
        } else {
            $errors['db'] = 'Ошибка базы данных: ' . pg_last_error($conn);
        }
    }
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
<main class="article-form-container">
    <h1>Добавить новую статью</h1>
    
    <?php if ($success): ?>
        <div class="alert success">
            <i class="fas fa-check-circle"></i>
            Статья успешно добавлена! <a href="/pages/articles.php">Посмотреть все статьи</a>
        </div>
    <?php else: ?>
        <?php if (!empty($errors['db'])): ?>
            <div class="alert error">
                <i class="fas fa-exclamation-circle"></i>
                <?= $errors['db'] ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" class="article-form">
            <div class="form-group">
                <label for="title">Заголовок статьи</label>
                <input type="text" id="title" name="title" 
                       value="<?= htmlspecialchars($_POST['title'] ?? '') ?>"
                       placeholder="Введите заголовок статьи">
                <?php if (isset($errors['title'])): ?>
                    <span class="error-message"><?= $errors['title'] ?></span>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="content">Содержание статьи</label>
                <textarea id="content" name="content" 
                          placeholder="Напишите содержание статьи"><?= htmlspecialchars($_POST['content'] ?? '') ?></textarea>
                <?php if (isset($errors['content'])): ?>
                    <span class="error-message"><?= $errors['content'] ?></span>
                <?php endif; ?>
            </div>
            
            <button type="submit" class="submit-btn">
                <i class="fas fa-plus-circle"></i> Добавить статью
            </button>
        </form>
    <?php endif; ?>
</main>
<?php include '../includes/footer.php'; ?>
</body>
</html>