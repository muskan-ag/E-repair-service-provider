<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "osrcdb";
$dp_port = 3306;

//create connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name, $dp_port);

if($conn->connect_error){
    die("Connection Failed");
}else{
    echo "";
}
?>