<?php



//datos de conexion a bd
define("HOST","localhost");
define("USER","root");
define("DB_NAME","tienda_virtual");
define("PASSWORD","");
define("DB_CHARSET","charset-utf8");



//constantes de carpetas
define("BASE_URL","http://localhost/cursos-desarrollo/tiendaVirtualCurso/");
define("LIBS","Libreries/");
define("CORE","Libreries/Core/");
define("VIEWS","Views/");
define("ASSETS","Assets/");
define("CSS","Assets/css");
define("JS","Assets/js/");
define("IMG","Assets/images");
define("IMG_LOGO","Assets/images/uploads/pngwing.com.png");

//Deliminadores decimal y millar
define("SPD",",");
define("SPM",".");
//Simbolo moneda
define("SMONEY","$");
//ZONA HORARIA

date_default_timezone_set('America/Argentina/Buenos_Aires');
?>