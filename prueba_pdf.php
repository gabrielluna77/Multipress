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
//rompemos cualquier referencia
unset($producto); // rompe la referencia con el último elemento que está en el forech
 //recuperamos los datos de la orden
 if(!isset($_REQUEST["folios"])) exit();
 $identifica = $_REQUEST["folios"];
// para iniciar el pdf
ob_start();
/*//pasar las variables del formulario
if(!isset($_REQUEST["id"])) exit();
$identifica = $_REQUEST["id"];
$elfolio = $identifica;*/
//Conectamos a la base de datos
$base_de_datos=mysqli_connect('localhost', 'multipresspublic_multipresspublic', 'Marjoerie2020#', 'multipresspublic_produccion');

if (mysqli_connect_errno()) {
  printf("Falló la conexión: %s\n", mysqli_connect_error());
  exit();
}

/* cambiar el conjunto de caracteres a utf8 */
if (!mysqli_set_charset($base_de_datos, "utf8")) {
    // printf("Error cargando el conjunto de caracteres utf8: %s\n", mysqli_error($base_de_datos));
     exit();
   } else {
    // printf("Conjunto de caracteres actual: %s\n", mysqli_character_set_name($base_de_datos));
   }

//Hacemos las consultas pertinentes
//Area de consultas
//primera consulta para sacar los impresores y datos de la orden
$sql_ord="SELECT * FROM orden_alt  WHERE folio_op = '$identifica'";
// Pasamos el folio de la orden a otra variable
$pasa_elfo = $identifica;
//segunda consulta mostramos los papeles de la pila
$sql="SELECT * FROM pila_papel  WHERE folio_ord = '$pasa_elfo'";
//Pasamos la consulta a los arreglos
$orden=mysqli_query($base_de_datos,$sql_ord);
//La otra consulta
$result=mysqli_query($base_de_datos,$sql);
//Pintamos los papeles capturados en pila
$mostrar_op=mysqli_fetch_array($orden);
//variables para las direcciones de imagenes
$url = "https://multipresspublicidad.com.mx/imagenes_op/";
$url2 = "https://multipresspublicidad.com.mx/imagen/";
//pasamos el arreglo a una variable
// conectando con la base de datos:
//lo de aajo se editó para modificarlo a lo nuevo
/* $sentencia = $base_de_datos->prepare("SELECT OD.clave, OD.folio_op, OD.nombre_proy, OD.cliente, OD.proveedor, OD.impresoras, OD.fecha_prod, OD.fecha_entrega, OD.cant_laminas, OD.laminas, OD.tamano, OD.suaje, OD.descrip_imp, OD.des_prod_terminado, OD.mues_imagen_pro, OD.alm_suajes, OD.alm_lam, OD.alm_papel, OD.alm_prue_color, OD.alm_distribu, OD.etiqueta, OD.empaque, OD.otro, OD.canti_empa, OD.cant_por_paq, PP.folio_ord, PP.tipo_papel, PP.cant_p_bien, PP.cant_imp_b, orden_pag , PP.prod_cant_en_cli, PP.prod_cant_entre_alm FROM orden_alt OD INNER JOIN pila_papel PP ON OD.folio_op = PP.folio_ord  WHERE OD.clave = ?;");
$sentencia->execute([$identifica]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if($producto === FALSE){
  echo "¡No existe una orden  con esa clave !";
  exit();
}
$pasa_conf= $producto->folio_op;
$url2 = "https://multipresspublicidad.com.mx/imagen/";
?>*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>ERP Multipress</title>
</head>
<body>
  
     <table>
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
          
          <td  bgcolor="#ffe9ce">Nombre del Archivo:</td>
          <td colspan="5"><?php echo $mostrar_op['nombre_proy'];?></td>
          
        </tr>
        <tr>
          <td bgcolor="#ffe9ce">Cliente:</td>
          <td><?php echo $mostrar_op['cliente'];?></td>
          <td bgcolor="#ffe9ce">Proveedor:</td>
          <td><?php echo $mostrar_op['proveedor'];?></td>
          <td bgcolor="#ffe9ce">Impresora:</td>
          <td><?php echo $mostrar_op['impresoras'];?></td>
        </tr>
        <tr>
          <td bgcolor="#ffe9ce">Descripción de proceso:</td>
          <td><?php echo $mostrar_op['descrip_proce0_A'];?></td>
          <td><?php echo $mostrar_op['descrip_proce0_B'];?></td>
          <td><?php echo $mostrar_op['descrip_proce0_C'];?></td>
          <td><?php echo $mostrar_op['descrip_proce0_D'];?></td>
          <td></td>
        </tr>
        <tr>
          <td bgcolor="#ffe9ce">Cantidad de láminas a usar:</td>
          <td><?php echo $mostrar_op['cant_laminas'];?></td>
          <td bgcolor="#ffe9ce">Láminas en almacén:</td>
          <td><?php echo $mostrar_op['laminas_alm'];?></td>
          <td bgcolor="#ffe9ce">Tamaño:<?php echo $mostrar_op['tamano'];?></td>
          <td bgcolor="#ffe9ce">Láminas en almacén:<?php echo $mostrar_op['suaje_alm'];?></td>
        </tr>
        <tr>
          <td bgcolor="#ffe9ce">Cliente:</td>
          <td><?php echo $mostrar_op['cliente1'];?></td>
          <td bgcolor="#ffe9ce">Proveedor:</td>
          <td><?php echo $mostrar_op['proveedor1'];?></td>
          <td bgcolor="#ffe9ce">Impresora:</td>
          <td><?php echo $mostrar_op['impresoras1'];?></td>
        </tr>
        <tr>
          <td bgcolor="#ffe9ce">Descripción de proceso:</td>
          <td><?php echo $mostrar_op['descrip_proce1_A'];?></td>
          <td><?php echo $mostrar_op['descrip_proce1_B'];?></td>
          <td><?php echo $mostrar_op['descrip_proce1_C'];?></td>
          <td><?php echo $mostrar_op['descrip_proce1_D'];?></td>
          <td></td>
        </tr>
        <tr>
          <td bgcolor="#ffe9ce">Cantidad de láminas a usar:</td>
          <td><?php echo $mostrar_op['cant_laminas1'];?></td>
          <td bgcolor="#ffe9ce">Láminas en almacén:</td>
          <td><?php echo $mostrar_op['laminas_alm1'];?></td>
          <td bgcolor="#ffe9ce">Tamaño:<?php echo $mostrar_op['tamano1'];?></td>
          <td bgcolor="#ffe9ce">Láminas en almacén:<?php echo $mostrar_op['suaje_alm1'];?></td>
        </tr>
        <tr>
          <td bgcolor="#ffe9ce">Cliente:</td>
          <td><?php echo $mostrar_op['cliente2'];?></td>
          <td bgcolor="#ffe9ce">Proveedor:</td>
          <td><?php echo $mostrar_op['proveedor2'];?></td>
          <td bgcolor="#ffe9ce">Impresora:</td>
          <td bgcolor="#ffe9ce"><?php echo $mostrar_op['impresoras2'];?></td>
        </tr>
        <tr>
          <td bgcolor="#ffe9ce">Descripción de proceso:</td>
          <td><?php echo $mostrar_op['descrip_proce2_A'];?></td>
          <td><?php echo $mostrar_op['descrip_proce2_B'];?></td>
          <td><?php echo $mostrar_op['descrip_proce2_C'];?></td>
          <td><?php echo $mostrar_op['descrip_proce2_D'];?></td>
          <td></td>
        </tr>
        <tr>
          <td bgcolor="#ffe9ce">Cantidad de láminas a usar:</td>
          <td><?php echo $mostrar_op['cant_laminas2'];?></td>
          <td bgcolor="#ffe9ce">Láminas en almacén:</td>
          <td><?php echo $mostrar_op['laminas_alm2'];?></td>
          <td bgcolor="#ffe9ce">Tamaño:<?php echo $mostrar_op['tamano2'];?></td>
          <td bgcolor="#ffe9ce">Láminas en almacén:<?php echo $mostrar_op['suaje_alm2'];?></td>
        </tr>
        <tr>
          <td bgcolor="#ffe9ce">Cliente:</td>
          <td><?php echo $mostrar_op['cliente3'];?></td>
          <td bgcolor="#ffe9ce">Proveedor:</td>
          <td><?php echo $mostrar_op['proveedor3'];?></td>
          <td bgcolor="#ffe9ce">Impresora:</td>
          <td><?php echo $mostrar_op['impresoras3'];?></td>
        </tr>
        <tr>
          <td bgcolor="#ffe9ce">Descripción de proceso:</td>
          <td><?php echo $mostrar_op['descrip_proce3_A']?></td>
          <td><?php echo $mostrar_op['descrip_proce3_B']?></td>
          <td><?php echo $mostrar_op['descrip_proce3_C']?></td>
          <td><?php echo $mostrar_op['descrip_proce3_D']?></td>
          <td></td>
        </tr>
        <tr>
          <td bgcolor="#ffe9ce">Cantidad de láminas a usar:</td>
          <td><?php echo $mostrar_op['cant_laminas3'];?></td>
          <td bgcolor="#ffe9ce">Láminas en almacén:</td>
          <td><?php echo $mostrar_op['laminas_alm3'];?></td>
          <td bgcolor="#ffe9ce">Tamaño:<?php echo $mostrar_op['tamano3'];?></td>
          <td bgcolor="#ffe9ce">Láminas en almacén:<?php echo $mostrar_op['suaje_alm3'];?></td>
        </tr>
        <?php while($mostrar=mysqli_fetch_array($result)) {?>
                <tr><td bgcolor="#ffe9ce">Fecha de producción:</td>
                    <td><?php echo $mostrar['fe_pro'];?></td>
                    <td bgcolor="#ffe9ce">Fecha de entrega:</td>
                    <td><?php echo $mostrar['fe_entre'];?></td>
                    <td></td>
                    <td></td>
                </tr> 
                <tr>   
                    <td bgcolor="#ffe9ce">Papel extendido:</td>
                    <td><?php echo $mostrar['p_ext'];?></td>
                    <td bgcolor="#ffe9ce">Cantidad de papel enviado:</td>
                    <td><?php echo $mostrar['c_p_en'];?></td>
                    <td>Cantidad de impresos buenos:<?php echo $mostrar['c_im_bu'];?></td>
                    <td>Orden de compaginado:<?php echo $mostrar['ord_comp'];?></td>
                    
                </tr>
                <tr>
                    <td bgcolor="#ffe9ce">Papel cortado A:</td>
                    <td><?php echo $mostrar['p_cor_a'];?></td>
                    <td bgcolor="#ffe9ce">Cantidad de papel enviado:</td>
                    <td><?php echo $mostrar['c_p_en_c'];?></td>
                    <td>Cantidad de impresos buenos:<?php echo $mostrar['c_im_bu_c'];?></td>
                    <td>Orden de compaginado:<?php echo $mostrar['ord_comp_c'];?></td>
                   
                </tr>  
                <tr>  
                    <td bgcolor="#ffe9ce">Imágen de referencia:</td>
                    <td  colspan="5"><img src="<?php echo $url;?><?php echo $mostrar['img_refe'];?>" width="190" height="190" alt="Mi imagen" /></td>


                                                                     
                </tr>
            <?php } ?>
        <tr>
          <td bgcolor="#ffe9ce" colspan = "2">Prod. y cant. a entregar al cliente:</td>
          
          <td></td>
          <td bgcolor="#ffe9ce" colspan = "2">Prod. y cant. a entregar a lamacén:</td>
          <td></td>
          
        </tr>
        <tr>
        <td colspan = "2"><?php echo $mostrar_op['prod_cant_alm'];?></td>
        
        <td></td>
        <td colspan = "2"><?php echo $mostrar_op['prod_cant_alm'];?></td>
       
        <td></td>
        
        </tr>
            
        <tr>
          <td bgcolor="#ffe9ce">Descripción del producto terminado:</td>
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
          <td bgcolor="#ffe9ce" colspan ="3">Muestra o imagen del producto: </td>
          <td bgcolor="#ffe9ce">Entregar a almacen:  Chofer:</td>
          <td bgcolor="#ffe9ce" ></td>
          <td bgcolor="#ffe9ce" >Otro: </td>
          
        </tr>
        <tr>
          <td rowspan="12" colspan="3"><?php $url = "https://multipresspublicidad.com.mx/imagenes_op/";?><img src="<?php echo $url;?><?php echo $mostrar_op['mues_img_prod'];?>" width="190" height="190" alt="Mi imagen" /></td>
          <td bgcolor="#ffe9ce">Suaje</td>
          <td ></td>
          <td>______</td>
        </tr>
        <tr>
          <td bgcolor="#ffe9ce">Láminas:</td>
          <td></td>
          <td>______</td>          
       
        </tr>
        <tr>
          <td bgcolor="#ffe9ce">Papel:</td>
          <td></td>
          <td>______</td>          
       
        </tr>
        <tr>
          <td bgcolor="#ffe9ce">Prueba de color:</td>
          <td></td>
          <td>______</td>          
       
        </tr>
        <tr>
          <td bgcolor="#ffe9ce">Asignación:</td>
          <td></td>
          <td>______</td>          
       
        </tr>
        <tr>
          <td bgcolor="#ffe9ce">Firma de impresor:</td>
          <td></td>
          <td>______</td>          
       
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>          
       
        </tr>

        <tr>
          <td bgcolor="#ffe9ce">Recepción:</td>
          <td bgcolor="#ffe9ce" ></td>
          <td bgcolor="#ffe9ce">Nombre:</td>
        </tr>
        <tr>
          <td bgcolor="#ffe9ce">Suajes:</td>
          <td></td>
          <td></td>      
     
        </tr>
        <tr>
          <td bgcolor="#ffe9ce">Láminas:</td>
          <td></td>
          <td></td>      
     
        </tr>
        <tr>
          <td bgcolor="#ffe9ce">Sobrante:</td>
          <td></td>
          <td></td>      
     
        </tr>
        <tr>
          <td bgcolor="#ffe9ce">firma del almacen:</td>
          <td></td>
          <td></td>      
     
        </tr>
        <tr>
          <td bgcolor="#ffe9ce"colspan ="2">Empaque:</td>
          <td><?php echo $mostrar_op['empaque'];?></td>
          <td bgcolor="#ffe9ce"colspan ="2">Otro:</td>      
          <td><?php echo $mostrar_op['otro'];?></td>
     
        </tr>
        <tr>
          <td bgcolor="#ffe9ce" colspan ="2">Cantidad de paquetes:</td>
          <td><?php echo $mostrar_op['canti_empa'];?></td>
          <td bgcolor="#ffe9ce" colspan ="2">Cantidad por paquetes:</td>
          <td><?php echo $mostrar_op['cant_por_paq'];?></td>
        </tr>
        <tr>
          <td bgcolor="#ffb759" colspan ="6" align="center">Este documento no es una prueba de color y no puede utilizarse para comparaciones de color:</td>
        
        </tr>
        <tr>
          <td bgcolor="#FFEE1B" colspan ="6" align="center">Empacar como se indica arriba y aparte el sobrante / Favor de mandar el sobrante conla cantidad y una muestra pegada</td>
        
        </tr>
      </table>
</body>
</html>
<?php
$html=ob_get_clean();
//echo $html; Para la prueba del html pero abajo está en el loadHtml
require_once ('./libreria/autoload.inc.php');
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf ->setOptions($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('latter');
$dompdf->render();
$dompdf->stream("orden_produccion.pdf", array("Attachment" => false));
?>
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