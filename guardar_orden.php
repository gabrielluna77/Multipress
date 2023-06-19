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
$fecha_producc ='';
$fechas_entrega ='';
$fecha ='';
$canti_lams ='';
$cants_lam ='';
$tip_lam ='';
$tipo_lams ='';
$lam_tamano ='';
$las_tamano ='';
$ti_suajes ='';
$tip_suaje ='';
$de_impre ='';
$des_imp ='';
$id ='';
$cadena ='';
$folios ='';

//limpiamos los textos que llegan desde el formulario

$nom_proy1 ='';
$nom_cli ='';
$nom_prov='';
$nom_imp ='';
$fec_prod ='';
$fec_entre ='';
$pasa_n_proy ='';
$pasa_cadena ='';

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
$nom_proy1 = $_REQUEST["nom_proy"];
$nombre_proyecto = html_entity_decode($nom_proy1, ENT_QUOTES | ENT_HTML401, "UTF-8");
//pasamos la variable del nombre de proyecto por el formulario
$pasa_n_proy = $nombre_proyecto;
$nom_cli = $_REQUEST["nom_cliente"];
$nombre_cliente = html_entity_decode($nom_cli, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p> Su $_REQUEST[nom_prove]";
$nom_prov = $_REQUEST["nom_prove"];
$nombre_prov = html_entity_decode($nom_prov, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST[nom_imprim]</p>\n";
$nom_imp = $_REQUEST["nom_imprim"];
$nom_impresora = html_entity_decode($nom_imp, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST[fecha_prod]</p>\n";
$fec_prod = $_REQUEST["fecha_prod"];
$fecha_producc = html_entity_decode($fec_prod, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST[fecha_entrega]</p>\n";
$fec_entre = $_REQUEST["fecha_entrega"];
$fechas_entrega = html_entity_decode($fec_entre, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST[cant_lam]</p>\n";
$canti_lams = $_REQUEST["cant_lam"];
$cants_lam = html_entity_decode($canti_lams, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST[tipo_lam]</p>\n";
$tip_lam = $_REQUEST["tipo_lam"];
$tipo_lams = html_entity_decode($tip_lam, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST[la_tamano]</p>\n";
$las_tamano = $_REQUEST["la_tamano"];
$lam_tamano = html_entity_decode($las_tamano, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST[tipo_suaje]</p>\n";
$tip_suaje = $_REQUEST["tipo_suaje"];
$ti_suajes = html_entity_decode($tip_suaje, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST[des_impre]</p>\n";
$de_impre = $_REQUEST["des_impre"];
$des_imp = html_entity_decode($de_impre, ENT_QUOTES | ENT_HTML401, "UTF-8");



// Para guardar el id del usuario, la fecha de creación y el folio
$nom_dis = $_SESSION['usuario'];
//print "<p>EL usuario es:  $nom_dis </p>\n";

date_default_timezone_set('America/Mexico_City');
$fecha =date("Y/m/d H:i:s");
//echo ($fecha);
//Aca el folio de cada orden
$folios = 'M';
$sql = "INSERT INTO orden_alt(clave, fecha_cre_op, folio_op, nom_disenador, nombre_proy, nom_alternos, cliente, proveedor, impresoras, fecha_prod, fecha_entrega, cant_laminas, laminas, tamano, suaje,  descrip_imp) VALUES (NULL, '$fecha', '$folios', '$nom_dis', '$nombre_proyecto', NULL, '$nombre_cliente', '$nombre_prov', '$nom_impresora', '$fecha_producc', '$fechas_entrega', '$cants_lam', '$tipo_lams', '$lam_tamano', '$ti_suajes', '$des_imp')";
$resultado = mysqli_query($con, $sql) or die ('Error: '. mysqli_error($con));
//echo " Todo bien se guardaron los datos";
//Enseguida sacamos el id y le hacemos update a la tabla
$id =mysqli_insert_id($con); 
$cadena = $folios.$id;
//Pasamos el folio a una cadena por formulario
$pasa_cadena = $cadena;
$ssql = "update orden_alt set folio_op='$cadena' Where clave='$id'";
// Ejecutamos la sentencia de actualización
if($con->query($ssql)) {
 // echo '<p>CONTINUAR CAPTURANDO LA ORDEN</p>';
} else {
  //echo '<p>Hubo un error al generar folio de orden P.: ' . $con->error . '</p>';
}
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
	<link rel="stylesheet" href="./css/grid-new_orden.css">
    <link rel="stylesheet" href="./css/estilos_form_sigue_papel.css">
  
    
    
    <title>Producción</title>
</head>
<body>
    <div class="barra-principal">
     <div>Logo</div>
     <div><a href="./nueva_orden.php">NUEVA ORDEN</a></div>
     <div>EN PRODUCCION</div>
     <div>POR ENTREGAR</div>
     <div>ATRASADAS</div>
     <div>SALIR</div>
     </div><!-- aca termina primer contenedor sin problema -->
    <div class="barra-del-contenido">
       <!--INICIA FORMULARIO<div class="barra-lateral">
        
        </div>-->
         <div class="barra-de-trabajo">
           <!--INICIA FORMULARIO-->
          
                <div class="para-enmarcar">
                    <!-- INICIA FORMULARIO -->
                    <!-- metemos a otro div formulario -->
                        <div  id="responsive-form" class="clearfix"><!--Esta es la caja del contenedor del formulario-->
                                    <h3><?php echo ($cadena); ?> &nbsp; <?php echo ($nombre_proyecto);  ?> </H3>
                            <form  method="post" action="guarda_papel_alm.php" class="cbp-mc-form">
                
                                        <div class="form-row"><!--Esto indica que es una fila entera-->
                                                    <div class="column-half"><!--Esta es la primera columna de la primera fila-->
                                                            <label for="papel">PAPEL:</label>
                                                            <input type="text" id="papel" name="papel" placeholder="Ejemplo: Sulfatado" required>
                                                    </div><!--Se cierra la primera columna de la primera fila-->
                                                    <div class="column-half"> <!--Esta es la segunda columna de la primera fila-->
                                                            <label for="canti_enviado">CANTIDAD DE ENVIADO:</label>
                                                            <input type="text" id="canti_enviado" name="canti_enviado" placeholder="Ejemplo: 4,350" required>
                                                    </div><!--Se cierra la segunda columna de la primera fila-->
                                        </div><!--SE CIERRA EL ROW DE LA PRIMERA FILA-->


                                        <div class="form-row"><!--Empezamos la segunda fila-->
                                                    <div class="column-half"><!--Esta es la primera columna de la segunda fila-->
                                                             <label for="canti_buenos">CANTIDAD DE IMPRESOS BUENOS:</label>
                                                             <input type="text" id="canti_buenos" name="canti_buenos" placeholder=" Ejemplo: 2,000" required>
                                                    </div><!--Se cierra  la primera columna de la segunda fila-->
                                                    <div class="column-half"><!--Esta es la segunda columna de la segunda fila-->
                                                            <label for="ord_paginado">ORDEN DE COMPAGINADO:</label>
                                                            <input type="text" id="ord_paginado" name="ord_paginado" placeholder=" Ejemplo: 2A-c" required>
                                                    </div> <!--Cerramos la segunda columna de la segunda fila-->
                                        </div> <!-- cerramos el row de la segunda fila -->
                                                    <!--  ACA SE AGREGA TERCERA FILA -->
                                        <div class="form-row"><!--Empezamos la tercera fila-->
                                                    <div class="column-half"><!--Esta es la primera columna de la tercera fila-->
                                                            <label for="entre_cli">PROD. Y CANT. A ENTREGAR AL CLIENTE:</label>
                                                            <input type="text" id="entre_cli" name="entre_cli" placeholder="12,867 piezas" required>
                                                    </div><!--Se cierra  la primera columna de la tercera fila-->
                                                    <div class="column-half"><!--Esta es la segunda columna de la tercera fila-->
                                                            <label for="entre_alm">PROD. Y CANT. A ENTREGAR A ALMACEN:</label>
                                                            <input type="text" id="entre_alm" name="entre_alm" placeholder="183 piezas " required>
                                                    </div> <!--Cerramos la segunda columna de la tercera fila-->
                                        </div><!-- cerramos el row de la tercera columna -->                             
                                               <!-- TERMINA LA TERCERA FILA -->
                                        <div class="column-half"><!--Código para una columna-->
                                                        <input type="hidden" name="pasa_nomproy" value="<?php echo ($pasa_n_proy); ?>" />
                                                        <input type="hidden" name="pasa_folio" value="<?php echo ($pasa_cadena); ?>" />   
                                        </div> <!-- se cierra  el código para una columna-->
                                        <div class="cbp-mc-submit-wrap">
                                                        <input class="cbp-mc-submit" type="submit" value="continuar" />
                                                        <input class="cbp-mc-submit" type="reset" value="Cancelar" />
                                        </div>
                    <!-- ACA TERMINA formulario -->
                            </form>
                     </div><!--Termina Clearfix-->
                </div><!-- TERMINA PARA ENMARCAR -->
          
        </div> <!-- Aca termina el div BARRA DE TRABAJO -->
    </div><!-- TERMINA BARRA DEL CONTENIDO -->
</body>
</html>