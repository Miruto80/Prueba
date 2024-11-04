<?php
require_once('dompdf/vendor/autoload.php'); //archivo para cargar las funciones de la 
//libreria DOMPDF
// lo siguiente es hacer rerencia al espacio de trabajo
use Dompdf\Dompdf; 
//llamda al archivo que contiene la clase
//datos
require_once('modelo/datos.php');

//declaracion de la clase usuarios que hereda de la clase datos


class trainers extends datos
{

	//Declararacion de los atributos

	private $CedulaE;
	private $Apellido;
	private $Nombre;
	private $Telefono;
	private $Jerarquiadecinturon;

	//Metodos para leer: get metodos para colocar: set 

	function set_CedulaE($valor)
	{
		$this->CedulaE = $valor;
	}

	function set_Apellido($valor)
	{
		$this->Apellido = $valor;
	}

	function set_Nombre($valor)
	{
		$this->Nombre = $valor;
	}

	function set_Telefono($valor)
	{
		$this->Telefono = $valor;
	}

	function set_Jerarquiadecinturon($valor)
	{
		$this->Jerarquiadecinturon = $valor;
	}

	function get_CedulaE()
	{
		return $this->CedulaE;
	}

	function get_Apellido()
	{
		return $this->Apellido;
	}

	function get_Nombre()
	{
		return $this->Nombre;
	}


	function get_Telefono()
	{
		return $this->Telefono;
	}

	function get_Jerarquiadecinturon()
	{
		return $this->Jerarquiadecinturon;
	}

	//Metodos para incluir, consultar y eliminar

	

