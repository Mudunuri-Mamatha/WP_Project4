<?php
require("db.php");

// Start session
session_start();

// Check if property ID is provided
if (!isset($_GET['id'])) {
    echo "Property ID not provided.";
    exit;
}

// Get the property ID
$property_id = $_GET['id'];

// Fetch property details from the database
$pdo = new PDO('mysql:host=localhost;dbname=mmudunuri2', 'mmudunuri2', 'mmudunuri2');
$sql = "SELECT * FROM card WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $property_id]);
$property = $stmt->fetch();

if (!$property) {
    echo "Property not found.";
    exit;
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="Property Details">
        <meta name="author" content="Tooplate">

        <title>Property Details</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link href="css/tooplate-moso-interior.css" rel="stylesheet">
    </head>
    
    <body class="shop-listing-page">

        <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php">Urban<span class="tooplate-red">Nest </span><span class="tooplate-green">Plaza</span></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="index.php#section_1">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="index.php#section_2">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <header class="site-header d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <h1 class="text-white">Property Details</h1>
                        </div>
                    </div>
                </div>
            </header>

            <section class="property-details-section section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <img src="img/<?php echo $property['image']; ?>" alt="Property Image" class="img-fluid">
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <h2><?php echo $property['name']; ?></h2>
                            <p><b>Address:</b> <?php echo $property['address']; ?></p>
                            <p><b>Age:</b> <?php echo $property['age']; ?> years</p>
                            <p><b>Number of Beds:</b> <?php echo $property['bed']; ?></p>
                            <p><b>Number of Baths:</b> <?php echo $property['ad']; ?></p>
                            <p><b>Garden:</b> <?php echo $property['garden'] ? 'Yes' : 'No'; ?></p>
                            <p><b>Parking:</b> <?php echo $property['pa'] ? 'Yes' : 'No'; ?></p>
                            <p><b>Price:</b> $<?php echo number_format($property['tax'], 2); ?></p>
                        </div>
                    </div>
                </div>
            </section>

        </main>

        <footer class="site-footer section-padding">
            <!-- Footer content remains unchanged -->
        </footer>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/jquery.backstretch.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>
