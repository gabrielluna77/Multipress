<?php
session_start();
if(isset($_SESSION['usuario'])){
}
else{
    header("Location: ./acceso_negado.php?errorusuario=si");
}
//limpiamos las varibles
$nom_dis ='';
$nombre_proyecto ='';
$nombre_cliente ='';
$nombre_prov ='';
$nom_impresora ='';
$pro_ce1 ='';
$pro_ce2 ='';
$fecha ='';
$pro_ce3 ='';
$pro_ce4 ='';
$can_la ='';
$lam_alm ='';
$lam_tamano ='';
$las_tamano ='';
$ti_suajes ='';
$tip_suaje ='';
$de_impre ='';
$des_imp ='';
$id ='';
$cadena ='';
$folios ='';
$nom_dis ='';
//limpiamos los textos que llegan desde el formulario
$nom_proy1 ='';
$nom_cli ='';
$nom_prov='';
$nom_imp ='';
$pro1 ='';
$pro2 ='';
$pro3 ='';
$pro4 ='';
$can_l ='';
$lam_l ='';
$pasa_n_proy ='';
$pasa_cadena ='';
//limpiamos donde llegará el folio
$esta_foliado ='';
//$pasar_usuario = include ('nueva_orden.php');
//printf($pasar_usuario);
//para que se guarden los acentos y las ñ
header("Content-Type: text/html;charset=utf-8");
//$user = "multipresspublic_multipresspublic";
//$passw = "Marjoerie2020#";
//$server = "localhost";
//$db = "multipresspublic_produccion";
$con = mysqli_connect('localhost', 'multipresspublic_multipresspublic', 'Marjoerie2020#', 'multipresspublic_produccion');
// este lo borre por seguridad include_once('proceso_conexion.php');
// con es la variable que almacena la conexion a la base de datos
//$con =Conectar();
// cachamos los datos del formulario
//$name = html_entity_decode($name, ENT_QUOTES | ENT_HTML401, "UTF-8");
// aca los recibimos y cambiamos para aceptar acentos
//$nombres= $_REQUEST["nombre"];
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
// Primero el REQUEST DEL FOLIO
$esta_foliado = $_REQUEST["pasa_folio"];
//echo ($esta_foliado);
//_REQUEST
//$nom_proy1 = $_REQUEST["nom_proy"];
//$nombre_proyecto = html_entity_decode($nom_proy1, ENT_QUOTES | ENT_HTML401, "UTF-8");
//pasamos la variable del nombre de proyecto por el formulario
//$pasa_n_proy = $nombre_proyecto;
$nom_cli = $_REQUEST["nom_cliente"];
$nombre_cliente = html_entity_decode($nom_cli, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($nombre_cliente);
$nom_prov = $_REQUEST["nom_prove"];
$nombre_prov = html_entity_decode($nom_prov, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo (nombre_prov);
$nom_imp = $_REQUEST["nom_imprim"];
$nom_impresora = html_entity_decode($nom_imp, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($nom_impresor);
$pro1 = $_REQUEST["proce1"];
$pro_ce1 = html_entity_decode($pro1, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($pro_ce1);
$pro2 = $_REQUEST["proce2"];
$pro_ce2 = html_entity_decode($pro2, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($pro_ce2);
$pro3 = $_REQUEST["proce3"];
$pro_ce3 = html_entity_decode($pro3, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($pro_ce3);
$pro4 = $_REQUEST["proce4"];
$pro_ce4 = html_entity_decode($pro4, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($pro_ce4);
$can_l = $_REQUEST["can_lam1"];
$can_la = html_entity_decode($can_l, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($can_la);
$lam_l = $_REQUEST["lam_alm1"];
$lam_alm = html_entity_decode($lam_l, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($lam_alm);
$las_tamano = $_REQUEST["la_tamano"];
$lam_tamano = html_entity_decode($las_tamano, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($lam_tamano);
$tip_suaje = $_REQUEST["tipo_suaje"];
$ti_suajes = html_entity_decode($tip_suaje, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($ti_suajes);
// Desde aca agregue para hacer un update
$ssql = "update orden_alt set cliente2='$nombre_cliente', proveedor2='$nombre_prov', impresoras2='$nom_impresora', descrip_proce2_A='$pro_ce1', descrip_proce2_B='$pro_ce2', descrip_proce2_C='$pro_ce3', descrip_proce2_D='$pro_ce4', cant_laminas2='$can_la', laminas_alm2='$lam_alm', tamano2='$lam_tamano', suaje_alm2='$ti_suajes'  Where folio_op = '$esta_foliado'";
//Checamos si se guardaron
if($con->query($ssql)) {
 //echo '<p>SE AGREGÓ EL IMPRESOR</p>';
} else {
    echo '<p>Hubo un error al agregar impresor: ' . $con->error . '</p>';
}


// Termina lo que agregue

// Para guardar el id del usuario, la fecha de creación y el folio
//$nom_dis = $_SESSION['usuario'];
//print "<p>EL usuario es:  $nom_dis </p>\n";

//date_default_timezone_set('America/Mexico_City');
//$fecha =date("Y/m/d H:i:s");
//tomamos el mes y el año
//$mes = date("n");
//$ano = date("Y");
//echo ($fecha);
//Aca el folio de cada orden
//$folios = 'M';
//$sql = "INSERT INTO orden_alt(cliente1, proveedor1, impresoras1, descrip_proce1_A, descrip_proce1_B, descrip_proce1_C, descrip_proce1_D, cant_laminas1, laminas_alm1, tamano1, suaje_alm1) VALUES ('$nombre_cliente', '$nombre_prov', '$nom_impresora', '$pro_ce1', '$pro_ce2', '$pro_ce3', '$pro_ce4', '$can_la', '$lam_alm', '$lam_tamano', '$ti_suajes')";
//$resultado = mysqli_query($con, $sql) or die ('Error: '. mysqli_error($con));
//echo " Todo bien se guardaron los datos";
//Enseguida sacamos el id y le hacemos update a la tabla
//$id =mysqli_insert_id($con); 
//$cadena = $folios.$id;
//Pasamos el folio a una cadena por formulario
//$pasa_cadena = $cadena;
//$ssql = "update orden_alt set folio_op='$cadena' Where clave='$id'";
// Ejecutamos la sentencia de actualización
//if($con->query($ssql)) {
 // echo '<p>CONTINUAR CAPTURANDO LA ORDEN</p>';
//} else {
  //echo '<p>Hubo un error al generar folio de orden P.: ' . $con->error . '</p>';
//}
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
  
    
    
    <title>Producción</title>
</head>
<body>
<div class="barra-principal">
<div><img src="./imagen/logo_principal.png" alt="nuevo_doc" width="40" height="40"></div>
<div> <a href="./nueva_orden.php"><img src="./imagen/doc.png" alt="nuevo_doc" width="30" height="30">NUEVA ORDEN</a></div>
<div><a href="./nueva_orden.php"><img src="./imagen/fabrica.png" alt="nuevo_doc" width="30" height="30">EN PRODUCCION</a></div>
<div><a href="./nueva_orden.php"><img src="./imagen/paquete.png" alt="nuevo_doc" width="30" height="30">POR ENTREGAR</a></div>
<div><a href="./nueva_orden.php"><img src="./imagen/error.png" alt="nuevo_doc" width="30" height="30">ATRASADAS</a></div>
<div><a href="./ERP-OP-VIVANCO.php"><img src="./imagen/salida.png" alt="nuevo_doc" width="30" height="30">SALIR</a></div>
</div><!-- aca termina primer contenedor sin problema -->
<div class="contenedor">
    <div> ORDEN DE PRODUCCIÓN No.<?php echo ($esta_foliado); ?> </div>
   <div>
    <h3><?php echo "SE GUARDÓ EL IMPRESOR DE FORMA CORRECTA";  ?> </H3>
    
   
   </div>
   
   <div>
   <form  method="post" action="respuesta_producto3.php" class="cbp-mc-form">
    <label for="res">¿ Agregar otro Impresor ?</label>
    <select id="res" name="res">
                <option>SI</option>
                <option>NO</option>
            </select> 
   </div>
   <div class="cbp-mc-submit-wrap"> 
   <input type="hidden" name="pasa_folio" value="<?php echo ($esta_foliado); ?>" /> 
    <input class="cbp-mc-submit" type="submit" value="Enviar" />
    
   </form>
   </div>
