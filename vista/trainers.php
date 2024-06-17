<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="UTF-8" />
  <link rel="icon" type="image/x-icon" href="img/logo taekyon.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sistema Taekyon</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />

  <style>

    body {
      background-image: url('');
      background-size: cover;
      background-repeat: no-repeat;
      height: 100vh;
      margin: 0;
    }

    .login-container {
      border: 3px solid  #ffd700;
      margin: 0;
      max-width: 50rem;
      padding: 2rem;
      border-radius: 0.5rem;
      background-color: rgba(255, 255, 255, 0.9);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2), 0 6px 6px rgba(0, 0, 0, 0.3);
      display: flex;
      justify-content: space-between;
    }

    .input-group-text {
      background-color: #e9ecef;
      border: none;
    }

    .form-control {
      border-left: none;
    }

    .form-control:focus {
      box-shadow: none;
    }

    .btn-outline-warning {
      border-color: #ffc107;
      color: #ffc107;
    }

    .btn-outline-warning:hover {
      background-color: #ffc107;
      color: #fff;
    }

    .form-check-label {
      font-size: 0.9rem;
    }

    .text-center a {
      font-size: 0.9rem;
    }

    input {
      margin-bottom: 5px;
      width: 100%;
    }

    a {
      text-decoration: none;
      background-color: #000000;
      color: rgb(244, 255, 194);
      font-size: 12px;
      padding: 10px 45px;
      border: 1px solid transparent;
      border-radius: 8px;
      font-weight: 600;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      cursor: pointer;
      transition: color 0.3s ease;
    }

    a:hover {
      color: #ffd700;
    }

    .seccion2 {
      border: 3px solid  #ffd700;
      margin: 0;
      border-radius: 100px 0 0 100px;
      margin-left: 25px;
      max-width: 20rem;
      padding: 2rem;
      background-color: rgba(0, 0, 0, 0.8);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2), 0 6px 6px rgba(0, 0, 0, 0.3);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
  </style>


</head>
<div class="card text-bg-dark mb-3 text-center" style="max-width: 100%;">
  <div class="card-header"></div>
  <div class="card-body">
    <h5 class="card-title">Entrenadores</h5>
    <p class="card-text"></p>
  </div>
</div>
<body>

<div class="container">
	   <div class="table-responsive">
		<table class="table table-striped table-hover" id="tablapersona">
			<thead>
			  <tr>
				<th>Acciones</th>
				<th>Cedula</th>
				<th>Apellidos</th>
				<th>Nombres</th>
				<th>Participacion</th>
				<th>Direccion</th>
				<th>Correo</th>
				<th>Telefono</th>
			  </tr>
			</thead>
			<tbody id="">
			  
			  
			</tbody>
	   </table>
	  </div>
  </div>

  <a class="btn btn-dark text-center" aria-current="page" href="?pagina=principal">Inicio</a>
  
  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>

