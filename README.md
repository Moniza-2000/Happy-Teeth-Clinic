# 🦷 Happy Teeth Clinic - Appointment Booking System

## 📌 Project Overview

Happy Teeth Clinic is a simple appointment booking system developed using **HTML, CSS, PHP, MySQL, and XAMPP**. It allows users to view available dental services, book appointments, check their bookings, and enables the admin to view all appointments.

---

## 🚀 Features

* Display available dental services
* Book appointments online
* View booking details using email
* Admin dashboard to view all bookings
* Prevents double booking for the same service at the same date and time
* Responsive and user-friendly interface

---

## 🛠️ Technologies Used

* HTML5
* CSS3
* PHP
* MySQL
* XAMPP

---

## 📂 Project Structure

```text
happy-teeth-clinic/
│
├── css/
│   └── style.css
│
├── images/
│
├── includes/
│   ├── db.php
│   └── navbar.php
│
├── index.php
├── booking.php
├── my_booking.php
├── admin.php
└── README.md
```

---

## 🗄️ Database

Database Name:

```text
happy_teeth_clinic
```

Tables:

* **services**
* **bookings**

The `bookings` table is linked to the `services` table using `service_id`.

---

## 📄 Pages

### Home (index.php)

* Displays all dental services.
* Shows service name, duration, and description.
* Includes a **Book Appointment** button.

### Booking (booking.php)

* Collects customer details.
* Allows users to select a service, date, and time.
* Checks for duplicate appointments before saving.

### My Booking (my_booking.php)

* Users can search for their appointments using their email address.

### Admin (admin.php)

* Displays all appointment bookings in a table.

---

## 🔒 Double Booking Prevention

Before saving a booking, the system checks whether the selected service is already booked for the same date and time.

* If the slot is available, the booking is saved.
* If the slot is already booked, an error message is displayed asking the user to choose another time.

---

## ▶️ How to Run the Project

1. Install XAMPP.
2. Copy the project folder into the `htdocs` directory.
3. Start **Apache** and **MySQL** from XAMPP.
4. Create the `happy_teeth_clinic` database.
5. Create the required tables (`services` and `bookings`) and insert sample service data.
6. Open your browser and visit:

```text
http://localhost/happy-teeth-clinic/
```

---

## 👩‍💻 Developed By

R. Moniza

