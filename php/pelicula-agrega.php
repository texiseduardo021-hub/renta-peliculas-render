<?php
// php/pelicula-agrega.php
require_once __DIR__ . "/lib/manejaErrores.php";
require_once __DIR__ . "/lib/recibeTextoObligatorio.php";
require_once __DIR__ . "/lib/devuelveCreated.php";
require_once __DIR__ . "/Bd.php";

try {
  $titulo = recibeTextoObligatorio("titulo");
  $genero = recibeTextoObligatorio("genero");
  $sinopsis = recibeTextoObligatorio("sinopsis");

  $bd = Bd::pdo();
  $stmt = $bd->prepare("INSERT INTO PELICULA (PEL_TITULO, PEL_GENERO, PEL_SINOPSIS) VALUES (?, ?, ?)");
  $stmt->execute([$titulo, $genero, $sinopsis]);

  $id = $bd->lastInsertId();

  devuelveCreated("/php/pelicula-vista-modifica.php?id=" . urlencode($id), [
    "id" => $id,
    "titulo" => $titulo,
    "genero" => $genero,
    "sinopsis" => $sinopsis
  ]);
} catch (Throwable $e) {
  manejaErrores($e);
}
