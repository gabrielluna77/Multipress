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
                                    <H2> NUEVA ORDEN DE PRODUCCIÓN. </H2>
                                    <form  method="post" action="guardar_orden.php" class="cbp-mc-form">
                
                                            <div class="form-row"><!--Esto indica que row primera fila es una fila entera-->
                                                    <div class="column-half"><!--Esta es la primera columna de la primera fila-->
                                                          <label for="nom_proy">NOMBRE DE LA ORDEN:</label>
                                                          <input type="text" id="nom_proy" name="nom_proy" placeholder="Ejemplo: OP M1219 POSTER-MUNDET" required>
                                                    </div><!--Se cierra la primera columna de la primera fila-->

                                                   <div class="column-half"> <!--Esta es la segunda columna de la primera fila-->
                                                         <label for="nom_cliente">CLIENTE:</label>
                                                         <input type="text" id="nom_cliente" name="nom_cliente" placeholder="Ejemplo: COCA-COLA" required>
                                                   </div><!--Se cierra la segunda columna de la primera fila-->
                                            </div><!--SE CIERRA EL ROW DE LA PRIMERA FILA-->


                                           <div class="form-row"><!--Empezamos la segunda fila-->
                                                  <div class="column-half"><!--Esta es la primera columna de la segunda fila-->
                                                           <label for="nom_prove">PROVEEDOR:</label>
                                                            <input type="text" id="nom_prove" name="nom_prove" placeholder=" Ejemplo: AGA"required>
                                                  </div><!--Se cierra  la primera columna de la segunda fila-->
                                                  <div class="column-half"><!--Esta es la segunda columna de la segunda fila-->
                                                            <label for="nom_imprim">Tipo Impresora</label>
                                                            <select id="nom_imprim" name="nom_imprim" required>
                                                            <option>NINGUNA</option>
                                                            <option>OKI</option>
                                                            <option>XEROX</option>
                                                            </select>
                                                  </div> <!--Cerramos la segunda columna de la segunda fila-->
                                           </div> 
                         <!-- BORRAR ESTO SI NO FUNCIONA-->
                                                 <div class="form-row"><!--Esto indica que es una fila entera-->
                                                         <div class="column-half"><!--Esta es la primera columna de la primera fila-->
                                                         </div><!--Se cierra la primera columna de la primera fila-->
                                                         <div class="column-half"> <!--Esta es la segunda columna de la primera fila-->
                                                         </div><!--Se cierra la segunda columna de la primera fila-->
                                                </div><!--SE CIERRA EL ROW DE LA PRIMERA FILA-->
                                                <!-- SE TERMINA ACA LO AGREGADO -->
                                                <!-- aca agregamos otra fila -->
                                                <div class="form-row"><!--Empezamos la tercera fila-->
                                                        <div class="column-half"><!--Esta es la primera columna de la tercera fila-->
                                                                 <label for="fecha_prod">FECHA DE PRODUCCION:</label>
                                                                 <input type="date" id="fecha_prod" name="fecha_prod" value="01-12-2023" min="01-01-2023" max="01-12-2099" required>
                                                        </div><!--Se cierra  la primera columna de la tercera fila-->
                                                        <div class="column-half"><!--Esta es la segunda columna de la tercera fila-->
                                                                  <label for="fecha_entrega">FECHA DE ENTREGA:</label>
                                                                  <input type="date" id="fecha_entrega" name="fecha_entrega" value="01-12-2023" min="01-01-2023" max="01-12-2099" required>
                                                        </div> <!--Cerramos la segunda columna de la tercera fila-->
                                                 </div><!-- termina la tercera fila -->
                                                <div class="form-row"><!--Empezamos la cuarta fila-->
                                                         <div class="column-half"><!--Esta es la primera columna de la cuarta fila-->
                                                                  <label for="cant_lam">CANTIDAD DE LÁMINAS:</label>
                                                                  <input type="text" id="cant_lam" name="cant_lam" placeholder=" Ejemplo: 74"required>
                                                         </div><!--Se cierra  la primera columna de la cuarta fila-->
                                                         <div class="column-half"><!--Esta es la segunda columna de la cuarta fila-->
                                                                     <label for="tipo_lam">LÁMINAS:</label>
                                                                    <input type="text" id="tipo_lam" name="tipo_lam" placeholder=" Ejemplo: 4" required>
                                                        </div> <!--Cerramos la segunda columna de la cuarta fila-->
                                                </div><!-- termina la cuarta fila -->
                                                <div class="form-row"><!--Empezamos la  QUINTA fila-->
                                                         <div class="column-half"><!--Esta es la primera columna de la quinta fila-->
                                                                  <label for="la_tamano">TAMAÑO:</label>
                                                                   <input type="text" id="la_tamano" name="la_tamano" placeholder=" Ejemplo: 740X605"required>
                                                         </div><!--Se cierra  la primera columna de la quinta fila-->
                                                         <div class="column-half"><!--Esta es la segunda columna de la quinta fila-->
                                                                    <label for="tipo_suaje">SUAJE:</label>
                                                                    <input type="text" id="tipo_suaje" name="tipo_suaje" placeholder=" Ejemplo: ALMACEN" required>
                                                         </div> <!--Cerramos la segunda columna de la quinta fila-->
                                                </div>

                                                           <!-- aca termina lo que agregue -->
                                               <div class="column-half"><!--Código para una columna-->
                                                        <label for="des_impre">DESCRIPCIÓN DE IMPRESIÓN:</label>
                                                        <input type="text" id="des_impre" name="des_impre" placeholder=" Ejemplo: IMPRESION 4X0" required>    
                                      
                                                </div> <!-- se cierra  el código para una columna-->
                                               
            
                                               <div class="cbp-mc-submit-wrap">
                                                     <input class="cbp-mc-submit" type="submit" value="continuar" />
                                                     <input class="cbp-mc-submit" type="reset" value="Cancelar" />
                                               </div>

                                                        <!-- ACA TERMINA CUARTO DIV -->
                                    </form>
                         </div><!--Fin del clearfix-->

                
                           <!--ACA TERMINA FORMULARIO-->
                            <!-- Aca termina el div del formularios -->
                   </div><!-- TERMINA PARA ENMARCAR -->
          
            </div> <!-- Aca termina el div barra de trabajo -->
    </div> <!-- termina div de contenido -->
</body>
</html>