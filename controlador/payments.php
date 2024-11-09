<?php

//Verifica si existe el modelo con el mismo nombre 
if (!is_file("modelo/" . $pagina . ".php")) {

	echo "Falta definir la clase " . $pagina;
	exit;
}
require_once("modelo/" . $pagina . ".php");
if (is_file("vista/" . $pagina . ".php")) {


	//instanciar es crear una variable local que contiene los metodos de la clase
	//para poderlos usar

	$o = new payments();

	if (isset($_POST['generar'])) {
		$o->set_cedula($_POST['cedula']);
		$o->set_fechadepago($_POST['fechadepago']);
		$o->set_Monto($_POST['Monto']);
		$o->set_Comprobantedepago($_POST['Comprobantedepago']);
		$o->set_tipopago($_POST['tipopago']);
		$o->set_numeroaccion($_POST['numeroaccion']);
		$o->set_nombres($_POST['nombres']);
		$o->set_apellidos($_POST['apellidos']);
		$o->generarPDF();
	}

	



	if (!empty($_POST)) {
		$o = new payments();   //instancia de clase payments

		//Si estamos aca es es porque se recibio alguna informacion
		//de la vista de atletas por lo que lo primero que debemos hacer ahora que tenemos una 
		//clase es guardar esos valores en ella con los metodos set
		$accion = $_POST['accion'];

		if ($accion == 'consultar') {
			echo  json_encode($o->consultar());

		} else if ($accion == 'obtienefecha') {
			echo json_encode($o->obtienefecha());
			
		} elseif ($accion == 'eliminar') {
			$o->set_Comprobantedepago($_POST['Comprobantedepago']);
			echo  json_encode($o->eliminar());

		} else if ($accion == 'modalclientes') {
			echo  json_encode($o->listadodeclientes());

		} else {
			$o->set_cedula($_POST['cedula']);
			$o->set_fechadepago($_POST['fechadepago']);
			$o->set_Monto($_POST['Monto']);
			$o->set_Comprobantedepago($_POST['Comprobantedepago']);
			$o->set_tipopago($_POST['tipopago']);
			$o->set_numeroaccion($_POST['numeroaccion']);
			$o->set_nombres($_POST['nombres']);
			$o->set_apellidos($_POST['apellidos']);

			if ($accion == 'incluir') {
				echo  json_encode($o->incluir());
				
			} elseif ($accion == 'modificar') {
				echo  json_encode($o->modificar());
			}
		}
		exit;
	}


	require_once("vista/" . $pagina . ".php");
} else {
	echo "pagina en construccion";
}
