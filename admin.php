<?php

include 'db.php';

/* REGISTRATIONS */

$sql = "SELECT * FROM registrations";
$result = mysqli_query($conn,$sql);

$total = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Dashboard</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#020617;
color:white;
overflow-x:hidden;
}

/* BACKGROUND */

.bg{
position:fixed;
width:100%;
height:100%;
background:
radial-gradient(circle at top left,#1d4ed8 0%,transparent 30%),
radial-gradient(circle at bottom right,#7c3aed 0%,transparent 30%);
opacity:0.15;
z-index:-1;
}

/* SIDEBAR */

.sidebar{
width:270px;
height:100vh;
background:rgba(15,23,42,0.95);
position:fixed;
left:0;
top:0;
padding:30px;
border-right:1px solid rgba(255,255,255,0.06);
backdrop-filter:blur(20px);
}

.logo{
font-size:36px;
font-weight:800;
margin-bottom:60px;
color:#3b82f6;
}

.menu a{
display:block;
padding:16px 20px;
margin-bottom:18px;
border-radius:14px;
text-decoration:none;
color:#cbd5e1;
transition:0.3s;
font-size:17px;
}

.menu a:hover{
background:linear-gradient(135deg,#2563eb,#3b82f6);
color:white;
transform:translateX(5px);
}

/* MAIN */

.main{
margin-left:270px;
padding:40px;
}

/* TOP */

.top{
display:flex;
justify-content:space-between;
align-items:center;
flex-wrap:wrap;
gap:20px;
margin-bottom:35px;
}

.top h1{
font-size:48px;
font-weight:800;
}

.search-box{
background:rgba(15,23,42,0.8);
border:1px solid rgba(255,255,255,0.06);
padding:14px 20px;
border-radius:16px;
width:320px;
}

.search-box input{
background:none;
border:none;
outline:none;
width:100%;
color:white;
font-size:15px;
}

.search-box input::placeholder{
color:#94a3b8;
}

/* HERO */

.hero{
width:100%;
min-height:360px;
border-radius:35px;
position:relative;
overflow:hidden;
margin-bottom:45px;
background:url('https://images.unsplash.com/photo-1511578314322-379afb476865')
center/cover no-repeat;
}

.overlay{
position:absolute;
width:100%;
height:100%;
background:linear-gradient(
to right,
rgba(2,6,23,0.95),
rgba(2,6,23,0.45)
);
}

.hero-content{
position:relative;
z-index:2;
padding:70px;
max-width:750px;
}

.hero-content h1{
font-size:60px;
line-height:1.1;
margin-bottom:25px;
font-weight:800;
}

.hero-content p{
color:#cbd5e1;
font-size:18px;
line-height:1.8;
margin-bottom:35px;
}

.hero-buttons{
display:flex;
gap:20px;
flex-wrap:wrap;
}

.hero-btn{
padding:15px 30px;
border:none;
border-radius:15px;
background:rgba(255,255,255,0.1);
backdrop-filter:blur(10px);
color:white;
font-size:16px;
cursor:pointer;
font-weight:600;
transition:0.3s;
text-decoration:none;
}

.hero-btn:hover{
transform:translateY(-4px);
background:linear-gradient(135deg,#2563eb,#3b82f6);
}

/* CARDS */

.cards{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
gap:30px;
margin-bottom:45px;
}

.card{
position:relative;
overflow:hidden;
padding:35px;
border-radius:28px;
background:rgba(15,23,42,0.8);
border:1px solid rgba(255,255,255,0.06);
backdrop-filter:blur(20px);
transition:0.4s;
}

.card:hover{
transform:translateY(-10px);
}

.card::before{
content:'';
position:absolute;
width:140px;
height:140px;
background:rgba(255,255,255,0.04);
border-radius:50%;
top:-50px;
right:-50px;
}

.card:nth-child(1){
border-left:6px solid #3b82f6;
}

.card:nth-child(2){
border-left:6px solid #9333ea;
}

.card p{
color:#94a3b8;
font-size:16px;
}

.card h2{
font-size:60px;
margin-top:15px;
font-weight:800;
}

/* TABLE */

.table-box{
background:rgba(15,23,42,0.85);
border:1px solid rgba(255,255,255,0.06);
border-radius:30px;
padding:35px;
backdrop-filter:blur(20px);
overflow-x:auto;
}

.table-header{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:30px;
}

.table-header h2{
font-size:30px;
}

table{
width:100%;
border-collapse:collapse;
}

table th{
background:#1e293b;
padding:18px;
text-align:left;
color:white;
font-size:15px;
}

table td{
padding:18px;
color:#cbd5e1;
border-bottom:1px solid rgba(255,255,255,0.05);
vertical-align:middle;
}

tr:hover{
background:#1e293b;
}

/* PAYMENT IMAGE */

.payment-img{
width:90px;
height:90px;
object-fit:cover;
border-radius:14px;
border:2px solid #7c3aed;
transition:0.3s;
}

.payment-img:hover{
transform:scale(1.08);
}

/* STATUS */

.status{
padding:8px 16px;
border-radius:30px;
background:#22c55e;
color:white;
font-size:13px;
font-weight:600;
}

/* RESPONSIVE */

@media(max-width:900px){

.sidebar{
width:100%;
height:auto;
position:relative;
}

.main{
margin-left:0;
}

.hero-content{
padding:40px 25px;
}

.hero-content h1{
font-size:38px;
}

.search-box{
width:100%;
}

}

</style>

</head>

<body>

<div class="bg"></div>

<!-- SIDEBAR -->

<div class="sidebar">

<div class="logo">
LUXEVENT
</div>

<div class="menu">

<a href="admin.php">🏠 Dashboard</a>

<a href="registrations.php">📋 Registrations</a>

<a href="analytics.php">📊 Analytics</a>

<a href="index.php">🚪 Logout</a>

</div>

</div>

<!-- MAIN -->

<div class="main">

<!-- TOP -->

<div class="top">

<h1>Admin Dashboard</h1>

<div class="search-box">

<input type="text"
id="searchInput"
placeholder="Search registrations...">

</div>

</div>

<!-- HERO -->

<div class="hero">

<div class="overlay"></div>

<div class="hero-content">

<h1>

Event Management Dashboard

</h1>

<p>

Manage registrations, workshops,
sessions and analytics
with a modern professional admin dashboard.

</p>

<div class="hero-buttons">

<a href="analytics.php" class="hero-btn">

View Analytics

</a>

</div>

</div>

</div>

<!-- CARDS -->

<div class="cards">

<div class="card">

<p>Total Registrations</p>

<h2>

<?php echo $total; ?>

</h2>

</div>

<div class="card">

<p>Total Workshops</p>

<h2>10</h2>

</div>

</div>

<!-- TABLE -->

<div class="table-box">

<div class="table-header">

<h2>Recent Registrations</h2>

</div>

<table id="myTable">

<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Workshop</th>

<th>Meal</th>

<th>Payment Screenshot</th>

<th>Status</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['workshop']; ?></td>

<td><?php echo $row['meal']; ?></td>

<!-- PAYMENT IMAGE -->

<td>

<a href="uploads/<?php echo $row['payment_ss']; ?>" target="_blank">

<img
src="uploads/<?php echo $row['payment_ss']; ?>"
class="payment-img">

</a>

</td>

<td>

<span class="status">

Confirmed

</span>

</td>

</tr>

<?php
}
?>

</table>

</div>

</div>

<!-- SEARCH -->

<script>

document.getElementById("searchInput").addEventListener("keyup", function () {

let filter = this.value.toLowerCase();

let table = document.getElementById("myTable");

let rows = table.getElementsByTagName("tr");

for (let i = 1; i < rows.length; i++) {

let rowText = rows[i].innerText.toLowerCase();

if (rowText.includes(filter)) {

rows[i].style.display = "";

} else {

rows[i].style.display = "none";

}

}

});

</script>

</body>
</html>