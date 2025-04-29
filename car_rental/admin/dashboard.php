<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])){
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Car Rental Admin</a>
        <form class="d-flex">
            <a href="logout.php" class="btn btn-light">Logout</a>
			
			<a href="manage_bookings.php" class="btn btn-success">Manage Bookings</a>
        </form>
    </div>
</nav>

<div class="container mt-4">
    <h2>Welcome, <?php echo $_SESSION['admin_username']; ?>!</h2>

    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card shadow p-3">
                <h4>Add New Car</h4>
                <a href="add-car.php" class="btn btn-success w-100 mt-3">Add Car</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow p-3">
                <h4>Manage Cars</h4>
                <a href="manage-cars.php" class="btn btn-info w-100 mt-3">Manage</a>
            </div>
        </div>

    </div>
</div>

</body>
</html>
