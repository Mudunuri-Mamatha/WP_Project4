<?php
require("db.php");

// Session for buyer access
session_start();

$username = $_SESSION['buyer_user_id'];

// Check if this is the buyer's first login
if (!isset($_SESSION['first_login'])) {
    $_SESSION['first_login'] = true;
    $first_login = true;
} else {
    $first_login = false;
}

// Connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=mmudunuri2', 'mmudunuri2', 'mmudunuri2');

// Handle search functionality
$search_query = '';
$search_results = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_query = trim($_POST['search']); // Trim whitespace for accurate search

    // Only include conditions if search_query is not empty
    if (!empty($search_query)) {
        $sql = "SELECT * FROM card WHERE name LIKE :query OR address LIKE :query";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['query' => "%$search_query%"]);
    } else {
        // Fallback to the default query when no search term is provided
        $sql = "SELECT * FROM card";
        $stmt = $pdo->query($sql);
    }
} else {
    // Default query to show all properties
    $sql = "SELECT * FROM card";
    $stmt = $pdo->query($sql);
}

// Fetch results
$search_results = $stmt->fetchAll();


// Handle wishlist functionality
if (isset($_GET['wishlist_id'])) {
    $wishlist_id = $_GET['wishlist_id'];
    $sql = "INSERT INTO wishlist (buyer, property_id) VALUES (:buyer, :property_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['buyer' => $username, 'property_id' => $wishlist_id]);
}

// Fetch wishlist items
$wishlist_sql = "SELECT card.* FROM wishlist INNER JOIN card ON wishlist.property_id = card.id";
$wishlist_stmt = $pdo->prepare($wishlist_sql);
$wishlist_stmt->execute(); // No parameters needed
$wishlist_items = $wishlist_stmt->fetchAll();

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="Tooplate">

        <title>Available Properties</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link href="css/owl.carousel.min.css" rel="stylesheet">
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
                            <h1 class="text-white">Welcome to Your Dashboard</h1>
                            <?php if ($first_login): ?>
                                <p class="text-white">Thank you for choosing us! Start your property search below.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </header>

            <section class="shop-section section-padding">
                <div class="container">
                    <form method="POST" class="mb-4">
                        <input type="text" name="search" class="form-control" placeholder="Search by address, or number of beds">
                        <button type="submit" class="btn btn-primary mt-2">Search</button>
                    </form>

                    <h2>Search Results</h2>
                    <div class="row">
                        <?php foreach ($search_results as $row): ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img src="img/<?php echo $row['image']; ?>" alt="Property Image" class="img-fluid">
                                        </div>
                                        <div class="flip-card-back">
                                            <h2><b> Apartment: </b><?php echo $row['name']; ?></h2>
                                            <p><b> Address: </b><?php echo $row['address']; ?></p>
                                            <p><b> Beds: </b><?php echo $row['bed']; ?></p>
                                            <p><b> Baths: </b><?php echo $row['ad']; ?></p>
                                            <p><b> Price: </b><?php echo $row['tax']; ?></p>
                                            <a href="buyer_dashboard.php?wishlist_id=<?php echo $row['id']; ?>" class="btn btn-warning">Add to Wishlist</a>
                                            <a href="property_details.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <h2>Your Wishlist</h2>
                    <div class="row">
                        <?php foreach ($wishlist_items as $row): ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img src="img/<?php echo $row['image']; ?>" alt="Property Image" class="img-fluid">
                                        </div>
                                        <div class="flip-card-back">
                                            <h2><b> Apartment: </b><?php echo $row['name']; ?></h2>
                                            <p><b> Address: </b><?php echo $row['address']; ?></p>
                                            <p><b> Beds: </b><?php echo $row['bed']; ?></p>
                                            <p><b> Baths: </b><?php echo $row['ad']; ?></p>
                                            <p><b> Price: </b><?php echo $row['tax']; ?></p>
                                            <a href="property_details.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>
