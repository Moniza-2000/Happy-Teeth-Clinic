<?php
include "includes/db.php";

$message = "";
$selected_service = "";
$customer_name = "";
$email = "";
$phone = "";
$booking_date = "";
$booking_time = "";
if(isset($_GET['service_id'])){
    $selected_service = $_GET['service_id'];
}

if(isset($_POST['book'])){

    $customer_name = $_POST['customer_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service_id = $_POST['service_id'];
    $booking_date = $_POST['booking_date'];
    $booking_time = $_POST['booking_time'];

    // Check if the selected slot is already booked
    $check = mysqli_query($conn,
        "SELECT * FROM bookings
         WHERE service_id='$service_id'
         AND booking_date='$booking_date'
         AND booking_time='$booking_time'"
    );

    if(mysqli_num_rows($check) > 0){

        $message = "<p class='error'>
        This appointment slot is already booked. Please choose another time.
        </p>";

        $booking_date = "";
        $booking_time = "";


    }else{

    mysqli_query($conn,"INSERT INTO bookings
    (customer_name,email,phone,service_id,booking_date,booking_time)

    VALUES
    ('$customer_name','$email','$phone','$service_id','$booking_date','$booking_time')");

    $message = "<p class='success'>
    Appointment booked successfully!
    </p>";

    $customer_name = "";
    $email = "";
    $phone = "";
    $selected_service = "";
    $booking_date = "";
    $booking_time = "";
}

}

$services = mysqli_query($conn,"SELECT * FROM services");
?>
<?php
include "includes/db.php";

$selected_service = "";

if(isset($_GET['service_id'])){
    $selected_service = $_GET['service_id'];
}

$services = mysqli_query($conn,"SELECT * FROM services");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Book Appointment</title>

<link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php include "includes/navbar.php"; ?>
<header>
    <h1>Book Your Appointment</h1>
</header>
<div class="back-home">
    <a href="index.php">← Back to Home</a>
</div>
<?php echo $message; ?>

<div class="booking-form">

<form action="" method="POST">

<label>Customer Name</label>

<input type="text" name="customer_name" value="<?php echo $customer_name; ?>" required>
<label>Email</label>

<input type="email" name="email" value="<?php echo $email; ?>" required>

<label>Phone Number</label>

<input type="text" name="phone" value="<?php echo $phone; ?>" required>

<label>Select Service</label>

<select name="service_id" required>

<option value="">Choose Service</option>

<?php
while($row=mysqli_fetch_assoc($services)){
?>

<option
value="<?php echo $row['id'];?>"

<?php
if($selected_service==$row['id']){
echo "selected";
}
?>

>

<?php echo $row['service_name'];?>

</option>

<?php
}
?>

</select>

<label>Select Date</label>

<input type="date" name="booking_date" value="<?php echo $booking_date; ?>" required>

<label>Select Time</label>

<input type="time" name="booking_time" value="<?php echo $booking_time; ?>" required>

<button
type="submit"
name="book">

Book Appointment

</button>

</form>

</div>

</body>
</html>