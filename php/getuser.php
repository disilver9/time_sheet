<?php
session_start();
?>
<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


echo  json_encode($_SESSION["user"]);
?>              