<?php
/*******************************************************************************
************************************************************************ "ÍNDEX"
* # Constructors
* # Getters i Setters
* # Funcions
* ## introduirdades()
* ## eliminardades()
*******************************************************************************/

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
	public function __construct() {
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

	/*
	# Getters i Setters
	----------------------------------------------------------------------------*/
	public function getId() {
		return $this->id;
	}

	public function getDni() {
		return $this->dni;
	}

	public function getNom() {
		return $this->nom;
	}

	public function getCognom() {
		return $this->cognom;
	}

	public function getAdreca() {
		return $this->adreca;
	}

	public function getPoblacio() {
		return $this->poblacio;
	}

	public function getProvincia() {
		return $this->provincia;
	}

	public function getNacionalitat() {
		return $this->nacionalitat;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getTelefon() {
		return $this->telefon;
	}

	public function getNaixement() {
		return $this->naixement;
	}


	/*
	# Funcions
	----------------------------------------------------------------------------*/
	/*
	## introduirdades()
	----------------------------------------------------------------------------*/
	public function introduirdades() {
		include_once('../dades.php');

		$cadena = "INSERT INTO Usuaris(DNI, Nom, Cognom, Adreca, Poblacio, Provincia, Nacionalitat, Adreca_electronica, Telefon, Data_naixement)
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
		)";

		$result = $conexion->query($cadena);

		if ($result === TRUE) {
			echo "OK";

		} else{
			echo "Error: ".$conexion->error;
		}

		$conexion->close();
	}

	/*
	## eliminardades()
	----------------------------------------------------------------------------*/
	public function eliminardades() {
		include_once('../dades.php');

		$cadena = "DELETE FROM Usuaris WHERE ID_Usuari = $this->id";

		$result = $conexion->query($cadena);

		if ($result === TRUE){
			echo "OK";

		} else{
			echo "Error: ".$conexion->error;
		}

		$conexion->close();
	}

}
?>
