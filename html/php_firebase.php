<?php

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
sendFCM("['sdsd','a.jpg']","EVENT","enymcMIa3w0:APA91bGsyll2bT9uO9XlXttBE_-jnmoigq2LBWM_7nEHwTc1faDA7opoFdQ37kcDh-G80HCIXcC-uumri3sTPqJFdGYhNE59ZJmxCEhhsC8w-uUqc9yoINksWh80S_FWmS1IFb2B1k1u");
?>
