<?php
// Ensure that the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve the product_id from the URL parameters
    $product_id = $_GET["product_id"];

    // Include your database connection file
    include_once "./../connect.php"; // Replace with your actual file name

    try {
        // Prepare and execute the SQL DELETE statement
        $sql = "DELETE FROM products WHERE product_id = :product_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);

        // Check if the deletion was successful
        if ($stmt->execute()) {
            // Redirect back to the page where the form was submitted
            header("Location: product-crud.php");
            exit();
        } else {
            // Handle the case where deletion fails
            echo "Error deleting product.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close the statement and database connection
    $stmt = null;
    $conn = null;
}
?>
