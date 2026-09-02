<?php

include 'db.php';

$payment_id = $_GET['payment_id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Payment Success</title>

<style>

body{
background:#020617;
font-family:Poppins;
color:white;
height:100vh;
display:flex;
justify-content:center;
align-items:center;
}

.box{
background:#111827;
padding:40px;
border-radius:25px;
text-align:center;
}

h1{
margin-bottom:20px;
color:#22c55e;
}

a{
display:inline-block;
margin-top:20px;
padding:12px 22px;
background:#2563eb;
color:white;
text-decoration:none;
border-radius:12px;
}

</style>

</head>

<body>

<div class="box">

<h1>Payment Successful</h1>

<p>
Payment ID:
<?php echo $payment_id; ?>
</p>

<a href="admin.php">
Go Dashboard
</a>

</div>

</body>
</html>