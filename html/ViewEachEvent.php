<?php
$con = mysqli_connect("localhost","root","SACHIN@1997v6","event_test");
if(!$con)
echo "error connecting to db";

if($_SERVER['REQUEST_METHOD']=='POST'){
	$event_id = $_POST['event_id'];
}
$sql = "select * from event where event_id = '$event_id'";
$result = $con->query($sql);

if($result->num_rows > 0)
{

 while($row[] = $result->fetch_assoc())
{
$tem = $row;

$json =  json_encode($tem);
}
}
else
{
	echo "No result";
}
echo $json;
?>

