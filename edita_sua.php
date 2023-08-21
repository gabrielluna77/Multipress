<?php
session_start();
if(isset($_SESSION['usuario'])){
}
else{
    header("Location: ./acceso_negado.php?errorusuario=si");
}
//limpiamos las varibles
$para_or ='';
$con_or ='';
$para_ub ='';
$con_ub='';
$para_d ='';
$con_d ='';
$para_m ='';
$con_m='';
$para_ip ='';
$con_oz ='';
$para_oz ='';
$con_fa ='';
$para_fa ='';
$con_fa ='';
$para_e ='';
$con_e ='';
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
$para_or = $_REQUEST["or"];
$con_or = html_entity_decode($para_or, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($nombre_cliente);
$para_ub = $_REQUEST["ub"];
$con_ub = html_entity_decode($para_ub, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo (nombre_prov);
$para_d = $_REQUEST["d"];
$con_d = html_entity_decode($para_d, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($nom_impresor);
$para_m = $_REQUEST["m"];
$con_m = html_entity_decode($para_m, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($pro_ce1);
$para_ip = $_REQUEST["ip"];
$con_ip = html_entity_decode($para_ip, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($pro_ce1);
$para_oz = $_REQUEST["oz"];
$con_oz = html_entity_decode($para_oz, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($pro_ce1);
$para_fa = $_REQUEST["fa"];
$con_fa = html_entity_decode($para_fa, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($pro_ce1);
$para_e = $_REQUEST["e"];
$con_e = html_entity_decode($para_e, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($ti_suajes);
// Desde aca agregue para hacer un update
$ssql = "update suajes set orden_suaje='$con_or', ubica='$con_ub', descrip='$con_d', mov_s='$con_m', impresor='$con_ip', op_utiliza= '$con_oz', fecha_en= '$con_fa', estado= '$con_e' Where clave = '$esta_foliado'";
//Checamos si se guardaron
//if($con->query($ssql)) {
 //echo '<p>SE AGREGÓ EL IMPRESOR</p>';
//} else {
  //  echo '<p>Hubo un error al agregar impresor: ' . $con->error . '</p>';
//}
// pasamos por cabezera
if($con->query($ssql) === TRUE) {
    header("location: ./in_sua.php");
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
