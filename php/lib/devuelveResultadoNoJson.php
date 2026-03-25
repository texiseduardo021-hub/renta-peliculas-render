<?php
function devuelveResultadoNoJson($resultado) {
  header("Content-Type: text/plain");
  echo $resultado;
}
