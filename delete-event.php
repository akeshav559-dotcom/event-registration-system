<?php

include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM events WHERE id='$id'";

mysqli_query($conn,$sql);

header('location:dashboard.php');

?>