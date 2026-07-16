<?php
include "includes/db.php";

$query = mysqli_query($conn,"
SELECT bookings.*, services.service_name
FROM bookings
INNER JOIN services
ON bookings.service_id = services.id
ORDER BY booking_date ASC, booking_time ASC
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Happy Teeth Clinic</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include "includes/navbar.php"; ?>

<header>
    <h1>Admin Dashboard</h1>
    <p>View All Appointment Bookings</p>
</header>
<div class="back-home">
    <a href="index.php">← Back to Home</a>
</div>

<div class="table-container">

<table>

    <tr>
        <th>ID</th>
        <th>Customer Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Service</th>
        <th>Date</th>
        <th>Time</th>
        <th>Action</th>
    </tr>

<?php

if(mysqli_num_rows($query)>0){

while($row=mysqli_fetch_assoc($query)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['customer_name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td><?php echo $row['service_name']; ?></td>

<td><?php echo $row['booking_date']; ?></td>

<td><?php echo $row['booking_time']; ?></td>
<td>

<a class="edit-btn"
href="edit-booking.php?id=<?php echo $row['id']; ?>&from=admin">

Edit

</a>

</td>

</tr>

<?php

}

}else{

?>

<tr>
<td colspan="7">No Bookings Found</td>
</tr>

<?php

}

?>

</table>

</div>

</body>
</html>