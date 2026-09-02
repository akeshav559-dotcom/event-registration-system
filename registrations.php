<?php

include 'db.php';

/* FETCH REGISTRATIONS */
$sql = "SELECT * FROM registrations ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

/* TOTAL REGISTRATIONS */
$totalRegistrations = mysqli_num_rows($result);

/* TOTAL PAYMENT */
$totalPayment = $totalRegistrations * 500;

/* TOTAL WORKSHOPS */
$workshopQuery = mysqli_query($conn,
"SELECT COUNT(DISTINCT workshop) as total_workshops FROM registrations");

$totalWorkshops =
mysqli_fetch_assoc($workshopQuery)['total_workshops'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Registrations Dashboard</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#0f172a;
color:white;
padding:40px;
overflow-x:hidden;
}

/* BACKGROUND */

.bg{
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:
radial-gradient(circle at top left,#2563eb 0%,transparent 30%),
radial-gradient(circle at bottom right,#7c3aed 0%,transparent 30%);
opacity:0.12;
z-index:-1;
}

/* HERO SECTION */

.hero-section{
background:linear-gradient(145deg,#111827,#1e1b4b);
padding:50px;
border-radius:35px;
margin-bottom:40px;
border:1px solid rgba(255,255,255,0.06);
position:relative;
overflow:hidden;
}

.hero-section::before{
content:'';
position:absolute;
width:500px;
height:500px;
background:radial-gradient(circle,#2563eb55,transparent 70%);
top:-200px;
right:-180px;
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
font-weight:800;
line-height:1.1;
margin-bottom:20px;
}

.hero-text p{
font-size:18px;
line-height:1.7;
color:#cbd5e1;
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
margin-right:15px;
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
max-width:520px;
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

/* STATS */

.stats{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
gap:20px;
margin-bottom:35px;
}

.card{
background:#111827;
padding:30px;
border-radius:24px;
border:1px solid rgba(255,255,255,0.05);
position:relative;
overflow:hidden;
}

.card::before{
content:'';
position:absolute;
width:120px;
height:120px;
border-radius:50%;
background:rgba(255,255,255,0.04);
top:-40px;
right:-40px;
}

.card h3{
font-size:18px;
margin-bottom:15px;
color:#94a3b8;
}

.card h2{
font-size:42px;
font-weight:700;
}

/* SEARCH */

.search-box{
margin-bottom:25px;
}

.search-box input{
width:100%;
padding:16px 20px;
border:none;
outline:none;
border-radius:16px;
background:#111827;
color:white;
font-size:16px;
border:1px solid rgba(255,255,255,0.05);
}

.search-box input::placeholder{
color:#94a3b8;
}

/* TABLE */

.table-box{
background:#111827;
border-radius:25px;
overflow-x:auto;
padding:20px;
border:1px solid rgba(255,255,255,0.05);
}

table{
width:100%;
border-collapse:collapse;
}

th{
background:#1e293b;
padding:20px;
text-align:left;
font-size:16px;
}

td{
padding:20px;
border-bottom:1px solid rgba(255,255,255,0.05);
color:#cbd5e1;
vertical-align:middle;
}

tr:hover{
background:#1e293b;
}

/* BADGES */

.badge{
padding:8px 16px;
border-radius:30px;
font-size:14px;
font-weight:500;
display:inline-block;
}

.workshop-badge{
background:rgba(124,58,237,0.2);
color:#c4b5fd;
}

.meal-badge{
background:rgba(16,185,129,0.2);
color:#6ee7b7;
}

/* IMAGE */

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

/* ACTION BUTTONS */

.actions{
display:flex;
gap:10px;
}

.btn{
padding:10px 16px;
border-radius:12px;
text-decoration:none;
font-size:14px;
font-weight:600;
color:white;
transition:0.3s;
}

.view-btn{
background:#2563eb;
}

.delete-btn{
background:#ef4444;
}

.btn:hover{
transform:translateY(-2px);
}

/* RESPONSIVE */

@media(max-width:900px){

body{
padding:20px;
}

.hero-text h1{
font-size:42px;
}

th,
td{
padding:14px;
font-size:14px;
}

.payment-img{
width:70px;
height:70px;
}

.hero-section{
padding:30px;
}

}

</style>

</head>

<body>

<div class="bg"></div>

<!-- HERO SECTION -->

<div class="hero-section">

<div class="hero-content">

<div class="hero-text">

<h1>
Event Registrations Dashboard
</h1>

<p>
Manage registrations, workshop participants, payments and event records with a modern dashboard experience.
</p>

<a href="admin.php" class="hero-btn">
← Back Dashboard
</a>

<a href="analytics.php" class="hero-btn">
View Analytics
</a>

</div>

<div class="hero-image">

<img src="uploads/registration-hero.png">

</div>

</div>

</div>

<!-- STATS -->

<div class="stats">

<div class="card">
<h3>Total Registrations</h3>
<h2><?php echo $totalRegistrations; ?></h2>
</div>

<div class="card">
<h3>Total Workshops</h3>
<h2><?php echo $totalWorkshops; ?></h2>
</div>

<div class="card">
<h3>Total Payment</h3>
<h2>₹<?php echo number_format($totalPayment); ?></h2>
</div>

</div>

<!-- SEARCH -->

<div class="search-box">

<input
type="text"
id="searchInput"
placeholder="Search by name, email or workshop...">

</div>

<!-- TABLE -->

<div class="table-box">

<table id="registrationTable">

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Workshop</th>
<th>Meal</th>
<th>Payment Screenshot</th>
<th>Actions</th>

</tr>

<?php
while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td class="name"><?php echo $row['name']; ?></td>

<td class="email"><?php echo $row['email']; ?></td>

<td class="workshop">
<span class="badge workshop-badge">
<?php echo $row['workshop']; ?>
</span>
</td>

<td>
<span class="badge meal-badge">
<?php echo $row['meal']; ?>
</span>
</td>

<!-- IMAGE -->

<td>

<?php
$image = "uploads/" . $row['payment_ss'];

if(file_exists($image)){
?>

<a href="<?php echo $image; ?>" target="_blank">

<img
src="<?php echo $image; ?>"
class="payment-img">

</a>

<?php
}else{
echo "<span style='color:red;'>Image Not Found</span>";
}
?>

</td>

<!-- ACTIONS -->

<td>

<div class="actions">

<a
href="<?php echo $image; ?>"
target="_blank"
class="btn view-btn">
View
</a>

<a
href="delete_registration.php?id=<?php echo $row['id']; ?>"
class="btn delete-btn"
onclick="return confirm('Delete this registration?')">
Delete
</a>

</div>

</td>

</tr>

<?php
}
?>

</table>

</div>

<!-- SEARCH SCRIPT -->

<script>

const searchInput =
document.getElementById("searchInput");

searchInput.addEventListener("keyup", function(){

const value = this.value.toLowerCase();

const rows =
document.querySelectorAll("#registrationTable tr");

rows.forEach((row,index)=>{

if(index===0) return;

const name =
row.querySelector(".name").innerText.toLowerCase();

const email =
row.querySelector(".email").innerText.toLowerCase();

const workshop =
row.querySelector(".workshop").innerText.toLowerCase();

if(
name.includes(value) ||
email.includes(value) ||
workshop.includes(value)
){
row.style.display = "";
}else{
row.style.display = "none";
}

});

});

</script>

</body>
</html>