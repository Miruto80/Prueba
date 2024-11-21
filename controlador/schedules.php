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
		$o->set_apellidos($_POST['apellidos']);
		$o->set_nombres($_POST['nombres']);
		$o->set_Edad($_POST['Edad']);
		$o->set_Tipodehorario($_POST['Tipodehorario']);
		$o->set_Apellido($_POST['Apellido']);
		$o->set_Nombre($_POST['Nombre']);
		$o->generarPDF();
		
	}
	$nivelUsuario = $_SESSION['nivel'];
	if(!empty($_POST)){
		// guardamos en schedules los valores con los metodos set
		$accion = $_POST['accion'];
		// Condicionales para las diferentes acciones
		if($accion=='consultar'){
			echo json_encode($o->consultar($nivelUsuario));
		}
		else if($accion=='obtienefecha'){
		  echo json_encode($o->obtienefecha());
	   }
		else if($accion=='eliminar'){
		   $o->set_cedula($_POST['cedula']);
		   echo  json_encode($o->eliminar());
		}
		else if($accion == 'modalatletas'){
		  echo  json_encode($o->listadodeatletas());
	   }
	   else if($accion == 'modalentrenadores'){
		  echo  json_encode($o->listadodeentrenadores());
	   }
		else{		  
			$o->set_cedula($_POST['cedula']);
			$o->set_apellidos($_POST['apellidos']);
	    	$o->set_nombres($_POST['nombres']);
			$o->set_Edad($_POST['Edad']);
			$o->set_Tipodehorario($_POST['Tipodehorario']);
			$o->set_Apellido($_POST['Apellido']);
			$o->set_Nombre($_POST['Nombre']);

			if($accion=='incluir'){
			  echo  json_encode($o->incluir());
			}
			elseif($accion=='modificar'){
			  echo  json_encode($o->modificar());
			}
		}
		exit;
	}
	
	
	require_once("vista/".$pagina.".php"); 
}
else{
	echo "pagina en construccion";
}
?>
