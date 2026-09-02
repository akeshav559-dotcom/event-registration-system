<?php

include 'db.php';

$email = $_POST['email'];

$password = $_POST['password'];

$sql = "SELECT * FROM users
WHERE email='$email'";

$result = mysqli_query($conn,$s