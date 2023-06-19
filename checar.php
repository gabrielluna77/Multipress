<?php
session_start(); 
$_SESSION['usuario'] = $_REQUEST['username'];
$_SESSION['clave'] = $_REQUEST['password'];

                   
                     // con es la variable que almacena la conexion a la base de datos
                    //$con =Conectar();
                    // cachamos los datos del formulario con un if
                    if ($_REQUEST["username"] == "") {
                     // print "<p>No ha escrito ningún nombre</p>";
                    } else {
                    //print "<p>Su nombre es: $_REQUEST[username]</p>\n";
                    //pasamos los datos por seguridad a cadenas con FILTER
                      $nombres= $_REQUEST["username"];
                      $cadena_usuario= filter_var($nombres, FILTER_SANITIZE_STRING);
                      //echo $cadena_usuario;
                    
                      }
                    if ($_REQUEST["password"] == "") {
                    //print "<p>No ha escrito ningún nombre</p>";
                    } else {
                     //print "<p>Su password es: $_REQUEST[password]</p>\n";
                     //pasamos los datos por seguridad a cadenas con FILTER
                     $contrasenas = $_REQUEST["password"];
                       $cadena_contrasena= filter_var($contrasenas, FILTER_SANITIZE_STRING);
                      // echo $cadena_contrasena;
                      
                      }

                      //Conexión
                     $mysqli = new mysqli("localhost", "multipresspublic_multipresspublic", "Marjoerie2020#", "multipresspublic_produccion");
                     $con = mysqli_connect("localhost","multipresspublic_multipresspublic","Marjoerie2020#") or die  ('Ha falla la conexión  '.mysqli_error());
                     mysqli_select_db($con,"multipresspublic_produccion") or die  ('No se pudo conectar a la base de datos '.mysqli_error());
                     //include_once('proceso_conexion.php');

                     // checamos si el usuario está registrado en la base de datos
                     //Sentencia SQL para buscar un usuario con esos datos
                    $ssql =mysqli_query ($con, "SELECT * FROM usuarios WHERE nombre='$cadena_usuario' and pass='$cadena_contrasena'");
                    //Ejecuto la sentencia
                    //$rs = mysqli_query($ssql,$con);
                    // si responde con 1 registros, sabemos que existe por lo menos
                    if (mysqli_num_rows($ssql)!=0){
                      //usuario y contraseña válidos
                      //Entoces guardamos si id en la session
                     // if(!isset($_SESSION)) 
                      //{ 
                             // session_start(); 
                      //}
                      //$usuario = $_SESSION['nombre'];
                      $query = "SELECT * FROM usuarios WHERE nombre='$cadena_usuario' and pass='$cadena_contrasena'";
                      $resultados_id = mysqli_query($con,$query);
                      $fila = mysqli_fetch_array($resultados_id);
                      $_SESSION['id'] = $fila;
                      //echo $fila['id'];
                      //$estado =session_register("autentificado");
                      $autentificado = "SI";
                      //header("Content-Type: text/html; charset=UTF-8");
                      // El header se pone para que restablecer el header, colores, tipo del html
                      header("Location: ./Menu_principal.php");
                      //echo "El usuario, si existe";
                  }else {
                      //si no existe le mando otra vez a la portada
                      //header("Content-Type: text/html; charset=UTF-8");
                      header("Location: ./ERP-OP-VIVANCO.php?errorusuario=si");
                      //echo "No existe el usuaio";
                  }

                    mysqli_close($con);
?>
         