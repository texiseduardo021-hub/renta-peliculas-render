<?php
function recibeTextoObligatorio($nombre) {
  if (isset($_POST[$nombre]) && trim($_POST[$nombre]) !== "") {
    return $_POST[$nombre];
  }
  throw new Exception("Falta el campo obligatorio: $nombre");
}
