<?php

session_start();
include 'db.php';

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
    WHERE email='$email'
    AND password='$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0)
    {
        $row = mysqli_fetch_assoc($result);

        // STORE USER DETAILS IN SESSION

        $_SESSION['user'] = $email;

        $_SESSION['name'] = $row['name'];

        echo "<script>
        alert('Login Successful');
        window.location='dashboard.php';
        </script>";
    }
    else
    {
        echo "<script>
        alert('Invalid Email or Password');
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>LUXEVENT Login</title>

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
}

/* Animated Background */

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
    from{transform:translateY(0);}
    to{transform:translateY(50px);}
}

@keyframes move2{
    from{transform:translateY(0);}
    to{transform:translateY(-50px);}
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
}

/* LEFT SIDE */

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
    font-size:72px;
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
    width:75%;
    margin-top:40px;
    align-self:center;
}

/* RIGHT SIDE */

.right{
    width:50%;
    padding:70px;

    display:flex;
    flex-direction:column;
    justify-content:center;

    background:rgba(255,255,255,0.03);
}

.right h2{
    font-size:60px;
    color:white;
    margin-bottom:10px;
}

.right p{
    color:#94a3b8;
    margin-bottom:40px;
    font-size:16px;
}

/* INPUTS */

.input-box{
    width:100%;
    height:65px;

    border:none;
    outline:none;

    margin-bottom:22px;

    border-radius:18px;

    padding:0 25px;

    background:rgba(255,255,255,0.05);

    border:1px solid rgba(255,255,255,0.08);

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

/* OPTIONS */

.options{
    display:flex;
    justify-content:space-between;
    align-items:center;

    margin-bottom:30px;

    color:#cbd5e1;
    font-size:15px;
}

.options a{
    color:white;
    text-decoration:none;
}

/* BUTTON */

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
    font-size:22px;
    font-weight:600;

    cursor:pointer;

    transition:0.4s;
}

.btn:hover{
    transform:translateY(-4px);
    box-shadow:0 10px 35px rgba(126,34,206,0.45);
}

/* SIGNUP */

.signup-link{
    margin-top:30px;
    text-align:center;
    color:#94a3b8;
}

.signup-link a{
    color:white;
    text-decoration:none;
    font-weight:600;
}

/* RESPONSIVE */

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
            Welcome<br>
            Back
        </h1>

        <p>
            Access premium workshops, exclusive technology events,
            AI innovations and futuristic experiences.
        </p>

        <img src="https://cdni.iconscout.com/illustration/premium/thumb/login-4489353-3723273.png">

    </div>

    <!-- RIGHT -->

    <div class="right">

        <h2>Login</h2>

        <p>
            Continue your luxury experience.
        </p>

        <form method="POST">

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

            <div class="options">

                <label>
                    <input type="checkbox">
                    Remember me
                </label>

                <a href="#">
                    Forgot Password?
                </a>

            </div>

            <button
            type="submit"
            name="login"
            class="btn">

                Login Now

            </button>

        </form>

        <div class="signup-link">

            Don't have an account?

            <a href="signup.php">
                Create Account
            </a>

        </div>

    </div>

</div>

</body>
</html>