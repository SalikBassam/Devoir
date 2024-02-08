<?php
include './../connect.php';

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
<!--- Products Section -->
<div class="container my-5">
        <h2 class="text-center mb-4">CRUD</h2>

        <?php if (!empty($products)): ?>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                <?php foreach ($products as $product): ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="./../<?php echo $product['photo_url']; ?>" class="card-img-top" alt="<?php echo $product['name']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product['name']; ?></h5>
                                <p class="card-text">$<?php echo $product['price']; ?></p>
                                <form action="delete.php" method="GET">
                                    <input type="hidden" name="product" value="<?php echo $product['name']; ?>">
                                    <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $product['product_id']; ?>">
                                        edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $product['product_id']; ?>">
                                        Delete
                                    </button>
                               <!-- delete Modal -->
                               <div class="modal fade" id="deleteModal<?php echo $product['product_id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?php echo $product['product_id']; ?>" aria-hidden="true">
                                   <div class="modal-dialog">
                                       <div class="modal-content">
                                           <div class="modal-header">
                                               <h1 class="modal-title fs-5" id="deleteModalLabel<?php echo $product['product_id']; ?>"><?php echo $product['name']; ?></h1>
                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                           </div>
                                           <div class="modal-body">
                                               Are you sure you want to delete '<?php echo $product['name']; ?>'?
                                           </div>
                                           <div class="modal-footer">
                                               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                               <form action="./delete.php" method="get" style="display: inline;">
                                                  <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                                                  <button type="submit" class="btn btn-danger">Yes</button>
                                              </form>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <!-- edit Modal -->
                               <div class="modal fade" id="editModal<?php echo $product['product_id']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $product['product_id']; ?>" aria-hidden="true">
                                   <div class="modal-dialog">
                                       <div class="modal-content">
                                           <div class="modal-header">
                                               <h1 class="modal-title fs-5" id="editModalLabel<?php echo $product['product_id']; ?>">Edit <?php echo $product['name']; ?></h1>
                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                           </div>
                                           <div class="modal-body">
                                               <form action="./edit.php" method="post" enctype="multipart/form-data">
                                                   <!-- Display current image -->
                                                   <div class="mb-3">
                                                       <label for="currentImage" class="form-label">Current Image:</label>
                                                       <img src="./../<?php echo $product['photo_url']; ?>" alt="Current Image" class="img-thumbnail">
                                                       <input type="hidden" name="currentImage" value="<?php echo $product['photo_url']; ?>">
                                                   </div>
                               
                                                   <!-- New Image Upload -->
                                                   <div class="mb-3">
                                                       <label for="newImage" class="form-label">New Image (optional):</label>
                                                       <input type="file" class="form-control" id="newImage" name="newImage" accept="image/*">
                                                   </div>
                               
                                                   <!-- Title -->
                                                   <div class="mb-3">
                                                       <label for="title" class="form-label">Product Title:</label>
                                                       <input type="text" class="form-control" id="title" name="title" value="<?php echo $product['name']; ?>" required>
                                                   </div>
                               
                                                   <!-- Price -->
                                                   <div class="mb-3">
                                                       <label for="price" class="form-label">Product Price:</label>
                                                       <input type="number" class="form-control" id="price" name="price" min="0.01" step="0.01" value="<?php echo $product['price']; ?>" required>
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
                                                   <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                               
                                                   <!-- Submit Button -->
                                                   <button type="submit" class="btn btn-warning">Update</button>
                                               </form>
                                           </div>
                                           <div class="modal-footer">
                                               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-center">There are no products available.</p>
        <?php endif; ?>
    </div>

    <!-- Button trigger modal -->

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
