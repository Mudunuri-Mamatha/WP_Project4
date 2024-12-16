<?php
$conn = new mysqli("localhost", "ssivakumar5", "ssivakumar5", "ssivakumar5");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $seller_user_id = $_POST['seller_user_id_login'];
    $seller_password = $_POST['seller_password_login'];
    
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM seller_data3 WHERE seller_user_id = ?");
    $stmt->bind_param("s", $seller_user_id);
    $stmt->execute();

    // Fetch the result set using get_result() instead of mysqli_query
    $result = $stmt->get_result();

    // Check if the seller exists
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($seller_password, $row['seller_password'])) {
            // Free result and close the statement before redirecting
            $result->free();
            $stmt->close();
            
            // If successful, redirect to the dashboard
            header("Location: seller_dashboard.php");
            exit();
        } else {
            // Free result and close the statement before redirecting
            $result->free();
            $stmt->close();
            
            // If password is incorrect, redirect back with an error
            header("Location: login.php?error=invalid");
            exit();
        }
    } else {
        // Free result and close the statement before redirecting
        $result->free();
        $stmt->close();
        
        // If no matching user is found, redirect back with an error
        header("Location: login.php?error=invalid");
        exit();
    }
}

$conn->close();
?>
