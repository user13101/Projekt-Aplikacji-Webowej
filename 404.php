<?php
http_response_code(404);
$pageTitle = 'Kocie Centrum | Nie znaleziono strony';
$baseHref = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/test/404.php')), '/') . '/';
require_once __DIR__ . '/includes/header.php';
?>
<section class="page-hero compact">
    <div class="container">
        <span class="eyebrow">Błąd 404</span>
        <h1>Ups — tej strony nie ma</h1>
        <p>Strona, której szukasz, mogła zostać przeniesiona, usunięta albo adres został wpisany niepoprawnie.</p>
        <div class="hero-actions">
            <a class="btn btn-primary" href="index.php">Wróć na stronę główną</a>
            <a class="btn btn-ghost" href="cats.php">Zobacz koty</a>
            <a class="btn btn-ghost" href="contact.php">Kontakt</a>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <article class="glass-card reveal">
            <div class="card-body">
                <h2>Przydatne linki</h2>
                <p>Możesz przejść do <a class="text-link" href="adoption.php">adopcji</a>, <a class="text-link" href="blog.php">poradnika</a> lub <a class="text-link" href="shop.php">sklepu</a>.</p>
            </div>
        </article>
    </div>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
