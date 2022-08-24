<?php
//devuelve constante
  function base_url(){
    return BASE_URL;
  }
  //muestra informacion formateada
  function dep($data){
    $format  = print_r('<pre>');
    $format  .= print_r($data);
    $format  .= print_r('</pre>');
    return $format;
    
  }
  function media(){
    return BASE_URL."Assets/";
  }
  //devuelven la direccion del footer y header admin
  function headerAdmin($data=""){
    $view_header=VIEWS."Template/header_admin.php";
    require_once ($view_header);

  }
    function getModal(string $nameModal,$data=""){
    $view_modal=VIEWS."Template/Modals/{$nameModal}.php";
    require_once ($view_modal);

  }
   
    function footerAdmin($data=""){
    $view_footer=VIEWS."Template/footer_admin.php";
    require_once ($view_footer);
  }
  function strClean($strCadena){
    $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strCadena);
    $string = trim($string); //Elimina espacios en blanco al inicio y al final
    $string = stripslashes($string); // Elimina las \ invertidas
    $string = str_ireplace("<script>","",$string);
    $string = str_ireplace("</script>","",$string);
    $string = str_ireplace("<script src>","",$string);
    $string = str_ireplace("<script type=>","",$string);
    $string = str_ireplace("SELECT * FROM","",$string);
    $string = str_ireplace("DELETE FROM","",$string);
    $string = str_ireplace("INSERT INTO","",$string);
    $string = str_ireplace("SELECT COUNT(*) FROM","",$string);
    $string = str_ireplace("DROP TABLE","",$string);
    $string = str_ireplace("OR '1'='1","",$string);
    $string = str_ireplace('OR "1"="1"',"",$string);
    $string = str_ireplace('OR ´1´=´1´',"",$string);
    $string = str_ireplace("is NULL; --","",$string);
    $string = str_ireplace("in NULL; --","",$string);
    $string = str_ireplace("LIKE '","",$string);
    $string = str_ireplace('LIKE "',"",$string);
    $string = str_ireplace('LIKE ´',"",$string);
    $string = str_ireplace("OR 'a'='a","",$string);
    $string = str_ireplace('OR "a"="a',"",$string);
    $string = str_ireplace("OR ´a´=´a","",$string);
    $string = str_ireplace("OR ´a´=´a","",$string);
    $string = str_ireplace("--","",$string);
    $string = str_ireplace("^","",$string);
    $string = str_ireplace("[","",$string);
    $string = str_ireplace("]","",$string);
    $string = str_ireplace("==","",$string);
    return $string;
  }
  function token(){
    $r1= bin2hex(random_bytes(2));
    $r2= bin2hex(random_bytes(2));
    $r3= bin2hex(random_bytes(2));

    $token = $r1.'-'.$r2.'-'.$r3;
    return $token;
  }
  function formtMoney($cantidad){
    $cantidad= number_format($cantidad,2,SPD,SPM);
    return $cantidad;
  }
?>
