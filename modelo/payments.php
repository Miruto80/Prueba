<?php
//llamda al archivo que contiene la clase
//datos
require_once('modelo/datos.php');

//declaracion de la clase payments que hereda de la clase datos

class  payments extends datos
{
	
	//Declararacion de los atributos
	
	private $cedula; 
	private $fechadepago;
	private $Monto;
	private $Comprobantedepago;
	private $tipopago;
	
	private $numeroaccion;
	//Metodos para leer: get metodos para colocar: set 

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
	function get_tipopago()
	{
		return $this->tipopago;
	}


	//Metodos para incluir, consultar y eliminar

	function incluir()
	{
		//Ok ya tenemos la base de datos y la funcion conecta dentro de la clase
		//datos, ahora debemos ejecutar las operaciones para realizar las consultas 

		//primeramente consultar que debemos consultar el campo clave
		//en el caso de los atletas la cedula, para ello se creo la funcion existe
		//que retorna true en caso de exitir el registro
		$r = array();
		if (!$this->existe($this->Comprobantedepago)) {
			//Si estamos aca es porque la cedula no existe es decir se puede incluir
			
			//Se llama a la funcion conecta 
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//y Se ejecuta el sql
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
			$r['mensaje'] =  'Ya existe el pago';
		}
		return $r;

	}

	function modificar()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if ($this->existe($this->Comprobantedepago)) {
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
		if ($this->existe($this->Comprobantedepago)) {
			try {
				$co->query("delete from tpagos 
						where
						Comprobantedepago = '$this->Comprobantedepago'
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
		
	
	private function existe($Comprobantedepago){

	
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {

			$resultado = $co->query("Select * from tpagos where Comprobantedepago='$Comprobantedepago'");


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


	function listadodeclientes(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			
			$resultado = $co->query("Select * from tatletas");
			
			if($resultado){
				
				$respuesta = '';
				foreach($resultado as $r){
					$respuesta = $respuesta."<tr style='cursor:pointer' onclick='colocacliente(this);'>";
						$respuesta = $respuesta."<td style='display:none'>";
							$respuesta = $respuesta.$r['id'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['cedula'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['apellidos'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['nombres'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
						$respuesta = $respuesta.$r['Numerodeaccion'];
						$respuesta = $respuesta."</td>";
					$respuesta = $respuesta."</tr>";
				}
				$r['resultado'] = 'modalclientes';
				$r['mensaje'] =  $respuesta;
			    
			}
			else{
				$r['resultado'] = 'modalclientes';
				$r['mensaje'] =  '';
			}
			
		}catch(Exception $e){
			$r['resultado'] = 'error';
			$r['mensaje'] =  $e->getMessage();
		}
		return $r;
	}



	function obtienefecha()
	{
		$r = array();

		$f = date('Y-m-d');
		$f1 = strtotime('-18 year', strtotime($f));
		$f1 = date('Y-m-d', $f1);
		$r['resultado'] = 'obtienefecha';
		$r['mensaje'] =  $f1;

		return $r;
	}
}
