<?php
header("Content-Type: application/json");

function obtenerDatosPelicula($genero) {
    $genero = strtolower($genero);

    // Definimos nombre e imagen para cada género
    if ($genero === "accion") {
        return [
            "nombre" => "John Wick",
            "imagen" => "https://play-lh.googleusercontent.com/vByxM5S2LXTqxdDo84ilW2D1M8WWDC-Om3M2wWwZ3Nb9pU70MAceTI3HvPJL5Yq0i9Xj"
        ];
    } elseif ($genero === "comedia") {
        return [
            "nombre" => "Superbad",
            "imagen" => "https://m.media-amazon.com/images/S/pv-target-images/bb91a439ff92a68e22fc18b3f00a4572c1048741a60d3a5ddfcac4814e1da972.jpg"
        ];
    } elseif ($genero === "terror") {
        return [
            "nombre" => "El Conjuro",
            "imagen" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT57CO5hDa_xALgOGpFGt9W6_Xlt8gAeM6SSQ&s"
        ];
    } else {
        return [
            "nombre" => "No disponible",
            "imagen" => "https://media.tenor.com/-0mYUnkUOXIAAAAM/oh-raios-que-raios.gif" 
        ];
    }
}

$generoSeleccionado = $_GET['genero'] ?? "";
$datos = obtenerDatosPelicula($generoSeleccionado);

echo json_encode([
    "genero" => $generoSeleccionado,
    "recomendacion" => $datos["nombre"],
    "poster" => $datos["imagen"] // Nueva clave con la URL
]);
