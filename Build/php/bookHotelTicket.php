<?php
session_start();
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['username'];
    $hotel_name = $_POST['hotel_name'];
    $hotel_address = $_POST['hotel_address'];
    $room_type = $_POST['room_type'];
    $adults = $_POST['adults'];

    $sql = "INSERT INTO hotel_reservations (user_id, hotel_name, adults, room_type, hotel_address) 
            VALUES ('$user_id', '$hotel_name','$adults','$room_type', '$hotel_address')";

    if ($con->query($sql) === TRUE) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["error" => $con->error]);
    }
}
