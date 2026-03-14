<?php
$conn = new mysqli(
    "sql204.infinityfree.com",
    "if0_41354369",
    "Harmanpreet909",
    "if0_41354369_bestart_db"
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>