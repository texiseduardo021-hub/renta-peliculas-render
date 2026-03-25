<?php
require_once __DIR__ . "/lib/manejaErrores.php";
require_once __DIR__ . "/lib/recibeEnteroObligatorio.php";
require_once __DIR__ . "/lib/recibeTextoObligatorio.php";
require_once __DIR__ . "/lib/devuelveJson.php";
require_once __DIR__ . "/Bd.php";

try {
  $id = recibeEnteroObligatorio("id");
  $titulo = recibeTextoObligatorio("titulo");
  $genero = recibeTextoObligatorio("genero");
  $sinopsis = recibeTextoObligatorio("sinopsis");

  $bd = Bd::pdo();
  $stmt = $bd->prepare(
    "UPDATE PELICULA SET PEL_TITULO = ?, PEL_GENERO = ?, PEL_SINOPSIS = ? WHERE PEL_ID = ?"
  );
  $stmt->execute([$titulo, $genero, $sinopsis, $id]);

  devuelveJson([
    "id" => $id,
    "titulo" => $titulo,
    "genero" => $genero,
    "sinopsis" => $sinopsis
  ]);
} catch (Throwable $e) {
  manejaErrores($e);
}
