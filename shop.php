<?php
$pageTitle = 'Kocie Centrum | Sklep';
require_once 'config/db.php';
require_once 'includes/functions.php';
$products = fetchAll($pdo, "SELECT * FROM products ORDER BY featured DESC, price ASC");
require_once 'includes/header.php';
?>
<section class="page-hero compact">
    <div class="container">
        <span class="eyebrow">Sklep</span>
        <h1>Akcesoria inspirowane kocim stylem</h1>
        <p>Prezentacyjny sklep z kartami produktów, cenami i wyróżnionymi kolekcjami.</p>
    </div>
</section>
<section class="section">
    <div class="container card-grid three">
        <?php foreach ($products as $product): ?>
            <article class="glass-card product-card reveal">
                <img class="card-thumb" src="<?php echo esc($product['image']); ?>" alt="<?php echo esc($product['name']); ?>" width="600" height="420" loading="lazy">
                <div class="card-body">
                    <div class="tag-row">
                        <span class="tag"><?php echo esc($product['category']); ?></span>
                        <?php if ((int)$product['featured'] === 1): ?><span class="tag soft">Bestseller</span><?php endif; ?>
                    </div>
                    <h3><?php echo esc($product['name']); ?></h3>
                    <p><?php echo esc($product['description']); ?></p>
                    <div class="product-row">
                        <strong><?php echo number_format((float)$product['price'], 2, ',', ' '); ?> zł</strong>
                        <button class="btn btn-primary add-cart" data-product="<?php echo esc($product['name']); ?>">Dodaj</button>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
<div class="cart-toast" id="cartToast" aria-live="polite"></div>
<?php require_once 'includes/footer.php'; ?>
