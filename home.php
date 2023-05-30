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




?>









<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Inicio</title>

   <link rel="stylesheet" href="assets/fontawesome-free/css/all.min.css">
   <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/bootstrap/css/styles.css">
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
           <img style="width:330px; height: 290px;" src="assets\img\Ilustra_aguador1.png">
       </div>
       <div class="card mb-3 shadow rounded-lg border-0" style="max-width: 540px;" onclick="ModalVenta('Ciel')">
           <div class="row no-gutters">
               <div class="col-md-8">
                   <div class="card-body">
                       <div class="row">
                           <div class="col-6 space-p">
                               <h5 class="card-title">Ciel</h5><br>
                               <p class="card-text">20 Litros</p><br>

                           </div>
                           <div class="col-6 d-flex justify-content-end">
                               <img style="width:80px; height: 100px;" class="img-fluid" src="assets/img/ciel.png">
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div class="card mb-3 shadow rounded-lg border-0" style="max-width: 540px;" onclick="ModalVenta('Bonafon')">
           <div class="row no-gutters">
               <div class="col-md-8">
                   <div class="card-body">
                       <div class="row">
                           <div class="col-6 space-p">
                               <h5 class="card-title">Bonafon</h5><br>
                               <p class="card-text">20 Litros</p><br>

                           </div>
                           <div class="col-6 d-flex justify-content-end">
                               <img style="width:60px; height: 100px;" src="assets/img/bonafon.png">
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>


       <div class="card mb-3 shadow rounded-lg border-0" style="max-width: 540px;" onclick="ModalVenta('Agua Inmaculada')">
           <div class="row no-gutters">
               <div class="col-md-8">
                   <div class="card-body">
                       <div class="row">
                           <div class="col-6 space-p">
                               <h5 class="card-title">Agua Inmaculada</h5><br>
                               <p class="card-text">20 Litros</p><br>

                           </div>
                           <div class="col-6 d-flex justify-content-end">
                               <img style="width:70px; height: 100px;" src="assets/img/aguainmaculada.png">
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>



       <div class="card mb-3 shadow rounded-lg border-0" style="max-width: 540px;" onclick="ModalVenta('AguaDoor')">
           <div class="row no-gutters">
               <div class="col-md-8">
                   <div class="card-body">
                       <div class="row">
                           <div class="col-6 space-p">
                               <h5 class="card-title">AguaDoor</h5><br>
                               <p class="card-text">20 Litros</p><br>

                           </div>
                           <div class="col-6 d-flex justify-content-end">
                               <img style="width: 100px; height:80px; border-radius: 150px; " src="assets\img\Icon_Inicio_Home.BMP">
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>













       <div class="card shadow rounded-lg border-0" style="max-width: 540px;" onclick="ModalVenta('Epura')">
           <div class="row no-gutters">
               <div class="col-md-8">
                   <div class="card-body">
                       <div class="row">
                           <div class="col-6 space-p">
                               <h5 class="card-title">E Pura</h5><br>
                               <p class="card-text">20 Litros</p><br>

                           </div>
                           <div class="col-6 d-flex justify-content-end">
                               <img style="width:70px; height: 110px;" src="assets/img/epura.png">
                           </div>
                       </div>
                   </div>
               </div>
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
               <a class="nav-link text-white" href="#">
                  <img style="width:30px; height: 30px;" src="assets/img/perfil.png">

               </a>
            </li>
         </ul>
      </nav>
   </footer>

<!-- Modal -->
<div class="modal fade" id="venta_credito" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Venta Garrafon 20 Ltrs.</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar();">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
             <label>Producto</label>
             <input type="text" id="Tipo_G" class="form-control" placeholder="Inv" style="width: 130px; " readonly>

             <label>Servicio</label>

             <select id="Serv" class="form-control" placeholder="Servicio" style="width: 195px;" onchange="calcular_precio()">
                 <option value="0" selected>--Seleccione Servicio--</option>
                 <option value="1">Refill (Intercambio)</option>
                 <option value="2">Refill (Mismo Envase)</option>
                 <option value="3">Nuevo</option>
             </select>

             <label>Cantidad</label>
             <input type="number" id="cant_g" class="form-control" placeholder="Cantidad" style="width: 130px;"
                    onkeyup="calcular_costo()">

             <label>UM</label>
             <input type="text" id="um_c" class="form-control" placeholder="UM" style="width: 130px;" readonly>


             <label>Precio</label>
             <input type="text" id="precio_c" class="form-control" placeholder="Precio" style="width: 130px;" readonly>

             <label>Tipo Pago</label>
             <select id="Tipo_V" class="form-control" placeholder="Venta" style="width: 215px;">
                 <option value="0" selected>--Seleccione Tipo Pago--</option>
                 <option value="1">Efectivo (Contra Entrega)</option>
                 <option value="2">Pago con Tarjeta</option>

             </select>
            
             <input type="hidden" id="id_user" class="form-control" placeholder="user" style="width: 130px;" value="<?php echo $id ?>" readonly>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="cerrar();">Cerrar</button>
            <button type="button" class="btn btn-primary" onclick="Vender();">Vender</button>
         </div>
      </div>
   </div>
</div>   
</body>
<script src="assets/bootstrap/js/jquery-3.5.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstrap/js/popper.min.js"></script>
<script src="js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>