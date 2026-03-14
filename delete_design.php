<?php
session_start();
include "db.php";

if(!isset($_SESSION['user'])){
header("Location: login.php");
exit;
}

if(isset($_POST['id'])){

$id = intval($_POST['id']);
$user_id = $_SESSION['user']['id'];

/* delete only user own design */

$stmt = $conn->prepare("DELETE FROM user_designs WHERE id=? AND user_id=?");
$stmt->bind_param("ii",$id,$user_id);
$stmt->execute();

}

header("Location: designs.php");
exit;
?>