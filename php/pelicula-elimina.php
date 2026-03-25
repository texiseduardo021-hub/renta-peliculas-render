<?php
require_once __DIR__ . "/lib/manejaErrores.php";
require_once __DIR__ . "/lib/recibeTextoObligatorio.php";
require_once __DIR__ . "/lib/devuelveJson.php";
require_once __DIR__ . "/Bd.php";

try {
  $id = recibeTextoObligatorio("id");
  $bd = Bd::pdo();
  $stmt = $bd->prepare("DELETE FROM PELICULA WHERE PEL_ID = ?");
  $stmt->execute([$id]);

  devuelveJson(["mensaje" => "Película eliminada"]);
} catch (Throwable $e) {
  manejaErrores($e);
}
