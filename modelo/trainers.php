<?php
//llamda al archivo que contiene la clase
//datos
require_once('modelo/datos.php');

//declaracion de la clase usuarios que hereda de la clase datos


class trainers extends datos{
	
	//Declararacion de los atributos
	
	private $CedulaE; 
	private $Apellido;
	private $Nombre;
	private $Telefono;
	private $Jerarquiadecinturon;
	
	//Metodos para leer: get metodos para colocar: set 

	function set_CedulaE($valor){
		$this->CedulaE = $valor;
	}
	
	function set_Apellido($valor){
		$this->Apellido = $valor;
	}
	
	function set_Nombre($valor){
		$this->Nombre = $valor;
	}
	
	function set_Telefono($valor){
		$this->Telefono = $valor;
	}
	
	function set_Jerarquiadecinturon($valor){
		$this->Jerarquiadecinturon = $valor;
	}
	
	function get_CedulaE(){
		return $this->CedulaE;
	}
	
	function get_Apellido(){
		return $this->Apellido;
	}
	
	function get_Nombre(){
		return $this->Nombre;
	}
	
	
	function get_Telefono(){
		return $this->Telefono;
	}
	
	function get_Jerarquiadecinturon(){
		return $this->Jerarquiadecinturon;
	}
	
		//Metodos para incluir, consultar y eliminar
	
	function incluir(){
		//Ok ya tenemos la base de datos y la funcion conecta dentro de la clase
		//datos, ahora debemos ejecutar las operaciones para realizar las consultas 
		
		//Lo primero que debemos hacer es consultar por el campo clave
		//en este caso la CedulaE, para ello se creo la funcion existe
		//que retorna true en caso de exitir el registro
		$r = array();
		if(!$this->existe($this->CedulaE)){
			//si estamos aca es porque la CedulaE no existe es decir se puede incluir
			//los pasos a seguir son
			//1 Se llama a la funcion conecta 
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//2 Se ejecuta el sql
			try {
					$co->query("Insert into tentrenadores(
						CedulaE,
						Apellido,
						Nombre,
						Telefono,
						Jerarquiadecinturon
						)
						Values(
						'$this->CedulaE',
						'$this->Apellido',
						'$this->Nombre',
						'$this->Telefono',
						'$this->Jerarquiadecinturon'
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
			$r['mensaje'] =  'Ya existe la CedulaE';
		}
		return $r;
	}
	
	function modificar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->CedulaE)){
			try {
					$co->query("Update tentrenadores set 
					    CedulaE = '$this->CedulaE',
						Apellido = '$this->Apellido',
						Nombre = '$this->Nombre',
						Telefono = '$this->Telefono',
						Jerarquiadecinturon = '$this->Jerarquiadecinturon'
						where
						CedulaE = '$this->CedulaE'
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
			$r['mensaje'] =  'CedulaE no registrada';
		}
		return $r;
	}
	
	function eliminar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->CedulaE)){
			try {
					$co->query("delete from tentrenadores 
						where
						CedulaE = '$this->CedulaE'
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
			$r['mensaje'] =  'No existe la CedulaE';
		}
		return $r;
	}
	
	
	function consultar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			$resultado = $co->query("SELECT * FROM tentrenadores");
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
					$respuesta .= "<td class='text-center'>{$row['CedulaE']}</td>";
					$respuesta .= "<td class='text-center'>{$row['Apellido']}</td>";
					$respuesta .= "<td class='text-center'>{$row['Nombre']}</td>";
					$respuesta .= "<td class='text-center'>{$row['Telefono']}</td>";
					$respuesta .= "<td class='text-center'>{$row['Jerarquiadecinturon']}</td>";
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
	
	
	
	
	private function existe($CedulaE){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from tentrenadores where CedulaE='$CedulaE'");
			
			
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