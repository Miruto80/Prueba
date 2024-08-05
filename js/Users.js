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
                zeroRecords: "No se encontraron entrenadores",
                info: "Mostrando página _PAGE_ de _PAGES_",
                infoEmpty: "No hay entrenadores registradas",
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
	
	//ejecuta una consulta a la base de datos para llenar la tabla
	consultar();
	
//VALIDACION DE DATOS	
	$("#CedulaU").on("keypress",function(e){
		validarkeypress(/^[0-9-\b]*$/,e);
	});
	
	$("#CedulaU").on("keyup",function(){
		validarkeyup(/^[0-9]{7,8}$/,$(this),
		$("#sCedulaU"),"El formato debe ser 9999999 ");
	});
	
	
	$("#NombreU").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});
	
	$("#NombreU").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#sNombreU"),"Solo letras  entre 3 y 30 caracteres");
	});
	
	$("#Usuario").on("keypress",function(e){
		validarkeypress(/^[A-Za-z0-9\b\s\u00f1\u00d1\u00E0-\u00FC\-]*$/,e);
	});
	
	$("#Usuario").on("keyup",function(){
		validarkeyup(/^[A-Za-z0-9\b\s\u00f1\u00d1\u00E0-\u00FC\-]{3,30}$/,
		$(this),$("#sUsuario"),"Solo letras y numeros entre 3 y 30 caracteres");
	});

	$("#Contrasena").on("keypress",function(e){
		validarkeypress(/^[A-Za-z0-9\b\s\u00f1\u00d1\u00E0-\u00FC\-]*$/,e);
	});
	
	$("#Contrasena").on("keyup",function(){
		validarkeyup(/^[A-Za-z0-9\b\s\u00f1\u00d1\u00E0-\u00FC\-]{3,30}$/,
		$(this),$("#sContrasena"),"Solo letras y numeros entre 3 y 30 caracteres");
	});
	

//FIN DE VALIDACION DE DATOS



//CONTROL DE BOTONES
$("#proceso").on("click",function(){
	if($(this).text()=="INCLUIR"){
		if(validarenvio()){
			var datos = new FormData();
			datos.append('accion','incluir');
			datos.append('CedulaU',$("#CedulaU").val());
			datos.append('NombreU',$("#NombreU").val());
			datos.append('Usuario',$("#Usuario").val());
			datos.append('Cargo',$("#Cargo").val());
			datos.append('Contrasena',$("#Contrasena").val());
	
			enviaAjax(datos);
		}
	}

	else if($(this).text()=="MODIFICAR"){
		if(validarenvio()){
			var datos = new FormData();
			datos.append('accion','modificar');
			datos.append('CedulaU',$("#CedulaU").val());
			datos.append('NombreU',$("#NombreU").val());
			datos.append('Usuario',$("#Usuario").val());
			datos.append('Cargo',$("#Cargo").val());
			datos.append('Contrasena',$("#Contrasena").val());
			enviaAjax(datos);
		}
	}
	if($(this).text()=="ELIMINAR"){
		if(validarkeyup(/^[0-9]{7,8}$/,$("#CedulaU"),
		$("#sCedulaU"),"El formato debe ser 9999999")==0){
	    muestraMensaje("La CedulaU debe coincidir con el formato <br/>"+ 
						"99999999");	
		
	    }
		else{
			var datos = new FormData();
			datos.append('accion','eliminar');
			datos.append('CedulaU',$("#CedulaU").val());
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
	if(validarkeyup(/^[0-9]{7,8}$/,$("#CedulaU"),
		$("#sCedulaU"),"El formato debe ser 9999999")==0){
	    muestraMensaje("La CedulaU debe coincidir con el formato <br/>"+ 
						"99999999");	
		return false;					
	}	
	else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$("#NombreU"),$("#sNombreU"),"Solo letras  entre 3 y 30 caracteres")==0){
		muestraMensaje("NombreU <br/>Solo letras  entre 3 y 30 caracteres");
		return false;
	}
	else if(validarkeyup(/^[A-Za-z0-9\b\s\u00f1\u00d1\u00E0-\u00FC\-]{3,30}$/,
		$("#Usuario"),$("#sUsuario"),"Solo letras y numeros entre 3 y 30 caracteres")==0){
		muestraMensaje("Usuario <br/>Solo letras y numeros entre 3 y 30 caracteres");
		return false;
	}
	else if(validarkeyup(/^[A-Za-z0-9\b\s\u00f1\u00d1\u00E0-\u00FC\-]{3,30}$/,
		$("#Contrasena"),$("#sContrasena"),"Solo letras y numeros entre 3 y 30 caracteres")==0){
		muestraMensaje("Contrasena <br/>Solo letras y numeros entre 3 y 30 caracteres");
		return false;
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
	$("#CedulaU").val($(linea).find("td:eq(1)").text());
	$("#NombreU").val($(linea).find("td:eq(2)").text());
	$("#Usuario").val($(linea).find("td:eq(3)").text());
	$("#Cargo").val($(linea).find("td:eq(4)").text());
	$("#Contrasena").val($(linea).find("td:eq(5)").text());
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
		if (lee.resultado == "consultar") {
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
	$("#CedulaU").val("");
	$("#NombreU").val("");
	$("#Usuario").val("");
	$("#Cargo").prop("selectedIndex",0);
	$("#Contrasena").val("");
}
