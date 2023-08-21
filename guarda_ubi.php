<?php
session_start();
if(isset($_SESSION['usuario'])){
}
else{
    header("Location: ./acceso_negado.php?errorusuario=si");
}
//limpiamos las varibles
$para_nu ='';
$con_nu ='';
$para_ov ='';
$con_ov='';
$para_fec ='';
$con_fec='';

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
// Primero el REQUEST DEL FOLIO
//$esta_foliado = $_REQUEST["pasa_folio"];
$para_nu = $_REQUEST["nu"];
$con_nu = html_entity_decode($para_nu, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($nombre_cliente);
$para_ov = $_REQUEST["ov"];
$con_ov = html_entity_decode($para_ov, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo (nombre_prov);
$para_fec = $_REQUEST["fe_c"];
$con_fec = html_entity_decode($para_fec, ENT_QUOTES | ENT_HTML401, "UTF-8");
// hacemos la sentencia sql inser para guardar a la base de datos
$sql = "INSERT INTO ubicaciones (clave, ubica, obse, fec_cam) VALUES (NULL, '$con_nu','$con_ov','$con_fec')";
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
   <form  method="post" action="respuesta_ubi.php" class="cbp-mc-form">
    <label for="res">¿ Agregar otra lámina o  producto ?</label>
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