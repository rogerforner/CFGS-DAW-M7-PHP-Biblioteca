<?php

class Class_llibres{

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
   public function __construct1()
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
//
// public function eliminardades(){
// include_once('../dades.php');
// $cadena= "delete from biblioteca.Autors where ID_Autor=$this->id";
// $result = $conexion->query($cadena);
// if ($result===TRUE){
// 	echo"very gooood";
// }else{
// 	echo"very vad las cahat";
// }
//
// $conexion->close();
// }
//
//
// public function mostrardadesid(){
// include_once('../dades.php');
// $cadena= "select * from Autors where ID_Autor=$this->id";
// $result = $conexion->query($cadena);
// if ($result){
// 	echo"very gooood";
// }else{
// 	echo"very vad las cahat";
// }
// return $result;
// $conexion->close();
// }
//
// public function Actualitzardades($ID_Autor,$Nom,$Cognom,$Nacionalitat){
// include_once('../dades.php');
// $cadena= "update Autors set Nom='$Nom',Cognom='$Cognom',Nacionalitat='$Nacionalitat' where ID_Autor='$ID_Autor'";
// $result = $conexion->query($cadena);
// if ($result){
// 	echo"very gooood";
// }else{
// 	echo"very vad las cahat";
// }
// return $result;
// $conexion->close();
// }
}

?>
