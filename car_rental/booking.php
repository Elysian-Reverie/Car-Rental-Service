<?php
include 'includes/db_connect.php';

session_start();

// Check if car_id is passed
if (isset($_GET['car_id'])) {
    $car_id = $_GET['car_id'];

    // Fetch car details from the database
    $query = "SELECT * FROM cars WHERE id = '$car_id'";
    $result = mysqli_query($conn, $query);

    // If car exists, store it in $car
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
// Handle Booking Form Submission
if(isset($_POST['book_car'])){
    $car_id = $_POST['car_id'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $query = "INSERT INTO bookings (car_id, customer_name, mobile, start_date, end_date)
              VALUES ('$car_id', '$name', '$mobile', '$start_date', '$end_date')";

    if(mysqli_query($conn, $query)){
        echo "<script>alert('Booking Successful! We will contact you soon.'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Booking Failed. Try again later.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Book Car</title>
    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Indian Car Rentals</a>
    </div>
</nav>

<div class="container mt-4">
    <h2 class="mb-4">Book <?php echo $car['name']." (".$car['model'].")"; ?></h2>

    <form method="POST">
        <input type="hidden" name="car_id" value="<?php echo $car['id']; ?>">

        <div class="mb-3">
            <label>Full Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Mobile Number</label>
            <input type="text" name="mobile" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>End Date</label>
            <input type="date" name="end_date" class="form-control" required>
        </div>

        <button type="submit" name="book_car" class="btn btn-success">Confirm Booking</button>
    </form>
</div>

</body>
</html>
