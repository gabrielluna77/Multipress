<?php
session_start();
if(isset($_SESSION['usuario'])){
}
else{
    header("Location: ./acceso_negado.php?errorusuario=si");
}
//limpiamos las varibles
$para_so ='';
$con_so ='';
$para_ca ='';
$con_ca ='';
$para_ub ='';
$con_ub ='';
$para_fet ='';
$con_fet ='';
$para_ob='';
$con_ob ='';
$para_sa='';
$con_sa ='';

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
$para_so = $_REQUEST["so"];
$con_so = html_entity_decode($para_so, ENT_QUOTES | ENT_HTML401, "UTF-8");
//pasamos la variable del nombre de proyecto por el formulario
$para_ca = $_REQUEST["ca"];
$con_ca = html_entity_decode($para_ca, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p> Su $_REQUEST
$para_ub = $_REQUEST["ub"];
$con_ub = html_entity_decode($para_ub, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST
$para_fet = $_REQUEST["fet"];
$con_fet = html_entity_decode($para_fet, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST
$para_ob = $_REQUEST["ob"];
$con_ob = html_entity_decode($para_ob, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST
$para_sa = $_REQUEST["sali"];
$con_sa = html_entity_decode($para_sa, ENT_QUOTES | ENT_HTML401, "UTF-8");
// hacemos la sentencia sql inser para guardar a la base de datos
$sql = "INSERT INTO sobrantes (clave, tipo, canti, ubica, fecha, comen, salida) VALUES (NULL, '$con_so','$con_ca','$con_ub', '$con_fet', '$con_ob', '$con_sa')";
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
   <form  method="post" action="respuesta_sobra.php" class="cbp-mc-form">
    <label for="res">¿ Agregar más sobrantes ?</label>
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