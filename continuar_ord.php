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
        <form  method="post" action="guarda_papel_alm.php" class="cbp-mc-form">
        <label for="f_prod">Fecha de producción:</label>
        <input type="date" id="f_prod" size="30" name="f_prod" placeholder="12/01/23" required>
        </div> 
        <div>
        <label for="f_ent">Fecha de entrega:</label>
        <input type="date" id="f_ent" size="30" name="f_ent" placeholder="12/01/23" required>
        </div>    
           
		<div>
        <label for="p_e">Papel extendido:</label>
        <input type="tex" id="p_e" size="15" name="p_e" placeholder="15" required>
        </div>
		<div>
            <label for="c_pap_e">Cantidad de papel enviado:</label>
            <input type="tex" id="c_pap_e" size="10" name="c_pap_e" placeholder="1000" required>
        </div>
		<div>
            <label for="c_imp_b">Cantidad de impresos buenos:</label>
            <input type="tex" id="c_imp_b" size="10" name="c_imp_b" placeholder="11" required>
        </div>
        <div><label for="o_pag">Orden de compaginado:</label>
        <input type="tex" id="o_pag" size="10" name="o_pag" placeholder="1-2" required>
          
        </div>
        <div> 
        <label for="pap_cort">Papel cortado A:</label>
        <input type="text" id="pap_cort" size="15" name="pap_cort" placeholder="15.4" required>
        </div>
        <div>
        <label for="can_pap_e_co">Cantidad de papel enviado:</label> 
        <input type="txt" id="can_pap_e_co" size="10" name="can_pap_e_co" placeholder="10" required>
        </div>
        <div>
            <label for="c_im_bc">Cantidad de impresos buenos:</label> 
            <input type="txt" id="c_im_bc" size="10" name="c_im_bc" placeholder="123" required>
        </div>
        <div>
            <label for="o_pag_c">Orden de compaginado:</label> 
            <input type="txt" id="o_pag_c" size="10" name="o_pag_c" placeholder="1-2-3" required>
        </div>
        <div>
            <label for="imagen">Imagen de referencia:</label> 
            <input type="file" id="imagen" name="imagen"  required/>
        </div>
        <div>
       </div>
       <div>
       <input type="hidden" name="pasa_folio" value="<?php echo ($esta_foliado); ?>" /> 
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
    