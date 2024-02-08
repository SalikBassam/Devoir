<?php
include './../connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $product_id = $_POST['product_id'];
    $currentImage = $_POST['currentImage'];
    $newImage = $_FILES['newImage'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $promotion = isset($_POST['promotion']) ? $_POST['promotion'] : 'no';

    // Update the product in the database
    $updateQuery = "UPDATE products SET name = :name, price = :price, has_promotion = :has_promotion WHERE product_id = :product_id";
    $updateStatement = $conn->prepare($updateQuery);
    $updateStatement->bindParam(':product_id', $product_id);
    $updateStatement->bindParam(':name', $title);
    $updateStatement->bindParam(':price', $price);
    $updateStatement->bindParam(':has_promotion', $promotion);
    $updateStatement->execute();

// Handle image update (if a new image is provided)
if ($newImage['error'] == 0) {
    // Delete the current image file
    unlink('img/' . $currentImage);

    // Upload the new image file
    $targetDirectory = 'img/';
    $newImageName = $product_id . '_' . basename($newImage['name']);
    $targetPath = $targetDirectory . $newImageName;
    move_uploaded_file($newImage['tmp_name'], $targetPath);

    // Update the image URL in the database
    $updateImageQuery = "UPDATE products SET photo_url = :photo_url WHERE product_id = :product_id";
    $updateImageStatement = $conn->prepare($updateImageQuery);
    $updateImageStatement->bindParam(':product_id', $product_id);

    // Create a variable for photo_url and bind it
    $photoUrl = 'img/' . $newImageName;
    $updateImageStatement->bindParam(':photo_url', $photoUrl);
    $updateImageStatement->execute();
}


    // Redirect back to the product list or show a success message
    header('Location: product-crud.php');
    exit();
} else {
    // Handle if the form is not submitted properly
    echo 'Invalid form submission.';
}
?>
