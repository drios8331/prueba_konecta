<?php

require '../Model/ModelProductos.php';
require '../../tools/Modal.php';

$producto = new Productos();
$modal = new Modal();

$idProducto = $_POST['id'];
$listarProductos = $producto->buscarProductosId($idProducto);

if ($listarProductos != null) {
    
    foreach ($listarProductos as $key => $listarProductos) {
        $idProducto = $listarProductos['id'];
        $idCatProducto = $listarProductos['idCat'];
        $CategoriaProducto = $listarProductos['categoria'];
        $idUMProducto = $listarProductos['idUM'];
        $unidadMedidaProducto = $listarProductos['unidadMedida'];
        $codigoProducto = $listarProductos['codigo'];
        $nombreProducto = $listarProductos['producto'];
        $stockMinimoProducto = $listarProductos['stockM'];
        $marcaProducto = $listarProductos['marca'];
        $medidaProducto = $listarProductos['medida'];
        $ivaProducto = $listarProductos['porcentaje'];
        // $precioCostoProducto = $listarProductos['costo'];
        $gananciaProducto = $listarProductos['ganancia'];
        // $precioVentaProducto = $listarProductos['precioVenta'];
    }

$contenidoModal =   " <ul class='list-group list-group-flush p-0 m-0'>";
$contenidoModal .=  "    <li class='list-group-item lp'><i class='bi bi-card-checklist text-primary fa-lg'></i> <b>Datos de Producto</b>";
$contenidoModal .=  "    <li class='list-group-item lp'><b>Codigo</b>: $codigoProducto</li>";
$contenidoModal .=  "    <li class='list-group-item lp'><b>Producto</b>: $nombreProducto</li>";
$contenidoModal .=  "    <li class='list-group-item lp'><b>Categoria</b>: $CategoriaProducto</li>";
$contenidoModal .=  "    <li class='list-group-item lp'><b>Unidad de medida</b>: $medidaProducto $unidadMedidaProducto</li>";
$contenidoModal .=  "    <li class='list-group-item lp'><b>Stock minimo</b>: $stockMinimoProducto</li>";
$contenidoModal .=  "    <li class='list-group-item lp'><b>Marca</b>: $marcaProducto</li>";
$contenidoModal .=  "    <li class='list-group-item lp'><b>% Iva</b>: $ivaProducto</li>";
// $contenidoModal .=  "    <li class='list-group-item lp'><b>Precio costo</b>: $$precioCostoProducto</li>";
$contenidoModal .=  "    <li class='list-group-item lp'><b>% Ganancia</b>: $gananciaProducto</li>";
// $contenidoModal .=  "    <li class='list-group-item lp'><b>Precio de venta</b>: $$precioVentaProducto</li>";
$contenidoModal .=  "</ul>";

$modal->modalInformativa('text-primary', 'Informacion producto', $contenidoModal);
}