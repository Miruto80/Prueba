<?php
//llamda al archivo que contiene la clase
//datos, en ella posteriormente se colcora el codigo
//para enlazar a su base de datos
require_once('modelo/datos.php');

//declaracion de la clase usuarios que hereda de la clase datos

class  payments extends datos
{
	//el primer paso dentro de la clase
	//sera declarar los atributos (variables) que describen la clase
	//para nostros no es mas que colcoar los inputs (controles) de
	

	private $cedula; 
	private $fechadepago;
	private $Monto;
	private $Comprobantedepago;
	private $tipopago;
	
	private $numeroaccion;

	//Ok ya tenemos los atributos, pero como son privados no podemos acceder a ellos desde fueran
	//por lo que debemos colcoar metodos (funciones) que me permitan leer (get) y colocar (set)
	//valores en ello, esto es  muy mal llamado geters y seters por si alguien se los pregunta

	function set_cedula($valor)
	{
		$this->cedula = $valor; 
	}
	
	function set_fechadepago($valor)
	{
		$this->fechadepago = $valor;
	}

	function set_Monto($valor)
	{
		$this->Monto = $valor;
	}

	function set_Comprobantedepago($valor)
	{
		$this->Comprobantedepago = $valor;
	}
    
	function set_tipopago($valor)
	{
		$this->tipopago = $valor;
	}
	function set_numeroaccion($valor)
	{
		$this->numeroaccion = $valor;
	}


	function get_cedula()
	{
		return $this->cedula;
	}

	function get_fechadepago()
	{
		return $this->fechadepago;
	}

	function get_Monto()
	{
		return $this->Monto;
	}
		function get_Comprobantedepago()
	{
		return $this->Comprobantedepago;
	}
	
	function get_numeroaccion()
	{
		return $this->numeroaccion;
	}



	//Lo siguiente que demos hacer es crear los metodos para incluir, consultar y eliminar

	function incluir()
	{
		//Ok ya tenemos la base de datos y la funcion conecta dentro de la clase
		//datos, ahora debemos ejecutar las operaciones para realizar las consultas 

		//Lo primero que debemos hacer es consultar por el campo clave
		//en este caso la cedula, para ello se creo la funcion existe
		//que retorna true en caso de exitir el registro
		$r = array();
		if (!$this->existe($this->cedula)) {
			//si estamos aca es porque la cedula no existe es decir se puede incluir
			//los pasos a seguir son
			//1 Se llama a la funcion conecta 
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//2 Se ejecuta el sql
			try {
				$co->query("Insert into tpagos(
						cedula,
						fechadepago,
						Monto,
						Comprobantedepago,
						tipopago,
						numeroaccion
						)
						Values(
						'$this->cedula',
						'$this->fechadepago',
						'$this->Monto',
						'$this->Comprobantedepago',
						'$this->tipopago',
						'$this->numeroaccion'

						)");
				$r['resultado'] = 'incluir';
				$r['mensaje'] =  'Registro Inluido';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe la cedula';
		}
		return $r;
		//Listo eso es todo y es igual para el resto de las operaciones
		//incluir, modificar y eliminar
		//solo cambia para buscar 
	}

	function modificar()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if ($this->existe($this->cedula)) {
			try {
				$co->query("Update tpagos set 
					    cedula = '$this->cedula',
						fechadepago = '$this->fechadepago',
						Monto = '$this->Monto',
						Comprobantedepago = '$this->Comprobantedepago',
						tipopago = '$this->tipopago',
						numeroaccion = '$this->numeroaccion'
						where
						cedula = '$this->cedula'
						");
				$r['resultado'] = 'modificar';
				$r['mensaje'] =  'Registro Modificado';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'modificar';
			$r['mensaje'] =  'Cedula no registrada';
		}
		return $r;
	}

	function eliminar()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if ($this->existe($this->cedula)) {
			try {
				$co->query("delete from tpagos 
						where
						cedula = '$this->cedula'
						");
				$r['resultado'] = 'eliminar';
				$r['mensaje'] =  'Registro Eliminado';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'eliminar';
			$r['mensaje'] =  'No existe la cedula';
		}
		return $r;
	}


	function consultar()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try {

			$resultado = $co->query("Select * from tpagos");

			if ($resultado) {

				$respuesta = '';
				foreach ($resultado as $r) {
					$respuesta = $respuesta . "<tr>";
					$respuesta = $respuesta . "<td class='text-center action-row'>";
					$respuesta = $respuesta . "<button type='button'
					class='btn btn-warning btn-sm mx-1 my-1' 
							onclick='pone(this,0)'
						    ><i class='fa-solid fa-pen-to-square'></i></button>";
					$respuesta = $respuesta . "<button type='button'
							class='btn btn-warning btn-sm mx-1 my-1' 
							onclick='pone(this,1)'
						    ><i class='fa-solid fa-trash'></i></button><br/>";
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['cedula'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['fechadepago'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['Monto'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['Comprobantedepago'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['tipopago'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['numeroaccion'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "</tr>";
				}

				$r['resultado'] = 'consultar';
				$r['mensaje'] =  $respuesta;
			} else {
				$r['resultado'] = 'consultar';
				$r['mensaje'] =  '';
			}
		} catch (Exception $e) {
			$r['resultado'] = 'error';
			$r['mensaje'] =  $e->getMessage();
		}
		return $r;
	}
		
	
	private function existe($cedula){

	
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {

			$resultado = $co->query("Select * from tpagos where cedula='$cedula'");


			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if ($fila) {

				return true;
			} else {

				return false;;
			}
		} catch (Exception $e) {
			return false;
		}
	}



	function obtienefecha23()
	{
		$r = array();

		$f = date('Y-m-d');
		$f1 = strtotime('-18 year', strtotime($f));
		$f1 = date('Y-m-d', $f1);
		$r['resultado'] = 'obtienefecha23';
		$r['mensaje'] =  $f1;

		return $r;
	}
}