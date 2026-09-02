<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Workshops</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

body{
    background:#0f172a;
    color:white;
    font-family:'Poppins',sans-serif;
    padding:40px;
}

.container{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:25px;
}

.card{
    background:#111827;
    padding:30px;
    border-radius:20px;
    transition:0.3s;
}

.card:hover{
    transform:translateY(-5px);
}

h1{
    margin-bottom:35px;
}

.back{
    display:inline-block;
    margin-bottom:25px;
    text-decoration:none;
    color:white;
    background:#2563eb;
    padding:12px 20px;
    border-radius:10px;
}

</style>

</head>

<body>

<a href="admin.php" class="back">
← Back Dashboard
</a>

<h1>Available Workshops</h1>

<div class="container">

<div class="card">
<h2>Web Development</h2>
<p>HTML, CSS, JavaScript, PHP</p>
</div>

<div class="card">
<h2>Cyber Security</h2>
<p>Network Security & Ethical Hacking</p>
</div>

<div class="card">
<h2>Cloud Computing</h2>
<p>AWS, Azure & DevOps</p>
</div>

<div class="card">
<h2>UI/UX Design</h2>
<p>Figma & Design Systems</p>
</div>

</div>

</body>
</html>