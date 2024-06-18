function pone_fecha(){
	
	
	var datos = new FormData();
	datos.append('accion','obtienefecha');
	enviaAjax(datos);	
	
}
function consultar(){
	var datos = new FormData();
	datos.append('accion','consultar');
	enviaAjax(datos);	
}
function destruyeDT(){
	//1 se destruye el datatablet
	if ($.fn.DataTable.isDataTable("#tablapersona")) {
            $("#tablapersona").DataTable().destroy();
    }
}
function crearDT(){
	//se crea nuevamente
    if (!$.fn.DataTable.isDataTable("#tablapersona")) {
            $("#tablapersona").DataTable({
              language: {
                lengthMenu: "Mostrar _MENU_ por página",
                zeroRecords: "No se encontraron personas",
                info: "Mostrando página _PAGE_ de _PAGES_",
                infoEmpty: "No hay personas registradas",
                infoFiltered: "(filtrado de _MAX_ registros totales)",
                search: "Buscar:",
                paginate: {
                  first: "Primera",
                  last: "Última",
                  next: "Siguiente",
                  previous: "Anterior",
                },
              },
              autoWidth: false,
              order: [[1, "asc"]],
            });
    }         
}
$(document).ready(function(){
	//para obtener la fecha del servidor y calcular la 
	//edad de nacimiento que debe ser mayor a 18 
	pone_fecha();
	//fin de colocar fecha en input fecha de nacimiento
	
	//ejecuta una consulta a la base de datos para llenar la tabla
	consultar();
	
//VALIDACION DE DATOS	
	$("#cedula").on("keypress",function(e){
		validarkeypress(/^[0-9-\b]*$/,e);
	});
	
	$("#cedula").on("keyup",function(){
		validarkeyup(/^[0-9]{7,8}$/,$(this),
		$("#scedula"),"El formato debe ser 9999999 ");
	});
	
	
	$("#apellidos").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});
	
	$("#apellidos").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#sapellidos"),"Solo letras  entre 3 y 30 caracteres");
	});
	
	$("#nombres").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});
	
	$("#nombres").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#snombres"),"Solo letras  entre 3 y 30 caracteres");
	});
	
	$("#fechadenacimiento").on("keyup",function(){
		validarkeyup(/^(?:(?:1[6-9]|[2-9]\d)?\d{2})(?:(?:(\/|-|\.)(?:0?[13578]|1[02])\1(?:31))|(?:(\/|-|\.)(?:0?[13-9]|1[0-2])\2(?:29|30)))$|^(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00)))(\/|-|\.)0?2\3(?:29)$|^(?:(?:1[6-9]|[2-9]\d)?\d{2})(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:0?[1-9]|1\d|2[0-8])$/,
		$(this),$("#sfechadenacimiento"),"Ingrese una fecha valida");
	});
	
	$("#Direccion").on("keypress",function(e){
		validarkeypress(/^[A-Za-z0-9\b\s\u00f1\u00d1\u00E0-\u00FC\-]*$/,e);
	});
	
	$("#Direccion").on("keyup",function(){
		validarkeyup(/^[A-Za-z0-9\b\s\u00f1\u00d1\u00E0-\u00FC\-]{3,30}$/,
		$(this),$("#sDireccion"),"Solo letras y numeros entre 3 y 30 caracteres");
	});
	$("#Correo").on("keypress",function(e){
		validarkeypress(/^[A-Za-z@_.\b\u00f1\u00d1\u00E0-\u00FC-]*$/,e);
	});
	
	$("#Correo").on("keyup",function(){
		validarkeyup(/^[A-Za-z_\u00f1\u00d1\u00E0-\u00FC-]{3,15}[@]{1}[A-Za-z0-9]{3,8}[.]{1}[A-Za-z]{2,3}$/,
		$(this),$("#sCorreo"),"El formato debe ser alguien@servidor.com");
	});
	$("#Telefono").on("keypress",function(e){
		validarkeypress(/^[0-9-\b]*$/,e);
	});
	
	$("#Telefono").on("keyup",function(){
		validarkeyup(/^[0-9]{10,11}$/,$(this),
		$("#sTelefono"),"El formato debe ser de 10 a 11");
	});
	
	$("#Idclub").on("keypress",function(e){
		validarkeypress(/^[0-9-\b]*$/,e);
	});
	
	$("#Idclub").on("keyup",function(){
		validarkeyup(/^[0-9]{1,8}$/,$(this),
		$("#sIdclub"),"El formato debe ser de 1 a 8");
	});
	
	
	
	
	
//FIN DE VALIDACION DE DATOS



