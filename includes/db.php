<?php
$host = 'localhost';
$dbname = 'WebsiteAboutMe';
$username = 'root'; // bei XAMPP oft "root"
$password = '';     // Passwort leer lassen bei XAMPP

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Fehler als Exception ausgeben
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Verbindung fehlgeschlagen: " . $e->getMessage());
}
?>
