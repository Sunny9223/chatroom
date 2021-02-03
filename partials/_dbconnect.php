<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "chatroom";
$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
    mysqli_connect_error();
}
?>