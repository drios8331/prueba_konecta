<?php
date_default_timezone_set("America/Bogota");
require '../Model/ModelProductos.php';
require '../../tools/Modal.php';

$producto = new Productos();
$modal = new Modal();

$referencia = $_POST['referencia'];
$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$unidadMedida = $_POST['unidadMedida'];
$medida = $_POST['medida'];
$estado = 1;
$fecha = date('Y-m-d');



$Referencia = rtrim($referencia, ' ');
$Nombre = rtrim($nombre, ' ');
$Categoria = rtrim($categoria, ' ');
$UnidadMedida = rtrim($unidadMedida, ' ');
$Medida = rtrim($medida, ' ');


$listarProductos = $producto->buscarProductosCod($Referencia);
// echo "$Referencia, $Nombre, $Categoria, $UnidadMedida, $Medida, $fecha, $estado";

// echo "$listarProductos";
if ($listarProductos != null) {
    foreach ($listarProductos as $key => $listarProductos) {
        $productoTrue = $listarProductos['referencia'];
    }
} else {
    $productoTrue = '';
}

try {
    if (empty($Referencia) != 1 && empty($Nombre) != 1 && empty($Medida) != 1) {
        if ($Medida > 0) {
            if ($productoTrue != $Referencia) {
                if ($producto->insertarProductos($Categoria, $UnidadMedida, $Nombre, $Referencia, $Medida, $estado, $fecha)) {
                    $modal->modalAlerta('text-primary', 'Informacion', 'Informacion insertada de forma exitosa');
                }
            } else {
                $modal->modalAlerta('text-primary', 'Informacion', 'El producto que intenta ingresar ya se encuentra registrado.');
            }
        } else {
            $modal->modalAlerta('text-warning', 'Alerta', 'No se permite ingresar cantidades negativas.');
        }
    } else {
        $modal->modalAlerta('text-warning', 'Alerta', 'Todos los campos son requeridos');
    }
} catch (PDOException $e) {
    $modal->modalAlerta('text-danger', 'Alerta', 'Algo salio mal.');
}
