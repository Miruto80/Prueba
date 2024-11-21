<?php
// Verifica que el archivo del modelo exista
if (!is_file("modelo/" . $pagina . ".php")) {
    echo "Falta definir la clase " . $pagina;
    exit;
}
require_once("modelo/" . $pagina . ".php");

if (is_file("vista/" . $pagina . ".php")) {

    // Procesamiento para entrenadores
    if (isset($_POST['generar'], $_POST['CedulaE'], $_POST['Nombre'])) {
        $trainer = new trainers();
        $trainer->set_CedulaE($_POST['CedulaE']);
        $trainer->set_Nombre($_POST['Nombre']);
        $trainer->generarPDF();
    }

    // Procesamiento para atletas
    elseif (isset($_POST['generar'], $_POST['cedula'], $_POST['nombres'], $_POST['apellidos'], $_POST['Telefono'], $_POST['sexo'], $_POST['fechadenacimiento'], $_POST['Participacion'], $_POST['Direccion'], $_POST['Correo'], $_POST['Numerodeaccion'], $_POST['Cinturon'])) {
        $athlete = new athletes();
        $athlete->set_cedula($_POST['cedula']);
        $athlete->set_nombres($_POST['nombres']);
        $athlete->set_apellidos($_POST['apellidos']);
        $athlete->set_Telefono($_POST['Telefono']);
        $athlete->set_sexo($_POST['sexo']);
        $athlete->set_fechadenacimiento($_POST['fechadenacimiento']);
        $athlete->set_Participacion($_POST['Participacion']);
        $athlete->set_Direccion($_POST['Direccion']);
        $athlete->set_Correo($_POST['Correo']);
        $athlete->set_Numerodeaccion($_POST['Numerodeaccion']);
        $athlete->set_Cinturon($_POST['Cinturon']);
        $athlete->generarPDF();
    }

    // Procesamiento para Horarios
    elseif (isset($_POST['generar'], $_POST['cedula'], $_POST['nombres'], $_POST['apellidos'], $_POST['Edad'], $_POST['Tipodehorario'], $_POST['Nombre'], $_POST['Apellido'])) {
        $schedule = new schedules();
        $schedule->set_cedula($_POST['cedula']);
        $schedule->set_nombres($_POST['nombres']);
        $schedule->set_apellidos($_POST['apellidos']);
        $schedule->set_Edad($_POST['Edad']);
        $schedule->set_Nombre($_POST['Nombre']);
        $schedule->set_Apellido($_POST['Apellido']);
        $schedule->generarPDF();
    }

    // Procesamiento para pagos
    elseif (isset($_POST['generar'], $_POST['cedula'], $_POST['fechadepago'], $_POST['Monto'], $_POST['Comprobantedepago'], $_POST['tipopago'], $_POST['numeroaccion'], $_POST['nombres'], $_POST['apellidos'])) {
        $payment = new payments();
        $payment->set_cedula($_POST['cedula']);
        $payment->set_fechadepago($_POST['fechadepago']);
        $payment->set_Monto($_POST['Monto']);
        $payment->set_Comprobantedepago($_POST['Comprobantedepago']);
        $payment->set_tipopago($_POST['tipopago']);
        $payment->set_numeroaccion($_POST['numeroaccion']);
        $payment->set_nombres($_POST['nombres']);
		$payment->set_apellidos($_POST['apellidos']);
        $payment->set_concepto($_POST['concepto']);
        $payment->generarPDF();
    }

    // Procesamiento para registros
    elseif (isset($_POST['generar'], $_POST['Nombre_de_evento'], $_POST['Fecha_del_evento'], $_POST['Logro_obtenido'], $_POST['categoria'])) {
        $record = new records();
        $record->set_Nombre_de_evento($_POST['Nombre_de_evento']);
        $record->set_Fecha_del_evento($_POST['Fecha_del_evento']);
        $record->set_Logro_obtenido($_POST['Logro_obtenido']);
        $record->set_categoria($_POST['categoria']);
        $record->generarPDF();
    }

    // Incluye la vista correspondiente
    require_once("vista/" . $pagina . ".php");
} else {
    echo "Página en construcción";
}
