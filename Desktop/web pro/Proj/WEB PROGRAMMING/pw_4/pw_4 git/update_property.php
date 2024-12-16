<?php
require("db.php"); // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $property_id = $_POST['id'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $bed = $_POST['bed'];
    $ad = $_POST['ad'];
    $garden = $_POST['garden'];
    $pa = $_POST['pa'];
    $tax = $_POST['tax'];

    // Get file data (image upload)
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    // Set upload directory
    $upload_dir = 'img/';

    // Initialize image path to use existing image if no new one is uploaded
    if (empty($file_name)) {
        // If no new image is uploaded, retain the old image
        $sql = "SELECT image FROM card WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $property_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $property = $result->fetch_assoc();
        $image_path = $property['image']; // Retain the old image if no new one is uploaded
    } else {
        // If a new file is uploaded, move it to the upload directory
        $image_path = $file_name;
        move_uploaded_file($file_tmp, $upload_dir . $file_name);  // Move file to img directory
    }

    // Update the property details in the database
    $sql = "UPDATE card SET address = ?, age = ?, bed = ?, ad = ?, garden = ?, pa = ?, tax = ?, image = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siisssssi", $address, $age, $bed, $ad, $garden, $pa, $tax, $image_path, $property_id);

    if ($stmt->execute()) {
        // Redirect to the seller dashboard after the update
        header("Location: seller_dashboard.php");
        exit;
    } else {
        echo "Error updating property: " . $stmt->error;
    }
}
?>
