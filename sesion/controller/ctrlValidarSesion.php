<?php

require '../Model/ModelInicioSesion.php';
require '../../tools/Modal.php';

$sesion = new Sesion();
$modal = new Modal();

$clave = $_POST["user"];
$pass = $_POST["password"];

$Clave = rtrim($clave, ' ');
$Pass = rtrim($pass, ' ');

try {
    if (empty($Clave) != 1 && empty($Pass) != 1) {

        if ($newSesion = $sesion->userVerify($clave)) {
            foreach ($newSesion as $key => $newSesion) {
                $passwordHash = $newSesion['UsuPassword'];
                $rol = $newSesion['Fk_RolIdRol'];
                $nombre = $newSesion['UsuNombre'];
                $documento = $newSesion['UsuDocumento'];
            }

            if (password_verify($Pass, $passwordHash)) {
                $sesion->iniciarSesion($Clave);
                echo "<script type='text/javascript'>";
                echo "if ($rol != 2) {";
                echo "window.location.href = 'administracion/view/dashboard.php';";
                echo "} else {";
                echo "window.location.href = 'ventas/view/ventas.php';";
                echo "}";
                echo "</script>";
            } else {
                $modal->modalAlerta('text-primary', 'Informacion', 'Contraseña incorrecta');
            }
        } else {
            $modal->modalAlerta('text-primary', 'Informacion', 'Las credenciales no existen en servidor');
        }
    } else {
        $modal->modalAlerta('text-primary', 'Informacion', 'Todos los campos son obligatorios');
    }
} catch (PDOException $e) {
    $modal->modalAlerta('text-primary', 'Informacion', 'La sesion no pudo ser iniciada');
}
