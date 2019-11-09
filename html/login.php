<?PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['mobile']) && !empty(isset($_POST['mobile'])) 
  && isset($_POST['password']) && !empty(isset($_POST['password']))){ 
    include_once("connection.php"); 
    $mobile = $_POST['mobile']; 
    $password = $_POST['password'];     
    $sql = "SELECT user_id FROM people 
          WHERE mobile = '$mobile' AND password = '$password'"; 

    $result = $conn->query($sql); 

  if ($result->num_rows > 0)
	{ 
    		 while($row = $result->fetch_assoc())
			{
			echo $row["user_id"];

			//$json =  json_encode($tem);
			}
  	} 

  else { 
    echo "0"; 
  }
}
?>
