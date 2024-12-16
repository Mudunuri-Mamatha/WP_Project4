<?php
$conn = new mysqli("localhost", "mmudunuri2", "mmudunuri2", "mmudunuri2");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $buyer_name = $_POST['buyer_name'];
    $buyer_user_id = $_POST['buyer_user_id'];
    $buyer_email = $_POST['buyer_email'];
    $buyer_password = $_POST['buyer_password'];
    
    // Use prepared statements
    $stmt = $conn->prepare("INSERT INTO buyer_data3 (buyer_name, buyer_user_id, buyer_email, buyer_password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $buyer_name, $buyer_user_id, $buyer_email, $buyer_password);
    

    if ($stmt->execute()) {
        echo "Buyer Data Inserted successfully!\n";
        header("location: login.php");
    } else {
        echo "Error inserting Buyer data: " . $stmt->error;
    }

    $stmt->close();
    $result = $conn->query("SELECT * FROM buyer_data3");

}

$conn->close();
?>