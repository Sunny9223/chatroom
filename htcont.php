<?php
    include "partials/_dbconnect.php";
    $room = $_POST['room'];
    $sql = "SELECT * FROM messages WHERE room = '$room'";
    $result = mysqli_query($conn, $sql);
    $res = "";
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $res = $res . '<div class="container">';
            $res = $res . $row['ip'];
            $res = $res . " Says<p>" . $row['msg'];
            $res = $res . "</p><span class='time-right'>" . $row['tstamp'] . "</span></div>";
        }
    }
    echo $res;
?>