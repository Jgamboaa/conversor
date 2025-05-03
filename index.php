<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Unidades Físicas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/styles.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header class="text-center">
            <img src="assets/img/umg_logo.png" alt="Logo" width="130" class="logo">
            <h1 class="header-title my-3">
                <i class="fas fa-exchange-alt"></i> Conversor de Unidades Físicas
            </h1>
        </header>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card converter-card">
                    <!-- <div class="card-header">
                        <h5 class="mb-0">
                            <i id="magnitude-icon" class="fas fa-ruler magnitude-icon"></i>
                            <span>Conversor de Unidades</span>
                        </h5>
                    </div> -->
                    <div class="card-body">
                        <form id="converter-form">
                            <div class="mb-4">
                                <label for="magnitude" class="form-label">Selecciona la magnitud física:</label>
                                <select id="magnitude" class="form-select" required>
                                    <!-- Las opciones se cargarán dinámicamente desde JavaScript -->
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="value" class="form-label">Valor a convertir:</label>
                                    <input type="text" id="value" class="form-control" placeholder="Ingrese un valor" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Unidad de origen:</label>
                                    <select id="fromUnit" class="form-select" required>
                                        <!-- Las opciones se cargarán dinámicamente desde JavaScript -->
                                    </select>
                                </div>
                            </div>

                            <div class="text-center mb-3">
                                <button type="button" id="swap-units" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-exchange-alt"></i> Intercambiar unidades
                                </button>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Unidad de destino:</label>
                                <select id="toUnit" class="form-select" required>
                                    <!-- Las opciones se cargarán dinámicamente desde JavaScript -->
                                </select>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-calculator"></i> Convertir
                                </button>
                            </div>
                        </form>

                        <!-- Mensaje de error -->
                        <div id="error-message" class="alert alert-danger mt-3 d-none"></div>

                        <!-- Indicador de carga -->
                        <div id="loading-spinner" class="text-center mt-3 d-none">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Cargando...</span>
                            </div>
                        </div>

                        <!-- Resultado de la conversión -->
                        <div id="result-container" class="result-container mt-4 d-none">
                            <h5 class="mb-3">Resultado de la conversión:</h5>
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <div class="result-value text-center mb-2" id="result-value">0</div>
                                    <div class="result-formula text-center">
                                        <span id="result-from">Unidad origen</span> → <span id="result-to">Unidad destino</span>
                                    </div>
                                </div>
                                <div class="col-md-4 text-md-end">
                                    <i class="fas fa-check-circle text-success fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fas fa-info-circle me-2"></i> Información sobre el conversor
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Este conversor te permite transformar unidades de diferentes magnitudes físicas de forma rápida y sencilla:</p>
                                    <ul>
                                        <li><strong>Longitud:</strong> metros, kilómetros, millas, pulgadas, pies</li>
                                        <li><strong>Masa:</strong> gramos, kilogramos, libras, onzas, toneladas</li>
                                        <li><strong>Tiempo:</strong> segundos, minutos, horas, días, semanas</li>
                                        <li><strong>Temperatura:</strong> Celsius, Fahrenheit, Kelvin</li>
                                        <!-- <li><strong>Energía:</strong> julios, calorías, kilovatios-hora, electronvoltios, BTU</li> -->
                                    </ul>
                                    <p>La conversión se realiza de forma automática al cambiar cualquier valor o unidad.</p>
                                    <p>Este proyecto fue desarrollado para el curso Fisica I de la carrera Ingeniería en Sistemas de la Universidad Mariano Galvez de Guatemala con fines educativos.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <p>&copy; <?php echo date('Y'); ?> Conversor de Unidades Físicas - Jonatan Isaí Gamboa</p>
        </footer>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/app.js"></script>
</body>

</html>