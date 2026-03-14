<?php
session_start();
include "db.php";

header("Content-Type: application/json");

/* CHECK LOGIN */
if(!isset($_SESSION['user'])){
    echo json_encode(["status"=>"login_required"]);
    exit();
}

/* GET JSON DATA */
$data = json_decode(file_get_contents("php://input"), true);

if(!$data){
    echo json_encode(["status"=>"error","message"=>"No data received"]);
    exit();
}

$package = $data['package'];
$price = $data['price'];
$user_id = $_SESSION['user']['id'];

/* INSERT BOOKING */
$stmt = $conn->prepare("INSERT INTO bookings (user_id, package_name, price) VALUES (?, ?, ?)");

if(!$stmt){
    echo json_encode(["status"=>"error","message"=>$conn->error]);
    exit();
}

$stmt->bind_param("isi",$user_id,$package,$price);

if($stmt->execute()){
    echo json_encode(["status"=>"success"]);
}else{
    echo json_encode(["status"=>"error","message"=>$stmt->error]);
}
?>