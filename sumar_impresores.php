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
$mas_elfolio = $_REQUEST["este_folio"];
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
  
    
    
    <title>Producción</title>
</head>
<body>
<div class="barra-principal">
<div><img src="./imagen/logo_principal.png" alt="nuevo_doc" width="40" height="40"></div>
<div> <img src="./imagen/doc.png" alt="nuevo_doc" width="30" height="30">NUEVA ORDEN</div>
<div><img src="./imagen/fabrica.png" alt="nuevo_doc" width="30" height="30">EN PRODUCCION</div>
<div><img src="./imagen/paquete.png" alt="nuevo_doc" width="30" height="30">POR ENTREGAR</div>
<div><img src="./imagen/error.png" alt="nuevo_doc" width="30" height="30">ATRASADAS</div>
<div><a href="./ERP-OP-VIVANCO.php"><img src="./imagen/salida.png" alt="nuevo_doc" width="30" height="30">SALIR</a></div>
</div>
<div class="contenedor">
                
        <div>
        <?php echo ($mas_elfolio); ?>
        <form  method="post" action="guardar_impresor.php" class="cbp-mc-form">
        <label for="nom_cliente">Cliente:</label>
        <input type="text" id="nom_cliente" size="30" name="nom_cliente" placeholder="BEPENSA" required>
        
        
        </div>
		<div><label for="nom_prove">Proveedor:</label>
            <select id="nom_prove" name="nom_prove">
                <option>EXCEL IMPRESIONES</option>
                <option>BLATT SOLUCIONES</option>
                <option>DOFER IMPRENTA</option>
                <option>CAPLETON</option>
                <option>AGA PUBLICIDAD</option>
                <option>GRUPO GRAFICO</option>
                <option>ALL PRINT</option>
                <option>QUORUM</option>
                </select></div>
		<div><label for="nom_imprim">Impresora:</label>
            <select id="nom_imprim" name="nom_imprim">
            <option>OKI</option>
            <option>XEROX</option>
            <option>NINGUNA</option>
            </select></div>
		<div>
        <label for="proce1">Descripción del proceso 1:</label>
        <select id="proce1" name="proce1">
            <option>IMPRESION</option>
            <option>CORTE</option>
            <option>SUAJE</option>
            <option>LAMINADO</option>
            <option>BARNIZ UV MATE</option>
            <option>BARNIZ UV BRILLANTE</option>
            <option>LAMINADO MATE</option>
            <option>LAMINADO BTE</option>
            <option>PANTONE</option>
            <option>TINTAS ESPECIALES</option>
            <option>OTRO</option>
            <option>NINGUNO</option>
        </select></div>
		<div>
            <label for="proce2">Descripción del proceso 2:</label>
            <select id="proce2" name="proce2">
                <option>IMPRESION</option>
                <option>CORTE</option>
                <option>SUAJE</option>
                <option>LAMINADO</option>
                <option>BARNIZ UV MATE</option>
                <option>BARNIZ UV BRILLANTE</option>
                <option>LAMINADO MATE</option>
                <option>LAMINADO BTE</option>
                <option>PANTONE</option>
                <option>TINTAS ESPECIALES</option>
                <option>OTRO</option>
                <option>NINGUNO</option>
            </select>   
        </div>
		<div>
            <label for="proce3">Descripción del proceso 3:</label>
            <select id="proce3" name="proce3">
                <option>IMPRESION</option>
                <option>CORTE</option>
                <option>SUAJE</option>
                <option>LAMINADO</option>
                <option>BARNIZ UV MATE</option>
                <option>BARNIZ UV BRILLANTE</option>
                <option>LAMINADO MATE</option>
                <option>LAMINADO BTE</option>
                <option>PANTONE</option>
                <option>TINTAS ESPECIALES</option>
                <option>OTRO</option>
                <option>NINGUNO</option>
            </select>   
        </div>
        <div><label for="proce4">Descripción del proceso 4:</label>
            <select id="proce4" name="proce4">
                <option>IMPRESION</option>
                <option>CORTE</option>
                <option>SUAJE</option>
                <option>LAMINADO</option>
                <option>BARNIZ UV MATE</option>
                <option>BARNIZ UV BRILLANTE</option>
                <option>LAMINADO MATE</option>
                <option>LAMINADO BTE</option>
                <option>PANTONE</option>
                <option>TINTAS ESPECIALES</option>
                <option>OTRO</option>
                <option>NINGUNO</option>
            </select></div>
        <div> 
        <label for="can_lam1">Cantidad de laminas a usar:</label>
        <input type="text" id="can_lam1" size="10" name="can_lam1" placeholder="2" required>
        </div>
        <div>
        <label for="lam_alm1">Láminas en almacén:</label> 
        <select id="lam_alm1" name="lam_alm1">
            <option>SI</option>
            <option>NO</option>
        </select>  
        </div>
        <div>
            <label for="la_tamano">Tamaño:</label> 
            <input type="txt" id="la_tamano" size="20" name="la_tamano" placeholder="1024x123" required>
        </div>
        <div>
            <label for="tipo_suaje">Suaje en almacén:</label> 
            <select id="tipo_suaje" name="tipo_suaje">
                <option>SI</option>
                <option>NO</option>
            </select> 
        </div>
        <div class="cbp-mc-submit-wrap"> 
            <input type="hidden" name="pasa_folio" value="<?php echo ($mas_elfolio); ?>" /> 
            <input class="cbp-mc-submit" type="submit" value="continuar" />
            <input class="cbp-mc-submit" type="reset" value="Cancelar" />
            

        </div>
		</form>
	</div>
    </div>
    
</body>
</html>
    