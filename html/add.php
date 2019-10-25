<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if($_SERVER['REQUEST_METHOD']=='POST'){
	
    $con = mysqli_connect("localhost","root","SACHIN@1997v6","event_test") or die('Unable to Connect...');
    $eventname = $_POST['eventname'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $event_date = $_POST['event_date'];
    $event_time = $_POST['event_time'];
    //$photo = $_POST['photo'];
	echo $event_time;
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
	if(mysqli_query($con,"INSERT INTO `event` (`id`, `eventname`, `description`, `location`, `event_date`, `event_time`, `photo`) VALUES (NULL, '$eventname', '$description', '$location', '$event_date', '$event_time', '$img')"))
        {
		//echo "dF";
//filling response array with values
            $response['error'] = false;
            $response['eventname'] = $eventname;
            $response['description'] = $description;
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

?>
