<?php
include 'includes/db_connect.php';
session_start();

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = mysqli_query($conn, "SELECT * FROM customers WHERE email='$email'");
    if(mysqli_num_rows($check) > 0){
        $customer = mysqli_fetch_assoc($check);
        if(password_verify($password, $customer['password'])){
            $_SESSION['customer_logged_in'] = true;
            $_SESSION['customer_id'] = $customer['id'];
            $_SESSION['customer_name'] = $customer['name'];
            header('location: index.php');
            exit();
        } else {
            $error = "Wrong Password!";
        }
    } else {
        $error = "No account found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Customer Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Customer Login</h2>
    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="POST">
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" required class="form-control">
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" required class="form-control">
        </div>
        <button class="btn btn-primary" type="submit" name="login">Login</button>
        <a href="register.php" class="btn btn-link">Don't have an account? Register</a>
    </form>
</div>

</body>
</html>
