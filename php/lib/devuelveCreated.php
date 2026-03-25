<?php
function devuelveCreated($uri, $datos) {
  header("Location: " . $uri);
  http_response_code(201);
  header("Content-Type: application/json");
  echo json_encode($datos);
}
