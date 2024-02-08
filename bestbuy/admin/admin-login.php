<?php
session_start();
require_once './../connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform database query to check the credentials
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $password === $user['password']) {
        // Valid credentials, set the user ID in the session
        $_SESSION['admin_id'] = $user['admin_id']; // Use 'admin_id' as the appropriate column name
        // Redirect to index.php or any other page
        header("Location: ./orders.php");
        exit();
    } else {
        // Invalid credentials, display an error message
        $error = "Invalid username or password";
        $_SESSION['login_error'] = $error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./../style.css">
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
                            <p style="font-weight:700;">Login with your BestBuy account</p>
                        </div>
                        <form id="login-form" action="./admin-login.php" method="POST">
    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="username" placeholder="Your Username">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Your Password">
    </div>
    <?php if (isset($error)) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
    <?php } ?>
    <div class="d-flex justify-content-between mb-4">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value id="remember" name="remember">
            <label class="form-check-label" for="remember">Remember Me</label>
        </div>
        <a href="forgot-password.html" class="forgot-pass">Forgot Password?</a>
    </div>
    <div class="d-flex align-items-center">
    <button type="submit" class="theme-btn btn-warning text-white p-1">
      <i class="far fa-paper-plane"></i> Login
    </button>
    </div>
</form>
                        <div class="login-footer">
                            <p><a href="./../login.php">User</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
