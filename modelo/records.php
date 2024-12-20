<?php
require_once('dompdf/vendor/autoload.php'); //archivo para cargar las funciones de la 
//libreria DOMPDF
// lo siguiente es hacer rerencia al espacio de trabajo
use Dompdf\Dompdf;
use Dompdf\Options;

require_once('modelo/datos.php');



class records extends datos
{

	private $Nombre_de_evento;
	private $Fecha_del_evento;
	private $Logro_obtenido;
	private $categoria;
	private $NombreLA;
	private $cedula;
	private $apellidos;



	function set_Nombre_de_evento($valor)
	{
		$this->Nombre_de_evento = $valor;
	}


	function set_Fecha_del_evento($valor)
	{
		$this->Fecha_del_evento = $valor;
	}

	function set_Logro_obtenido($valor)
	{
		$this->Logro_obtenido = $valor;
	}

	function set_categoria($valor)
	{
		$this->categoria = $valor;
	}
	function set_NombreLA($valor)
	{
		$this->NombreLA = $valor;
	}
	function set_cedula($valor)
	{
		$this->cedula = $valor;
	}
	function set_apellidos($valor)
	{
		$this->apellidos = $valor;
	}


	//0000000000000000



	function get_Nombre_de_evento()
	{
		return $this->Nombre_de_evento;
	}


	function get_Fecha_del_evento()
	{
		return $this->Fecha_del_evento;
	}



	function get_Logro_obtenido()
	{
		return $this->Logro_obtenido;
	}

	function get_categoria()
	{
		return $this->categoria;
	}

	function get_NombreLA()
	{
		return $this->NombreLA;
	}
	function get_cedula()
	{
		return $this->cedula;
	}
	function get_apellidos()
	{
		return $this->apellidos;
	}




