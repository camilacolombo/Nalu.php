<?php
function validarInfo($param) {
  $errores = [];
  if (empty($datos["name"])) {

    $errores["name"] ="*Por favor ingrese un nombre";
  }
  if (empty($datos["username"])) {

    $errores["username"] = "*Por favor ingrese un usuario";
  }
  elseif (strlen($datos["username"]) < 5 ) {

    $errores["username"] = "*Usuario debe tener al menos 5 caracteres";
    }
  if (empty($datos["email"]) || empty($datos["email-confirm"])) {

    $errores["email"] = "*Por favor ingrese un email en ambos campos";
  }
  else {
    if ($datos["email"] != $datos["email-confirm"]) {
    $errores["email"] = "*El e-mail y su confirmacion no coinciden";
  }
}
  if (empty($datos["pass"])) {

    $errores["password"][0] = "*Por favor ingrese una contraseña";
    $errores["password"][1] = "*Usar al menos 8 chars para password";
    $errores["password"][2] = "*Su password debe contener una mayuscula y una miniscula";
  }
  elseif (strlen($datos["pass"])<8 ) {

    $errores["password"][0] = "*Usar al menos 8 chars para password";
    $errores["password"][1] = "*Su password debe contener una mayuscula y una miniscula";
  }
  if (preg_match('/a-zA-Z/',$datos["pass"]) && $datos["pass"] != $datos["pass-confirm"]) {
    $errores["password"][0] = "*Su password debe contener una mayuscula y una miniscula";
    $errores["password"][1] = "*Ambas contraseñas no coinciden";
  }
  elseif (preg_match('/a-zA-Z/',$datos["pass"])) {
      $errores["password"][0] = "*Su password debe contener una mayuscula y una miniscula";
    }
  elseif ($datos["pass"] != $datos["pass-confirm"]) {
      $errores["password"][0] = "*Ambas contraseñas no coinciden";
    }
  if($_FILES["foto-perfil"]["error"] != UPLOAD_ERR_OK) {
  $errores["foto-perfil"] = "*Por favor cargue una foto para su perfil";
}
  return $ArrayDeErrores;
}

function creaUsuario($param1){
  $data["nombre"]=$param1["nombre"];
  $data["apellido"]=$param1["apellido"];
  $data["user"]=$param1["user"];
  $data["email"]=$param1["email"];
  $data["pass"]=password_hash($param1["pass"], PASSWORD_DEFAULT);
  $dataJSON = json_encode($data);
  file_put_contents("usuarios.json", $dataJSON . PHP_EOL, FILE_APPEND);
}

function traerTodos() {
  $archivo = file_get_contents("usuarios.json");
  /* Por lo que entendi esto divive las string de json por End Of Line en un array*/
  $array = explode(PHP_EOL, $archivo);
  array_pop($array);

  $arrayFinal = [];
  foreach ($array as $usuario) {
    $arrayFinal["usuario"] = json_decode($usuario, true);
  }
  foreach ($array as $password) {
    $arrayFinal["password"] = json_decode($password,true);
  }
  return $arrayFinal;
}

function traerPorEmail($email) {
  $todos = traerTodos();

  foreach ($todos as $usuario) {
    if ($usuario["email"] == $email) {
      return $usuario;
    }
  }

  return NULL;

}
/*Esta funcion es la que establece el cookie asi se guarda el perfil. */
function recordarUsuario($email) {
  setcookie("usuarioLogueado", $email, time() + 60*60*24*7);
}

function validarLogin($informacion) {
  $arrayDeErrores = [];

  if (strlen($informacion["email"]) == 0) {
    $arrayDeErrores["email"] = "*Eu, ni pusiste mail";
  }
  else if(filter_var($informacion["email"], FILTER_VALIDATE_EMAIL) == false) {
    $arrayDeErrores["email"] = "*Pusiste un mail que no era valido";
  }
  else if (traerPorEmail($informacion["email"]) == NULL) {
    $arrayDeErrores["email"] = "*El usuario no existe";
  } else {
    //Validar la contraseña
    $usuario = traerPorEmail($informacion["email"]);
    if (password_verify($informacion["password"], $usuario["pass"]) == false) {
      $arrayDeErrores["password"] = "*La contraseña no verifica";
    }
  }

  return $arrayDeErrores;
}

function loginExitoso(/*????*/){
  /*esta funcion va a recibir los parametros y iniciar una session*/
}
function logout(){
}

?>
