<?php
require_once '../../conexion.php';
session_set_cookie_params('7200');
session_start();

class Sesion extends Conexion
{

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function iniciarSesion($documento)
    {
        $statement = $this->db->prepare("SELECT * FROM `tblusuarios` WHERE `UsuDocumento` = :user LIMIT 1");
        $statement-> bindParam(':user', $documento);
        $statement->execute();
        if ($statement->rowCount() == 1) {
            $consulta = $statement->fetch();
            $_SESSION['id'] = $consulta['UsuIdUsuario'];
            $_SESSION['rol'] = $consulta['Fk_RolIdRol'];
            $_SESSION['nombre'] = $consulta['UsuNombre'];
            $_SESSION['documento'] = $consulta['UsuDocumento'];
            return true;
        }
        return false;
    }

    public function sesionAdmin()
    {
        if ($_SESSION['rol'] != null) {
            if ($_SESSION['rol'] != 1) {
                header('Location: ../../pageOut.php');
            }
        }
    }

    public function sesionVendedor()
    {
        if ($_SESSION['rol'] != null) {
            if ($_SESSION['rol'] != 1 && $_SESSION['rol'] != 2) {
                header('Location: ../../pageOut.php');
            }
        }
    }

    public  function cerrarSesion()
    {
        session_destroy();
    }

    public function getIdUsuario()
    {
        if ($_SESSION['id'] != null) {
            $idUsuario = $_SESSION['id'];
        }
        return $idUsuario;
    }

    public function getRol()
    {
        if ($_SESSION['rol'] != null) {
            $rol = $_SESSION['rol'];
        }
        return $rol;
    }

    public function getName()
    {
        if ($_SESSION['nombre'] != null) {
            $name = $_SESSION['nombre'];
        }
        return $name;
    }

    public function showUsers($user)
    {
        $showUsers = null;
        $statement = $this->db->prepare("SELECT * FROM `tblusuarios` WHERE `UsuDocumento` = :user LIMIT 1");
        $statement->bindParam(':user', $user);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $showUsers[] = $consulta;
        }
        return $showUsers;
    }

    public function userVerify($user)
    {
        $showUsers = null;
        $statement = $this->db->prepare("SELECT * FROM `tblusuarios` WHERE `UsuDocumento` = :user LIMIT 1");
        $statement->bindParam(':user', $user);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $showUsers[] = $consulta;
        }
        return $showUsers;
    }

    // public function usuario()
    // {
    //     return $_SESSION['nombre'];
    // }
}
