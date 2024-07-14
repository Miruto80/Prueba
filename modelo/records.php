<?php

require_once('modelo/datos.php');



class records extends datos{
	
	
	private $Nombre_de_evento; 
	private $Fecha_del_evento;
	private $Logro_obtenido;
	private $categoria;
	
	
	
	function set_Nombre_de_evento($valor){
		$this->Nombre_de_evento = $valor; 
	}
	
	
	function set_Fecha_del_evento($valor){
		$this->Fecha_del_evento = $valor;
	}
	
	function set_Logro_obtenido($valor){
		$this->Logro_obtenido = $valor;
	}

	function set_categoria($valor){
		$this->categoria = $valor;
	}
	
	
	
	function get_Nombre_de_evento(){
		return $this->Nombre_de_evento;
	}
	
	
	function get_Fecha_del_evento(){
		return $this->Fecha_del_evento;
	}
	
	
	
	function get_Logro_obtenido(){
		return $this->Logro_obtenido;
	}

	function get_categoria(){
		return $this->categoria;
	}
	
	

	
	function incluir(){
		
		$r = array();
		if(!$this->existe($this->Nombre_de_evento)){
			
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			try {
					$co->query("Insert into tlogros(
						Nombre_de_evento,
						Fecha_del_evento,
						Logro_obtenido,
						categoria
						)
						Values(
						'$this->Nombre_de_evento',
						'$this->Fecha_del_evento',
						'$this->Logro_obtenido',
						'$this->categoria'
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
			$r['mensaje'] =  'Ya existe la Nombre_de_evento';
		}
		return $r;
		
	}
	
	function modificar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->Nombre_de_evento)){
			try {
					$co->query("Update tlogros set 
					    Nombre_de_evento = '$this->Nombre_de_evento',
						Fecha_del_evento = '$this->Fecha_del_evento',
						Logro_obtenido = '$this->Logro_obtenido',
						categoria = '$this->categoria'
						where
						Nombre_de_evento = '$this->Nombre_de_evento'
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
			$r['mensaje'] =  'Nombre_de_evento no registrada';
		}
		return $r;
	}
	
	function eliminar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->Nombre_de_evento)){
			try {
					$co->query("delete from tlogros 
						where
						Nombre_de_evento = '$this->Nombre_de_evento'
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
			$r['mensaje'] =  'No existe la Nombre_de_evento';
		}
		return $r;
	}
	
	
	function consultar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			$resultado = $co->query("SELECT * FROM tlogros");
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
					$respuesta .= "<td class='text-center'>{$row['Nombre_de_evento']}</td>";
					$respuesta .= "<td class='text-center'>{$row['Fecha_del_evento']}</td>";
					$respuesta .= "<td class='text-center'>{$row['Logro_obtenido']}</td>";
					$respuesta .= "<td class='text-center'>{$row['categoria']}</td>";
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
	
	
	
	
	private function existe($Nombre_de_evento){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from tlogros where Nombre_de_evento='$Nombre_de_evento'");
			
			
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