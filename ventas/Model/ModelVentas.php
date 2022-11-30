<?php
require_once '../../conexion.php';

class Ventas extends Conexion
{

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function insertVenta($idUsuario, $totalPagar, $horaVenta, $fechaVenta)
    {
        $statement = $this->db->prepare("INSERT INTO `tblventas`(`Fk_UsuId`, `VenPrecioVenta`, 
        `VenHora`, `VenFecha`) VALUES (:idUsuario, :totalPagar, :horaVenta, :fechaVenta)");
        $statement->bindParam(':idUsuario', $idUsuario);
        $statement->bindParam(':totalPagar', $totalPagar);
        $statement->bindParam(':horaVenta', $horaVenta);
        $statement->bindParam(':fechaVenta', $fechaVenta);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function showIdVenta()
    {
        $showIdVenta = null;
        $statement = $this->db->prepare("SELECT VenIdVentas FROM `tblventas` ORDER BY VenIdVentas DESC LIMIT 1");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $showIdVenta[] = $consulta;
        }
        return $showIdVenta;
    }

    public function showVenta()
    {
        $showIdVenta = null;
        $statement = $this->db->prepare("SELECT * FROM `tblventas` WHERE VenEstado=0 ORDER BY VenIdVentas DESC");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $showIdVenta[] = $consulta;
        }
        return $showIdVenta;
    }

    public function showVentasInfo()
    {
        $showVentasInfo = null;
        $statement = $this->db->prepare("SELECT `VenIdVentas`, `Fk_UsuId`, `VenPrecioVenta`, `VenHora`, `VenFecha` FROM `tblventas`");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $showVentasInfo[] = $consulta;
        }
        return $showVentasInfo;
    }

    public function showVentasByRange($f_inicio, $f_fin)
    {
        $showVentasByRange = null;
        $statement = $this->db->prepare("SELECT `VenIdVentas`, `Fk_UsuId`, `VenPrecioVenta`, `VenHora`, `VenFecha` 
        FROM `tblventas` WHERE VenFecha >= :f_inicio AND VenFecha <= :f_fin AND VenEstado=0");
        $statement->bindParam(':f_inicio', $f_inicio);
        $statement->bindParam(':f_fin', $f_fin);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $showVentasByRange[] = $consulta;
        }
        return $showVentasByRange;
    }

    public function showDetalleVenta($idVenta)
    {
        $showDetalleVenta = null;
        $statement = $this->db->prepare("SELECT P.ProCodigoProducto as 'codigoProducto', P.ProDescripcion as 'nombre', (I.InvPrecioVenta * DV.SalCantidad) as 'total',
        DV.SalCantidad as 'cantidad', I.InvPrecioVenta as 'precio', V.VenFecha as 'fecha', DV.Fk_ProId as 'idProducto' 
        FROM `tbldetalleventa` DV 
        INNER JOIN tblproductos AS P ON P.ProIdProducto = DV.Fk_ProId 
        INNER JOIN tblinventario AS I ON P.ProIdProducto = I.Fk_ProIdProducto 
        INNER JOIN tblventas AS V ON V.VenIdVentas = DV.fk_venta
        WHERE fk_venta = :idVenta");
        $statement->bindParam(':idVenta', $idVenta);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $showDetalleVenta[] = $consulta;
        }
        return $showDetalleVenta;
    }

    public function insertDetalleVenta($idProducto, $idVenta, $cantidadProducto)
    {
        $statement = $this->db->prepare("INSERT INTO `tbldetalleventa`(`Fk_ProId`, `fk_venta`, `SalCantidad`) 
        VALUES (:idProducto, :idVenta, :cantidadProducto)");
        $statement->bindParam(':idProducto', $idProducto);
        $statement->bindParam(':idVenta', $idVenta);
        $statement->bindParam(':cantidadProducto', $cantidadProducto);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
