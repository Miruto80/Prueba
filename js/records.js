
var datos = new FormData();
datos.append("accion", "modalclientes");
enviaAjax(datos);

$("#listadodeclientes").on("click", function () {
  $("#modalclientes").modal("show");
});

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


function colocacliente(linea) {

  $("#NombreLA").val($(linea).find("td:eq(2)").text());
  $("#cedula").val($(linea).find("td:eq(0)").text());
  $("#apellidos").val($(linea).find("td:eq(1)").text());

  $("#modalclientes").modal("hide");
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
    
    // Validación del Nombre del Evento
    $("#Nombre_de_evento").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z0-9\s\u00f1\u00d1\u00E0-\u00FC]$/, e); // Permitir letras y números
    });
    
    $("#Nombre_de_evento").on("keyup", function () {
        validarkeyup(/^[A-Za-z0-9\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/, $(this), $("#sNombre"), "Solo letras y números entre 3 y 30 caracteres");
    });

    // Validación de la Fecha del Evento
    $("#Fecha_del_evento").on("change", function () {
        var valorFecha = $(this).val(); // Captura la fecha en formato AAAA-MM-DD
        
        // Convertir la fecha al formato DD/MM/AAAA
        var partesFecha = valorFecha.split("-");
        var fechaFormateada = partesFecha[2] + "/" + partesFecha[1] + "/" + partesFecha[0];
        
        validarkeyup(/^\d{2}\/\d{2}\/\d{4}$/, $(this), $("#sFecha_del_evento"), "La fecha debe tener el formato correcto (DD/MM/AAAA)", fechaFormateada);
    });

    // Validación del Nombre del Atleta
    $("#NombreLA").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z\s\u00f1\u00d1\u00E0-\u00FC]$/, e); // Permitir solo letras y espacios
    });
    
    $("#NombreLA").on("keyup", function () {
        validarkeyup(/^[A-Za-z\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/, $(this), $("#sNombreLA"), "Solo letras entre 3 y 30 caracteres");
    });
    
    $("#proceso").on("click", function(){
        if ($(this).text() == "INCLUIR") {
            if (validarenvio()) {
                var datos = new FormData();
                datos.append('accion', 'incluir');
                datos.append('Nombre_de_evento', $("#Nombre_de_evento").val());
                datos.append('Fecha_del_evento', $("#Fecha_del_evento").val());
                datos.append('Logro_obtenido', $("#Logro_obtenido").val());
                datos.append('categoria', $("#categoria").val());
                datos.append('NombreLA', $("#NombreLA").val());
                datos.append('cedula', $("#cedula").val());
                datos.append('apellidos', $("#apellidos").val());
                enviaAjax(datos);
            }
        } else if ($(this).text() == "MODIFICAR") {
            if (validarenvio()) {
                var datos = new FormData();
                datos.append('accion', 'modificar');
                datos.append('Nombre_de_evento', $("#Nombre_de_evento").val());
                datos.append('Fecha_del_evento', $("#Fecha_del_evento").val());
                datos.append('Logro_obtenido', $("#Logro_obtenido").val());
                datos.append('categoria', $("#categoria").val());
                datos.append('NombreLA', $("#NombreLA").val());
                datos.append('cadula', $("#cedula").val());
                datos.append('apellidos', $("apellidos").val());
                enviaAjax(datos);
            }
        } else if ($(this).text() == "ELIMINAR") {
            var datos = new FormData();
            datos.append("accion", "eliminar");
            datos.append("Fecha_del_evento", $("#Fecha_del_evento").val());
            enviaAjax(datos);
        }
    });
    
    $("#incluir").on("click", function(){
        limpia();
        $("#proceso").text("INCLUIR");
        $("#modal1").modal("show");
    });
});

function validarenvio() {
    if ($("#proceso").text() === "ELIMINAR") {
        return true; // No validar nada para eliminar
    }

    if (validarkeyup(/^[A-Za-z0-9\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/, $("#Nombre_de_evento"), $("#sNombre"), "Solo letras y números entre 3 y 30 caracteres") == 0) {
        return false;
    }

    var valorFecha = $("#Fecha_del_evento").val();
    var partesFecha = valorFecha.split("-");
    var fechaFormateada = partesFecha[2] + "/" + partesFecha[1] + "/" + partesFecha[0];

    if (validarkeyup(/^\d{2}\/\d{2}\/\d{4}$/, $("#Fecha_del_evento"), $("#sFecha_del_evento"), "La fecha debe tener el formato correcto (DD/MM/AAAA)", fechaFormateada) == 0) {
        return false;
    }

    if (validarkeyup(/^[A-Za-z\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/, $("#NombreLA"), $("#sNombreLA"), "Solo letras entre 3 y 30 caracteres") == 0) {
        return false;
    }

    return true;
}

function validarkeypress(er, e) {
    var key = e.keyCode;
    var tecla = String.fromCharCode(key);
    var a = er.test(tecla);
    if (!a) {
        e.preventDefault();
    }
}

function validarkeyup(er, etiqueta, etiquetamensaje, mensaje, valor = null) {
    var valor = valor || etiqueta.val();
    var a = er.test(valor);
    if (a) {
        etiquetamensaje.text("");
        return 1;
    } else {
        etiquetamensaje.text(mensaje);
        return 0;
    }
}

function muestraMensaje(mensaje){
    $("#contenidodemodal").html(mensaje);
    $("#mostrarmodal").modal("show");
    setTimeout(function() {
        $("#mostrarmodal").modal("hide");
    }, 5000);
}

function pone(pos, accion) {
    var linea = $(pos).closest('tr');
    if (accion == 0) {
        $("#proceso").text("MODIFICAR");
    } else {
        $("#proceso").text("ELIMINAR");
    }
    $("#Nombre_de_evento").val($(linea).find("td:eq(1)").text());
    $("#Fecha_del_evento").val($(linea).find("td:eq(2)").text());
    $("#Logro_obtenido").val($(linea).find("td:eq(3)").text());
    $("#categoria").val($(linea).find("td:eq(4)").text());
    $("#NombreLA").val($(linea).find("td:eq(5)").text());
    $("#cedula").val($(linea).find("td:eq(6)").text());
    $("#apellidos").val($(linea).find("td:eq(7)").text());
    
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
                } else if (lee.resultado == "incluir") {
                    muestraMensaje(lee.mensaje);
                    if (lee.mensaje == 'Logro Incluido') {
                        $("#modal1").modal("hide");
                        consultar();
                    }
                } else if (lee.resultado == "modificar") {
                    muestraMensaje(lee.mensaje);
                    if (lee.mensaje == 'Logro Modificado') {
                        $("#modal1").modal("hide");
                        consultar();
                    }
                } else if (lee.resultado == "eliminar") {
                    muestraMensaje(lee.mensaje);
                    if (lee.mensaje == 'Logro Eliminado') {
                        $("#modal1").modal("hide");
                        consultar();
                    }
                } else if (lee.resultado == "modalclientes") {
                    $("#tablaclientes").html(lee.mensaje);
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

function limpia() {
    $("#Nombre_de_evento").val("");
    $("#Fecha_del_evento").val("");
    $("#NombreLA").val("");
    $("#cedula").val("");
    $("#apellidos").val("");
    $("#Logro_obtenido").prop("selectedIndex", 0);
    $("#categoria").val("selectedIndex", 0);
}
