<?php
function validaEntidadObligatoria($entidad) {
  if (!$entidad) {
    require_once __DIR__ . "/NOT_FOUND.php";
    NOT_FOUND();
  }
}
