<?php
require_once '../../conexion.php';

class Inventario extends Conexion
{

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function insertInventario($idProducto, $cantidad, $precioVenta)
    {
        $statement = $this->db->prepare("INSERT INTO `tbl_inventario`(`fkProducto`, `invStockFisico`, `invPrecioVenta`) VALUES (:idProducto,:cantidad,:precioVenta)");
        $statement->bindParam(':idProducto', $idProducto);
        $statement->bindParam(':cantidad', $cantidad);
        $statement->bindParam(':precioVenta', $precioVenta);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function showInventarioByIdProducto($idProducto)
    {
        $showInventarioByIdProducto = null;
        $statement = $this->db->prepare("SELECT I.id AS 'id', I.fkProducto as 'idProducto', I.invStockFisico as 'stock', I.invPrecioVenta as 'precioVenta' FROM `tbl_inventario` as I WHERE fkProducto=:idProducto");
        $statement->bindParam(':idProducto', $idProducto);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $showInventarioByIdProducto[] = $consulta;
        }
        return $showInventarioByIdProducto;
    }

    public function updateCantidadInventarioSalida($idProducto, $cantidad)
    {
        $statement = $this->db->prepare("UPDATE tbl_inventario SET invStockFisico = :cantidad WHERE fkProducto = :idProducto");
        $statement->bindParam(':idProducto', $idProducto);
        $statement->bindParam(':cantidad', $cantidad);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCantidadInventario($idProducto, $cantidad, $precioBase)
    {
        $statement = $this->db->prepare("UPDATE `tbl_inventario` SET `invStockFisico`=:cantidad,`invPrecioVenta`=:precioBase WHERE fkProducto=:idProducto");
        $statement->bindParam(':idProducto', $idProducto);
        $statement->bindParam(':cantidad', $cantidad);
        $statement->bindParam(':precioBase', $precioBase);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateInventarioVentaNull($idProducto, $cantidad)
    {
        $statement = $this->db->prepare("UPDATE `tblinventario` SET `InvStockFisico`=:cantidad WHERE `Fk_ProIdProducto`= :idProducto");
        $statement->bindParam(':idProducto', $idProducto);
        $statement->bindParam(':cantidad', $cantidad);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function showInventario()
    {
        $showInventario = null;
        $statement = $this->db->prepare("SELECT I.id as 'id', I.fkProducto as 'idProducto', P.proReferencia as 'referencia', P.proNombre as 'nombre', I.invStockFisico as 'stock', I.invPrecioVenta as 'precio', U.uniMedida as 'uMedida', P.proCantidadMedida as 'cantidad'
        FROM `tbl_inventario` as I
        INNER JOIN tbl_productos as P ON P.Id = I.fkProducto
        INNER JOIN tbl_unidadesmedida as U ON U.id = P.fkUnidadMedida");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $showInventario[] = $consulta;
        }
        return $showInventario;
    }

    public function showInventarioByStockMinimo()
    {
        $showInventarioByStockMinimo = null;
        $statement = $this->db->prepare("SELECT P.ProCodigoProducto AS 'codigo', P.ProDescripcion AS 'nombre', I.InvStockFisico AS 'stockFisico', P.ProStockMinimo AS 'stockMinimo' 
        FROM `tblinventario` AS I 
        INNER JOIN tblproductos as P ON P.ProIdProducto = I.Fk_ProIdProducto 
        WHERE I.InvStockFisico <= P.ProStockMinimo");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $showInventarioByStockMinimo[] = $consulta;
        }
        return $showInventarioByStockMinimo;
    }

    public function showInventarioById($id)
    {
        $showInventarioById = null;
        $statement = $this->db->prepare("SELECT I.id as 'id', I.fkProducto as 'idProducto', P.proReferencia as 'referencia', P.proNombre as 'nombre', U.uniMedida as 'uMedida', P.proCantidadMedida as 'cantidadDeMedida', I.invStockFisico as 'stock', E.entPrecio as 'precio' FROM `tbl_inventario` as I INNER JOIN tbl_productos as P ON P.Id = I.fkProducto INNER JOIN tbl_entradas as E ON P.Id = E.fkProducto INNER JOIN tbl_unidadesmedida as U ON U.id = P.fkUnidadMedida WHERE I.id = :id LIMIT 1");
        $statement->bindParam(':id', $id);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $showInventarioById[] = $consulta;
        }
        return $showInventarioById;
    }

    public function showInventarioByAll()
    {
        $showInventarioByAll = null;
        $inventarioArray = null;
        $statement = $this->db->prepare("SELECT `InvStockFisico`, P.ProStockMinimo as 'stockMinimo', I.InvValorIva as 'iva', I.InvPrecioVenta as 'precioVenta', 
        P.ProCodigoProducto as 'codigoProducto', P.ProDescripcion as 'nombreProducto', Fk_ProIdProducto 
        FROM `tblinventario` as I 
        INNER JOIN tblproductos as P ON P.ProIdProducto=I.Fk_ProIdProducto");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $showInventarioByAll[] = $consulta;
        }
        if ($showInventarioByAll != null) {
            foreach ($showInventarioByAll as $key => $value) {
                $idProducto = $value['Fk_ProIdProducto'];
                $codigoProducto = $value['codigoProducto'];
                $nombreProducto = $value['nombreProducto'];
                $ivaProducto = $value['iva'];
                $precioVenta = $value['precioVenta'];
                $stockFisico = $value['InvStockFisico'];
                $stockMinimo = $value['stockMinimo'];
                $arrayProductos[] = [
                    'codigoP' => $codigoProducto, 'nombreP' => $nombreProducto,
                    'ivaP' => $ivaProducto, 'precioP' => $precioVenta, 'stockFisico' => $stockFisico, 'stockMinimo' => $stockMinimo, 'idProducto' => $idProducto
                ];
            }
            $inventarioArray = json_encode($arrayProductos);
        }
        return $inventarioArray;
    }
}
