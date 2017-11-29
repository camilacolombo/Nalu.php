<?php
    require_once("funciones.php");
    /*if (estaLogueado()) {
                header("Location:home.php");
            }
    */
$arrayDeErrores = [];
if ($_POST) {

  //Validar
  $arrayDeErrores = validarLogin($_POST);

  //Si es valido, loguear
  if (count($arrayDeErrores) == 0) {
    loguear($_POST["email"]);
    if (isset($_POST["recordame"])) {
      recordarUsuario($_POST["email"]);
    }
    header("Location:homeOX.php");exit;
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Iniciar Sesión || NALU</title>
        <link href="http://meyerweb.com/eric/tools/css/reset/reset.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
    <link href="https://www.dafontfree.net/freefonts-futura-std-f61836.htm" rel="stylesheet">
    <link href="https://fonts.google.com/specimen/Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
  </head>
  <body>
  <header>
    <div class="logo">
      <a href="index.php"><img src="imagenes/flor.png" alt=" "></a>
    </div>
  </header>

  <div class="iniciar">
    <h2>Iniciar Sesión</h2>
      <?php if (count($arrayDeErrores) > 0) : ?>
        <ul style="color:red">

          <?php foreach($arrayDeErrores as $error) : ?>
            <li><?=$error?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <form action="" method="post">
        <div class="email">
          <input type="text" name="email" value="" placeholder="Email">
        </div>

        <div class="password">
          <input type="password" value="" name="password" placeholder="Contraseña">
        </div>

        <div class="recordarme">
          Recordarme <input type="checkbox" name="recordame" value="recordame">
        </div>
        <div class="boton">
          <button class="entrar" type="submit">Entrar</button>
        </div>

        <div class="olvido">
          <a href="#">¿Has olvidado tu contraseña?</a>
        </div>
      </form>

  </div>

    <?php require_once ("footer.php"); ?>

  <!-- <main>
    <marquee class="marquee" behavior="scroll" direction="left">“Man cannot discover new oceans unless he has the courage to lose sight of the shore.” // “The sea! the sea! the open sea!, The blue, the fresh, the ever free!” // “To me, the sea is like a person–like a child that I’ve known a long time. It sounds crazy, I know, but when I swim in the sea I talk to it. I never feel alone when I’m out there.” // “The ocean stirs the heart, inspires the imagination and brings eternal joy to the soul.” // “No love is Like an ocean with the dizzy procession of the waves’ boundaries …” // “The sea lives in every one of us …” // “Your heart is like the ocean, mysterious and dark.”</marquee>
  </main> -->

  </body>
</html>
