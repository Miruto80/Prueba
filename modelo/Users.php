<?php
//llamda al archivo que contiene la clase
//datos
require_once('modelo/datos.php');

//declaracion de la clase usuarios que hereda de la clase datos


class Users extends datos{
	
	//Declararacion de los atributos
	
	private $CedulaU; 
	private $NombreU;
	private $Usuario;
	private $Cargo;
	private $Contrasena;
	
	//Metodos para leer: get metodos para colocar: set 

	function set_CedulaU($valor){
		$this->CedulaU = $valor;
	}
	
	function set_NombreU($valor){
		$this->NombreU = $valor;
	}
	
	function set_Usuario($valor){
		$this->Usuario = $valor;
	}
	
	function set_Cargo($valor){
		$this->Cargo = $valor;
	}
	
	function set_Contrasena($valor){
		$this->Contrasena = $valor;
	}
	
	function get_CedulaU(){
		return $this->CedulaU;
	}
	
	function get_NombreU(){
		return $this->NombreU;
	}
	
	function get_Usuario(){
		return $this->Usuario;
	}
	
	
	function get_Cargo(){
		return $this->Cargo;
	}
	
	function get_Contrasena(){
		return $this->Contrasena;
	}
	
		//Metodos para incluir, consultar y eliminar
	
	function incluir(){
		//Ok ya tenemos la base de datos y la funcion conecta dentro de la clase
		//datos, ahora debemos ejecutar las operaciones para realizar las consultas 
		
		//Lo primero que debemos hacer es consultar por el campo clave
		//en este caso la CedulaU, para ello se creo la funcion existe
		//que retorna true en caso de exitir el registro
		$r = array();
		if(!$this->existe($this->CedulaU)){
			//si estamos aca es porque la CedulaU no existe es decir se puede incluir
			//los pasos a seguir son
			//1 Se llama a la funcion conecta 
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//2 Se ejecuta el sql
			try {
					$co->query("Insert into tusuarios(
						CedulaU,
						NombreU,
						Usuario,
						Cargo,
						Contrasena
						)
						Values(
						'$this->CedulaU',
						'$this->NombreU',
						'$this->Usuario',
						'$this->Cargo',
						'$this->Contrasena'
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
			$r['mensaje'] =  'Ya existe la CedulaU';
		}
		return $r;
	}
	
	function modificar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->CedulaU)){
			try {
					$co->query("Update tusuarios set 
					    CedulaU = '$this->CedulaU',
						NombreU = '$this->NombreU',
						Usuario = '$this->Usuario',
						Cargo = '$this->Cargo',
						Contrasena = '$this->Contrasena'
						where
						CedulaU = '$this->CedulaU'
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
			$r['mensaje'] =  'CedulaU no registrada';
		}
		return $r;
	}
	
	function eliminar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->CedulaU)){
			try {
					$co->query("delete from tusuarios 
						where
						CedulaU = '$this->CedulaU'
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
			$r['mensaje'] =  'No existe la CedulaU';
		}
		return $r;
	}
	
	
	function consultar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			$resultado = $co->query("SELECT * FROM tusuarios");
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
					$respuesta .= "<td class='text-center'>{$row['CedulaU']}</td>";
					$respuesta .= "<td class='text-center'>{$row['NombreU']}</td>";
					$respuesta .= "<td class='text-center'>{$row['Usuario']}</td>";
					$respuesta .= "<td class='text-center'>{$row['Cargo']}</td>";
					$respuesta .= "<td class='text-center'>{$row['Contrasena']}</td>";
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
	
	
	
	
	private function existe($CedulaU){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from tusuarios where CedulaU='$CedulaU'");
			
			
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