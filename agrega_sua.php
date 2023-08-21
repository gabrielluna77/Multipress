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
	<link rel="stylesheet" href="./css/estilos_post_orden_new.css">
    <link rel="stylesheet" href="./css/estilos_form_tres.css">
	<link rel="stylesheet" href="./css/grid_y.css">
  
    
    
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
<div class="contenedor">
        <div>
        <form  method="post" action="guarda_sua.php" class="cbp-mc-form">
        <label for="o">Orden de suaje:</label>
        
        </div>
        <div><input type="text" id="o" size="10"    name="o" placeholder="M234" required></div>
        <div></div>
        <div>
        <label for="u">Ubicación:</label>
        </div>
		<div>
        <input type="text" id="u" size="50" name="u" placeholder="TARIMA" required>
        </div>
		<div>
        
        </div>
		<div>
        <label for="d">Descripción:</label>
         
        </div>
		<div>
        <input type="text" id="d" size="60" name="d" placeholder="PIN COOLER CCSA" required>
        </div>
        <div>
        
       
        </div>
        <div>
        <label for="m">Movimiento de suaje:</label>
      
           </div>
        <div> 
        <input type="text" id="m" size="15" name="m" placeholder="ALMACEN" required>
        </div>
        <div>
        </div>
        <div>
        <label for="im">Impresor:</label>
        </div>
        <div>
        <input type="text" id="im" size="20" name="im" placeholder="OTHON" required> 
        </div>
        <div></div>
        <div>
        <label for="op">OP Utilizada:</label>
        </div>
        <div>
        <input type="text" id="op" size="40" name="op" placeholder="O2132" required> 
        </div>
        <div></div>
         <div><label for="fe">Fecha envio:</label></div>
        <div>
        <input type="date" id="fe"  name="fe" placeholder="13/07/23" required>
        </div>
        <div></div>
        <div>
        <label for="et">Estado:</label> 
        </div>
        <div>
        <input type="text" id="et" size="40" name="et" placeholder="N/A" required> 
        </div>
        <div class="cbp-mc-submit-wrap"> 
            <input class="cbp-mc-submit" type="submit" value="continuar" />
            <input class="cbp-mc-submit" type="reset" value="Cancelar" />

        </div>
		</form>
	</div>
    </div>
    
</body>
</html>
    