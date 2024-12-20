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

			border-spacing: 0;

		}

		.table th,
		.table td {
			border: 1px solid #E7B00A;

		}

		.action-column {
			width: 5rem;

		}
	</style>
	<div class="container text-center h2 text-warning mt-3">
		Gestionar Logros
		<hr />
	</div>
	<div class="container"> <!-- todo el contenido ttttira dentro de esta etiqueta-->
		<div class="container">
			<div class="row mt-4 justify-content-center">
				<?php
				if ($nivel == 'Gerente' or $nivel == 'Secretaria') {
				?>
					<div class="col-12 col-md-4 d-flex justify-content-center mb-2">
						<button type="button" class="btn btn-warning btn-block" id="incluir"><b>REGISTRAR</b></button>
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
					<a href="?pagina=principal" class="btn btn-warning btn-block"><b>SALIR</b></a>
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
							<th class="text-center">Nombre de evento</th>
							<th class="text-center">Fecha del evento</th>
							<th class="text-center">Logro del evento</th>
							<th class="text-center">Categoria</th>
							<th class="text-center">Nombre del atleta</th>
							<th class="text-center">Apellido del atleta</th>
							<th class="text-center">Cedula</th>
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
					<h5 class="modal-title">Formulario de logros</h5>
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

								<div class="row mb-3">
									
								     <div class="col-md-12">
                                        <div class="input-group mb-2">
                                            <button class="btn btn-outline-warning" type="button" id="listadodeclientes" name="listadodeclientes">Listado de Cedulas</button>
                                            <input placeholder="Cedula" type="text" class="form-control" aria-label="Example text with button addon" aria-describedby="button-addon1" id="cedula" name="cedula" disabled>
                                        </div>
                                    </div>

								</div>


								<div class="row mb-3">

								   <div class="col-md-6">
									   <label for="NombreLA">Nombre del Atleta</label>
									   <input type="text" name="NombreLA" id="NombreLA" class="form-control" readonly disabled>
									   <span id="sNombreLA"></span>
								   </div>

								   <div class="col-md-6">
									   <label for="apellidos">apellido del Atleta</label>
									   <input type="text" name="apellidos" id="apellidos" class="form-control" readonly disabled>
									   <span id="sapellidos"></span>
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

	<!-- Sección del modal 2 -->
	<div class="modal fade" tabindex="-1" id="modal2" aria-labelledby="modal2Label" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header bg-dark text-warning">
					<h5 class="modal-title" id="modal2Label">Reporte de Logros</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form method="post" id="f" autocomplete="off" target="_blank">
						<div class="row">
							<div class="col-md-4">
								<label for="Nombre_de_evento">Nombre del Evento</label>
								<input class="form-control" type="text" id="Nombre_de_evento" name="Nombre_de_evento" />
								<span id="sNombre_de_evento" class="form-text text-muted"></span>
							</div>
							<div class="col-md-4">
								<label for="Fecha_del_evento">Fecha del evento</label>
								<input class="form-control" type="text" id="Fecha_del_evento" name="Fecha_del_evento" />
								<span id="sFecha_del_evento" class="form-text text-muted"></span>
							</div>

							<div class="col-md-4">
								<label for="Logro_obtenido">Logro Obtenido </label>
								<input class="form-control" type="text" id="Logro_obtenido" name="Logro_obtenido" />
								<span id="sLogro_obtenido" class="form-text text-muted"></span>
							</div>
						</div>

						<div class="row mt-3">
							<div class="col-6">
								<label for="categoria">Categoria</label>
								<input class="form-control" type="text" id="categoria" name="categoria" />
								<span id="scategoria" class="form-text text-muted"></span>
							</div>
							<div class="col-6">
								<label for="NombreLA">Nombre del Atleta</label>
								<input type="text" name="NombreLA" id="NombreLA" class="form-control">
								<span id="sNombreLA"></span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<label for="cedula">cedula del Atleta</label>
								<input type="text" name="cedula" id="cedula" class="form-control">
								<span id="scedula"></span>
							</div>
							<div class="col-md-6">
								<label for="apellidos">apellido del Atleta</label>
								<input type="text" name="apellidos" id="apellidos" class="form-control">
								<span id="sapellidos"></span>
							</div>

						</div>

						<div class="row mt-3">
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

	<div class="modal fade" tabindex="-1" role="dialog" id="modalclientes">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-header text-warning bg-dark justify-content-center">
                <h5 class="modal-title">Listado de Atletas</h5>
                <button type="button" class="btn-close bg-light" aria-label="Close"></button>
            </div>

				<div class="modal-content">
                  <table class="table table-striped table-hover">
                    <thead>
							<tr>
								<th style="display:none">Id</th>
								<th class="text-center">Cedula</th>
								<th class="text-center">Apellidos</th>
								<th class="text-center">Nombres</th>
							</tr>
						</thead>
						<tbody id="tablaclientes">

						</tbody>
					</table>
				</div>
				<div class="modal-footer bg-dark">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Fin de sección modal 2 -->

	<!--fin de seccion modal-->
	<!--Llamada a archivo modal.php, dentro de el hay una sección modal-->
	<?php require_once("comunes/modal.php"); ?>
	<script type="text/javascript" src="js/records.js"></script>

</body>

</html>