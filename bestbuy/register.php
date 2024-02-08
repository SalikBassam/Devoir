<?php
require_once 'connect.php';

session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT COUNT(*) FROM clients WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        echo "Username already exists. Please choose a different username.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO clients (full_name, address, email, username, password) VALUES (:full_name, :address, :email, :username, :password)");

        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);

        $stmt->execute();

        $newUserId = $conn->lastInsertId();

        $_SESSION['client_id'] = $newUserId; 

        header("Location: index.php");
        exit();
    }
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
  <main class="main">
  <div class="login-area py-120">
    <div class="container">
      <div class="col-md mx-auto">
        <div class="login-form">
          <div class="login-header">
            <p style="font-weight:700;">Create your Occups account</p>
          </div>
          <form method="POST" action="register.php" id="registration-form">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label>Full Name</label>
        <input
          type="text"
          class="form-control"
          placeholder="Your Full Name"
          name="full_name"
        />
      </div>
    </div>
  <div class="form-group">
    <label>Address</label>
    <input
      type="text"
      class="form-control"
      placeholder="Your Address"
      name="address"
    />
  </div>
  <div class="form-group">
    <label>Email Address</label>
    <input
      type="email"
      class="form-control"
      placeholder="Your Email"
      name="email"
    />
  </div>
  <div class="form-group">
    <label>Username</label>
    <input
      type="text"
      class="form-control"
      placeholder="Your Username"
      name="username"
    />
  </div>
  <div class="form-group">
    <label>Password</label>
    <input
      type="password"
      class="form-control"
      placeholder="Your Password"
      name="password"
    />
  </div>
  <div class="form-check form-group">
    <input
      class="form-check-input"
      type="checkbox"
      value
      id="agree"
      name="agree_terms"
    />
    <label class="form-check-label" for="agree">
      I agree with the <a href="terms.php" target="_blank">Terms Of Service.</a>
    </label>
  </div>
  <div class="d-flex align-items-center">
    <button type="submit" class="theme-btn btn-warning text-white p-1">
      <i class="far fa-paper-plane"></i> Register
    </button>
  </div>
</form>

          <div class="login-footer">
            <p>Already have an account? <a href="login.php">Login.</a></p>
            <div class="social-login">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
    <script src="assets/js/validation.js"></script>
  </body>
</html>
