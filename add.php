<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if($_SERVER['REQUEST_METHOD']=='POST'){
	
    $con = mysqli_connect("localhost","root","SACHIN@1997v6","event_test") or die('Unable to Connect...');
    $coord_id_s = $_POST['coord_id'];
    $eventname = $_POST['eventname'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $seat_s = $_POST['seat'];
    $event_date = $_POST['event_date'];
    $event_time = $_POST['event_time'];
    //$photo = $_POST['photo'];
	echo $eventname;

	$coord_id = (int)$coord_id_s;
	$seat = (int)$seat_s;
    $ifp = fopen( "/var/www/html/image/".$eventname.".jpg", 'w' );
    //echo $ifp;
	$img=$eventname.".jpg";
    // split the string on commas
    // $data[ 0 ] == "data:image/png;base64"
    // $data[ 1 ] == <actual base64 string>
    $data = explode( ',', $_POST['photo'] );
   
    // we could add validation here with ensuring count( $data ) > 1
    fwrite( $ifp, base64_decode( $data[ 0 ] ) );

    // clean up the file resource
    fclose( $ifp );
    try
    {
	 
       // if(mysqli_query($con,"insert into event(id,eventname,description,location,event_date,event_time,photo) values ('','$eventname', '$description', '$location','$event_date','$event_time','')"))
	if(mysqli_query($con,"INSERT INTO `event` (`event_id`,`coord_id`, `eventname`, `description`, `location`, `event_date`, `event_time`, `photo`,`seat`) VALUES (NULL,'$coord_id','$eventname', '$description', '$location', '$event_date', '$event_time', '$img','$seat')"))
        {
		$last_id = mysqli_insert_id($con);
		//echo "dF";
//filling response array with values
            $response['error'] = false;
            $response['eventname'] = $eventname;
            $response['description'] = $description;

	//notification
		$sql="select token from people";
	$result=mysqli_query($con,$sql);
	
		while($row = mysqli_fetch_assoc($result)) 
		{
        
			sendFCM("['$last_id','$eventname','$description','$location','$event_date','$event_time','$img']","EVENT",$row["token"]);
			echo $row["token"];
			echo $eventname;
    		}
	
        }
//if some error occurred
    }catch(Exception $e){
        $response['error']=true;
        $response['message']=$e->getMessage();
    }
    
    mysqli_close($con);
}
else{
    $response['error']=true;
    $response['message']='Please choose a file';
}

function sendFCM($mess,$title,$id) {
$url = 'https://fcm.googleapis.com/fcm/send';
$fields = array (
        'to' => $id,
        'notification' => array (
                "body" => $mess,
                "title" => $title,
                "icon" => "myicon"
        )
);
$fields = json_encode ( $fields );
$headers = array (
        'Authorization: key=' . "AIzaSyA1_Z3LYJl4El19YpcpIEZ-bGYoJlSMRbg",
        'Content-Type: application/json'
);

$ch = curl_init ();
curl_setopt ( $ch, CURLOPT_URL, $url );
curl_setopt ( $ch, CURLOPT_POST, true );
curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

$result = curl_exec ( $ch );
curl_close ( $ch );
}

?>
