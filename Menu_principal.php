<?php
session_start();
if(isset($_SESSION['usuario'])){
}
else{
    header("Location: ./acceso_negado.php?errorusuario=si");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/estilos_menu.css">
	<link rel="stylesheet" href="./css/grid.css">
    <title>ERP Multipress</title>
</head>
<body>
    <div class="caja-principal">
     <div class="cabecera">
        <p>ERP-OPERADORA VIVANCO-v1.0</p>
    </div>
    <div class="header">
		<p>Módulos del ERP</p>
	</div>

	<div class="contenedor">
		<div> <a title="Ordenes de producción" href="./produccion.php"><img  src="./imagen/menu_producción.jpg" alt="ordenes de producción"/></a></div>
		<div> <a title="Ordenes de producción" href="./new_orden.html"><img  src="./imagen/menu_almacen.jpg" alt="almacen"/></a></div>
		<div> <a title="Ordenes de producción" href="./new_orden.html"><img  src="./imagen/menu_compras.jpg" alt="ordenes de producción"/></a></div>
		<div> <a title="Ordenes de producción" href="./new_orden.html"><img  src="./imagen/menu_cuentas.jpg" alt="ordenes de producción"/></a></div>
		<div> <a title="Ordenes de producción" href="./new_orden.html"><img  src="./imagen/menu_logistica.jpg" alt="ordenes de producción"/></a></div>
		<div> <a title="Ordenes de producción" href="./new_orden.html"><img  src="./imagen/menu_ventas.jpg" alt="ordenes de producción"/></a></div>
		
	</div>
    </div>
    <?php
    //echo "Nombre de usuario recuperado de la variable de sesión:" . $_SESSION['usuario'];
    //echo "<br><br>";
    //echo "La clave recuperada de la variable de sesión:" . $_SESSION['clave'];
    ?>
</body>
</html>