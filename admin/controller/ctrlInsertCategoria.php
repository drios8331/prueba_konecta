<?php

    require '../Model/ModelCategorias.php';
    require '../../tools/Modal.php';

    $categoria = new Administracion();
    $modal = new Modal();

    $nombre = ucfirst($_POST['nombre']);
    $Nombre = rtrim($nombre, " ");

    if (empty($Nombre) !=1) {
        if ($categoria->insertCategorias($Nombre)) {
            $modal->modalInformativa('text-primary', 'Información', 'La Categoria se inserto de forma exitosa');
        }
    }else{
        $modal->modalAlerta('text-primary', 'Alerta', 'El contenido no sepudo insertar, intente de nuevo');
    }





?>