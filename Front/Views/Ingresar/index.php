<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/Css/Styles.css">
    <link rel="shortcut icon" href="../Assets/Img/Logo.png" type="image/x-icon">
    <title>Spa | Ingresar</title>
</head>

<body class="container-fluid bg-body-secondary">
    <nav class="row bg-body shadow py-2 py-md-3 mb-5">
        <div class="col-auto mx-auto">
            <a class="logo-icon" href="./">
                <img width="120px" class="img" src="../Assets/Img/Logo.png">
            </a>
        </div>
        <div class="col align-content-center">
            <ul class="nav flex-column flex-md-row">
                <li class="nav-item">
                    <a class="nav-link link-dark fw-bold text-center fs-5 text-center fs-5"
                        href="../../../index.php">Inicio</a>
                </li>
            </ul>
        </div>
        <div class="col-12 col-md-auto ms-auto align-content-center mt-2 mt-md-0">
            <div class="btn-group shadow-sm w-100">
                <a class="btn btn-lg btn-select " href="../Ingresar/">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Ingresar
                </a>
                <a class="btn btn-lg  btn-outline" href="../Registrarse/">
                    Registrarse
                </a>
            </div>
        </div>
    </nav>
    <main class="row bg-img-login">
        <div class="col-11 col-sm-7 col-md-12  align-content-center d-flex justify-content-center mt-5 mx-auto">
            <div class="bg-body rounded-4 col-md-6 border shadow p-4 align-content-center ">
                <div class="col-12 col-md-12 align-content-center text-center">
                    <h1 class="display-6 fw-bold">¡Reserva Tu Momento de Relajación!</h1>
                    <p class="fw-light fs-5">Déjanos cuidar de ti. Completa el formulario y disfruta de una experiencia única.</p>
                </div>
                <form>
                    <div class="form-floating fs-5 py-1 mb-2">
                        <input type="email" class="form-control rounded-3" name="email" id="email" placeholder=""
                            required>
                        <label for="email">Correo electrónico</label>
                    </div>
                    <div class="form-floating fs-5 py-1 mb-1">
                        <input type="password" class="form-control rounded-3" name="pass" id="pass" placeholder=""
                            minlength="8" required>
                        <label for="pass">Contraseña</label>
                    </div>
                    <div class="form-check text-black-50">
                        <input class="form-check-input" type="checkbox" id="showPass">
                        <label class="form-check-label" for="showPass">
                            Mostrar contraseña
                        </label>
                    </div>
                    <p class="mb-0" id="lblErr"></p>
                    <button class="btn btn-lg btn-select w-100 mt-4" type="button" id="btnEntrar">
                        Entrar
                    </button>
                </form>
            </div>
        </div>
    </main>

    <script>
    document.getElementById("showPass").addEventListener("change", () => {
        var inpPass = document.getElementById("pass");
        inpPass.type == "password" ? inpPass.type = "text" : inpPass.type = "password";
    });
    </script>
    <script type="module" src="./main.js"></script>
</body>

</html>