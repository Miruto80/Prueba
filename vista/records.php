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
		Registrar logros
		<hr />
	</div>
	<div class="container"> <!-- todo el contenido ttttira dentro de esta etiqueta-->
		<div class="container">
			<div class="row mt-4 justify-content-center">
				<div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center mb-2">
					<button type="button" class="btn btn-warning btn-block" id="incluir">REGISTRAR</button>
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
							<th class="text-center">Nombre de evento</th>
							<th class="text-center">Fecha_del_evento</th>
							<th class="text-center">Logro del evento</th>
							<th class="text-center">Categoria</th>
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
					<h5 class="modal-title">Formulario de eventos</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				<div class="container mt-4"> <!-- todo el contenido ira dentro de esta etiqueta-->
						<form method="post" id="f" autocomplete="off">
							<input autocomplete="off" type="text" class="form-control" name="accion" id="accion" style="display: none;">
							<div class="container">
								<div class="row mb-3">
									<div class="col-md-6">
										<label for="Nombre_de_evento">Nombre del evento</label>
										<input class="form-control" type="text" id="Nombre_de_evento" />
										<span id="sNombre_de_evento"></span>
									</div>
									<div class="col-md-6">
										<label for="Fecha_del_evento">Fecha del evento</label>
										<input class="form-control" type="date" id="Fecha_del_evento" />
										<span id="sFecha_del_evento"></span>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-6">
										<label for="Logro_obtenido">Logro obtenido</label>
										<select class="form-select" id="Logro_obtenido">
											<option value="1ER LUGAR">1ER LUGAR</option>
											<option value="2DO LUGAR">2DO LUGAR</option>
											<option value="3RO LUGAR">3ER LUGAR</option>
										</select>
									</div>
									<div class="col-md-6">
										<label for="categoria">Categoria</label>
										<select class="form-select" id="categoria">
											<option value="KYORUGUI">KYORUGUI</option>
											<option value="POOMSAE">POOMSAE</option>
											<option value="AMBAS">AMBAS</option>
										</select>
									</div>
								</div>
								<div class="row justify-content-center">
									<div class="col-md-2">
										<button type="button" class="btn btn-dark" id="proceso">Procesar</button>
									</div>
								</div>
							</div>
						</form>
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
	<script type="text/javascript" src="js/records.js"></script>

</body>

</html>