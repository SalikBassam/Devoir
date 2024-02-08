<?php
include './../connect.php';
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
                <a class="navbar-brand" href="./../index.php">
                    <img src="./../img/logo.png" alt="BESTBUY Logo" width="120">
                </a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link text-light" href="./../index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="orders.php">Orders</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="product-crud.php">Product CRUD</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="create-product.php">New-Products</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <!--- Products Section -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Create New Product</h2>
        <div class="container mt-5">
            <h2>Create New Product</h2>
            <form action="./submit-product.php" method="post" enctype="multipart/form-data">
                <!-- Image Upload -->
                <div class="mb-3">
                    <label for="image" class="form-label">Product Image:</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                </div>
        
                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label">Product Title:</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
        
                <!-- Price -->
                <div class="mb-3">
                    <label for="price" class="form-label">Product Price:</label>
                    <input type="number" class="form-control" id="price" name="price" min="0.01" step="0.01" required>
                </div>
        
                <!-- Promotion Option -->
                <div class="mb-3">
                    <label class="form-label">Promotion:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="promotion" id="promotion_yes" value="yes">
                        <label class="form-check-label" for="promotion_yes">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="promotion" id="promotion_no" value="no" checked>
                        <label class="form-check-label" for="promotion_no">No</label>
                    </div>
                </div>
        
                <!-- Submit Button -->
                <button type="submit" class="btn btn-warning">Submit</button>
            </form>
        </div>
    </div>

   <!--- Footer -->
   <footer class="bg-dark text-light py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="./../img/logo.png" alt="BESTBUY Logo" class="mb-2" width="100">
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
