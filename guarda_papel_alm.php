<?php
session_start();
if(isset($_SESSION['usuario'])){
}
else{
    header("Location: ./acceso_negado.php?errorusuario=si");
}
//limpiamos las varibles
$tip_papel ='';
$f_p ='';
$pasa_fol ='';
$pasa_p ='';
$f_prd ='';
$f_entr ='';
$f_entre ='';
$p_ext ='';
$p_exte='';
$c_p_ext ='';
$can_p_ex ='';
$c_i_b ='';
$ca_im_b ='';
$entre_alm ='';
$o_p ='';
$or_pa_g ='';
$p_c_a ='';
$pa_c_a ='';
$o_p_c ='';
$can_p_en ='';
$c_im_b ='';
$c_im='';
$pak ='';
$paky ='';
$paky ='';
$imags ='';
$imagy ='';
//limpiamos los textos que llegan desde el formulario
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
//print "<p>Su  $_REQUEST[nom_proy]</p>\n";
$pasa_fol = $_REQUEST["pasa_folio"];
//$pasa_p = $_REQUEST["pasa_nomproy"];

$f_p = $_REQUEST["f_prod"];
$f_prd = html_entity_decode($f_p, ENT_QUOTES | ENT_HTML401, "UTF-8");
//pasamos la variable del nombre de proyecto por el formulario

$f_entr = $_REQUEST["f_ent"];
$f_entre = html_entity_decode($f_entr, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p> Su $_REQUEST[nom_prove]";
$p_ext = $_REQUEST["p_e"];
$p_exte = html_entity_decode($p_ext, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST[nom_imprim]</p>\n";
$can_p_ex = $_REQUEST["c_pap_e"];
$c_p_ext = html_entity_decode($can_p_ex, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST[fecha_prod]</p>\n";
$c_i_b = $_REQUEST["c_imp_b"];
$ca_im_b = html_entity_decode($c_i_b, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST[fecha_entrega]</p>\n";
$o_p = $_REQUEST["o_pag"];
$or_pa_g = html_entity_decode($o_p, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST[fecha_entrega]</p>\n";
$p_c_a = $_REQUEST["pap_cort"];
$pa_c_a = html_entity_decode($p_c_a, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST[fecha_entrega]</p>\n";
$o_p_c = $_REQUEST["can_pap_e_co"];
$can_p_en = html_entity_decode($o_p_c, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST[fecha_entrega]</p>\n";
$c_im_b = $_REQUEST["c_im_bc"];
$c_im = html_entity_decode($c_im_b, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST[fecha_entrega]</p>\n";
$pak = $_REQUEST["o_pag_c"];
$paky= html_entity_decode($pak, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST[fecha_entrega]</p>\n";
$imags = $_REQUEST["imagen"];
$imagy = html_entity_decode($imags, ENT_QUOTES | ENT_HTML401, "UTF-8");
// Para guardar el id del usuario, la fecha de creación y el folio
//$nom_dis = $_SESSION['usuario'];
//print "<p>EL usuario es:  $nom_dis </p>\n";

//date_default_timezone_set('America/Mexico_City');
//$fecha =date("Y/m/d H:i:s");
//echo ($fecha);
//Aca el folio de cada orden
//$folios = 'M';
$sql = "INSERT INTO pila_papel(clave, folio_ord, nom_proye, fe_pro, fe_entre, p_ext, c_p_en, c_im_bu, ord_comp, p_cor_a, c_p_en_c, c_im_bu_c, ord_comp_c, img_refe, prod_cant_cli, prod_cant_alm, clasifica) VALUES (NULL, '$pasa_fol', NULL, '$f_prd', '$f_entre', '$p_exte', '$c_p_ext', '$ca_im_b', '$or_pa_g', '$pa_c_a', '$can_p_en', '$c_im', '$paky', '$imagy', NULL, NULL, NULL)";
$resultado = mysqli_query($con, $sql) or die ('Error: '. mysqli_error($con));
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
//$ssql= null;
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
    <link rel="stylesheet" href="./css/estilos_post_orden_new.css">
    <link rel="stylesheet" href="./css/estilos_form_tres.css">
	<link rel="stylesheet" href="./css/grid_a_p.css">
	
    <title>ERP Multipress</title>
</head>
<body>
<div class="barra-principal">
<div><img src="./imagen/logo_principal.png" alt="nuevo_doc" width="40" height="40"></div>
<div><img src="./imagen/doc.png" alt="nuevo_doc" width="30" height="30">NUEVA ORDEN</div>
<div><img src="./imagen/fabrica.png" alt="nuevo_doc" width="30" height="30">EN PRODUCCION</div>
<div><img src="./imagen/paquete.png" alt="nuevo_doc" width="30" height="30">POR ENTREGAR</div>
<div><img src="./imagen/error.png" alt="nuevo_doc" width="30" height="30">ATRASADAS</div>
<div><a href="./ERP-OP-VIVANCO.php"><img src="./imagen/salida.png" alt="nuevo_doc" width="30" height="30">SALIR</a></div>
</div>
<div class="contenedor">
<div>FOLIO PROYECTO :</div>
<div><?php echo ($pasa_fol); ?></div>
<div>
<p> PAPEL:<?php echo ($p_exte); ?></p> <p> CANTIDAD: <?php echo ($c_p_ext); ?></p>
<p>CORTADO A:<?php echo ($pa_c_a); ?></p><p> CANTIDAD: <?php echo ($can_p_en); ?></p>
</div> 
<div>
<form  method="post" action="./seguir_papel.php" name="signin-form">
<label for="pasa_r">AGREGAR MÁS PAPEL A LA ORDEN ?:</label>
<select id="pasa_r" name="pasa_r" required>
<option>SI</option>
<option>NO</option>
</select>
<!--<input type="hidden" name="pasa1" value=" echo ($pasa_p); ?>" />
<input type="hidden" name="pasaf" value="php echo ($esta_foliado); ?>" />  -->
</div>    
<div class="cbp-mc-submit-wrap">
<input type="hidden" name="pasa_folio" value="<?php echo($pasa_fol);?>"/> 
<!--<input type="hidden" name="pasa_folio" value="< phpecho ($esta_foliado); ?>" /> -->
<input class="cbp-mc-submit" type="submit" value="continuar" />
</div>
<div class="cbp-mc-submit-wrap"> 
<input class="cbp-mc-submit" type="reset" value="Cancelar" />
</div>
</form>
</div>
</div>
    
</body>
</html>


