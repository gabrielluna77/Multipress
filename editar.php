<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/estilos_form.css">
    <title>Editar orden</title>
</head>
<body>

<?php
//Limpiamos consultas y base de datos
$base_de_datos = null;
$sentencia = null;
$conteo = null;
$paginas = null;
$productos = null;
unset($producto); // rompe la referencia con el último elemento que está en el forech
//$identifica = $_REQUEST["id"]; se pasa el id y es el campo clave de la tabla orden_alt
 //echo "$identifica";
 if(!isset($_REQUEST["id"])) exit();
 $identifica = $_REQUEST["id"];
 //echo "$identifica";
 //Conectamos a la base de datos
 //include_once ('./funciones/new_conexion.php');
 try {
  $base_de_datos = new PDO('mysql:host=localhost;dbname=' . 'multipresspublic_produccion', 'multipresspublic_multipresspublic', 'Marjoerie2020#');
  $base_de_datos->query("set names utf8;");
  $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
  $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (Exception $e) {
  echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
// Hacemos la consulta a la base de datos para editar solo el status
 $sentencia = $base_de_datos->prepare("SELECT clave, fecha_cre_op, folio_op, nombre_proy, cliente, cliente1, cliente2, cliente3, status FROM orden_alt WHERE clave = ?;");
 $sentencia->execute([$identifica]);
 $producto = $sentencia->fetch(PDO::FETCH_OBJ);
 if($producto === FALSE){
   echo "¡No existe una orden  con esa clave !";
   exit();
 }

?>
    

<div class="contact_form">
      <div class="formulario"> 
                   <h1>Modificar el Status de la orden <?php echo $producto->clave; ?> en bitácora </h1>
                   <!--<h3>Capturar todos los datos de la orden, si no tiene usted la información usar comodin (--) al capturar. </h3> -->

             <form method="post" action="edita_orden.php">

             



      
             <input type="hidden" name="claves" id="claves" value="<?php echo $producto->clave; ?>">
			      
	
            <p>
                <label for="fecha_">Fecha de creación: </label>
                <label><?php echo $producto->fecha_cre_op ?></label>
              </p>
               <p>
                <label for="orden_produc_">Folio de la orden:</label>
                <label><?php echo $producto->folio_op ?></label>         
               </p>
                <p>
                 <label for="nombre_proyecto_">Nombre del proyecto:</label>
                 <label><?php echo $producto->nombre_proy ?></label>  
                 </p>
                  <p>
                  <label for="impresor_">cliente: </label>
                  <label><?php echo $producto->cliente ?></label>  
                  </p>
                   <p>
                   <label for="impresor_">cliente 2: </label>
                  <label><?php echo $producto->cliente1 ?></label>           
                  </p>
                  <p>
                   <label for="impresor_">cliente 3: </label>
                  <label><?php echo $producto->cliente2 ?></label>           
                  </p>
                  <p>
                   <label for="impresor_">cliente 4: </label>
                  <label><?php echo $producto->cliente3 ?></label>           
                  </p>
                    <p>
                   <label for="sta">Status:<span><em>(requerido)</em></span></label>
                  <input value="<?php echo $producto->status ?>" class= "form-control" type="text" name="sta"  required id="sta" placeholder="Escribe el Status de la orden"/> 
                   </p>
                  <p class="aviso">
                  <span class="obligatorio"> * </span>De clic en Guardar para modificar Status de la orden.
                  </p>          
			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./produccion.php">Cancelar</a>
		</form>

    <?php
    $base_de_datos = null;
    $sentencia = null;
    $conteo = null;
    $paginas = null;
    $productos = null;
    unset($producto); // rompe la referencia con el último elemento que está en el forech
    ?>
	</div>
    </body>
</html>