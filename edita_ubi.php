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
//limpiamos donde llegará el folio
$esta_foliado ='';
header("Content-Type: text/html;charset=utf-8");
$con = mysqli_connect('localhost', 'multipresspublic_multipresspublic', 'Marjoerie2020#', 'multipresspublic_produccion');
//$nombres= $_REQUEST["nombre"];
// SE VERIFICA LA CONEXION
if (mysqli_connect_errno()){
    printf("HAY PROBLEMAS CON LA BD, LLAMAR AL PROGRAMADOR PARA SU REPARACION TEL: 2215154099: %s\n", mysqli_connect_error());
    exit();
}

//para checar el conjunto de caracteres utf8
if (!mysqli_set_charset($con, "utf8")) {
    //printf("Error cargando el conjunto de caracteres utf8: %s\n", mysqli_error($con));
    exit();
} else {
    //printf("Conjunto de caracteres actual: %s\n", mysqli_character_set_name($con));
}
// Primero el REQUEST DEL FOLIO
$esta_foliado = $_REQUEST["pasa_folio"];
$para_nu = $_REQUEST["nu"];
$con_nu = html_entity_decode($para_nu, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($nombre_cliente);
$para_ov = $_REQUEST["ov"];
$con_ov = html_entity_decode($para_ov, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo (nombre_prov);
$para_fec = $_REQUEST["fe_c"];
$con_fec = html_entity_decode($para_fec, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($ti_suajes);
// Desde aca agregue para hacer un update
$ssql = "update ubicaciones set ubica='$con_nu', obse='$con_ov', fec_cam='$con_fec' Where clave = '$esta_foliado'";
//Checamos si se guardaron
//if($con->query($ssql)) {
 //echo '<p>SE AGREGÓ EL IMPRESOR</p>';
//} else {
  //  echo '<p>Hubo un error al agregar impresor: ' . $con->error . '</p>';
//}
// pasamos por cabezera
if($con->query($ssql) === TRUE) {
    header("location: ./ubica.php");
    } 
    
    else {
        echo "Error al actualizar El producto en inventario" .$con->error;
    }

$sql = null;
$ssql= null;
$resultado = null;
//limpiamos la consulta
mysqli_close($con);
?>