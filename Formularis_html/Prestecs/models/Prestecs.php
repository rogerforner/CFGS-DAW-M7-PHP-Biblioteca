<?php // model Prestecs.php
error_reporting(E_ALL);
ini_set('display_errors', '1');
/*******************************************************************************
 *********************************************************************** "Índex"
 * # Constructors
 * # Getters i Setters
 * # Funcions
 * ## llistarPrestecs()
 ******************************************************************************/
class Prestecs {
  private $id;
	private $dataSortida;
  private $dataMaxDevolucio;
  private $dataRealDevolucio;
  private $numPrestecs;
  private $maxPrestecs;
  private $exemplar;
  private $usuari;

  /*
  # Constructors
  ----------------------------------------------------------------------------*/
  /**
   * El constructor es cridat cada cop que l'objecte es creat:
   * $prestecs = new Prestecs();
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

	public function __construct7($dataSortida, $dataMaxDevolucio, $dataRealDevolucio, $numPrestecs, $maxPrestecs, $exemplar, $usuari) {
		$this->dataSortida       = $dataSortida;
		$this->dataMaxDevolucio  = $dataMaxDevolucio;
		$this->dataRealDevolucio = $dataRealDevolucio;
		$this->numPrestecs       = $numPrestecs;
		$this->maxPrestecs       = $maxPrestecs;
		$this->exemplar          = $exemplar;
		$this->usuari            = $usuari;
	}

  public function __construct8($id, $dataSortida, $dataMaxDevolucio, $dataRealDevolucio, $numPrestecs, $maxPrestecs, $exemplar, $usuari) {
    $this->id                = $id;
    $this->dataSortida       = $dataSortida;
		$this->dataMaxDevolucio  = $dataMaxDevolucio;
		$this->dataRealDevolucio = $dataRealDevolucio;
		$this->numPrestecs       = $numPrestecs;
		$this->maxPrestecs       = $maxPrestecs;
		$this->exemplar          = $exemplar;
		$this->usuari            = $usuari;
	}


  /*
  # Getters i Setters
  ----------------------------------------------------------------------------*/
  public function getId() {
    return $this->id;
  }

  public function getDataMaxDevolucio() {
    return $this->dataMaxDevolucio;
  }

  public function setDataMaxDevolucio($dataMaxDevolucio) {
    $this->dataMaxDevolucio = $dataMaxDevolucio;
  }

  public function getDataRealDevolucio() {
    return $this->dataRealDevolucio;
  }

  public function setDataRealDevolucio($dataRealDevolucio) {
    $this->dataRealDevolucio = $dataRealDevolucio;
  }

  public function getNumPrestecs() {
    return $this->numPrestecs;
  }

  public function setNumPrestecs($numPrestecs) {
    $this->numPrestecs = $numPrestecs;
  }

  public function getMaxPrestecs() {
    return $this->maxPrestecs;
  }

  public function setMaxPrestecs($maxPrestecs) {
    $this->maxPrestecs = $maxPrestecs;
  }

  public function getExemplar() {
    return $this->exemplar;
  }

  public function setExemplar($exemplar) {
    $this->exemplar = $exemplar;
  }

  public function getUsuari() {
    return $this->usuari;
  }


  public function setUsuari($usuari) {
    $this->usuari = $usuari;
  }


  /*
	# Funcions
	----------------------------------------------------------------------------*/
  /**
   * ## llistarPrestecs()
   * Mitjançant aquesta funció s'obtenen totes les files disponibles en la taula
   * Prestecs (1 fila = 1 prestec), junt a les seves columnes (dades dels prestecs).
   * Aquestes files són guardades en un array per poder obtenir, més tard, les
   * dades desitjades.
   *
   * @author Roger Forner Fabre
   */
  public function llistarPrestecs() {
    $prestecs = array();
    $db = Connectar::connexio();

    $query = $db->query("SELECT * FROM Prestecs;");

    while($files = $query->fetch_assoc()) {
      $prestecs[] = $files;
    }

    return $prestecs;
  }

  /**
   * ## insertarPrestec()
   * Mitjançant aquesta funció s'inserta un prestec a la base de dades.
   *
   * @author Roger Forner Fabre
   */
  public function insertarPrestec() {
    $db = Connectar::connexio();

    $db->query("INSERT INTO Prestecs(Data_sortida, Data_maxima_devolucio, Data_real_devolucio, Numero_prestecs, Maxim_prestecs, Exemplar, Usuari)
		VALUES(
			'$this->dataSortida',
			'$this->dataMaxDevolucio',
			'$this->dataRealDevolucio',
			'$this->numPrestecs',
			'$this->maxPrestecs',
			'$this->exemplar',
			'$this->usuari'
		)");
  }

  /**
   * ## eliminarPrestec()
   * Mitjançant aquesta funció s'elimina un prestec de la base de dades.
   *
   * @author Roger Forner Fabre
   */
  public function eliminarPrestec() {
    $db = Connectar::connexio();

    $db->query("DELETE FROM Prestecs WHERE ID_Prestec = $this->id");
  }

  /**
   * ## editarPrestec()
   * Mitjançant aquesta funció s'elimina un prestec de la base de dades.
   *
   * @author Roger Forner Fabre
   */
  public function editarPrestec() {
    $db = Connectar::connexio();

    $db->query("UPDATE Prestecs
    SET Data_sortida = '$this->dni',
    Data_maxima_devolucio = '$this->nom',
    Data_real_devolucio = '$this->cognom',
    Numero_prestecs = '$this->adreca',
    Maxim_prestecs = '$this->poblacio',
    Exemplar = '$this->provincia',
    Usuari = '$this->nacionalitat'
    WHERE ID_Prestec = $this->id");
  }
}
?>
