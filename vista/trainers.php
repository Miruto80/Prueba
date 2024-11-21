<html>

<?php require_once("comunes/framework.php"); ?>

<body>

	<?php require_once('comunes/nav.php'); ?>
	<style>
		html,
		body {
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

		.table {
			border-collapse: separate;
			/* Para asegurarse de que se vean los bordes */
			border-spacing: 0;
			/* Elimina el espacio entre las celdas */
		}

		.table th,
		.table td {
			border: 1px solid #E7B00A;
			/* Bordes blancos y gruesos */
		}

		.action-column {
			width: 5rem;
			/* Ajusta el ancho de la columna de acciones */
		}
	</style>
	<div class="container text-center h2 text-warning mt-3">
		Gestionar entrenadores
		<hr />
	</div>
	<div class="container"> <!-- todo el contenido ira dentro de esta etiqueta-->
		<div class="container">
			<div class="row mt-4 justify-content-center">
			<?php
					  if($nivel=='Gerente' or $nivel=='Secretaria'){
					   ?>
				<div class="col-12 col-md-4 d-flex justify-content-center mb-2">
					<button type="button" class="btn btn-warning" id="incluir"><b>REGISTRAR</b></button>
				</div>
				<?php
					}
				?>
				<div class="col-12 col-md-4 d-flex justify-content-center mb-2">
					<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal2">
						<b>REPORTE</b>
					</button>
				</div>
				<div class="col-12 col-md-4 d-flex justify-content-center mb-2">
					<a href="?pagina=principal" class="btn btn-warning"><b>SALIR</b></a>
				</div>
			</div>
		</div>

		<div class="tablita container">
			<div class="table-responsive">
				<table class="table table-striped table-dark table-hover" id="tablapersona">
					<thead>
						<tr>
						<?php if ($nivel === 'Gerente' || $nivel === 'Secretaria'){ ?>
							<th class="text-center action-column">Acciones</th>
                          <?php } ?>
							<th class="text-center">Cedula</th>
							<th class="text-center">Apellido</th>
							<th class="text-center">Nombre</th>
							<th class="text-center">Telefono</th>
							<th class="text-center">Jerarquia de cinturon</th>
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
										<input class="form-control" type="text" id="Nombre" />
										<span id="sNombre"></span>
									</div>
								</div>


								<div class="row mb-3">

									<div class="col-md-4">
										<label for="Telefono">Telefono</label>
										<input class="form-control" type="text" id="Telefono" />
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
											<option value="IX DAN">IX DAN</option>
										</select>
									</div>
								</div>

								<div class="row mt-5 justify-content-center">
									<div class="col-md-2">
										<button type="button" class="btn btn-dark" id="proceso"></button>
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

	<!-- Sección del modal 2 -->
	<div class="modal fade" tabindex="-1" id="modal2" aria-labelledby="modal2Label" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header bg-dark text-warning">
					<h5 class="modal-title" id="modal2Label">Reporte</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form method="post" id="f" autocomplete="off" target="_blank">
						<div class="row">
							<div class="col">
								<label for="CedulaE">Cédula</label>
								<input class="form-control" type="text" id="CedulaE" name="CedulaE" />
								<span id="sCedulaE" class="form-text text-muted"></span>
							</div>
							<div class="col">
								<label for="Nombre">Nombre</label>
								<input class="form-control" type="text" id="Nombre" name="Nombre" />
								<span id="sNombre" class="form-text text-muted"></span>
							</div>

							<div class="col">
								<label for="Apellido">Apellido</label>
								<input class="form-control" type="text" id="Apellido" name="Apellido" />
								<span id="sApellido" class="form-text text-muted"></span>
							</div>

							<div class="col">
								<label for="Telefono">Telefono</label>
								<input class="form-control" type="text" id="Telefono" name="Telefono" />
								<span id="sTelefono" class="form-text text-muted"></span>
							</div>

							<div class="col">
								<label for="Jerarquiadecinturon">Jerarquia de cinturon</label>
								<input class="form-control" type="text" id="Jerarquiadecinturon" name="Jerarquiadecinturon" />
								<span id="sJerarquiadecinturon" class="form-text text-muted"></span>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<hr />
							</div>
						</div>
						<div class="row">
							<div class="col text-center">
								<button type="submit" class="btn btn-warning" id="generar" name="generar">GENERAR PDF</button>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer bg-dark">
					<button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
	<!--Llamada a archivo modal.php, dentro de el hay una sección modal-->
	<?php require_once("comunes/modal.php"); ?>
	<script type="text/javascript" src="js/trainers.js"></script>

</body>

</html>