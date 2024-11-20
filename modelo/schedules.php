<?php
require_once('dompdf/vendor/autoload.php'); //archivo para cargar las funciones de la 
//libreria DOMPDF
// lo siguiente es hacer rerencia al espacio de trabajo
use Dompdf\Dompdf;
// llamada al archivo que cntiene clase datos
require_once('modelo/datos.php');

//declaracion de la clase horarios o schendules que hereda la clase datos
class schedules extends datos
{

	// se declaran los atributos o variables en privado
	private $cedula;
	private $apellidos;
	private $nombres;
	private $Edad;
	private $Tipodehorario;
	private $Apellido;
	private $Nombre;


	// se colocan los atrivutos en funciones set para colocarles valores y manipularlos 
	// con get se leen
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

	function set_Edad($valor)
	{
		$this->Edad = $valor;
	}

	function set_Tipodehorario($valor)
	{
		$this->Tipodehorario = $valor;
	}

	function set_Apellido($valor)
	{
		$this->Apellido = $valor;
	}

	function set_Nombre($valor)
	{
		$this->Nombre = $valor; 
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

	function get_Edad()
	{
		return $this->Edad;
	}

	function get_Tipodehorario()
	{
		return $this->Tipodehorario;
	}

	function get_Apellido()
	{
		return $this->Apellido;
	}

	function get_Nombre()
	{
		return $this->Nombre;
	}


	//se crean los metodos consultar incluir y eliminar

	function incluir(){
		
		$r = array();
		if(!$this->existe($this->cedula)){
			//si cedula no existe 
			//1 Se llama a la funcion conecta 
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//2 Se ejecuta el sql
			try {
					$co->query("Insert into thorarios(
						cedula,
						nombres,
						apellidos,
						Edad,
						Tipodehorario,
						Nombre,
						Apellido
						)
						Values(
						'$this->cedula',
						'$this->nombres',
						'$this->apellidos',
						'$this->Edad',
						'$this->Tipodehorario',
						'$this->Nombre',
						'$this->Apellido'
						)");
						$r['resultado'] = 'incluir';
			            $r['mensaje'] =  'Asignacion exitosa';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe la cedula';
		}
		return $r;
	}

	function modificar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->cedula)){
			try {
					$co->query("Update thorarios set 
					    cedula = '$this->cedula',
						nombres = '$this->nombres',
						apellidos = '$this->apellidos',
						Edad = '$this->Edad',
						Tipodehorario = '$this->Tipodehorario',
						Nombre = '$this->Nombre',
						Apellido = '$this->Apellido'
						where
						cedula = '$this->cedula' 
						"); 
						$r['resultado'] = 'modificar';
			            $r['mensaje'] =  'Modificacion exitosa';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'modificar';
			$r['mensaje'] =  'cedula no registrada';
		}
		return $r;
	}
	
	function eliminar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->cedula)){
			try {
					$co->query("delete from thorarios 
						where
						cedula = '$this->cedula'
						"); 
						$r['resultado'] = 'eliminar';
			            $r['mensaje'] =  'Eliminado exitosamente';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'eliminar';
			$r['mensaje'] =  'No existe la cedula';
		}
		return $r;
	}

	function consultar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{

			$resultado = $co->query("select * from thorarios");
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
					$respuesta .= "<td class='text-center'>{$row['cedula']}</td>";
					$respuesta .= "<td class='text-center'>{$row['nombres']}</td>";
					$respuesta .= "<td class='text-center'>{$row['apellidos']}</td>";
					$respuesta .= "<td class='text-center'>{$row['Edad']}</td>";
					$respuesta .= "<td class='text-center'>{$row['Tipodehorario']}</td>";				
					$respuesta .= "<td class='text-center'>{$row['Nombre']}</td>";
					$respuesta .= "<td class='text-center'>{$row['Apellido']}</td>";
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




	private function existe($cedula){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from thorarios where cedula='$cedula'");
			
			
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

	function listadodeatletas(){ 
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			
			$resultado = $co->query("Select * from tatletas");
			
			if($resultado){
				
				$respuesta = '';
				foreach($resultado as $r){
					$respuesta = $respuesta."<tr style='cursor:pointer' onclick='colocaatleta(this);'>";
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
						$respuesta = $respuesta.$r['fechadenacimiento'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
						$respuesta = $respuesta.$r['sexo'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
						$respuesta = $respuesta.$r['Numerodeaccion'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['Cinturon'];
						$respuesta = $respuesta."</td>";
					$respuesta = $respuesta."</tr>";
				}
				$r['resultado'] = 'modalatletas';
				$r['mensaje'] =  $respuesta;
			    
			}
			else{
				$r['resultado'] = 'modalatletas';
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

	function listadodeentrenadores(){ 
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		 $r = array();
		try{
		   
			 $resultado = $co->query("Select * from tentrenadores");
		   
			if($resultado){
			   
				$respuesta = '';
				foreach($resultado as $r){
					$respuesta = $respuesta."<tr style='cursor:pointer' onclick='colocaentrenador(this);'>";
						$respuesta = $respuesta."<td style='display:none'>";
							$respuesta = $respuesta.$r['id'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['CedulaE'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['Apellido'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['Nombre'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['Jerarquiadecinturon'];
						$respuesta = $respuesta."</td>";
					$respuesta = $respuesta."</tr>";
				}
				$r['resultado'] = 'modalentrenadores';
				$r['mensaje'] =  $respuesta;
			   
			}
		   else{
			   $r['resultado'] = 'modalentrenadores';
			   $r['mensaje'] =  '';
		   }
		   
	   }catch(Exception $e){
		   $r['resultado'] = 'error';
		   $r['mensaje'] =  $e->getMessage();
	   }
	   return $r;
	   }

	function generarPDF()
	{
		// Conexión a la base de datos y configuración de errores
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
			// Preparación de la consulta SQL
			$resultado = $co->prepare("SELECT * FROM thorarios WHERE cedula LIKE :cedula AND nombres LIKE :nombres AND apellidos LIKE :apellidos AND Edad LIKE :Edad AND Tipodehorario LIKE :Tipodehorario AND Nombre LIKE :Nombre AND Apellido LIKE :Apellido");
			$resultado->bindValue(':cedula', '%' . $this->cedula . '%');	
			$resultado->bindValue(':nombres', '%' . $this->nombres . '%');
			$resultado->bindValue(':apellidos', '%' . $this->apellidos . '%');
			$resultado->bindValue(':Edad', '%' . $this->Edad . '%');
			$resultado->bindValue(':Tipodehorario', '%' . $this->Tipodehorario . '%');
			$resultado->bindValue(':Nombre', '%' . $this->Nombre . '%');
			$resultado->bindValue(':Apellido', '%' . $this->Apellido . '%');
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
								<th>nombres</th>
								<th>apellidos</th>
								<th>Edad</th>
								<th>Tipo de Horario</th>
								<th>Nombres del entrenador</th>
								<th>Apellidos del entrenador</th>
							</tr>
						</thead>
						<tbody>";

			// Añadiendo filas al HTML
			if ($fila) {
				foreach ($fila as $f) {
					$html .= "
						<tr>
							<td>{$f['cedula']}</td>
							<td>{$f['nombres']}</td>
							<td>{$f['apellidos']}</td>
							<td>{$f['Edad']}</td>
							<td>{$f['Tipodehorario']}</td>
							<td>{$f['Nombre']}</td>
							<td>{$f['Apellido']}</td>
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
		$pdf->stream('ReporteHorarios.pdf', array("Attachment" => false));
	}
}