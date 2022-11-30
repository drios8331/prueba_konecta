<?php

require '../../tools/Modal.php';
require '../Model/ModelEntradas.php';

$modal = new Modal();
$entrada = new Entradas();

$idEntrada = $_POST['id'];

$listarEntradas = $entrada->showEntradasById($idEntrada);

if ($listarEntradas != null) {
    foreach ($listarEntradas as $key => $listarEntradas) {
        $codigo = $listarEntradas['Referencia'];
        $producto = $listarEntradas['producto'];
        $idProducto = $listarEntradas['idProducto'];
        $cantidad = $listarEntradas['cantidad'];
        $precio = $listarEntradas['precio'];
        $fecha = $listarEntradas['fecha'];
    }


    $contenidoModal  = "   <div class='form-floating mb-3'>";
    $contenidoModal .= "   <input type='text' class='form-control' id='idEntrada' value='$idEntrada' hidden>";
    $contenidoModal .= "   <input type='text' class='form-control' id='codigoProducto' placeholder='Codigo Producto' value='$codigo'  disabled=true>";
    $contenidoModal .= "       <label for='Codigo Producto'>Codigo Producto</label>";
    $contenidoModal .= "   </div>";
    $contenidoModal .= "   <div class='form-floating mb-3'>";
    $contenidoModal .= "   <select class='form-select' aria-label='Default select example' id='productoEntrada' disabled=true>";
    $contenidoModal .= "   <option value='$idProducto'>$producto</option>";
    $contenidoModal .= "   </select>";
    $contenidoModal .= "      <label for='productoEntrada'>Producto</label>";
    $contenidoModal .= "   </div>";
    $contenidoModal .= "   <div class='form-floating mb-3'>";
    $contenidoModal .= "       <input type='number' class='form-control' id='cantidadProducto' placeholder='Cantidad' value='$cantidad'>";
    $contenidoModal .= "       <label for='Cantidad'>Cantidad</label>";
    $contenidoModal .= "   </div>";
    $contenidoModal .= "   <div class='form-floating mb-3'>";
    $contenidoModal .= "       <input type='number' class='form-control' id='precioProducto' placeholder='Precio Costo' value='$precio'>";
    $contenidoModal .= "       <label for='Precio Costo'>Precio Costo</label>";
    $contenidoModal .= "   </div>";
    $contenidoModal .= "   <div class='form-floating mb-3'>";
    $contenidoModal .= "   <input type='text' class='form-control' id='fechaEntrada' placeholder='Fecha Entrada' value='$fecha'  disabled=true>";
    $contenidoModal .= "       <label for='Fecha Entrada'>Fecha Entrada</label>";
    $contenidoModal .= "   </div>";
    $contenidoModal .= "   <div class='d-grid mb-3'>";
    $contenidoModal .= "       <button class='btn btn-outline-primary' id='btn_editar_entrada_ok'>Actualizar</button>";
    $contenidoModal .= "   </div>";


    $modal->modalAlerta('text-primary', 'Editar entrada', $contenidoModal);
}
