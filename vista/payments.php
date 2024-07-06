<!DOCTYPE html>
<html lang="en">
  
<head>
  
</head>
<?php require_once("comunes/framework.php"); ?>
<body>

<?php require_once('comunes/nav.php'); ?>

<style>  
		body {
			background-image: url('img/fondo.jpg');
          background-size: cover;
          background-repeat: no-repeat;
          
		/* }
    .blur {
  filter: blur(10px); Puedes ajustar el valor para cambiar el nivel de desenfoque */
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


<div class="container mt-3 text-center h2 text-warning">Gestion de Pagos<hr/>
<!--  
<img src="img/fondo.jpg" class="img-fluid blur"> -->

 </div>

<div class="tablita container text-center">
	   <div class="table-responsive">
		<table class="table table-striped table-dark table-hover" id="tablapago">
		<thead>
                <tr>
                    <th>Accion</th>
                    <th>Cédula</th>
                    <th>número de acción</th>
                    <th>comprobante de pago</th>
                    <th>fecha del pago</th>
                    <th>monto</th>
                    <!-- Corregido: etiqueta cerrada -->
                </tr>
            </thead>
			<tbody id="resultadoconsulta">
                <!-- Aquí irán los datos de la tabla -->
            </tbody>
	   </table>
	  </div>
  </div>

  
<div class="container text-center">
<div class="fixed-bottom">
  <button type="button" id = "incluirpago" class="btn btn-warning mr-4 mb-4">Agregar Pago</button>
  <button type="button" class="btn btn-warning mr-4 mb-4">Listar Pagos</button>
  <button type="button" class="btn btn-warning  mb-4">Salir</button>
</div>
  </div>
 </div>
 


</body>

</html>

