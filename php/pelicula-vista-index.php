<?php
require_once __DIR__ . "/lib/manejaErrores.php";
require_once __DIR__ . "/lib/devuelveJson.php";
require_once __DIR__ . "/Bd.php";

try {
  $bd = Bd::pdo();
  // Seleccionamos tus campos de la tabla PELICULA
  $stmt = $bd->query("SELECT * FROM PELICULA ORDER BY PEL_TITULO");
  $modelos = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $render = "";
  foreach ($modelos as $modelo) {
    $id = urlencode($modelo["PEL_ID"]);
    $titulo = htmlentities($modelo["PEL_TITULO"]);
    $genero = htmlentities($modelo["PEL_GENERO"]);
    
    // Estructura de lista igual a la del profesor
    $render .= "<li>
      <p>
        <a href='modifica.html?id=$id'>$titulo</a>
        <br>
        <small>$genero</small>
      </p>
    </li>";
  }

  devuelveJson(["lista" => ["innerHTML" => $render]]);
} catch (Throwable $e) {
  manejaErrores($e);
}
