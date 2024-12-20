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
			width: 5rem;
			/* Ajusta el ancho de la columna de acciones */
		}

		.tablita {
			color: white;
		}

		.form-check-input {
			width: 30px;
			/*Para los radios*/
			height: 30px;
			border: 1px solid #E7B00A;
			display: block;
		}

		#imagen2 {
			width: 300px;
			height: 300px;
		}
	</style>
	<div class="container text-center h2 text-warning mt-3">Inscripcion de Atletas
		<hr />

	</div>
	<div class="container"> <!-- todo el contenido ira dentro de esta etiqueta-->
		<div class="container">
			<div class="row mt-4 justify-content-center">
			<?php
					  if($nivel=='Gerente' or $nivel=='Secretaria'){
					   ?>
				<div class="col-12 col-md-4 d-flex justify-content-center mb-2">
					<button type="button" class="btn btn-warning btn-block" id="incluir"><b>INSCRIBIR</b></button>
				</div>
				<?php
					  }
				?>
				<div class="col-12 col-md-4 d-flex justify-content-center mb-2">
					<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal3">
						<b>REPORTE</b>
					</button>
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
					<?php if ($nivel === 'Gerente' || $nivel === 'Secretaria'){ ?>
                        <th class="text-center">Acciones</th>
                    <?php } ?>
						<th class="text-center">Cedula</th>
						<th class="text-center">Apellido</th>
						<th class="text-center">Nombre</th>
						<th class="text-center">Fecha Nac</th>
						<th class="text-center"><i class="fa-solid fa-venus-mars"></i></th>
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
	<div class="tabla modal fade" tabindex="-1" role="dialog" id="modal1">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-header text-warning bg-dark justify-content-center">
				<h3 class="modal-title">Formulario de atletas</h3>
				<button type="button" class="btn-close  bg-light" aria-label="Close"></button>
			</div>
			<div class="modal-content">
				<div class="container">
					<form method="post" id="f" autocomplete="off" enctype='multipart/form-data'>
						<input autocomplete="off" type="text" class="form-control" name="accion" id="accion" style="display: none;">
						<div class="container">
							<div class="row mb-3">
								<div class="col-md-4">
									<label for="cedula">Cedula</label>
									<input class="form-control" type="text" id="cedula" name="cedula" />
									<span id="scedula"></span>
								</div>
								<div class="col-md-8">
									<label for="apellidos">Apellido</label>
									<input class="form-control" type="text" id="apellidos" name="apellidos" />
									<span id="sapellidos"></span>
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-md-8">
									<label for="nombres">Nombre</label>
									<input class="form-control" type="text" id="nombres" name="nombres" />
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
									<input class="form-control" type="text" id="Direccion" name="Direccion" />
									<span id="sDireccion"></span>
								</div>
								<div class="col-md-4">
									<label for="Correo">Correo</label>
									<input class="form-control" type="text" id="Correo" name="Correo" />
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
									<input class="form-control" placeholder="Si es socio poner su num de accion" type="text" id="Numerodeaccion" name="Numerodeaccion" />
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
							<div class="row">
								<div class="col-md-12">
									<center>
										<label for="archivo" style="cursor:pointer">

											<img src="img/Atletas/logo.png" id="imagen"
												class="img-fluid rounded-circle w-25 mb-3 centered"
												style="object-fit:scale-down">
											Click aqui para subir foto
										</label>
										<input id="archivo" type="file"
											style="display:none"
											accept=".png,.jpg,.jpeg"
											name="imagenarchivo" />
									</center>
								</div>
							</div>

							<div class="row mt-3 justify-content-center">

								<div class="col-md-2">
									<button type="button" class="btn btn-dark"
										id="proceso"></button>
								</div>
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
	<!-- Sección del modal 2 -->
	<div class="tabla modal fade" tabindex="-1" role="dialog" id="modal2">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-header text-warning bg-dark justify-content-center">
				<h3 class="modal-title">Atleta</h3>
				<button type="button" class="btn-close  bg-light" aria-label="Close"></button>
			</div>
			<div class="modal-content">
				<div class="container justify-content-center">
					<form method="post" id="f" autocomplete="off" enctype='multipart/form-data'>
						<center>
							<img src="img/Atletas/logo.png" id="imagen2"
								class="img-fluid w-25 mb-3 centered"
								style="object-fit:scale-down">
						</center>

					</form>
				</div> <!-- fin de container -->
			</div>
			<div class="modal-footer bg-dark">
				<button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>

	<!-- Sección del modal 3 -->
	<div class="modal fade" tabindex="-1" id="modal3" aria-labelledby="modal3Label" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header bg-dark text-warning">
					<h5 class="modal-title" id="modal3Label">Reporte</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form method="post" id="f" autocomplete="off" target="_blank">
						<div class="row">
							<div class="col-md-4">
								<label for="cedula">Cédula</label>
								<input class="form-control" type="text" id="cedula" name="cedula" />
								<span id="scedula" class="form-text text-muted"></span>
							</div>
							<div class="col-md-4">
								<label for="nombres">Nombre</label>
								<input class="form-control" type="text" id="nombres" name="nombres" />
								<span id="snombres" class="form-text text-muted"></span>
							</div>

							<div class="col-md-4">
								<label for="apellidos">Apellido</label>
								<input class="form-control" type="text" id="apellidos" name="apellidos" />
								<span id="sapellidos" class="form-text text-muted"></span>
							</div>

							<div class="col-md-4">
								<label for="Telefono">Telefono</label>
								<input class="form-control" type="text" id="Telefono" name="Telefono" />
								<span id="sTelefono" class="form-text text-muted"></span>
							</div>

							<div class="col-md-4">
								<label for="sexo">Sexo</label>
								<input class="form-control" type="text" id="sexo" name="sexo" />
								<span id="ssexo" class="form-text text-muted"></span>
							</div>

							<div class="row">
								<div class="col-md-4">
									<label for="fechadenacimiento">Fecha de Nacimiento</label>
									<input class="form-control" type="date" id="fechadenacimiento" name="fechadenacimiento" />
									<span id="sfechadenacimiento"></span>
								</div>

								<div class="col-md-4">
									<label for="Participacion">Participacion</label>
									<input class="form-control" type="text" id="Participacion" name="Participacion" />
									<span id="sParticipacion" class="form-text text-muted"></span>
								</div>	

								<div class="col-md-4">
									<label for="Direccion">Direccion</label>
									<input class="form-control" type="text" id="Direccion" name="Direccion" />
									<span id="sDireccion" class="form-text text-muted"></span>
								</div>

								<div class="col-md-4">
									<label for="Correo">Correo</label>
									<input class="form-control" type="text" id="Correo" name="Correo" />
									<span id="sCorreo"></span>
								</div>

								<div class="col-md-4">
									<label for="Numerodeaccion">Numero de Accion</label>
									<input class="form-control" type="text" id="Numerodeaccion" name="Numerodeaccion" />
									<span id="sNumerodeaccion"></span>
								</div>

								<div class="col-md-4">
									<label for="Cinturon">Cinturon</label>
									<input class="form-control" type="text" id="Cinturon" name="Cinturon" />
									<span id="sCinturon"></span>
								</div>
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
	<!-- Fin de sección modal 3 -->
	</div>
	<?php require_once("comunes/modal.php"); ?>
	<script type="text/javascript" src="js/athletes.js"></script>

</body>

</html>