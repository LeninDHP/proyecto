
$(document).ready(function(){

$("#form").validate({
			rules: {
				id_pro: {
					required: true,
					minlength: 5,
					maxlength: 5
					
				},
				nombre_pro: {
					required: true,
	
				},
				cantidad_pro: {
					required: true,
					number: true
					
				},

				precio_u: {
					required: true,
					number: true
				},	
				
				bodega: {
					required:true
				}
			
			},
			messages: {
				id_pro:{
					required: "Campo obligatorio",
					minlength: "ingrese PRO seguido de 2 numeros ejm:(PRO11)",
					maxlength: "ingrese PRO seguido de 2 numeros ejm:(PRO11)"


				},
				nombre_pro:{
					required: "Campo obligatorio"
				},
				cantidad_pro:{
					required: "Campo obligatorio",
					number: "Ingrese solo números"
				},
			precio_u:{
					required: "Campo obligartorio",
					number: "Ingrese solo número"
				},
				
				bodega:{
					required:"Campo Obligatorio"
				}
			}
		});

	$("#ing").on("click", function(ev)
	{
		//realizar la peticion de la llamada ajax
		//done envia los mensajes que se encuentran en el rpc.php
		//#mensaje div colocado en el index
		//prevent evita el comportamiento por defecto del boton

		ev.preventDefault();
		if($("#form").valid()){

		$.ajax({

			type: 'post',
			url: 'php/insertar_pro.php',
			data: {
				id_pro: $("#id_pro").val(),
				nombre_pro: $("#nombre_pro").val(),
				cantidad_pro: $("#cantidad_pro").val(),
				precio_u:  $("#precio_u").val(),
				bodega: $("#bodega").val()
				
			}
		})
		.done(function( msg ){
			$("#mensaje2").html(msg);
		})



		.fail(function(jHttp, textStatus, errorThrown){
			$("#mensaje2").html("Error: " + textStatus + ". " + errorThrown);
		})
		.always(function(){
			$("#form")[0].reset();

			$("#guardar").html("Datos Guardados");

		});
	}
});

$("#form_emp").validate({
			rules: {
			id: {
					required: true,
					minlength: 5,
					maxlength: 5
					
				},
			usuario: {
					required: true
	
				},
			password: {
					required: true
					
				},
			verificar: {
					required: true,
					equalTo: "#password"
					
				},		
			email: {
					required:true,
					email: true
				},
			nombre: {
					required:true
				},
			apellido: {
					required:true
				},
			imagen: {
					required:true
				},
			fechaing: {
					required:true
				},
			fechasal: {
					required:true
				},
			direc: {
					required:true
				},
			telef: {
					required:true
				},
			activo: {
					required:true
				},
			cargo: {
					required:true
				},
			bodega: {
					required:true
				}
			
			},
			messages: {
			id:{
					required: "Campo obligatorio",
					minlength: "ingrese EMP seguido de 2 numeros ejm:(EMP11)",
					maxlength: "ingrese EMP seguido de 2 numeros ejm:(EMP11)"

				},
			usuario: {
					required: "Campo obligatorio"
	
				},
			password: {
					required: "Campo obligatorio"
					
				},
			verificar: {
					required: "Campo obligatorio",
					equalTo: "ingrese la misma contraseña"
					
				},		
			email: {
					required:"Campo obligatorio",
					email: "ingrese un correo valido"
				},
			nombre: {
					required:"Campo obligatorio"
				},
			apellido: {
					required:"Campo obligatorio"
				},
			imagen: {
					required:"Campo obligatorio"
				},
			fechaing: {
					required:"Campo obligatorio"
				},
			fechasal: {
					required:"<b>Campo obligatorio</b>"
				},
			direc: {
					required:"Campo obligatorio"
				},
			telef: {
					required: "Campo obligatorio"
				},
			activo: {
					required:"Campo obligatorio"
				},
			cargo: {
					required:"Campo obligatorio"
				},
			bodega: {
					required:"Campo obligatorio"
				}
			}
		});

	$("#btn_emp").on("click", function(ev)
	{
		//realizar la peticion de la llamada ajax
		//done envia los mensajes que se encuentran en el rpc.php
		//#mensaje div colocado en el index
		//prevent evita el comportamiento por defecto del boton

		ev.preventDefault();
		if($("#form_emp").valid()){

		$.ajax({

			type: 'post',
			url: 'php/insertar_emp.php',
			data: {
				id: $("#id").val(),
				usuario: $("#usuario").val(),
				password: $("#password").val(),
				verificar: $("#verificar").val(),
				email: $("#email").val(),
				nombre: $("#nombre").val(),
				apellido: $("#apellido").val(),
				imagen: $("#imagen").val(),
				fechaing: $("#fechaing").val(),
				fechasal: $("#fechasal").val(),
				direc: $("#direc").val(),
				telef: $("#telef").val(),
				activo: $("#activo").val(),
				cargo: $("#cargo").val(),
				bodega: $("#bodega").val()
				
			}
		})
		.done(function( msg ){
			$("#mensaje").html(msg);
		})



		.fail(function(jHttp, textStatus, errorThrown){
			$("#mensaje").html("Error: " + textStatus + ". " + errorThrown);
		})
		.always(function(){
			$("#form_emp")[0].reset();

			$("#guardar2").html("Datos Guardados");

		});
	}
});








$("#form_bod").validate({
			rules: {
				id_pro: {
					required: true,
					minlength: 5,
					maxlength: 5
					
				},
				nombre_pro: {
					required: true,
	
				},
				cantidad_pro: {
					required: true,
					number: true
					
				},

				precio_u: {
					required: true,
					number: true
				},	
				
				bodega: {
					required:true
				}
			
			},
			messages: {
				id_pro:{
					required: "Campo obligatorio",
					minlength: "ingrese PRO seguido de 2 numeros ejm:(PRO11)",
					maxlength: "ingrese PRO seguido de 2 numeros ejm:(PRO11)"


				},
				nombre_pro:{
					required: "Campo obligatorio"
				},
				cantidad_pro:{
					required: "Campo obligatorio",
					number: "Ingrese solo números"
				},
			precio_u:{
					required: "Campo obligartorio",
					number: "Ingrese solo número"
				},
				
				bodega:{
					required:"Campo Obligatorio"
				}
			}
		});

	$("#btn").on("click", function(ev)
	{
		//realizar la peticion de la llamada ajax
		//done envia los mensajes que se encuentran en el rpc.php
		//#mensaje div colocado en el index
		//prevent evita el comportamiento por defecto del boton

		ev.preventDefault();
		if($("#form_bod").valid()){

		$.ajax({

			type: 'post',
			url: 'php/insertar_pro.php',
			data: {
				id_pro: $("#id_pro").val(),
				nombre_pro: $("#nombre_pro").val(),
				cantidad_pro: $("#cantidad_pro").val(),
				precio_u:  $("#precio_u").val(),
				bodega: $("#bodega").val()
				
			}
		})
		.done(function( msg ){
			$("#mensaje2").html(msg);
		})



		.fail(function(jHttp, textStatus, errorThrown){
			$("#mensaje2").html("Error: " + textStatus + ". " + errorThrown);
		})
		.always(function(){
			$("#form_bod")[0].reset();

			$("#guardar").html("Datos Guardados");

		});
	}
});







$("#form_cli").validate({
			rules: {
				cod_cli: {
					required: true
					
				},
				cedula: {
					required: true
				},
				nom_cli: {
					required: true		
				},

				apellido_cli: {
					required: true
				},	
				
				direc_cli: {
					required:true
				},
				telef_cli: {
					required:true
				}
			
			},
			messages: {
				cod_cli:{
					required: "Campo obligatorio"
				},
				cedula:{
					required: "Campo obligatorio"
				},
				nom_cli:{
					required: "Campo obligatorio"
				},
				apellido_cli:{
					required: "Campo obligartorio"
				},
				
				direc_cli:{
					required:"Campo Obligatorio"
				},
				
				telef_cli:{
					required:"Campo Obligatorio"
				}
			}
		});

	$("#id_cli").on("click", function(ev)
	{
		//realizar la peticion de la llamada ajax
		//done envia los mensajes que se encuentran en el rpc.php
		//#mensaje div colocado en el index
		//prevent evita el comportamiento por defecto del boton

		ev.preventDefault();
		if($("#form_cli").valid()){

		$.ajax({

			type: 'post',
			url: 'php/insertar_cliente.php',
			data: {
				cod_cli: $("#cod_cli").val(),
				cedula: $("#cedula").val(),
				nom_cli: $("#nom_cli").val(),
				apellido_cli: $("#apellido_cli").val(),
				direc_cli: $("#direc_cli").val(),
				telef_cli: $("#telef_cli").val()

				
			}
		})
		.done(function( msg ){
			$("#mensaje2").html(msg);
		})



		.fail(function(jHttp, textStatus, errorThrown){
			$("#mensaje2").html("Error: " + textStatus + ". " + errorThrown);
		})
		.always(function(){
			$("#form_cli")[0].reset();

			$("#guardar4").html("Datos Guardados");

		});
	}
});



$("#form_ver").validate({
			rules: {
				id_fac: {
					required: true
					
				},
				fecha_fac: {
					required: true
				},
				total: {
					required: true		
				},

				id_cli: {
					required: true
				}
			
			},
			messages: {
				id_fac:{
					required: "Campo obligatorio"
				},
				fecha_fac:{
					required: "Campo obligatorio"
				},
				total:{
					required: "Campo obligatorio"
				},
				id_cli:{
					required: "Campo obligartorio"
				}
			}
		});



	$("#btn_ver").on("click", function(ev)
	{
		//realizar la peticion de la llamada ajax
		//done envia los mensajes que se encuentran en el rpc.php
		//#mensaje div colocado en el index
		//prevent evita el comportamiento por defecto del boton

		ev.preventDefault();
		if($("#form_ver").valid()){

		$.ajax({

			type: 'post',
			url: 'modificar_factura.php',
			data: {
				id_fac: $("#id_fac").val(),
				fecha_fac: $("#fecha_fac").val(),
				total: $("#total").val(),
				id_cli: $("#id_cli").val()
				
			}
		})
		.done(function( msg ){
			$("#mensaje2").html(msg);
		})



		.fail(function(jHttp, textStatus, errorThrown){
			$("#mensaje2").html("Error: " + textStatus + ". " + errorThrown);
		})
		.always(function(){
			$("#form_ver")[0].reset();

			$("#guardar4").html("Datos Guardados");

		});
	}
});

});


