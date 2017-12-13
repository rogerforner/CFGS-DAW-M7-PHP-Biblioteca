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
// // $cadena1= $conexion->query("select * from Autors where Nom=$this->nom");
//
$cadena1="select * from Autors where Nom='$this->nom' and Cognom='$this->cognom'";
$result=$conexion->query($cadena1);

 //$fila= $result->num_rows;
 $fila=mysqli_num_rows($result);
// $contador=0;
// while ($registroautors=$resultat1->fetch_assoc()) {
// 	$contador=$contador+1;
// }
// $count=$fila[0];
  // echo $fila;
if($fila==0){
 	$cadena= "insert into Autors(nom,cognom,nacionalitat)Values('$this->nom','$this->cognom','$this->nacionalitat')";
 	$result = $conexion->query($cadena);
	echo 1;
}else {
	echo 2;
}

// $cadena= "insert into Autors(nom,cognom,nacionalitat)Values('$this->nom','$this->cognom','$this->nacionalitat')";
// $result = $conexion->query($cadena);
// if ($result===TRUE){
// 	return 1;
// 	// echo"very gooood";
// }else{
// 	return 2;
// 	// echo"very vad las cahat";
// }

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


public function mostrardadesid(){
include_once('../dades.php');
$cadena= "select * from Autors where ID_Autor=$this->id";
$result = $conexion->query($cadena);
if ($result){
	echo"very gooood";
}else{
	echo"very vad las cahat";
}
return $result;
$conexion->close();
}

public function Actualitzardades($ID_Autor,$Nom,$Cognom,$Nacionalitat){
include_once('../dades.php');
$cadena= "update Autors set Nom='$Nom',Cognom='$Cognom',Nacionalitat='$Nacionalitat' where ID_Autor='$ID_Autor'";
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
