<?php

require '../../tools/Modal.php';
require '../Model/ModelEntradas.php';

$modal = new Modal();
$entradas = new Entradas();

$idEntrada = $_POST['id'];

$listarEntradas = $entradas->showEntradasById($idEntrada);

if ($listarEntradas != null) {
    foreach ($listarEntradas as $key => $listarEntradas) {
        $codigo = $listarEntradas['Referencia'];
        $producto = $listarEntradas['producto'];
        $cantidad = $listarEntradas['cantidad'];
        $precio = $listarEntradas['precio'];
        $fecha = $listarEntradas['fecha'];
    }

$contenidoModal =   " <ul class='list-group list-group-flush p-0 m-0'>";
$contenidoModal .=  "    <li class='list-group-item lp'><i class='bi bi-clipboard2-data text-primary fa-lg'></i> <b>Datos de entrada</b>";
$contenidoModal .=  "    <li class='list-group-item lp'><b>Codigo</b>: $codigo</li>";
$contenidoModal .=  "    <li class='list-group-item lp'><b>Producto</b>: $producto</li>";
$contenidoModal .=  "    <li class='list-group-item lp'><b>Cantidad</b>: $cantidad</li>";
$contenidoModal .=  "    <li class='list-group-item lp'><b>Precio Costo</b>: $$precio</li>";
$contenidoModal .=  "    <li class='list-group-item lp'><b>Fecha entrada</b>: $fecha</li>";
$contenidoModal .=  "</ul>";

$modal->modalAlerta('text-primary', 'Informacion de entrada', $contenidoModal);
}