<?php

class Conexion
{

    protected $db;
    private $drive = "mysql";
    private $host = "localhost";
    private $dbname = "granero_hidalgodb";
    // private $dbname = "minimarketdb";
    private $user = "root";
    private $password = "";
    // public $URL = 'http://localhost/proyectos/Proyecto_Sena/';

    public function __construct()
    {
        try {
            $db = new PDO("{$this->drive}: host={$this->host};dbname={$this->dbname}", $this->user, $this->password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
            // echo 'Conexion exitosa';
        } catch (PDOException $e) {
            echo "Fallo la conexion, problema: " . $e->getMessage();
        }
    }
}
