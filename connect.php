<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "wirada_29";

$con = mysqli_connect($host, $user, $pass, $dbname);

if (mysqli_connect_errno()) {
  echo "การเชื่อมต่อผิดพลาด" . mysqli_connect_error();
  exit();
}
