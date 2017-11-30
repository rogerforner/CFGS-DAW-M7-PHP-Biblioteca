<?php

class autors{

public $nom;
public $cognom;
public $nacionalitat;
public $id;

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
   public function __construct2($a1,$a2)
   {
     echo "__construct con 2 params llamado: " . $a1 . "," . $a2;
   }
   public function __construct3($nom,$cognom,$nacionalitat)
   {
		 	$this->nom=$nom;
 			$this->cognom=$cognom;
 		  $this->nacionalitat=$nacionalitat;
   }
// public function __construct($nom,$cognom,$nacionalitat){
// 	$this->nom=$nom;
// 	$this->cognom=$cognom;
//   $this->nacionalitat=$nacionalitat;
// }


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
$cadena= "insert into Autors(nom,cognom,nacionalitat)Values('$this->nom','$this->cognom','$this->nacionalitat')";
$result = $conexion->query($cadena);
if ($result===TRUE){
	echo"very gooood";
}else{
	echo"very vad las cahat";
}

$conexion->close();
}

public function eliminardades(){
include_once('../dades.php');
$cadena= "delete from biblioteca.Autors where ID_Autor=$this->id";
$result = $conexion->query($cadena);
if ($result===TRUE){
	echo"very gooood";
}else{
	echo"very vad las cahat";
}

$conexion->close();
}




// public function mostrardades(){
// include_once('dades.php');
// $cadena= "select * from Autors";
// $result = $conexion->query($cadena);
// if ($result===TRUE){
// 	echo"very gooood";
// }else{
// 	echo"very vad las cahat";
// }
//
// $conexion->close();
// }

}



?>
