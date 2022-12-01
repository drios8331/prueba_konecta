<?php
header('Content-Type: application/json');
date_default_timezone_set("America/Bogota");
require '../../tools/Modal.php';
require '../Model/ModelVentas.php';
require '../../inventario/Model/ModelInventario.php';

$modal = new Modal();
$venta = new Ventas();
$inventario = new Inventario();

$idUsuario = 1;
$precioTotalVenta = 0;
$fecha = date('Y-m-d');
$hora = date("H:i");

// $data = json_decode($_POST['array'], true);
$datosPeticion = json_decode($_POST['array'], true);
var_dump($datosPeticion);
if (count($datosPeticion) > 0) {
    $arrayVenta = $datosPeticion["arrayVenta"];
    foreach ($arrayVenta as $data) {
        $codigoProducto = $data['codigoProducto'];
        $cantidadProducto = $data['cantidadProducto'];
        $nombreProducto = $data['nombreProducto'];
        $precioTotalUnitario = $data['precioTotalUnitario'];
        $precioTotalVenta += $precioTotalUnitario;
    }

    try {
        if (empty($codigoProducto) != 1 && empty($nombreProducto) != 1 && empty($cantidadProducto) != 1) {
            if ($cantidadProducto > 0) {
                if ($venta->insertVenta($idUsuario, $precioTotalVenta, $hora, $fecha)) {
                    $ventaId = $venta->showIdVenta();
                    foreach ($ventaId as $key => $value) {
                        $idVenta = $value['id'];
                    }
                    foreach ($arrayVenta as $key => $dataDetalle) {
                        $cantidadProductoNew = $dataDetalle['cantidadProducto'];
                        $idProductoNew = $dataDetalle['idProducto'];
                        $idProducto = $dataDetalle['idProductoInv'];
                        if ($venta->insertDetalleVenta($idProducto, $idVenta, $cantidadProductoNew)) {
                            $listarProductoInventario = $inventario->showInventarioByIdProducto($idProducto);
                            if ($listarProductoInventario != null) {
                                foreach ($listarProductoInventario as $key => $listarProductoInventario) {
                                    $stockFisico = $listarProductoInventario['stock'];
                                }
                                $newCantidad = $stockFisico - $cantidadProductoNew;
                                if ($inventario->updateCantidadInventarioSalida($idProducto, $newCantidad)) {
                                    echo "Venta realizada con exito";
                                }
                            }
                        }
                    }
                    $response = $modal->modalLogin('text-primary', 'Informacion', 'Venta insertada con exito');
                    echo json_encode(['response' => $response]);
                }
            } else {
                $response = $modal->modalLogin('text-primary', 'Informacion', 'No se permite ingresar cantidades negativas.');
                echo json_encode(['response' => $response]);
            }
        } else {
            $response = $modal->modalAlerta('text-primary', 'Alerta', 'Todos los campos de la venta son obligatorios');
            echo json_encode(['response' => $response]);
        }
    } catch (PDOException $e) {
        $response = $modal->modalAlerta('text-primary', 'Alerta', 'Algo salio mal, la venta no se pudo realizar');
        echo json_encode(['response' => $response]);
    }
}