<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/estilos_login.css">
	<link rel="stylesheet" href="./css/grig_login.css">
    <title>ERP Multipress</title>
</head>
<body>
    <div class="caja-principal">
     <div class="cabecera">
        <p>ERP-OPERADORA VIVANCO-v1.0</p>
    </div>
    <div class="header">
		<!-- Aca puedo poner un titulo-->
        <p>ENTRAR AL ERP </p>
        
	</div>

	<div class="contenedor">
		<div class="marco-for-izquierdo"> </div>
		<div class="formulario">
            <form  method="post" action="./checar.php" name="signin-form">
                <div class="form-element">
                    <label>Nombre de usurio:</label>
                    <input type="text" name="username"  required />
                </div>
                <div class="form-element">
                    <label>Password:</label>
                    <input type="password" name="password" required />
                </div>
                <button type="submit" name="login" value="login">Entrar</button>
            </form>  
          
        </div>
		<div class="marco-for-derecho"> </div>
		
		
	</div>
    </div>
</body>
</html>
