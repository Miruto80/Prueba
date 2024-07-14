<?php
  
 
if (!is_file("modelo/".$pagina.".php")){
	
	echo "Falta definir la clase ".$pagina;
	exit;
}  
require_once("modelo/".$pagina.".php");  
  if(is_file("vista/".$pagina.".php")){
	   
	
	
	
	
	
	  
	  
	  
	  
	  
	  if(!empty($_POST)){
		$o = new records();   
	
		  $accion = $_POST['accion'];
		  
		  if($accion=='consultar'){
			 echo  json_encode($o->consultar());  
		  }
		  elseif($accion=='eliminar'){
			 $o->set_Nombre_de_evento($_POST['Nombre_de_evento']);
			 echo  json_encode($o->eliminar());
		  }
		  else{		  
			  $o->set_Nombre_de_evento($_POST['Nombre_de_evento']);
			  $o->set_Fecha_del_evento($_POST['Fecha_del_evento']);
			  $o->set_Logro_obtenido($_POST['Logro_obtenido']);
			  $o->set_categoria($_POST['categoria']);
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
