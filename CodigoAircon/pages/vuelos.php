<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva tu vuelo.</title>

    <!-- Styles -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/vuelos.css">
    <link rel="shortcut icon" href="https://drive.google.com/uc?id=1VOhsU-9rzNeTUiiOLaCCf9GIX1Hvge7B" type="image/x-icon">
    <script src="https://kit.fontawesome.com/be539b68f8.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Belleza&display=swap" rel="stylesheet">

    <!-- JavaScript complements -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="./CodigoAircon/assests/scripts/interactive-navbar.js"></script>
    <script src="/CodigoAircon/assests/scripts/validate-alert.js"></script>
    <script src="https://kit.fontawesome.com/be539b68f8.js" crossorigin="anonymous"></script>
    <script src="../Aircon-Web-master/CodigoAircon/assests/scripts/validate-alert.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="../assets/scripts/googleMaps.js"></script>

</head>
<body>
    <main>
        <section class="hero">
            <div class="main-form  mt-3">
                <ul class="hero-form-options nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" data-bs-toggle="tab" href="#booking">Reserva tu vuelo</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-bs-toggle="tab" href="#find">Gestiona tu reserva</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-bs-toggle="tab" href="#check">Check-in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#state">Estado de vuelos</a>
                    </li>
                </ul>
                  <div class="tab-content">
                    <div id="booking" class="container tab-pane active"><br>
                      <form class="booking-form" action="">
                        <div class="type-of-flight">
                              <input type="radio" name="type-trip" id="one-way" checked>
                              <label for="one-way">Solo ida</label>
                              <input type="radio" name="type-trip" id="round-trip">
                              <label for="round-trip">Ida y vuelta</label>
                        </div>
                        <div class="main-info">
                            <div class="main-info-element">
                                <label for="from">Desde:</label>
                                <select name="from" id="from">
                                    <option value="prueba1"></option>
                                </select>
                            </div>
                            <div class="main-info-element">
                                <label for="to">Hasta:</label>
                                <select name="to" id="to">
                                    <option value="prueba1">prueba1</option>
                                    <option value="prueba2">prueba2</option>
                                    <option value="prueba3">prueba3</option>
                                </select>
                            </div>
                            <div class="main-info-element">
                                <label for="date-arrive">Salida:</label>
                                <select name="date-arrive" id="date-arrive">
                                    <option value="prueba1">prueba1</option>
                                    <option value="prueba2">prueba2</option>
                                    <option value="prueba3">prueba3</option>
                                </select>
                            </div>
                            <div class="main-info-element">
                                <label for="date-leave">Regreso:</label>
                                <select name="date-leave" id="date-leave">
                                    <option value="prueba1">prueba1</option>
                                    <option value="prueba2">prueba2</option>
                                    <option value="prueba3">prueba3</option>
                                </select>
                            </div>
                        </div>
                        <div class="sub-info">
                            <div class="amount">
                                <label for="adult">Adultos:</label>
                                <select name="adult" id="adult">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <!-- <div class="amount">
                                <label for="teen">Jóvenes:</label>
                                <select name="teen" id="teen">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div> -->
                            <div class="amount">
                                <label for="children">Niños:</label>
                                <select name="children" id="children">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <a class="promo-code" href="#">Código promocional</a>
                            <button class="primary-button">Buscar Vuelo</button>
                        </div>
                      </form>
                    </div>
                    <div id="find" class="container tab-pane fade"><br>
                        <form action="" class="find-form">
                            <div class="find-presentation">
                                <h2>Consulta tu reserva!</h2>
                                <p>Obten información acerca de tu reserva de una manera rápida y sencilla!</p>
                            </div>
                            <div class="find-info">
                                <div>
                                    <label for="">Número de reserva:</label>
                                    <input type="text">
                                </div>
                                <div>
                                    <label for="">Apellidos del pasajero:</label>
                                    <input type="text">
                                </div>
                                <button class="primary-button">Continuar</button>
                            </div>
                        </form>
                    </div>
                    <div id="check" class="container tab-pane fade"><br>
                        <form action="" class="find-form">
                            <div class="find-presentation">
                                <h2>Check-in!</h2>
                                <p>Realiza tu check-in en pocos minutos!</p>
                            </div>
                            <div class="find-info">
                                <div>
                                    <label for="">Número de vuelo:</label>
                                    <input type="text">
                                </div>
                                <div>
                                    <label for="">Apellido:</label>
                                    <input type="text">
                                </div>
                                <div>
                                    <label for="">Fecha de vuelo:</label>
                                    <input type="date">
                                </div>
                                <button class="primary-button">Continuar</button>
                            </div>
                        </form>
                    </div>
                    <div id="state" class="container tab-pane fade"><br>
                        <form action="" class="find-form">
                            <div class="find-presentation">
                                <h2>Consulta el estado de tu vuelo!</h2>
                                <p>Obten información acerca de tu vuelo reservado!</p>
                            </div>
                            <div class="find-info">
                                <div>
                                    <label for="">Número de vuelo:</label>
                                    <input type="text">
                                </div>
                                <div>
                                    <label for="">Fecha de vuelo:</label>
                                    <input type="date">
                                </div>
                                <button class="primary-button">Continuar</button>
                            </div>
                        </form>
                    </div>
                  </div>
            </div>
        </section>
        <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&libraries=&v=weekly"
      async
    ></script>
    </main>
</body>
</html>