<?php
include "partials/_dbconnect.php";
$room = $_POST['room'];
if (strlen($room)>20 or strlen($room)<2) {
    $message = "Please choose the length between 2 to 20 characters";
    echo '<script>
    alert("'.$message.'");
    </script>';
    echo '<script>
        window.location="/chatroom";
    </script>';
}
if (!ctype_alpha($room)) {
    $message = "Please provide Aplha numberic names!";
    echo '<script>
    alert("'.$message.'");
    </script>';
    echo '<script>
        window.location="/chatroom";
    </script>';
}
else{
    $sql = "SELECT * FROM `claim` WHERE roomname = '$room'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $message = "Room is already claimed. Please try with different room name!";
            echo '<script>
            alert("'.$message.'");
            </script>';
            echo '<script>
            window.location="/chatroom";
        </script>';
        }
        else{
            $sql = "INSERT INTO `claim`(`roomname`) VALUES ('$room')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: /chatroom/rooms.php?roomname=$room");
            }
        }
}
?>