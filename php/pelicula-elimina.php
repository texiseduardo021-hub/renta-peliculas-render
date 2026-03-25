<?php
require_once __DIR__ . "/lib/manejaErrores.php";
require_once __DIR__ . "/lib/recibeEnteroObligatorio.php";
require_once __DIR__ . "/lib/devuelveNoContent.php";
require_once __DIR__ . "/Bd.php";

try {
  $id = recibeEnteroObligatorio("id");
  $bd = Bd::pdo();
  $stmt = $bd->prepare("DELETE FROM PELICULA WHERE PEL_ID = ?");
  $stmt->execute([$id]);

  devuelveNoContent();
} catch (Throwable $e) {
  manejaErrores($e);
}
