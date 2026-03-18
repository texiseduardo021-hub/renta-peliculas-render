<?php
// 1. Establecer el encabezado para que el navegador sepa que es JSON
header("Content-Type: application/json");

/**
 * Función que recomienda película según género
 */
function rentaPeliculas($genero) {
    // Pasamos el género a minúsculas para evitar errores de coincidencia
    $genero = strtolower($genero);

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

// 2. Obtener el parámetro desde la URL (?genero=nombre)
// Usamos ?? para dar un valor vacío si no se envía nada
$generoSeleccionado = $_GET['genero'] ?? "";

// 3. Crear el arreglo de respuesta
$respuesta = [
    "genero" => $generoSeleccionado,
    "recomendacion" => rentaPeliculas($generoSeleccionado)
];

// 4. Enviar la respuesta final en formato JSON
echo json_encode($respuesta);
?>
