<?php
session_start();
if(isset($_SESSION['usuario'])){
}
else{
header("Location: ./acceso_negado.php?errorusuario=si");
}
//limpiamos lo que llega desde el formulario
$res_recibe ='';
$con_elfolio ='';
$res_recibe = $_REQUEST["res"];
$con_elfolio = $_REQUEST["pasa_folio"];
//echo ($res_recibe);
if($res_recibe === 'SI'){
header("Location: ./sumar_impresores.php?este_folio=".urlencode($con_elfolio));
} else {
header("Location: ./continuar_ord.php?este_folio=".urlencode($con_elfolio));
}
?>
