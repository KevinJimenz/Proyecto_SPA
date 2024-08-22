<?php 
    session_start();

    if ($_SESSION == true )
    {


    
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Assets/Css/bootstrap.min.css">
</head>

<body class="container-fluid bg-body-secondary">
    <div class="container-fluid mb-3">
        <div class="row p-2 pb-0">
            <nav class="navbar navbar-expand-lg bg-body-tertiary rounded-3 shadow-sm">
                <div class="container-fluid px-3 px-md-4">
                    <div class="container-fluid py-2">
                        <div class="row">
                            <div class="col-auto">
                                <a class="logo-icon" href="./">
                                    <img width="120px" class="img"
                                        src="http://localhost/proyecto_Spa/Front/Views/Assets/Img/Logo.png">
                                </a>
                            </div>
                            <div class="col-auto align-content-center">
                            <h4 class="mt-1 mb-0 fw-normal mb-1" style ="color : black; text-align: center">Relájate ,Tu bienestar empieza aquí.. Reserva  tu Cita!!!</h4>
                            </div>
                            <div class="col col-md-auto ms-auto align-content-center mt-2 mt-md-0">
                                <li class="nav-item pb-0 pb-md-2" style="list-style-type: none;">
                                    <div class="dropdown">
                                        <button class="btn btn-lg bg-body-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-person-circle me-1"></i> User
                                        </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li>
                                                    <a class="dropdown-item" href="http://localhost/proyecto_Spa/Front/Views/CerrarSesion/logout.php">
                                                        <i class="bi bi-box-arrow-right me-1"></i> Cerrar sesión
                                                    </a>
                                                </li>
                                            </ul>
                                    </div>
                                </li>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <hr>
    <main class="row mb-5 mb-md-0" >
        <section class="col px-3 px-md-5 " >
            <div class="row mb-2 d-flex justify-content-center align-content-center" style="background-image: url('../../../Assets/Img/Spa_login.webp'); border-radius: 20px;  background-size: cover; background-position: center;  min-height: 88vh;">
                <h4 class="mt-1 mb-0 fw-normal mb-1" style ="color : black; text-align: center"></h4>
                <h2 class="fw-bold mb-3 mt-3" style ="color : black; text-align: center"></h2>
                <div class="col col-md-7">
                    <div class="bg-body rounded-3 p-3 p-md-4 shadow-sm">
                        <form>
                            <div class="row">
                                <div class="col mb-2">
                                    <label class="fs-5 ms-1 mb-1 text-black-50" for="fecha">Fecha</label>
                                    <input class="form-control" type="date" name="fecha" id="fecha" required>
                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-md-2">
                                <div class="col mb-2">
                                    <label class="fs-5 ms-1 mb-1 text-black-50" for="horaInicio">Hora de Inicio</label>
                                    <input class="form-control" type="time" name="hora_Inicio" id="horaInicio" required >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-2">
                                    <label class="fs-5 ms-1 mb-1 text-black-50" for="idCliente">Cliente</label>
                                    <select class="form-select" name="id_Cliente" id="idCliente" required>
                                        <option value="">Seleccionar...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <label class="fs-5 ms-1 mb-1 text-black-50" >Servicios y Terapeutas</label>
                                    <div id="Servicios" style="display: flex; flex-wrap: wrap" name="servicios">
                                       
                                    </div>
                                </div>
                            </div>
                            <p class="mb-0" id="lblErr"></p>
                            <button class="btn btn-primary w-100" type="button" id="btnReservar">
                                Reservar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script type="module" src="main.js"></script>
    <script src="../../../Assets/Js/bootstrap.bundle.min.js"></script>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true"></div>
</body>

</html>

<?php 
    }
    else{
        header('Location: http://localhost/proyecto_Spa/');
    }
?>