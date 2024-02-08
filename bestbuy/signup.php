<?php
// Assuming you have a separate file for database connection (e.g., connect.php)
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user input
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Validate user input (add more validation as needed)

    // Insert user data into the clients table
    $query = "INSERT INTO clients (username, password, email, address) VALUES (:username, :password, :email, :address)";
    $statement = $conn->prepare($query);
    $statement->bindParam(':username', $email); // Assuming email as the username
    $statement->bindParam(':password', $password);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':address', $address);
    $statement->execute();

    // Redirect to the home page or wherever you want after successful signup
    header('Location: index.php');
    exit();
} else {
    // Handle if the form is not submitted properly
    echo 'Invalid form submission.';
}
?>


sync