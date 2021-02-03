<?php
include "partials/_dbconnect.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $msg = $_POST['text'];
    $room = $_POST['room'];
    $ip = $_POST['ip'];
    
    $sql = "INSERT INTO `messages` (`sno`, `msg`, `room`, `ip`, `tstamp`) VALUES (NULL, '$msg', '$room', '$ip', current_timestamp());";
    $result = mysqli_query($conn, $sql);
}
?>