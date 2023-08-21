<?php
//Limpiamos consultas y base de datos
$base_de_datos = null;
$sql_ord = null;
$sql = null;
$orden = null;
$result = null;
$mostrar_op = null;
$identifica ='';
$pasa_elfo ='';
unset($producto); // rompe la referencia con el último elemento que está en el forech
//$identifica = $_REQUEST["id"]; se pasa el id y es el campo clave de la tabla orden_alt
 //echo "$identifica";
 //recuperamos los datos de la orden
 if(!isset($_REQUEST["folios"])) exit();

 $identifica = $_REQUEST["folios"];
 //echo "$identifica";
 //Conectamos a la base de datos
 //include_once ('./funciones/new_conexion.php');
 /*try {
  $base_de_datos = new PDO('mysql:host=localhost;dbname=' . 'multipresspublic_produccion', 'multipresspublic_multipresspublic', 'Marjoerie2020#');
  $base_de_datos->query("set names utf8;");
  $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
  $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (Exception $e) {
  echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
// Hacemos la consulta a la base de datos para editar solo el status
 $sentencia = $base_de_datos->prepare("SELECT * FROM orden_alt WHERE clave = ?;");
 $sentencia->execute([$identifica]);
 $producto = $sentencia->fetch(PDO::FETCH_OBJ);
 if($producto === FALSE){
   echo "¡No existe una orden  con esa clave !";
   exit();
 }*/
// desde aca agregamos conectando a la base de datos
$base_de_datos=mysqli_connect('localhost', 'multipresspublic_multipresspublic', 'Marjoerie2020#', 'multipresspublic_produccion');
/* verificar la conexión */
/* verificar la conexión */
if (mysqli_connect_errno()) {
  printf("Falló la conexión: %s\n", mysqli_connect_error());
  exit();
}

//printf("Conjunto de caracteres inicial: %s\n", mysqli_character_set_name($base_de_datos));

/* cambiar el conjunto de caracteres a utf8 */
if (!mysqli_set_charset($base_de_datos, "utf8")) {
 // printf("Error cargando el conjunto de caracteres utf8: %s\n", mysqli_error($base_de_datos));
  exit();
} else {
 // printf("Conjunto de caracteres actual: %s\n", mysqli_character_set_name($base_de_datos));
}

//Area de consultas
//primera consulta para sacar los impresores y datos de la orden
$sql_ord="SELECT * FROM orden_alt  WHERE folio_op = '$identifica'";
// Pasamos el folio de la orden a otra variable
$pasa_elfo = $identifica;
//segunda consulta mostramos los papeles de la pila
$sql="SELECT * FROM pila_papel  WHERE folio_ord = '$pasa_elfo'";
//pintamos los impresores y datos de la orden
//Pasamos al arreglo los datos para imprimir
$orden=mysqli_query($base_de_datos,$sql_ord);
//La otra consulta
$result=mysqli_query($base_de_datos,$sql);
//Pintamos los papeles capturados en pila
$mostrar_op=mysqli_fetch_array($orden);

