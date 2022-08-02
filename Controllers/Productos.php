<?php
  class  Productos extends Controllers
  {
    public  function __construct(){
      parent::__construct();

    }
    public function productos($params){
      //mandar informacion para la vista con un array
      $data['tag_page']= "productos";
      $data['page_title'] = "productos en venta";
      $data['page_name']="productos";
       $data['page_id']=2;
       $data['page_content']="lodsnkmladjnskldn,skln,dkslañjndkakln,dkasljndkdsjalsjdsjd";
      
      $this->views->getView($this,"/productos",$data);
    }

  }
