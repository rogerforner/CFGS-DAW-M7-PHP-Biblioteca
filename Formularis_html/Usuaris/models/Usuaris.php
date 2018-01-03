<?php // model Usuaris.php
error_reporting(E_ALL);
ini_set('display_errors', '1');
/*******************************************************************************
 *********************************************************************** "Índex"
 * # Constructors
 * # Getters i Setters
 * # Funcions
 * ## llistarUsuaris()
 * ## insertarUsuari()
 * ## eliminarUsuari()
 * ## editarUsuari()
 * ## Validacions
 * ### validarUsuari()
 * ### validarEmail()
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
   * @param dni Representa el DNI de l'usuari, sense lletra.
   * @param nom Representa el nom de l'usuari.
   * @param cognom Representa el cognom de l'usuari.
   * @param adreca Representa l'adreça de l'usuari.
   * @param poblacio Representa la població de l'usuari.
   * @param provincia Representa la província de l'usuari.
   * @param nacionalitat Representa la nacionalitat de l'usuari.
   * @param email Representa l'email de l'usuari.
   * @param telefon Representa el telèfon de l'usuari.
   * @param naixement Representa la data de naixement (1987-02-25) de l'usuari.
   * @var db Objecte emprat per connectar-nos la DB, fent referència a la classe
   * Connectar() i, específicament, al seu mètode conneccio().
   */
  public function insertarUsuari($dni, $nom, $cognom, $adreca, $poblacio, $provincia, $nacionalitat, $email, $telefon, $naixement) {
    $db = Connectar::connexio();

    $db->query("INSERT INTO Usuaris(DNI, Nom, Cognom, Adreca, Poblacio, Provincia, Nacionalitat, Adreca_electronica, Telefon, Data_naixement)
		VALUES(
			'$dni',
			'$nom',
			'$cognom',
			'$adreca',
			'$poblacio',
			'$provincia',
			'$nacionalitat',
			'$email',
			'$telefon',
			'$naixement'
		)");
  }


  /**
   * ## eliminarUsuari()
   * Mitjançant aquesta funció s'elimina un usuari de la base de dades.
   *
   * @author Roger Forner Fabre
   * @var db Objecte emprat per connectar-nos la DB, fent referència a la classe
   * Connectar() i, específicament, al seu mètode conneccio().
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
   * @var db Objecte emprat per connectar-nos la DB, fent referència a la classe
   * Connectar() i, específicament, al seu mètode conneccio().
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
      WHERE ID_Usuari = $this->id
    ;");
  }


  /*
  ## Validacions
  ----------------------------------------------------------------------------*/
  /**
   * ### validarUsuari()
   * Mitjançant aquesta funció es valida un usuari per tal de determinar si es
   * podrà afegir a la DB o no.
   *
   * @author Roger Forner Fabre
   * @var dni Representa el DNI de l'usuari, sense lletra (obtinguda per POST).
   * @var nom Representa el nom de l'usuari (obtinguda per POST).
   * @var cognom Representa el cognom de l'usuari (obtinguda per POST).
   * @var adreca Representa l'adreça de l'usuari (obtinguda per POST).
   * @var poblacio Representa la població de l'usuari (obtinguda per POST).
   * @var provincia Representa la província de l'usuari (obtinguda per POST).
   * @var nacionalitat Representa la nacionalitat de l'usuari (obtinguda per
   * POST).
   * @var email Representa l'email de l'usuari (obtinguda per POST).
   * @var telefon Representa el telèfon de l'usuari (obtinguda per POST).
   * @var naixement Representa la data de naixement (1987-02-25) de l'usuari
   * (obtinguda per POST).
   * @var usuaris Objecte de la classe Usuaris(); Per poder cridar la funció
   * insertarUsuari().
   * @var vEmail Objecte de la classe Usuaris(); Per poder cridar la funció
   * existeixEmail().
   * @var existeixEmail Conté el valor retornat per la funció existeixEmail().
   * @return resultat Conté el valor a retornar a través de la propia funció.
   * Retornarà un número en el cas de que no es pugui dur a terme la inserció
   * a la DB i un objecte Array amb totes les dades de l'usuari a inserir, les
   * quals seràn processades amb la consulta adient.
   */
  public function validarUsuari() {
    $dni          = $this->dni;
    $nom          = $this->nom;
    $cognom       = $this->cognom;
    $adreca       = $this->adreca;
    $poblacio     = $this->poblacio;
    $provincia    = $this->provincia;
    $nacionalitat = $this->nacionalitat;
    $email        = $this->email;
    $telefon      = $this->telefon;
    $naixement    = $this->naixement;
    $usuaris      = new Usuaris();
    $vEmail       = new Usuaris();

    // Ja existeix el correu?
    $existeixEmail = $vEmail->existeixEmail($email);

    if ($existeixEmail == true) {
      $resultat = 1;

    } else {
      $resultat = $usuaris->insertarUsuari(
        $dni, $nom, $cognom, $adreca, $poblacio, $provincia, $nacionalitat,
        $email, $telefon, $naixement, $usuaris
      );
    }

    return $resultat;
  }

  /**
   * ### validarEmail()
   * Mitjançant aquesta funció validarem si el correu electrònic passat existeix
   * o no a la DB.
   *
   * @author Roger Forner Fabre
   * @param email Representa l'email de l'usuari (a validar).
   * @var db Objecte emprat per connectar-nos la DB, fent referència a la classe
   * Connectar() i, específicament, al seu mètode conneccio().
   * @var query Consulta a dur a terme a la DB.
   * @var files Variable en la que es guarda el número de files que s'hagi obtingut
   * a través de la consulta realitzada.
   * @var existeixEmail Guarda com a valor un boolean. Si s'han trobat resultats
   * a l'hora de fer la consulta, voldrà dir es comptarà més d'una fila "num_rows"
   * i, per tant, l'email existeix "true". En cas contrari el valor guardat serà
   * "false".
   * @return existeixEmail Retorna un boolean.
   */
  public function existeixEmail($email) {
    $db        = Connectar::connexio();

    $query = $db->query("SELECT Adreca_electronica FROM Usuaris
      WHERE Adreca_electronica = '$email';
    ;");

    $files = $query->num_rows;

    if ($files > 0) {
      $existeixEmail = true;

    } else {
      $existeixEmail = false;
    }

    return $existeixEmail;
  }
}
?>
