<?php

include 'db.php';

$id = $_GET['id'];

$select = "SELECT * FROM events WHERE id='$id'";

$result = mysqli_query($conn,$select);

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{

$name = $_POST['event_name'];
$date = $_POST['event_date'];
$time = $_POST['event_time'];
$slots = $_POST['available_slots'];
$price = $_POST['price'];

$sql = "UPDATE events SET

event_name='$name',
event_date='$date',
event_time='$time',
available_slots='$slots',
price='$price'

WHERE id='$id'";

mysqli_query($conn,$sql);

header('location:dashboard.php');

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Edit Event</title>

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
background:#9333ea;
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

<h1>Edit Event</h1>

<form method="POST">

<input type="text"
name="event_name"
value="<?php echo $row['event_name']; ?>">

<input type="text"
name="event_date"
value="<?php echo $row['event_date']; ?>">

<input type="text"
name="event_time"
value="<?php echo $row['event_time']; ?>">

<input type="number"
name="available_slots"
value="<?php echo $row['available_slots']; ?>">

<input type="text"
name="price"
value="<?php echo $row['price']; ?>">

<button name="update">

Update Event

</button>

</form>

</body>
</html>