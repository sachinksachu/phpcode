<?PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['admin_id']) && !empty(isset($_POST['admin_id'])) 
  && isset($_POST['password']) && !empty(isset($_POST['password']))){ 
    include_once("connection.php"); 
    $admin_id = $_POST['admin_id']; 
    $password = $_POST['password'];     
    $sql = "SELECT admin_id FROM Admin 
          WHERE admin_id = '$admin_id' AND password = '$password'"; 

    $result = $conn->query($sql); 

  if ($result->num_rows > 0)
	{ 
    		// while($row = $result->fetch_assoc())
		//	{
		//	echo $row["user_id"];

			//$json =  json_encode($tem);
		//	}
		echo "success";
  	} 

  else { 
    echo "0"; 
  }
}
?>
