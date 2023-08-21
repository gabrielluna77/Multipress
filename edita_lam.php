<?php
session_start();
if(isset($_SESSION['usuario'])){
}
else{
    header("Location: ./acceso_negado.php?errorusuario=si");
}
//limpiamos las varibles
$pro ='';
$p_p ='';
$c_al ='';
$c_a_a='';
$no ='';
$not ='';
$ubi ='';
$u_b='';
$sal ='';
$sali ='';
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
$pro = $_REQUEST["p"];
$p_p = html_entity_decode($pro, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($nombre_cliente);
$c_al = $_REQUEST["i"];
$c_a_a = html_entity_decode($c_al, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo (nombre_prov);
$no = $_REQUEST["n"];
$not = html_entity_decode($no, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($nom_impresor);
$ubi = $_REQUEST["u"];
$u_b = html_entity_decode($ubi, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($pro_ce1);
$sal = $_REQUEST["s"];
$sali = html_entity_decode($sal, ENT_QUOTES | ENT_HTML401, "UTF-8");
//echo ($ti_suajes);
// Desde aca agregue para hacer un update
$ssql = "update laminas set producto='$p_p', inventario='$c_a_a', nota='$not', ubica='$u_b', salida='$sali' Where clave = '$esta_foliado'";
//Checamos si se guardaron
//if($con->query($ssql)) {
 //echo '<p>SE AGREGÓ EL IMPRESOR</p>';
//} else {
  //  echo '<p>Hubo un error al agregar impresor: ' . $con->error . '</p>';
//}
if($con->query($ssql) === TRUE) {
    header("location: ./inv_la.php");
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
