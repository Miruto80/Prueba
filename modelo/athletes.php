<?php
require_once('dompdf/vendor/autoload.php'); //archivo para cargar las funciones de la 
//libreria DOMPDF
// lo siguiente es hacer rerencia al espacio de trabajo
use Dompdf\Dompdf;
use Dompdf\Options;
//llamda al archivo que contiene la clase
//datos
require_once('modelo/datos.php');

//declaracion de la clase athletes o atletas que hereda de la clase datos

class  athletes extends datos
{
	
	//Declararacion de los atributos
	

	private $cedula; 
	private $apellidos;
	private $nombres;
	private $fechadenacimiento;
	private $sexo;
	private $Participacion;
	private $Direccion;
	private $Correo;
	private $Telefono;
	private $Numerodeaccion;
	private $Cinturon;

	//Metodos para leer: get metodos para colocar: set 

	function set_cedula($valor)
	{
		$this->cedula = $valor; 
	}
	
	function set_apellidos($valor)
	{
		$this->apellidos = $valor;
	}

	function set_nombres($valor)
	{
		$this->nombres = $valor;
	}

	function set_fechadenacimiento($valor)
	{
		$this->fechadenacimiento = $valor;
	}

	function set_sexo($valor)
	{
		$this->sexo = $valor;
	}

	function set_Participacion($valor)
	{
		$this->Participacion = $valor;
	}

	function set_Direccion($valor)
	{
		$this->Direccion = $valor;
	}

	function set_Correo($valor)
	{
		$this->Correo = $valor;
	}

	function set_Telefono($valor)
	{
		$this->Telefono = $valor;
	}
	function set_Numerodeaccion($valor)
	{
		$this->Numerodeaccion = $valor;
	}
	function set_Cinturon($valor)
	{
		$this->Cinturon = $valor;
	}


	function get_cedula()
	{
		return $this->cedula;
	}

	function get_apellidos()
	{
		return $this->apellidos;
	}

	function get_nombres()
	{
		return $this->nombres;
	}

	function get_fechadenacimiento()
	{
		return $this->fechadenacimiento;
	}

	function get_sexo()
	{
		return $this->sexo;
	}

	function get_Participacion()
	{
		return $this->Participacion;
	}

	function get_Direccion()
	{
		return $this->Direccion;
	}

	function get_Correo()
	{
		return $this->Correo;
	}

