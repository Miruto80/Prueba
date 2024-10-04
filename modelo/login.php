<?php

require_once('modelo/datos.php');



class entrada extends datos{

	
	private $CedulaU; 
	private $Contrasena;
	
	
	
	
	function set_CedulaU($valor){
		$this->CedulaU = $valor; 
	}
	//lo mismo que se hizo para CedulaU se hace para usuario y Contrasena
	
	function set_Contrasena($valor){
		$this->Contrasena = $valor;
	}
	
	
	
	//ahora la misma cosa pero para leer, es decir get
	
	function get_CedulaU(){
		return $this->CedulaU;
	}
	
	function get_Contrasena(){
		return $this->Contrasena;
	}
	
	
	//Lo siguiente que demos hacer es crear los metodos para incluir, consultar y eliminar
	
	
	
	function existe(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			//grado de instruccion sera el valor que voy 
			//a guadr en $_SESSION, ustedes pueden cambiar por el que sea
			//se usara para determinar que elementos del menu se van a mostrar
			$p = $co->prepare("Select Cargo from tusuarios 
			where 
			CedulaU=:CedulaU
			and 
			Contrasena=:Contrasena");
					$p->bindParam(':CedulaU',$this->CedulaU);		
					$p->bindParam(':Contrasena',$this->Contrasena);
			$p->execute();
			
			$fila = $p->fetchAll(PDO::FETCH_BOTH);
			if($fila){

				$r['resultado'] = 'existe';
			    $r['mensaje'] =  $fila[0][0];
			    
			}
			else{
				$r['resultado'] = 'noexiste';
			    $r['mensaje'] =  "Error en Cedula y/o Contraseña !!!";
			}
			
		}catch(Exception $e){
			$r['resultado'] = 'error';
			$r['mensaje'] =  $e->getMessage();
		}
		return $r;
	}
	
	

	
	
	
}
?>