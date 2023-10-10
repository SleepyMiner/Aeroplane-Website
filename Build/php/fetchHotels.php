<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = $_POST['location'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $adults = $_POST['adults'];
    $roomType = $_POST['roomType'];

    $sql = "SELECT * FROM hotels 
            WHERE hotel_location = '$location' 
            AND room_type = '$roomType' 
            AND available_date = '$start_date'";

    $result = $con->query($sql);

    if ($result) {
        $hotels = [];
        while ($row = $result->fetch_assoc()) {
            $hotels[] = $row;
        }
        if (count($hotels) > 0) {
            echo json_encode($hotels);
        } else {
            echo json_encode(["error" => "No Hotels found"]);
        }
    } else {
        echo json_encode(["error" => $con->error]);
    }
}
