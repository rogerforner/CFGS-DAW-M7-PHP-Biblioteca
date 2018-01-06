<?php

/*Classe per a poder gestionar els generes.
  Per a poder realitzar la seva tasca utilitzant el fitxer dades.php es conecta a
  la base de dades i li envia diferentes consultes.
*/

class generes{
  public $id;         //ID del Genere
  public $genere;     //Nom del Genere
  public $descripcio; //Descripcio del Genere

  /*Constructors per a la classe Genere*/
  public function __construct(){
       $args = func_get_args();
       $num = func_num_args();
       $f='__construct'. $num;
       if (method_exists($this,$f)) {
         call_user_func_array(array($this,$f),$args);
       }
  }
  public function __construct1($id){
  	$this->id=$id;
  }
  public function __construct2($genere,$descripcio){
  	$this->genere=$genere;
  	$this->descripcio=$descripcio;

  }
  public function __construct3($id,$genere,$descripcio){
    $this->id=$id;
  	$this->genere=$genere;
  	$this->descripcio=$descripcio;

  }

  /*Funcio per a introduir un Genere*/
  public function introduirdades(){
    include_once('../dades.php');
    $cadena= "insert into Generes(nom,descripcio)values('$this->genere','$this->descripcio')";
    $result = $conexion->query($cadena);
    if ($result==TRUE){
  	   header("Location:../index_genere.php");
     }
    $conexion->close();
  }

  /*Funcio per a editar un Genere*/
  public function editardades(){
    include_once('../dades.php');
    $cadena= "update Generes set Nom = '$this->genere', Descripcio='$this->descripcio' where ID_Genere='$this->id'";
    $result = $conexion->query($cadena);

    if ($result!=TRUE){
  	   echo"Ha fallat";
     }
     $conexion->close();
  }

  /*Funcio per a eliminar un Genere*/
  public function eliminardades(){
    include_once('../dades.php');
    $cadena= "delete from biblioteca.Generes where ID_Genere=$this->id";
    $result = $conexion->query($cadena);
    if ($result!=TRUE){
  	   echo"Ha fallat";
     }
     $conexion->close();
  }

  /*Funcio per a comprovar si el genere ja existeix*/
  public function comprovar(){
    include_once('../dades.php');
    $cadena="SELECT * FROM Generes WHERE Nom='$this->genere'";
    $result = $conexion->query($cadena);
    $row_cnt = $result->num_rows;
    if($row_cnt!=0){
      echo '<span>Genere ja existen.</span> <script>document.getElementById("btnReg").disabled=true;</script>';
    }else{
        echo '<span>Es pot crear.</span> <script>document.getElementById("btnReg").disabled=false;</script>';
    }
    $conexion->close();
  }

  /*GETTERS*/
  /*Get del nom del genere*/
  public function getgenere(){
    return $this->genere;
  }
  /*Get de la descripcio del genere*/
  public function getdesc(){
    return $this->descripcio;
  }

}

?>
