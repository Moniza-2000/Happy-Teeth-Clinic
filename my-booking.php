<?php
include "includes/db.php";

$bookings = "";

if(isset($_POST['search'])){

    $email = $_POST['email'];

    $bookings = mysqli_query($conn,
    "SELECT bookings.*, services.service_name
    FROM bookings
    INNER JOIN services
    ON bookings.service_id = services.id
    WHERE email='$email'");

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>My Booking</title>

<link rel="stylesheet"
href="css/style.css">

</head>

<body>
<?php include "includes/navbar.php"; ?>
<header>

<h1>My Booking</h1>

</header>
<div class="back-home">
    <a href="index.php">← Back to Home</a>
</div>

<div class="booking-form">

<form method="POST">

<label>Email Address</label>

<input
type="email"
name="email"
placeholder="Enter your email"
required>

<button
type="submit"
name="search">

Search Booking

</button>

</form>

</div>
<?php

if($bookings){

if(mysqli_num_rows($bookings)>0){

?>

<div class="booking-list">

<?php

while($row=mysqli_fetch_assoc($bookings)){

?>

<div class="booking-card">

<h3><?php echo $row['service_name']; ?></h3>

<p>

<strong>Name:</strong>

<?php echo $row['customer_name'];?>

</p>

<p>

<strong>Email:</strong>

<?php echo $row['email'];?>

</p>

<p>

<strong>Phone:</strong>

<?php echo $row['phone'];?>

</p>

<p>

<strong>Date:</strong>

<?php echo $row['booking_date'];?>

</p>

<p>

<strong>Time:</strong>

<?php echo $row['booking_time'];?>

</p>
<a class="edit-btn"
href="edit-booking.php?id=<?php echo $row['id']; ?>&from=user">

Edit Time

</a>

</div>

<?php
}
?>

</div>

<?php

}else{

echo "<p class='error'>No booking found.</p>";

}

}

?>
</body>
</html>