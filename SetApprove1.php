<?PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['seat']) && !empty(isset($_POST['seat']))){ 
    include_once("connection.php"); 
  $event_id = $_POST['event_id']; 
	$seat = $_POST['seat'];
  //$password = $_POST['password'];     
    $sql = "UPDATE `event` SET `approve` = '1' WHERE `event`.`event_id` = $event_id"; 

   $result = $conn->query($sql); 
	
  if($result->num_rows > 0) 
	{ 
    		 echo "approved"
  	} 
  else 
	{ 
    echo "0"; 
  	}
 
}
?>
