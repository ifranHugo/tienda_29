<?php
  class  Dashboard extends Controllers
  {
    public  function __construct(){
      parent::__construct();

    }
    public function dashboard($params){
      //mandar informacion para la vista con un array
      $data['tag_page']= "Dashboard - Tienda virtual";
      $data['page_title'] = "Dashboard - Tienda virtual";
      $data['page_name']="dashboard";
       $data['page_id']=2;
      
      $this->views->getView($this,"/dashboard",$data);
    }

  }
