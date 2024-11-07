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
	
	
	consultar();
	
	
$("#Nombre_de_evento").on("keypress", function(e){
    validarkeypress(/^[A-Za-z0-9\b\s\u00f1\u00d1\u00E0-\u00FC]*$/, e);
});

$("#Nombre_de_evento").on("keyup", function(){
    validarkeyup(/^[A-Za-z0-9\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
    $(this), $("#sNombre"), "Solo letras y números entre 3 y 30 caracteres");
});
	
	

	






$("#proceso").on("click",function(){
	if($(this).text()=="INCLUIR"){
		if(validarenvio()){
			var datos = new FormData();
			datos.append('accion','incluir');
			datos.append('Nombre_de_evento',$("#Nombre_de_evento").val());
			datos.append('Fecha_del_evento',$("#Fecha_del_evento").val());
			datos.append('Logro_obtenido',$("#Logro_obtenido").val());
			datos.append('categoria',$("#categoria").val());
			datos.append('NombreLA',$("#NombreLA").val());
	
			enviaAjax(datos);
		}
	}
	else if($(this).text()=="MODIFICAR"){
		if(validarenvio()){
			var datos = new FormData();
			datos.append('accion','modificar');
			datos.append('Nombre_de_evento',$("#Nombre_de_evento").val());
			datos.append('Fecha_del_evento',$("#Fecha_del_evento").val());
			datos.append('Logro_obtenido',$("#Logro_obtenido").val());
			datos.append('categoria',$("#categoria").val());
			datos.append('NombreLA',$("#NombreLA").val());
			enviaAjax(datos);
		}
	}
	if($(this).text()=="ELIMINAR"){
		if(validarkeyup(/^[A-Za-z\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/, $("#Nombre_de_evento"), $("#sNombre_de_evento"), "El formato debe ser solo letras entre 3 y 30 caracteres") == 0){
			muestraMensaje("El nombre del evento debe contener solo letras entre 3 y 30 caracteres");
			return false;
		}
		else{
			var datos = new FormData();
			datos.append('accion','eliminar');
			datos.append('Nombre_de_evento',$("#Nombre_de_evento").val());
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
	if(validarkeyup(/^[A-Za-z0-9\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/, $("#Nombre_de_evento"), $("#sNombre_de_evento"), "El formato debe ser solo letras entre 3 y 30 caracteres") == 0){
		muestraMensaje("El nombre del evento debe contener solo letras entre 3 y 30 caracteres");
		return false;
	}

	
	return true;
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
	$("#Nombre_de_evento").val($(linea).find("td:eq(1)").text());
	$("#Fecha_del_evento").val($(linea).find("td:eq(2)").text());
	$("#Logro_obtenido").val($(linea).find("td:eq(3)").text());
	$("#categoria").val($(linea).find("td:eq(4)").text());
	$("#NombreLA").val($(linea).find("td:eq(5)").text());
	
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
	$("#Nombre_de_evento").val("");
	$("#Fecha_del_evento").val("");
	$("#Logro_obtenido").prop("selectedIndex",0);
	$("#categoria").val("selectedIndex",0);
	$("NombreLA").val("");

}