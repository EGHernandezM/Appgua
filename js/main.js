function ModalVenta(Nombre){
	
	$("#Tipo_G").val(Nombre);






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






function Vender() {







	var Precio = $('#precio_c').val();
	var Tipo_V = $('#Tipo_V').val();
	var um_c = $('#um_c').val();
	var cant_g = $('#cant_g').val();
	var Serv = $('#Serv').val();
	var Tipo_G = $('#Tipo_G').val();
	var id_user = $('#id_user').val();
	console.log(Precio);
	console.log(Tipo_V);
	console.log(um_c);
	console.log(cant_g);
	console.log(Serv);
	console.log(Tipo_G);






	$.post('datos.php', {
		Precio: Precio,
		Tipo_V: Tipo_V,
		um_c: um_c,
		cant_g: cant_g,
		Serv: Serv,
		Tipo_G: Tipo_G,
		id_user: id_user
	}, function (data, status) {
		console.log(data + " " + status);

		if (data == "ok") {

			Swal.fire({
				position: 'top-end',
				icon: 'success',
				title: 'Guardado con Exito',
				showConfirmButton: false,
				timer: 1500
			})

		 $('#precio_c').val("");
			 $('#Tipo_V').val("");
			 $('#um_c').val("");
			 $('#cant_g').val("");
			 $('#Serv').val("");
			$('#Tipo_G').val("");
			$("#venta_credito").modal('hide');
			
		}
		else {

			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Fallo al Guardar!',
			
			})
			
        }

	});

}







function calcular_precio() {

	var Tipo_G = $("#Tipo_G").val();

	console.log(Tipo_G);


	var Serv = $("#Serv").val();


	if (Serv == 1 && Tipo_G == "Ciel") {


		$("#um_c").val('20');

	} else if (Serv == 2 && Tipo_G == "Ciel") {

		$("#um_c").val('20');

	} else if (Serv == 3 && Tipo_G == "Ciel") {

		$("#um_c").val('130');
	}
	else if (Serv == 1 && Tipo_G == "Bonafon") {


		$("#um_c").val('20');

	} else if (Serv == 2 && Tipo_G == "Bonafon") {

		$("#um_c").val('20');

	} else if (Serv == 3 && Tipo_G == "Bonafon") {

		$("#um_c").val('130');
	}


	else if (Serv == 1 && Tipo_G == "Epura") {


		$("#um_c").val('20');

	} else if (Serv == 2 && Tipo_G == "Epura") {

		$("#um_c").val('20');

	} else if (Serv == 3 && Tipo_G == "Epura") {

		$("#um_c").val('130');
	}

	else if (Serv == 1 && Tipo_G == "Agua Inmaculada") {


		$("#um_c").val('20');

	} else if (Serv == 2 && Tipo_G == "Agua Inmaculada") {

		$("#um_c").val('20');

	} else if (Serv == 3 && Tipo_G == "Agua Inmaculada") {

		$("#um_c").val('80');
	}




	else if (Serv == 1 && Tipo_G == "AguaDoor") {


		$("#um_c").val('10');

	} else if (Serv == 2 && Tipo_G == "AguaDoor") {

		$("#um_c").val('12');

	} else if (Serv == 3 && Tipo_G == "AguaDoor") {

		$("#um_c").val('70');
	}



	

}




function prueba() {



	const response =  fetch('datos.php', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify({
			precio_c: document.getElementById('precio_c').value, Tipo_V: document.getElementById('Tipo_V').value, um_c: document.getElementById('um_c').value, cant_g: document.getElementById('cant_g').value, Serv: document.getElementById('Serv').value, Tipo_G: document.getElementById('Tipo_G').value
		})
	});
	return response.json();
}










