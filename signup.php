<?php

include 'db.php';

if(isset($_POST['signup']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users(name,email,password)

    VALUES('$name','$email','$password')";

    $result = mysqli_query($conn,$sql);

    if($result)
    {
        echo "<script>

        alert('Account Created Successfully');

        window.location='login.php';

        </script>";
    }
    else
    {
        echo "<script>

        alert('Signup Failed');

        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>LUXEVENT Signup</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    min-height:100vh;

    display:flex;
    justify-content:center;
    align-items:center;

    overflow:hidden;

    background:
    linear-gradient(
    135deg,
    #021b3a 0%,
    #000000 50%,
    #2b0040 100%
    );

    position:relative;
}

/* Animated Glow */

body::before{
    content:'';

    position:absolute;

    width:600px;
    height:600px;

    background:#2563eb;

    filter:blur(180px);

    top:-150px;
    left:-150px;

    opacity:0.3;

    animation:move1 8s infinite alternate;
}

body::after{
    content:'';

    position:absolute;

    width:600px;
    height:600px;

    background:#7e22ce;

    filter:blur(180px);

    bottom:-150px;
    right:-150px;

    opacity:0.3;

    animation:move2 8s infinite alternate;
}

@keyframes move1{

    from{
        transform:translateY(0);
    }

    to{
        transform:translateY(50px);
    }
}

@keyframes move2{

    from{
        transform:translateY(0);
    }

    to{
        transform:translateY(-50px);
    }
}

/* Main Card */

.card{

    width:1150px;
    height:680px;

    display:flex;

    border-radius:30px;

    overflow:hidden;

    background:rgba(15,15,15,0.55);

    backdrop-filter:blur(25px);

    border:1px solid rgba(255,255,255,0.08);

    box-shadow:
    0 0 40px rgba(0,0,0,0.5);

    position:relative;
    z-index:2;
}

/* Left Side */

.left{

    width:50%;

    padding:60px;

    display:flex;
    flex-direction:column;
    justify-content:center;

    color:white;

    background:
    linear-gradient(
    135deg,
    rgba(0,40,90,0.7),
    rgba(0,0,0,0.7)
    );
}

.logo{

    font-size:34px;

    font-weight:700;

    margin-bottom:40px;
}

.left h1{

    font-size:70px;

    line-height:1.05;

    margin-bottom:25px;
}

.left p{

    font-size:18px;

    line-height:1.8;

    color:#cbd5e1;

    max-width:500px;
}

.left img{

    width:78%;

    margin-top:35px;

    align-self:center;
}

/* Right Side */

.right{

    width:50%;

    padding:70px;

    display:flex;
    flex-direction:column;
    justify-content:center;

    background:rgba(255,255,255,0.03);
}

.right h2{

    font-size:58px;

    color:white;

    margin-bottom:10px;
}

.right p{

    color:#94a3b8;

    margin-bottom:40px;

    font-size:16px;
}

/* Inputs */

.input-box{

    width:100%;

    height:65px;

    margin-bottom:22px;

    border:none;
    outline:none;

    border-radius:18px;

    background:rgba(255,255,255,0.05);

    border:1px solid rgba(255,255,255,0.08);

    padding:0 25px;

    color:white;

    font-size:16px;

    transition:0.3s;
}

.input-box:focus{

    border:1px solid #2563eb;

    box-shadow:0 0 20px rgba(37,99,235,0.35);
}

.input-box::placeholder{

    color:#94a3b8;
}

/* Button */

.btn{

    width:100%;

    height:65px;

    border:none;

    border-radius:18px;

    background:
    linear-gradient(
    to right,
    #2563eb,
    #7e22ce
    );

    color:white;

    font-size:21px;

    font-weight:600;

    cursor:pointer;

    transition:0.4s;
}

.btn:hover{

    transform:translateY(-4px);

    box-shadow:
    0 10px 35px rgba(126,34,206,0.45);
}

/* Login Link */

.login-link{

    margin-top:30px;

    text-align:center;

    color:#94a3b8;
}

.login-link a{

    color:white;

    text-decoration:none;

    font-weight:600;
}

/* Responsive */

@media(max-width:1000px){

    body{

        padding:20px;

        overflow:auto;
    }

    .card{

        width:100%;

        height:auto;

        flex-direction:column;
    }

    .left,
    .right{

        width:100%;

        padding:40px;
    }

    .left h1{

        font-size:50px;
    }

    .right h2{

        font-size:45px;
    }

    .left img{

        width:90%;
    }
}

</style>

</head>

<body>

<div class="card">

    <!-- LEFT -->

    <div class="left">

        <div class="logo">
            LUXEVENT
        </div>

        <h1>
            Create<br>
            Account
        </h1>

        <p>
            Join premium workshops, exclusive AI conferences,
            technology summits and futuristic learning experiences.
        </p>

        <img src="https://cdni.iconscout.com/illustration/premium/thumb/online-registration-4489369-3723270.png">

    </div>

    <!-- RIGHT -->

    <div class="right">

        <h2>Signup</h2>

        <p>
            Start your luxury experience today.
        </p>

        <form method="POST">

            <input
            type="text"
            name="name"
            placeholder="Enter Your Name"
            class="input-box"
            required>

            <input
            type="email"
            name="email"
            placeholder="Enter Your Email"
            class="input-box"
            required>

            <input
            type="password"
            name="password"
            placeholder="Enter Your Password"
            class="input-box"
            required>

            <button
            type="submit"
            name="signup"
            class="btn">

                Create Account

            </button>

        </form>

        <div class="login-link">

            Already have an account?

            <a href="login.php">
                Login
            </a>

        </div>

    </div>

</div>

</body>
</html>