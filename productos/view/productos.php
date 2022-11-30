    <?php
    require '../../admin/Model/ModelCategorias.php';
    require '../Model/ModelProductos.php';

    $admin = new Administracion();
    $producto = new Productos();

    $listarCategorias = $admin->listarCategorias();
    $listarUnidadesMedida = $admin->listarUnidadesMedida();
    $listarProductos = $producto->buscarProductos();

    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="icon" href="../../assets/img/konecta.png" />

        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!--Styles-->
        <link rel="stylesheet" href="../../assets/css/style.css" />

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <!-- Datatables-->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />
        <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

        <!-- Font Awesome JS -->
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/js/solid.js"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/js/fontawesome.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/brands.js" integrity="sha384-sCI3dTBIJuqT6AwL++zH7qL8ZdKaHpxU43dDt9SyOzimtQ9eyRhkG3B7KMl6AO19" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
        <title>Productos</title>
    </head>

    <body class="scrolly">
        <div id="respuesta"></div>
        <!-- <iframe src="" frameborder="0" id="iframeID" hidden></iframe> -->
        <div class="container-fluid m-0 p-0 bg-light">
            <div class="row vh-100 m-0 p-0">
                <div class="sidebar col-12 col-sm-12 col-lg-3 col-xl-2 col-md-3 bg-primary p-0 false">
                    <div class="col mt-5 p-0 d-flex justify-content-center align-items-center bg-primary text-white mb-5" style="height: 60px">
                        <div class="bg-white p-2 mt-5 rounded-circle d-flex justify-content-center position-absolute">
                            <img src="../../assets/img/konecta.png" alt="" style="height: 70px; width: 100px;" class="me-5 position-relative rounded-circle">
                        </div>
                    </div>
                    <div class="pt-5" id="menuLateral"></div>
                </div>
                <div class="col m-0 px-2">
                    <nav class="navbar navbar-light bg-white rounded px-4 shadow-sm">
                        <div class="container-fluid m-0 p-0">
                            <button type="button" id="hamburguesa" class="btn btn-primary false">
                                <i class="fas fa-bars false" style="pointer-events: none"></i>
                            </button>
                            <!-- Drop -->
                            <div class="div d-flex justify-content-end g-3 align-items-center">
                                <a href="#" id="logOut"><i class="bi bi-person-circle bi-lg" style="font-size: 2em; pointer-events: none;"></i></a>
                            </div>
                        </div>
                    </nav>

                    <!--Content-->
                    <div class="col-12 mt-5 px-2 shadow-sm">
                        <div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fas fa-solid fa-candy-cane text-primary"></i> Registro de Productos
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-6">
                                                <div class="form-floating">
                                                    <input type="text" id="refProducto" class="form-control" placeholder="Referencia Producto" />
                                                    <label for="Ref-Producto">Referencia</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating">
                                                    <input type="text" id="nomProducto" class="form-control" placeholder="Nombre Producto" />
                                                    <label for="Nombre Producto">Producto</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating">
                                                    <select class="form-select" aria-label="Default select example" id="catProducto">
                                                        <option selected>Categoria</option>
                                                        <?php
                                                        if ($listarCategorias != null) {
                                                            foreach ($listarCategorias as $key => $listarCategorias) {
                                                        ?>
                                                                <option value="<?php echo $listarCategorias['id']; ?>"><?php echo $listarCategorias['catNombre']; ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="catProducto">Categoria</label>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-floating">
                                                    <input type="number" id="cantMedidaProducto" class="form-control" placeholder="Cantidad de Medida" />
                                                    <label for="Cantidad de Medida">Cant Medida</label>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-floating">
                                                    <select class="form-select d-flex align-middle" aria-label="Default select example" id="uMProducto">
                                                        <option selected>Ud</option>
                                                        <?php
                                                        if ($listarUnidadesMedida != null) {
                                                            foreach ($listarUnidadesMedida as $key => $listarUnidadesMedida) {
                                                        ?>
                                                                <option value="<?php echo $listarUnidadesMedida['id']; ?>"><?php echo $listarUnidadesMedida['uniMedida']; ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="uMProducto">Ud.</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" id="btn_insertar_productos" class="btn btn-outline-primary">
                                                        Registrar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="bi bi-clipboard2-data text-primary"></i> Lista de Productos
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-sm" id="tableProductos" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Referencia</th>
                                                        <th>Nombre</th>
                                                        <th class="text-center">Accion</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php

                                                        if ($listarProductos != null) {
                                                            foreach ($listarProductos as $key => $listarProductos) {
                                                                $id = $listarProductos['Id'];
                                                                $codigo = $listarProductos['proReferencia'];
                                                                $producto = $listarProductos['proNombre'];
                                                        ?>
                                                                <td><?php echo $codigo ?></td>
                                                                <td><?php echo $producto ?></td>
                                                                <td class="text-center">
                                                                    <button class="btn btn-outline-primary btn-sm" id="btn_info_producto" value="<?php echo $id ?>">
                                                                        <i class="bi bi-info-square" style="pointer-events: none;"></i>
                                                                    </button>
                                                                    <button class="btn btn-outline-primary btn-sm" id="btn_editar_producto" value="<?php echo $id ?>">
                                                                        <i class="bi bi-pencil-square" style="pointer-events: none;"></i>
                                                                    </button>
                                                                </td>
                                                    </tr>
                                            <?php
                                                            }
                                                        }

                                            ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="../../assets/js/hamburgerMain.js"></script>
        <script src="../../assets/js/lateralMenu.js"></script>
        <script src="../app/scriptCrud.js"></script>
        <script src="../app/tableProductos.js"></script>
    </body>

    </html>