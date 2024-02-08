<?php
include './../connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    $image = $_FILES["image"]["name"];
    $title = $_POST["title"];
    $price = $_POST["price"];
    $promotion = isset($_POST["promotion"]) && $_POST["promotion"] == "yes" ? 1 : 0;

    // Upload image to a directory (adjust the path accordingly)
    $target_dir = "./img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // Insert data into the products table
    $stmt = $conn->prepare("INSERT INTO products (name, description, price, photo_url, has_promotion, discount_percentage) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$title, "Product description", $price, $target_file, $promotion, 0]);

    header("Location: create-product.php");
    exit();
}
?>