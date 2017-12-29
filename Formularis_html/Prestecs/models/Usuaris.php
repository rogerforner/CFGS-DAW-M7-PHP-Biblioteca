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
	private $dni;
	private $nom;
	private $cognom;
	private $adreca;
	private $poblacio;
	private $provincia;
	private $nacionalitat;
	private $email;
	private $telefon;
	private $naixement;

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

	public function __construct10($dni, $nom, $cognom, $adreca, $poblacio, $provincia, $nacionalitat, $email, $telefon, $naixement) {
		$this->dni          = $dni;
		$this->nom          = $nom;
		$this->cognom 			= $cognom;
		$this->adreca       = $adreca;
		$this->poblacio     = $poblacio;
		$this->provincia    = $provincia;
		$this->nacionalitat = $nacionalitat;
		$this->email        = $email;
		$this->telefon      = $telefon;
		$this->naixement 		= $naixement;
	}

  public function __construct11($id, $dni, $nom, $cognom, $adreca, $poblacio, $provincia, $nacionalitat, $email, $telefon, $naixement) {
    $this->id           = $id;
		$this->dni          = $dni;
		$this->nom          = $nom;
		$this->cognom       = $cognom;
		$this->adreca       = $adreca;
		$this->poblacio     = $poblacio;
		$this->provincia    = $provincia;
		$this->nacionalitat = $nacionalitat;
		$this->email        = $email;
		$this->telefon      = $telefon;
		$this->naixement    = $naixement;
	}


  /*
  # Getters i Setters
  ----------------------------------------------------------------------------*/
  public function getId() {
		return $this->id;
	}

	public function getDni() {
		return $this->dni;
	}

  public function setDni($dni) {
    $this->dni = $dni;
  }

	public function getNom() {
		return $this->nom;
	}

  public function setNom($nom) {
    $this->nom = $nom;
  }

	public function getCognom() {
		return $this->cognom;
	}

  public function setCognom($cognom) {
    $this->cognom = $cognom;
  }

	public function getAdreca() {
		return $this->adreca;
	}

  public function setAdreca($adreca) {
    $this->adreca = $adreca;
  }

	public function getPoblacio() {
		return $this->poblacio;
	}

  public function setPoblacio($poblacio) {
    $this->poblacio = $poblacio;
  }

	public function getProvincia() {
		return $this->provincia;
	}

  public function setProvincia($provincia) {
    $this->provincia = $provincia;
  }

	public function getNacionalitat() {
		return $this->nacionalitat;
	}

  public function setNacionalitat($nacionalitat) {
    $this->nacionalitat = $nacionalitat;
  }

	public function getEmail() {
		return $this->email;
	}

  public function setEmail($email) {
    $this->email = $email;
  }

	public function getTelefon() {
		return $this->telefon;
	}

  public function setTelefon($telefon) {
    $this->telefon = $telefon;
  }

	public function getNaixement() {
		return $this->naixement;
	}

  public function setNaixement($naixement) {
    $this->naixement = $naixement;
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
   */
  public function llistarUsuaris() {
    $usuaris = array();
    $db = Connectar::connexio();

    $query = $db->query("SELECT * FROM Usuaris;");

    while($files = $query->fetch_assoc()) {
      $usuaris[] = $files;
    }

    return $usuaris;
  }

  /**
   * ## insertarUsuari()
   * Mitjançant aquesta funció s'inserta un usuari a la base de dades.
   *
   * @author Roger Forner Fabre
   */
  public function insertarUsuari() {
    $db = Connectar::connexio();

    $db->query("INSERT INTO Usuaris(DNI, Nom, Cognom, Adreca, Poblacio, Provincia, Nacionalitat, Adreca_electronica, Telefon, Data_naixement)
		VALUES(
			'$this->dni',
			'$this->nom',
			'$this->cognom',
			'$this->adreca',
			'$this->poblacio',
			'$this->provincia',
			'$this->nacionalitat',
			'$this->email',
			'$this->telefon',
			'$this->naixement'
		)");
  }

  /**
   * ## eliminarUsuari()
   * Mitjançant aquesta funció s'elimina un usuari de la base de dades.
   *
   * @author Roger Forner Fabre
   */
  public function eliminarUsuari() {
    $db = Connectar::connexio();

    $db->query("DELETE FROM Usuaris WHERE ID_Usuari = $this->id");
  }

  /**
   * ## editarUsuari()
   * Mitjançant aquesta funció s'elimina un usuari de la base de dades.
   *
   * @author Roger Forner Fabre
   */
  public function editarUsuari() {
    $db = Connectar::connexio();

    $db->query("UPDATE Usuaris
    SET DNI = '$this->dni',
    Nom = '$this->nom',
    Cognom = '$this->cognom',
    Adreca = '$this->adreca',
    Poblacio = '$this->poblacio',
    Provincia = '$this->provincia',
    Nacionalitat = '$this->nacionalitat',
    Adreca_electronica = '$this->email',
    Telefon = '$this->telefon',
    Data_naixement = '$this->naixement'
    WHERE ID_Usuari = $this->id");
  }
}
?>
