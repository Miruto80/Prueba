<?php
//llamda al archivo que contiene la clase
//datos, en ella posteriormente se colcora el codigo
//para enlazar a su base de datos
require_once('modelo/datos.php');

//declaracion de la clase usuarios que hereda de la clase datos
//la herencia se declara con la palabra extends y no es mas 
//que decirle a esta clase que puede usar los mismos metodos
//que estan en la clase de dodne hereda (La padre) como sir fueran de el

class schedules extends datos{
	//el primer paso dentro de la clase
	//sera declarar los atributos (variables) que describen la clase
	//para nostros no es mas que colcoar los inputs (controles) de
	//la vista como variables aca
	//cada atributo debe ser privado, es decir, ser visible solo dentro de la
	//misma clase, la forma de colcoarlo privado es usando la palabra private
	
	private $CedulaE2; //recuerden que en php, las variables no tienen tipo predefinido
	private $Edad;
	private $Tipodehorario;
	
	//Ok ya tenemos los atributos, pero como son privados no podemos acceder a ellos desde fueran
	//por lo que debemos colcoar metodos (funciones) que me permitan leer (get) y colocar (set)
	//valores en ello, esto es  muy mal llamado geters y seters por si alguien se los pregunta
	
	function set_CedulaE2($valor){
		$this->CedulaE2 = $valor; //fijencen como se accede a los elementos dentro de una clase
		//this que singnifica esto es decir esta clase luego -> simbolo que indica que apunte
		//a un elemento de this, es decir esta clase
		//luego el Edad del elemento sin el $
	}
	//lo mismo que se hizo para CedulaE2 se hace para usuario y clave
	
	
	function set_Edad($valor){
		$this->Edad = $valor;
	}
	
	
	function set_Tipodehorario($valor){
		$this->Tipodehorario = $valor;
	}
	
	//ahora la misma cosa pero para leer, es decir get
	
	function get_CedulaE2(){
		return $this->CedulaE2;
	}
	
	
	function get_Edad(){
		return $this->Edad;
	}
	
	
	
	function get_Tipodehorario(){
		return $this->Tipodehorario;
	}
	
	//Lo siguiente que demos hacer es crear los metodos para incluir, consultar y eliminar
	
	function incluir(){
		//Ok ya tenemos la base de datos y la funcion conecta dentro de la clase
		//datos, ahora debemos ejecutar las operaciones para realizar las consultas 
		
		//Lo primero que debemos hacer es consultar por el campo clave
		//en este caso la CedulaE2, para ello se creo la funcion existe
		//que retorna true en caso de exitir el registro
		$r = array();
		if(!$this->existe($this->CedulaE2)){
			//si estamos aca es porque la CedulaE2 no existe es decir se puede incluir
			//los pasos a seguir son
			//1 Se llama a la funcion conecta 
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//2 Se ejecuta el sql
			try {
					$co->query("Insert into thorarios(
						CedulaE2,
						Edad,
						Tipodehorario
						)
						Values(
						'$this->CedulaE2',
						'$this->Edad',
						'$this->Tipodehorario'
						)");
						$r['resultado'] = 'incluir';
			            $r['mensaje'] =  'Registro Inluido';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe la CedulaE2';
		}
		return $r;
		//Listo eso es todo y es igual para el resto de las operaciones
		//incluir, modificar y eliminar
		//solo cambia para buscar 
	}
	
	function modificar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->CedulaE2)){
			try {
					$co->query("Update thorarios set 
					    CedulaE2 = '$this->CedulaE2',
						Edad = '$this->Edad',
						Tipodehorario = '$this->Tipodehorario'
						where
						CedulaE2 = '$this->CedulaE2'
						");
						$r['resultado'] = 'modificar';
			            $r['mensaje'] =  'Registro Modificado';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'modificar';
			$r['mensaje'] =  'CedulaE2 no registrada';
		}
		return $r;
	}
	
	function eliminar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->CedulaE2)){
			try {
					$co->query("delete from thorarios 
						where
						CedulaE2 = '$this->CedulaE2'
						");
						$r['resultado'] = 'eliminar';
			            $r['mensaje'] =  'Registro Eliminado';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'eliminar';
			$r['mensaje'] =  'No existe la CedulaE2';
		}
		return $r;
	}
	
	
	function consultar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			$resultado = $co->query("SELECT * FROM thorarios");
			if($resultado){
				$respuesta = '';
				foreach($resultado as $row){
					$respuesta .= "<tr>";
					$respuesta .= "<td class='text-center action-column'>";
					$respuesta .= "<button type='button' class='btn btn-warning btn-sm mx-1 my-1' onclick='pone(this,0)'>
								   <i class='fa-solid fa-pen-to-square'></i></button>";
					$respuesta .= "<button type='button' class='btn btn-warning btn-sm mx-1 my-1' onclick='pone(this,1)'>
								   <i class='fa-solid fa-trash'></i></button>";
					$respuesta .= "</td>";
					$respuesta .= "<td class='text-center'>{$row['CedulaE2']}</td>";
					$respuesta .= "<td class='text-center'>{$row['Edad']}</td>";
					$respuesta .= "<td class='text-center'>{$row['Tipodehorario']}</td>";
					$respuesta .= "</tr>";
				}
				$r['resultado'] = 'consultar';
				$r['mensaje'] =  $respuesta;
			} else {
				$r['resultado'] = 'consultar';
				$r['mensaje'] =  '';
			}
		} catch(Exception $e){
			$r['resultado'] = 'error';
			$r['mensaje'] = $e->getMessage();
		}
		return $r;
	}
	
	
	
	
	private function existe($CedulaE2){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from thorarios where CedulaE2='$CedulaE2'");
			
			
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if($fila){

				return true;
			    
			}
			else{
				
				return false;;
			}
			
		}catch(Exception $e){
			return false;
		}
	}
	
	
	
}
?>