<?php
$conn = new mysqli("localhost", "ssivakumar5", "ssivakumar5", "ssivakumar5");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to the database.";
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user inputs
    $seller_name = $conn->real_escape_string($_POST['seller_name']);
    $seller_user_id = $conn->real_escape_string($_POST['seller_user_id']);
    $seller_email = $conn->real_escape_string($_POST['seller_email']);
    $seller_password = password_hash($_POST['seller_password'], PASSWORD_BCRYPT); // Hash the password

    // Prepare the SQL statement
// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO seller_data3 (seller_name, seller_user_id, seller_email, seller_password) VALUES (?, ?, ?, ?)");

// Check if the statement preparation was successful
if ($stmt === false) {
    echo "Error preparing statement: " . $conn->error;
} else {
    // Bind parameters to the prepared statement
    $stmt->bind_param("ssss", $seller_name, $seller_user_id, $seller_email, $seller_password);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Seller Data Inserted successfully!\n";
        header("location: login.php"); // Redirect after successful insert
        exit; // Ensure no further execution after redirect
    } else {
        // Log the error for debugging (optional)
        error_log("Error inserting Seller data: " . $stmt->error);
        echo "Error inserting Seller data.";
    }

    // Close the prepared statement
    $stmt->close();

    }
}

// Optionally display all rows in seller_data (for debugging or confirmation)
$result = $conn->query("SELECT * FROM seller_data3");
if ($result->num_rows > 0) {
    echo "<h3>Current Sellers:</h3>";
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["seller_id"] . " - Name: " . $row["seller_name"] . " - Email: " . $row["seller_email"] . "<br>";
    }
}

$conn->close();
?>
