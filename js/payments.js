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
	//Se destruye el datatablet
	if ($.fn.DataTable.isDataTable("#tablapersona")) {
            $("#tablapersona").DataTable().destroy();
    }
}
function crearDT(){
	//Se crea nuevamente
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
	pone_fecha();

	consultar();
	
//VALIDACION DE DATOS	
$("#cedula").on("keypress",function(e){
	validarkeypress(/^[0-9-\b]*$/,e);
});

$("#cedula").on("keyup",function(){
	validarkeyup(/^[0-9]{7,8}$/,$(this),
	$("#scedula"),"El formato debe ser 9999999 ");
});

$("#fechadepago").on("keypress",function(e){
	validarkeypress(/^[0-9-\b]*$/,e);
});

$("#fechadepago").on("keyup",function(){
	validarkeyup(/^(?:(?:1[6-9]|[2-9]\d)?\d{2})(?:(?:(\/|-|\.)(?:0?[13578]|1[02])\1(?:31))|(?:(\/|-|\.)(?:0?[13-9]|1[0-2])\2(?:29|30)))$|^(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00)))(\/|-|\.)0?2\3(?:29)$|^(?:(?:1[6-9]|[2-9]\d)?\d{2})(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:0?[1-9]|1\d|2[0-8])$/,
	$(this),$("#sfechadepago"),"Ingrese una fecha validaaa");
});

$("#Monto").on("keypress",function(e){
	validarkeypress(/^[0-9-\b]*$/,e);
});

$("#Monto").on("keyup",function(){
	validarkeyup(/^[0-9]{2}$/,$(this),
	$("#sMonto"),"El formato debe ser de 99");
});

$("#Comprobantedepago").on("keypress",function(e){
	validarkeypress(/^[0-9-\b]*$/,e);
});

$("#Comprobantedepago").on("keyup",function(){
	validarkeyup(/^[0-9]{1,8}$/,$(this),
	$("#sComprobantedepago"),"El formato debe ser de 1 a 8");
});

		
//FIN DE VALIDACION DE DATOS



//CONTROL DE BOTONES
$("#proceso").on("click",function(){
	if($(this).text()=="INCLUIR"){
		if(validarenvio()){
			var datos = new FormData();
			datos.append('accion','incluir');
			datos.append('cedula',$("#cedula").val());
			datos.append('fechadepago',$("#fechadepago").val());
			datos.append('Monto',$("#Monto").val());
			datos.append('Comprobantedepago',$("#Comprobantedepago").val());
			datos.append('tipopago',$("#tipopago").val());
			datos.append('numeroaccion',$("#numeroaccion").val());
            
			enviaAjax(datos);
		}
	}
	else if($(this).text()=="MODIFICAR"){
		if(validarenvio()){
			var datos = new FormData();
			datos.append('accion','modificar');
			datos.append('cedula',$("#cedula").val());
			datos.append('fechadepago',$("#fechadepago").val());
			datos.append('Monto',$("#Monto").val());
			datos.append('Comprobantedepago',$("#Comprobantedepago").val());
			datos.append('tipopago',$("#tipopago").val());
			datos.append('numeroaccion',$("#numeroaccion").val());
			
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
	else if(validarkeyup(/^(?:(?:1[6-9]|[2-9]\d)?\d{2})(?:(?:(\/|-|\.)(?:0?[13578]|1[02])\1(?:31))|(?:(\/|-|\.)(?:0?[13-9]|1[0-2])\2(?:29|30)))$|^(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00)))(\/|-|\.)0?2\3(?:29)$|^(?:(?:1[6-9]|[2-9]\d)?\d{2})(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:0?[1-9]|1\d|2[0-8])$/,
		$("#fechadepago"),$("#sfechadepago"),"Ingrese una fecha valida")==0){
		muestraMensaje("Ingrese una fecha valida");
		return false;
	}
	else if(validarkeyup(/^[0-9]{2}$/,$("#Monto"),
	$("#Monto"),"El formato debe ser de 99")==0){
	muestraMensaje("El Monto debe coincidir con el formato <br/>"+ 
					"de 99");	
	return false;					
	}
	
	else {
		var f1 = new Date(1950,1,1 );
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
	$("#fechadepago").val($(linea).find("td:eq(2)").text());
	$("#Monto").val($(linea).find("td:eq(3)").text());
	$("#Comprobantedepago").val($(linea).find("td:eq(4)").text());
	$("#tipopago").val($(linea).find("td:eq(5)").text());
	$("#numeroaccion").val($(linea).find("td:eq(6)").text());
	
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
//Limpia los inputs despues de usarlos 
function limpia(){
	$("#cedula").val("");
	$("#fechadepago").val("");
	$("#Monto").val("");
	$("#Comprobantedepago").val("");
	$("#tipopago").prop("selectedIndex",0);
	$("#numeroaccion").val("");	
}