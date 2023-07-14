<?php
// used to connect to the database
$host = "localhost"; //Host and Server 
$port = 3306;
$db_name = "que"; // database name
$username = "queroot"; // username for accessing school_management-db
$password = "8Yv8xb?71";// password for accessing school_management-db
 
/////////////////////////////////////////////////////////////////////////////////
try {
    $con = new PDO("mysql:host={$host}:$port;dbname={$db_name}", $username, $password);
}
//////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////////
// show error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
/////////////////////////////////////////////////////////////////
?>