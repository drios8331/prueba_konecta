<?php
require_once '../../conexion.php';

class Ventas extends Conexion
{

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function insertVenta($totalPagar, $horaVenta, $fechaVenta)
    {
        $statement = $this->db->prepare("INSERT INTO `tblventas`(`VenPrecioVenta`, 
        `VenHora`, `VenFecha`) VALUES (:idUsuario, :totalPagar, :horaVenta, :fechaVenta)");
        $statement->bindParam(':totalPagar', $totalPagar);
        $statement->bindParam(':horaVenta', $horaVenta);
        $statement->bindParam(':fechaVenta', $fechaVenta);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
