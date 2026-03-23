<?php
header("Content-Type: application/json");

// Simulación de base de datos (m13bd)
$peliculas = [
    "accion" => [
        "nombre" => "John Wick",
        "imagen" => "https://play-lh.googleusercontent.com/vByxM5S2LXTqxdDo84ilW2D1M8WWDC-Om3M2wWwZ3Nb9pU70MAceTI3HvPJL5Yq0i9Xj"
    ],
    "comedia" => [
        "nombre" => "Superbad",
        "imagen" => "https://m.media-amazon.com/images/S/pv-target-images/bb91a439ff92a68e22fc18b3f00a4572c1048741a60d3a5ddfcac4814e1da972.jpg"
    ],
    "terror" => [
        "nombre" => "El Conjuro",
        "imagen" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT57CO5hDa_xALgOGpFGt9W6_Xlt8gAeM6SSQ&s"
    ]
];

// Validación (m12valida)
function validarGenero($genero) {
    if (!$genero || trim($genero) === "") {
        return "El género es obligatorio";
    }
    return null;
}

// Servicio (m08srvdevuelve)
function obtenerPelicula($genero, $peliculas) {
    $genero = strtolower($genero);

    if (isset($peliculas[$genero])) {
        return $peliculas[$genero];
    }

    return [
        "nombre" => "No disponible",
        "imagen" => "https://media.tenor.com/-0mYUnkUOXIAAAAM/oh-raios-que-raios.gif"
    ];
}

// Controlador (m02servicio)
$genero = $_GET['genero'] ?? "";

// Validamos
$error = validarGenero($genero);

if ($error) {
    echo json_encode([
        "ok" => false,
        "error" => $error
    ]);
    exit;
}

// Obtenemos datos
$pelicula = obtenerPelicula($genero, $peliculas);

// Respuesta JSON estructurada (m09srvjson)
echo json_encode([
    "ok" => true,
    "data" => [
        "genero" => $genero,
        "recomendacion" => $pelicula["nombre"],
        "poster" => $pelicula["imagen"]
    ]
]);
