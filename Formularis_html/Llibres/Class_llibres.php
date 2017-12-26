<?php

class Llibres{

public $id;
public $titol;
public $nedicio;
public $Lloc_publicacio;
public $editorial;
public $any_edicio;
public $ISBN;
public $Quantitat_exemplars;


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
   public function __construct2()
   {
   }
   public function __construct3()
   {
   }
	 public function __construct4()
	 {
	 }
	 public function __construct5()
    {
    }
		public function __construct6()
		{
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

public function getnom(){
	return $this->nom;
}
public function getcognom(){
	return $this->cognom;
}
public function getnacionalitat(){
	return $this->nacionalitat;
}


public function introduirdades(){
 include_once('../dades.php');
$cadena1="select * from Llibres where ISBN='$this->ISBN'";
$result=$conexion->query($cadena1);

 $fila=mysqli_num_rows($result);
 // echo $this->$titol;
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
		echo "ok";
	}else {
		echo "error: ".$cadena.$conexion->error;
	}
	echo 1;
}else {
	echo 2;
}


 $conexion->close();
}

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

public function Actualitzardades(){

include_once('../dades.php');

$cadena="UPDATE biblioteca.Llibres
SET
Titol = '$this->titol',
Numero_edicio = '$this->nedicio',

Lloc_publicacio = '$this->Lloc_publicacio',
Editorial = '$this->editorial',
Any_edicio = '$this->any_edicio',
ISBN = '$this->ISBN',
Quantitat_exemplars = '$this->Quantitat_exemplars'
WHERE ID_Llibres = $this->id";

// $cadena= "update Llibres set Titol='$this->titol',Numero_edicio='$this->nedicio',Lloc_publicacio='$this->Lloc_publicacio',Editorial='$this->editorial',Any_edicio='$this->any_edicio',ISBN='$this->ISBN',Quantitat_exemplars='$this->Quantitat_exemplars' where ID_Llibres='$this->$id'";
// $cadena= "delete from biblioteca.Llibres where ID_Llibres=$this->id";
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
