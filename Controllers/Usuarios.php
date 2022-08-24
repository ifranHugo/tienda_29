<?php
  class  Usuarios extends Controllers
  {
    public  function __construct(){
      parent::__construct();
    }
    public function usuarios($params){
      //mandar informacion para la vista con un array
      $data['tag_page']= "Usuarios";
      $data['page_title'] = "USUARIOS  <small>  TIenda Virtual  </small> <br><br>";
      $data['page_name']="Usuarios";
      $this->views->getView($this,"/usuarios",$data);
    }

    public function setUsuario(){
      if ($_POST) {
        if (empty($_POST['txtIdentificacion']) || empty($_POST['txtNombre']) ||empty($_POST['txtApellido'])|| empty($_POST['intTelefono'])|| empty($_POST['txtEmail'])|| empty($_POST['listRolid'])||empty($_POST['listStatus'])|| empty($_POST['intDni'])) {
          $arrResponse  = array('status' =>false , "msg"=>'Datos incorrectos.' );
        }else {
          $idUsuario = intval($_POST['idUsuario']);
          $strIdentificacion =strClean($_POST['txtIdentificacion']);
          $strNombre =ucwords(strClean($_POST['txtNombre']));
          $strApellido =ucwords(strClean($_POST['txtApellido']));
          $intTelefono =intval($_POST['intTelefono']);
          $strEmail =strtolower(strClean($_POST['txtEmail']));
          $intTipoId =intval($_POST['listRolid']);
          $intStatus =intval($_POST['listStatus']);
          $intDni= intval($_POST['intDni']);
          $strPassword=$_POST['txtPassword'];
          if ($idUsuario==0) {
            $option =1;
            $strPassword =password_hash($_POST['txtPassword'],PASSWORD_DEFAULT);
          $request_user = $this->model->insertUsuario($strIdentificacion,$strNombre,$strApellido,$intTelefono,$strEmail,$strPassword,$intDni,$intTipoId,$intStatus);
          }else { 
            $option=2;
            $strPasswordNew=$_POST['txtPasswordNew'];
            if ($strPassword!="" && $strPasswordNew!="") {
              $strPasswordVerifi=$this->model->selectPassword($idUsuario);
              if (password_verify( $_POST['txtPassword'], $strPasswordVerifi['password'] )) {
                $strPasswordNewC =password_hash($_POST['txtPasswordNew'],PASSWORD_DEFAULT);
                $request_user = $this->model->updateUsuario($idUsuario,$strIdentificacion,$strNombre,$strApellido,$intTelefono,$strEmail,$intDni,$strPasswordNewC,$intTipoId,$intStatus);
              }else {
                $request_user= "Contraseña incorrecta!";
              }
            }else {
              $request_user = $this->model->updateUsuario($idUsuario,$strIdentificacion,$strNombre,$strApellido,$intTelefono,$strEmail,$intDni,$strPassword,$intTipoId,$intStatus);
            }      
              
          }
          if ($request_user>0) {
            if ($option ==1) {
              $arrResponse = array('status' => true,"msg"=>"Datos guardados correctamente." );
            }else {
              $arrResponse = array('status' => true,"msg"=>"Datos actualizados correctamente." );
            }
          }elseif ($request_user =="Contraseña incorrecta!") {
            $arrResponse = array('status' => false,"msg"=>"¡Atencion! Contraseña incorrecta!" );}
          elseif ($request_user =='exist') {
            $arrResponse = array('status' => false,"msg"=>"¡Atencion! el email o la identificaición ya existe, ingrese otro." );
          }else {
            $arrResponse = array('status' => false,"msg"=>'No es posible almacenar datos.' );
          }
        }
       echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
      }
      die();
    }
    public function getUsuarios(){
      $arrData = $this->model->selectUsuarios();
      
         for ($i=0; $i < count($arrData); $i++) { 
        if ($arrData[$i]['status']==1) {
          $arrData[$i]['status'] ='<span class="badge badge-success">Activo</span>';
        }else{
            $arrData[$i]['status'] ='<span class="badge badge-danger">Inactivo</span>';
        }
        $arrData[$i]['options']='<div class="text-center" id="optionsID">
        
        <button class="btn hola btn-primary btn-sm  btnViewUsuario"  id="btnVerUsId" us="'.$arrData[$i]['idpersona'].'" type="button" title="Ver usuario"><i class="fa fa-eye"aria-hidden="true"></i></button> 



        <button class="btn hola btn-sm btn-secondary btnEditUsuario" us="'.$arrData[$i]['idpersona'].'" type="button" title="Editar Usuario" id="btnEditUsID"><i class="fa fa-pencil" aria-hidden="true"></i></button>



        <button class="btn hola btn-danger btn-sm btnDelUsuario" us="'.$arrData[$i]['idpersona'].'" id="btnDelUsID" type="button" title="Eliminar usuario"><i class="fa fa-trash" aria-hidden="true">
        </i></button>
        </div>';
      }
      echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
      die;
    }
    public function getUsuario(int $idpersona){
      $idusuario = intval($idpersona);
      if ($idusuario>0) {

        $arrData= $this->model->selectUsuario($idusuario);
        if (empty($arrData)) {
          $arrResponse = array('status' =>false ,'msg'=>'Datos no encontrados' );
        }else{
          $arrResponse = array('status' =>true ,'data'=>$arrData );
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
      }
      die();
    }
    public function delUsuario(){
      if ($_POST) {
        $intIdpersona = intval($_POST['idUsuario']);
        $requestDelete= $this->model->deleteUsuario($intIdpersona);
        if ($requestDelete) {
          $arrResponse = array('status' => true,'msg'=>'Se a eliminado el usuario' );
        }else {
          $arrResponse = array('status' => false,'msg'=>'Error al eliminar el usuario' );
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
      }
      die();
    }
  }
