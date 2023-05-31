<?php

SESSION_START();

ini_set('display_errors','Off'); 
$usuario=$_SESSION['uname'];
$id=$_SESSION['id'];
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  header('Location: ../index.php');
  exit;
}

/*switch ($id) {
  case '1':
    $estatus=1;
    break;

  default:
    $estatus=2;
    break;
}*/




$mysqli = new mysqli("localhost", "u435561149_H20", "H2O_1234_agua", "u435561149_H2O");

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}

$consulta = "SELECT `nombre`,`apaterno`,`amaterno`,`email`,`codigo_postal`,`Direccion` FROM `usuarios` WHERE id_usr='$id'";

if ($resultado = $mysqli->query($consulta)) {

    /* obtener el array de objetos */
    while ($fila = $resultado->fetch_row()) {
    //  printf ("%s (%s)\n", $fila[0], $fila[1]);

        $nombre=$fila[0];
         $Apaterno=$fila[1];
          $Amaterno=$fila[2];
           $email=$fila[3];
            $CP=$fila[4];
          $Direccion=$fila[5];




      //  echo $abono;
      //  echo $cargo;
    }

    /* liberar el conjunto de resultados */
    $resultado->close();
}



?>









<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Inicio</title>

   <link rel="stylesheet" href="assets/fontawesome-free/css/all.min.css">
   <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/bootstrap/css/styles.css">

   <style>



   #success_message{ display: none;}

   </style>
</head>

<body>
   <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-blue-dark fixed-top">
         <p class="navbar-brand mx-auto text-orange">Aqui va la ubicacion</p>
         <a class="nav-link text-white" href="#">
            <img style="width:30px; height: 30px;" src="assets/img/carrito.png">
         </a>
      </nav>
   </header>

   <main class="mt-5 overflow-auto p-3" style="margin-bottom: 4rem;">
 <div class="container">

    <form class="well form-horizontal" action=" " method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend><center><h2><b>Perfil</b></h2></center></legend><br>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Nombre</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="Nombre" placeholder="Nombre" class="form-control"  type="text" Value="<?php echo $nombre?>">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Apellido Paterno</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="APaterno" placeholder="Apellido Paterno" class="form-control"  type="text" Value="<?php echo $Apaterno?>">
    </div>
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" >Apellido Materno</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="Amaterno" placeholder="Apellido Materno" class="form-control"  type="text" Value="<?php echo $Amaterno?>">
    </div>
  </div>
</div>


  
<!-- Text input-->
      <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="E-Mail Address" class="form-control"  type="text" Value="<?php echo $email?>">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Password</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="user_password" placeholder="Password" class="form-control"  type="password">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Direccion</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="Dirección" placeholder="Direccion" class="form-control"  type="Text" Value="<?php echo $Direccion?>">
    </div>
  </div>
</div>

<!-- Text input-->
 

       
<div class="form-group">
  <label class="col-md-4 control-label">Codigo Postal</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="CP" placeholder="C.P." class="form-control" type="text" Value="<?php echo $CP?>">
    </div>
  </div>
</div>

<!-- Select Basic -->

<!-- Success message -->
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspACTUALIZAR <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div>
   </main>

   <footer>
      <nav class="navbar navbar-light bg-orange fixed-bottom">
         <ul class="nav mx-auto">
            <li class="nav-item">
               <a class="nav-link text-white" href="Home.php">
                  <img style="width:60px; height: 30px;" src="assets/img/icon-aguadoor.png">
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link text-white" href="Ventas.php">
                  <img style="width:30px; height: 30px;" src="assets/img/garrafon.png">
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link text-white" href="perfil.php">
                  <img style="width:30px; height: 30px;" src="assets/img/perfil.png">

               </a>
            </li>
         </ul>
      </nav>
   </footer>


</body>
<script src="assets/bootstrap/js/jquery-3.5.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstrap/js/popper.min.js"></script>
<script src="js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>