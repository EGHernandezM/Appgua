<?php
 $usuario = $_POST['username'];
 $contra = $_POST['password'];
 $login = $_POST['login'];

 if (!empty($_POST)) {
    # Las claves de acceso, ahorita las ponemos aquí
    # y en otro ejercicio las ponemos en una base de datos
    $usuario = $_POST['username'];
    $contra = $_POST['password'];
    $mysqli = new mysqli("localhost", "u435561149_H20", "H2O_1234_agua", "u435561149_H2O");

    /* comprobar la conexión */
    if (mysqli_connect_errno()) {
       printf("Falló la conexión: %s\n", mysqli_connect_error());
       exit();
    }

    $consulta = "SELECT id_usr,nombre,apaterno,usuario,contra,perfil,tipo_cuenta FROM usuarios WHERE usuario='$usuario' and contra='$contra' and activo=1";

    if ($resultado = $mysqli->query($consulta)) {


       while ($fila = $resultado->fetch_row()) {

          $id_usr = $fila[0];
          $nombre = $fila[1];
          $apellido = $fila[2];
          $usuario_correcto = $fila[3];
          $palabra_secreta_correcta = $fila[4];
          $perfil = $fila[5];

          $tipo_cuenta = $fila[6];
       }

       $resultado->close();
    }

    /*
 Para leer los datos que fueron enviados al formulario,
 accedemos al arreglo superglobal llamado $_POST en PHP, y
 para obtener un valor accedemos a $_POST["clave"] en donde
 clave es el "name" que le dimos al input
  */
    # Nota: no estamos haciendo validaciones

    # Luego de haber obtenido los valores, ya podemos comprobar:
    if ($usuario === $usuario_correcto && $contra === $palabra_secreta_correcta) {
       # Significa que coinciden, así que vamos a guardar algo
       # en el arreglo superglobal $_SESSION, ya que ese arreglo
       # "persiste" a través de todas las páginas
       # Iniciar sesión para poder usar el arreglo
       session_start();
       # Y guardar un valor que nos pueda decir si el usuario
       # ya ha iniciado sesión o no. En este caso es el nombre
       # de usuario

       $_SESSION['uname'] = $usuario;
       $_SESSION['id'] = $id_usr;
       $_SESSION['fpago'] = $tipo_cuenta;
       $_SESSION['apellido'] = $apellido;
       $_SESSION['pin'] = $PIN;
       $_SESSION['perfil'] = $perfil;
       $_SESSION['loggedin'] = 'logeado';

       switch ($id_usr) {
          case '59':
             header("Location:dashboard-ventas/index.php");
             break;

          case '67':
             header("Location:dashboard-tortillas/index.php");
             break;
          case '66':
             header("Location:home.php");
             break;
          case '73':
             header("Location:home.php");
             break;

          default:
             header("Location:home.php");
             break;
       }
       # Luego redireccionamos a la página "Secreta"
    } else {
       # No coinciden, así que simplemente imprimimos un
       # mensaje diciendo que es incorrecto
       echo "El usuario o la contraseña son incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Iniciar sesion</title>

   <!--Import Google Icon Font-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link rel="stylesheet" href="css/materialize.min.css">
   <link rel="stylesheet" href="css/login.css">
</head>

<body>
   <div class="login valign-wrapper">
      <div class="row">
         <div class="col s12 center">
            <form class="col s12" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
               <div class="row">
                  <div class="input-field col s12">
                     <i class="material-icons prefix white-text">account_circle</i>
                     <input id="usuario" type="text" name="username" class="validate white-text">
                     <label for="usuario" class="white-text">Usuario</label>
                  </div>
               </div>
               <div class="row">
                  <div class="input-field col s12">
                     <i class="material-icons prefix white-text">lock</i>
                     <input id="clave" type="password" name="password" class="validate white-text">
                     <label for="clave" class="white-text">Contraseña</label>                     
                  </div>
                  <span class="helper-text" data-error="wrong" data-success="left" style="margin-bottom: 15rem">
                     <a class="white-text" href="#">Registrate</a>
                  </span>
               </div>
               
               <div class="row">
                  <button class="btn waves-effect waves-light" type="submit" name="action">Ingresar
                     <i class="material-icons right">login</i>
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>

   <script src="js/materialize.min.js"></script>
</body>

</html>