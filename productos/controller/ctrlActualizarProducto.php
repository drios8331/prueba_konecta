<?php
require '../Model/ModelProductos.php';
require '../../tools/Modal.php';

$producto = new Productos();
$modal = new Modal();


$id = $_POST['id'];
$categoria = $_POST['categoria'];
$unidadMedida = $_POST['unidadMedida'];
$nombre = $_POST['nombre'];
$codigo = $_POST['referencia'];
$medida = $_POST['medida'];
$estado = $_POST['estado'];

$Id = rtrim($id, ' ');
$Codigo = rtrim($codigo, ' ');
$Nombre = rtrim($nombre, ' ');
$Categoria = rtrim($categoria, ' ');
$UnidadMedida = rtrim($unidadMedida, ' ');
$Medida = rtrim($medida, ' ');
$Estado = rtrim($estado, ' ');

// echo "$Id, $Codigo, $Nombre, $Categoria, $UnidadMedida, $Medida, $Estado";

try {
    if (empty($Codigo) != 1 && empty($Nombre) != 1) {
        if ($Medida > 0) {
            if ($producto->modificarProductos($Id, $Categoria, $UnidadMedida, $Codigo, $Nombre, $Medida, $estado)) {
                $modal->modalAlerta('text-primary', 'Informacion', 'Informacion actualizada de forma exitosa');
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
