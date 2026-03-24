<?php
header("Content-Type: application/json");

$gen = $_GET["genero"] ?? "movie";
$url = "http://www.omdbapi.com/?apikey=564727fa&s=" . urlencode($gen);
$opciones = array(
    "http" => array(
        "method" => "GET",
        "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36\r\n"
    )
);

$contexto = stream_context_create($opciones);
$respuesta = @file_get_contents($url, false, $contexto);

if ($respuesta === FALSE) {
    echo json_encode(["Response" => "False", "Error" => "El servidor gratuito bloqueó la conexión externa."]);
} else {
    echo $respuesta;
}
?>
