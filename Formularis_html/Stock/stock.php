<?php

/*Classe per a poder gestionar el Stock.
  Per a poder realitzar la seva tasca utilitzant el fitxer dades.php es conecta a
  la base de dades i li envia diferentes consultes.
*/

class stock{
  public $id;        //ID del Stock
  public $idllib;    //ID del llibre del Stock
  public $status;    //Estat del exemplar
  public $quantitat; //Quantitat de llibres a introduir

  /*Constructors per a la classe Stock*/
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
  public function __construct2($id,$status){
  	$this->id=$id;
    $this->status=$status;
  }
  public function __construct3($idllib,$estat,$quantitat){
  	$this->idllib=$idllib;
    $this->status=$estat;
    $this->quantitat=$quantitat;
  }

  /*Funcio per a introduir Stock*/
  public function introduirdades(){
    include_once('../dades.php'); //Afegim el fitxer de la connexio
    $cadena="insert into biblioteca.Exemplars(ID_llibres,estatus)values";

    /*Mentre la quantitat sigui major de 0 es van introduin exemplars*/
    while ($this->quantitat>0){

      /*Si no es l'ultim exemplar a fica introduim una coma al final*/
      if ($this->quantitat==1){
        $cadena=$cadena."($this->idllib,$this->status)";
      }else{
        $cadena= $cadena."($this->idllib,$this->status),";
      }
      $this->quantitat--;

    $result = $conexion->query($cadena);
  }
    if ($result!=TRUE){
       echo"Ha fallat";
     }
     $conexion->close();
  }

  /*Fincio per a eliminar Stock*/
  public function eliminardades(){
    include_once('../dades.php');
    $cadena= "delete from biblioteca.Exemplars where ID_Exemplar=$this->id";
    $result = $conexion->query($cadena); //Enviem la cadena al servidor
    if ($result!=TRUE){
  	   echo"very vad las cahat";
     }
     $conexion->close();
  }

  /*Funcio per a editar Stock*/
  public function editardades(){
    include_once('../dades.php');
    $cadena="update Exemplars set estatus=$this->status where ID_Exemplar=$this->id";
    $result = $conexion->query($cadena); //Enviem la cadena al servidor
    if($result!=TRUE){
      echo"Ha fallat";
    }
    $conexion->close();
  }

}

?>
