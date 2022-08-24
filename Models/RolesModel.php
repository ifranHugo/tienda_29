<?php

class RolesModel extends mysql{
  public $intIdrol;
  public $strRol;
  public $strDescripcion;
  public $intStatus;
  public function __construct(){
    parent:: __construct();
  }
  public function selectRoles(){
    $sql ="SELECT * FROM rol WHERE status != 0";
    $request=$this->select_all($sql);
    return $request;
  }
  public function selectRol(int $idrol){
    $this->intIdrol = $idrol;
    $sql ="SELECT * FROM rol WHERE idrol = $this->intIdrol";
    $request=$this->select($sql);
    return $request;

  }
  public function insertRol(string $rol, string $descripcion,int $status){
    $this->strRol=$rol;
    $this->strDescripcion=$descripcion;
    $this->intStatus=$status;

    $sql ="SELECT  * FROM rol WHERE nombrerol = '{$this->strRol}'";
    $request=$this->select_all($sql);
    if (empty($request)) {
      $query_insert ="INSERT INTO rol(nombrerol,descripcion,status) VALUES(?,?,?)";
      $arrData = array($this->strRol,$this->strDescripcion,$this->intStatus);
      $request_insert = $this->insert($query_insert,$arrData);
      $return =$request_insert;
    }else {
      $return= 'exist';
      
    }
    return $return;
  }
  public function updateRol(int $idrol,string $rol, string $descripcion,int $status){
    $this->intIdRol = $idrol;
    $this->strRol = $rol;
    $this->strDescripcion = $descripcion;
    $this->intStatus= $status;

    $sql = "SELECT * FROM rol WHERE nombrerol = '{$this->strRol}' AND idrol != '{$this->intIdRol}'";
    $request =$this->select_all($sql);
    if (empty($request)) {
      $sql = "UPDATE  rol SET nombrerol = ?, descripcion=?,status=? WHERE idrol= '{$this->intIdRol}'";
      $arrData= array($this->strRol, $this->strDescripcion ,$this->intStatus);
      $request= $this->update($sql,$arrData);
    }else {
      $request ='exist';
    }
    return $request;
  }
  //eliminar rol, se pasa el status a 0 para que no lo muestre

  public function deleteRol(int $idrol){
    $this->intIdRol =$idrol;
    $sql ="SELECT * FROM persona WHERE rolid = $this->intIdRol";
    $request=$this->select_all($sql);
    if (empty($request)) {
      //si esta vacia significa que no hay usuario que este asociado a ese rol, en caso de que si este vacia si hay un usuario asociado entonces no puede eliminar el Rol
      $sql ="UPDATE rol SET status= ? WHERE idrol=$this->intIdRol";
      $arrData=array(0);
      $request = $this->update($sql,$arrData);
      if ($request) {
        $request='ok';
      }else {
        $request ='error';
      }
    }else{
      $request ='exist';
    }
    return$request;
  }
}