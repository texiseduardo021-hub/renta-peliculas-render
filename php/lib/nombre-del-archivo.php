<?php
function nombre_del_archivo($nombre) {
  return preg_replace('/[^a-z0-0.]/i', '_', $nombre);
}
