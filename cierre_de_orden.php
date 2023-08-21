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
//limpiamos las varibleas
$produc_cli ='';
$p_clie ='';
$produc_alm ='';
$p_alma ='';
$esta_foliado ='';
$esta_foliado = $_REQUEST["cierre_folio"];
//para que se guarden los acentos y las ñ
header("Content-Type: text/html;charset=utf-8");
//conectando a la base de datos
$conec = mysqli_connect('localhost', 'multipresspublic_multipresspublic', 'Marjoerie2020#', 'multipresspublic_produccion');
if (mysqli_connect_errno()){
    printf("HAY PROBLEMAS CON LA BD, LLAMAR AL PROGRAMADOR PARA SU REPARACION TEL: 2215154099: %s\n", mysqli_connect_error());
    exit();
}

//para checar el conjunto de caracteres utf8
if (!mysqli_set_charset($conec, "utf8")) {
    //printf("Error cargando el conjunto de caracteres utf8: %s\n", mysqli_error($con));
    exit();
} else {
    //printf("Conjunto de caracteres actual: %s\n", mysqli_character_set_name($con));
}
//pasamos lo mandado de formulario a variables
$p_clie = $_REQUEST["c_p_c"];
$produc_cli = html_entity_decode($p_clie, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p> Su $_REQUEST[nom_prove]";
$p_alma = $_REQUEST["c_p_c"];
$produc_alm = html_entity_decode($p_alma, ENT_QUOTES | ENT_HTML401, "UTF-8");
//print "<p> Su $_REQUEST[nom_prove]";
//hacemos el update
$consul = "UPDATE orden_alt SET prod_cant_cli = '$produc_cli', prod_cant_alm = '$produc_alm' WHERE folio_op ='$esta_foliado'";
if(mysqli_query($conec, $consul)){
    //echo "Registro actualizado.";
} else {
    echo "ERROR: No se ejecuto $consul. " . mysqli_error($conec);
}
$consul = null;

//limpiamos la consulta
mysqli_close($conec);


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
	<link rel="stylesheet" href="./css/grid_cierre_op.css">
  
    
    
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
<div>  <H1>TERMINAR LA ORDEN:<?php echo($esta_foliado); ?></H1></div>
<div class="contenedor">
    
        <div>
        <form  method="d_p_t" action="guarda_cierre_orden.php" class="cbp-mc-form">
        <label for="des_pro">Descripción de producto terminado:</label>
        
        </div>
        <div><!--<input type="text" id="nom_proy" size="50"    name="nom_proy" placeholder="OP 02075 GRADUACION" required>-->
        <textarea name="d_p_t" rows="14" cols="40">Colocar todos los productos que lleva la orden</textarea>
        </div>
        <div></div>
        <div>
        <label for="f_d">Folio del:</label>
        <input type="text" id="f_d" size="30" name="f_d" placeholder="001" required>
        </div>
		<div><label for="a_l">Al:</label>
        <input type="text" id="a_l" size="30" name="a_l" placeholder="0034" required>
        </div>
		<div><label for="color">Color:</label>
        <input type="text" id="color" size="30" name="color" placeholder="verde" required>
        </div>
		<div>
        <label for="dise">Muestra o imagen del producto:</label>
       </div>
		<div>
        <input type="file" id="dise" name="dise"  required/>
        </div>
		<div>
        <label for="emp">Empaque:</label>
        <select id="emp" name="emp">
                <option>MULTIPRESS</option>
                <option>KRAFT</option>
                <option>STRETCH</option>
                <option>OTRO</option>
        </select>  
        </div>
        <div>
        <label for="oto">Otro:</label>
        <input type="text" id="oto" size="30" name="oto" placeholder="Almacén" required>
       
        </div>
        <div> 
        <label for="paque">Cantidad de paquetes:</label>
        <input type="text" id="paque" size="10" name="paque" placeholder="155" required>
        </div>
        <div>
        <label for="por_p">Cantidad por paquete:</label>
        <input type="text" id="por_p" size="10" name="por_p" placeholder="11" required>
        </div>
        <div>
          
        </div>
        <div>
        <input type="hidden" name="c_folio" value="<?php echo ($esta_foliado); ?>" /> 
        <input class="cbp-mc-submit" type="submit" value="continuar" />
        </div>
        <div class="cbp-mc-submit-wrap"> 
            
            <input class="cbp-mc-submit" type="reset" value="Cancelar" />

        </div>
		</form>
</div>
    
    
</body>
</html>
    