	function get_Telefono()
	{
		return $this->Telefono;
	}
	function get_Numerodeaccion()
	{
		return $this->Numerodeaccion;
	}
	function get_Cinturon()
	{
		return $this->Cinturon;
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
		if (!$this->existe($this->cedula)) {
			//Si estamos aca es porque la cedula no existe es decir se puede incluir
			
			//Se llama a la funcion conecta 
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//y Se ejecuta el sql
			try {
				$co->query("Insert into tatletas(
						cedula,
						apellidos,
						nombres,
						fechadenacimiento,
						sexo,
						Participacion,
						Direccion,
						Correo,
						Telefono,
						Numerodeaccion,
						Cinturon
						)
						Values(
						'$this->cedula',
						'$this->apellidos',
						'$this->nombres',
						'$this->fechadenacimiento',
						'$this->sexo',
						'$this->Participacion',
						'$this->Direccion',
						'$this->Correo',
						'$this->Telefono',
						'$this->Numerodeaccion',
						'$this->Cinturon'

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

	}

	function modificar()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if ($this->existe($this->cedula)) {
			try {
				$co->query("Update tatletas set 
					    cedula = '$this->cedula',
						apellidos = '$this->apellidos',
						nombres = '$this->nombres',
						fechadenacimiento = '$this->fechadenacimiento',
						sexo = '$this->sexo',
						Participacion = '$this->Participacion',
						Direccion = '$this->Direccion',
						Correo = '$this->Correo',
						Telefono = '$this->Telefono',
						Numerodeaccion = '$this->Numerodeaccion',
						Cinturon = '$this->Cinturon'
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
				$co->query("delete from tatletas 
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


	function consultar($nivelUsuario)
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try {

			$resultado = $co->query("Select * from tatletas");

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
						    ><i class='fa-solid fa-trash'></i></button>";
				    $respuesta = $respuesta . "<button type='button'
							class='btn btn-warning btn-sm mx-1 my-1' 
							onclick='mostrarImagen2(".$r['cedula'].")'
						    ><i class='fa-solid fa-camera'></i></button><br/>";	
					$respuesta = $respuesta . "</td>";
					}
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
					$respuesta = $respuesta . $r['fechadenacimiento'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['sexo'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['Participacion'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['Direccion'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['Correo'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['Telefono'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['Numerodeaccion'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['Cinturon'];
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

			$resultado = $co->query("Select * from tatletas where cedula='$cedula'");


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


	function generarPDF() {
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
			$resultado = $co->prepare("SELECT * FROM tatletas WHERE 
										cedula LIKE :cedula AND 
										nombres LIKE :nombres AND 
										apellidos LIKE :apellidos AND 
										Telefono LIKE :Telefono AND 
										sexo LIKE :sexo AND 
										fechadenacimiento LIKE :fechadenacimiento AND 
										Participacion LIKE :Participacion AND 
										Direccion LIKE :Direccion AND 
										Correo LIKE :Correo AND 
										Numerodeaccion LIKE :Numerodeaccion AND 
										Cinturon LIKE :Cinturon");
			$resultado->bindValue(':cedula', '%' . $this->cedula . '%');
			$resultado->bindValue(':nombres', '%' . $this->nombres . '%');
			$resultado->bindValue(':apellidos', '%' . $this->apellidos . '%');
			$resultado->bindValue(':Telefono', '%' . $this->Telefono . '%');
			$resultado->bindValue(':sexo', '%' . $this->sexo . '%');
			$resultado->bindValue(':fechadenacimiento', '%' . $this->fechadenacimiento . '%');
			$resultado->bindValue(':Participacion', '%' . $this->Participacion . '%');
			$resultado->bindValue(':Direccion', '%' . $this->Direccion . '%');
			$resultado->bindValue(':Correo', '%' . $this->Correo . '%');
			$resultado->bindValue(':Numerodeaccion', '%' . $this->Numerodeaccion . '%');
			$resultado->bindValue(':Cinturon', '%' . $this->Cinturon . '%');

			
			$fechaHoraActual = date('Y-m-d H:i:s');

			$imageBase64 = imgToBase64('img/logo.png');
	
			$resultado->execute();
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
	
			$html = "<html><head>

			 
						<style>
							body { font-family: Arial, sans-serif; font-size: 10px; }
							table { width: 100%; border-collapse: collapse; table-layout: fixed; }
							th, td { border: 1px solid #000; padding: 4px; text-align: center; word-wrap: break-word; }
							th { background-color: #FFD700; color: #000; }
							td { background-color: #FFF; }
							h1 { text-align: center; font-size: 16px; }
						</style>
					 </head><body>";
	
			$html .= "<h1>LISTA DE ATLETAS</h1>";
			$html .= "<center><img src='{$imageBase64}' style='display:block; margin: 0 auto;' width='100' /></center>";
			$html .= "<p><strong>Fecha y Hora de Expedicion: </strong>{$fechaHoraActual}</p>";
			$html .= "<table>";
			$html .= "<thead><tr>";
			$html .= "<th style='width:10%'>Cedula</th>";
			$html .= "<th style='width:12%'>Nombre</th>";
			$html .= "<th style='width:12%'>Apellido</th>";
			$html .= "<th style='width:10%'>Telefono</th>";
			$html .= "<th style='width:6%'>Sexo</th>";
			$html .= "<th style='width:12%'>Fecha de Nacimiento</th>";
			$html .= "<th style='width:12%'>Participacion</th>";
			$html .= "<th style='width:16%'>Direccion</th>";
			$html .= "<th style='width:10%'>Correo</th>";
			$html .= "<th style='width:10%'>Numero de Accion</th>";
			$html .= "<th style='width:10%'>Cinturon</th>";
			$html .= "</tr></thead>";
			$html .= "<tbody>";
	
			if ($fila) {
				foreach ($fila as $f) {
					$html .= "<tr>";
					$html .= "<td>" . htmlspecialchars($f['cedula']) . "</td>";
					$html .= "<td>" . htmlspecialchars($f['nombres']) . "</td>";
					$html .= "<td>" . htmlspecialchars($f['apellidos']) . "</td>";
					$html .= "<td>" . htmlspecialchars($f['Telefono']) . "</td>";
					$html .= "<td>" . htmlspecialchars($f['sexo']) . "</td>";
					$html .= "<td>" . htmlspecialchars($f['fechadenacimiento']) . "</td>";
					$html .= "<td>" . htmlspecialchars($f['Participacion']) . "</td>";
					$html .= "<td>" . htmlspecialchars($f['Direccion']) . "</td>";
					$html .= "<td>" . htmlspecialchars($f['Correo']) . "</td>";
					$html .= "<td>" . htmlspecialchars($f['Numerodeaccion']) . "</td>";
					$html .= "<td>" . htmlspecialchars($f['Cinturon']) . "</td>";
					$html .= "</tr>";
				}
			} else {
				$html .= "<tr><td colspan='9'>No se encontraron registros.</td></tr>";
			}
	
			$html .= "</tbody></table></body></html>";
		} catch (Exception $e) {
			return "Error al generar el PDF: " . $e->getMessage();
		}
		$options = new Options();
		$options->set('isHtml5ParserEnabled', true);
		$options->set('isPhpEnabled', true);
		$pdf = new Dompdf($options);
	
		$pdf = new DOMPDF();
		$pdf->set_paper("A4", "landscape");  // Cambia a horizontal si hay problemas de espacio
		$pdf->load_html(utf8_decode($html));
		$pdf->render();
		$pdf->stream('LISTA_DE_ATLETAS.pdf', array("Attachment" => false));
	}
	
}
