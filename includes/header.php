<?php
if (!isset($pageTitle)) {
    $pageTitle = 'Kocie Centrum';
}
$current = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <meta name="description" content="Rozbudowana strona o kotach zgodna z XAMPP: adopcje, blog, galeria, sklep i panel opinii.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<a class="skip-link" href="#main-content">Przejdź do treści</a>
<div class="site-shell">
<header class="site-header">
    <div class="container nav-wrap">
        <a class="brand" href="index.php" aria-label="Kocie Centrum - strona główna">
            <span class="brand-mark" aria-hidden="true">
                <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 24L12 7L27 18H37L52 7L47 24C51.4 28 54 33.4 54 39C54 50.6 44.2 58 32 58C19.8 58 10 50.6 10 39C10 33.4 12.6 28 17 24Z" stroke="currentColor" stroke-width="4" stroke-linejoin="round"/>
                    <path d="M23 36C24.7 36 26 34.7 26 33C26 31.3 24.7 30 23 30C21.3 30 20 31.3 20 33C20 34.7 21.3 36 23 36Z" fill="currentColor"/>
                    <path d="M41 36C42.7 36 44 34.7 44 33C44 31.3 42.7 30 41 30C39.3 30 38 31.3 38 33C38 34.7 39.3 36 41 36Z" fill="currentColor"/>
                    <path d="M32 36V42" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
                    <path d="M26 45C28 47 30 48 32 48C34 48 36 47 38 45" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
                    <path d="M14 39H4" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                    <path d="M60 39H50" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                </svg>
            </span>
            <span>
                <strong>Kocie Centrum</strong>
                <small>portal miłośników kotów</small>
            </span>
        </a>

        <button class="mobile-toggle" id="mobileToggle" aria-expanded="false" aria-controls="primaryNav">Menu</button>

        <nav class="primary-nav" id="primaryNav" aria-label="Główna nawigacja">
            <a href="index.php" class="<?php echo $current === 'index.php' ? 'active' : ''; ?>">Start</a>
            <a href="cats.php" class="<?php echo $current === 'cats.php' ? 'active' : ''; ?>">Koty</a>
            <a href="adoption.php" class="<?php echo $current === 'adoption.php' ? 'active' : ''; ?>">Adopcje</a>
            <a href="blog.php" class="<?php echo $current === 'blog.php' ? 'active' : ''; ?>">Poradnik</a>
            <a href="shop.php" class="<?php echo $current === 'shop.php' ? 'active' : ''; ?>">Sklep</a>
            <a href="contact.php" class="<?php echo $current === 'contact.php' ? 'active' : ''; ?>">Kontakt</a>
        </nav>
    </div>
</header>
<main id="main-content">
