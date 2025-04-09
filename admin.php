<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

include("includes/db.php");
include("includes/header.php");

// Alle Anfragen abrufen
$stmt = $pdo->query("SELECT * FROM kontaktanfragen ORDER BY datum DESC");
$anfragen = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="hero">
    <h1>Adminbereich</h1>
    <a href="logout.php">Logout</a>
    <p>Alle eingegangenen Kontaktanfragen im Überblick.</p>
</div>

<div class="content-wrapper">
    <div class="card">
        <?php if (count($anfragen) === 0): ?>
            <p>Es liegen noch keine Anfragen vor.</p>
        <?php else: ?>
            <div class="admin-table">
                <table>
                    <thead>
                        <tr>
                            <th>Datum</th>
                            <th>Vorname</th>
                            <th>Nachname</th>
                            <th>Firma</th>
                            <th>E-Mail</th>
                            <th>Nachricht</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($anfragen as $eintrag): ?>
                            <tr>
                                <td><?php echo date('d.m.Y H:i', strtotime($eintrag['datum'])); ?></td>
                                <td><?php echo htmlspecialchars($eintrag['vorname']); ?></td>
                                <td><?php echo htmlspecialchars($eintrag['nachname']); ?></td>
                                <td><?php echo htmlspecialchars($eintrag['firma']); ?></td>
                                <td><?php echo htmlspecialchars($eintrag['email']); ?></td>
                                <td><?php echo nl2br(htmlspecialchars($eintrag['nachricht'])); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include("includes/footer.php"); ?>
