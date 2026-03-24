<?php
header("Content-Type: application/json");
include("../config/conexion.php");

$genero = $_GET["genero"];


$sql = "SELECT nombre FROM peliculas WHERE genero = '$genero' LIMIT 1";
$result = $conn->query($sql);

if ($row = $result->fetch_assoc()) {
    echo json_encode($row);
} else {
    http_response_code(404);
    echo json_encode(["error" => "No encontrado"]);
}
?>
