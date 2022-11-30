<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" href="assets/images/logo_ico.png" />


    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Datatables-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/js/solid.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/js/fontawesome.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/brands.js" integrity="sha384-sCI3dTBIJuqT6AwL++zH7qL8ZdKaHpxU43dDt9SyOzimtQ9eyRhkG3B7KMl6AO19" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />

    <title>Inicio</title>
</head>

<body class="index col-12  col-sm-12 col-md-12">
    <div id="respuesta"></div>
    <div class="container-fluid">
        <div class="row d-flex justify-content-between">
            <div class="col-12 col-sm-12 col-md-6 logo-login">
                <div class="logo d-flex ms-5">
                    <img src="assets/img/konecta.png" alt="" style="height: 70px; width: 100px;" class="me-5">
                    <h1 class="mt-2">Cafeteria Konecta</h1>
                </div>
                <hr>
                <div class="card col-sm-12 col-md-12 col-lg-10 col-xl-10 border-0 img-login">
                    <img class="text-primary" src="assets/img/coffe.jpg" alt="">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 bg-primary column_form_login">
                <div class="card login p-3 bg-white text-dark mx-5">
                    <div class="card-body text-muted pt-3">
                        <div class="form-row py-2 ">
                            <div class="form-group col-12 mb-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-white text-primary"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="documento" placeholder="Docuento de identidad" />
                                </div>
                            </div>
                            <div class="form-group col-12 mb-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-white text-primary"><i class="fas fa-solid fa-key"></i></span>
                                    <input type="password" class="form-control" id="password" placeholder="Password"><button class="btn btn-outline-primary" id="cambiarVista"></button>
                                </div>
                            </div>
                            <div class="px-0 d-grid pb-0 mb-0">
                                <!-- <button type="button" class="btn btn-block btn-lg btn-outline-primary inicio" id="btn_ingresar">Iniciar sesión</button> -->
                                <button class="btn btn-block btn-lg btn-outline-primary inicio" onclick="window.location = 'admin/view/dashboard.php'" id="btn-ingresar">Iniciar sesión</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> -->
<script src="sesion/app/script.js"></script>
<script src="login.js"></script>

</html>