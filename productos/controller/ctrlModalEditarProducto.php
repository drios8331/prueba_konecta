<?php

require '../../tools/Modal.php';
require '../Model/ModelProductos.php';
require '../../admin/Model/ModelCategorias.php';

$modal = new Modal();
$producto = new Productos();
$categoria = new Administracion();

$idProducto = $_POST['id'];
$listarCategorias = $categoria->listarCategorias();
$listarUnidadesMedida = $categoria->listarUnidadesMedida();
$listarProductos = $producto->buscarProductosId($idProducto);

if ($listarProductos != null) {
    
foreach ($listarProductos as $key => $listarProductos) {
    $idProducto = $listarProductos['Id'];
    $idCatProducto = $listarProductos['idCat'];
    $CategoriaProducto = $listarProductos['categoria'];
    $idUMProducto = $listarProductos['idUM'];
    $unidadMedidaProducto = $listarProductos['unidadMedida'];
    $codigoProducto = $listarProductos['codigo'];
    $nombreProducto = $listarProductos['producto'];
    $medidaProducto = $listarProductos['medida'];
}

$contenidoModal  = "   <div class='form-floating mb-3'>";
$contenidoModal .= "   <input type='text' class='form-control' id='idProducto' value='$idProducto' hidden>";
$contenidoModal .= "   <input type='text' class='form-control' id='codigoProducto' placeholder='Codigo Producto' value='$codigoProducto'>";
$contenidoModal .= "       <label for='Codigo Producto'>Codigo Producto</label>";
$contenidoModal .= "   </div>";
$contenidoModal .= "   <div class='form-floating mb-3'>";
$contenidoModal .= "       <input type='text' class='form-control' id='nombreProducto' placeholder='Producto' value='$nombreProducto'>";
$contenidoModal .= "       <label for='Producto'>Producto</label>";
$contenidoModal .= "   </div>";
$contenidoModal .= "   <div class='form-floating mb-3'>";
$contenidoModal .= "   <select class='form-select' id='categoriaProducto'>";
$contenidoModal .= "   <option value='$idCatProducto'>$CategoriaProducto</option>";
if ($listarCategorias != null) {
    foreach ($listarCategorias as $key => $listarCategorias) {
        if ($listarCategorias['id'] != $idCatProducto) {
            $contenidoModal .= "   <option value='". $listarCategorias['id'] ."'>". $listarCategorias['catNombre'] ."</option>";
        }
    }
}
$contenidoModal .= "   </select>";
$contenidoModal .= "       <label for='categoriaProducto'>Categoria</label>";
$contenidoModal .= "   </div>";
$contenidoModal .= "   <div class='row'>";
$contenidoModal .= "   <div class='col-8'>";
$contenidoModal .= "   <div class='form-floating mb-3'>";
$contenidoModal .= "       <input type='number' class='form-control' id='cantMedidaProducto' placeholder='Cant medida' value='$medidaProducto'>";
$contenidoModal .= "       <label for='cantMedida'>Cantidad de medida</label>";
$contenidoModal .= "   </div>";
$contenidoModal .= "   </div>";
$contenidoModal .= "   <div class='col-4'>";
$contenidoModal .= "   <div class='form-floating'>";
$contenidoModal .= "   <select class='form-select' id='unidMedidaProducto'>";
$contenidoModal .= "   <option value='$idUMProducto'>$unidadMedidaProducto</option>";
if ($listarUnidadesMedida != null) {
    foreach ($listarUnidadesMedida as $key => $listarUnidadesMedida) {
        if ($listarUnidadesMedida['id'] != $idUMProducto) {
            $contenidoModal .= "   <option value='". $listarUnidadesMedida['id'] ."'>". $listarUnidadesMedida['UniMedida'] ."</option>";
        }
    }
}
$contenidoModal .= "   </select>";
$contenidoModal .= "       <label for='unidMedidaProducto'>Unid Medida</label>";
$contenidoModal .= "   </div>";
$contenidoModal .= "   </div>";
$contenidoModal .= "   </div>";
$contenidoModal .= "   <div class='form-floating mb-3'>";
$contenidoModal .= "       <input type='number' class='form-control' id='stockMinimoProducto' placeholder='Stock minimo' value='$stockMinimoProducto'>";
$contenidoModal .= "       <label for='Stock minimo'>Stock minimo</label>";
$contenidoModal .= "   </div>";
$contenidoModal .= "   <div class='d-grid mb-3'>";
$contenidoModal .= "       <button type='submit' class='btn btn-outline-primary' id='btn_editar_entrada_ok'>Actualizar</button>";
$contenidoModal .= "   </div>";


$modal->modalAlerta('text-primary', 'Editar producto', $contenidoModal);
}
