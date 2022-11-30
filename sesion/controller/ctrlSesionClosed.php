<?php
require '../Model/ModelInicioSesion.php';
$sesion = new Sesion();

$sesion->cerrarSesion();

header('Location: ../../index.php');
