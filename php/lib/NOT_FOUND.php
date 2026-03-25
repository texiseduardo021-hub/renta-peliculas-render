<?php
function NOT_FOUND() {
  http_response_code(404);
  echo json_encode(["detalle" => "No encontrado"]);
  exit;
}
