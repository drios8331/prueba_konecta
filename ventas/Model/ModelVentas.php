<?php
require_once '../../conexion.php';

class Ventas extends Conexion
{

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function insertVenta($usuario, $totalPagar, $horaVenta, $fechaVenta)
    {
        $statement = $this->db->prepare("INSERT INTO `tbl_ventas`(`fkUsuario`, `venPrecio`, `venFecha`, `venHora`) VALUES (:idUsuario, :totalPagar, :fechaVenta, :horaVenta)");
        $statement->bindParam(':idUsuario', $usuario);
        $statement->bindParam(':totalPagar', $totalPagar);
        $statement->bindParam(':horaVenta', $horaVenta);
        $statement->bindParam(':fechaVenta', $fechaVenta);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function insertDetalleVenta($idProducto, $idVenta, $cantidadProducto)
    {
        $statement = $this->db->prepare("INSERT INTO `tbl_detalleventa`(`fkVenta`, `fkProducto`, `detCantidad`) VALUES (:idVenta, :idProducto, :cantidadProducto)");
        $statement->bindParam(':idProducto', $idProducto);
        $statement->bindParam(':idVenta', $idVenta);
        $statement->bindParam(':cantidadProducto', $cantidadProducto);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function showIdVenta()
    {
        $showIdVenta = null;
        $statement = $this->db->prepare("SELECT id FROM `tbl_ventas` ORDER BY id DESC LIMIT 1");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $showIdVenta[] = $consulta;
        }
        return $showIdVenta;
    }
}
