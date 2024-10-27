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
            <div class="col-12 col-md-2 d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal1">
                    <b>Modal 1</b>
                </button>
            </div>
            <div class="col-12 col-md-2 d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal2">
                    <b>Modal 2</b>
                </button>
            </div>
            <div class="col-12 col-md-2 d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal3">
                    <b>Modal 3</b>
                </button>
            </div>
            <div class="col-12 col-md-2 d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal4">
                    <b>Modal 4</b>
                </button>
            </div>
            <div class="col-12 col-md-2 d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal5">
                    <b>Modal 5</b>
                </button>
            </div>
            <div class="col-12 col-md-4 d-flex justify-content-center mb-2">
                <a href="?pagina=principal" class="btn btn-warning"><b>SALIR</b></a>
            </div>
        </div>
    </div> <!-- fin de container -->

    <!-- Sección del modal 1 -->
    <div class="modal fade" tabindex="-1" id="modal1" aria-labelledby="modal1Label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-warning">
                    <h5 class="modal-title" id="modal1Label">Formulario de Entrenadores</h5>
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
                    <h5 class="modal-title" id="modal2Label">Modal 2</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Contenido del segundo modal.</p>
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
                    <h5 class="modal-title" id="modal3Label">Modal 3</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Contenido del tercer modal.</p>
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
                    <h5 class="modal-title" id="modal4Label">Modal 4</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Contenido del cuarto modal.</p>
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
                    <h5 class="modal-title" id="modal5Label">Modal 5</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Contenido del quinto modal.</p>
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
</
