<?php
require("db.php");

// need to seller to access dashboard
session_start();

$username = $_SESSION['seller_user_id'];

// Query properties of current logged-in seller
$sql = "SELECT * from cards WHERE seller='$username'";
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="Tooplate">

        <title>Properties Listing Page</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link href="css/owl.carousel.min.css" rel="stylesheet">
        <link href="css/tooplate-moso-interior.css" rel="stylesheet">

        <style>
            /* Add some spacing between the buttons */
            .flip-card-back a {
                margin-right: 10px; /* Adds space between the buttons */
            }
            /* Ensure the buttons are displayed inline and have the same vertical alignment */
            .flip-card-back a.btn {
                display: inline-block;
                vertical-align: middle;
            }

        </style>
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
                            <h1 class="text-white">Property Listing</h1>
                        </div>
                    </div>
                </div>
            </header>

            <section class="shop-section section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <h2>Properties</h2>

                            <div class="row">

                            <?php
                            // connect to the database
                            $pdo = new PDO('mysql:host=localhost;dbname=ssivakumar5', 'ssivakumar5', 'ssivakumar5');

                            // query to retrieve the data from the database
                            $sql = "SELECT * FROM card";
                            $stmt = $pdo->query($sql);

                            foreach ($stmt as $row) {
                                $image_path = 'img/' . $row['image'];
                            
                                echo '<div class="col-lg-3 col-md-4 col-sm-6 property-card-wrapper">';
                                echo '<div class="flip-card">';
                                echo '<div class="flip-card-inner">';
                                echo '<div class="flip-card-front">';
                                echo '<img src="' . $image_path . '" alt="Property Image" class="img-fluid">';
                                echo '</div>';
                                echo '<div class="flip-card-back">';
                                echo '<h2><b> Apartment: </b>' . $row['name'] . '</h2>';
                                echo '<p><b> Address: </b>' . $row['address'] . '</p>';
                                echo '<p><b> Age: </b>' . $row['age'] . '</p>';
                                echo '<p><b>No. of Beds: </b>' . $row['bed'] . '</p>';
                                echo '<p><b>No. of Baths: </b>' . $row['ad'] . '</p>';
                                echo '<p><b>Garden available: </b>' . $row['garden'] . '</p>';
                                echo '<p><b>Parking available: </b>' . $row['pa'] . '</p>';
                                echo '<p><b>Price: </b>' . $row['tax'] . '</p>';
                                echo '<a href="edit_property.php?id=' . $row['id'] . '" class="btn btn-primary">Edit</a>';
                                echo '<a href="delete_property.php?id=' . $row['id'] . '" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this property?\')">Delete</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                            ?>
                            

                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="flip-card1">
                                    <a href="form.html"><img src="img/plus.jpg" alt="Add New Property" class="img-fluid"></a>
                                </div>
                            </div>

                            </div> <!-- End of row -->
                        </div>
                    </div>
                </div>
            </section>

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#36363e" fill-opacity="1" d="M0,96L40,117.3C80,139,160,181,240,186.7C320,192,400,160,480,149.3C560,139,640,149,720,176C800,203,880,245,960,250.7C1040,256,1120,224,1200,229.3C1280,235,1360,277,1400,298.7L1440,320L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>
        </main>

        <footer class="site-footer section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-5 col-12 mb-3">
                        <h3><a href="index.php" class="custom-link mb-1">UrbanNest Plaza</a></h3>
                        <p class="text-white">Since 2023, We Sold Beautiful Homes for Better Lives</p>
                    </div>

                    <div class="col-lg-3 col-md-3 col-12 ms-lg-auto mb-3">
                        <h3 class="text-white mb-3">Store</h3>
                        <p class="text-white mt-2">
                            <i class="bi-geo-alt"></i>
                            Atlanta, Georgia
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-4 col-12 mb-3">
                        <h3 class="text-white mb-3">Contact Info</h3>
                        <p class="text-white mb-1">
                            <i class="bi-telephone me-1"></i>
                            <a href="tel: 090-080-0760" class="text-white">123-456-7890</a>
                        </p>
                        <p class="text-white mb-0">
                            <i class="bi-envelope me-1"></i>
                            <a href="mailto:info@company.com" class="text-white">info@company.com</a>
                        </p>
                    </div>

                    <div class="col-lg-6 col-md-7 copyright-text-wrap col-12 d-flex flex-wrap align-items-center mt-4 ms-auto">
                        <p class="copyright-text mb-0 me-4">Copyright © UrbanNest Plaza 2023</p>
                        <ul class="social-icon">
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link social-icon-twitter bi-twitter"></a>
                            </li>
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link social-icon-facebook bi-facebook"></a>
                            </li>
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link social-icon-instagram bi-instagram"></a>
                            </li>
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link social-icon-pinterest bi-pinterest"></a>
                            </li>
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link social-icon-whatsapp bi-whatsapp"></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </footer>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/jquery.backstretch.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/custom.js"></script>

    </body>

    <!-- CSS styles for the card -->
    <style>
    .property-card-wrapper {
        margin-bottom: 100px; /* Add vertical space between rows */
    }
    .property-card-wrapper > div {
        margin-right: 15px; /* Add horizontal space between cards */
    }
    .row {
        margin-left: -15px; /* Adjust row spacing to accommodate card spacing */
        margin-right: -15px;
    }

        .flip-card1 {
            background-color: #fde172;
            height: 400px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .flip-card1 img {
            max-width: 100%;
            max-height: 100%;
        }
        .flip-card {
            background-color: transparent;
            width: 100%;
            height: 400px;
            border: 1px solid #f1f1f1;
            perspective: 1000px;
        }
        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: left;
            transition: transform 0.8s;
            transform-style: preserve-3d;
        }
        .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
        }
        .flip-card-front, .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            color: black;
            backface-visibility: hidden;
        }
        .flip-card-front {
            background-color: #bbb;
        }
        .flip-card-front img {
            height: 400px;
            width: 100%;
        }
        .flip-card-back {
            background-color: #fde172;
            color: #2C332B;
            text-align: left;
            transform: rotateY(180deg);
        }
        .flip-card-back p {
            text-align: left;
            color: #2C332B;
        }
        .row {
            margin-left: 0;
            margin-right: 0;
        }
    </style>
</html>
