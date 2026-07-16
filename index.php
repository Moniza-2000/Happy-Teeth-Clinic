<?php
include "includes/db.php";

$services = mysqli_query($conn, "SELECT * FROM services");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Teeth Clinic</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include "includes/navbar.php"; ?>
    <header>
    <h1>🦷 Happy Teeth Clinic</h1>
</header>

<section class="hero">

    <div class="hero-content">

        <h2>Healthy Smiles Begin Here</h2>

        <p>
            Book your dental appointment with our experienced dentists.
            We provide quality dental care in a comfortable and friendly environment.
        </p>

        <a href="#services" class="hero-btn">Explore Services</a>

    </div>

    <div class="hero-image">

        <img src="images/dentist.jpg" alt="Dental Clinic">

    </div>

</section>

   <section class="services" id="services">

        <h2>Our Dental Services</h2>

        <div class="service-container">

            <?php while($row = mysqli_fetch_assoc($services)) { ?>

                <div class="card">

                    <h3><?php echo $row['service_name']; ?></h3>

                    <p><strong>Duration:</strong> <?php echo $row['duration']; ?></p>

                    <p><?php echo $row['description']; ?></p>

                    <a href="booking.php?service_id=<?php echo $row['id']; ?>" class="btn">
                        Book Appointment
                    </a>

                </div>

            <?php } ?>

        </div>

    </section>

</body>
</html>