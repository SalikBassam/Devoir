<?php
session_start();
include './connect.php';

$query = "SELECT * FROM products";
$result = $conn->query($query);

if ($result->rowCount() > 0) {
    $products = $result->fetchAll(PDO::FETCH_ASSOC);
} else {
    $products = []; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <title>BESTBUY | Ecommerce Website</title>
</head>
 
<body>
<header class="bg-dark">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="index.php">
                    <img src="img/logo.png" alt="BESTBUY Logo" width="120">
                </a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link text-light" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="products.php">Products</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="#contact">Contact</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>
                    </ul>
            <?php
            if (isset($_SESSION['client_id'])) {
                echo '<a class="navbar-brand" href="Logout.php">';
                echo '<button class="button" id="form-open">Logout</button>';
                echo '</a>';
            } else {
                echo '<a class="navbar-brand" href="login.php">';
                echo '<button class="button" id="form-open">Login</button>';
                echo '</a>';
            }
            ?>
        </div>
    </header>
    <!--- Banner -->
    <section class="container-fluid">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center justify-content-center bg-warning text-white p-5">
                <div>
                    <h1>Discover the Future With BESTBUY!</h1>
                    <p class="mb-4"><em>Innovation is not solely about major discoveries.<br>It's about constantly challenging the status quo.</em></p>
                    <a href="products.php" class="btn btn-light btn-lg">Shop Now &#10142;</a>
                </div>
            </div>
            <div class="col-md-6 banner-image"></div>
        </div>
    </section>
    
        <!--- Products Section -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Our Products</h2>
        <?php if (!empty($products)): ?>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                <?php foreach ($products as $product): ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?php echo $product['photo_url']; ?>" class="card-img-top" alt="<?php echo $product['name']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product['name']; ?></h5>
                                <p class="card-text">$<?php echo $product['price']; ?></p>
                                <form action="cart.html" method="GET">
                                    <input type="hidden" name="product" value="<?php echo $product['name']; ?>">
                                    <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="submit" class="btn btn-warning" value="Add to Cart">
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-center">No products found.</p>
        <?php endif; ?>
    </div>
    <hr>

    <!--- New Product -->
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6">
                <img src="img/6555683_sd.jpg" class="img-fluid" alt="New Product">
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div>
                    <p>Our Newest Product Offer</p>
                    <h1>Smart Ring</h1>
                    <small>Track your fitness journey effortlessly with the Smart Ring, a sleek wearable that combines style and health monitoring right on your fingertip.</small>
                    <br>
                    <form action="cart.html" method="GET">
                        <input type="hidden" name="product" value="Smart Ring">
                        <input type="hidden" name="price" value="199.00">
                        <input type="hidden" name="quantity" value="1">
                        <input type="submit" class="btn btn-warning" value="Add to Cart">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <!-- Contact Us Section -->
    <section id="contact" class="container my-5">
        <div class="row">
            <div class="col-12 mb-4">
                <h2 class="text-center">Contact Us</h2>
            </div>
            <div class="col-md-8 mx-auto border rounded p-4 shadow-sm">
                <!-- Assuming you might want a form for the users to fill out -->
                <form>
                    <div class="mb-3">
                        <label for="contactName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="contactName" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label for="contactEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="contactEmail" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="contactMessage" class="form-label">Message</label>
                        <textarea class="form-control" id="contactMessage" rows="3" placeholder="Your message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-warning">Submit</button>
                </form>
            </div>
        </div>
    </section>

   <!--- Footer -->
    <footer class="bg-dark text-light py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="img/logo.png" alt="BESTBUY Logo" class="mb-2" width="100">
                    <p>Discover the Future <br> With BESTBUY!</p>
                </div>
                <div class="col-md-3">
                    <h3>Navigation</h3>
                    <ul class="list-unstyled">
                        <li><a href="/" class="text-decoration-none text-light">Home</a></li>
                        <li><a href="products.php" class="text-decoration-none text-light">Products</a></li>
                        <li><a href="#contact" class="text-decoration-none text-light">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3>Useful Links</h3>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none text-light">Coupons</a></li>
                        <li><a href="#" class="text-decoration-none text-light">Blog Post</a></li>
                        <li><a href="#" class="text-decoration-none text-light">Return Policy</a></li>
                        <li><a href="#" class="text-decoration-none text-light">Join Affiliate</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3>Follow Us</h3>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none text-light">Facebook</a></li>
                        <li><a href="#" class="text-decoration-none text-light">Twitter</a></li>
                        <li><a href="#" class="text-decoration-none text-light">Instagram</a></li>
                        <li><a href="#" class="text-decoration-none text-light">YouTube</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">&copy; Copyright 2023 - BESTBUY Store</div>
        </div>
    </footer>
    <script src="script.js"></script>
</body>
</html>