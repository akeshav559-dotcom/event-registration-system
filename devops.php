<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>DevOps Engineering Workshop</title>

<link rel="preconnect" href="https://fonts.googleapis.com">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#02030b;
    color:white;
    overflow-x:hidden;
}

/* BACKGROUND */

body::before{
    content:'';
    position:fixed;
    width:100%;
    height:100%;
    background:
    radial-gradient(circle at top left,#ff660022,transparent 30%),
    radial-gradient(circle at bottom right,#0066ff22,transparent 30%);
    z-index:-1;
}

/* NAVBAR */

.navbar{
    width:100%;
    padding:25px 5%;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.logo{
    font-size:42px;
    font-weight:800;
    letter-spacing:4px;
    color:white;
    text-shadow:0 0 20px #ff6600;
}

.back-btn{
    background:white;
    color:black;
    padding:14px 35px;
    border-radius:15px;
    text-decoration:none;
    font-weight:600;
    transition:0.4s;
}

.back-btn:hover{
    transform:translateY(-5px);
}

/* HERO */

.hero{
    width:90%;
    margin:auto;
    padding-top:40px;
}

.hero-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:60px;
    align-items:center;
}

.hero-text h1{
    font-size:95px;
    line-height:0.95;
    font-weight:800;
    margin-bottom:30px;
}

.hero-text span{
    color:#ff6600;
}

.hero-text p{
    color:#d0d0d0;
    font-size:22px;
    line-height:1.8;
    margin-bottom:40px;
}

/* BUTTONS */

.buttons{
    display:flex;
    gap:20px;
}

.primary-btn{
    background:white;
    color:black;
    padding:18px 40px;
    border-radius:18px;
    text-decoration:none;
    font-weight:600;
    transition:0.4s;
}

.primary-btn:hover{
    transform:translateY(-5px);
}

.secondary-btn{
    border:1px solid #ff6600;
    color:white;
    padding:18px 40px;
    border-radius:18px;
    text-decoration:none;
    transition:0.4s;
}

.secondary-btn:hover{
    background:#2a1408;
}

/* IMAGE */

.hero-image{
    position:relative;
}

.hero-image::before{
    content:'';
    position:absolute;
    inset:-10px;
    border-radius:30px;
    background:linear-gradient(45deg,#ff6600,#0066ff);
    filter:blur(20px);
    opacity:0.8;
    z-index:-1;
}

.hero-image img{
    width:100%;
    border-radius:28px;
    height:500px;
    object-fit:cover;
    border:2px solid rgba(255,255,255,0.1);
}

/* DETAILS */

.info-grid{
    width:90%;
    margin:70px auto;
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:25px;
}

.info-card{
    background:#16110d;
    border:1px solid rgba(255,255,255,0.08);
    padding:30px;
    border-radius:25px;
    transition:0.4s;
}

.info-card:hover{
    transform:translateY(-8px);
    box-shadow:0 0 25px rgba(255,102,0,0.2);
}

.info-card h3{
    font-size:22px;
    margin-bottom:15px;
    color:#ff6600;
}

.info-card p{
    font-size:20px;
    font-weight:600;
}

/* PAYMENT */

.payment-section{
    width:90%;
    margin:80px auto;
}

.section-title{
    font-size:40px;
    margin-bottom:35px;
    font-weight:700;
}

.payment-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:25px;
}

.payment-card{
    background:#16110d;
    border:1px solid rgba(255,255,255,0.08);
    padding:35px;
    border-radius:25px;
}

/* PAYMENT TITLE */

.payment-title{
    display:flex;
    align-items:center;
    gap:15px;
    margin-bottom:25px;
}

.payment-title h3{
    font-size:30px;
    color:#ff6600;
}

.payment-icon{
    width:60px;
    height:60px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-size:22px;
    font-weight:700;
}

/* ICON COLORS */

.upi-bg{
    background:linear-gradient(135deg,#7b2cff,#a855f7);
}

.bank-bg{
    background:linear-gradient(135deg,#ff6600,#0066ff);
}

.fee-bg{
    background:linear-gradient(135deg,#7b2cff,#a855f7);
}

.payment-card p{
    line-height:2;
    color:#d6d6d6;
    font-size:18px;
}

/* UPI */

.upi-row{
    display:flex;
    align-items:center;
    gap:15px;
    margin-bottom:20px;
}

.upi-row img{
    width:45px;
}

/* FEATURES */

.features{
    width:90%;
    margin:100px auto;
}

.feature-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:25px;
}

.feature-card{
    background:#16110d;
    border:1px solid rgba(255,255,255,0.08);
    padding:35px;
    border-radius:25px;
}

.feature-card h3{
    font-size:28px;
    margin-bottom:20px;
    color:#ff6600;
}

.feature-card p{
    color:#cccccc;
    line-height:1.8;
    font-size:17px;
}

/* INFO */

.info{
    width:90%;
    margin:100px auto;
}

.info-box{
    background:linear-gradient(
    135deg,
    rgba(255,102,0,0.12),
    rgba(0,102,255,0.12)
    );
    border:1px solid rgba(255,255,255,0.08);
    border-radius:30px;
    padding:60px;
}

.info-box h2{
    font-size:50px;
    margin-bottom:30px;
}

.info-box p{
    font-size:20px;
    line-height:2;
    color:#dddddd;
}

/* MOBILE */

@media(max-width:1100px){

.hero-grid{
    grid-template-columns:1fr;
}

.info-grid{
    grid-template-columns:repeat(2,1fr);
}

.payment-grid{
    grid-template-columns:1fr;
}

.feature-grid{
    grid-template-columns:1fr;
}

.hero-text h1{
    font-size:65px;
}

}

@media(max-width:700px){

.hero-text h1{
    font-size:48px;
}

.buttons{
    flex-direction:column;
}

.info-grid{
    grid-template-columns:1fr;
}

.hero-image img{
    height:320px;
}

.info-box{
    padding:35px;
}

.info-box h2{
    font-size:35px;
}

}

</style>

</head>

<body>

<!-- NAVBAR -->

<div class="navbar">

<div class="logo">
LUXEVENT
</div>

<a href="dashboard.php" class="back-btn">
Back
</a>

</div>

<!-- HERO -->

<section class="hero">

<div class="hero-grid">

<div class="hero-text">

<h1>
DEVOPS <br>
<span>ENGINEERING</span>
</h1>

<p>
Learn CI/CD pipelines, Docker, Kubernetes and modern DevOps engineering technologies.
</p>

<div class="buttons">

<a href="register-page.php" class="primary-btn">
Register Now
</a>

<a href="#features" class="secondary-btn">
Explore More
</a>

</div>

</div>

<div class="hero-image">

<img src="images/devops.jpg" alt="DevOps Engineering">

</div>

</div>

</section>

<!-- DETAILS -->

<section class="info-grid">

<div class="info-card">

<h3>📅 Workshop Date</h3>
<p>10 August 2026</p>

</div>

<div class="info-card">

<h3>⏰ Slot Timing</h3>
<p>10:00 AM – 5:00 PM</p>

</div>

<div class="info-card">

<h3>💺 Available Slots</h3>
<p>70 Seats Left</p>

</div>

<div class="info-card">

<h3>⌛ Last Date</h3>
<p>6 August 2026</p>

</div>

</section>

<!-- PAYMENT -->

<section class="payment-section">

<h2 class="section-title">
💳 PAYMENT OPTIONS
</h2>

<div class="payment-grid">

<!-- UPI -->

<div class="payment-card">

<div class="payment-title">

<div class="payment-icon upi-bg">
UPI
</div>

<h3>UPI Payment</h3>

</div>

<div class="upi-row">
<img src="images/gpay.png">
<span>Google Pay : 9876543210</span>
</div>

<div class="upi-row">
<img src="images/phonepe.png">
<span>PhonePe : 9876543210</span>
</div>

<div class="upi-row">
<img src="images/paytm.png">
<span>Paytm : 9876543210</span>
</div>

</div>

<!-- BANK -->

<div class="payment-card">

<div class="payment-title">

<div class="payment-icon bank-bg">
🏦
</div>

<h3>Bank Transfer</h3>

</div>

<p>

Bank : State Bank of India

<br><br>

A/C No : 1234567890

<br><br>

IFSC : SBIN0001234

</p>

</div>

<!-- FEE -->

<div class="payment-card">

<div class="payment-title">

<div class="payment-icon fee-bg">
₹
</div>

<h3>Registration Fee</h3>

</div>

<p>

Workshop Fee : ₹500

<br><br>

Includes DevOps Toolkit,
Certificate & Snacks.

</p>

</div>

</div>

</section>

<!-- FEATURES -->

<section class="features" id="features">

<h2 class="section-title">
Workshop Features
</h2>

<div class="feature-grid">

<div class="feature-card">

<h3>
CI/CD Pipelines
</h3>

<p>
Learn automated integration, testing and deployment pipelines.
</p>

</div>

<div class="feature-card">

<h3>
Docker & Kubernetes
</h3>

<p>
Understand containerization and orchestration using DevOps tools.
</p>

</div>

<div class="feature-card">

<h3>
Cloud Infrastructure
</h3>

<p>
Deploy scalable applications using cloud DevOps technologies.
</p>

</div>

</div>

</section>

<!-- INFO -->

<section class="info">

<div class="info-box">

<h2>
Why Join This Workshop?
</h2>

<p>

This workshop provides complete practical exposure to DevOps engineering tools and deployment automation technologies.

<br><br>

📅 Duration : 3 Days

<br><br>

👨‍🏫 Trainer : DevOps Industry Experts

<br><br>

🏆 Certification Included

</p>

</div>

</section>

</body>

</html>