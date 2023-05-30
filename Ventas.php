<?php

SESSION_START();

ini_set('display_errors', 'Off');
$usuario = $_SESSION['uname'];
$id = $_SESSION['id'];
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

   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">
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

   <main class="overflow-auto" style="margin-top: 5rem; margin-bottom: 4rem;">
      <div class="container">
         <div class="row">
            <div class="page-header clearfix">
               <h2 class="pull-left">Ventas</h2>
            </div>
            <br>
            <div class="col-lg-12">
               <?php
               include_once 'connection.php';
               $result = mysqli_query($conn, "SELECT Tipo_G,Cantidad,Costo,b.Servicio,c.Pago,Fecha FROM `Venta` a INNER JOIN Servicios b ON a.Tipo_S= b.Id_Serv INNER JOIN Tipo_Pago c ON a.Tipo_Pago=c.id_pago INNER JOIN usuarios d ON a.id_user=d.id_usr WHERE a.id_user='$id'");
               ?>

               <?php
               if (mysqli_num_rows($result) > 0) {
               ?>
               <table class='table table-striped w-100 shadow table-hover table-sm' id="tblVentas">
                  <thead class="thead-dark">
                     <tr>
                        <th>Marca</th>
                        <th>Cantidad</th>
                        <th>Costo</th>
                        <th>Servicio</th>
                        <th>Pago</th>
                        <th>Fecha</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php

                     while ($row = mysqli_fetch_array($result)) {
                     ?>

                     <tr>
                        <td><?php echo $row["Tipo_G"]; ?></td>

                        <td><?php echo $row["Cantidad"]; ?></td>
                        <td><?php echo utf8_encode($row["Costo"]); ?></td>
                        <td><?php echo utf8_encode($row["Servicio"]); ?></td>
                        <td><?php echo utf8_encode($row["Pago"]); ?></td>
                        <td><?php echo utf8_encode($row["Fecha"]); ?></td>

                     </tr>
                     <?php
                     }
                     ?>
                     <?php
                     } else {
                     echo "No result found";
                     }
                     ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </main>

   <footer>
      <nav class="navbar navbar-light bg-orange fixed-bottom">
         <ul class="nav mx-auto">
            <li class="nav-item">
               <a class="nav-link text-white" href="home.php">
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
</body>
<script src="assets/bootstrap/js/jquery-3.5.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstrap/js/popper.min.js"></script>
<script src="js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

<script>
   $(document).ready(function() {
      var tblventas = $("#tblVentas").DataTable({
         dom: 'Bfrtip',
         responsive: {
            details: {
               type: 'column'
            }
         },
         language: {
            url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
         }
      })
   });
</script>

</html>