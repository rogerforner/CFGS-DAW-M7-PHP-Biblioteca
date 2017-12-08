<?php
class Connectar {
  public static function connexio() {
    $connexio = new mysqli("localhost", "grup1", "grup1", "biblioteca");
    $connexio->query("SET NAMES 'utf8'");

    if (!$connexio->connect_error) {
      echo '<script>console.log("Connexió correcta.")</script>';

    } else {
      echo '<script>console.log("Connexió incorrecta.")</script>';
    }

    return $connexio;
  }
}
?>
