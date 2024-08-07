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
		Asignar Horarios
		<hr />
	</div>
	
	<div class="container"> 
		<div class="container">
			<div class="row mt-4 justify-content-center">
				<div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center mb-2">
					<button type="button" class="btn btn-warning btn-block" id="incluir">ASIGNAR</button>
				</div>
				<div class="col-12 col-md-6 col-lg-2 d-flex justify-content-center mb-2">
					<a href="?pagina=principal" class="btn btn-warning btn-block">SALIR</a>
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


	
	<div class="modal" tabindex="-1" id="modal1">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header bg-dark text-warning" data-bs-theme="dark">
					<h5 class="modal-title">Formulario de Horarios</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">

					<div class="container mt-4"> <!-- todo el contenido del formulario-->
						<form method="post" id="f" autocomplete="off">
							<input autocomplete="off" type="text" class="form-control" name="accion" id="accion" style="display: none;">
							<div class="container">
								<div class="row mb-3">
									<div class="col-md-3">
										<label for="CedulaE2">Cedula</label>
										<input class="form-control" type="text" id="CedulaE2" />
										<span id="sCedulaE2"></span>
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
									<div class="col">
									<label for="EntrenadorH">Entrenador</label>
										<select class="form-select" id="EntrenadorH">
											<option value="Entrenador Infantil. Antonio Sabino">Entrenador Infantil. Antonio Sabino</option>
											<option value="Entrenador Juvenil. Elias Hoss">Entrenador Juvenil. Elias Hoss</option>
											<option value="Entrenador Adulto. George Kahakajian">Entrenador Adulto. George Kahakajian</option>
										</select>
							    </div>
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


	<?php require_once("comunes/modal.php"); ?>
	<script type="text/javascript" src="js/schedules.js"></script>

</body>

</html>