<?php
header('Content-Type: application/json');
$pdo = new PDO("mysql:host=localhost;dbname=sec2pay", "root", "");

$query = $pdo->query("SELECT id, title, date AS start, description, type FROM leads");
$events = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($events);
?>
