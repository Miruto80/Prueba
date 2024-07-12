<!DOCTYPE html>
<html lang="en">

<head>

</head>
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
        border-spacing: 0;
    }

    .table th,
    .table td {
        border: 1px solid #E7B00A;
    }

    .tablita {
        color: white;
    }

    .floating-btn {
        position: fixed;
        bottom: 20px;
        margin: 1px;
    }
    </style>

    <div class="container mt-3 text-center h2 text-warning">
        Gestion de eventos
        <hr />
    </div>
    <div class="container">
        <!-- todo el contenido ira dentro de esta etiqueta-->
        <div class="container">
            <div class="row mt-4 justify-content-center">

                <div class="col-md-4">
                    <button type="button" class="btn btn-warning" id="incluir">Incluir Evento</button>
                </div>

                <div class="col-md-1">
                    <a href="." class="btn btn-warning">Salir</a>
                </div>
            </div>
        </div>
    </div>
    <div class="tablita container">
        <div class="table-responsive">
            <table class="table table-striped table-dark table-hover" id="tablapersona">
                <thead>
                    <tr>
                        <th>Acciones</th>
                        <th>Codigo Eventos</th>
                        <th>Id</th>
                        <th>Nombre del Evento</th>
                        <th>Logro del Evento</th>
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
                <h3 class="modal-title">Formulario de Eventos</h3>
                <button type="button" class="btn-close  bg-light" aria-label="Close"></button>
            </div>
            <div class="modal-content">
                <div class="container">
                    <form method="post" id="f" autocomplete="off">
                        <input autocomplete="off" type="text" class="form-control" name="accion" id="accion"
                            style="display: none;">

                        <div class="container">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="Codevento">Codigo Eventos</label>
                                    <input class="form-control" type="text" id="Codevento" name="Codevento" />
                                    <span id="sCodevento"></span>
                                </div>
                                <div class="col-md-8">
                                    <label for="id3">Id3</label>
                                    <input class="form-control" type="text" id="id3" name="id3" />
                                    <span id="sid3"></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <label for="NombreEvento">Nombre del Evento</label>
                                    <input class="form-control" type="text" id="NombreEvento" name="NombreEvento" />
                                    <span id="sNombreEvento"></span>
                                </div>
                                <div class="col-md-4">
                                    <label for="Logroobtenido">Logro del Evento</label>
                                    <input class="form-control" type="date" id="Logroobtenido" name="Logroobtenido" />
                                    <span id="sLogroobtenido"></span>
                                </div><br>
                                <div class="container"></div>

                                <div class="row">
                                    <div class="col"><button type="button" id="proceso" class="btn btn-warning"
                                            data-bs-dismiss="modal">Incluir</button>
                                    </div>
                                </div>

                    </form>


                    <div class="row align-items-start">

                        <div class="modal-footer bg-dark">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>



            </div><!-- fin de container -->
        </div>
    </div>
    </div>
    </div>
    <!--fin de seccion modal-->

    <?php require_once("comunes/modal.php"); ?>
    <script type="text/javascript" src="js/records.js"></script>

</body>

</html>