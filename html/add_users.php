<?php
$con = mysqli_connect("localhost","root","SACHIN@1997v6","event_test");
if(!$con)
echo "error connecting to db";

$mobile = $_POST['mobile'];
$email = $_POST['email'];
$password = $_POST['password'];

if(mysqli_query($con,"insert into people(mobile,email,password) values('$mobile','$email','$password')"))
echo '{"status":"added"}';
else
echo '{"status":"failed"}';
?>
