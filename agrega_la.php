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
        <form  method="post" action="guarda_la.php" class="cbp-mc-form">
        <label for="p">Producto:</label>
        
        </div>
        <div><input type="text" id="p" size="50"    name="p" placeholder="Pegamento" required></div>
        <div></div>
        <div>
        <label for="inv">En inventario:</label>
      
        
        
        </div>
		<div>
        <input type="text" id="inv" size="10" name="inv" placeholder="72" required>
        </div>
		<div>
        
        </div>
		<div>
        <label for="not">Nota:</label>
         
        </div>
		<div>
        <input type="text" id="not" size="30" name="not" placeholder="En producción" required>
        </div>
        <div>
        
       
        </div>
        <div>
        <label for="ubi">Ubicación:</label>
      
           </div>
        <div> 
        <input type="text" id="ubi" size="20" name="ubi" placeholder="R23" required>
        </div>
        <div>
        </div>
        <div>
        <label for="sal">Salida:</label>
        </div>
        <div>
        <input type="text" id="sal" size="40" name="sal" placeholder="Para la orden M23" required> 
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
    