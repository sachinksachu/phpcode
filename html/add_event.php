<?php

$upload_path = 'image/';

//Getting the server ip
$server_ip = gethostbyname(gethostname());

//creating the upload url
$upload_url = 'http://'.$server_ip.'/'.$upload_path;

//response array
$response = array();


if($_SERVER['REQUEST_METHOD']=='POST'){

//checking the required parameters from the request
if(isset($_POST['name']) and isset($_POST['email']) and isset($_FILES['image']['name']) )
{

//connecting to the database
    $con = mysqli_connect("localhost","root","SACHIN@1997v6","event_test") or die('Unable to Connect...');

//getting name from the request
$name = $_POST['name'];
$email = $_POST['email'];

//getting file info from the request
$fileinfo = pathinfo($_FILES['image']['name']);

//getting the file extension
$extension = $fileinfo['extension'];

//file url to store in the database
$file_url = $upload_url . getFileName() . '.' . $extension;

//file path to upload in the server
$file_path = $upload_path . getFileName() . '.'. $extension;

//trying to save the file in the directory
try{
//saving the file
move_uploaded_file($_FILES['image']['tmp_name'],$file_path);
$sql = "INSERT INTO 'event' ('name','email','photo') VALUES ('$name', '$email', '$file_url');";

//adding the path and name to database
if(mysqli_query($con,$sql)){

//filling response array with values
$response['error'] = false;
$response['name'] = $name;
$response['email'] = $email;
}
//if some error occurred
}catch(Exception $e){
$response['error']=true;
$response['message']=$e->getMessage();
}
//displaying the response
echo json_encode($response);

//closing the connection
mysqli_close($con);
}else{
$response['error']=true;
$response['message']='Please choose a file';
}
}

//We are generating the file name
//so this method will return a file name for the image to be upload
function getFileName()
{
    $con = mysqli_connect("localhost","root","SACHIN@1997v6","event_test") or die('Unable to Connect...');
    $sql = "SELECT max(id) as id FROM event";
    $result = mysqli_fetch_array(mysqli_query($con, $sql));

    mysqli_close($con);
    if ($result['id'] == null)
        return 1;
    else
        return ++$result['id'];
}
?>
