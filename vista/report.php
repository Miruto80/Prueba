<!DOCTYPE html>
<html lang="es">

<?php require_once("comunes/framework.php"); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Reportes</title>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
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
</head>

<body>

    <?php require_once('comunes/nav.php'); ?>

    <div class="container text-center h2 text-warning mt-3">
        Gestionar Reportes
        <hr />
    </div>

    <div class="container">
    <div class="row mt-4 justify-content-center">
        <!-- Botones para abrir los modales -->
        <div class="col-12 d-flex justify-content-center mb-2">
            <button type="button" class="btn btn-warning btn-sm w-75" data-bs-toggle="modal" data-bs-target="#modal1">
                <b>ATLETAS</b>
            </button>
        </div>
        <div class="col-12 d-flex justify-content-center mb-2">
            <button type="button" class="btn btn-warning btn-sm w-75" data-bs-toggle="modal" data-bs-target="#modal2">
                <b>ENTRENADORES</b>
            </button>
        </div>
        <div class="col-12 d-flex justify-content-center mb-2">
            <button type="button" class="btn btn-warning btn-sm w-75" data-bs-toggle="modal" data-bs-target="#modal3">
                <b>HORARIOS</b>
            </button>
        </div>
        <div class="col-12 d-flex justify-content-center mb-2">
            <button type="button" class="btn btn-warning btn-sm w-75" data-bs-toggle="modal" data-bs-target="#modal4">
                <b>PAGOS</b>
            </button>
        </div>
        <div class="col-12 d-flex justify-content-center mb-2">
            <button type="button" class="btn btn-warning btn-sm w-75" data-bs-toggle="modal" data-bs-target="#modal5">
                <b>LOGROS</b>
            </button>
        </div>
        <div class="col-12 d-flex justify-content-center mb-2">
            <a href="?pagina=principal" class="btn btn-warning btn-sm w-75">
                <b>SALIR</b>
            </a>
        </div>
    </div>
