<?PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

if( isset($_POST['event_id']) && !empty(isset($_POST['event_id'])) ){ 
    include_once("connection.php"); 
    $event_id_ = $_POST['event_id']; 
   $event_id = (int)$event_id_;
    //$sql = "SELECT people.user_id, people.name, people.mobile, people.email FROM people INNER JOIN Booking ON people.user_id=Booking.user_id where Booking.event_id = '$event_id' ";

$sql= "SELECT people.user_id, people.name, people.mobile, people.email FROM people INNER JOIN Booking ON people.user_id=Booking.user_id where Booking.event_id = $event_id ";

    $result = $conn->query($sql); 
	
  if ($result->num_rows > 0)
	{ 
		$data = array();
    		 while($row = $result->fetch_assoc())
			{
			
			$data[]=$row;
			
			
			}
echo json_encode($data);
		//echo "success";
  	} 

  else { 
    echo "0"; 
  }

//echo $json;
}

?>
