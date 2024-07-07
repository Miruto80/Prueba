<?php
  



//lo primero que se debe hacer es verificar al //igual que en la vista que exista el archivo
if (!is_file("modelo/".$pagina.".php")){
	
	echo "Falta definir la clase ".$pagina;
	exit;
}  
require_once("modelo/".$pagina.".php");  
  if(is_file("vista/".$pagina.".php")){
	  
	  //realizar una instancia de la clase
	  //instanciar es crear una variable local, //que contiene los metodos de la clase
	  //para poderlos usar
	  
	  
	  
	  
	  
	  if(!empty($_POST)){
		$o = new athletes();   
		  //como ya sabemos si estamos aca es //porque se recibio alguna informacion
		  //de la vista, por lo que lo primero que //debemos hacer ahora que tenemos una 
		  //clase es guardar esos valores en ella //con los metodos set
		  $accion = $_POST['accion'];
		  
		  if($accion=='consultar'){
			 echo  json_encode($o->consultar());  
		  }
		  else if($accion=='obtienefecha'){
			 echo json_encode($o->obtienefecha());
		  }
		  elseif($accion=='eliminar'){
			 $o->set_cedula($_POST['cedula']);
			 echo  json_encode($o->eliminar());
		  }
		  else{		  
			  $o->set_cedula($_POST['cedula']);
			  $o->set_apellidos($_POST['apellidos']);
			  $o->set_nombres($_POST['nombres']);
			  $o->set_fechadenacimiento($_POST['fechadenacimiento']);
			//  if(!empty($_POST['sexo'])){
			  $o->set_sexo($_POST['sexo']);
			//  }
			  $o->set_Participacion($_POST['Participacion']);
			  $o->set_Direccion($_POST['Direccion']);
			  $o->set_Correo($_POST['Correo']);
			  $o->set_Telefono($_POST['Telefono']);
			  $o->set_Numerodeaccion($_POST['Numerodeaccion']);
			  $o->set_Cinturon($_POST['Cinturon']);
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
