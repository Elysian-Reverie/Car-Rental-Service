<?php
include '../includes/db_connect.php';
session_start();
if(!isset($_SESSION['admin_logged_in'])){
    header('Location: login.php');
}

// Handle Delete
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    // Delete car image also
    $getImgQuery = mysqli_query($conn, "SELECT image FROM cars WHERE id=$id");
    $imgRow = mysqli_fetch_assoc($getImgQuery);
    $image = $imgRow['image'];
    unlink("uploads/".$image);

    // Delete car record
    mysqli_query($conn, "DELETE FROM cars WHERE id=$id");

    header('Location: manage-cars.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Cars</title>
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
    <h2>Manage Cars</h2>

    <table class="table table-bordered table-hover mt-4">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Car Image</th>
                <th>Car Name</th>
                <th>Model</th>
                <th>Fuel</th>
                <th>Seats</th>
                <th>Price/Day (₹)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $cars = mysqli_query($conn, "SELECT * FROM cars");
            $i = 1;
            while($row = mysqli_fetch_assoc($cars)){
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><img src="uploads/<?php echo $row['image']; ?>" width="100"></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['model']; ?></td>
                <td><?php echo $row['fuel_type']; ?></td>
                <td><?php echo $row['seating_capacity']; ?></td>
                <td><?php echo $row['price_per_day']; ?></td>
                <td>
                    <a href="manage-cars.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

</body>
</html>