	function generarPDF()
	{
		// Conectar a la base de datos
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {
			// Preparar la consulta SQL con los filtros necesarios
			$resultado = $co->prepare("SELECT * FROM tentrenadores WHERE 
										CedulaE LIKE :CedulaE AND 
										Nombre LIKE :Nombre AND 
										Apellido LIKE :Apellido AND 
										Telefono LIKE :Telefono AND 
										Jerarquiadecinturon LIKE :Jerarquiadecinturon");
			$resultado->bindValue(':CedulaE', '%' . $this->CedulaE . '%');
			$resultado->bindValue(':Nombre', '%' . $this->Nombre . '%');
			$resultado->bindValue(':Apellido', '%' . $this->Apellido . '%');
			$resultado->bindValue(':Telefono', '%' . $this->Telefono . '%');
			$resultado->bindValue(':Jerarquiadecinturon', '%' . $this->Jerarquiadecinturon . '%');

			$resultado->execute();
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);

			// Comienza a construir el contenido HTML para el PDF
			$html = "<html><head>
						<style>
							body { font-family: Arial, sans-serif; }
							table { width: 100%; border-collapse: collapse; }
							th, td { border: 1px solid #000; padding: 8px; text-align: center; }
							th { background-color: #FFD700; color: #000; } /* Amarillo */
							td { background-color: #FFF; }
							h1 { text-align: center; }
							.logo { display: block; margin: 0 auto; width: 150px; } /* Ajusta el tamaño según sea necesario */
						</style>
					 </head><body>";

			// Título del PDF
			$html .= "<h1>LISTA DE ENTRENADORES</h1>";
			$html .= "<table>";
			$html .= "<thead>";
			$html .= "<tr>";
			$html .= "<th>Cedula</th>";
			$html .= "<th>Nombre</th>";
			$html .= "<th>Apellido</th>";
			$html .= "<th>Telefono</th>";
			$html .= "<th>Jerarquiadecinturon</th>";
			$html .= "</tr>";
			$html .= "</thead>";
			$html .= "<tbody>";

			// Comprobar si hay resultados
			if ($fila) {
				foreach ($fila as $f) {
					$html .= "<tr>";
					$html .= "<td>" . htmlspecialchars($f['CedulaE']) . "</td>";
					$html .= "<td>" . htmlspecialchars($f['Nombre']) . "</td>";
					$html .= "<td>" . htmlspecialchars($f['Apellido']) . "</td>";
					$html .= "<td>" . htmlspecialchars($f['Telefono']) . "</td>";
					$html .= "<td>" . htmlspecialchars($f['Jerarquiadecinturon']) . "</td>";
					$html .= "</tr>";
				}
			} else {
				$html .= "<tr><td colspan='5'>No se encontraron registros.</td></tr>";
			}

			$html .= "</tbody>";
			$html .= "</table>";
			$html .= "</body></html>";
		} catch (Exception $e) {
			// Manejo de excepciones (opcional)
			return "Error al generar el PDF: " . $e->getMessage();
		}

		// Instanciamos un objeto de la clase DOMPDF
		$pdf = new DOMPDF();

		// Definimos el tamaño y orientación del papel
		$pdf->set_paper("A4", "portrait");

		// Cargamos el contenido HTML
		$pdf->load_html(utf8_decode($html));

		// Renderizamos el documento PDF
		$pdf->render();

		// Enviamos el fichero PDF al navegador con el título adecuado
		$pdf->stream('LISTA_DE_ENTRENADORES.pdf', array("Attachment" => false));
	}
}


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



	

	function generarPDF() {
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
	
		$pdf = new DOMPDF();
		$pdf->set_paper("A4", "landscape");  // Cambia a horizontal si hay problemas de espacio
		$pdf->load_html(utf8_decode($html));
		$pdf->render();
		$pdf->stream('LISTA_DE_ATLETAS.pdf', array("Attachment" => false));
	}
	
}

class schedules extends datos
{

	// se declaran los atributos o variables en privado
	private $cedula;
	private $Edad;
	private $Tipodehorario;
	private $Nombre;


	// se colocan los atrivutos en funciones set para colocarles valores y manipularlos 
	// con get se leen
	function set_cedula($valor)
	{
		$this->cedula = $valor;
	}

	function set_Edad($valor)
	{
		$this->Edad = $valor;
	}

	function set_Tipodehorario($valor)
	{
		$this->Tipodehorario = $valor;
	}

	function set_Nombre($valor)
	{
		$this->Nombre = $valor; 
	}



	function get_cedula()
	{
		return $this->cedula;
	}

	function get_Edad()
	{
		return $this->Edad;
	}

	function get_Tipodehorario()
	{
		return $this->Tipodehorario;
	}

	function get_Nombre()
	{
		return $this->Nombre;
	}
	

	

	function generarPDF()
	{
		// Conexión a la base de datos y configuración de errores
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
			// Preparación de la consulta SQL
			$resultado = $co->prepare("SELECT * FROM thorarios WHERE cedula LIKE :cedula AND Edad LIKE :Edad AND Tipodehorario LIKE :Tipodehorario AND Nombre LIKE :Nombre");
			$resultado->bindValue(':cedula', '%' . $this->cedula . '%');
			$resultado->bindValue(':Edad', '%' . $this->Edad . '%');
			$resultado->bindValue(':Tipodehorario', '%' . $this->Tipodehorario . '%');
			$resultado->bindValue(':Nombre', '%' . $this->Nombre . '%');
			$resultado->execute();
			$fila = $resultado->fetchAll(PDO::FETCH_ASSOC);

			// Construcción del contenido HTML para el PDF
			$html = "
				<html>
				<head>
				<style>
							body { font-family: Arial, sans-serif; }
							table { width: 100%; border-collapse: collapse; }
							th, td { border: 1px solid #000; padding: 8px; text-align: center; }
							th { background-color: #FFD700; color: #000; } /* Amarillo */
							td { background-color: #FFF; }
							h1 { text-align: center; }
							.logo { display: block; margin: 0 auto; width: 150px; } /* Ajusta el tamaño según sea necesario */
						</style>
						</head>
				<body>
					<h2 style='text-align:center;'>REPORTE DE HORARIOS</h2>
					<table>
						<thead>
							<tr>
								<th>Cedula</th>
								<th>Edad</th>
								<th>Tipo de Horario</th>
								<th>Entrenador</th>
							</tr>
						</thead>
						<tbody>";

			// Añadiendo filas al HTML
			if ($fila) {
				foreach ($fila as $f) {
					$html .= "
						<tr>
							<td>{$f['cedula']}</td>
							<td>{$f['Edad']}</td>
							<td>{$f['Tipodehorario']}</td>
							<td>{$f['Nombre']}</td>
						</tr>";
				}
			} else {
				$html .= "
						<tr>
							<td colspan='4' style='text-align:center; color:red;'>No se encontraron resultados</td>
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
		$pdf->stream('ReporteUsuarios.pdf', array("Attachment" => false));
	}
}


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


	function generarPDF() {
		// Conexión a la base de datos y configuración de errores
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		try {
			// Preparación de la consulta SQL
			$resultado = $co->prepare("SELECT * FROM tpagos WHERE cedula LIKE :cedula AND fechadepago LIKE :fechadepago 
			AND Monto LIKE :Monto AND Comprobantedepago LIKE :Comprobantedepago 
			AND tipopago LIKE :tipopago AND numeroaccion LIKE :numeroaccion");
			$resultado->bindValue(':cedula', '%' . $this->cedula . '%');
			$resultado->bindValue(':fechadepago', '%' . $this->fechadepago . '%');
			$resultado->bindValue(':Monto', '%' . $this->Monto . '%');
			$resultado->bindValue(':Comprobantedepago', '%' . $this->Comprobantedepago . '%');
			$resultado->bindValue(':tipopago', '%' . $this->tipopago . '%');
			$resultado->bindValue(':numeroaccion', '%' . $this->numeroaccion . '%');
			$resultado->execute();
			$fila = $resultado->fetchAll(PDO::FETCH_ASSOC);
	
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
					<h2>Reporte de Pagos</h2>
					<table>
						<thead>
							<tr>
								<th>Cedula</th>
								<th>Fecha de Pago</th>
								<th>Monto</th>
								<th>Comprobante de Pago</th>
								<th>Tipo de Pago</th>
								<th>Numero de Accion</th>
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
						</tr>";
				}
			} else {
				$html .= "
						<tr>
							<td colspan='4' style='text-align:center; color:red;'>No se encontraron resultados</td>
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



class records extends datos{
	
	
	private $Nombre_de_evento; 
	private $Fecha_del_evento;
	private $Logro_obtenido;
	private $categoria;
	
	
	
	function set_Nombre_de_evento($valor){
		$this->Nombre_de_evento = $valor; 
	}
	
	
	function set_Fecha_del_evento($valor){
		$this->Fecha_del_evento = $valor;
	}
	
	function set_Logro_obtenido($valor){
		$this->Logro_obtenido = $valor;
	}

	function set_categoria($valor){
		$this->categoria = $valor;
	}
	
	
	
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
	


	function generarPDF() {
		// Conexión a la base de datos y configuración de errores
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		try {
			// Preparación de la consulta SQL
			$resultado = $co->prepare("SELECT * FROM tlogros WHERE Nombre_de_evento LIKE :Nombre_de_evento AND Fecha_del_evento LIKE :Fecha_del_evento AND Logro_obtenido LIKE :Logro_obtenido AND categoria LIKE :categoria");
			$resultado->bindValue(':Nombre_de_evento', '%' . $this->Nombre_de_evento . '%');
			$resultado->bindValue(':Fecha_del_evento', '%' . $this->Fecha_del_evento . '%');
			$resultado->bindValue(':Logro_obtenido', '%' . $this->Logro_obtenido . '%');
			$resultado->bindValue(':categoria', '%' . $this->categoria . '%');
			$resultado->execute();
			$fila = $resultado->fetchAll(PDO::FETCH_ASSOC);
	
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
					<table>
						<thead>
							<tr>
								<th>Nombre del Evento</th>
								<th>Fecha del Evento</th>
								<th>Logro Obtenido</th>
								<th>Categoria</th>
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
						</tr>";
				}
			} else {
				$html .= "
						<tr>
							<td colspan='4' style='text-align:center; color:red;'>No se encontraron resultados</td>
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
?>