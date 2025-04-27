<?php
$menuItems = [
    'Главная' => '/index.php',
    'О нас' => '/pages/about.php',
    'Контакты' => '/pages/contact.php'
];
?>

<header>
    <nav class="main-nav">
        <div class="nav-container">
            <div class="menu-toggle">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            
            <ul class="nav-links">
                <?php foreach ($menuItems as $title => $url): ?>
                    <li>
                        <a href="<?= $url ?>" class="<?= $_SERVER['REQUEST_URI'] == $url ? 'active' : '' ?>">
                            <?= $title ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </nav>
</header>