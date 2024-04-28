<?php

require "connect.php";
$pdo= Database::letsconnect();
$transaction = "Get-User-Data";

switch($transaction){
    case "Get-User-Data":
         getUserData();
       break;
         default:
         echo "yes";
         break;
 }


function getUserData(){
    $sql = "SELECT * FROM user"; 
    $data = Database::GetAllData($GLOBALS['pdo'], $sql);
    echo json_encode($data);
}

?>