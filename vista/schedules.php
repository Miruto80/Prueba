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


		.table th,
		.table td {
			border: 1px solid #E7B00A;

			/* Bordes blancos y gruesos */
		}

		.tablita {
			color: white;
		}
	</style>
	<div class="container text-center h2 text-warning mt-3">
		Asignar Horarios
		<hr />
	</div>

	<div class="container">
		<div class="container">
			<div class="row mt-4 justify-content-center">
				<div class="col-12 col-md-2 d-flex justify-content-center mb-2">
					<button type="button" class="btn btn-warning  id="incluir">ASIGNAR</button>
				</div>

				<div class="col-12 col-md-2 d-flex justify-content-center mb-2">
					<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal2">
						<b>REPORTE</b>
					</button>
				</div>
				<div class="col-12 col-md-2 d-flex justify-content-center mb-2">
					<a href="?pagina=principal" class="btn btn-warning">SALIR</a>
				</div>
			</div>
		</div>
		<div class="tablita container">
			<div class="table-responsive">
				<table class="table table-striped table-dark table-hover" id="tablapersona">
					<thead>
						<tr>
							<th class="text-center action-column">Acciones</th>
							<th class="text-center">Cedula</th>
							<th class="text-center">Edad</th>
							<th class="text-center">Tipo de Horario</th>
							<th class="text-center">Entrenador</th>
						</tr>
					</thead>
					<tbody id="resultadoconsulta">
					</tbody>
				</table>
			</div>
		</div>
	</div>



	<div class="tabla modal fade" tabindex="-1" role="dialog" id="modal1">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-header text-warning bg-dark justify-content-center">
				<h3 class="modal-title">Formulario de Horarios</h3>
				<button type="button" class="btn-close  bg-light" aria-label="Close"></button>
			</div>
			<div class="modal-content">
				<div class="container">
					<form method="post" id="f" autocomplete="off">
						<input autocomplete="off" type="text" class="form-control" name="accion" id="accion"
							style="display: none;">
						<div class="container">
							<br>
							<div class="row mb-3">
								<div class="col-md-3">
									<label for="cedula">Cedula</label>
									<input class="form-control" type="text" id="cedula" name="cedula" />
									<br>
									<button type="button" class="btn btn-warning btn-block" id="listadodeclientes" name="listadodeclientes">Listado de Atletas</button>
									<span id="scedula"></span>
								</div>

								<div class="col-md-3">
									<label for="Edad">Edad</label>
									<input class="form-control" type="text" id="Edad" />
									<span id="sEdad"></span>
								</div>
								<div class="col-md-6">
									<label for="Tipodehorario">Tipo de Horario</label>
									<select class="form-select" id="Tipodehorario">
										<option value="INFANTIL de 5:00 PM a 6:00 PM">INFANTIL de 5:00 PM a 6:00 PM</option>
										<option value="JUVENIL de 6:00 PM a 7:00 PM">JUVENIL de 6:00 PM a 7:00 PM</option>
										<option value="ADULTO de 7:00 PM a 8:30 PM">ADULTO de 7:00 PM a 8:30 PM</option>
									</select>
								</div>

								<div class="col-md">
									<br>
									<label for="EntrenadorH">Entrenador</label>
									<select class="form-select" id="EntrenadorH">
										<option value="Entrenador Infantil. Antonio Sabino">Entrenador Infantil. Antonio Sabino</option>
										<option value="Entrenador Juvenil. Elias Hoss">Entrenador Juvenil. Elias Hoss</option>
										<option value="Entrenador Adulto. George Kahakajian">Entrenador Adulto. George Kahakajian</option>
									</select>
								</div>
							</div>
						</div>

						<div class="row mt-3 justify-content-center">
							<div class="col-md-2">
								<button type="button" class="btn btn-dark" id="proceso"></button>
							</div>
						</div>
						<br />
					</form>
				</div>
			</div>
			<div class="modal-footer bg-dark">
				<button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
	</div>

	<div class="modal fade" tabindex="-1" role="dialog" id="modalclientes">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-header text-warning bg-dark justify-content-center">
				<h5 class="modal-title">Listado de Atletas</h5>
				<button type="button" class="btn-close  bg-light" aria-label="Close"></button>
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-content">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th style="display:none">Id</th>
							<th class="text-center">Cedula</th>
							<th class="text-center">Apellidos</th>
							<th class="text-center">Nombres</th>
							<th class="text-center">Fecha Nac</th>
							<th class="text-center">Sexo</th>
							<th class="text-center">Nº accion</th>
							<th class="text-center">Cinturon</th>
						</tr>
					</thead>
					<tbody id="tablaclientes">

					</tbody>
				</table>
			</div>
			<div class="modal-footer bg-light">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
	<!-- Sección del modal 2 -->
	<div class="modal fade" tabindex="-1" id="modal2" aria-labelledby="modal2Label" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header bg-dark text-warning">
					<h5 class="modal-title" id="modal2Label">Reporte de Horarios</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form method="post" id="f" autocomplete="off" target="_blank">
						<div class="row">
							<div class="col">
								<label for="cedula">Cédula</label>
								<input class="form-control" type="text" id="cedula" name="cedula" />
								<span id="scedula" class="form-text text-muted"></span>
							</div>
							<div class="col">
								<label for="Edad">Edad</label>
								<input class="form-control" type="text" id="Edad" name="Edad" />
								<span id="sEdad" class="form-text text-muted"></span>
							</div>

							<div class="col">
								<label for="Tipodehorario">Tipo de horario </label>
								<input class="form-control" type="text" id="Tipodehorario" name="Tipodehorario" />
								<span id="sTipodehorario" class="form-text text-muted"></span>
							</div>

							<div class="col">
								<label for="EntrenadorH">Entrenador</label>
								<input class="form-control" type="text" id="EntrenadorH" name="EntrenadorH" />
								<span id="sEntrenadorH" class="form-text text-muted"></span>
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
	<!-- Fin de sección modal 2 -->
	<?php require_once("comunes/modal.php"); ?>
	<script type="text/javascript" src="js/schedules.js"></script>

</body>

</html>