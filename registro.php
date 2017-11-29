<!DOCTYPE html>
<?php
require_once("funciones.php");
require_once("soporte.php");
require_once("clases/validadorUsuario.php");
?>
<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://www.dafontfree.net/freefonts-futura-std-f61836.htm" rel="stylesheet">
		<link href="https://fonts.google.com/specimen/Roboto+Condensed" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/registro.css">
		<title>Registro || NALU</title>
	</head>
   <?php
    $repoUsuarios = $repo->getRepositorioUsuarios();
    if ($auth->estaLogueado()) {
        header("Location:home.php");exit;
    }
    $errores = [];
    $nombreDefault = "";
    $emailDefault = "";
    $userDefault = "";

    if (!empty($_POST))
    {
        $validador = new ValidadorUsuario();
        //Se envió información
        $errores = $validador->validar($_POST, $repo);

        if (empty($errores))
        {
            //No hay Errores

            //Primero: Lo registro
            $usuario = new Usuario(
                null,
                $_POST["nombre"],
                $_POST["email"],
                $_POST["user"],
                $_POST["password"]);
            $usuario->setPassword($_POST["password"]);
            $usuario->guardar($repoUsuarios);
            $usuario->setAvatar($_FILES["images"]);

            //Segundo: Lo envio al exito
            header("Location:home.php");exit;


        }

        if (!isset($errores["name"]))
        {
            $nombreDefault = $_POST["name"];
        }
        if (!isset($errores["email"]))
        {
            $emailDefault = $_POST["email"];
        }
		  if (!isset($errores["username"]))
        {
            $userDefault = $_POST["username"];
        }
    }
?>
		<header>
			<div class="logo">
	      <a href="index.php"><img src="imagenes/flor.png" alt=" "></a>
	    </div>
	  </header>

<?php include("errores.php"); ?>

  <div class="container">
		<h2>Registrate</h2>

		<div class="main">
			<form action="" method="post" enctype="multipart/form-data">
				<input type="text" name="nombre" value="" placeholder="Nombre" >
			<br>
				<input type="text" name="apellido" value="" placeholder="Apellido" >
			<br>
				<input type="text" name="user" value="" placeholder="Nombre de Usuario" >
			<br>

			<div>
				<input class="image" type="file" name="foto-perfil">
			</div>

			<br>
				<input type="email" name="email" value="" placeholder="Email">

			<br>
				<input type="password" name="password" value="" placeholder="Contraseña" >

			<br>
				<input type="password" name="pass-confirm" value="" placeholder="Confirmar Contraseña" >

			<br>
				<a href=""><input type='submit' name='Submit' value='Enviar'></a>
				<button type='reset' name='reset' value='Borrar'>Vaciar

			</form>

		</div>

	</div>

	<?php require_once ("footer.php"); ?>

	</body>
</html>
