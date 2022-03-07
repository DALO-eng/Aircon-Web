<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <section>
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
                                    <option value="prueba1">prueba1</option>
                                    <option value="prueba2">prueba2</option>
                                    <option value="prueba3">prueba3</option>
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
    </main>
</body>
</html>