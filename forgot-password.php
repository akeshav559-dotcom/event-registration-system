<?php

include 'db.php';

$message = "";

if(isset($_POST['reset']))
{
    $email = $_POST['email'];

    $newpassword = $_POST['newpassword'];

    $check = "SELECT * FROM users
    WHERE email='$email'";

    $result = mysqli_query($conn,$check);

    if(mysqli_num_rows($result)>0)
    {
        $update = "UPDATE users
        SET password='$newpassword'
        WHERE email='$email'";

        mysqli_query($conn,$update);

        $message = "Password Updated Successfully";
    }
    else
    {
        $message = "Email Not Found";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Forgot Password</title>

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

    overflow:hidden;

    background:
    linear-gradient(
    90deg,
    #021b3a 0%,
    #000000 50%,
    #2b0040 100%
    );

    position:relative;
}

/* BG */

.bg{

    position:fixed;

    width:100%;
    height:100%;

    background:

    radial-gradient(
    circle at top left,
    rgba(37,99,235,0.25),
    transparent 30%
    ),

    radial-gradient(
    circle at bottom right,
    rgba(126,34,206,0.25),
    transparent 30%
    );
}

/* CENTER */

.container{

    width:100%;
    height:100vh;

    display:flex;

    justify-content:center;
    align-items:center;

    position:relative;
    z-index:2;
}

/* CARD */

.card{

    width:500px;

    padding:50px;

    border-radius:30px;

    background:rgba(255,255,255,0.05);

    border:1px solid rgba(255,255,255,0.08);

    backdrop-filter:blur(20px);

    box-shadow:
    0 0 40px rgba(0,0,0,0.5);
}

.card h1{

    color:white;

    font-size:50px;

    margin-bottom:15px;
}

.card p{

    color:#94a3b8;

    margin-bottom:35px;

    line-height:1.8;
}

/* INPUT */

.input-box{

    width:100%;

    height:70px;

    margin-bottom:25px;

    border:none;

    border-radius:18px;

    background:rgba(255,255,255,0.05);

    border:1px solid rgba(255,255,255,0.08);

    padding-left:25px;

    color:white;

    font-size:17px;

    outline:none;
}

.input-box:focus{

    border:1px solid #2563eb;

    box-shadow:
    0 0 20px rgba(37,99,235,0.4);
}

/* BUTTON */

.btn{

    width:100%;

    height:70px;

    border:none;

    border-radius:18px;

    background:
    linear-gradient(
    to right,
    #2563eb,
    #7e22ce
    );

    color:white;

    font-size:20px;

    font-weight:600;

    cursor:pointer;

    transition:0.4s;
}

.btn:hover{

    transform:translateY(-5px);
}

/* MESSAGE */

.message{

    margin-top:25px;

    text-align:center;

    color:white;

    font-size:18px;
}

/* LINK */

.back{

    display:block;

    margin-top:30px;

    text-align:center;

    color:#94a3b8;

    text-decoration:none;
}

.back:hover{
    color:white;
}

</style>

</head>

<body>

<div class="bg"></div>

<div class="container">

<div class="card">

<h1>Reset Password</h1>

<p>
Enter your registered email
and create a new password.
</p>

<form method="POST">

<input type="email"
name="email"
placeholder="Enter Your Email"
class="input-box"
required>

<input type="password"
name="newpassword"
placeholder="Enter New Password"
class="input-box"
required>

<button
type="submit"
name="reset"
class="btn">

Reset Password

</button>

</form>

<div class="message">

<?php echo $message; ?>

</div>

<a href="login.php" class="back">

← Back to Login

</a>

</div>

</div>

</body>
</html>