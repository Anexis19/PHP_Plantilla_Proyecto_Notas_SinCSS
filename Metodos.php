<?php
    /*
    Esta clase se crea debido que al momento de registrar un estudiante,
    es necesario la asignacion de un docente y una materia. Para no sea ambigua la
    definicion de las clases, creamos un nuevo archivo que contenga estos dos metodos

    */


    require_once('Conexion.php');
    class Metodos extends Conexion{
        public function __construct()
        {
            $this->db = parent::__construct();
        }

        //Retorno de todas las materias
        public function getMaterias(){
            $rows = null;
            $statement = $this->db->prepare("SELECT * FROM materias");
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            return $rows;
        }
        //Retorno de los usuarios con perfil Docente
        public function getDocentes(){
            $rows = null;
            $statement = $this->db->prepare("SELECT * FROM usuarios WHERE PERFIL = 'Docente'");
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            return $rows;
        }



    }
?>