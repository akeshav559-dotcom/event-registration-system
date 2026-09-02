<?php

include 'db.php';

$sql = "SELECT * FROM events";
$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Manage Events</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

body{
    background:#020617;
    color:white;
    font-family:'Poppins',sans-serif;
    padding:40px;
}

.top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
}

.btn{
    background:#2563eb;
    padding:12px 22px;
    border-radius:12px;
    color:white;
    text-decoration:none;
}

table{
    width:100%;
    border-collapse:collapse;
    background:#111827;
    border-radius:20px;
    overflow:hidden;
}

th{
    background:#1e293b;
    padding:18px;
    text-align:left;
}

td{
    padding:18px;
    border-bottom:1px solid rgba(255,255,255,0.05);
}

.edit{
    background:#9333ea;
    padding:8px 15px;
    border-radius:10px;
    color:white;
    text-decoration:none;
}

.delete{
    background:#dc2626;
    padding:8px 15px;
    border-radius:10px;
    color:white;
    text-decoration:none;
}

</style>

</head>

<body>

<div class="top">

<h1>Manage Events</h1>

<a href="add-event.php" class="btn">
+ Add Event
</a>

</div>

<table>

<tr>

<th>ID</th>
<th>Event</th>
<th>Date</th>
<th>Time</th>
<th>Slots</th>
<th>Price</th>
<th>Action</th>

</tr>

<?php
while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['event_name']; ?></td>

<td><?php echo $row['event_date']; ?></td>

<td><?php echo $row['event_time']; ?></td>

<td><?php echo $row['available_slots']; ?></td>

<td><?php echo $row['price']; ?></td>

<td>

<a class="edit" href="edit-event.php?id=<?php echo $row['id']; ?>">
Edit
</a>

<a class="delete" href="delete-event.php?id=<?php echo $row['id']; ?>">
Delete
</a>

</td>

</tr>

<?php
}
?>

</table>

</body>
</html>