<?php

// llamada al archivo que cntiene clase datos
require_once('modelo/datos.php');

//declaracion de la clase horarios o schendules que hereda la clase datos
class schedules extends datos{
	
// se declaran los atributos o variables en privado
	private $CedulaE2; 
	private $Edad;
	private $Tipodehorario;
	private $EntrenadorH;
	
	
	// se colocan e los atrivutos en funciones set para colocarles valores y manipularlos 
	// con get se leen
	function set_CedulaE2($valor){
		$this->CedulaE2 = $valor; 
	}
	
	function set_Edad($valor){
		$this->Edad = $valor;
	}
	
	function set_Tipodehorario($valor){
		$this->Tipodehorario = $valor;
	}

	function set_EntrenadorH($valor){
		$this->EntrenadorH = $valor;
	}
	

	
	function get_CedulaE2(){
		return $this->CedulaE2;
	}
	
	function get_Edad(){
		return $this->Edad;
	}
	
	function get_Tipodehorario(){
		return $this->Tipodehorario;
	}

	function get_EntrenadorH(){
		return $this->EntrenadorH;
	}
	
	
	//se crean los metodos consultar incluir y eliminar
	
	function incluir(){
		
		$r = array();
		if(!$this->existe($this->CedulaE2)){
			//si CedulaE2 no existe 
			//1 Se llama a la funcion conecta 
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//2 Se ejecuta el sql
			try {
					$co->query("Insert into thorarios(
						CedulaE2,
						Edad,
						Tipodehorario,
						EntrenadorH
						)
						Values(
						'$this->CedulaE2',
						'$this->Edad',
						'$this->Tipodehorario',
						'$this->EntrenadorH'
						)");
						$r['resultado'] = 'incluir';
			            $r['mensaje'] =  'Asignacion exitosa';
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
						Tipodehorario = '$this->Tipodehorario',
						EntrenadorH = '$this->EntrenadorH'
						where
						CedulaE2 = '$this->CedulaE2'
						");
						$r['resultado'] = 'modificar';
			            $r['mensaje'] =  'Modificacion exitosa';
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
			            $r['mensaje'] =  'Eliminado exitosamente';
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
					$respuesta .= "<td class='text-center'>{$row['EntrenadorH']}</td>";
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