<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="css/rooms.css">
    <link rel="stylesheet" href="css/product.css">

</head>

<body>
    <style>
    .anyClass {
        height: 350px;
        overflow-y: scroll;
        padding: 5px;
    }
    </style>
    <!-- <?php include "partials/_navbar.php"; ?> -->
    <?php
    $roomname = $_GET['roomname'];
    include "partials/_dbconnect.php";
    $sql = "SELECT * FROM `claim` WHERE roomname = '$roomname'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        $message = "This room is not claimed yet!";
        echo '<script>
    alert("' . $message . '");
    </script>';
        echo '<script>
        window.location="/chatroom";
    </script>';
    }
    ?>
    <h2 class="text-center">Secure Chats</h2>
            <div class="container">
            <div class="anyClass">
            </div>
            </div>
      
    <!--  -->
        <div class="container input-group mb-3" style="background-color: white !important;">
            <input type="text" id="userMsg" name="userMsg" class="form-control mx-2" placeholder="Enter your message here..."
                aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-success" type="button" name="submitBtn" id="submitBtn">Button</button>
        </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>      
    <script>
        var input = document.getElementById("userMsg");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
    event.preventDefault();
    document.getElementById("submitBtn").click();
  }
});
    </script>                      
    <script>
        setInterval(runFunction, 1000);
        function runFunction(){
            $.post("htcont.php", {room:'<?php echo $roomname; ?>'},
            function(data,status){
                document.getElementsByClassName('anyClass')[0].innerHTML = data; 
            }
            )
        }
    </script>                                     
    <script>
        $("#submitBtn").click(function(){
    var clientMsg = $('#userMsg').val();
  $.post("_msg.php",{text: clientMsg, room:'<?php echo $roomname; ?>', ip:'<?php echo $_SERVER['REMOTE_ADDR']; ?>'},
  function(data,status){
      document.getElementsByClassName('anyClass')[0],innerHTML = data;
      $('#userMsg').val("");
        return false;
    });
});
    </script>
</body>

</html>