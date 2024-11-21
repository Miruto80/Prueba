<?php
require_once('dompdf/vendor/autoload.php'); //archivo para cargar las funciones de la 
//libreria DOMPDF
// lo siguiente es hacer rerencia al espacio de trabajo

use Dompdf\Dompdf;
use Dompdf\Options;
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
	private $nombres;
	private $apellidos;
	private $id_atleta;
	private $concepto;

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

	function set_nombres($valor)
	{
		$this->nombres = $valor;
	}
	function set_apellidos($valor)
	{
		$this->apellidos = $valor;
	}
	function set_id_atleta($valor)
	{
		$this->id_atleta = $valor;
	}
	function set_concepto($valor)
	{
		$this->concepto = $valor;
	}

	////sssssssssssssssssssssssssssssssssssss

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
	function get_nombres()
	{
		return $this->nombres;
	}
	function get_apellidos()
	{
		return $this->apellidos;
	}
	function get_id_atleta()
	{
		return $this->id_atleta;
	}
	function get_concepto()
	{
		return $this->concepto;
	}




	function incluir()
	{

		$r = array();

		if (($this->tipopago == 'transferencia' || $this->tipopago == 'Pago movil' || $this->tipopago == 'Efectivo') && $this->Comprobantedepago == '') {
			$r['resultado'] = 'error';
			$r['mensaje'] = 'El comprobante de pago no puede estar vacío';
			return $r;
		}

		// if (!$this->existe($this->Comprobantedepago)) {
		if (!$this->existe($this->Comprobantedepago)) {

			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			try {
				$co->query("Insert into tpagos(
						cedula,
						fechadepago,
						Monto,
						Comprobantedepago,
						tipopago,
						numeroaccion,
						nombres,
						apellidos,
						id_atleta,
						concepto
						)
						Values(
						'$this->cedula',
						'$this->fechadepago',
						'$this->Monto',
						'$this->Comprobantedepago',
						'$this->tipopago',
						'$this->numeroaccion',
						'$this->nombres',
						'$this->apellidos',
						'$this->id_atleta',
						'$this->concepto'
						
						)");
				$r['resultado'] = 'incluir';
				$r['mensaje'] =  'Pago Inluido';
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
						numeroaccion = '$this->numeroaccion',
						nombres = '$this->nombres',
						apellidos = '$this->apellidos',
						concepto = '$this->concepto'
						where
						cedula = '$this->cedula'
						");
				$r['resultado'] = 'modificar';
				$r['mensaje'] =  'Pago Modificado';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'modificar';
			$r['mensaje'] =  'Accion no permitida !!ELIMINE el registro!!';
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
				$r['mensaje'] =  'Pago Eliminado';
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

	function consultar($nivelUsuario)
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
					if ($nivelUsuario === 'Gerente' || $nivelUsuario === 'Secretaria') {
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
					}
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
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['nombres'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['apellidos'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['concepto'];
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


	private function existe($Comprobantedepago)
	{


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



	function listadodeclientes()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try {

			$resultado = $co->query("Select * from tatletas");

			if ($resultado) {

				$respuesta = '';
				foreach ($resultado as $r) {
					$respuesta = $respuesta . "<tr style='cursor:pointer' onclick='colocacliente(this);'>";

					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['cedula'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['apellidos'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['nombres'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['Numerodeaccion'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['id'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "</tr>";
				}
				$r['resultado'] = 'modalclientes';
				$r['mensaje'] =  $respuesta;
			} else {
				$r['resultado'] = 'modalclientes';
				$r['mensaje'] =  '';
			}
		} catch (Exception $e) {
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


	function generarPDF()
	{
		// Conexión a la base de datos y configuración de errores
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		function imgToBase64($imgPath)
		{
			// Verifica si la imagen existe
			if (file_exists($imgPath)) {
				// Obtiene el contenido de la imagen
				$imgData = file_get_contents($imgPath);

				// Codifica la imagen a base64
				$base64 = base64_encode($imgData);

				// Retorna el formato base64 con el prefijo correspondiente para imágenes
				return 'data:img/logo.png;base64,' . $base64; // Si la imagen es PNG
			} else {
				return ''; // Si la imagen no existe, retorna una cadena vacía
			}
		}

		try {
			// Preparación de la consulta SQL
			$resultado = $co->prepare("SELECT * FROM tpagos WHERE cedula LIKE :cedula AND fechadepago LIKE :fechadepago 
			AND Monto LIKE :Monto AND Comprobantedepago LIKE :Comprobantedepago 
			AND tipopago LIKE :tipopago AND numeroaccion LIKE :numeroaccion AND nombres LIKE :nombres AND apellidos LIKE :apellidos AND concepto LIKE :concepto");
			$resultado->bindValue(':cedula', '%' . $this->cedula . '%');
			$resultado->bindValue(':fechadepago', '%' . $this->fechadepago . '%');
			$resultado->bindValue(':Monto', '%' . $this->Monto . '%');
			$resultado->bindValue(':Comprobantedepago', '%' . $this->Comprobantedepago . '%');
			$resultado->bindValue(':tipopago', '%' . $this->tipopago . '%');
			$resultado->bindValue(':numeroaccion', '%' . $this->numeroaccion . '%');
			$resultado->bindValue(':nombres', '%' . $this->nombres . '%');
			$resultado->bindValue(':apellidos', '%' . $this->apellidos . '%');
			$resultado->bindValue(':concepto', '%' . $this->concepto . '%');
			$resultado->execute();
			
			$fila = $resultado->fetchAll(PDO::FETCH_ASSOC);

			$imageBase64 = imgToBase64('img/logo.png');

			// Obtener la fecha y hora actuales
			$fechaHoraActual = date('Y-m-d H:i:s');  // Obtén la fecha y hora en formato deseado

			// Construcción del contenido HTML para el PDF
			$html = "
				<html>
				<head>
				
					<style>
							body { font-family: Arial, sans-serif; font-size: 10px; }
							table { width: 100%; border-collapse: collapse; table-layout: fixed; }
							th, td { border: 1px solid #000; padding: 4px; text-align: center; word-wrap: break-word; }
							th { background-color: #FFD700; color: #000; }
							td { background-color: #FFF; }
							h1 { text-align: center; font-size: 16px; }
						</style>
				</head>
				<body>
					<center><h2>Reporte de Pagos</h2></center>
					 
                <center><img src='{$imageBase64}' style='display:block; margin: 0 auto;' width='100' /></center>

					<p><strong>Fecha y Hora de Expedicion: </strong>{$fechaHoraActual}</p> 
					<table>
						<thead>
							<tr>
								<th>Cedula</th>
								<th>Fecha de Pago</th>
								<th>Monto</th>
								<th>Comprobante de Pago</th>
								<th>Tipo de Pago</th>
								<th>Numero de Accion</th>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>concepto</th>
							</tr>
						</thead>
						<tbody>";

			// Añadiendo filas al HTML
			if ($fila) {
				foreach ($fila as $f) {
					$html .= "
						<tr>
							<td>{$f['cedula']}</td>
							<td>{$f['fechadepago']}</td>
							<td>{$f['Monto']}</td>
							<td>{$f['Comprobantedepago']}</td>
							<td>{$f['tipopago']}</td>
							<td>{$f['numeroaccion']}</td>
							<td>{$f['nombres']}</td>
							<td>{$f['apellidos']}</td>
							<td>{$f['concepto']}</td>
						</tr>";
				}
			} else {
				$html .= "
						<tr>
							<td colspan='8' style='text-align:center; color:red;'>No se encontraron resultados</td>
						</tr>";
			}

			// Finalización del HTML
			$html .= "
						</tbody>
					</table>
				</body>
				</html>";
		} catch (Exception $e) {
			// Manejo de errores
			echo "Error: " . $e->getMessage();
			exit;
		}

		$options = new Options();
		$options->set('isHtml5ParserEnabled', true);
		$options->set('isPhpEnabled', true);
		$pdf = new Dompdf($options);

		// Generación del PDF
		$pdf = new DOMPDF();
		$pdf->set_paper("A4", "portrait");
		$pdf->load_html(utf8_decode($html));
		$pdf->render();
		$pdf->stream('ReportePagos.pdf', array("Attachment" => false));
	}
}
