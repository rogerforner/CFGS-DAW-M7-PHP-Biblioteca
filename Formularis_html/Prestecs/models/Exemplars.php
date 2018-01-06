<?php
// Mostrar errors.
// error_reporting(E_ALL);
// ini_set('display_errors', '1');

/*******************************************************************************
 *********************************************************************** "Índex"
 * # Constructors
 * # Getters i Setters
 * # Funcions
 * ## llistarExemplars()
 * ## totalExemplars()
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
   * @var exemplars Array en el que es guardarà el resultat de la consulta (query)
   * que es dugui a terme a la DB.
   * @var db Objecte emprat per connectar-nos la DB, fent referència a la classe
   * Connectar() i, específicament, al seu mètode conneccio().
   * @var query Consulta a dur a terme a la DB. En aquesta consulta s'uneixen les
   * taules "Llibres" i "Exemplars" per tal d'obtenir informació d'ambdues.
   * @var files Variable en la que es guarda un array associatiu "fetch_assoc()",
   * aquest corresponent a una sola fila de la taula consultada.
   * @return exemplars La funció retornarà un objecte Array.
   */
  public function llistarExemplars() {
    $exemplars = array();
    $db = Connectar::connexio();

    $query = $db->query("SELECT Exemplars.ID_Exemplar, Llibres.Titol FROM Exemplars
      INNER JOIN Llibres ON Exemplars.ID_Llibres = Llibres.ID_Llibres
    ;");

    while($files = $query->fetch_assoc()) {
      $exemplars[] = $files;
    }

    return $exemplars;
  }


  /**
   * ## totalExemplars()
   * Mitjançant aquesta funció obtenim el total d'exemplars que té un llibre
   * en concret. Ens interessa saber aquesta dada per tal de poder determinar
   * quan n'hi ha suficients com per fer préstecs i quan no.
   *
   * En aquesta consulta s'obté:
   * - Quantitat_exemplars -> Total d'exemplars d'un llibre.
   *
   * @author Roger Forner Fabre
   * @var exemplars Array en el que es guardarà el resultat de la consulta (query)
   * que es dugui a terme a la DB.
   * @var db Objecte emprat per connectar-nos la DB, fent referència a la classe
   * Connectar() i, específicament, al seu mètode conneccio().
   * @var query Consulta a dur a terme a la DB. En aquesta consulta s'uneixen les
   * taules "Llibres" i "Exemplars" per tal d'obtenir informació d'ambdues.
   * @var files Variable en la que es guarda un array associatiu "fetch_assoc()",
   * aquest corresponent a una sola fila de la taula consultada.
   * @return exemplars La funció retornarà un objecte Array.
   */
  public function totalExemplars($exemplar) {
    $exemplars = array();
    $db = Connectar::connexio();

    $query = $db->query("SELECT Llibres.Quantitat_exemplars FROM Exemplars
      INNER JOIN Llibres ON Exemplars.ID_Llibres = Llibres.ID_Llibres
      WHERE Exemplars.ID_Exemplar = $exemplar
    ;");

    while($files = $query->fetch_assoc()) {
      $exemplars[] = $files;
    }

    return $exemplars;
  }
}
?>
