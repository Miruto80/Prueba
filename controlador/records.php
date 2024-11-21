<?php
  
 
if (!is_file("modelo/".$pagina.".php")){
	
	echo "Falta definir la clase ".$pagina;
	exit;
}  
require_once("modelo/".$pagina.".php");  
  if(is_file("vista/".$pagina.".php")){
	   
	
	
	$o = new records();

	if (isset($_POST['generar'])) {
		$o->set_Nombre_de_evento($_POST['Nombre_de_evento']);
		$o->set_Fecha_del_evento($_POST['Fecha_del_evento']);
		$o->set_Logro_obtenido($_POST['Logro_obtenido']);
		$o->set_categoria($_POST['categoria']);
		$o->set_NombreLA($_POST['NombreLA']);
		$o->set_cedula($_POST['cedula']);
		$o->set_apellidos($_POST['apellidos']);
		$o->generarPDF();
	}
	
	$nivelUsuario = $_SESSION['nivel'];
	  if(!empty($_POST)){
		$o = new records();   
	
		  $accion = $_POST['accion'];
		  
		  if($accion=='consultar'){
			echo json_encode($o->consultar($nivelUsuario));
		  }
		  elseif($accion=='eliminar'){
			 $o->set_Fecha_del_evento($_POST['Fecha_del_evento']);
			 echo  json_encode($o->eliminar());
		  }
		  else if ($accion == 'modalclientes') {
			echo  json_encode($o->listadodeclientes());

		}
		  else{		  
			  $o->set_Nombre_de_evento($_POST['Nombre_de_evento']);
			  $o->set_Fecha_del_evento($_POST['Fecha_del_evento']);
			  $o->set_Logro_obtenido($_POST['Logro_obtenido']);
			  $o->set_categoria($_POST['categoria']);
			  $o->set_NombreLA($_POST['NombreLA']);
			  $o->set_cedula($_POST['cedula']);
			  $o->set_apellidos($_POST['apellidos']);
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
