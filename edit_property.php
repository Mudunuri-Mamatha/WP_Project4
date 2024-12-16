<?php
require("db.php");
session_start();

// Check if a property ID is provided in the URL
$property_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$property_id) {
    echo "Invalid property ID.";
    exit;
}

// Fetch the existing property details
$pdo = new PDO('mysql:host=localhost;dbname=ssivakumar5', 'ssivakumar5', 'ssivakumar5');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Query to get the property details
$stmt = $pdo->prepare("SELECT * FROM card WHERE id = :id");
$stmt->execute(['id' => $property_id]);

// Fetch the property details
$property = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$property) {
    echo "Property not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Description" content="Password">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Property</title>
    <style>
        /* Style for the labels */
/* Style for the labels */
/* Style for the labels */
label {
    color: black;
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
    font-size: 15px;
}

/* Add some margin for the fields to create space between each label and input */
.field.space {
    margin-bottom: 20px;
}

/* Make sure inputs are not too close to the labels */
.pass-key {
    width: 100%;
    padding: 10px;  /* Provides padding for space inside the input box */
    margin-top: 5px;
    box-sizing: border-box;  /* Ensures padding does not affect input width */
    line-height: 1.5;  /* This helps center the content vertically */
    text-align: left;  /* Aligns the text to the left inside the input box */
}

/* Style for the form */
.content {
    padding: 20px;
    margin: 0 auto;
    max-width: 500px;
}

header {
    font-size: 1.5em;
    margin-bottom: 20px;
    text-align: center;
}

.field input[type="submit"] {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 1.1em;
    cursor: pointer;
    width: 100%;
}

.field input[type="submit"]:hover {
    background-color: #0056b3;
}


    </style>
</head>

<body class="login">
    <div class="logout">
        <a href="logout.php">Logout</a>
    </div>
    <div class="home">
        <a href="index.php">Home</a>
    </div>
    <div class="content">
        <header>Edit Property</header>
        <!-- Form to edit the property details -->
        <form action="update_property.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $property['id']; ?>">

            <div class="field space">
                <label for="address">Address of the Property</label>
                <input type="text" class="pass-key" name="address" id="address" value="<?php echo htmlspecialchars($property['address']); ?>" required placeholder="Address of the Property?">
            </div>
            <div class="field space">
                <label for="age">How old is the Property?</label>
                <input type="text" class="pass-key" name="age" id="age" value="<?php echo htmlspecialchars($property['age']); ?>" required placeholder="How old is the Property?">
            </div>
            <div class="field space">
                <label for="bed">No of Beds in the Property?</label>
                <input type="text" class="pass-key" name="bed" id="bed" value="<?php echo htmlspecialchars($property['bed']); ?>" required placeholder="Number of Beds in the Property?">
            </div>
            <div class="field space">
                <label for="ad">No of Baths in the Property?</label>
                <input type="text" class="pass-key" name="ad" id="ad" value="<?php echo htmlspecialchars($property['ad']); ?>" required placeholder="Number of Bathrooms in the Property?">
            </div>
            <div class="field space">
                <label for="garden">Is Garden available?</label>
                <input type="text" class="pass-key" name="garden" id="garden" value="<?php echo htmlspecialchars($property['garden']); ?>" required placeholder="Is Garden available?">
            </div>
            <div class="field space">
                <label for="pa">Is Parking Available?</label>
                <input type="text" class="pass-key" name="pa" id="pa" value="<?php echo htmlspecialchars($property['pa']); ?>" required placeholder="Is Parking Available?">
            </div>
            <div class="field space">
                <label for="tax">Price of the Property?</label>
                <input type="text" class="pass-key" name="tax" id="tax" value="<?php echo htmlspecialchars($property['tax']); ?>" required placeholder="Price of the Property?">
            </div>
            <div class="field space">
                <label for="file">Upload a New Image</label>
                <input type="file" class="pass-key" name="file" id="file" placeholder="Upload a New Image">
            </div>
            <div class="field">
                <input type="submit" name="submit" id="submit" value="Update Property">
            </div>
        </form>
    </div>
</body>
</html>
