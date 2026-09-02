<?php
session_start();

include 'db.php';

/*
---------------------------------------------------
CHECK LOGIN
---------------------------------------------------
*/

if(!isset($_SESSION['name'])){
    header("Location: login.php");
    exit();
}

$user_name = $_SESSION['name'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>LUXEVENT Dashboard</title>

<link rel="preconnect" href="https://fonts.googleapis.com">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:black;
    color:white;
    overflow-x:hidden;
}

/* BACKGROUND */

.bg{
    position:fixed;
    width:100%;
    height:100%;
    background:
    radial-gradient(circle at left,#003366,transparent 30%),
    radial-gradient(circle at right,#4b0082,transparent 30%),
    black;
    z-index:-2;
}

.lines{
    position:fixed;
    width:100%;
    height:100%;
    background-image:
    linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px);
    background-size:100% 40px;
    animation:move 10s linear infinite;
    z-index:-1;
    opacity:0.3;
}

@keyframes move{

0%{
    transform:translateY(0);
}

100%{
    transform:translateY(40px);
}

}

/* NAVBAR */

.navbar{
    width:100%;
    padding:20px 60px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    background:rgba(0,0,0,0.4);
    backdrop-filter:blur(10px);
    position:sticky;
    top:0;
    z-index:999;
}

.logo{
    font-size:30px;
    font-weight:700;
    letter-spacing:3px;
}

.logout{
    color:white;
    text-decoration:none;
    font-size:15px;
}

/* CONTAINER */

.container{
    width:90%;
    margin:auto;
    padding-top:50px;
}

.title{
    font-size:60px;
    margin-bottom:50px;
}

/* GRID */

.grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
    gap:30px;
}

/* LINK */

.workshop-link{
    text-decoration:none;
    color:white;
}

/* CARD */

.card{
    background:rgba(255,255,255,0.05);
    border:1px solid rgba(255,255,255,0.08);
    backdrop-filter:blur(10px);
    border-radius:25px;
    overflow:hidden;
    transition:0.4s;
    min-height:360px;
    position:relative;
}

.card:hover{
    transform:translateY(-10px) scale(1.03);
    box-shadow:0 0 35px rgba(255,255,255,0.15);
}

/* IMAGE */

.card-img{
    width:100%;
    height:220px;
    object-fit:cover;
}

/* CONTENT */

.card-content{
    padding:25px;
}

.card h3{
    font-size:28px;
    margin-bottom:12px;
}

.card p{
    color:#cccccc;
    line-height:1.7;
    font-size:15px;
}

/* MOBILE */

@media(max-width:768px){

.title{
    font-size:38px;
}

.navbar{
    padding:20px;
}

}

</style>

</head>

<body>

<div class="bg"></div>

<div class="lines"></div>

<!-- NAVBAR -->

<div class="navbar">

<div class="logo">
LUXEVENT
</div>

<a href="logout.php" class="logout">
Logout
</a>

</div>

<!-- MAIN -->

<div class="container">

<h1 class="title">
Welcome <?php echo htmlspecialchars($user_name); ?>
</h1>

<!-- WORKSHOP GRID -->

<div class="grid">

<!-- AI -->

<a href="ai-workshop.php" class="workshop-link">

<div class="card">

<img src="images/ai.jpg" class="card-img">

<div class="card-content">

<h3>AI Workshop</h3>

<p>
Artificial Intelligence Systems &
Modern Automation Technologies
</p>

</div>

</div>

</a>

<!-- CYBER -->

<a href="cyber-security.php" class="workshop-link">

<div class="card">

<img src="images/cyber.jpg" class="card-img">

<div class="card-content">

<h3>Cyber Security</h3>

<p>
Ethical Hacking, Protection &
Network Security Systems
</p>

</div>

</div>

</a>

<!-- CLOUD -->

<a href="cloud.php" class="workshop-link">

<div class="card">

<img src="images/cloud.jpg" class="card-img">

<div class="card-content">

<h3>Cloud Computing</h3>

<p>
AWS Infrastructure &
Cloud Deployment Systems
</p>

</div>

</div>

</a>

<!-- WEB -->

<a href="web.php" class="workshop-link">

<div class="card">

<img src="images/web.jpg" class="card-img">

<div class="card-content">

<h3>Web Development</h3>

<p>
Frontend, Backend &
Modern Web Applications
</p>

</div>

</div>

</a>

<!-- DATA SCIENCE -->

<a href="datascience.php" class="workshop-link">

<div class="card">

<img src="images/datascience.jpg" class="card-img">

<div class="card-content">

<h3>Data Science</h3>

<p>
Analytics, Visualization &
Business Intelligence Systems
</p>

</div>

</div>

</a>

<!-- ML -->

<a href="ml.php" class="workshop-link">

<div class="card">

<img src="images/ml.jpg" class="card-img">

<div class="card-content">

<h3>Machine Learning</h3>

<p>
AI Models, Deep Learning &
Prediction Systems
</p>

</div>

</div>

</a>

<!-- BLOCKCHAIN -->

<a href="blockchain.php" class="workshop-link">

<div class="card">

<img src="images/blockchain.jpg" class="card-img">

<div class="card-content">

<h3>Blockchain</h3>

<p>
Web3 Technology &
Smart Contract Systems
</p>

</div>

</div>

</a>

<!-- UI UX -->

<a href="uiux.php" class="workshop-link">

<div class="card">

<img src="images/uiux.jpg" class="card-img">

<div class="card-content">

<h3>UI UX Design</h3>

<p>
Modern User Interface &
Creative Experience Design
</p>

</div>

</div>

</a>

<!-- IOT -->

<a href="iot.php" class="workshop-link">

<div class="card">

<img src="images/iot.jpg" class="card-img">

<div class="card-content">

<h3>IoT Systems</h3>

<p>
Smart Devices &
Embedded Automation Systems
</p>

</div>

</div>

</a>

<!-- DEVOPS -->

<a href="devops.php" class="workshop-link">

<div class="card">

<img src="images/devops.jpg" class="card-img">

<div class="card-content">

<h3>DevOps Engineering</h3>

<p>
CI/CD Pipelines &
Cloud Deployment Automation
</p>

</div>

</div>

</a>

</div>

</div>

</body>
</html>