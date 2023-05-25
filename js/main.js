function ModalVenta(Nombre,Precio){
	
	$("#Tipo_G").val(Nombre);
$("#um_c").val(Precio);





  $("#venta_credito").modal("show");


}



function cerrar() {

  location.reload()

}


function calcular_costo(){

	var precio=$("#um_c").val();

     var cantidad = $("#cant_g").val();

	var costo = precio * cantidad;

$("#precio_c").val(costo);


}