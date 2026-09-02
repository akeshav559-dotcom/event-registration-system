<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>LUXEVENT</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
    scroll-behavior:smooth;
}

body{
    background:#000;
    color:white;
    overflow-x:hidden;
}

/* BACKGROUND */

body::before{

    content:'';

    position:fixed;
    inset:0;

    z-index:-2;

    background:
    radial-gradient(circle at top left,
    rgba(212,175,55,0.12),
    transparent 30%),

    radial-gradient(circle at bottom right,
    rgba(255,255,255,0.05),
    transparent 30%),

    #000;
}

/* NAVBAR */

.navbar{

    width:100%;

    padding:25px 8%;

    display:flex;
    justify-content:space-between;
    align-items:center;

    position:fixed;
    top:0;
    left:0;

    z-index:1000;

    background:rgba(0,0,0,0.45);

    backdrop-filter:blur(10px);

    border-bottom:
    1px solid rgba(255,255,255,0.08);
}

.logo{

    font-size:36px;

    font-weight:700;

    letter-spacing:3px;

    color:#d4af37;
}

.nav-links{

    display:flex;
    align-items:center;
}

.nav-links a{

    color:white;

    text-decoration:none;

    margin-left:35px;

    font-size:17px;

    transition:0.3s;
}

.nav-links a:hover{

    color:#d4af37;
}

/* HERO SECTION */

.hero{

    width:100%;
    height:100vh;

    position:relative;

    display:flex;
    align-items:center;

    padding:0 8%;

    overflow:hidden;

    background:
    linear-gradient(
        rgba(0,0,0,0.68),
        rgba(0,0,0,0.78)
    ),

    url('https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=2000&auto=format&fit=crop');

    background-size:cover;
    background-position:center;
}

.hero-overlay{

    position:absolute;
    inset:0;

    background:
    radial-gradient(circle at right,
    rgba(212,175,55,0.15),
    transparent 35%);
}

.hero-left{

    position:relative;
    z-index:2;

    max-width:750px;

    animation:fadeUp 1.2s ease;
}

.welcome{

    color:#d4af37;

    font-size:22px;

    letter-spacing:5px;

    display:block;

    margin-bottom:25px;
}

.hero h1{

    font-size:120px;

    line-height:1;

    font-weight:800;

    margin-bottom:20px;

    color:white;
}

.hero h1 .gold{

    color:#d4af37;
}

.hero h2{

    font-size:36px;

    letter-spacing:5px;

    font-weight:500;

    margin-bottom:30px;

    color:white;
}

.hero p{

    font-size:24px;

    line-height:2;

    color:#d1d5db;

    margin-bottom:50px;

    max-width:700px;
}

/* BUTTONS */

.hero-buttons{

    display:flex;
    gap:25px;

    flex-wrap:wrap;
}

.btn{

    padding:18px 40px;

    border-radius:12px;

    text-decoration:none;

    font-size:18px;

    font-weight:600;

    transition:0.4s;
}

.btn-gold{

    background:#d4af37;

    color:black;

    box-shadow:
    0 10px 30px rgba(212,175,55,0.35);
}

.btn-gold:hover{

    transform:translateY(-5px);
}

.btn-dark{

    border:1px solid #d4af37;

    color:white;

    background:transparent;
}

.btn-dark:hover{

    background:#d4af37;

    color:black;
}

/* ANIMATION */

