<?php

date_default_timezone_set('America/Mexico_City');

/*
$datos= file_get_contents('php://input');
$datos = json_decode($datos);*/



$mysqli = new mysqli("localhost", "u435561149_H20", "H2O_1234_agua", "u435561149_H2O");

/* comprobar la conexión */
if (mysqli_connect_errno()) {
	printf("Falló la conexión: %s\n", mysqli_connect_error());
	exit();
}


$Precio=$_POST['Precio'];
$Tipo_V=$_POST['Tipo_V'];
$um_c=$_POST['um_c'];
$cant_g=$_POST['cant_g'];
$Serv=$_POST['Serv'];
$Tipo_G=$_POST['Tipo_G'];
$id_user=$_POST['id_user'];
$Fecha_V=date('Y-m-d H:i:s', strtotime('-1 hour')); 


	



$sql1 = "INSERT INTO `Venta`(`Tipo_G`, `Tipo_S`, `Cantidad`, `Unitario`, `Costo`, `Tipo_Pago`,`Fecha`,`id_user`)
VALUES ('$Tipo_G','$Serv','$cant_g','$um_c','$Precio','$Tipo_V','$Fecha_V','$id_user')";




if ($mysqli->query($sql1) === TRUE) {

echo "ok";

} else {
 echo "error";
}




?>
