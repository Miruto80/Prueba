<?php

require_once('modelo/datos.php');

class  records extends datos

{
	private $Codevento; 
	private $id3;
	private $NombreEvento;
	private $Logroobtenido;


	function set_Codevento($valor)
	{
		$this->Codevento = $valor; 
	}
	
	function set_id3($valor)
	{
		$this->id3 = $valor; 
	}

	function set_NombreEvento($valor)
	{
		$this->NombreEvento = $valor; 
	}

	function set_Logroobtenido($valor)
	{
		$this->Logroobtenido = $valor; 
	}


	function get_Codevento()
	{
		return $this->Codevento;
	}

	function get_id3()
	{
		return $this->id3;
	}

	function get_NombreEvento()
	{
		return $this->NombreEvento;
	}

	function get_Logroobtenido()
	{
		return $this->Logroobtenido;
	}

	function incluir()
	{

		$r = array();
		if (!$this->existe($this->Codevento)) {

			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			try {
				$co->query("Insert into teventos(
						Codevento,
						id3,
						NombreEvento,
						Logroobtenido
						)
						Values(
						'$this->Codevento',
						'$this->id3',
						'$this->NombreEvento',
						'$this->Logroobtenido'
						
						
					   )");

					   $r['resultado'] = 'incluir';
				$r['mensaje'] =  'Registro Inluido';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe el codigo';
		}
		return $r;

	}

	function modificar()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if ($this->existe($this->Codevento)) {
			try {
				$co->query("Update teventos set 
					    Codevento = '$this->Codevento',
						id3 = '$this->id3',
						NombreEvento = '$this->NombreEvento',
						Logroobtenido = '$this->Logroobtenido',
						where
						Codevento = '$this->Codevento'
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
		if ($this->existe($this->Codevento)) {
			try {
				$co->query("delete from teventos
						where
						Codevento = '$this->Codevento'
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

			$resultado = $co->query("Select * from teventos");

			if ($resultado) {

				$respuesta = '';
				foreach ($resultado as $r) {
					$respuesta = $respuesta . "<tr>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . "<button type='button'
					class='btn btn-warning small-width' 
							onclick='pone(this,0)'
						    ><i class='fa-solid fa-pen-to-square'></i></button>";
					$respuesta = $respuesta . "<button type='button'
							class='btn btn-warning small-width' 
							onclick='pone(this,1)'
						    ><i class='fa-solid fa-trash'></i></button><br/>";
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['Codevento'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['id3'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['NombreEvento'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['Logroobtenido'];
					$respuesta = $respuesta . "</td>";
				
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

	private function existe($Codevento){

	
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {

			$resultado = $co->query("Select * from teventos where Codevento='$Codevento'");


			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if ($fila) {

				return true;
			} 
			else {

				return false;;
			}
		} catch (Exception $e) {
			return false;
		}
	}


}