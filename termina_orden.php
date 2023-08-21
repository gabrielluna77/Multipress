<?php
session_start();
if(isset($_SESSION['usuario'])){
}
else{
    header("Location: ./acceso_negado.php?errorusuario=si");
}
//termina auntentificacion de usuario
header("Content-Type: text/html;charset=utf-8");
 # definimos la carpeta destino
$ruta = "https://multipresspublicidad.com.mx/imagenes_op/";
$pasa_elfo ='';
$que_usu = $_SESSION['usuario'];
$pasa_usu = $que_usu;
//echo ($que_usu);
//echo ($pasa_usu);
//Pasamos valores
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
<title>Producción</title>
</head>
<body>
<div class="barra-principal">
<div><img src="./imagen/logo_principal.png" alt="nuevo_doc" width="40" height="40"></div>
<div> <a href="./nueva_orden.php"><img src="./imagen/doc.png" alt="nuevo_doc" width="30" height="30">NUEVA ORDEN</a></div>
<div><a href="./con_pro.php"><img src="./imagen/fabrica.png" alt="nuevo_doc" width="30" height="30">EN PRODUCCION</a></div>
<div><a href="./con_cami.php"><img src="./imagen/paquete.png" alt="nuevo_doc" width="30" height="30">POR ENTREGAR</a></div>
<div><a href="./con_fuera.php"><img src="./imagen/error.png" alt="nuevo_doc" width="30" height="30">ATRASADAS</a></div>
<div><a href="./ERP-OP-VIVANCO.php"><img src="./imagen/salida.png" alt="nuevo_doc" width="30" height="30">SALIR</a></div>
</div><!-- termina barra principal-->
<div class="barra-del-contenido">
<div class="barra-lateral">
<div>Ordenes por mes</div>
<div>Papel pendiente de entregar</div>
<div>Suajes pendientes</div>
<div>Buscar orden de producción</div>
</div>
<div class="barra-de-trabajo">
<div class="container">
<div class="row">
<?php
# Incluimos la conexión
//$contraseña = "Marjoerie2020#";
//$usuario = "multipresspublic_multipresspublic";
//$nombre_base_de_datos = "multipresspublic_produccion";
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
       # Necesitamos el conteo para saber cuántas páginas vamos a mostrar
       $sentencia = $base_de_datos->query("SELECT count(*) AS conteo FROM orden_alt");
       $conteo = $sentencia->fetchObject()->conteo;
       # Para obtener las páginas dividimos el conteo entre los productos por página, y redondeamos hacia arriba
       $paginas = ceil($conteo / $productosPorPagina);

       # Ahora obtenemos los productos usando ya el OFFSET y el LIMIT
       #$sentencia = $base_de_datos->prepare("SELECT clave, fecha_cre_op, folio_op, nombre_proy FROM orden_alt LIMIT ? OFFSET ?");
       $sentencia = $base_de_datos->prepare("SELECT * FROM orden_alt WHERE (nom_disenador = '$pasa_usu' ) ORDER BY fecha_cre_op DESC LIMIT ? OFFSET ? ");
       $sentencia->execute([$limit, $offset]);
       $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        # Y más abajo los dibujamos...
    ?>



<div class="col-xs-12">
             <h1>Reporte de producción:</h1>
            <table>
            <thead>
            <tr>_________________________________________________________</tr>
            <tr></tr>
            <tr>
              <th scope="coL">No:</th>
              <th scope="coL">Fecha:</th>
              <th scope="coL">FOLIO:</th>
              <th scope="coL">Proyecto:</th>
              
            </tr>
            </thead>
            <tbody>
            <?php foreach ($productos as $producto) { ?>
                <tr>
                    <td><?php echo $producto->clave?></td>
                    <td><?php echo $producto->fecha_cre_op?></td>
                    <td><?php echo $producto->folio_op?></td>
                    <td><?php echo $producto->nombre_proy?></td>
                    
                    <td><a  href="<?php echo "prueba_pdf.php?folios=".$producto->folio_op?>"> <img src="./imgmenu/lupa.png" alt="imagen editar" width="50" height="50" /><i class="fa fa-edit"></i></a></td>
					
                    
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <nav>
                    <div class="row">
                           <div class="col-xs-12 col-sm-6">

                           <p>Mostrando <?php echo $productosPorPagina ?> de <?php echo $conteo ?> ordenes disponibles</p>
                           </div>
                           <div class="col-xs-12 col-sm-6">
                              <p>Página <?php echo $pagina ?> de <?php echo $paginas ?> </p>
                           </div>
                    </div>
                    <table  class="pagination">
            <!-- Si la página actual es mayor a uno, mostramos el botón para ir una página atrás -->
           <?php if ($pagina > 1) { ?>
             <tr><td>
             <a href="./ter_la.php?pagina=<?php echo $pagina - 1 ;?>">
             <span aria-hidden="true">&laquo;</span></a>
            </td>
             <?php } ?>
             <div> <!-- inicia div normal -->
                <!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
                <?php for ($x = 1; $x <= $paginas; $x++) { ?>
                <td class="<?php if ($x == $pagina) echo "active"; ?>">
                <a href="./ter_la.php?pagina=<?php echo $x; ?>">
                <?php echo $x; ?></a>
                </td>
                <?php } ?>
                <!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
                <?php if ($pagina < $paginas) { ?>
            <td>
                <a href="./ter_la.php?pagina=<?php echo $pagina + 1; ?>">
                <span aria-hidden="true">&raquo;</span></a>
                </td></tr>
            <?php } ?>
                </table>
            </div>
        </nav>
    </div>
    <?php
 
 ?>
		</div>
</div>


     </div>
    </div>
<?php
$base_de_datos = null;
$sentencia = null;
$conteo = null;
$paginas = null;
$productos = null;
unset($producto); // rompe la referencia con el último elemento que está en el forech
?>
</body>
</html>