<?php

class usuaris {

	public $dni;
	public $nom;
	public $cognom;
	public $adreca;
	public $poblacio;
	public $provincia;
	public $nacionalitat;
	public $email;
	public $telefon;
	public $naixement;

	/**
	 * [__construct description]
	 * @param [type] $dni          [description]
	 * @param [type] $nom          [description]
	 * @param [type] $cognom       [description]
	 * @param [type] $adreca       [description]
	 * @param [type] $poblacio     [description]
	 * @param [type] $provincia    [description]
	 * @param [type] $nacionalitat [description]
	 * @param [type] $email        [description]
	 * @param [type] $telefon      [description]
	 * @param [type] $naixement    [description]
	 */
	public function __construct($dni, $nom, $cognom, $adreca, $poblacio, $provincia, $nacionalitat, $email, $telefon, $naixement){
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

	/**
	 * Get the value of Dni
	 *
	 * @return mixed
	 */
	public function getDni() {
			return $this->dni;
	}

	/**
	 * Get the value of Nom
	 *
	 * @return mixed
	 */
	public function getNom() {
			return $this->nom;
	}

	/**
	 * Get the value of Cognom
	 *
	 * @return mixed
	 */
	public function getCognom() {
			return $this->cognom;
	}

	/**
	 * Get the value of Adreca
	 *
	 * @return mixed
	 */
	public function getAdreca() {
			return $this->adreca;
	}

	/**
	 * Get the value of Poblacio
	 *
	 * @return mixed
	 */
	public function getPoblacio() {
			return $this->poblacio;
	}

	/**
	 * Get the value of Provincia
	 *
	 * @return mixed
	 */
	public function getProvincia() {
			return $this->provincia;
	}

	/**
	 * Get the value of Nacionalitat
	 *
	 * @return mixed
	 */
	public function getNacionalitat() {
			return $this->nacionalitat;
	}

	/**
	 * Get the value of Email
	 *
	 * @return mixed
	 */
	public function getEmail() {
			return $this->email;
	}

	/**
	 * Get the value of Telefon
	 *
	 * @return mixed
	 */
	public function getTelefon() {
			return $this->telefon;
	}

	/**
	 * Get the value of Naixement
	 *
	 * @return mixed
	 */
	public function getNaixement() {
			return $this->naixement;
	}


	/**
	 * [introduirdades description]
	 * @return [type] [description]
	 */
	public function introduirdades() {
		include_once('dades.php');

		$cadena= "INSERT INTO Usuaris(DNI, Nom, Cognom, Adreca, Poblacio, Provincia, Nacionalitat, Adreca_electronica, Telefon, Data_naixement)
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
			echo"very gooood";

		} else{
			echo"very vad las cahat: ".$conexion->error;
		}

		$conexion->close();
	}

}



?>
