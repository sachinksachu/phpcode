<?php
$con = mysqli_connect("localhost","root","SACHIN@1997v6","event_test");
if(!$con)
echo "error connecting to db";

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$password = $_POST['password'];
$token = $_POST['token'];

if(mysqli_query($con,"insert into people(name,mobile,email,password,token) values('$name','$mobile','$email','$password','$token')"))
echo '{"status":"added"}';
else
echo '{"status":"failed"}';
?>
