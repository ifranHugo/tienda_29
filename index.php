<?php
require_once("Config/Config.php");
require_once("Helpers/Helpers.php");
$url =!empty($_GET['url']) ? $_GET['url']:'Home/home' ;
$arrUrl=explode("/",$url);
//
$controller= $arrUrl[0];
$method=$arrUrl[0];
$params ="";
if(!empty($arrUrl[1])){
  if($arrUrl[1] !=""){
  $method =$arrUrl[1];
  }
}
if(!empty($arrUrl[2])){
  if ($arrUrl[2]!="") {
    for ($i=02; $i <count($arrUrl) ; $i++) { 
      $params .=$arrUrl[$i].',';
    }
    $params =trim($params,",");
  }
}

require_once(CORE."Autoload.php");

require_once(CORE."Load.php");

?>