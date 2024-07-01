<html> 
	
<?php require_once("comunes/framework.php"); ?>
<body>

<?php require_once('comunes/nav.php'); ?>
<style>
		body {
			background-image: url('img/fondo.jpg');
          background-size: cover;
          background-repeat: no-repeat;
		}

		.tablita {
			color: white;
		}
	</style>
<div class="container text-center h2 text-warning mt-3">
Registro de entrenadores
<hr/>
</div>
<div class="container"> <!-- todo el contenido ira dentro de esta etiqueta-->
	<div class="container">
	<div class="row mt-4 justify-content-center">

<div class="col-md-4">
   <button type="button" class="btn btn-warning" id="incluir" >REGISTRAR</button>
</div>
		
<div class="col-md-1">	
	<a href="." class="btn btn-warning">SALIR</a>
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
				<th>Apellido</th>
				<th>Nombre</th>
				<th>Telefono</th>
				<th>Jerarquia de cinturon</th>
			  </tr>
			</thead>
			<tbody id="resultadoconsulta">
			  
			  
			</tbody>
	   </table>
	  </div>
  </div>
</div> <!-- fin de container -->


<!-- seccion del modal -->
<div class="modal" tabindex="-1" id="modal1">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark text-warning" data-bs-theme="dark">
        <h5 class="modal-title">Formulario de Entrenadores</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <div class="container mt-4"> <!-- todo el contenido ira dentro de esta etiqueta-->
		   <form method="post" id="f" autocomplete="off">
			<input autocomplete="off" type="text" class="form-control" name="accion" id="accion" style="display: none;">
			<div class="container">	
				<div class="row mb-3">
					<div class="col-md-4">
					   <label for="CedulaE">Cedula</label>
					   <input class="form-control" type="text" id="CedulaE" />
					   <span id="sCedulaE"></span>
					</div>
					<div class="col-md-4">
					   <label for="Apellido">Apellido</label>
					   <input class="form-control" type="text" id="Apellido" />
					   <span id="sApellido"></span>
					</div>

					<div class="col-md-4">
					   <label for="Nombre">Nombre</label>
					   <input class="form-control" type="text" id="Nombre"  />
					   <span id="sNombre"></span>
					</div>
				</div>
				
				
				<div class="row mb-3">

				<div class="col-md-4">
					   <label for="Telefono">Telefono</label>
					   <input class="form-control" type="text" id="Telefono"  />
					   <span id="sTelefono"></span>
					</div>
					
					<div class="col-md-8">
					   <label for="Jerarquiadecinturon">Jerarquia de cinturon</label>
					   <select class="form-select" id="Jerarquiadecinturon">
							<option value="I DAN">I DAN</option>
							<option value="II DAN">II DAN</option>
							<option value="III DAN">III DAN</option>
							<option value="IV DAN">IV DAN</option>
							<option value="V DAN">V DAN</option>
							<option value="VI DAN">VI DAN</option>
							<option value="VII DAN">VII DAN</option>
							<option value="VIII DAN">VIII DAN</option>
					   </select>
					</div>
				</div>
				
				

				<div class="row mt-5 justify-content-center">
					<div class="col-md-2">
						   <button type="button" class="btn btn-dark" 
						   id="proceso" ></button>
					</div>
				</div>
			</div>	
			</form>
		</div>
      </div>
      <div class="modal-footer bg-dark">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<!--fin de seccion modal-->
<!--Llamada a archivo modal.php, dentro de el hay una sección modal-->
<?php require_once("comunes/modal.php"); ?>
<script type="text/javascript" src="js/trainers.js"></script>

</body>
</html>