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
		.table {
			border-collapse: separate;
		
		}

		.table th,
		.table td {
			border: 1px solid #E7B00A;
			
		}

		.action-column {
            width: 5rem; 
        }
		.tablita {
			color: white;
		}
		
		.form-check-input{ 
			width:30px;  
			height:30px;
			border: 1px solid #E7B00A;
			display:block;
		}
		
		
		
	</style>
<div class="container text-center h2 text-warning mt-3">Registro de Eventos<hr/>

</div>
<div class="container"> <!-- todo el contenido ira dentro de esta etiqueta-->
	<div class="container">
	<div class="row mt-4 justify-content-center">
        <div class="col-12 col-md-4 d-flex justify-content-center mb-2">
            <button type="button" class="btn btn-warning btn-block" id="incluir"><b>INSCRIBIR</b></button>
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
                <th class="text-center action-column">Acciones</th>
				<th class="text-center">Nombre del Evento</th>
				<th class="text-center">Logro del Evento</th>
				<th class="text-center">Fecha Evento</th>
			  </tr>
			</thead>
			<tbody id="resultadoconsulta">
			</tbody>
	   </table>
	  </div>
  </div>
</div> <!-- fin de container -->


<!-- seccion del modal -->
<div class="tabla modal fade" tabindex="-1" role="dialog"  id="modal1">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-header text-warning bg-dark justify-content-center">
        <h3 class="modal-title">Formulario Eventos</h3>
        <button type="button" class="btn-close  bg-light" aria-label="Close"></button>
    </div>
    <div class="modal-content">
		<div class="container"> 
		   <form method="post" id="f" autocomplete="off">
			<input autocomplete="off" type="text" class="form-control" name="accion" id="accion" style="display: none;">
			<div class="container">	
				<div class="row mb-3">
					<div class="col-md-4">
					   <label for="NombreEvento">Nombre Evento</label>
					   <input class="form-control" type="text" id="NombreEvento" name="NombreEvento" />
					   <span id="sNombreEvento"></span>
					</div>
					<div class="col-md-8">
					   <label for="Logroobtenido"> Logro Evento</label>
					   <input class="form-control" type="text" id="Logroobtenido" name="Logroobtenido" />
					   <span id="sLogroobtenido"></span>
					</div>

                    <div class="col-md-4">
					   <label for="fechaevento">Fecha del Evento</label>
					   <input class="form-control" type="date" id="fechaevento" name="fechaevento" />
					   <span id="sfechaevento"></span>
					</div>

                    </div>				
				<div class="row mt-3 justify-content-center">
					<div class="col-md-2">
						   <button type="button" class="btn btn-dark" 
						   id="proceso" ></button>
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
					</form>

<!--fin de seccion modal-->

<?php require_once("comunes/modal.php"); ?>
<script type="text/javascript" src="js/records.js"></script>

</body>
</html>