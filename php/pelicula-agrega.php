<?php
require_once __DIR__ . "/lib/manejaErrores.php";
require_once __DIR__ . "/lib/recibeTextoObligatorio.php";
require_once __DIR__ . "/lib/devuelveJson.php";
require_once __DIR__ . "/Bd.php";

try {
  $titulo = recibeTextoObligatorio("titulo");
  $genero = recibeTextoObligatorio("genero");
  $sinopsis = recibeTextoObligatorio("sinopsis");

  $bd = Bd::pdo();
  $stmt = $bd->prepare("INSERT INTO PELICULA (PEL_TITULO, PEL_GENERO, PEL_SINOPSIS) VALUES (?, ?, ?)");
  $stmt->execute([$titulo, $genero, $sinopsis]);

  devuelveJson(["mensaje" => "Película guardada con éxito"]);
} catch (Throwable $e) {
  manejaErrores($e);
}
