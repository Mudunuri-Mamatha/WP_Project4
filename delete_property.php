<?php
require("db.php");
session_start();

// Check if the user is logged in
if (!isset($_SESSION['seller_user_id'])) {
    header("Location: login.php");
    exit;
}

// Get the property ID from the URL
$property_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$property_id) {
    echo "Invalid property ID.";
    exit;
}

// Connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=ssivakumar5', 'ssivakumar5', 'ssivakumar5');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Delete the property
$stmt = $pdo->prepare("DELETE FROM card WHERE id = :id");
$stmt->execute(['id' => $property_id]);

// Redirect to the seller dashboard
header("Location: seller_dashboard.php");
exit;
?>
