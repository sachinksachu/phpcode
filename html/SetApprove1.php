<?php
$con = mysqli_connect("localhost","root","SACHIN@1997v6","event_test");
if(!$con)
echo "error connecting to db";

if($_SERVER['REQUEST_METHOD']=='POST'){
	$event_id_s = $_POST['event_id'];
}

$event_id = (int) $event_id_s;
//echo $event_id;
$sql = "UPDATE `event` SET `approve` = '1' WHERE `event`.`event_id` = $event_id";
$result = $con->query($sql);

//echo $json;
?>

