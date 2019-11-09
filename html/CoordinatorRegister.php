<?php
$con = mysqli_connect("localhost","root","SACHIN@1997v6","event_test");
if(!$con)
echo "error connecting to db";

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$password = $_POST['password'];

if(mysqli_query($con,"INSERT INTO `coordinator` (`coord_id`, `coordinator_name`, `coordinator_mobile`, `coordinator_email`, `password`) VALUES (NULL, '$name', '$mobile', '$email', '$password');"))
echo "success";
else
echo "failed";
?>
