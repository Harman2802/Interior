<?php
session_start();
include "db.php";

if(!isset($_SESSION['user'])){
    echo json_encode(["status"=>"login_required"]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

$user_id = $_SESSION['user']['id'];
$name = $data['package'];
$price = $data['price'];

$stmt = $conn->prepare("INSERT INTO user_designs(user_id,package_name,price) VALUES(?,?,?)");
$stmt->bind_param("isi",$user_id,$name,$price);
$stmt->execute();

echo json_encode(["status"=>"success"]);
?>