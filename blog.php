<?php
$pageTitle = 'Kocie Centrum | Poradnik';
require_once 'config/db.php';
require_once 'includes/functions.php';
$posts = fetchAll($pdo, "SELECT * FROM blog_posts ORDER BY created_at DESC");
require_once 'includes/header.php';
?>
<section class="page-hero compact">
    <div class="container">
        <span class="eyebrow">Poradnik</span>
        <h1>Praktyczna wiedza o kotach</h1>
        <p>Artykuły z żywienia, zabawy, pielęgnacji i przygotowania domu dla kota.</p>
    </div>
</section>
<section class="section">
    <div class="container blog-layout">
        <?php foreach ($posts as $post): ?>
            <article class="blog-card reveal" id="post-<?php echo (int)$post['id']; ?>">
                <div class="blog-meta">
                    <span class="tag"><?php echo esc($post['category']); ?></span>
                    <span><?php echo esc($post['created_at']); ?></span>
                </div>
                <h2><?php echo esc($post['title']); ?></h2>
                <p><?php echo esc($post['excerpt']); ?></p>
                <details>
                    <summary>Czytaj więcej</summary>
                    <p><?php echo esc($post['content']); ?></p>
                </details>
            </article>
        <?php endforeach; ?>
    </div>
</section>
<?php require_once 'includes/footer.php'; ?>
