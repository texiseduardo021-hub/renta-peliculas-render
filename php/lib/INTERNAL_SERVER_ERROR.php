<?php
function INTERNAL_SERVER_ERROR(Throwable $e) {
  http_response_code(500);
  echo json_encode(["detalle" => $e->getMessage()]);
  exit;
}
