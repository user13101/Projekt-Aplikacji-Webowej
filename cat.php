<?php
require_once 'config/db.php';
require_once 'includes/functions.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$cat = fetchOne($pdo, "SELECT * FROM cats WHERE id = :id", ['id' => $id]);
if (!$cat) {
    header('Location: cats.php');
    exit;
}
$pageTitle = 'Kocie Centrum | ' . $cat['name'];
require_once 'includes/header.php';
?>
<section class="section">
    <div class="container detail-layout">
        <div class="detail-image reveal">
            <img src="<?php echo esc($cat['image']); ?>" alt="<?php echo esc($cat['name']); ?>" width="900" height="700">
        </div>
        <div class="detail-copy reveal">
            <span class="eyebrow">Profil kota</span>
            <h1><?php echo esc($cat['name']); ?></h1>
            <p class="lead"><?php echo esc($cat['description']); ?></p>
            <div class="detail-grid">
                <article><strong>Rasa: </strong><span><?php echo esc($cat['breed']); ?></span></article>
                <article><strong>Wiek: </strong><span><?php echo esc($cat['age']); ?> lata</span></article>
                <article><strong>Temperament: </strong><span><?php echo esc($cat['temperament']); ?></span></article>
                <article><strong>Status: </strong><span><?php echo esc($cat['status']); ?></span></article>
            </div>
            <div class="hero-actions">
                <a class="btn btn-primary" href="adoption.php?cat=<?php echo urlencode($cat['name']); ?>">Wypełnij formularz adopcyjny</a>
                <a class="btn btn-ghost" href="cats.php">Wróć do listy</a>
            </div>
        </div>
    </div>
</section>
<?php require_once 'includes/footer.php'; ?>