</div> <!-- fin de container -->


    <!-- Sección del modal 1 -->
    <div class="modal fade" tabindex="-1" id="modal1" aria-labelledby="modal1Label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-warning">
                    <h5 class="modal-title" id="modal1Label">Reporte de Atletas</h5>
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
                                <label for="nombres">Nombre</label>
                                <input class="form-control" type="text" id="nombres" name="nombres" />
                                <span id="snombres" class="form-text text-muted"></span>
                            </div>

                            <div class="col">
                                <label for="apellidos">Apellido</label>
                                <input class="form-control" type="text" id="apellidos" name="apellidos" />
                                <span id="sapellidos" class="form-text text-muted"></span>
                            </div>

                            <div class="col">
                                <label for="Telefono">Telefono</label>
                                <input class="form-control" type="text" id="Telefono" name="Telefono" />
                                <span id="sTelefono" class="form-text text-muted"></span>
                            </div>

                            <div class="col">
                                <label for="sexo">Sexo</label>
                                <input class="form-control" type="text" id="sexo" name="sexo" />
                                <span id="ssexo" class="form-text text-muted"></span>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="fechadenacimiento">Fecha de Nacimiento</label>
                                    <input class="form-control" type="date" id="fechadenacimiento" name="fechadenacimiento" />
                                    <span id="sfechadenacimiento"></span>
                                </div>

                                <div class="col">
                                    <label for="Participacion">Participacion</label>
                                    <input class="form-control" type="text" id="Participacion" name="Participacion" />
                                    <span id="sParticipacion" class="form-text text-muted"></span>
                                </div>

                                <div class="col">
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
    <!-- Fin de sección modal 1 -->

    <!-- Sección del modal 2 -->
    <div class="modal fade" tabindex="-1" id="modal2" aria-labelledby="modal2Label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-warning">
                    <h5 class="modal-title" id="modal2Label">Reporte de Atletas</h5>
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
    <!-- Fin de sección modal 2 -->

    <!-- Sección del modal 3 -->
    <div class="modal fade" tabindex="-1" id="modal3" aria-labelledby="modal3Label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-warning">
                    <h5 class="modal-title" id="modal3Label">Reporte de Horarios</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="post" id="f" autocomplete="off" target="_blank">
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
                            <div class="col-md-4">
                                <label for="Tipodehorario">Tipo de horario</label>
                                <input class="form-control" type="text" id="Tipodehorario" name="Tipodehorario" />
                                <span id="sTipodehorario" class="form-text text-muted"></span>
                            </div>
                            <div class="col-md-4">
                                <label for="Nombre">Nombres del entrenador</label>
                                <input class="form-control" type="text" id="Nombre" name="Nombre" />
                                <span id="sNombre" class="form-text text-muted"></span>
                            </div>
                            <div class="col-md-4">
                                <label for="Apellido">Apellidos del entrenador</label>
                                <input class="form-control" type="text" id="Apellido" name="Apellido" />
                                <span id="sApellido" class="form-text text-muted"></span>
                            </div>
                        </div>
                        <div class="row mt-3 text-center">
                            <div class="col">
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

    <!-- Sección del modal 4 -->
    <div class="modal fade" tabindex="-1" id="modal4" aria-labelledby="modal4Label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-warning">
                    <h5 class="modal-title" id="modal4Label">Reporte de Pagos</h5>
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
                                <label for="fechadepago">Fecha de Pago</label>
                                <input class="form-control" type="text" id="fechadepago" name="fechadepago" />
                                <span id="sfechadepago" class="form-text text-muted"></span>
                            </div>
                            <div class="col">
                                <label for="Monto">Monto</label>
                                <input class="form-control" type="text" id="Monto" name="Monto" />
                                <span id="sMonto" class="form-text text-muted"></span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="Comprobantedepago">Comprobante de Pago</label>
                                <input class="form-control" type="text" id="Comprobantedepago" name="Comprobantedepago" />
                                <span id="sComprobantedepago" class="form-text text-muted"></span>
                            </div>
                            <div class="col">
                                <label for="tipopago">Tipo de Pago</label>
                                <input class="form-control" type="text" id="tipopago" name="tipopago" />
                                <span id="stipopago" class="form-text text-muted"></span>
                            </div>
                            <div class="col">
                                <label for="numeroaccion">Numero de Accion</label>
                                <input class="form-control" type="text" id="numeroaccion" name="numeroaccion" />
                                <span id="snumeroaccion"></span>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-4">
                                    <label for="nombres">Nombres</label>
                                    <input class="form-control" type="text" id="nombres" name="nombres"  />
                                    <span id="snombres" class="form-text text-muted"></span>
                                </div>
                                <div class="col-4">
                                    <label for="apellidos">Apellidos</label>
                                    <input class="form-control" type="text" id="apellidos" name="apellidos" />
                                    <span id="sapellidos" class="form-text text-muted"></span>
                                </div>
                                <div class="col-4">
                                    <label for="concepto">Concepto</label>
                                    <input class="form-control" type="text" id="concepto" name="concepto" />
                                    <span id="sconcepto" class="form-text text-muted"></span>
                                </div>
                               
                            </div>
                        <div class="row mt-3 text-center">
                            <div class="col">
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
    <!-- Fin de sección modal 4 -->

    <!-- Sección del modal 5 -->
    <div class="modal fade" tabindex="-1" id="modal5" aria-labelledby="modal5Label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-warning">
                    <h5 class="modal-title" id="modal5Label">Reporte de Logros</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="post" id="f" autocomplete="off" target="_blank">
						<div class="row">
							<div class="col">
								<label for="Nombre_de_evento">Nombre del Evento</label>
								<input class="form-control" type="text" id="Nombre_de_evento" name="Nombre_de_evento" />
								<span id="sNombre_de_evento" class="form-text text-muted"></span>
							</div>
							<div class="col">
								<label for="Fecha_del_evento">Fecha del evento</label>
								<input class="form-control" type="text" id="Fecha_del_evento" name="Fecha_del_evento" />
								<span id="sFecha_del_evento" class="form-text text-muted"></span>
							</div>

							<div class="col">
								<label for="Logro_obtenido">Logro Obtenido </label>
								<input class="form-control" type="text" id="Logro_obtenido" name="Logro_obtenido" />
								<span id="sLogro_obtenido" class="form-text text-muted"></span>
							</div>

							<div class="col">
								<label for="categoria">Categoria</label>
								<input class="form-control" type="text" id="categoria" name="categoria" />
								<span id="scategoria" class="form-text text-muted"></span>
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
    <!-- Fin de sección modal 5 -->

    <!-- Llamada a archivo modal.php -->
    <?php require_once("comunes/modal.php"); ?>

    <script type="text/javascript" src="js/report.js"></script>
   