<?php

// verifica que exista el archivo con el mismo nombre en el modelo
if (!is_file("modelo/".$pagina.".php")) {
	echo "Falta definir la clase ".$pagina;
	exit;
}
require_once("modelo/".$pagina.".php");  

if (is_file("vista/".$pagina.".php")) {
	// Instancia la clase schedules una sola vez
	$o = new schedules();

	if (isset($_POST['generar'])) {
		$o->set_cedula($_POST['cedula']);
		$o->set_Edad($_POST['Edad']);
		$o->set_Tipodehorario($_POST['Tipodehorario']);
		$o->set_EntrenadorH($_POST['EntrenadorH']);
		$o->generarPDF();
	}

	if (!empty($_POST)) {
		$accion = $_POST['accion'];
		
		// Condicionales para las diferentes acciones
		if ($accion == 'consultar') {
			echo json_encode($o->consultar());  
		} elseif ($accion == 'obtienefecha') {
			echo json_encode($o->obtienefecha());
		} elseif ($accion == 'eliminar') {
			$o->set_cedula($_POST['cedula']);
			echo json_encode($o->eliminar());
		} elseif ($accion == 'modalclientes') {
			echo json_encode($o->listadodeclientes());
		} else {
			// Set valores adicionales para incluir o modificar
			$o->set_cedula($_POST['cedula']);
			$o->set_Edad($_POST['Edad']);
			$o->set_Tipodehorario($_POST['Tipodehorario']);
			$o->set_EntrenadorH($_POST['EntrenadorH']);
			
			if ($accion == 'incluir') {
				echo json_encode($o->incluir());
			} elseif ($accion == 'modificar') {
				echo json_encode($o->modificar());
			}
		}
		exit;
	}

	require_once("vista/".$pagina.".php");
} else {
	echo "pagina en construccion";
}
?>
