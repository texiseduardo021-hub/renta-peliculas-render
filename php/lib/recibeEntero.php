<?php
function recibeEntero($nombre) {
  return isset($_POST[$nombre]) ? (int)$_POST[$nombre] : null;
}
