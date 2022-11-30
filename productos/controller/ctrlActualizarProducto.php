<?php
require '../Model/ModelProductos.php';
require '../../tools/Modal.php';

$producto = new Productos();
$modal = new Modal();


$id = $_POST['id'];
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$unidadMedida = $_POST['unidadMedida'];
$stockMinimo = $_POST['stockMinimo'];
$marca = $_POST['marca'];
$medida = $_POST['medida'];
$iva = $_POST['iva'];
$ganancia = $_POST['ganancia'];

$Id = rtrim($id, ' ');
$Codigo = rtrim($codigo, ' ');
$Nombre = rtrim($nombre, ' ');
$Categoria = rtrim($categoria, ' ');
$UnidadMedida = rtrim($unidadMedida, ' ');
$StockMinimo = rtrim($stockMinimo, ' ');
$Marca = rtrim($marca, ' ');
$Medida = rtrim($medida, ' ');
$Iva = rtrim($iva, ' ');
$Ganancia = rtrim($ganancia, ' ');


try {
    if (empty($Codigo) != 1 && empty($Nombre) != 1 && empty($StockMinimo) != 1 && empty($Marca) != 1 && empty($Medida) != 1 && empty($Iva) != 1 && empty($Ganancia) != 1) {
        if ($StockMinimo > 0 && $Medida > 0 && $Iva > 0 && $Ganancia > 0) {
            if ($producto->updateProducts($Id, $Categoria, $UnidadMedida, $Codigo, $Nombre, $StockMinimo, $Marca, $Medida, $Iva, $Ganancia)) {
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
