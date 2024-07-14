<html> 
	
<?php require_once("comunes/framework.php"); ?>
<body>

<?php require_once('comunes/nav.php'); ?>
    <style>
		html, body {
            height: 100%;
            margin: 0;
        }
        body {
            background-image: linear-gradient(rgba(5, 7, 12, 0.75), rgba(5, 7, 12, 0.5)), url('img/fondo.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }
		.table {
			border-collapse: separate;
			/* Para asegurarse de que se vean los bordes */
			border-spacing: 0;
			/* Elimina el espacio entre las celdas */
		}

		.table th,
		.table td {
			border: 1px solid #E7B00A;
			/* Bordes solido y con color */
		}

		.action-column {
            width: 5rem; /* Ajusta el ancho de la columna de acciones */
        }
		.tablita {
			color: white;
		}
		
		.form-check-input{ 
			width:30px; /*Para los radios*/ 
			height:30px;
			border: 1px solid #E7B00A;
			display:block;
		}
		
		
		
	</style>
<div class="container text-center h2 text-warning mt-3">Inscribir Atletas<hr/>

</div>
<div class="container"> <!-- todo el contenido ira dentro de esta etiqueta-->
	<div class="container">
	<div class="row mt-4 justify-content-center">
        <div class="col-12 col-md-4 d-flex justify-content-center mb-2">
            <button type="button" class="btn btn-warning btn-block" id="incluir"><b>INSCRIBIR</b></button>
        </div>
        <div class="col-12 col-md-4 d-flex justify-content-center mb-2">
            <a href="?pagina=principal" class="btn btn-warning btn-block"><b>SALIR</b></a>
        </div>
			</div>
		</div>
	</div>
	<div class="tablita container">
	   <div class="table-responsive">
		<table class="table table-striped table-dark table-hover text-center" id="tablapersona">
			<thead>
			  <tr>
				<th class="text-center">Acciones</th>
				<th class="text-center">Cedula</th>
				<th class="text-center">Apellidos</th>
				<th class="text-center">Nombres</th>
				<th class="text-center">Fecha Nac</th>
				<th class="text-center">Sexo</th>
				<th class="text-center">Part</th>
				<th class="text-center">Direccion</th>
				<th class="text-center">Correo</th>
				<th class="text-center">Telefono</th>
				<th class="text-center">Nº accion</th>
				<th class="text-center">Cinturon</th>
			  </tr>
			</thead>
			<tbody id="resultadoconsulta">
			</tbody>
	   </table>
	  </div>
  </div>
</div> <!-- fin de container -->


<!-- seccion del modal -->
<div class="tabla modal fade" tabindex="-1" role="dialog"  id="modal1">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-header text-warning bg-dark justify-content-center">
        <h3 class="modal-title">Formulario de atletas</h3>
        <button type="button" class="btn-close  bg-light" aria-label="Close"></button>
    </div>
    <div class="modal-content">
		<div class="container"> 
		   <form method="post" id="f" autocomplete="off">
			<input autocomplete="off" type="text" class="form-control" name="accion" id="accion" style="display: none;">
			<div class="container">	
				<div class="row mb-3">
					<div class="col-md-4">
					   <label for="cedula">Cedula</label>
					   <input class="form-control" type="text" id="cedula" name="cedula" />
					   <span id="scedula"></span>
					</div>
					<div class="col-md-8">
					   <label for="apellidos">Apellidos</label>
					   <input class="form-control" type="text" id="apellidos" name="apellidos" />
					   <span id="sapellidos"></span>
					</div>
				</div>
				
				<div class="row mb-3">
					<div class="col-md-8">
					   <label for="nombres">Nombres</label>
					   <input class="form-control" type="text" id="nombres" name="nombres"  />
					   <span id="snombres"></span>
					</div>
					<div class="col-md-4">
					   <label for="fechadenacimiento">Fecha de Nacimiento</label>
					   <input class="form-control" type="date" id="fechadenacimiento" name="fechadenacimiento" />
					   <span id="sfechadenacimiento"></span>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-md-4">
					   <label for="Direccion">Direccion</label>
					   <input class="form-control" type="text" id="Direccion" name="Direccion"  />
					   <span id="sDireccion"></span>
					</div>
					<div class="col-md-4">
					   <label for="Correo">Correo</label>
					   <input class="form-control" type="text" id="Correo" name="Correo"  />
					   <span id="sCorreo"></span>
					</div>
					<div class="col-md-4">
					   <label for="Telefono">Telefono</label>
					   <input class="form-control" type="text" id="Telefono" name="Telefono" />
					   <span id="sTelefono"></span>
					</div>
					
				</div>
				
				<div class="row mb-3">
					<div class="col-md-3 ">
						<label class="" for="masculino">
						   Masculino	
						   <input class="form-check-input" type="radio" value="M" id="masculino" name="sexo" />
						</label>
						<label class="" for="femenino">
						   Femenino	
						   <input class="form-check-input" type="radio" value="F" id="femenino" name="sexo" />
						</label>
					</div>
					
					<div class="col-md-9">
					   <label for="Participacion">Participacion en artes marciales anteriormente</label>
					   <select class="form-select" id="Participacion" name="Participacion">
							<option value="Si">Si</option>
							<option value="No">No</option>
					   </select>
					</div>
				</div>
				
				<div class="row">
					
					<div class="col-md-6">
					   <label for="Numerodeaccion">Numero de accion</label>
					   <input class="form-control" placeholder="Si es socio poner su num de accion" type="text" id="Numerodeaccion" name="Numerodeaccion"/>
					   <span id="sNumerodeaccion"></span>
					</div>

					<div class="col-md-6">
					   <label for="Cinturon">Cinturon</label>
					   <select class="form-select" id="Cinturon" name="Cinturon">
							<option value="Blanco">Blanco</option>
							<option value="Amarillo">Amarillo</option>
							<option value="Naranja">Naranja</option>
							<option value="Verde">Verde</option>
							<option value="Azul celeste">Azul celeste</option>
							<option value="Azul Oscuro">Azul Oscuro</option>
							<option value="Marron">Marron</option>
							<option value="Rojo">Rojo</option>
							<option value="Rojo 1er Punta">Rojo Primera Punta</option>
							<option value="Rojo 2da Punta">Rojo Segunda Punta</option>
							<option value="BODAN">BODAN</option>
							<option value="Negro I DAN">Negro I DAN</option>
							<option value="Negro II DAN">Negro II DAN </option>
							<option value="Negro III DAN">Negro III DAN</option>
							<option value="Negro IV DAN">Negro IV DAN</option>
							<option value="Negro V DAN">Negro V DAN</option>
							<option value="Negro VI DAN">Negro VI DAN</option>
							<option value="Negro VII DAN">Negro VII DAN</option>
							<option value="Negro VIII DAN">Negro VIII DAN</option>
							<option value="Negro IX DAN">Negro IX DAN</option>
					   </select>
					</div>

					
				</div>
				
				<div class="row mt-3 justify-content-center">
					<div class="col-md-2">
						   <button type="button" class="btn btn-dark" 
						   id="proceso" ></button>
				</div>
			</div>	
			</form>
		</div> <!-- fin de container -->
    </div>
	<div class="modal-footer bg-dark">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cerrar</button>
      </div>
  </div>
</div>
	</div>
<!--fin de seccion modal-->

<?php require_once("comunes/modal.php"); ?>
<script type="text/javascript" src="js/athletes.js"></script>

</body>
</html>