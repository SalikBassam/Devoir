<?php
include './connect.php';

// Fetch products from the database
$query = "SELECT * FROM products";
$result = $conn->query($query);

// Check if there are any products
if ($result->rowCount() > 0) {
    $products = $result->fetchAll(PDO::FETCH_ASSOC);
} else {
    $products = []; // Set an empty array if no products are found
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
                    <button class="button" id="form-open">Login</button>
                </div>
            </nav>
        </div>
    </header>

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
                        <li><a href="products.html" class="text-decoration-none text-light">Products</a></li>
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
</body>
</html>
