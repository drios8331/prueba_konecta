<?php
require_once '../../conexion.php';

class Productos extends Conexion
{

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function buscarProductos()
    {
        $buscarProductos = null;
        $statement = $this->db->prepare("SELECT `Id`, `fkCategoria`, `fkUnidadMedida`, `proNombre`, `proReferencia`, `proCantidadMedida`, `proEstado`, `proFecha` FROM `tbl_productos` WHERE 1");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $buscarProductos[] = $consulta;
        }
        return $buscarProductos;
    }

    public function showProductsAll()
    {
        $showProductsAll = [];
        $arrayListaProductos = [];
        $statement = $this->db->prepare("SELECT `Id`, `fkCategoria`, `fkUnidadMedida`, `proNombre`, `proReferencia`, `proCantidadMedida`, `proEstado`, `proFecha` FROM `tbl_productos`");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $showProductsAll[] = $consulta;
        }
        if ($showProductsAll != null) {
            foreach ($showProductsAll as $key => $value) {
                $id = $value['Id'];
                $codigo = $value['proReferencia'];
                $producto = $value['proNombre'];
                $uMedida = $value['fkUnidadMedida'];
                $arrayProductos[] = ['id'=>$id, 'codigo'=>$codigo, 'producto'=>$producto, 'uMedida'=>$uMedida];
            }
            $arrayListaProductos = json_encode($arrayProductos);
        }   
        return $arrayListaProductos;
    }

    public function buscarProductosId($id)
    {
        $buscarProductosId = null;
        $statement = $this->db->prepare("SELECT P.Id as 'Id', P.fkCategoria as 'idCat', P.fkUnidadMedida as 'idUM', P.proReferencia as 'codigo', P.proNombre as 'producto', `proCantidadMedida` as 'medida', C.catNombre as 'categoria', U.uniMedida as 'unidadMedida' FROM `tbl_productos` as P INNER JOIN tbl_categorias as C ON C.id=P.fkCategoria INNER JOIN tbl_unidadesmedida U ON U.id=P.fkUnidadMedida WHERE P.Id = :id");
        $statement->bindParam(':id', $id);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $buscarProductosId[] = $consulta;
        }
        return $buscarProductosId;
    }

    public function buscarProductosCod($codigo)
    {
        $buscarProductosCod = null;
        $statement = $this->db->prepare("SELECT P.Id as 'Id', P.fkCategoria as 'idCat', P.fkUnidadMedida as 'idUM', P.proReferencia as 'codigo', P.proNombre as 'producto', `proCantidadMedida` as 'medida', C.catNombre as 'categoria', U.uniMedida as 'unidadMedida' FROM `tbl_productos` as P INNER JOIN tbl_categorias as C ON C.id=P.fkCategoria INNER JOIN tbl_unidadesmedida U ON U.id=P.fkUnidadMedida WHERE proReferencia = :codigo");
        $statement->bindParam(':codigo', $codigo);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $buscarProductosCod[] = $consulta;
        }
        return $buscarProductosCod;
    }

    public function insertarProductos($idCat, $idUM, $nombre, $referencia, $medida, $estado, $fecha)
    {
        $statement = $this->db->prepare("INSERT INTO `tbl_productos`(`fkCategoria`, `fkUnidadMedida`, `proNombre`, `proReferencia`, `proCantidadMedida`, `proEstado`, `proFecha`) VALUES (:idCat, :idUM, :nombre, :referencia, :medida, :estado, :fecha)");
        $statement->bindParam(':idCat', $idCat);
        $statement->bindParam(':idUM', $idUM);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':referencia', $referencia);
        $statement->bindParam(':medida', $medida);
        $statement->bindParam(':estado', $estado);
        $statement->bindParam(':fecha', $fecha);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function modificarProductos($id, $idCat, $idUM, $codigo, $descripcion, $stockmin, $marca, $medida, $iva, $ganancia)
    {
        $statement = $this->db->prepare("UPDATE `tblproductos` SET `Fk_CatIdCategoria`=:categoria,`Fk_UniIdUMedida`=:unidMedida,
        `ProCodigoProducto`=:codigo,`ProDescripcion`=:producto,`ProStockMinimo`=:stockMinimo,`Fk_ProIdMarca`=:marca,`ProCantMedida`=:medida,`ProPorcentajeIva`=:iva, `ProGanancia`=:ganancia
        WHERE ProIdProducto=:id");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':categoria', $idCat);
        $statement->bindParam(':unidMedida', $idUM);
        $statement->bindParam(':codigo', $codigo);
        $statement->bindParam(':producto', $descripcion);
        $statement->bindParam(':stockMinimo', $stockmin);
        $statement->bindParam(':marca', $marca);
        $statement->bindParam(':medida', $medida);
        $statement->bindParam(':iva', $iva);
        $statement->bindParam(':ganancia', $ganancia);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
