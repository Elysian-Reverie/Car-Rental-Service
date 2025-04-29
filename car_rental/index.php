<?php
session_start();
include 'includes/db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home - Car Rental Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'includes/header.php'; ?>

<!-- Hero Section -->
<div class="bg-primary text-white text-center py-5 mb-5">
    <h1>Welcome to Car Rental Service</h1>
    <p>Book your dream ride with us today!</p>
</div>

<!-- Cars Section -->
<div class="container">
    <h2 class="mb-4 text-center">Available Cars</h2>

    <div class="row">
        <?php
        // Fetch all cars from database
        $query = "SELECT * FROM cars";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($car = mysqli_fetch_assoc($result)) {
        ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="admin/uploads/<?php echo $car['image']; ?>" class="card-img-top" alt="Car Image" style="height: 250px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo $car['name']; ?></h5>
                        <p class="card-text">Model: <?php echo $car['model']; ?></p>
                        <p class="card-text">₹<?php echo $car['price_per_day']; ?> / day</p>

                        <div class="mt-auto">
                            <a href="car_detail.php?id=<?php echo $car['id']; ?>" class="btn btn-primary w-100">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            }
        } else {
            echo "<p class='text-center'>No cars available at the moment.</p>";
        }
        ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
