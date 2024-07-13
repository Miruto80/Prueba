<?php

require_once('modelo/datos.php');

class  records extends datos

{
	private $Codevento; 
	private $id3;
	private $NombreEvento;
	private $Logroobtenido;


	function set_NombreEvento($valor)
	{
		$this->NombreEvento = $valor; 
	}

	function set_Logroobtenido($valor)
	{
		$this->Logroobtenido = $valor; 
	}
    
	function set_fechaevento($valor)
	{
		$this->fechaevento = $valor;
	}

     

	function get_NombreEvento()
	{
		return $this->NombreEvento;
	}

	function get_Logroobtenido()
	{
		return $this->Logroobtenido;
	}

	function get_fechadenacimiento()
	{
		return $this->fechaevento;
	}


	function incluir()
	{

		$r = array();
		if (!$this->existe($this->Codevento)) {

			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			try {
				$co->query("Insert into teventos(
						NombreEvento,
						Logroobtenido,
						fechaevento
						)
						Values(
						'$this->NombreEvento',
						'$this->Logroobtenido',
						'$this->fechaevento'
						
						
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
						NombreEvento = '$this->NombreEvento',
						Logroobtenido = '$this->Logroobtenido',
						fechaevento = '$this->fechaevento'
						where
						NombreEvento = '$this->NombreEvento'
						");

				$r['resultado'] = 'modificar';
				$r['mensaje'] =  'Registro Modificado';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'modificar';
			$r['mensaje'] =  'evento no registrada';
		}
		return $r;
	}

	function eliminar()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if ($this->existe($this->NombreEvento)) {
			try {
				$co->query("delete from teventos
						where
						NombreEvento = '$this->NombreEvento'
						");
				$r['resultado'] = 'eliminar';
				$r['mensaje'] =  'Registro Eliminado';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'eliminar';
			$r['mensaje'] =  'No existe el evento';
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
					$respuesta = $respuesta . $r['NombreEvento'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['Logroobtenido'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['fechaevento'];
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