<?php

include 'db.php';

if(isset($_POST['add']))
{

$name = $_POST['event_name'];
$date = $_POST['event_date'];
$time = $_POST['event_time'];
$slots = $_POST['available_slots'];
$price = $_POST['price'];

$sql = "INSERT INTO events
(event_name,event_date,event_time,available_slots,price)

VALUES

('$name','$date','$time','$slots','$price')";

mysqli_query($conn,$sql);

header('location:dashboard.php');

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Add Event</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

body{
background:#020617;
font-family:Poppins;
color:white;
padding:40px;
}

form{
max-width:500px;
background:#111827;
padding:35px;
border-radius:25px;
}

input{
width:100%;
padding:15px;
margin-bottom:20px;
border:none;
border-radius:14px;
background:#1e293b;
color:white;
}

button{
background:#2563eb;
padding:15px 20px;
border:none;
border-radius:14px;
color:white;
cursor:pointer;
width:100%;
font-size:16px;
font-weight:600;
}

h1{
margin-bottom:25px;
}

</style>

</head>

<body>

<h1>Add Event</h1>

<form method="POST">

<input type="text"
name="event_name"
placeholder="Event Name"
required>

<input type="text"
name="event_date"
placeholder="Event Date"
required>

<input type="text"
name="event_time"
placeholder="Event Time"
required>

<input type="number"
name="available_slots"
placeholder="Available Slots"
required>

<input type="text"
name="price"
placeholder="Price"
required>

<button name="add">

Add Event

</button>

</form>

</body>
</html>