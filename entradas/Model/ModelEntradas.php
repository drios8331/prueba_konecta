<?php
require_once '../../conexion.php';

class Entradas extends Conexion
{

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function buscarEntradas()
    {
        $showEntradas = null;
        $statement = $this->db->prepare("SELECT E.id as 'id', E.fkProducto as 'idProducto', P.proNombre as 'producto', E.entCantidad as 'cantidad', E.entPrecio as 'precio', P.proReferencia as 'codigo', E.entFecha as 'fecha' FROM `tbl_entradas` as E INNER JOIN tbl_productos as P ON P.Id = E.fkProducto ORDER BY E.id DESC");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $showEntradas[] = $consulta;
        }
        return $showEntradas;
    }

    public function insertarEntrada($idProd, $precio, $cantidad, $fecha)
    {
        $statement = $this->db->prepare("INSERT INTO `tbl_entradas`(`fkProducto`, `entPrecio`, `entCantidad`, `entFecha`) VALUES (:idProd, :precio, :cantidad, :fecha)");
        $statement->bindParam(':idProd', $idProd);
        $statement->bindParam(':cantidad', $cantidad);
        $statement->bindParam(':precio', $precio);
        $statement->bindParam(':fecha', $fecha);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateEntrada($id, $idProd, $idProv, $idCompra, $cantidad, $precio)
    {
        $statement = $this->db->prepare("UPDATE `tbldetallecompra` SET `Fk_ProIdProducto`=:idProd,`Fk_ProIdProveedor`=:idProv, Fk_ComIdCompras=:idCompra,
        `EntCantidadDeEntrada`=:cantidad,`EntPrecioCosto`=:precio WHERE `EntIdEntradaDeBodega`=:id");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':idProd', $idProd);
        $statement->bindParam(':idProv', $idProv);
        $statement->bindParam(':idCompra', $idCompra);
        $statement->bindParam(':cantidad', $cantidad);
        $statement->bindParam(':precio', $precio);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function showEntradasById($idEntrada)
    {
        $showEntradasById = null;
        $statement = $this->db->prepare("SELECT E.id as 'id', E.fkProducto as 'idProducto', P.proReferencia as 'Referencia', P.proNombre as 'producto', E.entCantidad as 'cantidad', E.entPrecio as 'precio', E.entFecha as 'fecha' FROM `tbl_entradas` as E INNER JOIN tbl_productos as P ON P.Id = E.fkProducto WHERE E.id = :idEntrada");
        $statement->bindParam(':idEntrada', $idEntrada);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $showEntradasById[] = $consulta;
        }
        return $showEntradasById;
    }

    public function showEntradasByIdProductoOld($idProducto)
    {
        $showEntradasByIdProducto = null;
        $statement = $this->db->prepare("SELECT id, fkProducto, entCantidad, entPrecio FROM tbl_entradas WHERE fkProducto = :idProducto GROUP BY id DESC LIMIT 1, 1");
        $statement->bindParam(':idProducto', $idProducto);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $showEntradasByIdProducto[] = $consulta;
        }
        return $showEntradasByIdProducto;
    }
}
