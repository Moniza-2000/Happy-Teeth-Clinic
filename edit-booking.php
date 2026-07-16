<?php
include "includes/db.php";

$message = "";

if(!isset($_GET['id'])){
    die("Invalid Booking");
}

$id = $_GET['id'];
$back = "my-booking.php";

if(isset($_GET['from']) && $_GET['from']=="admin"){
    $back = "admin.php";
}

/* Get booking details */
$result = mysqli_query($conn,"
SELECT *
FROM bookings
WHERE id='$id'
");

$booking = mysqli_fetch_assoc($result);

$service_id = $booking['service_id'];
$booking_date = $booking['booking_date'];
$booking_time = $booking['booking_time'];
?>
<?php

if(isset($_POST['update'])){

    $new_time = $_POST['booking_time'];

    /* Check duplicate slot */

    $check = mysqli_query($conn,"
    SELECT *
    FROM bookings

    WHERE service_id='$service_id'

    AND booking_date='$booking_date'

    AND booking_time='$new_time'

    AND id != '$id'
    ");

    if(mysqli_num_rows($check)>0){

        $message = "<p class='error'>
        This time slot is already booked.
        </p>";

    }else{

        mysqli_query($conn,"
        UPDATE bookings

        SET booking_time='$new_time'

        WHERE id='$id'
        ");

        $message = "<p class='success'>
        Booking time updated successfully.
        </p>";

        $booking_time = $new_time;

    }

}
?>
<!DOCTYPE html>
<html>
<head>

<title>Edit Booking</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<?php include "includes/navbar.php"; ?>

<header>

<h1>Edit Booking Time</h1>

</header>

<div class="booking-form">

<?php echo $message; ?>

<form method="POST">

<label>Service</label>

<input
type="text"
value="<?php echo $service_id; ?>"
readonly>

<label>Date</label>

<input
type="date"
value="<?php echo $booking_date; ?>"
readonly>

<label>New Time</label>

<input
type="time"
name="booking_time"
value="<?php echo $booking_time; ?>"
required>

<button
type="submit"
name="update">

Update Time

</button>

</form>
<div class="back-home">

<a href="<?php echo $back; ?>" class="back-btn">

← Back

</a>

</div>

</div>

</body>

</html>