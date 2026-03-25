<?php
// php/Bd.php
class Bd {
  private static ?PDO $pdo = null;

  static function pdo(): PDO {
    if (self::$pdo === null) {
      // Se conecta a SQLite (creará el archivo datos.db)
      self::$pdo = new PDO("sqlite:datos.db");
      self::$pdo->setAttribute(PDO::ATTR_ERR_MODE, PDO::ERR_MODE_EXCEPTION);

      // Crea la tabla PELICULA con los campos necesarios
      self::$pdo->exec(
        "CREATE TABLE IF NOT EXISTS PELICULA (
          PEL_ID INTEGER PRIMARY KEY AUTOINCREMENT,
          PEL_TITULO TEXT NOT NULL,
          PEL_GENERO TEXT NOT NULL,
          PEL_SINOPSIS TEXT NOT NULL
        )"
      );
    }
    return self::$pdo;
  }
}
