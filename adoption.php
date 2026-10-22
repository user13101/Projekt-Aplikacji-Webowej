<?php
$pageTitle = 'Kocie Centrum | Adopcje';
require_once 'config/db.php';
require_once 'includes/functions.php';
$message = '';
$error = '';
$cats = fetchAll($pdo, "SELECT id, name FROM cats ORDER BY name ASC");
$selectedCat = $_GET['cat'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $city = trim($_POST['city'] ?? '');
    $cat_name = trim($_POST['cat_name'] ?? '');
    $messageText = trim($_POST['message'] ?? '');

    if ($name && $email && $cat_name) {
        $stmt = $pdo->prepare("INSERT INTO adoption_requests (name, email, phone, city, cat_name, message) VALUES (:name, :email, :phone, :city, :cat_name, :message)");
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'city' => $city,
            'cat_name' => $cat_name,
            'message' => $messageText,
        ]);
        $message = 'Dziękujemy! Zgłoszenie adopcyjne zostało zapisane w bazie.';
    } else {
        $error = 'Uzupełnij wymagane pola: imię, e-mail i wybór kota.';
    }
}
require_once 'includes/header.php';
?>
<section class="page-hero compact">
    <div class="container">
        <span class="eyebrow">Adopcje</span>
        <h1>Formularz adopcyjny online</h1>
        <p>Wypełnij formularz, a dane trafią bezpośrednio do tabeli w MySQL.</p>
    </div>
</section>
<section class="section">
    <div class="container adoption-layout">
        <div class="glass-card reveal">
            <div class="card-body">
                <h2>Jak wygląda proces?</h2>
                <ol class="step-list">
                    <li>Wybierz kota z bazy.</li>
                    <li>Wypełnij formularz adopcyjny.</li>
                    <li>Poczekaj na kontakt opiekuna.</li>
                    <li>Umów spotkanie i przygotuj dom.</li>
                </ol>
                <img src="assets/img/cat-adopt.svg" alt="Ilustracja kota czekającego na adopcję" width="640" height="480" loading="lazy">
            </div>
        </div>
        <div class="glass-card reveal">
            <div class="card-body">
                <h2>Wyślij zgłoszenie</h2>
                <?php if ($message): ?><div class="alert success"><?php echo esc($message); ?></div><?php endif; ?>
                <?php if ($error): ?><div class="alert error"><?php echo esc($error); ?></div><?php endif; ?>
                <form class="styled-form" method="post" action="">
                    <label>Imię i nazwisko *
                        <input type="text" name="name" required>
                    </label>
                    <label>Adres e-mail *
                        <input type="email" name="email" required>
                    </label>
                    <label>Telefon
                        <input type="text" name="phone">
                    </label>
                    <label>Miasto
                        <input type="text" name="city">
                    </label>
                    <label>Wybrany kot *
                        <select name="cat_name" required>
                            <option value="">-- wybierz kota --</option>
                            <?php foreach ($cats as $cat): ?>
                                <option value="<?php echo esc($cat['name']); ?>" <?php echo $selectedCat === $cat['name'] ? 'selected' : ''; ?>><?php echo esc($cat['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label>Dlaczego chcesz adoptować kota?
                        <textarea name="message" rows="5"></textarea>
                    </label>
                    <button class="btn btn-primary" type="submit">Zapisz zgłoszenie</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require_once 'includes/footer.php'; ?>
