<?php
header("Content-Type: application/json");

/**
 * Función que recomienda película según género
 */
function rentaPeliculas($genero) {
    if ($genero === "accion") {
        return "John Wick";
    } elseif ($genero === "comedia") {
        return "Superbad";
    } elseif ($genero === "terror") {
        return "El Conjuro";
    } else {
        return "No tenemos películas de ese género";
    }
}

// Obtener parámetro desde la URL (?genero=accion)
$genero = isset($_GET['genero']) ? $_GET['genero'] : "";

// Respuesta en formato JSON
echo json_encode([
    "genero" => $genero,
    "recomendacion" => rentaPeliculas($genero)
]);