<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="./css/estilos-produccion.css">
	<link rel="stylesheet" href="./css/grid-produccion.css">
    <title>Producción</title>
</head>
<body>
    <div class="barra-principal">
     <div>Logo</div>
     <div> <a href="./nueva_orden.php"><img src="./imagen/new_orden2.png" alt="nuevo_doc" width="80%" height="80%"></a></div>
     <div>EN PRODUCCION</div>
     <div>POR ENTREGAR</div>
     <div>ATRASADAS</div>
     <div>SALIR</div>
     
    </div>
    <div class="barra-del-contenido">
     <div class="barra-lateral">
     <div>Ordenes por mes</div>
     <div>Papel pendiente de entregar</div>
     <div>Suajez pendientes</div>
     <div>Buscar orden de producción</div>
     </div>
     <div class="barra-de-trabajo">
      
     <div class="container">
    <div class="row">
    <?php

           # Incluimos la conexión
          include_once "./funciones/new_conexion.php";

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
       $sentencia = $base_de_datos->query("SELECT count(*) AS conteo FROM junta_semanal");
       $conteo = $sentencia->fetchObject()->conteo;
       # Para obtener las páginas dividimos el conteo entre los productos por página, y redondeamos hacia arriba
       $paginas = ceil($conteo / $productosPorPagina);

       # Ahora obtenemos los productos usando ya el OFFSET y el LIMIT
       $sentencia = $base_de_datos->prepare("SELECT * FROM junta_semanal LIMIT ? OFFSET ?");
       $sentencia->execute([$limit, $offset]);
       $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        # Y más abajo los dibujamos...
    ?>

    <div class="col-xs-12">
        <h1>Reporte de producción:</h1>
       
        <table>
            <thead>
            <tr>
            <th scope="coL">No:</th>
              <th scope="coL">Fecha:</th>
              <th scope="coL">Orden de producción:</th>
              <th scope="coL">Nombre del proyecto:</th>
              <th scope="coL">Nombre Alterno:</th>
              <th  scope="coL">Fecha de autorización:</th>
              <th  scope="coL">Fecha de solicitud:</th>
              <th scope="coL">Status:</th>        
              <th scope="coL">Fecha de solicitud de envio:</th>
              <th scope="coL">Editar</th>
			  <th scope="coL">Eliminar</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($productos as $producto) { ?>
                <tr>
                    <td><?php echo $producto->no ?></td>
                    <td><?php echo $producto->fecha?></td>
                    <td><?php echo $producto->orden_produc ?></td>
                    <td><?php echo $producto->nombre_proyecto ?></td>
                    <td><?php echo $producto->nombre_alterno ?></td>
                    <td><?php echo $producto->fecha_autoriza?></td>
                    <td><?php echo $producto->fecha_solicita ?></td>
                    <td><?php echo $producto->status ?></td>
                    <td><?php echo $producto->fecha_soli_envio?></td>
                    
                    <td><a  href="<?php echo "editar.php?id=" . $producto->no?>"> <img src="./imgmenu/logo_editar.png" alt="imagen editar" width="50" height="50" /><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $producto->no?>"> <img src="./imgmenu/eliminar.png" alt="imagen eliminar" width="50" height="50" /><i class="fa fa-trash"></i></a></td>
                    
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
            <ul class="pagination">
                   <!-- Si la página actual es mayor a uno, mostramos el botón para ir una página atrás -->
                   <?php if ($pagina > 1) { ?>
                    <li>
                        <a href="./junta_prod.php?pagina=<?php echo $pagina - 1 ?>">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php } ?>

              
                <div>
                   


                      <!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
                                 <?php for ($x = 1; $x <= $paginas; $x++) { ?>
                                 <ti class="<?php if ($x == $pagina) echo "active" ?>">
                                 <a href="./junta_prod.php?pagina=<?php echo $x ?>">
                                 <?php echo $x ?></a>
                             
               
                <?php } ?>
                <!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
                <?php if ($pagina < $paginas) { ?>
                    <li>
                        <a href="./junta_prod.php?pagina=<?php echo $pagina + 1 ?>">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            </div>
        </nav>
    </div>
    <?php
 
 ?>
		</div>
</div>






     </div>
    </div>
</body>
</html>