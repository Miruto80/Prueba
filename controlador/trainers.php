<?php
  
//llamada al archivo que contiene la clase
//usuarios, en ella estara el codigo que me //permitirá
//guardar, consultar y modificar dentro de mi base //de datos


//lo primero que se debe hacer es verificar al //igual que en la vista que exista el archivo
if (!is_file("modelo/".$pagina.".php")){
	//alli pregunte que si no es archivo se niega //con !
	//si no existe envio mensaje y me salgo
	echo "Falta definir la clase ".$pagina;
	exit;
}  
require_once("modelo/".$pagina.".php");  
  if(is_file("vista/".$pagina.".php")){
	  
	  //bien si estamos aca es porque existe la //vista y la clase
	  //por lo que lo primero que debemos hace es //realizar una instancia de la clase
	  //instanciar es crear una variable local, //que contiene los metodos de la clase
	  //para poderlos usar
	  
	  
	  $o = new trainers();   
		if(isset($_POST['generar'])){
			$o = new trainers();
			$o->set_CedulaE($_POST['CedulaE']);
			$o->set_Nombre($_POST['Nombre']);
			$o->set_Apellido($_POST['Apellido']);
			$o->set_Telefono($_POST['Telefono']);
			$o->set_Jerarquiadecinturon($_POST['Jerarquiadecinturon']);
			$o->generarPDF();
		}
	  
	  
	  if(!empty($_POST)){
		$o = new trainers();   
		  //como ya sabemos si estamos aca es //porque se recibio alguna informacion
		  //de la vista, por lo que lo primero que //debemos hacer ahora que tenemos una 
		  //clase es guardar esos valores en ella //con los metodos set
		  $accion = $_POST['accion'];
		  
		  if($accion=='consultar'){
			 echo  json_encode($o->consultar());  
		  }
		  elseif($accion=='eliminar'){
			 $o->set_CedulaE($_POST['CedulaE']);
			 echo  json_encode($o->eliminar());
		  }
		  else{		  
			  $o->set_CedulaE($_POST['CedulaE']);
			  $o->set_Apellido($_POST['Apellido']);
			  $o->set_Nombre($_POST['Nombre']);
			  $o->set_Telefono($_POST['Telefono']);
			  $o->set_Jerarquiadecinturon($_POST['Jerarquiadecinturon']);
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
