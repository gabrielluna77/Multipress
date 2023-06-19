<?php
$pasa_cadena = $_REQUEST["pasaf"];
$pasa_n_proy = $_REQUEST["pasa1"];
$con_resp = $_REQUEST["pasa_r"];
if($_REQUEST["pasa_r"]=="NO"){
header("Location: ./continuar_orden.php?pasael_f=".urlencode($pasa_cadena));
}else{$res_si = "SI";}
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
                                    <h3><?php echo ($pasa_cadena); ?> &nbsp; <?php echo ($pasa_n_proy);  ?> </H3>
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
                                                            <!--<label for="entre_cli">PROD. Y CANT. A ENTREGAR AL CLIENTE:</label>-->
                                                            <input type="hidden" id="entre_cli" name="entre_cli" value="-" />
                                                    </div><!--Se cierra  la primera columna de la tercera fila-->
                                                    <div class="column-half"><!--Esta es la segunda columna de la tercera fila-->
                                                            <!--<label for="entre_alm">PROD. Y CANT. A ENTREGAR A ALMACEN:</label>-->
                                                            <input type="hidden" id="entre_alm" name="entre_alm" value="-"/>
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