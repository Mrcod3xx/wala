<?php
    $con = mysqli_connect("localhost", "root", "", "dbshssched");
    if($con == false){
        die("Connection Error". mysqli_connect_error());
    }
?>