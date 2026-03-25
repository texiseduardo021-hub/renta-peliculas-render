<?php
function BAD_REQUEST($detalle) {
  http_response_code(400);
  echo json_encode(["detalle" => $detalle]);
  exit;
}
