<?php

$Producto=$_POST['Tipo_G'];
$Serv = $_POST['Serv'];
$cant_g = $_POST['cant_g'];
$um_c=$_POST['um_c'];
$precio_c=$_POST['precio_c'];
$Tipo_V=$_POST['Tipo_V'];
$id_user=$_POST['id_user'];



?>


<!DOCTYPE html>
<html>
<head>
	<title>Pago En Linea</title>
	<script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</head>
<body>
<div class="card" style="width:400px; margin-left:10px; margin-top:10px">
	<form action="cobro.php" method="POST" id="card-form">

    <input type="hidden" name="Producto" value="<?php echo $Producto ?>">
     <input type="hidden" name="Serv" value="<?php echo $Serv ?>">
      <input type="hidden" name="cant_g" value="<?php echo $cant_g ?>">
     <input type="hidden" name="um_c" value="<?php echo $um_c ?>">
     <input type="hidden" name="precio_c" value="<?php echo $precio_c ?>">
     <input type="hidden" name="Tipo_V" value="<?php echo $Tipo_V ?>">
     <input type="hidden" name="id_user" value="<?php echo $id_user ?>">
	<br>
  <div class="card-header">
            <div class="row display-tr">
               <h3>Pago en línea</h3>
            </div>
         </div>
	<br>
   <div class="card-body">
            <div class="row">
        
  <span class="card-errors"></span>
  <div class="col-md-9" style="margin-left:10px;" ><br>
    <label>
      <span>Nombre del tarjetahabiente</span>
      <input class="form-control" type="text"  size="20" data-conekta="card[name]" type="text">
    </label>
  </div>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<div class="col-md-6" style="margin-left:10px;">
    <label>
      <span>Número de tarjeta</span>
      <input class="form-control" maxlength="16" size="20" data-conekta="card[number]" type="text">
    </label>
  </div>
  <div  class="col-md-6" style="margin-left:10px;">
    <label>
      <span>CVC</span>
      <input class="form-control" size="4" data-conekta="card[cvc]" type="text" maxlength="3">
    </label>
  </div>
  <div class="col-md-12" style="margin-left:10px;">
    <label>
      <span>Expiración (MM/AAAA)</span>
      <input size="2" data-conekta="card[exp_month]" type="text" maxlength="2">
    </label>
    <span>/</span>
    <input  size="4" data-conekta="card[exp_year]" type="text" maxlength="4">
  </div>
  <br>
  <center><button class="btn btn-primary" type="submit">Pagar</button></center>
  </div>
</div>
</form>
<br>
</div>
<script type="text/javascript" >
  Conekta.setPublicKey('key_GbeHeR1cqfEhaQa7zwEvi1q');

  var conektaSuccessResponseHandler = function(token) {
    var $form = $("#card-form");
    //Inserta el token_id en la forma para que se envíe al servidor
     $form.append($('<input name="conektaTokenId" id="conektaTokenId" type="hidden">').val(token.id));
    $form.get(0).submit(); //Hace submit
  };
  var conektaErrorResponseHandler = function(response) {
    var $form = $("#card-form");
    $form.find(".card-errors").text(response.message_to_purchaser);
    $form.find("button").prop("disabled", false);
  };

  //jQuery para que genere el token después de dar click en submit
  $(function () {
    $("#card-form").submit(function(event) {
      var $form = $(this);
      // Previene hacer submit más de una vez
      $form.find("button").prop("disabled", true);
      Conekta.Token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);
      return false;
    });
  });
</script>

</body>
</html>