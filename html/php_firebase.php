<?php
echo "df";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

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

$con = mysqli_connect("localhost","root","SACHIN@1997v6","event_test");
if($con)
{
	echo "df";
	$sql="select token from people";
	$result=mysqli_query($con,$sql);
	
		while($row = mysqli_fetch_assoc($result)) 
		{
        
			sendFCM("['sdsd','a.jpg']","EVENT",$row["token"]);
			echo $row["token"];
    		}
	
}

?>
