<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=omat_sivut", "jonroi", "Fruktoosi24");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Hae ja näytä sisältö
    $stmt = $pdo->prepare("SELECT * FROM courses");
    $stmt->execute();
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>