	function incluir()
	{

		$r = array();
		if (!$this->existe($this->Fecha_del_evento)) {

			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			try {
				$co->query("Insert into tlogros(
						Nombre_de_evento,
						Fecha_del_evento,
						Logro_obtenido,
						categoria,
						NombreLA,
						cedula,
						apellidos
						)
						Values(
						'$this->Nombre_de_evento',
						'$this->Fecha_del_evento',
						'$this->Logro_obtenido',
						'$this->categoria',
						'$this->NombreLA',
						'$this->cedula',
						'$this->apellidos'
						)");
				$r['resultado'] = 'incluir';
				$r['mensaje'] =  'Logro Incluido';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Este logro ya se encuentra registrado';
		}
		return $r;
	}

	function modificar()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if ($this->existe($this->Fecha_del_evento)) {
			try {
				$co->query("Update tlogros set 
					    Nombre_de_evento = '$this->Nombre_de_evento',
						Fecha_del_evento = '$this->Fecha_del_evento',
						Logro_obtenido = '$this->Logro_obtenido',
						categoria = '$this->categoria',
						NombreLA = '$this->NombreLA'
						cedula = '$this->cedula'
						apellidos = '$this->apellidos'
						where
						Fecha_del_evento = '$this->Fecha_del_evento'
						");
				$r['resultado'] = 'modificar';
				$r['mensaje'] =  'Logro Modificado';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'modificar';
			$r['mensaje'] =  'Logro no registrado';
		}
		return $r;
	}

	function eliminar()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if ($this->existe($this->Fecha_del_evento)) {
			try {
				$co->query("delete from tlogros 
						where
						Fecha_del_evento = '$this->Fecha_del_evento'
						");
				$r['resultado'] = 'eliminar';
				$r['mensaje'] =  'Logro Eliminado';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'eliminar';
			$r['mensaje'] =  'No existe este logro';
		}
		return $r;
	}


	function consultar($nivelUsuario)
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try {
			$resultado = $co->query("SELECT * FROM tlogros");
			if ($resultado) {
				$respuesta = '';
				foreach ($resultado as $row) {
					$respuesta .= "<tr>";
					if ($nivelUsuario === 'Gerente' || $nivelUsuario === 'Secretaria') {
						$respuesta .= "<td class='text-center action-column'>";
						$respuesta .= "<button type='button' class='btn btn-warning btn-sm mx-1 my-1' onclick='pone(this,0)'>
								   <i class='fa-solid fa-pen-to-square'></i></button>";
						$respuesta .= "<button type='button' class='btn btn-warning btn-sm mx-1 my-1' onclick='pone(this,1)'>
								   <i class='fa-solid fa-trash'></i></button>";
						$respuesta .= "</td>";
					}
					$respuesta .= "<td class='text-center'>{$row['Nombre_de_evento']}</td>";
					$respuesta .= "<td class='text-center'>{$row['Fecha_del_evento']}</td>";
					$respuesta .= "<td class='text-center'>{$row['Logro_obtenido']}</td>";
					$respuesta .= "<td class='text-center'>{$row['categoria']}</td>";
					$respuesta .= "<td class='text-center'>{$row['NombreLA']}</td>";
					$respuesta .= "<td class='text-center'>{$row['apellidos']}</td>";
					$respuesta .= "<td class='text-center'>{$row['cedula']}</td>";
					$respuesta .= "</tr>";
				}
				$r['resultado'] = 'consultar';
				$r['mensaje'] =  $respuesta;
			} else {
				$r['resultado'] = 'consultar';
				$r['mensaje'] =  '';
			}
		} catch (Exception $e) {
			$r['resultado'] = 'error';
			$r['mensaje'] = $e->getMessage();
		}
		return $r;
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




	private function existe($Fecha_del_evento)
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {

			$resultado = $co->query("Select * from tlogros where Fecha_del_evento='$Fecha_del_evento'");


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
			$resultado = $co->prepare("SELECT * FROM tlogros WHERE Nombre_de_evento LIKE :Nombre_de_evento AND Fecha_del_evento LIKE :Fecha_del_evento AND Logro_obtenido LIKE :Logro_obtenido AND categoria LIKE :categoria AND NombreLA LIKE :NombreLA AND cedula LIKE :cedula AND apellidos LIKE :apellidos");
			$resultado->bindValue(':Nombre_de_evento', '%' . $this->Nombre_de_evento . '%');
			$resultado->bindValue(':Fecha_del_evento', '%' . $this->Fecha_del_evento . '%');
			$resultado->bindValue(':Logro_obtenido', '%' . $this->Logro_obtenido . '%');
			$resultado->bindValue(':categoria', '%' . $this->categoria . '%');
			$resultado->bindValue(':NombreLA', '%' . $this->NombreLA . '%');
			$resultado->bindValue(':cedula', '%' . $this->cedula . '%');
			$resultado->bindValue(':apellidos', '%' . $this->apellidos . '%');
			$resultado->execute();
			$fila = $resultado->fetchAll(PDO::FETCH_ASSOC);

			$imageBase64 = imgToBase64('img/logo.png');

			// Construcción del contenido HTML para el PDF
			$html = "
				<html>
				
				<head>
				
					<style>
						body { font-family: Arial, sans-serif; }
						table { width: 100%; border-collapse: collapse; }
						th, td { border: 1px solid #000; padding: 8px; text-align: center; }
						th { background-color: #FFD700; color: #000; } /* Dorado en encabezado */
						td { background-color: #FFF; }
						h2 { text-align: center; color: #000; }
					</style>
				</head>
				<body>
					<h2>Reporte de Logros</h2>
					<center><img src='{$imageBase64}' style='display:block; margin: 0 auto;' width='100' /></center>
					<table>
						<thead>
							<tr>
								<th>Nombre del Evento</th>
								<th>Fecha del Evento</th>
								<th>Logro Obtenido</th>
								<th>Categoria</th>
								<th>Nombre del Atleta</th>
								<th>Cedula del Atleta</th>
								<th>Apellidos del Atleta</th>
							</tr>
						</thead>
						<tbody>";

			// Añadiendo filas al HTML
			if ($fila) {
				foreach ($fila as $f) {
					$html .= "
						<tr>
							<td>{$f['Nombre_de_evento']}</td>
							<td>{$f['Fecha_del_evento']}</td>
							<td>{$f['Logro_obtenido']}</td>
							<td>{$f['categoria']}</td>
							<td>{$f['NombreLA']}</td>
							<td>{$f['cedula']}</td>
							<td>{$f['apellidos']}</td>
						</tr>";
				}
			} else {
				$html .= "
						<tr>
							<td colspan='5' style='text-align:center; color:red;'>No se encontraron resultados</td>
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
