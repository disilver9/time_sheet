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
      $name = test_input($_POST["username"]);
	  $pass = test_input($_POST["password"]);
	  

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

$sql = "SELECT * FROM user where username = '$name' " ;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
        if ($row["password"]==$pass){ 
            session_start();
            $user = array('username'=> $row["username"],'first_name' => $row["first_name"],'last_name' => $row["last_name"],'address' => $row["address"]);
            $_SESSION["user"] = $user;
           echo json_encode('Clear to Go');
            
            
        }else{
            echo json_encode('Incorrect Password');
            
        }
        
} else {
    echo json_encode("Username does not exist");
}

mysqli_close($conn);

?>
              
              
              