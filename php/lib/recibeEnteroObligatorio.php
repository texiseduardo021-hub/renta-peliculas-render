<?php
function recibeEnteroObligatorio($nombre) {
  if (isset($_POST[$nombre]) && filter_var($_POST[$nombre], FILTER_VALIDATE_INT) !== false) {
    return (int)$_POST[$nombre];
  }
  throw new Exception("Falta el id o no es válido: $nombre");
}
