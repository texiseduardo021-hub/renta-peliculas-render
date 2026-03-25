<?php
function ERROR_DEL_SERVIDOR_INTERNO(Throwable $e) {
  http_response_code(500);
  echo json_encode([
    "title" => "Error interno del servidor",
    "status" => 500,
    "detail" => $e->getMessage()
  ]);
  exit;
}
