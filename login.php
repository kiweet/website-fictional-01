<?php
session_start();

$login_error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $benutzername = $_POST['username'] ?? '';
    $passwort = $_POST['password'] ?? '';

    // 🔐 Beispiel-Login-Daten (später aus DB laden!)
    $admin_user = "admin";
    $admin_pass = "1234"; // ← ändern!

    if ($benutzername === $admin_user && $passwort === $admin_pass) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin.php");
        exit;
    } else {
        $login_error = "Benutzername oder Passwort ist falsch.";
    }
}
?>

<?php include("includes/header.php"); ?>

<div class="hero">
    <h1>Login</h1>
    <p>Bitte melde dich an, um den Adminbereich zu betreten.</p>
</div>

<div class="content-wrapper">
    <div class="card">
        <?php if (!empty($login_error)) : ?>
            <p class="error-message"><?php echo $login_error; ?></p>
        <?php endif; ?>

        <form method="post" class="contact-form" style="max-width: 400px; margin: 0 auto;">
            <label for="username">Benutzername</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Passwort</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</div>

<?php include("includes/footer.php"); ?>
