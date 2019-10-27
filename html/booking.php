<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

	$con = mysqli_connect("localhost","root","SACHIN@1997v6","event_test") or die('Unable to Connect...');
	$event_id = $_POST['event_id'];
    	$user_id = $_POST['user_id'];
	
	$event_id_int = (int)$event_id;
	$user_id_int = (int)$user_id;
	
	 try
    	{
	//echo $event_id_int;
	 
       // if(mysqli_query($con,"insert into event(id,eventname,description,location,event_date,event_time,photo) values ('','$eventname', '$description', '$location','$event_date','$event_time','')"))
	if(mysqli_query($con,"INSERT INTO `Booking` (`book_id`, `userid`, `eventid`) VALUES (NULL, '$user_id_int', '$event_id_int')"))
        {
		//echo "dF";
//filling response array with values
            $response['error'] = false;
            $response['event_id'] = $event_id;
            $response['user_id'] = $user_id;
		echo "success";
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
