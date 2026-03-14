<?php

$conn = new mysqli("localhost","root","","bestart_db");

if($conn->connect_error){
die("Connection failed: ".$conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$service = $_POST['service'];
$details = $_POST['details'];

$sql = "INSERT INTO custom_requests (name,email,phone,service,details)
VALUES ('$name','$email','$phone','$service','$details')";

if($conn->query($sql)){
echo "<script>alert('Request submitted successfully'); window.location='index.php';</script>";
}else{
echo "Error";
}

?>