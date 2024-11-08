<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TAEKYON</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="?pagina=principal">
          <img src="img/logo taekyon.png" alt="Logo Taekyon" width="45" height="auto" class="d-inline-block align-text-top">
        </a>
        <a class="navbar-brand" href="?pagina=principal"> TAEKYON </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="?pagina=principal">Inicio</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Registrar datos
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="?pagina=athletes">Inscribir Atletas</a></li>
                <li><a class="dropdown-item" href="?pagina=trainers">Incluir Entrenadores</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Gestionar datos
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="?pagina=schedules">Gestionar Horarios</a></li>
                <li><a class="dropdown-item" href="?pagina=payments">Gestionar Pagos</a></li>
                <li><a class="dropdown-item" href="?pagina=records">Gestionar Logros</a></li>
                <li><a class="dropdown-item" href="?pagina=report">Reportes</a></li>
              </ul>
            </li>
          </ul>

          <!-- Botones alineados a la derecha -->
          <ul class="navbar-nav ms-auto">
            <li class="nav-item me-2"> <!-- Margen derecho para el primer botón -->
            <?php
					  if($nivel=='Gerente' or $nivel=='Secretaria'){
					   ?>
              <a class="btn btn-outline-secondary" href="?pagina=Users">
                <img src="img/iconob.png" alt="Icono Usuario" width="30" height="30" class="d-inline-block align-text-top">
              </a>
              <?php
					    }
					    ?>
            </li>

            <li class="nav-item"> <!-- Sin margen en el segundo botón -->
              <?php if (isset($nivel) && !empty($nivel)) { ?>
                <a href="?pagina=salida" class="btn btn-outline-secondary my-2 my-sm-0">
                  <img src="img/salirb.svg" alt="Icono Salir" width="30" height="auto" class="d-inline-block align-text-top">
                </a>
              <?php } ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</body>

</html>