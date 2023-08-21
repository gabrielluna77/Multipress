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
 $sentencia = $base_de_datos->prepare("SELECT * FROM suajes WHERE clave = ?;");
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

             <form method="post" action="edita_sua.php">

             



      
             <input type="hidden" name="claves" id="claves" value="<?php echo $producto->clave; ?>">
			      
	
            <p>
                <label for="claves">Clave: </label>
                <label><?php echo $producto->clave ?></label> 
                <?php $la_c = $producto->clave ; ?>
               </p>
               <p>
                <label for="or">Orden de suaje:</label>
                <input value="<?php echo $producto->orden_suaje ?>" class="form-control" type="text" name="or"  required id="or" placeholder="Escribe producto." />         
       
               </p>
                <p>
                 <label for="ub">Ubicación:</label>
                 <input value="<?php echo $producto->ubica ?>" class="form-control" type="text" name="ub"  required id="ub" placeholder="Ubicación." />         
  
                 </p>
                  <p>
                  <label for="d">Descripción: </label>
                  <input value="<?php echo $producto->descrip ?>" class="form-control" type="text" name="d"  required id="d" placeholder="Descripción larga" />         
 
                  </p>
                   <p>
                   <label for="m">Movimiento de suaje: </label>
                   <input value="<?php echo $producto->mov_s ?>" class="form-control" type="text" name="m"  required id="m" placeholder="Si se va aproducción." />         
         
                  </p>
                  <p>
                   <label for="ip">Impresor: </label>
                   <input value="<?php echo $producto->impresor ?>" class="form-control" type="text" name="ip"  required id="ip" placeholder="Impresor." />         
           
                  </p>
                  <p>
                   <label for="oz">OP utiliza: </label>
                   <input value="<?php echo $producto->op_utiliza ?>" class="form-control" type="text" name="oz"  required id="oz" placeholder="Para la orden M12." />         
           
                  </p>
                  <p>
                   <label for="fa">Fecha de entrega: </label>
                   <input value="<?php echo $producto->fecha_en ?>" class="form-control" type="text" name="fa"  required id="fa" placeholder="Fecha del movimiento." />         
                  </p>
                  <p>
                   <label for="e">Estado: </label>
                   <input value="<?php echo $producto->estado ?>" class="form-control" type="text" name="e"  required id="e" placeholder="El estado de la orden." />         
           
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