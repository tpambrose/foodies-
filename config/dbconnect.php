<?php

    $conn = mysqli_connect('localhost', 'Admin', '12345', 'admin');

    if(!$conn){
        echo 'connection failed' .mysqli_connect_error();

    }


?>