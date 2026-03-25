<?php
// php/pelicula-vista-index.php
require_once __DIR__ . "/lib/manejaErrores.php";
require_once __DIR__ . "/lib/devuelveJson.php";
require_once __DIR__ . "/Bd.php";

try {
  $bd = Bd::pdo();
  $stmt = $bd->query("SELECT * FROM PELICULA ORDER BY PEL_TITULO");
  $modelos = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $render = "";
  foreach ($modelos as $modelo) {
    $id = urlencode($modelo["PEL_ID"]);
    $titulo = htmlentities($modelo["PEL_TITULO"]);
    $render .= "<li>
                  <p>
                    <a href='modifica.html?id=$id'>$titulo</a>
                  </p>
                </li>";
  }

  devuelveJson(["lista" => ["innerHTML" => $render]]);
} catch (Throwable $e) {
  manejaErrores($e);
}
