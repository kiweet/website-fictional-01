<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include("includes/db.php");

    $vorname  = $_POST["firstname"] ?? '';
    $nachname = $_POST["lastname"] ?? '';
    $firma    = $_POST["company"] ?? '';
    $email    = $_POST["email"] ?? '';
    $nachricht = $_POST["message"] ?? '';

    $sql = "INSERT INTO kontaktanfragen (vorname, nachname, firma, email, nachricht)
            VALUES (:vorname, :nachname, :firma, :email, :nachricht)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'vorname'   => $vorname,
        'nachname'  => $nachname,
        'firma'     => $firma,
        'email'     => $email,
        'nachricht' => $nachricht
    ]);

    $successMessage = "Vielen Dank! Deine Nachricht wurde gespeichert.";
}
?>

<?php include("includes/header.php"); ?>

<div class="hero">
    <h1>Kontakt</h1>
    <p>Du möchtest mit mir in Kontakt treten? Schreib mir gern!</p>
</div>

<div class="content-wrapper">
    <div class="card">
        <h2>Schreib mir eine Nachricht</h2>
        <!--Erfolgsmeldung-->
        <?php if (!empty($successMessage)) : ?>
        <p class="success-message"><?php echo $successMessage; ?></p>
        <?php endif; ?>
        <form action="contact.php" method="post" class="contact-form">
        <div class="form-row">
        <div class="form-group">
        <label for="firstname">Vorname *</label>
        <input type="text" id="firstname" name="firstname" required>
        </div>
    <div class="form-group">
        <label for="lastname">Nachname *</label>
        <input type="text" id="lastname" name="lastname" required>
    </div>
</div>

<label for="company">Firma</label>
<input type="text" id="company" name="company" placeholder="Optional">

<label for="email">E-Mail *</label>
<input type="email" id="email" name="email" required>

<label for="message">Nachricht *</label>
<textarea id="message" name="message" rows="6" required></textarea>

<button type="submit" class="btn">Absenden</button>
</form>

    </div>
</div>

<?php include("includes/footer.php"); ?>
