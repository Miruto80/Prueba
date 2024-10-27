<?php
require_once('dompdf/vendor/autoload.php'); //archivo para cargar las funciones de la 
//libreria DOMPDF
// lo siguiente es hacer rerencia al espacio de trabajo
use Dompdf\Dompdf; 
//llamda al archivo que contiene la clase
//datos
require_once('modelo/datos.php');

//declaracion de la clase usuarios que hereda de la clase datos


class trainers extends datos{
	
	//Declararacion de los atributos
	
	private $CedulaE; 
	private $Apellido;
	private $Nombre;
	private $Telefono;
	private $Jerarquiadecinturon;
	
	//Metodos para leer: get metodos para colocar: set 

	function set_CedulaE($valor){
		$this->CedulaE = $valor;
	}
	
	function set_Apellido($valor){
		$this->Apellido = $valor;
	}
	
	function set_Nombre($valor){
		$this->Nombre = $valor;
	}
	
	function set_Telefono($valor){
		$this->Telefono = $valor;
	}
	
	function set_Jerarquiadecinturon($valor){
		$this->Jerarquiadecinturon = $valor;
	}
	
	function get_CedulaE(){
		return $this->CedulaE;
	}
	
	function get_Apellido(){
		return $this->Apellido;
	}
	
	function get_Nombre(){
		return $this->Nombre;
	}
	
	
	function get_Telefono(){
		return $this->Telefono;
	}
	
	function get_Jerarquiadecinturon(){
		return $this->Jerarquiadecinturon;
	}
	
		//Metodos para incluir, consultar y eliminar
	
	
		function generarPDF(){
		
			//El primer paso es generar una consulta SQl tal cual como lo hemos hecho en las 
			//clases anteriores, en este caso la consulta sera sobre la tabla usuarios
			//y tendra como parametros para filtro la cedula y el usuario
			
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			try{
				
				
				$resultado = $co->prepare("Select * from tentrenadores where CedulaE like :CedulaE and 
											Nombre like :Nombre");
				$resultado->bindValue(':CedulaE','%'.$this->CedulaE.'%');
				$resultado->bindValue(':Nombre','%'.$this->Nombre.'%');
	
				$resultado->execute();
				
				$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
				
				//aqui es donde comienza el cambio, debido a que se va a armar una variable en memoria
				//con el contenido html que se enviara a la libreria dompdf
				$html = "<html><head></head><body>";
				$html = $html."<div style='display:table;width:100%;border:solid'>";
				$html = $html."<div style='display:table-row;width:100%;border:solid'>";
				$html = $html."<div style='display:table-cell;width:100%;border:solid'>";
				$html = $html."<table style='width:100%'>";
				$html = $html."<thead>";
				$html = $html."<tr>";
				$html = $html."<th>CedulaE</th>";
				$html = $html."<th>Nombre</th>";
				
				$html = $html."</tr>";
				$html = $html."</thead>";
				$html = $html."<tbody>";
				if($fila){
					
					foreach($fila as $f){
						$html = $html."<tr>";
						$html = $html."<td style='text-align:center'>".$f['CedulaE']."</td>";
						$html = $html."<td style='text-align:center'>".$f['Nombre']."</td>";
						
								 
						$html = $html."</tr>";
					}
	
					//return json_encode($fila);
					
				}
				else{
					
					//return '';
				}
				$html = $html."</tbody>";
				$html = $html."</table>";
				$html = $html."</div></div></div>";
				$html = $html."</body></html>";
				
				
			}catch(Exception $e){
				//return $e->getMessage();
			}
			
			
			
	
	
	
	 
			// Instanciamos un objeto de la clase DOMPDF.
			$pdf = new DOMPDF();
			 
			// Definimos el tamaño y orientación del papel que queremos.
			$pdf->set_paper("A4", "portrait");
			 
			// Cargamos el contenido HTML.
			$pdf->load_html(utf8_decode($html));
			 
			// Renderizamos el documento PDF.
			$pdf->render();
			 
			// Enviamos el fichero PDF al navegador.
			$pdf->stream('ReporteUsuarios.pdf', array("Attachment" => false));
			
			
		}
	
	
}
?>