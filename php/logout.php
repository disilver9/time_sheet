<?php
session_start();
?>
<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


// remove all session variables
session_unset();

// destroy the session
session_destroy(); 
?>              