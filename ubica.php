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
<link rel="stylesheet" href="./css/estilos-produccion_new.css">
<link rel="stylesheet" href="./css/grid-produccion.css">
<title>Almacén</title>
</head>
<body>
<div class="barra-principal">
<div><img src="./imagen/logo_principal.png" alt="nuevo_doc" width="40" height="40"></div>
<div> <a href="./inv_la.php"><img src="./imagen/inventario.png" alt="nuevo_doc" width="30" height="30">INVENTARIO LÁMINAS</a></div>
<div><a href="./in_sua.php"><img src="./imagen/sello.png" alt="nuevo_doc" width="30" height="30">INVENTARIO SUAJES</a></div>
<div><a href="./in_sobra.php"><img src="./imagen/recicla.png" alt="nuevo_doc" width="30" height="30">INVENTARIO SOBRANTES</a></div>
<div><a href="./ubica.php"><img src="./imagen/ubicar2.png" alt="nuevo_doc" width="30" height="30">UBICACIONES</a></div>
<div><a href="./ERP-OP-VIVANCO.php"><img src="./imagen/salida.png" alt="nuevo_doc" width="30" height="30">SALIR</a></div>
</div><!-- termina barra principal-->
<div class="barra-del-contenido">
     <div class="barra-lateral">
        <div></div>
        <div><a href="./agrega_ubica.php">Cargar nueva ubicación</a></div>
        <div><a href="./Menu_principal.php">REGRESAR A MENÚ</a></div>
        <div><a href="./buscar_ord.php">Buscar orden de producción</a></div>
     </div><!--termina barra lateral-->
  <div class="barra-de-trabajo">
     Filtrar la busqueda para localizar producto.
       <form method="post" action="load_ub.php">
        <label for="busqueda">Buscar: </label>
        <input type="text" name="busqueda" id="busqueda">
         </form>
         
     <div class="container">
        <div class="row">
            
        <?php
              # Incluimos la conexión
             //include_once "./funciones/new_conexion.php";
            try {
            $base_de_datos = new PDO('mysql:host=localhost;dbname=' . 'multipresspublic_produccion', 'multipresspublic_multipresspublic', 'Marjoerie2020#');
            $base_de_datos->query("set names utf8;");
            $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
            $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (Exception $e) {
            echo "Ocurrió algo con la base de datos: " . $e->getMessage();
            }
            # Cuántos ordenes mostrar por página
            $productosPorPagina = 10;
            // Por defecto es la página 1; pero si está presente en la URL, tomamos esa
            $pagina = 1;
            if (isset($_GET["pagina"])) {
            $pagina = $_GET["pagina"];
            }
            # El límite es el número de ordenes por página
            $limit = $productosPorPagina;
            # El offset es saltar X productos que viene dado por multiplicar la página - 1 * los productos por página
            $offset = ($pagina - 1) * $productosPorPagina;
            // sacamos la fecha actual
            date_default_timezone_set('America/Mexico_City');
            $fecha =date("Y/m/d H:i:s");
            $dia = date("j");
            $mes = date("n");
            $ano = date("Y");
            //echo "mes = $mes año = $ano";
             # Necesitamos el conteo para saber cuántas páginas vamos a mostrar
            //$sentencia = $base_de_datos->query("SELECT count(*) AS conteo FROM orden_alt WHERE meses= $mes AND anos = $ano");
            $sentencia = $base_de_datos ->query("SELECT count(*) AS conteo FROM ubicaciones WHERE (clave > 0)");
            $conteo = $sentencia->fetchObject()->conteo;
            # Para obtener las páginas dividimos el conteo entre los productos por página, y redondeamos hacia arriba
            $paginas = ceil($conteo / $productosPorPagina);
            $sentencia = null;
            # Ahora obtenemos los productos usando ya el OFFSET y el LIMIT
            $sentencia = $base_de_datos->prepare("SELECT * FROM ubicaciones WHERE (clave > 0 ) ORDER BY clave DESC LIMIT ? OFFSET ? ");
            $sentencia->execute([$limit, $offset]);
            $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
            # Y más abajo los dibujamos...
            ?>
             
        <div class="col-xs-12">
            <h1>Ubicaciones:</h1>
            <table>
            <thead>
            <tr>_________________________________________________________</tr>
            <tr></tr>
            <tr>
            <th scope="coL">No:</th>
            <th scope="coL">Ubicación:</th>
            <th scope="coL">Observaciones:</th>
            <th scope="coL">Fecha de creación:</th> 
            <th scope="coL">Editar:</th> 
                    		  
            </tr>
            </thead>
            <tbody>
            <?php foreach ($productos as $producto) { ?>
            <tr>
            <td><?php echo $producto->clave;?></td>
            <td><?php echo $producto->ubica; ?></a></td>
            <td><?php echo $producto->obse;?></td>
            <td><?php echo $producto->fec_cam; ?></td>
            <td><a  href="<?php echo "editar_ubi.php?id=".$producto->clave;?>"> <img src="./imgmenu/logo_editar.png" alt="imagen editar" width="50" height="50" /></a></td>

            
            <td></td>
            </tr>
            <?php } ?>
            </tbody>
            </table>
            <nav>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                <p>Mostrando <?php echo $productosPorPagina;?> de <?php echo $conteo;?> Ordenes por página</p>
                </div>
                <div class="col-xs-12 col-sm-6">
                <p>Página <?php echo $pagina; ?> de <?php echo $paginas; ?> </p>
                </div>
            </div><!-- termina div row -->
            <table  class="pagination">
            <!-- Si la página actual es mayor a uno, mostramos el botón para ir una página atrás -->
           <?php if ($pagina > 1) { ?>
             <tr><td>
             <a href="./ubica.php?pagina=<?php echo $pagina - 1 ;?>">
             <span aria-hidden="true">&laquo;</span></a>
            </td>
             <?php } ?>
             <div> <!-- inicia div normal -->
                <!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
                <?php for ($x = 1; $x <= $paginas; $x++) { ?>
                <td class="<?php if ($x == $pagina) echo "active"; ?>">
                <a href="./ubica.php?pagina=<?php echo $x; ?>">
                <?php echo $x; ?></a>
                </td>
                <?php } ?>
                <!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
                <?php if ($pagina < $paginas) { ?>
            <td>
                <a href="./ubica.php?pagina=<?php echo $pagina + 1; ?>">
                <span aria-hidden="true">&raquo;</span></a>
                </td></tr>
            <?php } ?>
                </table>
            </div><!-- termina div normal -->
            </nav>
        </div> <!--termina col-x -->
<?php
$base_de_datos = null;
$sentencia = null;
$conteo = null;
$paginas = null;
$productos = null;
unset($producto); // rompe la referencia con el último elemento que está en el forech
?>
     </div><!-- termina class_row -->
   </div><!-- Termina container -->
 </div><!-- termina barra de trabajo -->
</div><!-- termina  barra del contenido-->

</body>
</html>