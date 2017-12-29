<?php // model Exemplars.php
error_reporting(E_ALL);
ini_set('display_errors', '1');
/*******************************************************************************
 *********************************************************************** "Índex"
 * # Constructors
 * # Getters i Setters
 * # Funcions
 * ## llistarExemplars()
 ******************************************************************************/
class Exemplars {
  private $id;
	private $idLlibre;

  /*
  # Constructors
  ----------------------------------------------------------------------------*/
  /**
   * El constructor es cridat cada cop que l'objecte es creat:
   * $exemplars = new Exemplars();
   * Mitjançant aquest s'inicialitzaràn els atributs (arguments) de la classe.
   *
   * Són necessaris múltiples constructors però en PHP una classe només pot tenir
   * un sol constructor. Un fet que es soluciona simulant l'existència de més
   * d'un constructor a través del principal.
   *
   * El constructor es simula:
   * __constructNumeroArguments($argument, $argument, ...)
   * __construct1($arg1)
   * __construct2($arg1, $arg2)
   * __constructN(...)
   *
   * A través d'aquest constructor buit (sense arguments) duem a terme la
   * simulació de constructors.
   *
   * @author Roger Forner Fabre
   * @var args Conté un array dels arguments passats al constructor.
   * @var num Conté el número d'arguments que es passen al constructor.
   * @var f Emprada per simular un constructor.
   */
  public function __construct() {
    // Simular un constructor.
		$args = func_get_args();
		$num  = func_num_args();
		$f    ='__construct'. $num;

		if (method_exists($this, $f)) {
			call_user_func_array(array($this, $f), $args);
		}
	}

	public function __construct1($id) {
		$this->id = $id;
	}

	public function __construct2($id, $idLlibre) {
    $this->id       = $id;
    $this->idLlibre = $idLlibre;
	}


  /*
  # Getters i Setters
  ----------------------------------------------------------------------------*/
  public function getId() {
    return $this->id;
  }

  public function getIdLlibre() {
    return $this->idLlibre;
  }


  /*
	# Funcions
	----------------------------------------------------------------------------*/
  /**
   * ## llistarExemplars()
   * Mitjançant aquesta funció s'obtenen totes les files disponibles en la taula
   * Exemplars (1 fila = 1 exemplar), junt a les seves columnes (dades dels exemplars).
   * Aquestes files són guardades en un array per poder obtenir, més tard, les
   * dades desitjades.
   *
   * @author Roger Forner Fabre
   */
  public function llistarExemplars() {
    $exemplars = array();
    $db = Connectar::connexio();

    // $query = $db->query("SELECT * FROM Exemplars;");
    $query = $db->query("SELECT Exemplars.ID_Exemplar, Llibres.Titol FROM Exemplars
      INNER JOIN Llibres ON Exemplars.ID_Llibres = Llibres.ID_Llibres
    ;");

    while($files = $query->fetch_assoc()) {
      $exemplars[] = $files;
    }

    return $exemplars;
  }
}
?>