//CONTROL DE BOTONES
$("#proceso").on("click",function(){
	if($(this).text()=="INCLUIR"){
		if(validarenvio()){
			var datos = new FormData();
			datos.append('accion','incluir');
			datos.append('cedula',$("#cedula").val());
			datos.append('apellidos',$("#apellidos").val());
			datos.append('nombres',$("#nombres").val());
			datos.append('fechadenacimiento',$("#fechadenacimiento").val());
			datos.append('Participacion',$("#Participacion").val());
			datos.append('Direccion',$("#Direccion").val());
			datos.append('Correo',$("#Correo").val());
			datos.append('Telefono',$("#Telefono").val());
			datos.append('Idclub',$("#Idclub").val());
			if($("#masculino").is(":checked")){
				datos.append('sexo','M');
			}
			else{
				datos.append('sexo','F');
			}

			enviaAjax(datos);
		}
	}
	else if($(this).text()=="MODIFICAR"){
		if(validarenvio()){
			var datos = new FormData();
			datos.append('accion','modificar');
			datos.append('cedula',$("#cedula").val());
			datos.append('apellidos',$("#apellidos").val());
			datos.append('nombres',$("#nombres").val());
			datos.append('fechadenacimiento',$("#fechadenacimiento").val());
			datos.append('Participacion',$("#Participacion").val());
			datos.append('Direccion',$("#Direccion").val());
			datos.append('Correo',$("#Correo").val());
			datos.append('Telefono',$("#Telefono").val());
			datos.append('Idclub',$("#Idclub").val());
			if($("#masculino").is(":checked")){
				datos.append('sexo','M');
			}
			else{
				datos.append('sexo','F');
			}
			enviaAjax(datos);
		}
	}
	if($(this).text()=="ELIMINAR"){
		if(validarkeyup(/^[0-9]{7,8}$/,$("#cedula"),
		$("#scedula"),"El formato debe ser 9999999")==0){
	    muestraMensaje("La cedula debe coincidir con el formato <br/>"+ 
						"99999999");	
		
	    }
		else{
			var datos = new FormData();
			datos.append('accion','eliminar');
			datos.append('cedula',$("#cedula").val());
			enviaAjax(datos);
		}
	}
});
$("#incluir").on("click",function(){
	limpia();
	$("#proceso").text("INCLUIR");
	$("#modal1").modal("show");
});





	
	
});

//Validación de todos los campos antes del envio
function validarenvio(){
	if(validarkeyup(/^[0-9]{7,8}$/,$("#cedula"),
		$("#scedula"),"El formato debe ser 9999999")==0){
	    muestraMensaje("La cedula debe coincidir con el formato <br/>"+ 
						"99999999");	
		return false;					
	}	
	else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$("#apellidos"),$("#sapellidos"),"Solo letras  entre 3 y 30 caracteres")==0){
		muestraMensaje("Apellidos <br/>Solo letras  entre 3 y 30 caracteres");
		return false;
	}
	else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$("#nombres"),$("#snombres"),"Solo letras  entre 3 y 30 caracteres")==0){
		muestraMensaje("Nombres <br/>Solo letras  entre 3 y 30 caracteres");
		return false;
	}
	else if(validarkeyup(/^(?:(?:1[6-9]|[2-9]\d)?\d{2})(?:(?:(\/|-|\.)(?:0?[13578]|1[02])\1(?:31))|(?:(\/|-|\.)(?:0?[13-9]|1[0-2])\2(?:29|30)))$|^(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00)))(\/|-|\.)0?2\3(?:29)$|^(?:(?:1[6-9]|[2-9]\d)?\d{2})(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:0?[1-9]|1\d|2[0-8])$/,
		$("#fechadenacimiento"),$("#sfechadenacimiento"),"Ingrese una fecha valida")==0){
		muestraMensaje("Fecha de Nacimiento <br/>Ingrese una fecha valida");
		return false;	
	}
	else if(validarkeyup(/^[A-Za-z0-9\b\s\u00f1\u00d1\u00E0-\u00FC\-]{3,30}$/,
		$("#Direccion"),$("#sDireccion"),"Solo letras y numeros entre 3 y 30 caracteres")==0){
		muestraMensaje("Direccion <br/>Solo letras y numeros entre 3 y 30 caracteres");
		return false;
	}
	else if(validarkeyup(/^[0-9]{10,11}$/,$("#Telefono"),
	$("#Telefono"),"El formato debe ser de 10 a 11")==0){
	muestraMensaje("El telefono debe coincidir con el formato <br/>"+ 
					"de 10 a 11");	
	return false;					
	}
	else if(!$("#masculino").is(":checked") && !$("#femenino").is(":checked")) {
		muestraMensaje("Sexo <br/>Debe seleccionar el sexo");
		return false;	
	}
	else {
		var f1 = new Date(1950,01,01 );
		var f2 = new Date($("#fechadenacimiento").val());
		
		if(f2 < f1){
			muestraMensaje("Fecha de Nacimiento <br/>La fecha debe ser mayor o igual a 01/01/1950");
			return false;
		}
		
	}
	
	return true;
}


