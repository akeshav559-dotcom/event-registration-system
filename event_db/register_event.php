<?php

include 'db.php';

$user_id = $_SESSION['user_id'];

$workshop = $_POST['workshop'];

$meal = $_POST['meal'];

$sql = "INSERT INTO registrations
(user_id,workshop,meal)

VALUES

('$user_id','$workshop','$meal')";

if(mysqli_query($conn,$sql)){

echo "

<script>

alert('Registration Successful');

window.location='dashboard.php';

</script>

";

}
else{

echo mysqli_error($conn);

}

?>