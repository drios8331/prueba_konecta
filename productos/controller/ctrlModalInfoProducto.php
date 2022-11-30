<?php

require '../Model/ModelProductos.php';
require '../../tools/Modal.php';

$producto = new Productos();
$modal = new Modal();

$idProducto = $_POST['id'];
$listarProductos = $producto->buscarProductosId($idProducto);

if ($listarProductos != null) {

    foreach ($listarProductos as $key => $listarProductos) {
        $idProducto = $listarProductos['Id'];
        $idCatProducto = $listarProductos['idCat'];
        $categoriaProducto = $listarProductos['categoria'];
        $idUMProducto = $listarProductos['idUM'];
        $unidadMedidaProducto = $listarProductos['unidadMedida'];
        $referenciaProducto = $listarProductos['codigo'];
        $nombreProducto = $listarProductos['producto'];
        $medidaProducto = $listarProductos['medida'];
        $fechaProducto = $listarProductos['fecha'];
        $estadoProducto = $listarProductos['estado'];
    }

    $estadoProducto != 0 ? $estadoProductoNew = 'Activo' : $estadoProductoNew = 'Inactivo';

    $contenidoModal =   " <ul class='list-group list-group-flush p-0 m-0'>";
    $contenidoModal .=  "    <li class='list-group-item lp'><i class='bi bi-card-checklist text-primary fa-lg'></i> <b>Datos de Producto</b>";
    $contenidoModal .=  "    <li class='list-group-item lp'><b>Referencia</b>: $referenciaProducto</li>";
    $contenidoModal .=  "    <li class='list-group-item lp'><b>Producto</b>: $nombreProducto</li>";
    $contenidoModal .=  "    <li class='list-group-item lp'><b>Categoria</b>: $categoriaProducto</li>";
    $contenidoModal .=  "    <li class='list-group-item lp'><b>Unidad de medida</b>: $medidaProducto $unidadMedidaProducto</li>";
    $contenidoModal .=  "    <li class='list-group-item lp'><b>Estado</b>: $estadoProductoNew </li>";
    $contenidoModal .=  "    <li class='list-group-item lp'><b>Fecha de Creación</b>: $fechaProducto</li>";
    $contenidoModal .=  "</ul>";

    $modal->modalInformativa('text-primary', 'Informacion producto', $contenidoModal);
}
