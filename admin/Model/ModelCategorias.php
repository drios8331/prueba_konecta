<?php
require_once '../../conexion.php';

class Administracion extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function listarCategorias()
    {
        $listarCategorias = null;
        $statement = $this->db->prepare("SELECT id, catNombre FROM tbl_categorias");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarCategorias[] = $consulta;
        }

        return $listarCategorias;
    }


    public function insertCategorias($nombre)
    {

        $statement = $this->db->prepare("INSERT INTO `tbl_categorias`(`catNombre`) VALUES (:nombre)");
        $statement->bindParam(':nombre', $nombre);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function listarUnidadesMedida()
    {
        $listarUnidadesMedida = null;
        $statement = $this->db->prepare("SELECT `id`, `uniMedida` FROM `tbl_unidadesmedida`");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarUnidadesMedida[] = $consulta;
        }

        return $listarUnidadesMedida;
    }

    public function stockMax()
    {
        $producto = null;
        $statement = $this->db->prepare("SELECT I.id as 'id', I.fkProducto as 'idProducto', P.proNombre as 'nombreproducto', I.invStockFisico as 'stock',I.invPrecioVenta as 'precio' FROM `tbl_inventario` as I INNER JOIN tbl_productos as P ON P.Id = I.fkProducto ORDER BY I.invStockFisico DESC LIMIT 1");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $producto[] = $consulta;
        }
        return $producto;
    }

    public function productMasVendido()
    {
        $productoMayorVenta = null;
        $statement = $this->db->prepare("SELECT D.id as `id`, D.fkVenta as `fkVenta`, D.fkProducto as `fkProducto`, P.proNombre as 'nombre', sum(`detCantidad`) as cantidad FROM `tbl_detalleventa` as D INNER JOIN tbl_productos as P ON P.Id = D.fkProducto GROUP BY `fkProducto` ORDER BY cantidad DESC LIMIT 1");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $productoMayorVenta[] = $consulta;
        }
        return $productoMayorVenta;
    }

}
