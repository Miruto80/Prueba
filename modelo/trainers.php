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

	function incluir()
	{
		//Ok ya tenemos la base de datos y la funcion conecta dentro de la clase
		//datos, ahora debemos ejecutar las operaciones para realizar las consultas 

		//Lo primero que debemos hacer es consultar por el campo clave
		//en este caso la CedulaE, para ello se creo la funcion existe
		//que retorna true en caso de exitir el registro
		$r = array();
		if (!$this->existe($this->CedulaE)) {
			//si estamos aca es porque la CedulaE no existe es decir se puede incluir
			//los pasos a seguir son
			//1 Se llama a la funcion conecta 
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//2 Se ejecuta el sql
			try {
				$co->query("Insert into tentrenadores(
						CedulaE,
						Apellido,
						Nombre,
						Telefono,
						Jerarquiadecinturon
						)
						Values(
						'$this->CedulaE',
						'$this->Apellido',
						'$this->Nombre',
						'$this->Telefono',
						'$this->Jerarquiadecinturon'
						)");
				$r['resultado'] = 'incluir';
				$r['mensaje'] =  'Registro Inluido';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe la CedulaE';
		}
		return $r;
	}

	function modificar()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if ($this->existe($this->CedulaE)) {
			try {
				$co->query("Update tentrenadores set 
					    CedulaE = '$this->CedulaE',
						Apellido = '$this->Apellido',
						Nombre = '$this->Nombre',
						Telefono = '$this->Telefono',
						Jerarquiadecinturon = '$this->Jerarquiadecinturon'
						where
						CedulaE = '$this->CedulaE'
						");
				$r['resultado'] = 'modificar';
				$r['mensaje'] =  'Registro Modificado';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'modificar';
			$r['mensaje'] =  'CedulaE no registrada';
		}
		return $r;
	}

	function eliminar()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if ($this->existe($this->CedulaE)) {
			try {
				$co->query("delete from tentrenadores 
						where
						CedulaE = '$this->CedulaE'
						");
				$r['resultado'] = 'eliminar';
				$r['mensaje'] =  'Registro Eliminado';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'eliminar';
			$r['mensaje'] =  'No existe la CedulaE';
		}
		return $r;
	}


	function consultar()
{
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $r = array();
    try {
        $resultado = $co->query("SELECT * FROM tentrenadores");
        if ($resultado) {
            $respuesta = '';
            foreach ($resultado as $row) {
                $respuesta .= "<tr>";
                $respuesta .= "<td class='text-center action-column'>";
                
                // Botones de editar y eliminar
                $respuesta .= "<button type='button' class='btn btn-warning btn-sm mx-1 my-1' onclick='pone(this,0)'>
                               <i class='fa-solid fa-pen-to-square'></i></button>";
                $respuesta .= "<button type='button' class='btn btn-warning btn-sm mx-1 my-1' onclick='pone(this,1)'>
                               <i class='fa-solid fa-trash'></i></button>";
                
                // Botón para mostrar imagen
                $respuesta .= "<button type='button' class='btn btn-warning btn-sm mx-1 my-1' 
                               onclick='mostrarImagen2({$row['CedulaE']})'>
                               <i class='fa-solid fa-camera'></i></button>";
                
                $respuesta .= "</td>";
                $respuesta .= "<td class='text-center'>{$row['CedulaE']}</td>";
                $respuesta .= "<td class='text-center'>{$row['Apellido']}</td>";
                $respuesta .= "<td class='text-center'>{$row['Nombre']}</td>";
                $respuesta .= "<td class='text-center'>{$row['Telefono']}</td>";
                $respuesta .= "<td class='text-center'>{$row['Jerarquiadecinturon']}</td>";
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





	private function existe($CedulaE)
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {

			$resultado = $co->query("Select * from tentrenadores where CedulaE='$CedulaE'");


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
