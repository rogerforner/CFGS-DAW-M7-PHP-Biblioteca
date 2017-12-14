<?php // Connectar amb la Base de Dades.
/**
 * Establir una connexió a la base de dades biblioteca, amb l'prestec gru1 i
 * clau d'accés grup1, tot això sobre el servidor localhost. També es defineix
 * que el conjunt de caràcters que serà emprat quan s'envíen dades al servidor
 * serà UTF8.
 *
 * @author Roger Forner Fabre
 */
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
