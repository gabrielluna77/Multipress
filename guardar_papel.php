<?php
session_start();
if(isset($_SESSION['usuario'])){
}
else{
    header("Location: ./acceso_negado.php?errorusuario=si");
}
//limpiamos las varibles
$text_proy ='';
$text_cadena ='';
$text1_proy ='';
$text2_cadena ='';
$cant_lam ='';
$canti_lam ='';
$des_lam ='';
$desc_lamina ='';
$lam_tam ='';
$lami_tama ='';
$tip_sua ='';
$tipo_suaj ='';
$des_imp ='';
$des_impre ='';

//Pasamos el folio y nombre de proy por formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text_proy = $_POST['viene_n_proy'];
    $text_cadena = $_POST['viene_pasa_cadena'];  
}else{
    echo ("NO ESTA PASANDO EL FOLIO Y EL NOMBRE DE OP");
}
$text_proy = $_POST['viene_n_proy'];
$text_cadena = $_POST['viene_pasa_cadena'];        

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
$text1_proy = html_entity_decode($text_proy, ENT_QUOTES | ENT_HTML401, "UTF-8");
$text2_cadena = html_entity_decode($text_cadena, ENT_QUOTES | ENT_HTML401, "UTF-8");

$cant_lam = $_REQUEST["canti_laminas"];
$canti_lam = html_entity_decode($cant_lam, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST[nom_cliente]</p>\n";
$des_lam = $_REQUEST["des_laminas"];
$desc_lamina = html_entity_decode($des_lam, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p> Su $_REQUEST[nom_prove]";
$lam_tam = $_REQUEST["lam_tamano"];
$lami_tama = html_entity_decode($lam_tam, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST[nom_imprim]</p>\n";
$tip_sua = $_REQUEST["tipo_suaje"];
$tipo_suaj = html_entity_decode($tip_sua, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST[fecha_prod]</p>\n";
$des_imp = $_REQUEST["des_impre"];
$des_impre = html_entity_decode($des_imp, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p>Su  $_REQUEST[fecha_entrega]</p>\n";


$sql = "INSERT INTO papel(indice, folio_op, nom_proy, cant_laminas, laminas, tamano, suaje, descrip_impre, tipo_papel, cant_papel_envi, cant_papel_bien, orden_pag, prod_cant_entre_cli, prod_cant_entre_almacen) VALUES (NULL, '$text2_cadena', '$text1_proy', '$canti_lam', '$desc_lamina', '$lami_tama', '$tipo_suaj', '$des_impre', NULL, NULL, NULL, NULL, NULL, NULL)";
$resultado = mysqli_query($con, $sql) or die ('Error: '. mysqli_error($con));
echo " Todo bien se guardaron los datos";
//Enseguida sacamos el id y le hacemos update a la tabla
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
                    <form  method="post" action="guardar_agregar_papel.php" class="cbp-mc-form">
                
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