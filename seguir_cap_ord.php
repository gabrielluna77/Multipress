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
$esta_foliado ='';
$esta_foliado = $_REQUEST["este_folio"];
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
	<link rel="stylesheet" href="./css/grid_y_2.css">
  
    
    
    <title>Producción</title>
</head>
<body>
<div class="barra-principal">
<div><img src="./imagen/logo_principal.png" alt="nuevo_doc" width="40" height="40"></div>
<div><img src="./imagen/doc.png" alt="nuevo_doc" width="30" height="30">NUEVA ORDEN</div>
<div><img src="./imagen/fabrica.png" alt="nuevo_doc" width="30" height="30">EN PRODUCCION</div>
<div><img src="./imagen/paquete.png" alt="nuevo_doc" width="30" height="30">POR ENTREGAR</div>
<div><img src="./imagen/error.png" alt="nuevo_doc" width="30" height="30">ATRASADAS</div>
<div><a href="./ERP-OP-VIVANCO.php"><img src="./imagen/salida.png" alt="nuevo_doc" width="30" height="30">SALIR</a></div>
</div>     
<div class="contenedor">
        
        
        <div>
        CONTINUAR CON LA ORDEN:
        </div>
		<div>
        <?php echo ($esta_foliado); ?>
        </div>
        <div>
           
        </div>
        <div></div> 
        <div></div>   
        <div>
        <form  method="post" action="cierre_de_orden.php" class="cbp-mc-form">
        <label for="c_p_c">Producto y cantidad a entregar al cliente:</label>
        </div>
        <div>
        <input type="text" id="c_p_c" size="30" name="c_p_c" placeholder="128 portavasos" required>
        </div>
        <div>
        </div> 
        <div></div>    
        <div>
        <label for="c_p_a">Producto y cantidad a almacen:</label>
        </div>
        <div>
        <input type="text" id="c_p_a" size="30" name="c_p_a" placeholder="12 tapas " required>
        </div>    
        <div>     
       </div>
       <div></div>
       <div>
       <input type="hidden" name="cierre_folio" value="<?php echo ($esta_foliado); ?>" /> 
            <input class="cbp-mc-submit" type="submit" value="continuar" />
       </div>
       
        <div class="cbp-mc-submit-wrap"> 
       
            <input class="cbp-mc-submit" type="reset" value="Cancelar" />

        </div>
		</form>
	</div>
    </div>
    
</body>
</html>
    