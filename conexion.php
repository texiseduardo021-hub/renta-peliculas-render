<?php
$host = "sql209.infinityfree.com";
$user = "if0_40980473";
$pass = "GyhCOoNzxGczS"; 
$db   = "if0_40980473_peliculas";

$conn = new mysqli($host, $user, $pass, $db);

$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Error de conexión");
}
?>
