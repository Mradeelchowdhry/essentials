<?php 
$server="localhost";
$username="root";
$dbpass="";
$dbname="adeel";


$connection= mysqli_connect($server,$username,$dbpass,$dbname)  ;
    if(!$connection){
        die("failed to connect");
    }


?>