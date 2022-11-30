<?php
require '../../tools/Modal.php';
require '../Model/ModelEntradas.php';
require '../../productos/Model/ModelProductos.php';
require '../../inventario/Model/ModelInventario.php';

$modal = new Modal();
$entrada = new Entradas();
$productoModel = new Productos();
$inventario = new Inventario();

//Declaracion de variables
$producto = $_POST['producto'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$fecha = date('Y-m-d');

//Se eliminan espacios al final de las variables para evitar injeccion SQL
$Producto = rtrim($producto, ' ');
$Precio = rtrim($precio, ' ');
$Cantidad = rtrim($cantidad, ' ');

try {
    //Validacion de campos vacios
    if (empty($producto) != 1 && empty($precio) != 1 && empty($cantidad) != 1) {
        if ($Cantidad > 0 && $Precio > 0) {
            //Validacion si se inserta la informacion
            if ($entrada->insertarEntrada($Producto, $Precio, $Cantidad, $fecha)) {
                //Validar si se han ingresado el producto 
                $listarEntradas = $entrada->showEntradasByIdProductoOld($Producto);
                if ($listarEntradas != null) {
                    foreach ($listarEntradas as $key => $listarEntradas) {
                        $precioCostoAnterior = $listarEntradas['entPrecio'];
                    }
                    //Validar si el producto esta en inventario y hay una entrada anterior
                    $listarInventario = $inventario->showInventarioByIdProducto($Producto);
                    if ($listarInventario != null) {
                        foreach ($listarInventario as $key => $listarInventario) {
                            $stock = $listarInventario['stock'];
                            $PrecioVenta = $listarInventario['precioVenta'];
                        }
                        $promedioCostoAnterior = $stock * $precioCostoAnterior;
                        $promedioCostoActual = $Cantidad * $Precio;
                        $sumaPromedios = $promedioCostoAnterior + $promedioCostoActual;
                        $resultado = $stock + $Cantidad;
                        $precioVenta = $sumaPromedios / $resultado;
                        if ($inventario->updateCantidadInventario($Producto, $resultado, $precioVenta)) {
                            $modal->modalAlerta('text-primary', 'Informacion', 'Informacion registrada con exito');
                        }
                    } else {
                        //Si no esta en inventario
                        $modal->modalAlerta('text-warning', 'Informacion', 'El producto no esta existente en inventario, revisar la logica');
                    }
                } else {
                    // Inserta producto al inventario
                    $listarProductos = $productoModel->buscarProductosId($Producto);

                    if ($listarProductos != null) {
                        if ($inventario->insertInventario($Producto, $Cantidad, $Precio)) {
                            $modal->modalAlerta('text-primary', 'Informacion', 'Informacion registrada con exito');
                        }
                    }
                }
            }
        } else {
            $modal->modalAlerta('text-warning', 'Alerta', 'No se permite ingresar cantidades negativas.');
        }
    } else {
        $modal->modalAlerta('text-warning', 'Alerta', 'Todos los campos son obligatorios');
    }
} catch (PDOException $e) {
    $modal->modalAlerta('text-danger', 'Alerta', 'Algo salio mal');
}
