<?php

include 'db.php';

if(isset($_POST['register']))
{

    $name = mysqli_real_escape_string($conn,$_POST['name']);

    $email = mysqli_real_escape_string($conn,$_POST['email']);

    $workshop = mysqli_real_escape_string($conn,$_POST['workshop']);

    $meal = mysqli_real_escape_string($conn,$_POST['meal']);

    /* CHECK FILE */

    if(isset($_FILES['payment_ss']) && $_FILES['payment_ss']['error'] == 0)
    {

        /* CREATE UNIQUE FILE NAME */

        $filename = time().'_'.basename($_FILES['payment_ss']['name']);

        $tempname = $_FILES['payment_ss']['tmp_name'];

        /* UPLOAD FOLDER */

        $upload_dir = __DIR__ . "/uploads/";

        /* CREATE FOLDER IF NOT EXISTS */

        if(!is_dir($upload_dir))
        {

            mkdir($upload_dir,0777,true);

        }

        /* FINAL FILE PATH */

        $folder = $upload_dir . $filename;

        /* MOVE FILE */

        if(move_uploaded_file($tempname,$folder))
        {

            /* INSERT QUERY */

            $sql = "INSERT INTO registrations
            (name,email,workshop,meal,payment_ss)

            VALUES

            ('$name','$email','$workshop','$meal','$filename')";

            $run = mysqli_query($conn,$sql);

            if($run)
            {

                echo "<script>

                alert('Registration Successful');

                window.location='dashboard.php';

                </script>";

            }
            else
            {

                echo "<script>

                alert('Database Error');

                </script>";

            }

        }
        else
        {

            echo "<script>

            alert('Image Upload Failed');

            </script>";

        }

    }
    else
    {

        echo "<script>

        alert('Please Select Image');

        </script>";

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Workshop Registration</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#080710;
min-height:100vh;
display:flex;
justify-content:center;
align-items:center;
padding:30px;
overflow-x:hidden;
}

.bg{
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:
radial-gradient(circle at top left,#1d4ed8,transparent 30%),
radial-gradient(circle at bottom right,#7e22ce,transparent 30%),
#080710;
z-index:-1;
}

/* WRAPPER */

.container-wrapper{
width:1150px;
border-radius:30px;
overflow:hidden;
box-shadow:0 25px 70px rgba(0,0,0,0.45);
}

/* HERO IMAGE */

.hero-image{
position:relative;
width:100%;
height:360px;
background:url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f')
center/cover no-repeat;
}

.overlay{
position:absolute;
width:100%;
height:100%;
background:rgba(0,0,0,0.55);
}

.hero-content{
position:absolute;
top:50%;
left:50%;
transform:translate(-50%,-50%);
text-align:center;
color:white;
z-index:2;
width:90%;
}

.hero-content h1{
font-size:65px;
margin-bottom:20px;
font-weight:800;
line-height:1.1;
}

.hero-content p{
font-size:22px;
line-height:1.7;
color:#f1f1f1;
}

/* MAIN CONTAINER */

.container{
width:100%;
background:white;
display:flex;
align-items:stretch;
}

/* LEFT SIDE */

.left{
width:50%;
background:#050522;
color:white;
padding:70px 60px;
display:flex;
flex-direction:column;
justify-content:center;
}

.left h1{
font-size:60px;
line-height:1.1;
margin-bottom:25px;
font-weight:700;
}

.left p{
font-size:19px;
color:#d1d1d1;
line-height:1.8;
margin-bottom:35px;
}

.left img{
width:100%;
max-width:420px;
margin:auto;
display:block;
animation:float 3s ease-in-out infinite;
}

/* RIGHT SIDE */

.right{
width:50%;
padding:70px 65px;
display:flex;
flex-direction:column;
justify-content:center;
background:#fff;
}

.right h2{
font-size:58px;
font-weight:700;
color:#111;
margin-bottom:10px;
line-height:1.1;
}

.right p{
color:#777;
margin-bottom:35px;
font-size:18px;
}

/* FORM */

form{
width:100%;
}

.input-box{
width:100%;
height:68px;
margin-bottom:22px;
border:1px solid #ddd;
border-radius:18px;
padding:0 22px;
font-size:17px;
outline:none;
transition:0.3s;
background:#fff;
}

.input-box:focus{
border-color:#2563eb;
box-shadow:0 0 12px rgba(37,99,235,0.15);
}

select.input-box{
cursor:pointer;
}

/* UPLOAD SECTION */

.upload-container{
margin-bottom:25px;
}

.upload-label{
display:block;
margin-bottom:12px;
font-size:18px;
font-weight:600;
color:#222;
}

.upload-box{
width:100%;
min-height:180px;
border:2px dashed #a855f7;
border-radius:22px;
background:#faf5ff;
display:flex;
flex-direction:column;
justify-content:center;
align-items:center;
cursor:pointer;
transition:0.3s;
text-align:center;
padding:20px;
}

.upload-box:hover{
background:#f3e8ff;
border-color:#7e22ce;
}

.upload-box input{
display:none;
}

.upload-icon{
width:65px;
margin-bottom:15px;
}

.upload-box h3{
color:#7e22ce;
font-size:22px;
margin-bottom:8px;
}

.upload-box p{
margin:0;
color:#777;
font-size:14px;
}

/* BUTTON */

.btn{
width:100%;
height:68px;
border:none;
border-radius:18px;
background:linear-gradient(to right,#2563eb,#7e22ce);
color:white;
font-size:20px;
font-weight:600;
cursor:pointer;
transition:0.3s;
}

.btn:hover{
transform:translateY(-2px);
box-shadow:0 10px 25px rgba(37,99,235,0.3);
}

.safe{
text-align:center;
margin-top:20px;
color:#777;
font-size:15px;
}

/* IMAGE ANIMATION */

@keyframes float{

0%{
transform:translateY(0px);
}

50%{
transform:translateY(-15px);
}

100%{
transform:translateY(0px);
}

}

/* RESPONSIVE */

@media(max-width:1000px){

.container{
flex-direction:column;
}

.left,
.right{
width:100%;
padding:45px;
}

.left{
text-align:center;
align-items:center;
}

.left h1{
font-size:42px;
}

.right h2{
font-size:42px;
text-align:center;
}

.right p{
text-align:center;
}

.hero-content h1{
font-size:42px;
}

}

@media(max-width:600px){

body{
padding:15px;
}

.left,
.right{
padding:28px;
}

.left h1{
font-size:34px;
}

.right h2{
font-size:34px;
}

.hero-content h1{
font-size:30px;
}

.hero-content p{
font-size:16px;
}

.input-box{
height:60px;
font-size:15px;
}

.btn{
height:60px;
font-size:18px;
}

}

</style>

</head>

<body>

<div class="bg"></div>

<div class="container-wrapper">

<!-- HERO SECTION -->

<div class="hero-image">

<div class="overlay"></div>

<div class="hero-content">

<h1>
Future Tech Workshop 2026
</h1>

<p>
Learn AI, Cloud Computing,
Cyber Security and Modern
Web Development from experts.
</p>

</div>

</div>

<!-- MAIN CONTAINER -->

<div class="container">

<!-- LEFT -->

<div class="left">

<h1>
Workshop Registration
</h1>

<p>
Join premium technology workshops
and upgrade your future skills.
</p>

<img src="https://cdni.iconscout.com/illustration/premium/thumb/online-learning-3462438-2912017.png">

</div>

<!-- RIGHT -->

<div class="right">

<h2>
Register Now
</h2>

<p>
Complete your details below.
</p>

<form method="POST" enctype="multipart/form-data">

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

<select
name="workshop"
class="input-box"
required>

<option value="">
Select Workshop
</option>

<option value="AI Workshop">
AI Workshop
</option>

<option value="Cyber Security">
Cyber Security
</option>

<option value="Cloud Computing">
Cloud Computing
</option>

<option value="Web Development">
Web Development
</option>

<option value="Data Science">
Data Science
</option>

<option value="Machine Learning">
Machine Learning
</option>

<option value="Blockchain">
Blockchain
</option>

<option value="UI UX Design">
UI UX Design
</option>

<option value="IoT Systems">
IoT Systems
</option>

<option value="DevOps Engineering">
DevOps Engineering
</option>

</select>

<select
name="meal"
class="input-box"
required>

<option value="">
Select Meal Preference
</option>

<option>
Veg
</option>

<option>
Non Veg
</option>

</select>

<!-- PAYMENT SCREENSHOT -->

<div class="upload-container">

<label class="upload-label">
Upload Payment Screenshot
</label>

<label class="upload-box">

<input
type="file"
name="payment_ss"
accept="image/png,image/jpeg,image/jpg"
required>

<img
src="https://cdn-icons-png.flaticon.com/512/724/724933.png"
class="upload-icon">

<h3>Click to Upload</h3>

<p>PNG, JPG, JPEG up to 5MB</p>

</label>

</div>

<button
type="submit"
name="register"
class="btn">

Complete Registration

</button>

</form>

<div class="safe">
🔒 Your information is safe with us.
</div>

</div>

</div>

</div>

</body>
</html>