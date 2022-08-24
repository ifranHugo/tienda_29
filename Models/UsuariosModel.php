<?php
class UsuariosModel extends mysql{
  private $intIdUsuario;
  private $strIdentificacion;
  private $strNombre;
  private $strApellido;
  private $strEmail;
  private $strPassword;
  private $strToken;
  private $intTipoId;
  private $intStatus;

  public function __construct(){
    parent:: __construct();
  }
  public function insertUsuario(string $Identificacion, string $nombre, string $apellido, int $telefono,string $email, string $password,int $dni, int $tipoid, int $status){
    $this->strIdentificacion =$Identificacion;
    $this->strNombre =$nombre;
    $this->strApellido =$apellido;
    $this->intTelefono =$telefono;
    $this->strEmail =$email;
    $this->strPassword =$password;
    $this->intDni = $dni;
    $this->intTipoId =$tipoid;
    $this->intStatus= $status;

    $sql ="SELECT * FROM persona WHERE email_user ='{$this->strEmail}' or identificacion = '{$this->strIdentificacion}'";
    $request = $this->select_all($sql);
    if (empty($request)) {
      $query_insert = "INSERT INTO persona(
        identificacion, nombre,apellido,telefono,email_user,password,dni,rolid,status) VALUES (?,?,?,?,?,?,?,?,?)";
       $arrData = array($this->strIdentificacion,$this->strNombre,$this->strApellido,$this->intTelefono,$this->strEmail,$this->strPassword,$this->intDni,$this->intTipoId,$this->intStatus ); 
      
      $resquest_insert =$this->insert($query_insert,$arrData);
      $return = $resquest_insert;
    }else {
      $return ="exist";
    }
    return $return;

  }
  public function selectUsuarios(){
    $sql ="SELECT p.idpersona,p.identificacion,p.nombre,p.apellido,p.telefono,p.email_user,p.dni,p.status,r.nombrerol
    FROM persona p
    INNER JOIN rol r
    ON p.rolid =r.idrol
    WHERE p.status !=0";
    $request = $this->select_all($sql);
    return $request;
  }
  public function selectPassword(int $idUsuario){
    $this->intIdUsuario = $idUsuario;
    $sql="SELECT password FROM persona WHERE idpersona =$this->intIdUsuario";
    $request = $this->select($sql);
    return $request;
  }
  public function selectUsuario (int $idpersona){
    $this->intIdUsuario = $idpersona;
    $sql= "SELECT p.idpersona,p.identificacion,p.nombre,p.apellido,p.telefono,p.email_user,p.dni,p.nombrefiscal,p.direccionfiscal,r.idrol,r.nombrerol,r.status,
    DATE_FORMAT(p.datecread, '%d-%m-%Y')as fecharegistro
    FROM persona p
    INNER JOIN rol r
    ON p.rolid = r.idrol
    WHERE p.idpersona = $this->intIdUsuario";
    $request = $this->select($sql);
    return $request;
  }
  public function updateUsuario(int $idUsuario,string $Identificacion,string $nombre, string $apellido, int $telefono, string $email, int $dni, string $password, int $tipoid, int $status){
    $this->intIdUsuario =$idUsuario;
     $this->strIdentificacion =$Identificacion;
    $this->strNombre =$nombre;
    $this->strApellido =$apellido;
    $this->intTelefono =$telefono;
    $this->strEmail =$email;
    $this->strPassword =$password;
    $this->intDni = $dni;
    $this->intTipoId =$tipoid;
    $this->intStatus= $status;

    $sql ="SELECT * FROM persona WHERE(email_user = '{$this->strEmail}' 
    AND idpersona != $this->intIdUsuario) 
    OR (identificacion = '{$this->strIdentificacion}' AND idpersona != $this->intIdUsuario)";
    $request= $this->select_all($sql);
    if (empty($request)) {
      if ($this->strPassword != "") {
        $sql ="UPDATE persona SET identificacion =?, nombre =?, apellido =?, telefono=?, email_user=?,dni=?, password=?,rolid=?,status=?
        WHERE idpersona = $this->intIdUsuario";
        $arrData =array($this->strIdentificacion,$this->strNombre,$this->strApellido,$this->intTelefono,$this->strEmail,$this->intDni,$this->strPassword,$this->intTipoId,$this->intStatus );
      }else {
        $sql ="UPDATE persona SET identificacion =?, nombre =?, apellido =?, telefono=?, email_user=?,dni=?,rolid=?,status=?
          WHERE idpersona = $this->intIdUsuario";
          $arrData =array($this->strIdentificacion,$this->strNombre,$this->strApellido,$this->intTelefono,$this->strEmail,$this->intDni,$this->intTipoId,$this->intStatus );
      } 
      $request =$this->update($sql, $arrData);
    }else {
      $request ="exist";
    }
    return $request;
   
  }
  public function deleteUsuario(int $intIdpersona){
    $this->intIdUsuario=$intIdpersona;
    $sql= "UPDATE persona SET status =? WHERE idpersona=$this->intIdUsuario";
    $arrData = array(0);
    $request= $this->update($sql,$arrData);
    return $request;

  }
}