# 🦷 Happy Teeth Clinic - Appointment Booking System

A simple Appointment Booking System developed using **HTML, CSS, PHP, MySQL, and XAMPP**. This project allows customers to book dental appointments, view their bookings, and enables the admin to manage appointments while preventing double bookings.

---

## 📌 Features

- View available dental services
- Book an appointment
- Prevent double booking for the same service, date, and time
- View booking details using email
- Admin panel to view all appointments
- Edit appointment time (User & Admin)
- Responsive and clean user interface

---

## 🛠️ Technologies Used

- HTML5
- CSS3
- PHP
- MySQL
- XAMPP

---

## 📂 Project Structure

```
happy-teeth-clinic/
│
├── css/
│   └── style.css
│
├── includes/
│   ├── db.php
│   └── navbar.php
│
├── index.php
├── booking.php
├── my_booking.php
├── admin.php
├── edit_booking.php
├── database.sql
└── README.md
```

---

## 🗄️ Database

Database Name:

```
happy_teeth_clinic
```

Tables:

- services
- bookings

### services

- id
- service_name
- duration
- description

### bookings

- id
- customer_name
- email
- phone
- service_id
- booking_date
- booking_time

The `service_id` is connected to the `services` table using a Foreign Key.

---

## 🚀 Setup Instructions

1. Install XAMPP.
2. Start **Apache** and **MySQL**.
3. Copy the project folder into:

```
xampp/htdocs/
```

4. Open **phpMyAdmin**.
5. Create a database named:

```
happy_teeth_clinic
```

6. Import the `database.sql` file.
7. Open the project in your browser:

```
http://localhost/happy-teeth-clinic/
```

---

## 📄 Pages

### Home

- Displays all dental services.
- Book Appointment button for each service.

### Booking

- Customer appointment booking form.
- Checks appointment availability.
- Prevents duplicate bookings.

### My Booking

- Search bookings using email.
- View appointment details.
- Edit appointment time.

### Admin

- View all customer bookings.
- Edit appointment time.

### Edit Booking

- Update only the appointment time.
- Checks slot availability before updating.
- Prevents duplicate booking during updates.

---

## 🔒 Double Booking Prevention

Before saving or updating an appointment, the system checks whether the selected:

- Service
- Date
- Time

already exists.

If the slot is already booked, an error message is displayed and the booking is not saved.

---

## 📷 Screens

- Home Page
- Booking Page
- My Booking
- Admin Panel
- Edit Booking

---

## 👩‍💻 Developed By

**R. Moniza**

Intern Project
