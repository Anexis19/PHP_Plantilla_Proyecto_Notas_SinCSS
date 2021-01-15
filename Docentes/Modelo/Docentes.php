<?php
    require_once('../../Conexion.php');
    class Docentes extends Conexion{
        public function __construct()
        {
            $this->db = parent::__construct();
        }
        public function add($Nombre, $Apellido, $Usuario, $Password){
            $statement = $this->db->prepare("INSERT INTO usuarios (NOMBRE, APELLIDO, USUARIO, PASSWORD, PERFIL, ESTADO) VALUES(:Nombre, :Apellido, :Usuario, :Password, 'Docente','Activo')");
            $statement->bindParam(':Nombre', $Nombre);
            $statement->bindParam(':Apellido', $Apellido);
            $statement->bindParam(':Usuario', $Usuario);
            $statement->bindParam(':Password', $Password);
            if($statement->execute()){
                header('Location: ../Pages/index.php');
            }else{
                header('Location: ../Pages/add.php');
            }
        }
        //Retorno de todos los docentes
        public function get(){
            $rows = null;
            $statement = $this->db->prepare("SELECT * FROM usuarios WHERE PERFIL = 'Docente'");
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[]= $result;
            }
            return $rows;
        }
        //Retorno de un docente en especifico
        public function getById($Id){
            $rows = null;
            $statement = $this->db->prepare("SELECT * FROM usuarios WHERE PERFIL = 'Docente' AND ID_USUARIO = :Id");
            $statement->bindParam(':Id', $Id);
            $statement->execute();
            while($result = $statement->fetch()){
                $rows[]= $result;
            }
            return $rows;
        }
        //Actualizacion de docente
        public function update($Id, $Nombre, $Apellido, $Usuario, $Password, $Estado){
            //Sentencia preparada que setea los parametros a la sentencia preparada a partir de un id
            $statement = $this->db->prepare("UPDATE usuarios SET NOMBRE = :Nombre, APELLIDO = :Apellido, USUARIO = :Usuario, PASSWORD = :Password, ESTADO = :Estado WHERE ID_USUARIO = :Id");
            //Asignacion del valor del parametro para la sentencia preparada
            $statement->bindParam(':Id', $Id);
            $statement->bindParam(':Nombre', $Nombre);
            $statement->bindParam(':Apellido', $Apellido);
            $statement->bindParam(':Usuario', $Usuario);
            $statement->bindParam(':Password', $Password);
            $statement->bindParam(':Estado', $Estado);
            if($statement->execute()){
                header('Location: ../Pages/index.php');
            }else{
                header('Location: ../Pages/edit.php');
            }
        }
        //Eliminacion de docente
        public function delete($Id){
            //Sentencia preparada que elimina los parametros a la sentencia preparada a partir de un id
            $statement = $this->db->prepare("DELETE FROM usuarios WHERE ID_USUARIO = :Id");
            //Asignacion del valor del parametro para la sentencia preparada
            $statement->bindParam(':Id', $Id);
            if($statement->execute()){
                header('Location: ../Pages/index.php');
            }else{
                header('Location: ../Pages/delete.php');
           }

        }

    }
?>