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
			 $o->set_NombreEvento($_POST['NombreEvento']);
			 echo  json_encode($o->eliminar());
		  }
		  else{		  
			  $o->set_NombreEvento($_POST['NombreEvento']);
			  $o->set_logroobtenido($_POST['Logroobtenido']);
			  $o->set_fechaevento($_POST['fechaevento']);
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