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
$la_c = '';
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
 $sentencia = $base_de_datos->prepare("SELECT * FROM sobrantes WHERE clave = ?;");
 $sentencia->execute([$identifica]);
 $producto = $sentencia->fetch(PDO::FETCH_OBJ);
 if($producto === FALSE){
   echo "¡No existe una orden  con esa clave !";
   exit();
 }

?>
    

<div class="contact_form">
      <div class="formulario"> 
                   <h1>Modificar en inventario <?php echo $producto->clave; ?> en inventario </h1>
                   <!--<h3>Capturar todos los datos de la orden, si no tiene usted la información usar comodin (--) al capturar. </h3> -->

             <form method="post" action="edita_so.php">

             



      
             <input type="hidden" name="claves" id="claves" value="<?php echo $producto->clave; ?>">
			      
	
            <p>
                <label for="claves">Clave: </label>
                <label><?php echo $producto->clave ?></label> 
                <?php $la_c = $producto->clave ; ?>
               </p>
               <p>
                <label for="po">producto:</label>
                <input value="<?php echo $producto->tipo ?>" class="form-control" type="text" name="po"  required id="po" placeholder="Escribe producto." />         
       
               </p>
                <p>
                 <label for="in">Cantidad:</label>
                 <input value="<?php echo $producto->canti ?>" class="form-control" type="text" name="in"  required id="in" placeholder="Cantidad en inventario." />         
  
                 </p>
                  <p>
                  <label for="nb">Ubicación: </label>
                  <input value="<?php echo $producto->ubica ?>" class="form-control" type="text" name="nb"  required id="nb" placeholder="Escribe alguna nota" />         
 
                  </p>
                   <p>
                   <label for="fe">Fecha: </label>
                   <input value="<?php echo $producto->fecha ?>" class="form-control" type="text" name="fe"  required id="fe" placeholder="Escribe fecha." />         
         
                  </p>
                  <p>
                   <label for="os">Observaciones: </label>
                   <input value="<?php echo $producto->comen ?>" class="form-control" type="text" name="os"  required id="os" placeholder="Escribe aluna observación." />         
           
                  </p>
                  <p>
                   <label for="sa">salida: </label>
                   <input value="<?php echo $producto->salida ?>" class="form-control" type="text" name="sa"  required id="sa" placeholder="Escribe la orden Producción." />         
           
                  </p>
                
                  
                  <p class="aviso">
                  <span class="obligatorio"> * </span>De clic en Guardar para modificar el producto del inventario.
                  </p>
                  <input type="hidden" name="pasa_folio" value="<?php echo($la_c);?>"/>           
			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./inv_la.php">Cancelar</a>
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