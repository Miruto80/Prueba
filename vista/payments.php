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


    .table th,
    .table td {
        border: 1px solid #E7B00A;
        /* Bordes blancos y gruesos */
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
    <hr />
    <div class="container">
        <div class="h1 text-center h2 text-warning">Gestion de Pagos</div>

        <hr/>
    </div>


    </div>
    <div class="container">
        <!-- todo el contenido ira dentro de esta etiqueta-->
        <div class="container">
            <div class="row mt-4 justify-content-center">

                <div class="col-6 col-md-4 d-flex justify-content-center mb-2" >
                    <button type="button" class="btn btn-warning btn-block" id="incluir"><b>Incluir un Pago</b></button>
                </div>

                <div class="col-6 col-md-4 d-flex justify-content-center mb-2">
            <a href="?pagina=principal" class="btn btn-warning btn-block"><b>SALIR</b></a>
        </div>
            </div>
            <hr />
        </div>
        <div class="tablita container">
            <div class="table-responsive">
                <table class="table table-striped table-dark table-hover" id="tablapersona">
                    <thead>
                        <tr>

                            <th>Acciones</th>
                            <th>Cedula</th>
                            <th>Fecha de pago</th>
                            <th>Monto</th>
                            <th>Comprobante</th>
                            <th>Metodo de Pago</th>
                            <th>Nro de Accion</th>


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
                <h3 class="modal-title">Formulario de pagos</h3>
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
                                <div class="col-md-4">
                                    <label for="cedula">Cedula</label>
                                    <input class="form-control" type="text" id="cedula" name="cedula" />
                                    <span id="scedula"></span>
                                </div>
                                <div class="col-md-8">
                                    <label for="fechadepago">fecha de pago</label>
                                    <input class="form-control" type="date" id="fechadepago" name="fechadepago" />
                                    <span id="sfechadepago"></span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="Monto">Monto</label>
                                    <input class="form-control" type="text" id="Monto" name="Monto" />
                                    <span id="sMonto"></span>
                                </div>


                                <div class="col-md-8">
                                    <label for="Comprobantedepago">Comprobante de Pago</label>
                                    <input class="form-control" type="text" id="Comprobantedepago"
                                        name="Comprobantedepago" />
                                    <span id="sComprobantedepago"></span>
                                </div>


                            </div>
                            <!-- en proceso de creacion -->
                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <label for="tipopago">Tipo de Pago</label>
                                    <select class="form-control" id="tipopago" name="tipopago">
                                        <option value="Pago movil">Pago movil</option>
                                        <option value="tranferencia">Tranferencia</option>
                                        <option value="Efectipo">Efectivo</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="numeroaccion">Numero de Accion</label>
                                    <input class="form-control" type="text" id="numeroaccion" name="numeroaccion" />
                                    <span id="snumeroaccion"></span>
                                </div>
                            </div>
                            <!-- en proceso de creacion -->
                            <div class="col-md-12">
                                <label for="mes">Mes</label>
                                <select class="form-control" id="mes" name="mes">
                                    <option value="">Enero</option>
                                    <option value="">Febrero</option>
                                    <option value="">Marzo</option>
                                    <option value="">Abril</option>
                                    <option value="">Mayo</option>
                                    <option value="">Junio</option>
                                    <option value="">Julio</option>
                                    <option value="">Agosto</option>
                                    <option value="">Septiembre</option>
                                    <option value="">Octubre</option>
                                    <option value="">Noviembre</option>
                                    <option value="">Diciembre</option>

                                </select>
                            </div>


                        </div>
                        <div class="row mt-3 justify-content-center">
                            <div class="col-md-2">
                                <button type="button" class="btn btn-dark" id="proceso"></button>
                            </div>
                        </div>
                        <br />
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

    <?php require_once("comunes/modal.php"); ?>
    <script type="text/javascript" src="js/payments.js"></script>

</body>

</html>