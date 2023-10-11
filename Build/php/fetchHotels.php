<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = $_POST['location'];
    $available_date = $_POST['start_date'];
    $room_type = $_POST['roomType'];
    //echo $location, $available_date, $room_type;

    $sql = "SELECT * FROM hotels 
            WHERE hotel_location = '$location' 
            AND available_date = '$available_date' 
            AND room_type = '$room_type'";

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
