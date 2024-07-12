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
	
	$("#Codevento").on("keypress",function(e){
		validarkeypress(/^[0-9-\b]*$/,e);
	});
	
	$("#Codevento").on("keyup",function(){
		validarkeyup(/^[0-9]{4}$/,$(this),
		$("#sCodevento"),"El formato debe ser 9999 ");
	});
	
	
	$("#id3").on("keypress", function(e) {
		validarkeypress(/^[0-9\b]*$/, e); 
	});
	
	$("#id3").on("keyup",function(){
		validarkeyup(/^[0-9]{2}$/,$(this),
		$("#sid3"),"El formato debe ser 99 ");
	});

$("#proceso").on("click",function(){
	if($(this).text()=="INCLUIR"){
		if(validarenvio()){
			var datos = new FormData();
			datos.append('accion','incluir');
			datos.append('Codevento',$("#Codevento").val());
			datos.append('id3',$("#id3").val());
			datos.append('NombreEvento',$("#NombreEvento").val());
			datos.append('Logroobtenido',$("#Logroobtenido").val());
			enviaAjax(datos);
		}
	}
	else if($(this).text()=="MODIFICAR"){
		if(validarenvio()){
			var datos = new FormData();
			datos.append('accion','modificar');
			datos.append('Codevento',$("#Codevento").val());
			datos.append('id3',$("#id3").val());
			datos.append('NombreEvento',$("#NombreEvento").val());
			datos.append('Logroobtenido',$("#Logroobtenido").val());
			enviaAjax(datos);
		}
	}
	if($(this).text()=="ELIMINAR"){
		if(validarkeyup(/^[0-9]{4}$/,$("#Codevento"),
		$("#sCodevento"),"El formato debe ser 9999")==0){
	    muestraMensaje("La Codevento debe coincidir con el formato <br/>"+ "9999");	
		
	    }
		else{
			var datos = new FormData();
			datos.append('accion','eliminar');
			datos.append('Codevento',$("#Codevento").val());
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
	if(validarkeyup(/^[0-9]{4}$/,$("#Codevento"),
		$("#sCodevento"),"El formato debe ser 9999")==0){
	    muestraMensaje("El Codevento debe coincidir con el formato <br/>"+ 
						"9999");	
		return false;					
	}	

	else if (!validarkeyup(/^[0-9]{4}$/, $("#id3"), $("#sid3"), 
    $("#sid3"),"El formato debe ser 9999")==0){
	    muestraMensaje("El id3 debe coincidir con el formato <br/>"+ 
					"9999");	
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
	$("#Codevento").val($(linea).find("td:eq(1)").text());
	$("#id3").val($(linea).find("td:eq(2)").text());
	$("#NombreEvento").val($(linea).find("td:eq(3)").text());
	$("#Logroobtenido").val($(linea).find("td:eq(4)").text());
	
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
	$("#Codevento").val("");
	$("#id3").val("");
	$("#NombreEvento").val("");
	$("#Logroobtenido").val("");
}