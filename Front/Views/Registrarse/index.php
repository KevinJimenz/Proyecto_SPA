<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/Css/Styles.css">
    <link rel="shortcut icon" href="../Assets/Img/Logo.png" type="image/x-icon">
    <title>Spa | Registrarse</title>
</head>

<body class="container-fluid bg-body-secondary">
    <nav class="row bg-body shadow py-2 py-md-3 mb-5">
        <div class="col-auto mx-auto">
            <a class="logo-icon" href="./">
                <img width="120px" class="img" src="../Assets/Img/Logo.png" alt="Spa_Logo.webp">
            </a>
        </div>
        <div class="col align-content-center">
            <ul class="nav flex-column flex-md-row">
                <li class="nav-item">
                    <a class="nav-link link-dark fw-bold text-center fs-5 text-center fs-5"
                        href="../../../index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-dark link-opacity-50 link-opacity-100-hover text-center fs-5"
                        href="./">Dashboard</a>
                </li>
            </ul>
        </div>
        <div class="col-12 col-md-auto ms-auto align-content-center mt-2 mt-md-0">
            <div class="btn-group shadow-sm w-100">
                <a class="btn btn-lg btn-outline" href="../Ingresar">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Ingresar
                </a>
                <a class="btn btn-lg btn-select" href="../Registrarse/">
                    Registrarse
                </a>
            </div>
        </div>
    </nav>
    <main class="row mb-5 mb-md-0 bg-img-register">
        <div class="row align-content-around py-5">
            <div class="col col-md-9 col-lg-11 mx-auto pt-4">
                <div class="bg-body-tertiary rounded-4 border shadow p-3 p-md-5">
                    <div class="row g-3 g-md-5">
                        <div class="col-12 col-md-6 align-content-center text-center">
                            <h1 class="display-4 fw-bold">¡Regístrate hoy!</h1>
                            <p class="fw-light fs-4">Los datos que se encuentran con un <b>(*)</b> son obligatorios</p>
                        </div>
                        <div class="col-12 col-md-6">
                            <form>
                                <div class="form_labels">
                                    <div class="label1">
                                        <h3 class="mb-1">Datos básicos</h3>
                                        <label class="text-secondary fs-5 ms-1 mb-1" for="nombres">Nombres*</label>
                                        <input type="text" class="form-control form-control-lg rounded-3 mb-1"
                                            name="nombre" id="nombre" required>
                                        <label class="text-secondary fs-5 ms-1 mb-1" for="nombres">Apellidos*</label>
                                        <input type="text" class="form-control form-control-lg rounded-3 mb-1"
                                            name="apellido" id="apellido" required>
                                        <label class="text-secondary fs-5 ms-1 mb-1" for="telefono">Teléfono*</label>
                                        <input type="tel" class="form-control form-control-lg rounded-3 mb-3"
                                            name="telefono" id="telefono" pattern="^[0-9]*$" required>
                                    </div>
                                    <div class="label2">
                                        <h3 class="mb-1">Datos de ingreso</h3>
                                        <label class="text-secondary fs-5 ms-1 mb-1" for="email">Email*</label>
                                        <input type="email" class="form-control form-control-lg rounded-3 mb-1"
                                            name="email" id="email" required>
                                        <label class="text-secondary fs-5 ms-1 mb-1" for="password">Contraseña*</label>
                                        <input type="password" class="form-control form-control-lg rounded-3 mb-2"
                                            name="password" id="password" minlength="8" required>
                                        <div class="form-check text-black-50">
                                            <input class="form-check-input" type="checkbox" id="showPass">
                                            <label class="form-check-label" for="showPass">
                                                Mostrar contraseña
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <p class="pb-3 mb-0" id="lblErr"></p>

                                <div class="row">
                                    <div class="col-auto ms-auto">
                                        <button class="btn btn-lg btn-select btn-primary px-3" type="button"
                                            id="btnRegistrarme">
                                            Registrarme
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid Social-Media pb-3"></div>
        </div>
    </main>
    <script>
    document.getElementById("showPass").addEventListener("change", () => {
        var inpPass = document.getElementById("password");
        inpPass.type == "password" ? inpPass.type = "text" : inpPass.type = "password";
    });
    </script>
    <script type="module" src="./main.js"></script>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true"></div>

</body>

</html>