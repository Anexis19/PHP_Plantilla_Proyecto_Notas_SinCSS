<?php
class Conexion{
    protected $db;
    private $driver = "mysql";
    private $host = "localhost";
    private $bd = "notas";
    private $usuario = "root";
    private $contrasena = "";

    public function __construct(){
        try{
            //PDO Represenda la conexion entre PHP y un servidor de bases de datos
            //DSN Es el Nombre de los Origenes de Datos y contiene la informacion para conectarse a labase de datos
            $db = new PDO("{$this->driver}:host={$this->host};dbname={$this->bd}", $this->usuario, $this->contrasena);

            //Añade atributos a nuestra conexion para el control de errores
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
            return $db;

        }catch(PDOException $e){
            echo "Ha surgido un error al tratar de conectarse a la base de datos".$e->getMessage();
        }
    }
}
?>