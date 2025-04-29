<?php
include '../includes/db_connect.php';
session_start();
if(!isset($_SESSION['admin_logged_in'])){
    header('Location: login.php');
}

if(isset($_POST['add_car'])){
    $name = $_POST['name'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $fuel = $_POST['fuel'];
    $seats = $_POST['seats'];
    
    // Image Upload
    $image = $_FILES['image']['name'];
    $temp_image = $_FILES['image']['tmp_name'];
    $image_folder = 'uploads/'.$image;

    if(move_uploaded_file($temp_image, $image_folder)){
        $query = "INSERT INTO cars (name, model, price_per_day, fuel_type, seating_capacity, image)
                  VALUES ('$name', '$model', '$price', '$fuel', '$seats', '$image')";
        if(mysqli_query($conn, $query)){
            echo "<script>alert('Car added successfully!');</script>";
        } else {
            echo "<script>alert('Error adding car');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add New Car</title>
    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="dashboard.php">Car Rental Admin</a>
    </div>
</nav>

<div class="container mt-4">
    <h2>Add New Car</h2>

    <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label>Car Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Model</label>
            <input type="text" name="model" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Price Per Day (₹)</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Fuel Type</label>
            <select name="fuel" class="form-control" required>
                <option value="Petrol">Petrol</option>
                <option value="Diesel">Diesel</option>
                <option value="Electric">Electric</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Seating Capacity</label>
            <input type="number" name="seats" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Car Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>

        <button type="submit" name="add_car" class="btn btn-success">Add Car</button>

    </form>
</div>

</body>
</html>
