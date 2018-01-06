<?php

class stock{
  public $id;
  public $idllib;
  public $status;
  public $quantitat;

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

  public function introduirdades(){
    include_once('../dades.php');
    $cadena="insert into biblioteca.Exemplars(ID_llibres,estatus)values";

    while ($this->quantitat>0){

      if ($this->quantitat==1){
        $cadena=$cadena."($this->idllib,$this->status)";
      }else{
        $cadena= $cadena."($this->idllib,$this->status),";
      }
      $this->quantitat--;

    $result = $conexion->query($cadena);
  }
  //echo $cadena;
    if ($result!=TRUE){
       echo"very vad las cahat";
     }
     $conexion->close();
  }
  public function eliminardades(){
    include_once('../dades.php');
    $cadena= "delete from biblioteca.Exemplars where ID_Exemplar=$this->id";
    $result = $conexion->query($cadena);
    if ($result!=TRUE){
  	   echo"very vad las cahat";
     }
     $conexion->close();
  }

  public function editardades(){
    include_once('../dades.php');
    $cadena="update Exemplars set estatus=$this->status where ID_Exemplar=$this->id";
    $result = $conexion->query($cadena);
    if($result!=TRUE){
      echo"very vad las cahat";
    }
    $conexion->close();
  }

}

?>
