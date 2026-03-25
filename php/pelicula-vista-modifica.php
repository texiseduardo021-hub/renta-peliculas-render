<?php
// php/pelicula-vista-modifica.php
require_once __DIR__ . "/lib/manejaErrores.php";
require_once __DIR__ . "/lib/recibeEnteroObligatorio.php";
require_once __DIR__ . "/lib/validaEntidadObligatoria.php";
require_once __DIR__ . "/lib/devuelveJson.php";
require_once __DIR__ . "/Bd.php";

try {
  $id = recibeEnteroObligatorio("id");
  $bd = Bd::pdo();
  $stmt = $bd->prepare("SELECT * FROM PELICULA WHERE PEL_ID = ?");
  $stmt->execute([$id]);
  $modelo = $stmt->fetch(PDO::FETCH_ASSOC);

  validaEntidadObligatoria($modelo);

  devuelveJson([
    "id" => ["value" => $modelo["PEL_ID"]],
    "titulo" => ["value" => $modelo["PEL_TITULO"]],
    "genero" => ["value" => $modelo["PEL_GENERO"]],
    "sinopsis" => ["value" => $modelo["PEL_SINOPSIS"]]
  ]);
} catch (Throwable $e) {
  manejaErrores($e);
}
