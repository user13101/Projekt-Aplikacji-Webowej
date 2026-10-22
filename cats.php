<?php
$pageTitle = 'Kocie Centrum | Baza kotów';
require_once 'config/db.php';
require_once 'includes/functions.php';
$cats = fetchAll($pdo, "SELECT * FROM cats ORDER BY name ASC");
require_once 'includes/header.php';
?>
<section class="page-hero compact">
    <div class="container">
        <span class="eyebrow">Baza kotów</span>
        <h1>Poznaj nasze koty i ich osobowości</h1>
        <p>Każdy profil zawiera rasę, wiek, temperament, status adopcji oraz zdjęcie.</p>
    </div>
</section>
<section class="section">
    <div class="container filter-bar">
        <input type="text" id="catSearch" placeholder="Wyszukaj kota po imieniu lub rasie..." aria-label="Wyszukaj kota">
        <select id="statusFilter" aria-label="Filtruj po statusie">
            <option value="all">Wszystkie statusy</option>
            <option value="Dostępny">Dostępny</option>
            <option value="W trakcie adopcji">W trakcie adopcji</option>
            <option value="Zarezerwowany">Zarezerwowany</option>
        </select>
    </div>
    <div class="container card-grid three" id="catGrid">
        <?php foreach ($cats as $cat): ?>
            <article class="glass-card cat-item reveal" data-name="<?php echo esc(strtolower($cat['name'])); ?>" data-breed="<?php echo esc(strtolower($cat['breed'])); ?>" data-status="<?php echo esc($cat['status']); ?>">
                <img class="card-thumb" src="<?php echo esc($cat['image']); ?>" alt="<?php echo esc($cat['name']); ?>" width="600" height="420" loading="lazy">
                <div class="card-body">
                    <div class="tag-row">
                        <span class="tag"><?php echo esc($cat['status']); ?></span>
                        <span class="tag soft"><?php echo esc($cat['temperament']); ?></span>
                    </div>
                    <h3><?php echo esc($cat['name']); ?></h3>
                    <p><?php echo esc($cat['short_description']); ?></p>
                    <div class="meta-list">
                        <span>Rasa: <?php echo esc($cat['breed']); ?></span>
                        <span>Wiek: <?php echo esc($cat['age']); ?> lata</span>
                    </div>
                    <a class="btn btn-primary" href="cat.php?id=<?php echo (int)$cat['id']; ?>">Zobacz profil</a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
<?php require_once 'includes/footer.php'; ?>
