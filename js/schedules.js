var datos = new FormData();
datos.append('accion','modalatletas');
enviaAjax(datos);
datos.append('accion','modalentrenadores');
enviaAjax(datos);
//boton para levantar modal de atletas
$("#listadodeatletas").on("click",function(){
	$("#modalatletas").modal("show");
	
});
//boton para levantar modal de entrenadores
$("#listadodeentrenadores").on("click",function(){
	$("#modalentrenadores").modal("show");
	
});

function colocaatleta(linea) {
    $("#cedula").val($(linea).find("td:eq(1)").text());
	$("#nombres").val($(linea).find("td:eq(3)").text());
	$("#apellidos").val($(linea).find("td:eq(2)").text());
	
    
    
    const fechaNac = new Date($(linea).find("td:eq(4)").text()); 
    const hoy = new Date(); // Obtiene la fecha actual
    let edad = hoy.getFullYear() - fechaNac.getFullYear(); // Calcula la diferencia de años
    const mes = hoy.getMonth() - fechaNac.getMonth();

    // Ajuste de la edad si aún no ha pasado el mes o día de cumpleaños de este año
    if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNac.getDate())) {
        edad--;
    }

    // Coloca la edad calculada en el campo correspondiente
    $("#Edad").val(edad);
    
    $("#modalatletas").modal("hide");
}

function colocaentrenador(linea){
	$("#Nombre").val($(linea).find("td:eq(3)").text());
	$("#Apellido").val($(linea).find("td:eq(2)").text());
	$("#modalentrenadores").modal("hide");
}

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

	pone_fecha();
	
	//ejecuta una consulta a la base de datos para llenar la tabla
	consultar();
	
	$("#fechadenacimiento").on("input", function() {
        const fechaNac = new Date($(this).val()); // Obtiene la fecha de nacimiento
        const hoy = new Date(); // Obtiene la fecha actual
        let edad = hoy.getFullYear() - fechaNac.getFullYear(); // Calcula la diferencia de años
        const mes = hoy.getMonth() - fechaNac.getMonth();

        // Ajuste de la edad si aún no ha pasado el mes o día de cumpleaños de este año
        if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNac.getDate())) {
            edad--;
        }

        // Coloca la edad calculada en el campo correspondiente
        $("#Edad").val(edad);
    });

    //validaciones 	
	$("#cedula").on("keypress",function(e){
		validarkeypress(/^[0-9-\b]*$/,e);
	});
	
	$("#cedula").on("keyup",function(){
		validarkeyup(/^[0-9]{7,8}$/,$(this),
		$("#scedula"),"Ingrese una cedula");
	});
	
	$("#Edad").on("keypress", function(e) {
		validarkeypress(/^[0-9\b]*$/, e); 
	});
	
	$("#Edad").on("keyup", function() {
		validarkeyup(/^[0-9]{1,3}$/, $(this), $("#sEdad"), "Edad debe ser un número entre 1 y 120");
		let edad = parseInt($(this).val(), 10);
		if (edad < 1 || edad > 120) {
			$("#sEdad").text("Edad debe ser un número entre 1 y 120");
		} else {
			$("#sEdad").text(""); // Limpiar mensaje de error si la edad es válida
		}
	});

	$("#Nombre").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});
	
	$("#Nombre").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#sNombre"),"Falta rellenar este campo");
	});

	

//CONTROL DE BOTONES
$("#proceso").on("click",function(){
	if($(this).text()=="INCLUIR"){
		if(validarenvio()){
			var datos = new FormData();
			datos.append('accion','incluir');
			datos.append('cedula',$("#cedula").val());
			datos.append('nombres',$("#nombres").val());
			datos.append('apellidos',$("#apellidos").val());
			datos.append('Edad',$("#Edad").val());
			datos.append('Tipodehorario',$("#Tipodehorario").val());		
			datos.append('Nombre',$("#Nombre").val());
			datos.append('Apellido',$("#Apellido").val());
	
			enviaAjax(datos);
		}
	}
	else if($(this).text()=="MODIFICAR"){
		if(validarenvio()){
			var datos = new FormData();
			datos.append('accion','modificar');
			datos.append('cedula',$("#cedula").val());
			datos.append('nombres',$("#nombres").val());
			datos.append('apellidos',$("#apellidos").val());
			datos.append('Edad',$("#Edad").val());
			datos.append('Tipodehorario',$("#Tipodehorario").val());
			datos.append('Nombre',$("#Nombre").val());
			datos.append('Apellido',$("#Apellido").val());
			enviaAjax(datos);
		}
	}
	if($(this).text()=="ELIMINAR"){
		if(validarkeyup(/^[0-9]{7,8}$/,$("#cedula"),
		$("#scedula"),"El formato debe ser de 7 u 8 numeros")==0){
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
		$("#scedula"),"Ingrese una cedula")==0){
	    muestraMensaje("Ingrese una cedula");	
		return false;					
	}	

	else if (!validarkeyup(/^[0-9]{1,3}$/, $("#Edad"), $("#sEdad"), "Edad debe ser un número entre 1 y 120") ||
         parseInt($("#Edad").val(), 10) < 1 || parseInt($("#Edad").val(), 10) > 120) {
    muestraMensaje("Edad debe ser un número entre 1 y 120");
    return false;
    }

	else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$("#Nombre"),$("#sNombre"),"Falta rellenar este campo")==0){
		muestraMensaje("Nombre <br/>Falta rellenar este campo");
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
	$("#nombres").val($(linea).find("td:eq(2)").text());
	$("#apellidos").val($(linea).find("td:eq(3)").text());
	$("#Edad").val($(linea).find("td:eq(4)").text());
	$("#Tipodehorario").val($(linea).find("td:eq(5)").text());
	$("#Nombre").val($(linea).find("td:eq(6)").text());
	$("#Apellido").val($(linea).find("td:eq(7)").text());
	
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
    // console.log(respuesta);
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
		   if(lee.mensaje=='Asignacion exitosa'){
			   $("#modal1").modal("hide");
			   consultar();
		   }
        }
		else if (lee.resultado == "modificar") {
           muestraMensaje(lee.mensaje);
		   if(lee.mensaje=='Modificacion exitosa'){
			   $("#modal1").modal("hide");
			   consultar();
		   }
        }
		else if (lee.resultado == "eliminar") {
           muestraMensaje(lee.mensaje);
		   if(lee.mensaje=='Eliminado exitosamente'){
			   $("#modal1").modal("hide");
			   consultar();
		   }
        }
		else if (lee.resultado == "modalatletas") {
			$("#tablaatletas").html(lee.mensaje);
			
		 }

		else if (lee.resultado == "modalentrenadores") {
			$("#tablaentrenadores").html(lee.mensaje);
			
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
// muestra los imputs limpios a la hora de asignar
function limpia(){
	$("#cedula").val("");
	$("#nombres").val("");
	$("#apellidos").val("");
	$("#Edad").val("");
	$("#Nombre").val("");
	$("#Apellido").val("");
	$("#Tipodehorario").prop("selectedIndex",0);

}