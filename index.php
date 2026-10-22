<?php
$pageTitle = 'Kocie Centrum | Start';
require_once 'config/db.php';
require_once 'includes/functions.php';
$featuredCats = fetchAll($pdo, "SELECT * FROM cats ORDER BY featured DESC, id DESC LIMIT 3");
$latestPosts = fetchAll($pdo, "SELECT * FROM blog_posts ORDER BY created_at DESC LIMIT 3");
$testimonials = fetchAll($pdo, "SELECT * FROM testimonials ORDER BY id DESC LIMIT 4");
require_once 'includes/header.php';
?>
<section class="hero-section">
    <div class="container hero-grid">
        <div class="hero-copy reveal">
            <span class="eyebrow">Kocie uniwersum</span>
            <h1>Portal o kotach z adopcjami, poradnikiem i sklepem.</h1>
            <div class="hero-actions">
                <button class="btn btn-primary" onclick="losujKota()">Wylosuj kota</button>
            </div>
        </div>
            <div class="hero-art reveal" aria-hidden="true">
                <div>
                <img id="kot" src="assets/img/cat.svg" alt="Ilustracja kota" width="640" height="640">
            </div>
        </div>

    </div>
</section>

<section class="section">
    <div class="container section-head">
        <div>
            <span class="eyebrow">Wybrane koty</span>
            <h2>Najbardziej charakterne futrzaki</h2>
        </div>
        <a class="text-link" href="cats.php">Przejdź do pełnej listy</a>
    </div>
    <div class="container card-grid three">
        <?php foreach ($featuredCats as $cat): ?>
            <article class="glass-card reveal">
                <img class="card-thumb" src="<?php echo esc($cat['image']); ?>" alt="<?php echo esc($cat['name']); ?>" width="600" height="420" loading="lazy">
                <div class="card-body">
                    <div class="tag-row">
                        <span class="tag"><?php echo esc($cat['breed']); ?></span>
                        <span class="tag soft"><?php echo esc($cat['age']); ?> lata</span>
                    </div>
                    <h3><?php echo esc($cat['name']); ?></h3>
                    <p><?php echo esc($cat['short_description']); ?></p>
                    <a class="btn btn-ghost" href="cat.php?id=<?php echo (int)$cat['id']; ?>">Profil kota</a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="section">
    <div class="container section-head">
        <div>
            <span class="eyebrow">Poradnik</span>
            <h2>Najnowsze artykuły dla opiekunów kotów</h2>
        </div>
        <a class="text-link" href="blog.php">Więcej wpisów</a>
    </div>
    <div class="container card-grid three">
        <?php foreach ($latestPosts as $post): ?>
            <article class="glass-card reveal">
                <div class="card-body">
                    <span class="tag"><?php echo esc($post['category']); ?></span>
                    <h3><?php echo esc($post['title']); ?></h3>
                    <p><?php echo esc($post['excerpt']); ?></p>
                    <a class="btn btn-ghost" href="blog.php#post-<?php echo (int)$post['id']; ?>">Czytaj streszczenie</a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="section testimonials-section">
    <div class="container section-head">
        <div>
            <span class="eyebrow">Opinie</span>
            <h2>Co mówią nowi opiekunowie kotów?</h2>
        </div>
    </div>
    <div class="container testimonial-grid">
        <?php foreach ($testimonials as $item): ?>
            <article class="testimonial reveal">
                <p>“<?php echo esc($item['content']); ?>”</p>
                <div>
                    <strong><?php echo esc($item['author']); ?></strong>
                    <span><?php echo esc($item['role']); ?></span>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
<?php require_once 'includes/footer.php'; ?>
