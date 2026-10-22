<?php
$pageTitle = 'Kocie Centrum | Kontakt';
require_once 'config/db.php';
require_once 'includes/functions.php';
$message = '';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $topic = trim($_POST['topic'] ?? '');
    $content = trim($_POST['content'] ?? '');
    if ($name && $email && $content) {
        $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, topic, content) VALUES (:name, :email, :topic, :content)");
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'topic' => $topic,
            'content' => $content,
        ]);
        $message = 'Wiadomość została zapisana w bazie danych.';
    } else {
        $error = 'Uzupełnij wymagane pola formularza kontaktowego.';
    }
}
require_once 'includes/header.php';
?>
<section class="page-hero compact">
    <div class="container">
        <span class="eyebrow">Kontakt</span>
        <h1>Skontaktuj się z Kocim Centrum</h1>
        <p>Formularz kontaktowy zapisuje zapytania w bazie, dzięki czemu możesz je przeglądać w panelu.</p>
    </div>
</section>
<section class="section">
    <div class="container adoption-layout">
        <article class="glass-card reveal">
            <div class="card-body">
                <h2>Dane kontaktowe</h2>
                <p>E-mail: kontakt@kociecentrum.local</p>
                <p>Telefon: +48 555 222 111</p>
                <p>Godziny: pon.-pt. 9:00–18:00</p>
                <img src="assets/img/cat-contact.svg" alt="Ilustracja kota z listem" width="640" height="480" loading="lazy">
            </div>
        </article>
        <article class="glass-card reveal">
            <div class="card-body">
                <h2>Napisz wiadomość</h2>
                <?php if ($message): ?><div class="alert success"><?php echo esc($message); ?></div><?php endif; ?>
                <?php if ($error): ?><div class="alert error"><?php echo esc($error); ?></div><?php endif; ?>
                <form class="styled-form" method="post" action="">
                    <label>Imię *
                        <input type="text" name="name" required>
                    </label>
                    <label>E-mail *
                        <input type="email" name="email" required>
                    </label>
                    <label>Temat
                        <input type="text" name="topic">
                    </label>
                    <label>Treść wiadomości *
                        <textarea name="content" rows="6" required></textarea>
                    </label>
                    <button class="btn btn-primary" type="submit">Wyślij wiadomość</button>
                </form>
            </div>
        </article>
    </div>
</section>
<?php require_once 'includes/footer.php'; ?>
