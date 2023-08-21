<?php
session_start();
if(isset($_SESSION['usuario'])){
}
else{
    header("Location: ./acceso_negado.php?errorusuario=si");
}

function pasar_usuario(){
 $usuario =  $_SESSION['usuario'];
 return $usuario;
}
//limpiamos las varibleas
$de_p_t ='';
$des_p_t ='';
$fol_i ='';
$fo_i ='';
$fol_f ='';
$fo_f ='';
$co ='';
$col ='';
$ima_ges ='';
$im_ges ='';
$otros ='';
$otro1 ='';
$paque  ='';
$pae  ='';
$empaque ='';
$empa ='';
$c_empa ='';
$c_x_p ='';
$ca_x_p ='';
$esta_foliado ='';
$esta_foliado = $_REQUEST["c_folio"];
//para que se guarden los acentos y las ñ
header("Content-Type: text/html;charset=utf-8");
//conectando a la base de datos
$conec = mysqli_connect('localhost', 'multipresspublic_multipresspublic', 'Marjoerie2020#', 'multipresspublic_produccion');
if (mysqli_connect_errno()){
    printf("HAY PROBLEMAS CON LA BD, LLAMAR AL PROGRAMADOR PARA SU REPARACION TEL: 2215154099: %s\n", mysqli_connect_error());
    exit();
}

//para checar el conjunto de caracteres utf8
if (!mysqli_set_charset($conec, "utf8")) {
    //printf("Error cargando el conjunto de caracteres utf8: %s\n", mysqli_error($con));
    exit();
} else {
    //printf("Conjunto de caracteres actual: %s\n", mysqli_character_set_name($con));
}
//pasamos lo mandado de formulario a variables
$de_p_t = $_REQUEST["d_p_t"];
$des_p_t = html_entity_decode($de_p_t, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p> Su $_REQUEST[nom_prove]";
$fol_i = $_REQUEST["f_d"];
$fo_i = html_entity_decode($fol_i, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p> Su $_REQUEST[nom_prove]";
$fol_f = $_REQUEST["a_l"];
$fo_f = html_entity_decode($fol_f, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p> Su $_REQUEST[nom_prove]";
$co = $_REQUEST["color"];
$col = html_entity_decode($co, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p> Su $_REQUEST[nom_prove]";
$ima_ges = $_REQUEST["dise"];
$im_ges = html_entity_decode($ima_ges, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p> Su $_REQUEST[nom_prove]";
$empaque = $_REQUEST["emp"];
$empa = html_entity_decode($empaque, ENT_QUOTES | ENT_HTML401, "UTF-8");
$otro1 = $_REQUEST["oto"];
$otros = html_entity_decode($otro1, ENT_QUOTES | ENT_HTML401, "UTF-8");
$paque = $_REQUEST["paque"];
$pae = html_entity_decode($paque, ENT_QUOTES | ENT_HTML401, "UTF-8");
$c_x_p = $_REQUEST["por_p"];
$ca_x_p = html_entity_decode($c_x_p, ENT_QUOTES | ENT_HTML401, "UTF-8");


//hacemos el update
$consul = "UPDATE orden_alt SET des_prod_ter = '$des_p_t', folio_ini = '$fo_i', folio_fin = '$fo_f', color = '$col', mues_img_prod = '$im_ges', empaque = '$empa', otro = '$otros', canti_empa ='$pae', cant_por_paq = '$ca_x_p'  WHERE folio_op ='$esta_foliado'";
if(mysqli_query($conec, $consul)){
    header("Location: ./termina_orden.php");
    //echo "Registro actualizado.";
} else {
    echo "ERROR: No se ejecuto $consul. " . mysqli_error($conec);
}
$consul = null;

//limpiamos la consulta
mysqli_close($conec);


?>