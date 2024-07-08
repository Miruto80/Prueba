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
$o = new payments();
//como ya sabemos si estamos aca es //porque se recibio alguna informacion
//de la vista, por lo que lo primero que //debemos hacer ahora que tenemos una
//clase es guardar esos valores en ella //con los metodos set
$accion = $_POST['accion'];

if($accion=='consultar'){
echo json_encode($o->consultar());
}
else if($accion=='obtienefecha23'){
echo json_encode($o->obtienefecha23());
}
elseif($accion=='eliminar'){
$o->set_cedula($_POST['cedula']);
echo json_encode($o->eliminar());
}
else{
$o->set_cedula($_POST['cedula']);
$o->set_fechadepago($_POST['fechadepago']);
$o->set_Monto($_POST['Monto']);
$o->set_Comprobantedepago($_POST['Comprobantedepago']);
if($accion=='incluir'){
echo json_encode($o->incluir());
}
elseif($accion=='modificar'){
echo json_encode($o->modificar());
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