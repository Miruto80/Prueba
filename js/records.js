function consultar(){
	var datos = new FormData();
	datos.append('accion','consultar');

	enviaAjax(datos);	
}
function destruyeDT(){
	
	if ($.fn.DataTable.isDataTable("#tablapersona")) {
            $("#tablapersona").DataTable().destroy();
    }
}

function crearDT(){
	
    if (!$.fn.DataTable.isDataTable("#tablapersona")) {
            $("#tablapersona").DataTable({
              language: {
                lengthMenu: "Mostrar _MENU_ por página",
                zeroRecords: "No se encontraron eventos",
                info: "Mostrando página _PAGE_ de _PAGES_",
                infoEmpty: "No hay eventos registradas",
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
	
	consultar();
	
	$("#NombreEvento").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});
	
	$("#NombreEvento").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#sNombreEvento"),"Solo letras  entre 3 y 30 caracteres");
	});
	
	
	$("#Logroobtenido").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});
	
	$("#Logroobtenido").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#sLogroobtenido"),"Solo letras  entre 3 y 30 caracteres");
	});

	$("#fechaevento").on("keyup",function(){
		validarkeyup(/^(?:(?:1[6-9]|[2-9]\d)?\d{2})(?:(?:(\/|-|\.)(?:0?[13578]|1[02])\1(?:31))|(?:(\/|-|\.)(?:0?[13-9]|1[0-2])\2(?:29|30)))$|^(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00)))(\/|-|\.)0?2\3(?:29)$|^(?:(?:1[6-9]|[2-9]\d)?\d{2})(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:0?[1-9]|1\d|2[0-8])$/,
		$(this),$("#sfechaevento"),"Ingrese una fecha valida");
	});

$("#proceso").on("click",function(){
	if($(this).text()=="INCLUIR"){
		if(validarenvio()){
			var datos = new FormData();
			datos.append('accion','incluir');
			datos.append('NombreEvento',$("#NombreEvento").val());
			datos.append('Logroobtenido',$("#Logroobtenido").val());
			datos.append('fechaevento',$("#fechaevento").val());
			enviaAjax(datos);
		}
	}
	else if($(this).text()=="MODIFICAR"){
		if(validarenvio()){
			var datos = new FormData();
			datos.append('accion','modificar');
			datos.append('NombreEvento',$("#NombreEvento").val());
			datos.append('Logroobtenido',$("#Logroobtenido").val());
			datos.append('fechaevento',$("#fechaevento").val());
			enviaAjax(datos);
		}
	}
	if($(this).text()=="ELIMINAR"){
		if(validarkeypress (/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
			$(this),$ ("#NombreEvento"),
		$("#sNombreEvento"),"Solo letras  entre 3 y 30 caracteres")==0){
	    muestraMensaje("El nombre debe coincidir con el formato <br/>"+ "3 y 30 caracteres");	
		
	    }
		else{
			var datos = new FormData();
			datos.append('accion','eliminar');
			datos.append('NombreEvento',$("#NombreEvento").val());
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


function validarenvio(){
	if(validarkeypress (/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$ ("#NombreEvento"),
	$("#sNombreEvento"),"Solo letras  entre 3 y 30 caracteres")==0){
	muestraMensaje("El nombre debe coincidir con el formato <br/>"+ "3 y 30 caracteres");
	return false;					
	}
	else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$("#Logroobtenido"),$("#sLogroobtenido"),"Solo letras  entre 3 y 30 caracteres")==0){
		muestraMensaje("Logroobtenido <br/>Solo letras  entre 3 y 30 caracteres");
		return false;
	}
	else if(validarkeyup(/^(?:(?:1[6-9]|[2-9]\d)?\d{2})(?:(?:(\/|-|\.)(?:0?[13578]|1[02])\1(?:31))|(?:(\/|-|\.)(?:0?[13-9]|1[0-2])\2(?:29|30)))$|^(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00)))(\/|-|\.)0?2\3(?:29)$|^(?:(?:1[6-9]|[2-9]\d)?\d{2})(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:0?[1-9]|1\d|2[0-8])$/,
		$("#fechaevento"),$("#sfechaevento"),"Ingrese una fecha valida")==0){
		muestraMensaje("Fecha del Evento <br/>Ingrese una fecha valida");
		return false;
	}
}



function muestraMensaje(mensaje){
	
	$("#contenidodemodal").html(mensaje);
			$("#mostrarmodal").modal("show");
			setTimeout(function() {
					$("#mostrarmodal").modal("hide");
			},5000);
}



function validarkeypress(er,e){
	
	key = e.keyCode;
	
	
    tecla = String.fromCharCode(key);
	
	
    a = er.test(tecla);
	
    if(!a){
	
		e.preventDefault();
    }
	
    
}

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


function pone(pos,accion){
	
	linea=$(pos).closest('tr');


	if(accion==0){
		$("#proceso").text("MODIFICAR");
	}
	else{
		$("#proceso").text("ELIMINAR");
	}
	$("#NombreEvento").val($(linea).find("td:eq(1)").text());
	$("#Logroobtenido").val($(linea).find("td:eq(2)").text());
	$("#fechaevento").val($(linea).find("td:eq(3)").text());
	
	$("#modal1").modal("show");
}



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
    timeout: 10000, 
    success: function (respuesta) {
    
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
      
      if (status == "timeout") {
        
        muestraMensaje("Servidor ocupado, intente de nuevo");
      } else {
        
        muestraMensaje("ERROR: <br/>" + request + status + err);
      }
    },
    complete: function () {},
  });
}

function limpia(){
	$("#NombreEvento").val("");
	$("#Logroobtenido").val("");
	$("#fechaevento").val("");
}