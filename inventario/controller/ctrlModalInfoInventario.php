<?php

require '../../tools/Modal.php';
require '../Model/ModelInventario.php';

$modal = new Modal();
$inventario = new Inventario();

$idInventario = $_POST['id'];
$showInventario = $inventario->showInventarioById($idInventario);

if ($showInventario != null) {

    foreach ($showInventario as $key => $showInventario) {
        $referenciaProducto = $showInventario['referencia'];
        $nombreProducto = $showInventario['nombre'];
        $cantidadMedida = $showInventario['cantidadDeMedida'];
        $unidadMedida = $showInventario['uMedida'];
        $stockFisico = $showInventario['stock'];
        $precioVenta = $showInventario['precio'];
    }

    $contenidoModal =   " <ul class='list-group list-group-flush p-0 m-0'>";
    $contenidoModal .=  "    <li class='list-group-item lp'><i class='bi bi-card-checklist text-primary fa-lg'></i> <b>Datos de Producto</b>";
    $contenidoModal .=  "    <li class='list-group-item lp'><b>Codigo</b>: $referenciaProducto</li>";
    $contenidoModal .=  "    <li class='list-group-item lp'><b>Producto</b>: $nombreProducto</li>";
    $contenidoModal .=  "    <li class='list-group-item lp'><b>Unidad de medida</b>: $cantidadMedida $unidadMedida</li>";
    $contenidoModal .=  "    <li class='list-group-item lp'><b>Stock fisico</b>: $stockFisico</li>";
    $contenidoModal .=  "    <li class='list-group-item lp'><b>Precio de venta</b>: $precioVenta</li>";
    $contenidoModal .=  "</ul>";

    $modal->modalAlerta('text-primary', 'Informacion producto', $contenidoModal);
}
