<?PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['event_id']) && !empty(isset($_POST['event_id']))){ 
    include_once("connection.php"); 
  $event_id = $_POST['event_id']; 
  //$password = $_POST['password'];     
    $sql = "SELECT * FROM event WHERE event_id = '$event_id'"; 

   $result = $conn->query($sql); 
	
  if($result->num_rows > 0) 
	{ 
    		 while($row = $result->fetch_assoc())
			{
			echo $row["seat"];

			//$json =  json_encode($tem);
			}
  	} 
  else 
	{ 
    echo "0"; 
  	}
 
}
?>
