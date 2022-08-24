<?php
  class  Roles extends Controllers
  {
    public  function __construct(){
      parent::__construct();
    }
    public function getSelectRoles(){
      $htmlOption = "";
      $arrData = $this->model->selectRoles();
      if (count($arrData)>0) {
        for ($i=0; $i < count($arrData) ; $i++) { 
          if ($arrData[$i]['status']==1) {
            $htmlOption .= '<option value="'.$arrData[$i]['idrol'].'">'.$arrData[$i]['nombrerol'].'</option>';
          }
          
        }
      }
      echo $htmlOption;
      die();
    }
    public function Roles($params){
      //mandar informacion para la vista con un array
      $data['tag_page']= "Roles Usuario";
      $data['page_title'] = "Roles Usuario <small>TIenda Virtual</small>";
      $data['page_name']="Rol_users";
       $data['page_id']=3;
      $this->views->getView($this,"/roles",$data);
    }
    //extraer todos los roles
    public function getRoles(){
      $arrData= $this->model->selectRoles();

      for ($i=0; $i < count($arrData); $i++) { 
        if ($arrData[$i]['status']==1) {
          $arrData[$i]['status'] ='<span class="badge badge-success">Activo</span>';
        }else{
            $arrData[$i]['status'] ='<span class="badge badge-danger">Inactivo</span>';
        }
        $arrData[$i]['options']='<div class="text-center" id="optionsID">
        
        <button class="btn hola btn-primary btn-sm  btnEditRol"  id="btnEditrolID" rl="'.$arrData[$i]['idrol'].'" type="button" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></button> 
        <button class="btn hola btn-sm btn-secondary btnPermisosRol" rl="'.$arrData[$i]['idrol'].'" type="button" title="permisos" id="btnPermisosID"><i class="fa fa-key" aria-hidden="true"></i></button>
        <button class="btn hola btn-danger btn-sm btnDelRol" rl="'.$arrData[$i]['idrol'].'" id="btnDelRolID" type="button" title="eliminar"><i class="fa fa-trash" aria-hidden="true">
        </i></button>
        </div>';
      }
      echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
      die;
    }
    //extraer un rol
    public function getRol(int $idrol){
      $intIdrol= intval(strClean($idrol));
      if($intIdrol>0){
        $arrData=$this->model->selectRol($intIdrol);
        if(empty($arrData)){
           $arrResponse = array('status' => false,'msg'=>"rol no encontrado.");
        }else {
        $arrResponse = array('status'=>true, 'data'=>$arrData);

        }
        echo json_encode($arrResponse, JSON_FORCE_OBJECT );
      }
      die();
    }

    public function setRol(){
      $intStatus = intVal($_POST['listStatus']);
      $intIdRol = intval($_POST['idRol']);
      $strRol = strClean($_POST['txtNombre']);
      $strDescripcion = strClean($_POST['txtDescripcion']);
      //crear
      
      if(empty($intIdRol)){
        $request_rol =$this->model->insertRol($strRol,$strDescripcion,$intStatus);
        $option=1;
      }else {
        //actualizar
        $request_rol = $this->model->updateRol($intIdRol,$strRol,$strDescripcion,$intStatus);
        $option=2;
      }
      if(!empty($request_rol)){
        if ($option==1) {
          $arrResponse=array('status'=>true ,'msg'=>'Datos guardados correctamente.');
        }else {
          $arrResponse = array('status'=>true ,'msg'=>'Datos actualizados correctamente.');
        }
      }else if($request_rol =='exist'){
        $arrResponse = array('status'=>false ,'msg'=>'el Rol ya existe.');
      }else {
        $arrResponse = array('status'=>false ,'msg'=>'No es posible almacenar datos.');
      }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }

    //Eliminar rol

    public function delRol(){
      if ($_POST) {
        $intIdRol = intval($_POST['idrol']);
        $requestDelete=$this->model->deleteRol($intIdRol);
        if ($requestDelete=='ok') {
            $arrResponse = array('status' => true,'msg'=>'se a eliminado un rol.' );
        }else if($requestDelete =='exist'){
          $arrResponse = array('status' => false,'msg'=>'No es posible eliminar un Rol asociados a un Usuario.' );
        }else {
          $arrResponse = array('status' => false,'msg'=>'Error al eliminar Rol.' );
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
      }
      die();
    }
    }
