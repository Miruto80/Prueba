<html> 
<?php require_once("comunes/framework.php"); ?>
<body>

<?php require_once('comunes/nav.php'); ?>
<div class="container text-center h2 text-dark">
Registro de atletas
<hr/>
</div>
<div class="container"> <!-- todo el contenido ira dentro de esta etiqueta-->
	<div class="container">
		<div class="row mt-3 justify-content-center">
		    <div class="col-md-2">
			   <button type="button" class="btn btn-dark" id="incluir" >INCLUIR</button>
			</div>
					
			<div class="col-md-2">	
			    <a href="." class="btn btn-dark">REGRESAR</a>
			</div>
		</div>
	</div>
	<div class="container">
	   <div class="table-responsive">
		<table class="table table-striped table-hover" id="tablapersona">
			<thead>
			  <tr>
				<th>Acciones</th>
				<th>Cedula</th>
				<th>Apellidos</th>
				<th>Nombres</th>
				<th>Fecha Nac</th>
				<th>Sexo</th>
				<th>Participacion</th>
				<th>Direccion</th>
				<th>Correo</th>
				<th>Telefono</th>
				<th>Id del club</th>
			  </tr>
			</thead>
			<tbody id="resultadoconsulta">
			  
			  
			</tbody>
	   </table>
	  </div>
  </div>
</div> <!-- fin de container -->


<!-- seccion del modal -->
<div class="modal fade" tabindex="-1" role="dialog"  id="modal1">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-header text-light bg-info">
        <h5 class="modal-title">Formulario de Personas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-content">
		<div class="container"> <!-- todo el contenido ira dentro de esta etiqueta-->
		   <form method="post" id="f" autocomplete="off">
			<input autocomplete="off" type="text" class="form-control" name="accion" id="accion" style="display: none;">
			<div class="container">	
				<div class="row mb-3">
					<div class="col-md-4">
					   <label for="cedula">Cedula</label>
					   <input class="form-control" type="text" id="cedula" />
					   <span id="scedula"></span>
					</div>
					<div class="col-md-8">
					   <label for="apellidos">Apellidos</label>
					   <input class="form-control" type="text" id="apellidos" />
					   <span id="sapellidos"></span>
					</div>
				</div>
				
				<div class="row mb-3">
					<div class="col-md-8">
					   <label for="nombres">Nombres</label>
					   <input class="form-control" type="text" id="nombres"  />
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
					   <input class="form-control" type="text" id="Direccion"  />
					   <span id="sDireccion"></span>
					</div>
					<div class="col-md-4">
					   <label for="Correo">Correo</label>
					   <input class="form-control" type="text" id="Correo"  />
					   <span id="sCorreo"></span>
					</div>
					<div class="col-md-4">
					   <label for="Telefono">Telefono</label>
					   <input class="form-control" type="text" id="Telefono"  />
					   <span id="sTelefono"></span>
					</div>
					
				</div>
				
				<div class="row mb-3">
					<div class="col-md-3">
						<label  for="masculino">
						   Masculino	
						   <input class="" type="radio" value="M" id="masculino" name="sexo" />
						</label>
						<label  for="femenino">
						   Femenino	
						   <input class="" type="radio" value="F" id="femenino" name="sexo" />
						</label>
					</div>
					<div class="col-md-9">
					   <label for="Participacion">Participacion en artes marciales</label>
					   <select class="form-control" id="Participacion">
							<option value="Si">Si</option>
							<option value="No">No</option>
					   </select>
					</div>
				</div>
				
				<div class="row">
					<div class="col">
					<div class="col-md-4">
					   <label for="Idclub">Id del club</label>
					   <input class="form-control" type="text" id="Idclub"  />
					   <span id="sIdclub"></span>
					</div>

					</div>
				</div>
				
				
				<div class="row">
					<div class="col-md-12">
						<hr/>
					</div>
				</div>

				<div class="row mt-3 justify-content-center">
					<div class="col-md-2">
						   <button type="button" class="btn btn-primary" 
						   id="proceso" ></button>
					</div>
				</div>
			</div>	
			</form>
		</div> <!-- fin de container -->
		<!--
		
		-->
    </div>
	<div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>
<!--fin de seccion modal-->
<!--Llamada a archivo modal.php, dentro de el hay una sección modal-->
<?php require_once("comunes/modal.php"); ?>
<script type="text/javascript" src="js/athletes.js"></script>

</body>
</html>