<?php
//llamda al archivo que contiene la clase
//datos, en ella posteriormente se colcora el codigo
//para enlazar a su base de datos
require_once('modelo/datos.php');

//declaracion de la clase usuarios que hereda de la clase datos
//la herencia se declara con la palabra extends y no es mas 
//que decirle a esta clase que puede usar los mismos metodos
//que estan en la clase de dodne hereda (La padre) como sir fueran de el

class records extends datos{
	//el primer paso dentro de la clase
	//sera declarar los atributos (variables) que describen la clase
	//para nostros no es mas que colcoar los inputs (controles) de
	//la vista como variables aca
	//cada atributo debe ser privado, es decir, ser visible solo dentro de la
	//misma clase, la forma de colcoarlo privado es usando la palabra private
	
	private $Nombre_de_evento; //recuerden que en php, las variables no tienen tipo predefinido
	private $Fecha_del_evento;
	private $Logro_obtenido;
	private $categoria;
	
	//Ok ya tenemos los atributos, pero como son privados no podemos acceder a ellos desde fueran
	//por lo que debemos colcoar metodos (funciones) que me permitan leer (get) y colocar (set)
	//valores en ello, esto es  muy mal llamado geters y seters por si alguien se los pregunta
	
	function set_Nombre_de_evento($valor){
		$this->Nombre_de_evento = $valor; //fijencen como se accede a los elementos dentro de una clase
		//this que singnifica esto es decir esta clase luego -> simbolo que indica que apunte
		//a un elemento de this, es decir esta clase
		//luego el Fecha_del_evento del elemento sin el $
	}
	//lo mismo que se hizo para Nombre_de_evento se hace para usuario y clave
	
	function set_Fecha_del_evento($valor){
		$this->Fecha_del_evento = $valor;
	}
	
	function set_Logro_obtenido($valor){
		$this->Logro_obtenido = $valor;
	}

	function set_categoria($valor){
		$this->categoria = $valor;
	}
	
	//ahora la misma cosa pero para leer, es decir get
	
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
	
	
	//Lo siguiente que demos hacer es crear los metodos para incluir, consultar y eliminar
	
	function incluir(){
		//Ok ya tenemos la base de datos y la funcion conecta dentro de la clase
		//datos, ahora debemos ejecutar las operaciones para realizar las consultas 
		
		//Lo primero que debemos hacer es consultar por el campo clave
		//en este caso la Nombre_de_evento, para ello se creo la funcion existe
		//que retorna true en caso de exitir el registro
		$r = array();
		if(!$this->existe($this->Nombre_de_evento)){
			//si estamos aca es porque la Nombre_de_evento no existe es decir se puede incluir
			//los pasos a seguir son
			//1 Se llama a la funcion conecta 
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//2 Se ejecuta el sql
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
		//Listo eso es todo y es igual para el resto de las operaciones
		//incluir, modificar y eliminar
		//solo cambia para buscar 
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