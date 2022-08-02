<?php
  class  Home extends Controllers
  {
    public  function __construct(){
      parent::__construct();

    }
    public function home($params){
      //mandar informacion para la vista con un array
      $data['tag_page']= "home";
      $data['page_title'] = "Pagina principal";
      $data['page_name']="home";
       $data['page_id']=1;
       $data['page_content']="lodsnkmladjnskldn,skln,dkslañjndkakln,dkasljndkdsjalsjdsjd";
      
      $this->views->getView($this,"Home",$data);
    }
/*     public function insertar(){
      $data= $this->model->setUser("daniel",48);
      print_r($data);
    } 
    public function verUsuario($id){
      $data= $this->model->getUser($id);
      print_r($data);
    }
    public function verUsuarios(){
      $data= $this->model->getUsers();
      print_r($data);
    }
    public function actualizarUsuarios($id){
      $data= $this->model->updateUser(1,"roberto",50);
      print_r($data);
    }
    public function eliminarUsuario($id){
      $data= $this->model->deleteUser($id);
      print_r($data);
    } */
  }
