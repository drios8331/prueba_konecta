<?php
require '../Model/ModelInicioSesion.php';
require '../../tools/Modal.php';

$modal = new Modal();
$sesion = new Sesion();

$user = $_POST['user'];
$password = $_POST['password'];
$passwordHash;

$User = rtrim($user, " ");
$Password = rtrim($password, " ");

// try {

if (empty($User) != 1 && empty($Password) != 1) {
    //     $iniciaSesion = $sesion->showUsers($user);
    if ($iniciaSesion = $sesion->userVerify($User)) {
        foreach ($iniciaSesion as $key => $iniciaSesion) {
            $passwordHash = $iniciaSesion['UsuPassword'];
            $rol = $iniciaSesion['Fk_RolIdRol'];
            // $id = $iniciaSesion['UsuIdUsuario'];
            // $nombre = $iniciaSesion['UsuNombre'];
        }

        if (password_verify($Password, $passwordHash)) {

            $listarUsuarios = $sesion->showUsers($User);
            if ($listarUsuarios != null) {
                foreach ($listarUsuarios as $key => $listarUsuarios) {
                    $id = $listarUsuarios['UsuIdUsuario'];
                    $rol = $listarUsuarios['Fk_RolIdRol'];
                    $nombre = $listarUsuarios['UsuNombre'];
                    $documento = $listarUsuarios['UsuDocumento'];
                    $datosUsuario = ["id" => $id, "rol" => $rol, "nombre" => $nombre, "documento" => $documento];
                }
            }

            $status = 200;
            echo json_encode(['response' => $datosUsuario, 'status' => $status]);
        }
    }
}
//         } else {
//             $status = 500;
//             $response = $modal->modalLogin('text-primary', 'Informacion', 'Contraseña Incorrecta');
//             echo json_encode(['response' => $response, 'status' => $status]);
//         }
//     } else {
//         $status = 500;
//         $response = $modal->modalLogin('text-primary', 'Informacion', 'Las credenciales no existen en nuestro servidor');
//         echo json_encode(['response' => $response, 'status' => $status]);
//     }

// } else {
//     $response = $modal->modalLogin('text-primary', 'Informacion', 'Todos los campos son obligatorios');
// }
// } catch (PDOException $e) {
//         $response = $modal->modalLogin('text-primary', 'Informacion', 'La sesion no pudo ser iniciada');
// }
