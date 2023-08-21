<?php
session_start();
if(isset($_SESSION['usuario'])){
}
else{
    header("Location: ./acceso_negado.php?errorusuario=si");
}
//pasamos el folio
$pasa_cadena = $_REQUEST["pasa_folio"];
//$pasa_n_proy = $_REQUEST["pasa1"];
$con_resp = $_REQUEST["pasa_r"];
if($con_resp ==='SI'){
header("Location:./continuar_ord.php?este_folio=".urlencode($pasa_cadena));  
//header("location:http://localhost/form2.php?error=".$error);

}else{
header("Location:./seguir_cap_ord.php?este_folio=".urlencode($pasa_cadena));      
}
?>
