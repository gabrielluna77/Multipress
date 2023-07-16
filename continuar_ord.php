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
	<link rel="stylesheet" href="./css/grid_y_2.css">
  
    
    
    <title>Producción</title>
</head>
<body>
<div class="barra-principal">
<div><img src="./imagen/logo_principal.png" alt="nuevo_doc" width="40" height="40"></div>
<div> <a href="./nueva_orden.php"><img src="./imagen/doc.png" alt="nuevo_doc" width="30" height="30">NUEVA ORDEN</a></div>
<div><a href="./nueva_orden.php"><img src="./imagen/fabrica.png" alt="nuevo_doc" width="30" height="30">EN PRODUCCION</a></div>
<div><a href="./nueva_orden.php"><img src="./imagen/paquete.png" alt="nuevo_doc" width="30" height="30">POR ENTREGAR</a></div>
<div><a href="./nueva_orden.php"><img src="./imagen/error.png" alt="nuevo_doc" width="30" height="30">ATRASADAS</a></div>
<div><a href="./ERP-OP-VIVANCO.php"><img src="./imagen/salida.png" alt="nuevo_doc" width="30" height="30">SALIR</a></div>
</div>
<div class="contenedor">
        
        
        <div>
        <label for="nom_cliente">Fecha de producción:</label>
        <input type="date" id="nom_cliente" size="30" name="nom_cliente" placeholder="12/01/23" required>
        
        
        </div>
		<div><label for="nom_prove">Fecha de entrega:</label>
        <input type="date" id="nom_cliente" size="30" name="nom_cliente" placeholder="12/01/23" required>
        </div>
        <div>
        </div> 
        <div>
        </div>    
           
		<div>
        <label for="proce1">Papel extendido:</label>
        <input type="tex" id="nom_cliente" size="10" name="nom_cliente" placeholder="12" required>
        </div>
		<div>
            <label for="proce2">Cantidad de papel enviado:</label>
            <input type="tex" id="nom_cliente" size="10" name="nom_cliente" placeholder="12" required>
        </div>
		<div>
            <label for="proce3">Cantidad de impresos buenos:</label>
            <input type="tex" id="nom_cliente" size="10" name="nom_cliente" placeholder="12" required>
        </div>
        <div><label for="proce4">Orden de compaginado:</label>
        <input type="tex" id="nom_cliente" size="10" name="nom_cliente" placeholder="12" required>
          
        </div>
        <div> 
        <label for="can_lam1">Papel cortado A:</label>
        <input type="text" id="can_lam1" size="10" name="can_lam1" placeholder="2" required>
        </div>
        <div>
        <label for="lam_alm1">Cantidad de papel enviado:</label> 
        <select id="lam_alm1" name="lam_alm1">
            <option>SI</option>
            <option>NO</option>
        </select>  
        </div>
        <div>
            <label for="la_tamano">Cantidad de impresos buenos:</label> 
            <input type="txt" id="la_tamano" size="20" name="la_tamano" placeholder="1024x123" required>
        </div>
        <div>
            <label for="tipo_suaje">Orden de compaginado:</label> 
            <input type="txt" id="la_tamano" size="20" name="la_tamano" placeholder="1024x123" required>
        </div>
        <div>
            <label for="tipo_suaje">Imagen de referencia:</label> 
            <input type="txt" id="la_tamano" size="20" name="la_tamano" placeholder="1024x123" required>
        </div>
        <div>
       </div>
       <div>
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
    