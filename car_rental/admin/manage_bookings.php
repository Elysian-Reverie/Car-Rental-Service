<?php
session_start();
include '../includes/db_connect.php';

// If Admin not logged in, redirect to login page
if(!isset($_SESSION['admin_logged_in'])){
    header('location: login.php');
    exit();
}
// Handle Approve/Reject
if(isset($_GET['action']) && isset($_GET['id'])){
    $action = $_GET['action'];
    $id = $_GET['id'];

    if($action == 'approve'){
        mysqli_query($conn, "UPDATE bookings SET status='Approved' WHERE id=$id");
    }
    if($action == 'reject'){
        mysqli_query($conn, "UPDATE bookings SET status='Rejected' WHERE id=$id");
    }

    header('Location: manage_bookings.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Bookings</title>
    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="dashboard.php">Admin Dashboard</a>
    </div>
</nav>

<div class="container mt-4">
    <h2 class="mb-4">Manage Bookings</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-primary">
			<tr>
				<th>#</th>
				<th>Car Name</th>
				<th>Customer Name</th>
				<th>Mobile</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Booking Time</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
        <tbody>
            <?php
            $i = 1;
            $bookings = mysqli_query($conn, "SELECT bookings.*, cars.name AS car_name FROM bookings JOIN cars ON bookings.car_id = cars.id ORDER BY bookings.id DESC");
            while($row = mysqli_fetch_assoc($bookings)){
            ?>
            <tr>
				<td><?php echo $i++; ?></td>
				<td><?php echo $row['car_name']; ?></td>
				<td><?php echo $row['customer_name']; ?></td>
				<td><?php echo $row['mobile']; ?></td>
				<td><?php echo $row['start_date']; ?></td>
				<td><?php echo $row['end_date']; ?></td>
				<td><?php echo $row['created_at']; ?></td>
				<td><?php echo $row['status']; ?></td>
				<td>
					<?php if($row['status'] == 'Pending') { ?>
						<a href="manage_bookings.php?action=approve&id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">Approve</a>
						<a href="manage_bookings.php?action=reject&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Reject</a>
					<?php } else { ?>
						<span class="badge bg-secondary">No Action</span>
					<?php } ?>
				</td>
			</tr>
            <?php } ?>
        </tbody>
    </table>

</div>

</body>
</html>
