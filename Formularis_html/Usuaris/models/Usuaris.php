<?php // model Usuaris.php
class Usuaris {
  private $db;
  private $usuaris;

  public function __construct() {
    $this->db = Connectar::connexio();
    $this->usuaris = array();
  }

  public function getUsuaris() {
    $query = $this->db->query("SELECT * FROM Usuaris;");

    while($files = $query->fetch_assoc()) {
      $this->usuaris[] = $files;
    }

    return $this->usuaris;
  }
}
?>
