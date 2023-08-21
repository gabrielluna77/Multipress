<?php
session_start();
if(isset($_SESSION['usuario'])){
}
else{
    header("Location: ./acceso_negado.php?errorusuario=si");
}
//limpiamos las varibles
$para_ti ='';
$con_ti ='';
$para_can ='';
$con_can='';
$para_ubi ='';
$con_ubi ='';
$para_fe ='';
$con_fe='';
$para_comen ='';
$con_comen ='';
$para_sali ='';
$con_sali ='';
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
$para_ti = $_REQUEST["po"];
$con_ti = html_entity_decode($para_ti, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($nombre_cliente);
$para_can = $_REQUEST["in"];
$con_can = html_entity_decode($para_can, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo (nombre_prov);
$para_ubi = $_REQUEST["nb"];
$con_ubi = html_entity_decode($para_ubi, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($nom_impresor);
$para_fe = $_REQUEST["fe"];
$con_fe = html_entity_decode($para_fe, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($pro_ce1);
$para_comen = $_REQUEST["os"];
$con_comen = html_entity_decode($para_comen, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($pro_ce1);
$para_sali = $_REQUEST["sa"];
$con_sali = html_entity_decode($para_sali, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($ti_suajes);
// Desde aca agregue para hacer un update
$ssql = "update sobrantes set tipo='$con_ti', canti='$con_can', ubica='$con_ubi', fecha='$con_fe', comen='$con_comen', salida= '$con_sali' Where clave = '$esta_foliado'";
//Checamos si se guardaron
//if($con->query($ssql)) {
 //echo '<p>SE AGREGÓ EL IMPRESOR</p>';
//} else {
  //  echo '<p>Hubo un error al agregar impresor: ' . $con->error . '</p>';
//}
// pasamos por cabezera
if($con->query($ssql) === TRUE) {
    header("location: ./in_sobra.php");
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
