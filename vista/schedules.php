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
        <div class="row mt-4 justify-content-center">
        <?php
					  if($nivel=='Gerente' or $nivel=='Secretaria'){
					   ?>
            <div class="col-12 col-md-4 d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-warning" id="incluir"><b>ASIGNAR</b></button>
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
        
        <div class="tablita container">
            <div class="table-responsive">
                <table class="table table-striped table-dark table-hover" id="tablapersona">
                    <thead>
                        <tr>
                            <th class="text-center action-column">Acciones</th>
                            <th class="text-center">Cédula</th>
                            <th class="text-center">Nombres</th>
                            <th class="text-center">Apellidos</th>     
                            <th class="text-center">Edad</th>
                            <th class="text-center">Tipo de Horario</th>
                            <th class="text-center">Nombres del entrenador</th>
                            <th class="text-center">Apellidos del entrenador</th>
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
                <button type="button" class="btn-close bg-light" aria-label="Close"></button>
            </div>
            <div class="modal-content">
                <div class="container">
                    <form method="post" id="f" autocomplete="off">
                        <input autocomplete="off" type="text" class="form-control" name="accion" id="accion" style="display: none;">
                        <div class="container">
                            <br>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="cedula">Cédula</label>
                                    <input class="form-control" type="text" id="cedula" name="cedula" disabled />
                                    <br>
                                    <button type="button" class="btn btn-warning btn-block" id="listadodeatletas" name="listadodeatletas">Listado de Atletas</button>
                                    <span id="scedula"></span>
                                </div>
							
								<div class="col-md-3">
									<label for="nombres">Nombres</label>
									<input class="form-control" type="text" id="nombres" name="nombres" disabled />
									<span id="snombres"></span>
								</div>
                                <div class="col-md-3">
									<label for="apellidos">Apellidos</label>
									<input class="form-control" type="text" id="apellidos" name="apellidos" disabled />
									<span id="sapellidos"></span>
								</div>

                                <div class="col-md-3" style="display: none;">
                                    <label for="fechadenacimiento">Fecha de Nacimiento</label>
                                    <input class="form-control" type="date" id="fechadenacimiento" name="fechadenacimiento" required disabled />
                                    <span id="sfechadenacimiento"></span>
                                </div>

                                <div class="col-md-3">
                                    <label for="Edad">Edad</label>
                                    <input class="form-control" type="text" id="Edad" name="Edad" readonly disabled />
                                    <span id="sEdad"></span>
                                </div>

                                <div class="row-md">
								<br>
                                </div>

                                <div class="col-md-12">
                                    <label for="Tipodehorario">Tipo de Horario</label>
                                    <select class="form-select" id="Tipodehorario">
                                        <option value="INFANTIL de 5:00 PM a 6:00 PM">INFANTIL de 5:00 PM a 6:00 PM</option>
                                        <option value="JUVENIL de 6:00 PM a 7:00 PM">JUVENIL de 6:00 PM a 7:00 PM</option>
                                        <option value="ADULTO de 7:00 PM a 8:30 PM">ADULTO de 7:00 PM a 8:30 PM</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <br>
                                    <label for="Nombre">Nombres del entrenador</label>
                                    <input class="form-control" type="text" id="Nombre" name="Nombre" disabled />
                                    <br>
                                    <button type="button" class="btn btn-warning btn-block" id="listadodeentrenadores" name="listadodeentrenadores">Listado de Entrenadores</button>
                                    <span id="sNombre"></span>
                                </div>

                                <div class="col-md-6">
                                    <br>
                                    <label for="Apellido">Apellidos del entrenador</label>
                                    <input class="form-control" type="text" id="Apellido" name="Apellido" disabled />
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

    <div class="modal fade" tabindex="-1" role="dialog" id="modalatletas">
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
                            <th class="text-center">Cédula</th>
                            <th class="text-center">Apellidos</th>
                            <th class="text-center">Nombres</th>
                            <th class="text-center">Fecha Nac</th>
                            <th class="text-center">Sexo</th>
                            <th class="text-center">Nº acción</th>
                            <th class="text-center">Cinturón</th>
                        </tr>
                    </thead>
                    <tbody id="tablaatletas">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalentrenadores">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-header text-warning bg-dark justify-content-center">
                <h5 class="modal-title">Listado de Entrenadores</h5>
                <button type="button" class="btn-close bg-light" aria-label="Close"></button>
            </div>
            <div class="modal-content">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="display:none">Id</th>
                            <th class="text-center">Cédula</th>
                            <th class="text-center">Apellidos</th>
                            <th class="text-center">Nombres</th>
                            <th class="text-center">Jerarquía de cinturón</th>
                        </tr>
                    </thead>
                    <tbody id="tablaentrenadores">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>



    
    <div class="modal fade" tabindex="-1" id="modal2" aria-labelledby="modal2Label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-warning">
                    <h5 class="modal-title" id="modal2Label">Reporte de Horarios</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="f" autocomplete="off" target="_blank">
                    <!-- Primera fila de campos -->
                    <div class="row">
                            <div class="col-md-3">
                                <label for="cedula">Cédula</label>
                                <input class="form-control" type="text" id="cedula" name="cedula"  />
                                <span id="scedula" class="form-text text-muted"></span>
                            </div>
                            <div class="col-md-3">
                                <label for="nombres">Nombre</label>
                                <input class="form-control" type="text" id="nombres" name="nombres"  />
                                <span id="snombres" class="form-text text-muted"></span>
                            </div>
                            <div class="col-md-3">
                                <label for="apellidos">Apellido</label>
                                <input class="form-control" type="text" id="apellidos" name="apellidos"  />
                                <span id="sapellidos" class="form-text text-muted"></span>
                            </div>
                            <div class="col-md-3">
                                <label for="Edad">Edad</label>
                                <input class="form-control" type="text" id="Edad" name="Edad" />
                                <span id="sEdad" class="form-text text-muted"></span>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-4">
                                <label for="Tipodehorario">Tipo de horario</label>
                                <input class="form-control" type="text" id="Tipodehorario" name="Tipodehorario" />
                                <span id="sTipodehorario" class="form-text text-muted"></span>
                            </div>
                            <div class="col-4">
                                <label for="Nombre">Nombres del entrenador</label>
                                <input class="form-control" type="text" id="Nombre" name="Nombre" />
                                <span id="sNombre" class="form-text text-muted"></span>
                            </div>
                            <div class="col-4">
                                <label for="Apellido">Apellidos del entrenador</label>
                                <input class="form-control" type="text" id="Apellido" name="Apellido" />
                                <span id="sApellido" class="form-text text-muted"></span>
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

    <?php require_once("comunes/modal.php"); ?>
    <script type="text/javascript" src="js/schedules.js"></script>

</body>

</html>
