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

    <div class="container">
        <h2 class="m-4">Confirmed Orders</h2>
    
        <table class="table mb-5" style="margin-bottom: 115px !important;">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>John Doe</td>
                    <td>123 Main St, Cityville</td>
                    <td>Product A</td>
                    <td>$50.00</td>
                    <td>Confirmed</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jane Smith</td>
                    <td>456 Oak Ave, Townsville</td>
                    <td>Product B</td>
                    <td>$75.00</td>
                    <td>Confirmed</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Bob Johnson</td>
                    <td>789 Pine Rd, Villagetown</td>
                    <td>Product C</td>
                    <td>$100.00</td>
                    <td>Confirmed</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Bob Johnson</td>
                    <td>789 Pine Rd, Villagetown</td>
                    <td>Product C</td>
                    <td>$100.00</td>
                    <td>Confirmed</td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>Bob Johnson</td>
                    <td>789 Pine Rd, Villagetown</td>
                    <td>Product C</td>
                    <td>$100.00</td>
                    <td>Confirmed</td>
                </tr>
            </tbody>
        </table>
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
