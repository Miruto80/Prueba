<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="img/logo taekyon.png" />
    <title>Taekyon</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <style>
        body {
          background-image: url('img/fondo.jpg');
          background-size: cover;
          background-repeat: no-repeat;
        }
    
        .login-container {
      border: 2px solid #ffc10760;
      margin: 5px;
      max-width:50rem;
      padding: 2rem;
      background-color: rgba(0, 0, 0, 0.384);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.316), 0 6px 6px rgba(0, 0, 0, 0.3);
      display: flex;
      justify-content: space-between;
        }
    
        .form-control:focus {
          box-shadow: none;
        
        }    
    
        .btn-outline-warning:hover {
          background-color: #ffc10760;
          color: #fff;
        }
    
        .form-check-label {
          font-size: 0.9rem;
        }
    
        .text-center a {
          font-size: 0.9rem;
        }
    
        a:hover {
          color: #ffd700;
        }
        h2:hover {
          color: #ffd700;
        }
    
        .seccion2 {
          background-color: rgba(0, 0, 0, 0.8);
          border: 1px solid #ffc10760;
          border-radius: 100px 100px 0 100px;
          box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2), 0 6px 6px rgba(0, 0, 0, 0.3);
          padding: 0;
        }

      </style>
</head>
<body>

    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

      <!----------------------- Login Container -------------------------->
  
         <div class="login-container row  p-3 rounded-5">
  
      <!--------------------------- Left Box ----------------------------->
  
         <div class="seccion2 text-warning col-md-6 d-flex justify-content-center align-items-center flex-column left-box">
          <p class="texto fs-5 text-center mt-3";">¡Bienvenido al sistema de la Taekyon!</p>
             
             <small class="text-wrap text-center mb-3" style="width: 17rem;">Ingresa los respectivos datos para ingresar al sistema actual de nuestra academia..</small>
         </div> 
  
      <!-------------------- ------ Right Box ---------------------------->
          
         <div class="col-md-6 right-box">
            <div class="row align-items-center">
              <div class="featured-image d-flex justify-content-center">
                <img src="img/logo taekyon.png" class="img-fluid text-center" style="height: 6rem;">
               </div>
              <div class="header-text  text-center h1 text-white fw-bold"> Iniciar Sesión</div>

                  <div class="input-group mt-3 mb-2">
                    <div class="input-group-text bg-dark-subtle">
                      <img src="img/user.svg" alt="username-icon" style="height: 1rem" />
                    </div>
                    <input class="form-control" type="text" placeholder="Usuario" required />
                  </div>

                  <br/>

                  <div class="input-group mt-1 ">
                    <div class="input-group-text bg-dark-subtle">
                      <img src="img/password.svg" alt="password-icon" style="height: 1rem" />
                    </div>
                    <input class="form-control" type="password" placeholder="Contraseña" required />
                  </div>

                      <div class="form-check my-2 d-flex justify-content-center">
                        <input class="form-check-input" type="checkbox" id="connected" />
                        <label class="form-check-label ms-2 text-white" for="connected">Mantener sesión</label>
                      </div>

                  </div>

                  <div class="input-group mb-2 text-center d-grid gap-2 col-6 mx-auto">
                    <a class="boton btn btn-lg btn-outline-warning" href="?pagina=principal" role="button">INGRESAR</a>
                  </div>
            </div>
         </div> 
  
        </div>
      </div>
</body>
</html>