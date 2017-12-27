<?php
/*
Aquesta classe conte variables privades sobre llibres i les tres funcions
principals a l'hora de tractar amb llibres com ara:
-Introduir Llibres
-Eliminar Llibres
-Editar Llibres
*/
class Llibres{
	//Variable privades de la classe Llibres
	private $id;
	private $titol;
	private $nedicio;
	private $Lloc_publicacio;
	private $editorial;
	private $any_edicio;
	private $ISBN;
	private $Quantitat_exemplars;

	//Constructor de la classe Llibres
	public function __construct()
 	{
		$args = func_get_args();
   	$num = func_num_args();
   	$f='__construct'. $num;
   	if (method_exists($this,$f)) {
    call_user_func_array(array($this,$f),$args);
  	}
 	}
	public function __construct1($id)
 	{
  	$this->id=$id;
 	}
 	public function __construct7($titol,$nedicio,$lloc_publicacio,$editorial,$any_edicio,$isbn,$quantitat_exemplars)
 	{
		$this->titol=$titol;
	  $this->nedicio=$nedicio;
		$this->Lloc_publicacio=$lloc_publicacio;
		$this->editorial=$editorial;
		$this->any_edicio=$any_edicio;
		$this->ISBN=$isbn;
		$this->Quantitat_exemplars=$quantitat_exemplars;
 	}
 	public function __construct8($id,$titol,$nedicio,$lloc_publicacio,$editorial,$any_edicio,$isbn,$quantitat_exemplars)
 	{
	 	$this->id=$id;
		$this->titol=$titol;
	  $this->nedicio=$nedicio;
		$this->Lloc_publicacio=$lloc_publicacio;
		$this->editorial=$editorial;
		$this->any_edicio=$any_edicio;
		$this->ISBN=$isbn;
		$this->Quantitat_exemplars=$quantitat_exemplars;
	}
//Setters & getters
	public function gettitol(){
		return $this->titol;
	}
	public function getedicio(){
		return $this->nedicio;
	}
	public function getlloc_publicacio(){
		return $this->Lloc_publicacio;
	}
	public function geteditorial(){
		return $this->editorial;
	}
	public function getany_edicio(){
		return $this->any_edicio;
	}
	public function getISBN(){
		return $this->ISBN;
	}
	public function getQuantitat_exemplars(){
		return $this->Quantitat_exemplars;
	}

	//Funcio per introduir un nou llibre a la BD
	public function introduirdades(){
		include_once('../dades.php');
		$cadena1="select * from Llibres where ISBN='$this->ISBN'";
		$result=$conexion->query($cadena1);
	 	$fila=mysqli_num_rows($result);
		if($fila==0){
		 	$cadena= "insert into Llibres(Titol,Numero_edicio,Lloc_publicacio,Editorial,Any_edicio,ISBN,Quantitat_exemplars)Values(
			'$this->titol',
			'$this->nedicio',
			'$this->Lloc_publicacio',
			'$this->editorial',
			'$this->any_edicio',
			'$this->ISBN',
			'$this->Quantitat_exemplars')";
		 	if($conexion->query($cadena)==TRUE){
			  echo 1;;
			}else {
				echo "error: ".$cadena.$conexion->error;
			}
		}else {
			echo 2;
		}
	 	$conexion->close();
	}
	//Funcio per eliminar un Llibre de la BD
	public function eliminardades(){
		include_once('../dades.php');
		$cadena= "delete from biblioteca.Llibres where ID_Llibres=$this->id";
		$result = $conexion->query($cadena);
		if ($result===TRUE){
			echo"very gooood";
		}else{
			echo"very vad las cahat";
		}
		$conexion->close();
	}
	//Funcio per actualitzar les dades de un Llibre de la BD
	public function Actualitzardades(){
		include_once('../dades.php');
		$cadena="UPDATE biblioteca.Llibres
		SET Titol = '$this->titol',
		Numero_edicio = '$this->nedicio',
		Lloc_publicacio = '$this->Lloc_publicacio',
		Editorial = '$this->editorial',
		Any_edicio = '$this->any_edicio',
		ISBN = '$this->ISBN',
		Quantitat_exemplars = '$this->Quantitat_exemplars'
		WHERE ID_Llibres = $this->id";
		$result = $conexion->query($cadena);
		if ($result){
			echo"very gooood";
		}else{
			echo"very vad las cahat";
		}
		return $result;
		$conexion->close();
	}
}
?>
