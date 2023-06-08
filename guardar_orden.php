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
$fecha_entrega ='';
$fecha ='';
$id ='';
$cadena ='';
$folios ='';
//limpiamos los textos que llegan desde el formulario
$nom_proy ='';
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
$nom_proy = $_REQUEST["nom_proy"];
$nombre_proyecto = html_entity_decode($nom_proy, ENT_QUOTES | ENT_HTML401, "UTF-8");
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
$fecha_entrega = html_entity_decode($fec_entre, ENT_QUOTES | ENT_HTML401, "UTF-8");
// Para guardar el id del usuario, la fecha de creación y el folio
$nom_dis = $_SESSION['usuario'];
//print "<p>EL usuario es:  $nom_dis </p>\n";

date_default_timezone_set('America/Mexico_City');
$fecha =date("Y/m/d H:i:s");
//echo ($fecha);
//Aca el folio de cada orden
$folios = 'M';
$sql = "INSERT INTO orden_prod(clave, fecha_cre_op, folio_op, nom_disenador, nombre_proy, nom_alternos, cliente, proveedor, impresoras, fecha_prod, fecha_entrega, prod_cant_entre_cliente, prod_cant_entre_almacen, descrip_prod_terminado, muestra_imagen, suaje_almacen, laminas_almacen, papel_otro, prueba_color, distribucion, emp_manejo, cant_paquetes, cant_x_paquete) VALUES (NULL, '$fecha', '$folios', '$nom_dis', '$nombre_proyecto', NULL, '$nombre_cliente', '$nombre_prov', '$nom_impresora', '$fecha_producc', '$fecha_entrega', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)";
$resultado = mysqli_query($con, $sql) or die ('Error: '. mysqli_error($con));
//echo " Todo bien se guardaron los datos";
//Enseguida sacamos el id y le hacemos update a la tabla
$id =mysqli_insert_id($con); 
$cadena = $folios.$id;
//Pasamos el folio a una cadena por formulario
$pasa_cadena = $cadena;
$ssql = "update orden_prod set folio_op='$cadena' Where clave='$id'";
// Ejecutamos la sentencia de actualización
if($con->query($ssql)) {
  //echo '<p>CONTINUAR CAPTURANDO LA ORDEN</p>';
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
<!-- TERMINA EL CÓDIGO PHP, INICIA HTML -->
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
                    <form  method="post" action="guardar_papel.php" class="cbp-mc-form">
                
                        <div class="form-row"><!--Esto indica que es una fila entera-->
                                    <div class="column-half"><!--Esta es la primera columna de la primera fila-->
                                         <label for="cant_laminas">CANTIDAD DE LAMINAS A USAR:</label>
                                         <input type="text" id="canti_laminas" name="canti_laminas" placeholder="Ejemplo: 4, 5.1,15.9,134" required>
                                    </div><!--Se cierra la primera columna de la primera fila-->

                                    <div class="column-half"> <!--Esta es la segunda columna de la primera fila-->
                                          <label for="des_laminas">LAMINAS:</label>
                                          <input type="text" id="des_laminas" name="des_laminas" placeholder="Ejemplo: AGA" required>
                                    </div><!--Se cierra la segunda columna de la primera fila-->
                        </div><!--SE CIERRA EL ROW DE LA PRIMERA FILA-->


                        <div class="form-row"><!--Empezamos la segunda fila-->
                                <div class="column-half"><!--Esta es la primera columna de la segunda fila-->
                                         <label for="la_tamano">TAMAÑO:</label>
                                        <input type="text" id="lam_tamano" name="lam_tamano" placeholder=" Ejemplo: 740X605"required>
                                </div><!--Se cierra  la primera columna de la segunda fila-->
                                <div class="column-half"><!--Esta es la segunda columna de la segunda fila-->
                                         <label for="tipo_suaje">SUAJE:</label>
                                            <input type="text" id="tipo_suaje" name="tipo_suaje" placeholder=" Ejemplo: ALMACEN" required>
                                </div> <!--Cerramos la segunda columna de la segunda fila-->
                                <div class="column-half"><!--Código para una columna-->
                                       <label for="des_impre">DESCRIPCIÓN DE IMPRESIÓN:</label>
                                       <input type="text" id="des_impre" name="des_impre" placeholder=" Ejemplo: IMPRESION 4X0" required>    
                                       <input type="hidden" name="viene_n_proy" value="<?php echo ($pasa_n_proy); ?>" />
                                       <input type="hidden" name="viene_pasa_cadena" value="<?php echo ($pasa_cadena); ?>" />
                                        
                                    </div> <!-- se cierra  el código para una columna-->
                        </div> <!--Cerramos EL FORM-ROW la segunda fila-->
            
                        <!--<div class="form-row">Empezamos la cuarta
                                <div class="column-full">
                                    <input class="cbp-mc-submit" type="submit" value="continuar" />
                                    
                                </div> se cierra el de una columna 
                        </div>termina la cuarta 
                        <div class="form-row">Empezamos la Quinta
                                <div class="column-full">Una sola columna
                                    
                                    <input class="cbp-mc-submit" type="reset" value="Cancelar" />
                                </div> se cierra el de una columna
                        </div>termina la quinta -->
                        
                        <!-- ACA AGREGUE PARA LOS BOTONES PERO SE PUEDE BORRAR -->
                          <!-- ACA TERMINA EL TERCER DIV AREA DE LOS BOTONES -->
                    <div class="cbp-mc-submit-wrap">
                    <input class="cbp-mc-submit" type="submit" value="continuar" />
                    <input class="cbp-mc-submit" type="reset" value="Cancelar" />
                    
                    </div>



                    <!-- ACA TERMINA CUARTO DIV -->
                     </form>
                </div><!--Fin del contenedor-->

                
                 <!--ACA TERMINA FORMULARIO-->
                 <!-- Aca termina el div del formularios -->
            </div><!-- TERMINA PARA ENMARCAR -->
          
        </div> <!-- Aca termina el div que agregue para borrar -->
    </div>
</body>
</html>