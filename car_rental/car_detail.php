<?php
include 'includes/db_connect.php';
session_start();

// Check if id is passed in URL
if (isset($_GET['id'])) {
    $car_id = $_GET['id'];

    // Fetch car details from the database
    $query = "SELECT * FROM cars WHERE id = '$car_id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $car = mysqli_fetch_assoc($result);
    } else {
        echo "Car not found!";
        exit;
    }
} else {
    echo "Car ID is missing!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $car['name']; ?> - Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'includes/header.php'; ?>

<div class="container my-5">
    <h1 class="mb-4"><?php echo $car['name']; ?></h1>

    <div class="row">
        <div class="col-md-6">
            <!-- Car Image -->
            <img src="admin/uploads/<?php echo $car['image']; ?>" class="img-fluid" alt="Car Image">
        </div>

        <div class="col-md-6">
            <h3>₹<?php echo $car['price_per_day']; ?> / day</h3>
            <p><strong>Model:</strong> <?php echo $car['model']; ?></p>

            <!-- Book Now Button -->
            <a href="booking.php?car_id=<?php echo $car['id']; ?>" class="btn btn-warning mt-3">Book This Car</a>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>
