<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$sql = "SELECT * FROM client";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    $stuff=array();
        
    for ($x = 0; $x < $result->num_rows ; $x++) {
        $stuff[$x]=$result->fetch_array(MYSQL_ASSOC);
    }
    

   
  $myJSON = json_encode($stuff);
  echo $myJSON;

 
} else {
    echo "0 $result->fetch_array(MYSQLI_ASSOC)results";
}
$conn->close();
?>              