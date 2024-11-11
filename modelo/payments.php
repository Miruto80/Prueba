<?php
require_once('dompdf/vendor/autoload.php'); //archivo para cargar las funciones de la 
//libreria DOMPDF
// lo siguiente es hacer rerencia al espacio de trabajo
use Dompdf\Dompdf;
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
////sdddddddssssssssssssssssssssssssssssssssssss

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
						numeroaccion,
						nombres,
						apellidos,
						id_atleta
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
						'$this->id_atleta'
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
						numeroaccion = '$this->numeroaccion',
						nombres = '$this->nombres',
						apellidos = '$this->apellidos'
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
							$respuesta = $respuesta . "<td>";
							$respuesta = $respuesta . $r['nombres'];
							$respuesta = $respuesta . "</td>";
							$respuesta = $respuesta . "<td>";
							$respuesta = $respuesta . $r['apellidos'];
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
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['id'];
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

	function generarPDF() {
		// Conexión a la base de datos y configuración de errores
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		try {
			// Preparación de la consulta SQL
			$resultado = $co->prepare("SELECT * FROM tpagos WHERE cedula LIKE :cedula AND fechadepago LIKE :fechadepago 
			AND Monto LIKE :Monto AND Comprobantedepago LIKE :Comprobantedepago 
			AND tipopago LIKE :tipopago AND numeroaccion LIKE :numeroaccion AND nombres LIKE :nombres AND apellidos LIKE :apellidos");
			$resultado->bindValue(':cedula', '%' . $this->cedula . '%');
			$resultado->bindValue(':fechadepago', '%' . $this->fechadepago . '%');
			$resultado->bindValue(':Monto', '%' . $this->Monto . '%');
			$resultado->bindValue(':Comprobantedepago', '%' . $this->Comprobantedepago . '%');
			$resultado->bindValue(':tipopago', '%' . $this->tipopago . '%');
			$resultado->bindValue(':numeroaccion', '%' . $this->numeroaccion . '%');
			$resultado->bindValue(':nombres', '%' . $this->nombres . '%');
			$resultado->bindValue(':apellidos', '%' . $this->apellidos . '%');
			$resultado->execute();
			$fila = $resultado->fetchAll(PDO::FETCH_ASSOC);
	
			// Obtener la fecha y hora actuales
			$fechaHoraActual = date('Y-m-d H:i:s');  // Obtén la fecha y hora en formato deseado
	
			// Construcción del contenido HTML para el PDF
			$html = "
				<html>
				<head>
					<style>
						body { font-family: Arial, sans-serif; }
						table { width: 100%; border-collapse: collapse; }
						th, td { border: 1px solid #000; padding: 8px; text-align: center; }
						th { background-color: #FFD700; color: #000; } 
						td { background-color: #FFF; }
						h2 { text-align: center; color: #000; }
					</style>
				</head>
				<body>
					<h2>Reporte de Pagos</h2>
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
	
		// Generación del PDF
		$pdf = new DOMPDF();
		$pdf->set_paper("A4", "portrait");
		$pdf->load_html(utf8_decode($html));
		$pdf->render();
		$pdf->stream('ReportePagos.pdf', array("Attachment" => false));
	}
}