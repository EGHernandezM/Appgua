
<!DOCTYPE html>
<html>
<head>
  <title>Pago En Linea</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</head>











<?php
date_default_timezone_set('America/Mexico_City');
require_once("lib/Conekta.php");
\Conekta\Conekta::setApiKey("key_uHHqOnXJDEjq5kU2rI7XA6b");
\Conekta\Conekta::setApiVersion("2.0.0");

$token_id=$_POST["conektaTokenId"];
$Producto =$_POST['Producto'];
$Serv=$_POST['Serv'];
$cant_g= $_POST['cant_g'];
$um_c=$_POST['um_c'];
$precio_c=$_POST['precio_c'];
$Tipo_V=$_POST['Tipo_V'];
$id_user=$_POST['id_user'];








try {
  $customer = \Conekta\Customer::create(
    array(
      "name" => "Edgar G Hernandez",
      "email" => "ed.gerard.macias@gmail.com",
      "phone" => "+52181818181",
      "payment_sources" => array(
        array(
            "type" => "card",
            "token_id" => $token_id
        )
      )//payment_sources
    )//customer
  );
} catch (\Conekta\ProccessingError $error){
  echo $error->getMesage();
} catch (\Conekta\ParameterValidationError $error){
  echo $error->getMessage();
} catch (\Conekta\Handler $error){
  echo $error->getMessage();
}


try{
  $order = \Conekta\Order::create(
    array(
      "line_items" => array(
        array(
          "name" => "$Producto",
          "unit_price" => $um_c *100,
          "quantity" => $cant_g
        )//first line_item
      ), //line_items
      "shipping_lines" => array(
        array(
          "amount" => 0,
           "carrier" => "FEDEX"
        )
      ), //shipping_lines - physical goods only
      "currency" => "MXN",
      "customer_info" => array(
        "customer_id" => $customer->id
      ), //customer_info
      "shipping_contact" => array(
        "address" => array(
          "street1" => "Calle 123, int 2",
          "postal_code" => "06100",
          "country" => "MX"
        )//address
      ), //shipping_contact - required only for physical goods
      "metadata" => array("reference" => "12987324097", "more_info" => "lalalalala"),
      "charges" => array(
          array(
              "payment_method" => array(
                      "type" => "default"
              ) //payment_method - use customer's default - a card
                //to charge a card, different from the default,
                //you can indicate the card's source_id as shown in the Retry Card Section
          ) //first charge
      ) //charges
    )//order
  );
} catch (\Conekta\ProcessingError $error){
  echo $error->getMessage();
} catch (\Conekta\ParameterValidationError $error){
  echo $error->getMessage();
} catch (\Conekta\Handler $error){
  echo $error->getMessage();
}










$mysqli = new mysqli("localhost", "u435561149_H20", "H2O_1234_agua", "u435561149_H2O");

/* comprobar la conexión */
if (mysqli_connect_errno()) {
  printf("Falló la conexión: %s\n", mysqli_connect_error());
  exit();
}


$Fecha_V=date('Y-m-d H:i:s', strtotime('-1 hour')); 


  



$sql1 = "INSERT INTO `Venta`(`Tipo_G`, `Tipo_S`, `Cantidad`, `Unitario`, `Costo`, `Tipo_Pago`,`Fecha`,`id_user`,`id_Orden`)
VALUES ('$Producto','$Serv','$cant_g','$um_c','$precio_c','$Tipo_V','$Fecha_V','$id_user','$order->id')";




if ($mysqli->query($sql1) === TRUE) {








 echo'<div class="card" style="width:400px; margin-left:10px; margin-top:10px">
    <div class="card-body">
            <div class="row">
               <div class="col-md-6">';
      
     echo "ID: ". $order->id;
echo "<br>Status: ". $order->payment_status;
echo "<br>$". $order->amount/100 . $order->currency;
echo "<br>Order";
echo $order->line_items[0]->quantity .
      "-". $order->line_items[0]->name .
      "- $". $order->line_items[0]->unit_price/100;
echo "<br>Payment info";
echo "<br>CODE:". $order->charges[0]->payment_method->auth_code;
echo "<br>Card info:" .
      "- ". $order->charges[0]->payment_method->name .
      "- ". $order->charges[0]->payment_method->last4 .
      "- ". $order->charges[0]->payment_method->brand .
      "- ". $order->charges[0]->payment_method->type;
echo "<br>";
     echo '<a href="#" class="btn btn-primary">Salir</a>
    </div>
  </div>';









// Response
// ID: ord_2fsQdMUmsFNP2WjqS
// $ 135.0 MXN
// Order
// 12 - Tacos - $10.0
// Payment info
// CODE: 035315
// Card info: 4242 - visa - banco - credit


} else {
 echo "error";
}







?>