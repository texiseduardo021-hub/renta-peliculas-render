<?php
function recibeTexto($nombre) {
  return isset($_POST[$nombre]) ? trim($_POST[$nombre]) : "";
}
