<?php
include '../includes/db.php';
include '../includes/header.php';

$result = pg_query($conn, "SELECT * FROM articles ORDER BY created_at DESC");
$articles = pg_fetch_all($result) ?: [];
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
<main class="articles-container">
    <h1>Наши статьи</h1>
    <?php if (empty($articles)): ?>
        <div class="no-articles">
            <i class="fas fa-book-open"></i>
            <p>Пока нет ни одной статьи. Будьте первым!</p>
        </div>
    <?php else: ?>
        <div class="articles-list">
            <?php foreach ($articles as $article): ?>
                <article class="article-card">
                    <h2><?= htmlspecialchars($article['title']) ?></h2>
                    <p><?= htmlspecialchars($article['content']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>
<?php include '../includes/footer.php'; ?>
</body>
</html>