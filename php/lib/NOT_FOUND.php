<?php
function NO_ENCONTRADO() {
  http_response_code(404);
  echo json_encode([
    "title" => "No encontrado",
    "status" => 404,
    "detail" => "El recurso solicitado no existe."
  ]);
  exit;
}
