<?php


if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
   header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

          function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }
      }
      
      $yummy = json_decode($user_params);
      $title = test_input($_POST["title"]);
	  $client = test_input($_POST["client"]);
	  $employee = test_input($_POST["employee"]);
	  $comments = test_input($_POST["comments"]);
	  $date1 = test_input($_POST["date"]);
	  $end1 = test_input($_POST["end"]);
	  $start = test_input($_POST["start"]);
	  $total = test_input($_POST["total"]);
	  

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "INSERT INTO sheet (title,client,employee,comments,date1,end1,start,total)
VALUES ( '$title','$client','$employee','$comments','$date1','$end1','$start','$total')";

if ($conn->query($sql) === TRUE) {
    echo json_encode("New record created successfully");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
              
              
              