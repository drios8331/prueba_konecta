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

}
