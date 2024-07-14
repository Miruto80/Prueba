<?php
  


// verifica al igual que en la vista que exista el archivo con el mismo nombre
if (!is_file("modelo/".$pagina.".php")){
	
	echo "Falta definir la clase ".$pagina;
	exit;
}  
require_once("modelo/".$pagina.".php");  
  if(is_file("vista/".$pagina.".php")){


	  // se instancia la clase 
	  // se crear una variable local que contiene los metodos de la clase
	  // para poderlos usar
	  if(!empty($_POST)){
		$o = new schedules();  // instancia la clase schedules

		  // guardamos en schedules los valores con los metodos set
		  $accion = $_POST['accion'];
		  
		  if($accion=='consultar'){
			 echo  json_encode($o->consultar());  
		  }
		  elseif($accion=='eliminar'){
			 $o->set_CedulaE2($_POST['CedulaE2']);
			 echo  json_encode($o->eliminar());
		  }
		  else{		  
			  $o->set_CedulaE2($_POST['CedulaE2']);
			  $o->set_Edad($_POST['Edad']);
			  $o->set_Tipodehorario($_POST['Tipodehorario']);
			  $o->set_EntrenadorH($_POST['EntrenadorH']);
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
