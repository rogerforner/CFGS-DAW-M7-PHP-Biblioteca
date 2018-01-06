<?php // model Usuaris.php
error_reporting(E_ALL);
ini_set('display_errors', '1');
/*******************************************************************************
 *********************************************************************** "Índex"
 * # Constructors
 * # Getters i Setters
 * # Funcions
 * ## llistarUsuaris()
 ******************************************************************************/
class Usuaris {
  private $id;
	private $nom;
	private $cognom;

  /*
  # Constructors
  ----------------------------------------------------------------------------*/
  /**
   * El constructor es cridat cada cop que l'objecte es creat:
   * $usuaris = new Usuaris();
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

	public function __construct2($nom, $cognom) {
		$this->nom          = $nom;
		$this->cognom 			= $cognom;
	}

  public function __construct3($id, $nom, $cognom) {
		$this->dni          = $dni;
		$this->nom          = $nom;
		$this->cognom 			= $cognom;
	}


  /*
  # Getters i Setters
  ----------------------------------------------------------------------------*/
  public function getId() {
		return $this->id;
	}

	public function getNom() {
		return $this->nom;
	}

	public function getCognom() {
		return $this->cognom;
	}


  /*
	# Funcions
	----------------------------------------------------------------------------*/
  /**
   * ## llistarUsuaris()
   * Mitjançant aquesta funció s'obtenen totes les files disponibles en la taula
   * Usuaris (1 fila = 1 usuari), junt a les seves columnes (dades dels usuaris).
   * Aquestes files són guardades en un array per poder obtenir, més tard, les
   * dades desitjades.
   *
   * @author Roger Forner Fabre
   * @var usuaris Array en el que es guardarà el resultat de la consulta (query)
   * que es dugui a terme a la DB.
   * @var db Objecte emprat per connectar-nos la DB, fent referència a la classe
   * Connectar() i, específicament, al seu mètode conneccio().
   * @var query Consulta a dur a terme a la DB.
   * @var files Variable en la que es guarda un array associatiu "fetch_assoc()",
   * aquest corresponent a una sola fila de la taula consultada.
   * @return usuaris La funció retornarà un objecte Array.
   */
  public function llistarUsuaris() {
    $usuaris = array();
    $db      = Connectar::connexio();

    $query = $db->query("SELECT * FROM Usuaris;");

    while($files = $query->fetch_assoc()) {
      $usuaris[] = $files;
    }

    return $usuaris;
  }
}
?>
