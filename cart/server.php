<?php
    session_start();

    $conn = mysqli_connect("localhost" , "root" , "" , "cart");

    if(!$conn){
        echo "ERROR Can't Connect";
    }

    

?>