$url = "https://multipresspublicidad.com.mx/imagenes_op/";
$url2 = "https://multipresspublicidad.com.mx/imagen/";

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
    <title>Ver detalle de Proyecto</title>
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
  
     <table  >
         <!--<form method="post" action="edita_orden.php">-->
        <tr>
        <td><img src="<?php echo $url2;?>qr.png" width="80" height="80" /></td>
        <td><img src="<?php echo $url2;?>paloma_papel.png" width="80" height="80" /></td>
          <td>ORDEN DE PRODUCCIÓN No.<?php echo $mostrar_op['folio_op']?></td>
          <td></td>
          <td><img src="<?php echo $url2;?>logo_principal.png" width="120" height="120" /></td>
          <td></td>
          
        </tr>
        <tr>
          
          <td  bgcolor="#ffb759">Nombre del Archivo:</td>
          <td colspan="5"><?php echo $mostrar_op['nombre_proy'];?></td>
          
        </tr>
        <tr>
          <td bgcolor="#ffb759">Cliente:</td>
          <td><?php echo $mostrar_op['cliente'];?></td>
          <td bgcolor="#ffb759">Proveedor:</td>
          <td><?php echo $mostrar_op['proveedor'];?></td>
          <td bgcolor="#ffb759">Impresora:</td>
          <td><?php echo $mostrar_op['impresoras'];?></td>
        </tr>
        <tr>
          <td bgcolor="#ffb759">Descripción de proceso:</td>
          <td><?php echo $mostrar_op['descrip_proce0_A'];?></td>
          <td><?php echo $mostrar_op['descrip_proce0_B'];?></td>
          <td><?php echo $mostrar_op['descrip_proce0_C'];?></td>
          <td><?php echo $mostrar_op['descrip_proce0_D'];?></td>
          <td></td>
        </tr>
        <tr>
          <td bgcolor="#ffb759">Cantidad de láminas a usar:</td>
          <td><?php echo $mostrar_op['cant_laminas'];?></td>
          <td bgcolor="#ffb759">Láminas en almacén:</td>
          <td><?php echo $mostrar_op['laminas_alm'];?></td>
          <td bgcolor="#ffb759">Tamaño:<?php echo $mostrar_op['tamano'];?></td>
          <td bgcolor="#ffb759">suaje en almacén:<?php echo $mostrar_op['suaje_alm'];?></td>
        </tr>
        <tr>
          <td bgcolor="#ffb759">Cliente:</td>
          <td><?php echo $mostrar_op['cliente1'];?></td>
          <td bgcolor="#ffb759">Proveedor:</td>
          <td><?php echo $mostrar_op['proveedor1'];?></td>
          <td bgcolor="#ffb759">Impresora:</td>
          <td><?php echo $mostrar_op['impresoras1'];?></td>
        </tr>
        <tr>
          <td bgcolor="#ffb759">Descripción de proceso:</td>
          <td><?php echo $mostrar_op['descrip_proce1_A'];?></td>
          <td><?php echo $mostrar_op['descrip_proce1_B'];?></td>
          <td><?php echo $mostrar_op['descrip_proce1_C'];?></td>
          <td><?php echo $mostrar_op['descrip_proce1_D'];?></td>
          <td></td>
        </tr>
        <tr>
          <td bgcolor="#ffb759">Cantidad de láminas a usar:</td>
          <td><?php echo $mostrar_op['cant_laminas1'];?></td>
          <td bgcolor="#ffb759">Láminas en almacén:</td>
          <td><?php echo $mostrar_op['laminas_alm1'];?></td>
          <td bgcolor="#ffb759">Tamaño:<?php echo $mostrar_op['tamano1'];?></td>
          <td bgcolor="#ffb759">suaje en almacén:<?php echo $mostrar_op['suaje_alm1'];?></td>
        </tr>
        <tr>
          <td bgcolor="#ffb759">Cliente:</td>
          <td><?php echo $mostrar_op['cliente2'];?></td>
          <td bgcolor="#ffb759">Proveedor:</td>
          <td><?php echo $mostrar_op['proveedor2'];?></td>
          <td bgcolor="#ffb759">Impresora:</td>
          <td bgcolor="#ffb759"><?php echo $mostrar_op['impresoras2'];?></td>
        </tr>
        <tr>
          <td bgcolor="#ffb759">Descripción de proceso:</td>
          <td><?php echo $mostrar_op['descrip_proce2_A'];?></td>
          <td><?php echo $mostrar_op['descrip_proce2_B'];?></td>
          <td><?php echo $mostrar_op['descrip_proce2_C'];?></td>
          <td><?php echo $mostrar_op['descrip_proce2_D'];?></td>
          <td></td>
        </tr>
        <tr>
          <td bgcolor="#ffb759">Cantidad de láminas a usar:</td>
          <td><?php echo $mostrar_op['cant_laminas2'];?></td>
          <td bgcolor="#ffb759">Láminas en almacén:</td>
          <td><?php echo $mostrar_op['laminas_alm2'];?></td>
          <td bgcolor="#ffb759">Tamaño:<?php echo $mostrar_op['tamano2'];?></td>
          <td bgcolor="#ffb759">Suaje en almacén:<?php echo $mostrar_op['suaje_alm2'];?></td>
        </tr>
        <tr>
          <td bgcolor="#ffb759">Cliente:</td>
          <td><?php echo $mostrar_op['cliente3'];?></td>
          <td bgcolor="#ffb759">Proveedor:</td>
          <td><?php echo $mostrar_op['proveedor3'];?></td>
          <td bgcolor="#ffb759">Impresora:</td>
          <td><?php echo $mostrar_op['impresoras3'];?></td>
        </tr>
        <tr>
          <td bgcolor="#ffb759">Descripción de proceso:</td>
          <td><?php echo $mostrar_op['descrip_proce3_A']?></td>
          <td><?php echo $mostrar_op['descrip_proce3_B']?></td>
          <td><?php echo $mostrar_op['descrip_proce3_C']?></td>
          <td><?php echo $mostrar_op['descrip_proce3_D']?></td>
          <td></td>
        </tr>
        <tr>
          <td bgcolor="#ffb759">Cantidad de láminas a usar:</td>
          <td><?php echo $mostrar_op['cant_laminas3'];?></td>
          <td bgcolor="#ffb759">Láminas en almacén:</td>
          <td><?php echo $mostrar_op['laminas_alm3'];?></td>
          <td bgcolor="#ffb759">Tamaño:<?php echo $mostrar_op['tamano3'];?></td>
          <td bgcolor="#ffb759">Suaje en almacén:<?php echo $mostrar_op['suaje_alm3'];?></td>
        </tr>
        <?php while($mostrar=mysqli_fetch_array($result)) {?>
                <tr><td bgcolor="#ffb759">Fecha de producción:</td>
                    <td><?php echo $mostrar['fe_pro'];?></td>
                    <td bgcolor="#ffb759">Fecha de entrega:</td>
                    <td><?php echo $mostrar['fe_entre'];?></td>
                    <td></td>
                    <td></td>
                </tr> 
                <tr>   
                    <td bgcolor="#ffb759">Papel extendido:</td>
                    <td><?php echo $mostrar['p_ext'];?></td>
                    <td bgcolor="#ffb759">Cantidad de papel enviado:</td>
                    <td><?php echo $mostrar['c_p_en'];?></td>
                    <td>Cantidad de impresos buenos:<?php echo $mostrar['c_im_bu'];?></td>
                    <td>Orden de compaginado:<?php echo $mostrar['ord_comp'];?></td>
                    
                </tr>
                <tr>
                    <td bgcolor="#ffb759">Papel cortado A:</td>
                    <td><?php echo $mostrar['p_cor_a'];?></td>
                    <td bgcolor="#ffb759">Cantidad de papel enviado:</td>
                    <td><?php echo $mostrar['c_p_en_c'];?></td>
                    <td>Cantidad de impresos buenos:<?php echo $mostrar['c_im_bu_c'];?></td>
                    <td>Orden de compaginado:<?php echo $mostrar['ord_comp_c'];?></td>
                   
                </tr>  
                <tr>  
                    <td bgcolor="#ffb759">Imágen de referencia:</td>
                    <td  colspan="5"><img src="<?php echo $url;?><?php echo $mostrar['img_refe'];?>" width="190" height="190" alt="Mi imagen" /></td>


                                                                     
                </tr>
            <?php } ?>
        <tr>
          <td bgcolor="#ffb759" colspan = "2">Prod. y cant. a entregar al cliente:</td>
          
          <td></td>
          <td bgcolor="#ffb759" colspan = "2">Prod. y cant. a entregar a lamacén:</td>
          <td></td>
          
        </tr>
        <tr>
        <td colspan = "2"><?php echo $mostrar_op['prod_cant_alm'];?></td>
        
        <td></td>
        <td colspan = "2"><?php echo $mostrar_op['prod_cant_alm'];?></td>
       
        <td></td>
        
        </tr>
            
        <tr>
          <td bgcolor="#ffb759">Descripción del producto terminado:</td>
          <td colspan="5" ><?php echo $mostrar_op['des_prod_ter']?></td>
          
        </tr>
        <tr>  
          <td><?php echo $mostrar_op['libre'];?></td>
          <td>Folio del:</td>
          <td><?php echo $mostrar_op['folio_ini'];?></td>
          <td>Al:</td>
          <td><?php echo $mostrar_op['folio_fin'];?></td>
          <td>Color:<?php echo $mostrar_op['color'];?></td>
          
        </tr>
        <tr>
          <td bgcolor="#ffb759" colspan ="3">Muestra o imagen del producto: </td>
          <td bgcolor="#ffb759">Entregar a almacen:  Chofer:</td>
          <td bgcolor="#ffb759" ></td>
          <td bgcolor="#ffb759" >Otro: </td>
          
        </tr>
        <tr>
          <td rowspan="12" colspan="3"><?php $url = "https://multipresspublicidad.com.mx/imagenes_op/";?><img src="<?php echo $url;?><?php echo $mostrar_op['mues_img_prod'];?>" width="190" height="190" alt="Mi imagen" /></td>
          <td bgcolor="#ffb759">Suaje</td>
          <td ></td>
          <td>______</td>
        </tr>
        <tr>
          <td bgcolor="#ffb759">Láminas:</td>
          <td></td>
          <td>______</td>          
       
        </tr>
        <tr>
          <td bgcolor="#ffb759">Papel:</td>
          <td></td>
          <td>______</td>          
       
        </tr>
        <tr>
          <td bgcolor="#ffb759">Prueba de color:</td>
          <td></td>
          <td>______</td>          
       
        </tr>
        <tr>
          <td bgcolor="#ffb759">Asignación:</td>
          <td></td>
          <td>______</td>          
       
        </tr>
        <tr>
          <td bgcolor="#ffb759">Firma de impresor:</td>
          <td></td>
          <td>______</td>          
       
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>          
       
        </tr>

        <tr>
          <td bgcolor="#ffb759">Recepción:</td>
          <td bgcolor="#ffb759" ></td>
          <td bgcolor="#ffb759">Nombre:</td>
        </tr>
        <tr>
          <td bgcolor="#ffb759">Suajes:</td>
          <td></td>
          <td></td>      
     
        </tr>
        <tr>
          <td bgcolor="#ffb759">Láminas:</td>
          <td></td>
          <td></td>      
     
        </tr>
        <tr>
          <td bgcolor="#ffb759">Sobrante:</td>
          <td></td>
          <td></td>      
     
        </tr>
        <tr>
          <td bgcolor="#ffb759">firma del almacen:</td>
          <td></td>
          <td></td>      
     
        </tr>
        <tr>
          <td bgcolor="#ffb759"colspan ="2">Empaque:</td>
          <td><?php echo $mostrar_op['empaque'];?></td>
          <td bgcolor="#ffb759"colspan ="2">Otro:</td>      
          <td><?php echo $mostrar_op['otro'];?></td>
     
        </tr>
        <tr>
          <td bgcolor="#ffb759" colspan ="2">Cantidad de paquetes:</td>
          <td><?php echo $mostrar_op['canti_empa'];?></td>
          <td bgcolor="#ffb759" colspan ="2">Cantidad por paquetes:</td>
          <td><?php echo $mostrar_op['cant_por_paq'];?></td>
        </tr>
        <tr>
          <td bgcolor="#ffb759" colspan ="6" align="center">Este documento no es una prueba de color y no puede utilizarse para comparaciones de color:</td>
        
        </tr>
        <tr>
          <td bgcolor="#FFEE1B" colspan ="6" align="center">Empacar como se indica arriba y aparte el sobrante / Favor de mandar el sobrante conla cantidad y una muestra pegada</td>
        
        </tr>
      </table>

    
    
                    
         
	
    

    <?php
    $base_de_datos = null;
    $sentencia = null;
    $conteo = null;
    $paginas = null;
    $productos = null;
    unset($mostrar_op); // rompe la referencia con el último elemento que está en el forech
    unset($mostrar); // rompe la referencia con el último elemento que está en el forech
    //mysqli_close($base_de_datos);
    ?>

    </body>
</html>