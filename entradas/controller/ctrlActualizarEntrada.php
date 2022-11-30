<?php
require '../../tools/Modal.php';
require '../Model/ModelEntradas.php';

$modal = new Modal();
$entrada = new Entradas();


$id = $_POST['id'];
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];

$Id = rtrim($id, ' ');
$Producto = rtrim($producto, ' ');
$Cantidad = rtrim($cantidad, ' ');
$Precio = rtrim($precio, ' ');

$listarEntradas = $inventario->showEntradasById($Id);
if ($listarEntradas != null) {
    foreach ($listarEntradas as $key => $listarEntradas) {
        $precioOld = $listarEntradas['precio'];
        $cantidadOld = $listarEntradas['cantidad'];
    }
}

try {
    if (empty($Producto) != 1 && empty($Cantidad) != 1 && empty($Precio) != 1) {
        if ($Cantidad > 0 && $Precio > 0) {
            if ($inventario->updateEntrada($Id, $Producto, $Proveedor, $Factura, $Cantidad, $Precio)) {
                $listarInventario = $inventario->showInventarioByIdProducto($Producto);
                foreach ($listarInventario as $key => $listarInventario) {
                    $stockMinimo = $listarInventario['stockMinimo'];
                    $stockFisico = $listarInventario['InvStockFisico'];
                    $precioBase = $listarInventario['InvPrecioBase'];
                    $iva = $listarInventario['iva'];
                    $valorIva = $listarInventario['InvValorIva'];
                    $ganancia = $listarInventario['ganancia'];
                    $valorGanancia = $listarInventario['InvValorGanancia'];
                    $precioVenta = $listarInventario['InvPrecioVenta'];
                }

                $cantidadSalida = $cantidadOld - $Cantidad;
                $cantidadEntrada = $Cantidad - $cantidadOld;

                $buscarPrecioOld = $inventario->showEntradasByIdProductoOld($Producto);
                if ($buscarPrecioOld != null) {
                    foreach ($buscarPrecioOld as $key => $buscarPrecioOld) {
                        $precioOldTwo = $buscarPrecioOld['EntPrecioCosto'];
                    }
                }


                //Se valida si hay cambios en el precio y se modifica precio base
                if ($Precio != $precioOld) {
                    if (empty($precioOldTwo) != 1) {
                        $newPrecio = ($precioOldTwo + $Precio) / 2;
                    } else {
                        $newPrecio = $Precio;
                    }
                    $newIva = ($newPrecio * $iva) / 100;
                    $newGanancia = ($newPrecio * $ganancia) / 100;
                    $newPrecioVenta = ($newPrecio + $newIva + $newGanancia);
                } else {
                    $newPrecio = $precioBase;
                    $newIva = ($newPrecio * $iva) / 100;
                    $newGanancia = ($newPrecio * $ganancia) / 100;
                    $newPrecioVenta = ($newPrecio + $newIva + $newGanancia);
                }

                //Se validan si hay cambios en las cantidades y de acuerdo a esto se modifica el stock fisico
                if ($cantidadOld == $Cantidad) {
                    //Si no hay cambios
                    $newCantidad = $stockFisico;
                    $inventario->updateCantidadInventario($Producto, $newCantidad, $newPrecio, $newIva, $newGanancia, $newPrecioVenta);
                    $modal->modalAlerta('text-primary', 'Informacion', 'Informacion actualizada exitosamente');
                } elseif ($cantidadOld > $Cantidad) {
                    //Si cantidad es menor
                    $newCantidad = $stockFisico - $cantidadSalida;
                    $inventario->updateCantidadInventario($Producto, $newCantidad, $newPrecio, $newIva, $newGanancia, $newPrecioVenta);
                    $modal->modalAlerta('text-primary', 'Informacion', 'Solo salida');
                } elseif ($cantidadOld < $Cantidad) {
                    //Si cantidad es mayor
                    $newCantidad = $stockFisico + $cantidadEntrada;
                    $inventario->updateCantidadInventario($Producto, $newCantidad, $newPrecio, $newIva, $newGanancia, $newPrecioVenta);
                    $modal->modalAlerta('text-primary', 'Informacion', 'Solo entrada');
                } else {
                    //Si hay algo diferente
                    $modal->modalAlerta('text-primary', 'Informacion', 'Informacion desconocida');
                }
            }
        } else {
            $modal->modalAlerta('text-warning', 'Alerta', 'No se permite ingresar cantidades negativas.');
        }
    } else {
        $modal->modalAlerta('text-warning', 'Alerta', 'Todos los campos son obligatorios');
    }
} catch (PDOException $e) {
    $modal->modalAlerta('text-danger', 'Alerta', 'Algo salio mal.');
}