@keyframes fadeUp{

    from{
        opacity:0;
        transform:translateY(50px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }

}

/* WORKSHOPS */

.section{

    padding:120px 8%;
}

.section-title{

    font-size:55px;

    text-align:center;

    margin-bottom:20px;

    color:#d4af37;
}

.section-text{

    text-align:center;

    color:#cbd5e1;

    max-width:850px;

    margin:auto;

    line-height:2;

    margin-bottom:70px;
}

.cards{

    display:grid;

    grid-template-columns:
    repeat(auto-fit,minmax(280px,1fr));

    gap:35px;
}

.card{

    background:
    rgba(255,255,255,0.04);

    border:
    1px solid rgba(255,255,255,0.08);

    border-radius:25px;

    overflow:hidden;

    transition:0.4s;

    backdrop-filter:blur(10px);
}

.card:hover{

    transform:
    translateY(-10px)
    scale(1.02);

    box-shadow:
    0 20px 40px rgba(212,175,55,0.18);
}

.card img{

    width:100%;
    height:240px;
    object-fit:cover;
}

.card-content{

    padding:30px;
}

.card h3{

    font-size:28px;

    margin-bottom:15px;

    color:#d4af37;
}

.card p{

    color:#d1d5db;

    line-height:1.9;
}

/* FOOTER */

.footer{

    text-align:center;

    padding:40px;

    color:#9ca3af;

    border-top:
    1px solid rgba(255,255,255,0.06);
}

/* MOBILE */

@media(max-width:900px){

    .hero{

        justify-content:center;

        text-align:center;

        padding:0 6%;
    }

    .hero-left{
        max-width:100%;
    }

    .hero h1{
        font-size:65px;
    }

    .hero h2{
        font-size:24px;
        letter-spacing:2px;
    }

    .hero p{
        font-size:18px;
    }

    .hero-buttons{
        justify-content:center;
    }

    .section-title{
        font-size:40px;
    }

    .navbar{
        padding:20px 5%;
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

    <div class="nav-links">

        <a href="signup.php">
            Signup
        </a>

        <a href="login.php">
            Login
        </a>

    </div>

</div>

<!-- HERO SECTION -->

<section class="hero">

    <div class="hero-overlay"></div>

    <div class="hero-left">

        <span class="welcome">
            WELCOME TO
        </span>

        <h1>
            <span class="gold">LUX</span>EVENT
        </h1>

        <h2>
            EXPERIENCE THE EXTRAORDINARY
        </h2>

        <p>
            Join us for unforgettable events,
            inspiring sessions, and meaningful
            connections.
        </p>

        <div class="hero-buttons">

            <a href="signup.php" class="btn btn-gold">
                REGISTER NOW →
            </a>

            <a href="#workshops" class="btn btn-dark">
                EXPLORE EVENTS
            </a>

        </div>

    </div>

</section>

<!-- WORKSHOPS -->

<section class="section" id="workshops">

    <h2 class="section-title">
        Premium Workshops
    </h2>

    <p class="section-text">
        Learn futuristic technologies from
        industry experts through immersive
        premium workshops.
    </p>

    <div class="cards">

        <!-- CARD 1 -->

        <div class="card">

            <img src="https://images.unsplash.com/photo-1677442136019-21780ecad995?q=80&w=1200&auto=format&fit=crop">

            <div class="card-content">

                <h3>
                    Artificial Intelligence
                </h3>

                <p>
                    Explore machine learning,
                    deep learning and AI
                    automation systems.
                </p>

            </div>

        </div>

        <!-- CARD 2 -->

        <div class="card">

            <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?q=80&w=1200&auto=format&fit=crop">

            <div class="card-content">

                <h3>
                    Robotics
                </h3>

                <p>
                    Build intelligent robots,
                    automation systems and
                    smart devices.
                </p>

            </div>

        </div>

        <!-- CARD 3 -->

        <div class="card">

            <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=1200&auto=format&fit=crop">

            <div class="card-content">

                <h3>
                    Cyber Security
                </h3>

                <p>
                    Learn ethical hacking,
                    cyber protection and
                    advanced security systems.
                </p>

            </div>

        </div>

        <!-- CARD 4 -->

        <div class="card">

            <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=1200&auto=format&fit=crop">

            <div class="card-content">

                <h3>
                    Cloud Computing
                </h3>

                <p>
                    Master AWS cloud,
                    scalable infrastructure
                    and deployment systems.
                </p>

            </div>

        </div>

    </div>

</section>

<!-- FOOTER -->

<div class="footer">

    © 2026 LUXEVENT • Premium Event Platform

</div>

</body>
</html>