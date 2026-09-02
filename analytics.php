<?php

include 'db.php';

/* TOTAL REGISTRATIONS */
$totalQuery = mysqli_query($conn,
"SELECT COUNT(*) as total FROM registrations");

$totalData = mysqli_fetch_assoc($totalQuery);

$totalRegistrations = $totalData['total'];

/* TOTAL WORKSHOPS */
$workshopQuery = mysqli_query($conn,
"SELECT COUNT(DISTINCT workshop) as total FROM registrations");

$workshopData = mysqli_fetch_assoc($workshopQuery);

$totalWorkshops = $workshopData['total'];

/* TOTAL PAYMENT */
$totalPayment = $totalRegistrations * 500;

/* VEG COUNT */
$vegQuery = mysqli_query($conn,
"SELECT COUNT(*) as total FROM registrations WHERE meal='Veg'");

$vegData = mysqli_fetch_assoc($vegQuery);

$vegCount = $vegData['total'];

/* NON VEG COUNT */
$nonVegQuery = mysqli_query($conn,
"SELECT COUNT(*) as total FROM registrations WHERE meal='Non Veg'");

$nonVegData = mysqli_fetch_assoc($nonVegQuery);

$nonVegCount = $nonVegData['total'];

/* WORKSHOP DATA */
$eventQuery = mysqli_query($conn, "
SELECT workshop, COUNT(*) as total
FROM registrations
GROUP BY workshop
ORDER BY total DESC
");

$events = [];

while($row = mysqli_fetch_assoc($eventQuery)){
    $events[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Analytics Dashboard</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#030b23;
color:white;
padding:40px;
overflow-x:hidden;
}

/* BACKGROUND */

body::before{
content:'';
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:
radial-gradient(circle at top left,#0047ff 0%,transparent 25%),
radial-gradient(circle at bottom right,#8b00ff 0%,transparent 25%);
opacity:0.15;
z-index:-1;
}

/* HERO SECTION */

.hero-section{
margin-bottom:40px;
background:linear-gradient(145deg,#081433,#101f4d);
border-radius:35px;
padding:50px;
border:1px solid rgba(255,255,255,0.08);
overflow:hidden;
position:relative;
}

.hero-section::before{
content:'';
position:absolute;
width:500px;
height:500px;
background:radial-gradient(circle,#2563eb55,transparent 70%);
top:-200px;
right:-150px;
}

.hero-content{
display:flex;
align-items:center;
justify-content:space-between;
gap:40px;
flex-wrap:wrap;
}

.hero-text{
flex:1;
min-width:300px;
}

.hero-text h1{
font-size:65px;
line-height:1.1;
margin-bottom:20px;
font-weight:800;
}

.hero-text p{
color:#cbd5e1;
font-size:18px;
line-height:1.7;
margin-bottom:30px;
max-width:650px;
}

.hero-btn{
display:inline-block;
padding:16px 30px;
border-radius:16px;
background:linear-gradient(135deg,#2563eb,#7c3aed);
color:white;
text-decoration:none;
font-weight:600;
transition:0.3s;
}

.hero-btn:hover{
transform:translateY(-4px);
}

.hero-image{
flex:1;
text-align:center;
min-width:300px;
}

.hero-image img{
width:100%;
max-width:550px;
animation:float 4s ease-in-out infinite;
}

/* FLOAT */

@keyframes float{

0%{
transform:translateY(0px);
}

50%{
transform:translateY(-12px);
}

100%{
transform:translateY(0px);
}

}

/* TOP CARDS */

.top-cards{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
gap:25px;
margin-bottom:40px;
}

.card{
background:linear-gradient(145deg,#081433,#101f4d);
padding:30px;
border-radius:28px;
position:relative;
overflow:hidden;
border:1px solid rgba(255,255,255,0.08);
}

.card::after{
content:'';
position:absolute;
width:140px;
height:140px;
background:rgba(255,255,255,0.05);
border-radius:50%;
top:-40px;
right:-40px;
}

.card h3{
font-size:20px;
margin-bottom:20px;
color:#d6def8;
}

.card h1{
font-size:60px;
font-weight:800;
}

.blue{
border-left:5px solid #0d6efd;
}

.purple{
border-left:5px solid #b026ff;
}

.green{
border-left:5px solid #00d084;
}

.orange{
border-left:5px solid #ff9800;
}

/* PANEL */

.panel{
background:linear-gradient(145deg,#081433,#101f4d);
padding:35px;
border-radius:32px;
border:1px solid rgba(255,255,255,0.08);
}

.panel h2{
font-size:48px;
margin-bottom:35px;
}

/* GRID */

.grid{
display:grid;
grid-template-columns:1fr 1.3fr 1fr;
gap:25px;
}

/* BOX */

.box{
background:#081224;
padding:25px;
border-radius:24px;
border:1px solid rgba(255,255,255,0.05);
}

/* DONUT */

.donut{
width:230px;
height:230px;
border-radius:50%;
margin:auto;
background:
conic-gradient(
#00d084 0deg <?php echo ($totalRegistrations>0)?($vegCount/$totalRegistrations)*360:0; ?>deg,
#ff9800 <?php echo ($totalRegistrations>0)?($vegCount/$totalRegistrations)*360:0; ?>deg 360deg
);
display:flex;
justify-content:center;
align-items:center;
position:relative;
margin-top:25px;
margin-bottom:25px;
}

.donut::before{
content:'';
position:absolute;
width:140px;
height:140px;
background:#081224;
border-radius:50%;
}

.donut-content{
position:absolute;
text-align:center;
z-index:2;
}

.donut-content h1{
font-size:50px;
}

.donut-content p{
color:#b6c2e1;
}

/* LEGEND */

.legend{
display:flex;
flex-direction:column;
gap:20px;
margin-top:20px;
}

.legend-item{
display:flex;
justify-content:space-between;
align-items:center;
}

.left{
display:flex;
align-items:center;
gap:10px;
}

.dot{
width:14px;
height:14px;
border-radius:50%;
}

.green-dot{
background:#00d084;
}

.orange-dot{
background:#ff9800;
}

/* GRAPH */

.graph{
height:320px;
display:flex;
align-items:flex-end;
justify-content:space-between;
gap:15px;
margin-top:20px;
}

.line-bar{
width:100%;
background:linear-gradient(180deg,#0d6efd,#2563eb);
border-radius:20px 20px 0 0;
position:relative;
}

.line-bar span{
position:absolute;
top:-35px;
left:50%;
transform:translateX(-50%);
font-weight:700;
}

/* WORKSHOP */

.workshop-item{
margin-bottom:24px;
}

.workshop-top{
display:flex;
justify-content:space-between;
margin-bottom:10px;
}

.progress{
width:100%;
height:14px;
background:#16213e;
border-radius:30px;
overflow:hidden;
}

.fill{
height:100%;
border-radius:30px;
background:linear-gradient(90deg,#0d6efd,#a855f7);
}

/* BOTTOM */

.bottom-cards{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
gap:25px;
margin-top:25px;
}

.small-card{
background:#081224;
padding:25px;
border-radius:24px;
border:1px solid rgba(255,255,255,0.05);
}

.small-card h3{
color:#b6c2e1;
margin-bottom:12px;
}

.small-card h1{
font-size:42px;
}

/* FOOTER */

.footer{
text-align:center;
margin-top:35px;
color:#94a3b8;
}

/* RESPONSIVE */

@media(max-width:1100px){

.grid{
grid-template-columns:1fr;
}

}

@media(max-width:700px){

body{
padding:20px;
}

.hero-text h1{
font-size:42px;
}

.panel h2{
font-size:32px;
}

.card h1{
font-size:42px;
}

.hero-section{
padding:30px;
}

}

</style>

</head>

<body>

<!-- HERO -->

<div class="hero-section">

<div class="hero-content">

<div class="hero-text">

<a href="admin.php" class="hero-btn">
← Back Dashboard
</a>

<h1>
Event Analytics Dashboard
</h1>

<p>
Track registrations, workshops, payments and performance insights in real time with beautiful analytics dashboard.
</p>

<a href="registrations.php" class="hero-btn">
View Registrations
</a>

</div>

<div class="hero-image">

<img src="uploads/hero-dashboard.png">

</div>

</div>

</div>

<!-- TOP CARDS -->

<div class="top-cards">

<div class="card blue">
<h3>Total Registrations</h3>
<h1><?php echo $totalRegistrations; ?></h1>
</div>

<div class="card purple">
<h3>Total Workshops</h3>
<h1><?php echo $totalWorkshops; ?></h1>
</div>

<div class="card green">
<h3>Total Payment</h3>
<h1>₹<?php echo number_format($totalPayment); ?></h1>
</div>

<div class="card orange">
<h3>Meals Selected</h3>
<h1><?php echo $vegCount + $nonVegCount; ?></h1>
</div>

</div>

<!-- PANEL -->

<div class="panel">

<h2>Performance Overview</h2>

<div class="grid">

<!-- DONUT -->

<div class="box">

<h3>Meal Preferences</h3>

<div class="donut">

<div class="donut-content">

<h1><?php echo $totalRegistrations; ?></h1>

<p>Total</p>

</div>

</div>

<div class="legend">

<div class="legend-item">

<div class="left">

<div class="dot green-dot"></div>

<span>Veg</span>

</div>

<span>
<?php echo $vegCount; ?>
(
<?php echo ($totalRegistrations>0)?round(($vegCount/$totalRegistrations)*100):0; ?>%
)
</span>

</div>

<div class="legend-item">

<div class="left">

<div class="dot orange-dot"></div>

<span>Non Veg</span>

</div>

<span>
<?php echo $nonVegCount; ?>
(
<?php echo ($totalRegistrations>0)?round(($nonVegCount/$totalRegistrations)*100):0; ?>%
)
</span>

</div>

</div>

</div>

<!-- GRAPH -->

<div class="box">

<h3>Registrations Overview</h3>

<div class="graph">

<?php

foreach($events as $event){

$height = $event['total'] * 40;

echo '

<div class="line-bar"
style="height:'.$height.'px">

<span>'.$event['total'].'</span>

</div>

';

}

?>

</div>

</div>

<!-- WORKSHOP -->

<div class="box">

<h3>Top Workshops</h3>

<?php

foreach($events as $event){

$percent =
($totalRegistrations>0)
?
($event['total']/$totalRegistrations)*100
:
0;

?>

<div class="workshop-item">

<div class="workshop-top">

<span><?php echo $event['workshop']; ?></span>

<span><?php echo $event['total']; ?></span>

</div>

<div class="progress">

<div
class="fill"
style="width:<?php echo $percent; ?>%">
</div>

</div>

</div>

<?php
}
?>

</div>

</div>

<!-- BOTTOM -->

<div class="bottom-cards">

<div class="small-card">

<h3>Avg. Registrations / Workshop</h3>

<h1>

<?php

if($totalWorkshops>0){
echo round($totalRegistrations/$totalWorkshops,1);
}else{
echo 0;
}

?>

</h1>

</div>

<div class="small-card">

<h3>Average Payment</h3>

<h1>₹500</h1>

</div>

<div class="small-card">

<h3>Expected Revenue</h3>

<h1>₹<?php echo number_format($totalPayment); ?></h1>

</div>

</div>

</div>

<div class="footer">

© 2025 Event Management System. All rights reserved.

</div>

</body>
</html>