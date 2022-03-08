<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./CodigoAircon/styles/style.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" href="https://drive.google.com/uc?id=1VOhsU-9rzNeTUiiOLaCCf9GIX1Hvge7B" type="image/x-icon">
    <script src="https://kit.fontawesome.com/be539b68f8.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Belleza&display=swap" rel="stylesheet">

    <!-- JavaScript complements -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="./CodigoAircon/assests/scripts/interactive-navbar.js"></script>
    <script src="https://kit.fontawesome.com/be539b68f8.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./CodigoAircon/assests/scripts/validate-alert.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <!-- Title page -->

    <title>Aircon | Vuelos de calidad al mejor precio</title>

</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['user'])){
            if((time() - $_SESSION['time'] > 900)){
                header("Location: ./logout.php");
                exit;
            }
            else{
                $_SESSION['time'] = time();
                $mainValue = $_SESSION['user']['name'] . " " . $_SESSION['user']['lastname'];
                $direction = "#";
                $myId = "open";
            }
        }
        else{
            $mainValue = "Iniciar Sesión";
            $direction = './CodigoAircon/pages/loginPage.php';
            $myId = "";
        }
    ?>
    <main>
        <section id="main-component">
            <head>
                <nav class="navbar">
                        <img src="https://drive.google.com/uc?id=141ILhH9N3xMNjuAF99kE5zmWdIWCKrGc" alt="aircon-logo-mobile" class="logo-mobile">
                        <img src="./datosAircon/logo-horizontal.png" alt="aircon-logo-desktop" class="logo-desktop">
                        <a class="bars" id="toggle-button" href="#"><i class="fas fa-bars"></i></a>
                        <ul class="navbar-options">
                            <li><a href="CodigoAircon/pages/vuelos.php">Oferta de vuelos</a></li>
                            <li><a href="#">Mis Viajes</a></li>
                            <li><a href="./CodigoAircon/pages/Cali.html" >Encuestas</a></li>
                            <li><a href="#">Ayuda</a></li>
                            <li><a id="<?php echo $myId;?>" href=<?php echo $direction;?>><?php echo $mainValue;?></a></li>
                        </ul>
                </nav>
                <div class="popout-container" id="container">
                    <div class="popout">
                        <div class="user-info">
                            <h1>Usuario</h1>
                            <p><?php echo "Nombre: " . $_SESSION['user']['name'] . " " . $_SESSION['user']['lastname'];?></p>
                            <p><?php echo "Correo: " . $_SESSION['user']['email'];?></p>
                            <p><?php echo "País: " . $_SESSION['user']['country'];?></p>
                            <p><?php echo "Teléfono: " . $_SESSION['user']['phone'];?></p>
                            <p><?php echo "Fecha nacimiento: " . $_SESSION['user']['birth'];?></p>
                        </div>
                        <div class="user-links">
                            <a href="#" id="close">Cerrar</a>
                            <a href="#">Cambiar Contraseña</a>
                            <a href="./CodigoAircon/pages/logout.php">Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
            </head>
            <section class="hero">
                <div class="hero-text--component">
                    <h1 class="hero-title">Aircon</h1>
                    <p class="hero-subtitle">Vuelos de calidad al mejor precio</p>
                </div>
            </section>
        </section>
        

        <section id="commonTrip">
            <div id="carouselExampleControls" class="carousel slide slide-container" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100 slide-images" src="./datosAircon/santaMarta.jpeg" alt="First slide">
                        <div class="carousel-caption">
                            <h4 class="city-text">Santa Marta - Colombia</h4>
                            <p class="d-none d-md-block">Encuentrate con las maravillosas playas que ofrecen el Caribe colombiano.</p>
                            <a role="button" class="primary-button link btn reserv-btn" href="#form1">Reserva tu vuelo</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 slide-images" src="./datosAircon/boston.jpg" alt="Second slide">
                        <div class="carousel-caption d-md-block">
                            <h4 class="city-text">Boston - Massachussets</h4>
                            <p class="d-none d-md-block">Conoce este destino lleno de historia y tambien modernidad.</p>
                            <a role="button" class="primary-button link reserv-btn" href="#form1">Reserva tu vuelo</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 slide-images" src="./datosAircon/barcelona.jpg" alt="Third slide">
                        <div class="carousel-caption">
                            <h4 class="city-text">Barcelona - España</h4>
                            <p class="d-none d-md-blockt">Descubre la mezcla catalana y española en una ciudad llena de magia y aventura.</p>
                            <a role="button" class="primary-button link reserv-btn" href="#form1">Reserva tu vuelo</a>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
          </div>
        </section>

        <section id="testimonials">
            <div class="row row-cols-1 g-4">
                <div class="col col-lg-4 col-md-6 col-sm-12">
                  <div class="card border-0 ">
                    <img src="datosAircon/testimonial1.jfif" class="card-img-top" alt="picture id #1">
                    <div class="card-body">
                      <h5 class="card-title">Simply awesome</h5>
                      <p class="card-text">I love Aircon. It's simple, easy to use and have all information that I need about my trip.</p>
                    </div>
                  </div>
                </div>
                <div class="col col-lg-4 col-md-6 col-sm-12">
                  <div class="card border-0">
                    <img src="datosAircon/testimonial2.jfif" class="card-img-top" alt="picture id #2">
                    <div class="card-body">
                      <h5 class="card-title">Aircon is your best option</h5>
                      <p class="card-text">I'm searching a webpage that allow me to track all my trip. I just need to say THANK YOU Aircon.</p>
                    </div>
                  </div>
                </div>
                <div class="col col-lg-4 col-md-6 col-sm-12">
                  <div class="card border-0">
                    <img src="datosAircon/testimonial3.jpg" class="card-img-top" alt="picture id #3">
                    <div class="card-body">
                      <h5 class="card-title">Completely amazing</h5>
                      <p class="card-text">Aircon is a platform that allow me do great trips and live amazing vacations. It's something like movies, Aircon is like fiction science.</p>
                    </div>
                  </div>
                </div>
              </div>
        </section>

    </main>
    <footer>
        <div id="main-footer">
            <div class="contact">
                <span>Contactenos</span>
                <ul>
                    <li>daniel2191693@correo.uis.edu.co</li>
                    <li>dalobusiness01@gmail.com</li>
                    <li>juanduarterueda1223@gmail.com</li>
                    <li>Cristian2191970@correo.uis.edu.co</li>
                </ul>
            </div>
            <div class="social-media">
                <ul>
                    <li><a href="https://www.instagram.com/?hl=es-la" target="_blanck"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="https://www.facebook.com" target="_blanck"><i class="fab fa-facebook-square"></i></a></li>
                    <li><a href="https://twitter.com" target="_blanck"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://github.com/DALO-eng/Aircon-Web" target="_blanck"><i class="fab fa-github"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>

    <div class="popup-form" id="form1">
        <div class="form-content">
            <div class="popup-left">
                <img src="./datosAircon/fly-pic.jpg" alt="form image" class="form-pic">
            </div>
            <div class="popup-right">
                <div class="right-content">
                    <a href="#carousel1" class="form_close">&times;</a>
                    <h3 class="heading-centered">El viaje de tus sueños te espera.</h3>
                    <form class="form-centered">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Correo Electronico</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa tu email">
                          <small id="emailHelp" class="form-text text-muted">No te preocupes, tu información esta a salvo con nosotros.</small>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Contraseña</label>
                          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Ingresa tu contraseña">
                          <small id="emailHelp" class="form-text text-muted">Te recomendamos que sea mayor a 8 caracteres.</small>
                        </div>
                        <div class="centered">
                            <input role="link" href="#carousel1" type="submit" class="primary-button button-pad link align-cont" id="subButton" onclick="getEmail();"></input>
                            <input role="link" type="reset" class="primary-button button-pad link align-cont"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="./CodigoAircon/assets/scripts/popoutLogic.js"></script>
</body>
</html>