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

    public function listarUsuarios()
    {
        $listarCategorias = null;
        $statement = $this->db->prepare("SELECT id, catNombre FROM tbl_categorias");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarCategorias[] = $consulta;
        }

        return $listarCategorias;
    }


    public function insertUsuarios($nombre)
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

    // public function updateCategorias($id, $descripcion, $estado)
    // {

    //     $statement = $this->db->prepare("UPDATE `tblcategoria` SET `CatDescripcion`= :descripcion, Fk_Estado = :estado 
    //     WHERE `CatIdCategoria`= :id");
    //     $statement->bindParam(':id', $id);
    //     $statement->bindParam(':descripcion', $descripcion);
    //     $statement->bindParam(':estado', $estado);
    //     if ($statement->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // public function readCategoriasById($id)
    // {
    //     $readCategoriasById = null;
    //     $statement = $this->db->prepare("SELECT C.CatIdCategoria as 'id', C.CatDescripcion as 'descripcion', C.Fk_Estado as 'estado', E.EstDescripcion as 'nomEstado' 
    //     FROM tblcategoria C
    //     JOIN tblestado E ON E.EstIdEstado=C.Fk_Estado
    //     WHERE CatIdCategoria = :id");
    //     $statement->bindParam(':id', $id);
    //     $statement->execute();
    //     while ($consulta = $statement->fetch()) {
    //         $readCategoriasById[] = $consulta;
    //     }

    //     return $readCategoriasById;
    // }
}
