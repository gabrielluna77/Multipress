<?php
session_start();
if(isset($_SESSION['usuario'])){
}
else{
    header("Location: ./acceso_negado.php?errorusuario=si");
}
//limpiamos las varibles
$o ='';
$con_o ='';
$u ='';
$con_u ='';
$d ='';
$con_d ='';
$m ='';
$con_m ='';
$im ='';
$con_im ='';
$op ='';
$con_op ='';
$fe ='';
$con_fe ='';
$et ='';
$con_et ='';

//para que se guarden los acentos y las ñ
header("Content-Type: text/html;charset=utf-8");
//conectando a la base de datos
$con = mysqli_connect('localhost', 'multipresspublic_multipresspublic', 'Marjoerie2020#', 'multipresspublic_produccion');
// SE VERIFICA LA CONEXION
if (mysqli_connect_errno()){
    printf("HAY PROBLEMAS CON LA BD, LLAMAR AL PROGRAMADOR PARA SU REPARACION TEL: 2215154099: %s\n", mysqli_connect_error());
    exit();
}
//printf("Conjunto de caracteres inicial: %s\n", mysqli_character_set_name($con));

//print "<p>nombre de proyecto:  $_REQUEST[nom_proy]</p>\n";
//para checar el conjunto de caracteres utf8
if (!mysqli_set_charset($con, "utf8")) {
    //printf("Error cargando el conjunto de caracteres utf8: %s\n", mysqli_error($con));
    exit();
} else {
    //printf("Conjunto de caracteres actual: %s\n", mysqli_character_set_name($con));
}
// TERMINA LA CONEXION Y EL CAMBIO DE CARACTERES
//_REQUEST
$o = $_REQUEST["o"];
$con_o = html_entity_decode($o, ENT_QUOTES | ENT_HTML401, "UTF-8");
//pasamos la variable del nombre de proyecto por el formulario
$u = $_REQUEST["u"];
$con_u = html_entity_decode($u, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p> Su $_REQUEST
$d = $_REQUEST["d"];
$con_d = html_entity_decode($d, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST
$m = $_REQUEST["m"];
$con_m = html_entity_decode($m, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST
$im = $_REQUEST["im"];
$con_im = html_entity_decode($im, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST
$op = $_REQUEST["op"];
$con_op = html_entity_decode($op, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST
$fe = $_REQUEST["fe"];
$con_fe = html_entity_decode($fe, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST
$et = $_REQUEST["et"];
$con_et = html_entity_decode($et, ENT_QUOTES | ENT_HTML401, "UTF-8");
// hacemos la sentencia sql inser para guardar a la base de datos
$sql = "INSERT INTO suajes (clave, orden_suaje, ubica, descrip, mov_s, impresor, op_utiliza, fecha_en, estado) VALUES (NULL, '$con_o','$con_u','$con_d', '$con_m', '$con_im', '$con_op', '$con_fe', '$con_et')";
$resultado = mysqli_query($con, $sql) or die ('Error: '. mysqli_error($con));
//echo " Todo bien se guardaron los datos";
// Ejecutamos la sentencia de actualización

//$folios = $folios +1;
$sql = null;
$ssql= null;
$resultado = null;
//limpiamos la consulta
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="./css/estilos_post_orden.css">
    <link rel="stylesheet" href="./css/estilos_form_tres.css">
	<link rel="stylesheet" href="./css/grid_y_resp.css">
  
    
    
    <title>Almacén</title>
</head>
<body>
<div class="barra-principal">
<div><img src="./imagen/logo_principal.png" alt="nuevo_doc" width="40" height="40"></div>
<div> <a href="./inv_la.php"><img src="./imagen/inventario.png" alt="nuevo_doc" width="30" height="30">INVENTARIO LÁMINAS</a></div>
<div><a href="./in_sua.php"><img src="./imagen/sello.png" alt="nuevo_doc" width="30" height="30">INVENTARIO SUAJES</a></div>
<div><a href="./in_sobra.php"><img src="./imagen/recicla.png" alt="nuevo_doc" width="30" height="30">INVENTARIO SOBRANTES</a></div>
<div><a href="./ubica.php"><img src="./imagen/ubicar2.png" alt="nuevo_doc" width="30" height="30">UBICACIONES</a></div>
<div><a href="./ERP-OP-VIVANCO.php"><img src="./imagen/salida.png" alt="nuevo_doc" width="30" height="30">SALIR</a></div>
</div><!-- termina barra principal-->
<div class="contenedor">
    <div> SE GUARDO DE FORMA CORRECTA .... </div>
   <div>
     
   </div>
   
   <div>
   <form  method="post" action="respuesta_su.php" class="cbp-mc-form">
    <label for="res">¿ Agregar otro suaje ?</label>
    <select id="res" name="res">
                <option>SI</option>
                <option>NO</option>
            </select> 
   </div>
   <div class="cbp-mc-submit-wrap"> 
   <input type="hidden" name="pasa_folio" value="<?php echo ($cadena); ?>" />  
    <input class="cbp-mc-submit" type="submit" value="Enviar" />
    
   </form>
   </div>
        
    
    
          

</div><!-- TERMINA BARRA DEL CONTENIDO -->
</body>
</html>