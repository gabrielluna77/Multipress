<?php
session_start();
if(isset($_SESSION['usuario'])){
}
else{
    header("Location: ./acceso_negado.php?errorusuario=si");
}
//limpiamos las varibles
$tip_papel ='';
$nom_paper ='';
$pasa_fol ='';
$pasa_p ='';
$nom_paper ='';
$tip_papel ='';
$canto_papel ='';
$cant_papel ='';
$canto_bien ='';
$cant_bien='';
$pagina ='';
$paginas ='';
$entran ='';
$entre ='';
$entre_alm ='';
$entren_alm ='';
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
$pasa_p = $_REQUEST["pasa_nomproy"];

$nom_paper = $_REQUEST["papel"];
$tip_papel = html_entity_decode($nom_paper, ENT_QUOTES | ENT_HTML401, "UTF-8");
//pasamos la variable del nombre de proyecto por el formulario

$canto_papel = $_REQUEST["canti_enviado"];
$cant_papel = html_entity_decode($canto_papel, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p> Su $_REQUEST[nom_prove]";
$canto_bien = $_REQUEST["canti_buenos"];
$cant_bien = html_entity_decode($canto_bien, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST[nom_imprim]</p>\n";
$paginas = $_REQUEST["ord_paginado"];
$pagina = html_entity_decode($paginas, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST[fecha_prod]</p>\n";
$entran = $_REQUEST["entre_cli"];
$entre = html_entity_decode($entran, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST[fecha_entrega]</p>\n";
$entren_alm = $_REQUEST["entre_alm"];
$entre_alm = html_entity_decode($entren_alm, ENT_QUOTES | ENT_HTML401, "UTF-8");

// Para guardar el id del usuario, la fecha de creación y el folio
//$nom_dis = $_SESSION['usuario'];
//print "<p>EL usuario es:  $nom_dis </p>\n";

//date_default_timezone_set('America/Mexico_City');
//$fecha =date("Y/m/d H:i:s");
//echo ($fecha);
//Aca el folio de cada orden
//$folios = 'M';
$sql = "INSERT INTO pila_papel(clave, folio_ord, nom_proye, tipo_papel, cant_p_bien, cant_imp_b, orden_pag,  prod_cant_en_cli, prod_cant_entre_alm, clasificacion) VALUES (NULL, '$pasa_fol', '$pasa_p', '$tip_papel', '$cant_papel', '$cant_bien', '$pagina', '$entre', '$entre_alm', NULL)";
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
    <link rel="stylesheet" href="./css/estilos_seguir_pro.css">
	<link rel="stylesheet" href="./css/grig_login.css">
    <link rel="stylesheet" href="./css/estilos_post_orden.css">
	<link rel="stylesheet" href="./css/grid-new_orden.css">
    <link rel="stylesheet" href="./css/estilos_form_sigue_papel.css">
    <title>ERP Multipress</title>
</head>
<body>
<div class="barra-principal">
     <div>Logo</div>
     <div><a href="./nueva_orden.php">NUEVA ORDEN</a></div>
     <div>EN PRODUCCION</div>
     <div>POR ENTREGAR</div>
     <div>ATRASADAS</div>
     <div>SALIR</div>
     
    </div>

	<div class="contenedor">
       <div class="marco-for-izquierdo"><p>NOMBRE PROYECTO :<?php echo ($pasa_fol); ?> &nbsp; <?php echo ($pasa_p);  ?></p> </div>
		    <div class="formulario">
                <form  method="post" action="./seguir_papel.php" name="signin-form">
                       <div class="form-element">
                          
                      </div>
                      <div class="form-element">
                      <label for="pasa_r">AGREGAR MÁS PAPEL A LA ORDEN ?:</label>
                                 <select id="pasa_r" name="pasa_r" required>
                                 <option>SI</option>
                                 <option>NO</option>
                                 </select>
                                 <input type="hidden" name="pasa1" value="<?php echo ($pasa_p); ?>" />
                                 <input type="hidden" name="pasaf" value="<?php echo ($pasa_fol); ?>" />   
                     </div>
                     <div class="form-element">
                     <button type="submit" name="login" value="login">CONTINUAR</button> 
                     </div>
                </form>  
          
            </div>
        <div class="marco-for-derecho"><p>PAPEL:<?php echo ($tip_papel); ?> &nbsp; CANTIDAD: <?php echo ($cant_papel); ?></p> </div>
		
		
	</div>
    </div>
</body>
</html>

