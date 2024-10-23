<?php
  



//Verifica si existe el modelo con el mismo nombre 
if (!is_file("modelo/".$pagina.".php")){
	
	echo "Falta definir la clase ".$pagina;
	exit;
}  
require_once("modelo/".$pagina.".php");  
  if(is_file("vista/".$pagina.".php")){
	  
	  
	  //instanciar es crear una variable local que contiene los metodos de la clase
	  //para poderlos usar
	  
	  

	  
	  
	  if(!empty($_POST)){
		$o = new athletes();   //instancia de clase athletes

		  //Si estamos aca es es porque se recibio alguna informacion
		  //de la vista de atletas por lo que lo primero que debemos hacer ahora que tenemos una 
		  //clase es guardar esos valores en ella con los metodos set
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
			  $o->set_sexo($_POST['sexo']);
			  $o->set_Participacion($_POST['Participacion']);
			  $o->set_Direccion($_POST['Direccion']);
			  $o->set_Correo($_POST['Correo']);
			  $o->set_Telefono($_POST['Telefono']);
			  $o->set_Numerodeaccion($_POST['Numerodeaccion']);
			  $o->set_Cinturon($_POST['Cinturon']);
			  if($accion=='incluir'){
				
				$mensaje = $o->incluir();
				   
				if($mensaje['resultado'] == 'incluir'){
				    
					if(isset($_FILES['imagenarchivo'])){	
						 
					   
						if (($_FILES['imagenarchivo']['size'] / 1024) < 1024) {
							
							  move_uploaded_file($_FILES['imagenarchivo']['tmp_name'], 
							  'img/usuarios/'.$_POST['cedula'].'.png');
							  
						} 
					}
				}
				echo json_encode($mensaje);
				
			  }
			  elseif($accion=='modificar'){
				$mensaje = $o->modificar();
				   if($mensaje['resultado'] == 'modificar'){
				   
					  if(isset($_FILES['imagenarchivo'])){	
					     
						  if (($_FILES['imagenarchivo']['size'] / 1024) < 1024) {
							  
								move_uploaded_file($_FILES['imagenarchivo']['tmp_name'], 
								'img/usuarios/'.$_POST['cedula'].'.png');
								
						  } 
					  }
				  }
				 echo json_encode($mensaje);	
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