//Funcion que muestra el modal con un mensaje
function muestraMensaje(mensaje){
	
	$("#contenidodemodal").html(mensaje);
			$("#mostrarmodal").modal("show");
			setTimeout(function() {
					$("#mostrarmodal").modal("hide");
			},5000);
}


//Función para validar por Keypress
function validarkeypress(er,e){
	
	key = e.keyCode;
	
	
    tecla = String.fromCharCode(key);
	
	
    a = er.test(tecla);
	
    if(!a){
	
		e.preventDefault();
    }
	
    
}
//Función para validar por keyup
function validarkeyup(er,etiqueta,etiquetamensaje,
mensaje){
	a = er.test(etiqueta.val());
	if(a){
		etiquetamensaje.text("");
		return 1;
	}
	else{
		etiquetamensaje.text(mensaje);
		return 0;
	}
}

//funcion para pasar de la lista a el formulario
function pone(pos,accion){
	
	linea=$(pos).closest('tr');


	if(accion==0){
		$("#proceso").text("MODIFICAR");
	}
	else{
		$("#proceso").text("ELIMINAR");
	}
	$("#cedula").val($(linea).find("td:eq(1)").text());
	$("#apellidos").val($(linea).find("td:eq(2)").text());
	$("#nombres").val($(linea).find("td:eq(3)").text());
	$("#fechadenacimiento").val($(linea).find("td:eq(4)").text());
	if($(linea).find("td:eq(5)").text()=="M"){
		$("#masculino").prop("checked",true);
		$("#femenino").prop("checked",false);
	}
	else{
		$("#femenino").prop("checked",true);
		$("#masculino").prop("checked",false);
	}
	$("#Paricipacion").val($(linea).find("td:eq(6)").text());
	$("#Direccion").val($(linea).find("td:eq(7)").text());
	$("#Correo").val($(linea).find("td:eq(8)").text());
	$("#Telefono").val($(linea).find("td:eq(9)").text());
	$("#Idclub").val($(linea).find("td:eq(10)").text());
	$("#modal1").modal("show");
}


//funcion que envia y recibe datos por AJAX
function enviaAjax(datos) {
  $.ajax({
    async: true,
    url: "",
    type: "POST",
    contentType: false,
    data: datos,
    processData: false,
    cache: false,
    beforeSend: function () {},
    timeout: 10000, //tiempo maximo de espera por la respuesta del servidor
    success: function (respuesta) {
    console.log(respuesta);
      try {
        var lee = JSON.parse(respuesta);
        if (lee.resultado == "obtienefecha") {
          $("#fechadenacimiento").val(lee.mensaje);
        }
		else if (lee.resultado == "consultar") {
		   destruyeDT();	
           $("#resultadoconsulta").html(lee.mensaje);
		   crearDT();
        }
		else if (lee.resultado == "incluir") {
           muestraMensaje(lee.mensaje);
		   if(lee.mensaje=='Registro Inluido'){
			   $("#modal1").modal("hide");
			   consultar();
		   }
        }
		else if (lee.resultado == "modificar") {
           muestraMensaje(lee.mensaje);
		   if(lee.mensaje=='Registro Modificado'){
			   $("#modal1").modal("hide");
			   consultar();
		   }
        }
		else if (lee.resultado == "eliminar") {
           muestraMensaje(lee.mensaje);
		   if(lee.mensaje=='Registro Eliminado'){
			   $("#modal1").modal("hide");
			   consultar();
		   }
        }
		else if (lee.resultado == "error") {
           muestraMensaje(lee.mensaje);
        }
      } catch (e) {
        alert("Error en JSON " + e.name);
      }
    },
    error: function (request, status, err) {
      // si ocurrio un error en la trasmicion
      // o recepcion via ajax entra aca
      // y se muestran los mensaje del error
      if (status == "timeout") {
        //pasa cuando superan los 10000 10 segundos de timeout
        muestraMensaje("Servidor ocupado, intente de nuevo");
      } else {
        //cuando ocurre otro error con ajax
        muestraMensaje("ERROR: <br/>" + request + status + err);
      }
    },
    complete: function () {},
  });
}

function limpia(){
	pone_fecha();
	if($("#masculino").is(":checked")){
		$("#masculino").prop("checked",false);
	}
	else{
	    $("#femenino").prop("checked",false);
	}
	
	$("#cedula").val("");
	$("#apellidos").val("");
	$("#nombres").val("");
	$("#Participacion").prop("selectedIndex",0);
	$("#Direccion").val("");
	$("#Correo").val("");
	$("#Telefono").val("");
	$("#Idclub").val("");
}