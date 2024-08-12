<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Front/Views/Assets/Css/styles.css">
    <link rel="shortcut icon" href="./Front/Views/Assets/Img/Logo.png" type="image/x-icon">
    <title>Spa | Inicio</title>
</head>

<body class="container-fluid bg-body-secondary">

    <nav class="row bg-body shadow py-2 py-md-3 mb-5">
        <div class="col-auto mx-auto">
            <a class="logo-icon" href="./">
                <img width="120px" class="img" src="./Front/Views/Assets/Img/Logo.png" alt="Spa_Logo.webp">
            </a>
        </div>
        <div class="col align-content-center">
            <ul class="nav flex-column flex-md-row ">
                <li class="nav-item">
                    <a class="nav-link link-dark fw-bold text-center fs-5" href="../Inicio/">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-dark link-opacity-50 link-opacity-100-hover text-center fs-5"
                        href="">Productos</a>
                </li>
            </ul>
        </div>
        <div class="col-12 col-md-auto ms-auto align-content-center mt-2 mt-md-0">
            <div class="btn-group shadow-sm w-100">
                <a class="btn btn-lg" href="./Front/Views/Ingresar/index.php">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Ingresar
                </a>
                <a class="btn btn-lg" href="./Front/Views/Registrarse/index.php">
                    Registrarse
                </a>
            </div>
        </div>
    </nav>
    <main class="container-sm">
        <section class="row section-hover mb-5">
            <div class="col align-content-center">
                <h1 class="display-3 fw-semibold">¡Bienvenido a <br /><b style="color: #3aa1ea">Arasaka Spa!</b></h1>
                <p class="fs-4">Descubre tu oasis de relajación y rejuvenecimiento</p>
            </div>
            <div class="col-5">
                <img class="img-fluid rounded-pill shadow" src="./Front/Views/Assets/Img/Spa_girl.jpeg" alt="">
            </div>
        </section>
        <hr />
        <section class="row section-hover my-5">
            <div class="col">
                <p class="fs-4 text-center">
                    En <b>Arasaka Spa</b>, nos dedicamos a ofrecerte una experiencia de <b>bienestar</b>
                    incomparable.<br>Sumérgete en un mundo de <b>tranquilidad</b> y descubre el equilibrio
                    perfecto<br>entre cuerpo y mente
                </p>
            </div>
        </section>
        <hr />
        <section class="row section-hover mt-5">
            <div class="col">
                <div class="rounded-4 py-5" style="background-color: #3aa1ea">
                    <h1 class="text-light text-center">Relajación</h1>
                </div>
            </div>
            <div class="col">
                <div class="rounded-4 py-5" style="background-color: #3aa1ea">
                    <h1 class="text-light text-center">Tranquilidad</h1>
                </div>
            </div>
            <div class="col">
                <div class="rounded-4 py-5" style="background-color: #3aa1ea">
                    <h1 class="text-light text-center">Confiable</h1>
                </div>
            </div>
        </section>
    </main>
    <footer class="row bg-body border-top border-2 py-4 px-2 mt-5">
        <div class="col-12 d-flex justify-content-center">
            <div class="hstack fs-3 gap-2">
                <a class="nav-link" href="https://www.facebook.com" target="_Blank"><i
                        class="bi bi-facebook bg-body-secondary link-primary link-opacity-50 link-opacity-100-hover rounded-circle py-2 px-3"></i></a>
                <a class="nav-link" href="https://www.instagram.com" target="_Blank"><i
                        class="bi bi-instagram bg-body-secondary link-danger link-opacity-50 link-opacity-100-hover rounded-circle py-2 px-3"></i></a>
                <a class="nav-link" href="https://www.whatsapp.com" target="_Blank"><i
                        class="bi bi-whatsapp bg-body-secondary link-success link-opacity-50 link-opacity-100-hover rounded-circle py-2 px-3"></i></a>
            </div>
        </div>
        <div class="col-12">
            <div class="clearfix fs-5">
                <a class="float-start nav-link d-flex align-items-center gap-2" href="https://github.com/JuanitoPetacas"
                    target="_Blank">
                    <i class="bi bi-github"></i>
                    Developer | <b>Juan David Montoya</b>
                </a>
                <a class="float-end nav-link d-flex align-items-center gap-2" href="https://github.com/KevinJimenz"
                    target="_Blank">
                    <i class="bi bi-github"></i>
                    Developer | <b>Kevin Jimenez</b>
                </a>
            </div>
        </div>
    </footer>
</body>

</html>