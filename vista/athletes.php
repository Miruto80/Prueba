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
		.tablita {
			color: white;
		}
		button{
			margin:2px;
		}
	</style>
<div class="container mt-3 text-center h2 text-warning">Inscripción de Atletas<hr/>

</div>
<div class="container"> <!-- todo el contenido ira dentro de esta etiqueta-->
	<div class="container">
		<div class="row mt-4 justify-content-center">

		    <div class="col-md-4">
			   <button type="button" class="btn btn-warning" id="incluir" >Inscribir</button>
			</div>
					
			<div class="col-md-1">	
			    <a href="." class="btn btn-warning">Salir</a>
			</div>
		</div>
	</div>
	<div class="tablita container">
	   <div class="table-responsive">
		<table class="table table-striped table-dark table-hover" id="tablapersona">
			<thead>
			  <tr>
				<th>Acciones</th>
				<th>Cedula</th>
				<th>Apellidos</th>
				<th>Nombres</th>
				<th>Fecha Nac</th>
				<th>Sexo</th>
				<th>Part</th>
				<th>Direccion</th>
				<th>Correo</th>
				<th>Telefono</th>
				<th>Num accion</th>
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
					<div class="col-md-5">
						<label  for="masculino">
						   Masculino	
						   <input class="" type="radio" value="M" id="masculino" name="sexo" />
						</label>
						<label  for="femenino">
						   Femenino	
						   <input class="" type="radio" value="F" id="femenino" name="sexo" />
						</label>
					</div>
					
					<div class="col-md-7">
					   <label for="Participacion">Participacion en artes marciales anteriormente</label>
					   <select class="form-control" id="Participacion" name="Participacion">
							<option value="Si">Si</option>
							<option value="No">No</option>
					   </select>
					</div>
				</div>
				
				<div class="row">
					<div class="col">
					<div class="col-md-7">
					   <label for="Numerodeaccion">Numero de accion</label>
					   <input class="form-control" placeholder="Si es socio poner su num de accion" type="text" id="Numerodeaccion" name="Numerodeaccion"/>
					   <span id="sNumerodeaccion"></span>
					</div>

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