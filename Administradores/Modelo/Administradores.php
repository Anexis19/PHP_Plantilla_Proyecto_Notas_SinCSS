<?php
    require_once('../../Conexion.php');
    class Administradores extends Conexion{
        public function __construct()
        {
            $this->db = parent::__construct();
        }
        public function add($Nombre,$Apellido,$Usuario,$Password){
            $statement = $this->db->prepare("INSERT INTO usuarios (NOMBRE, APELLIDO, USUARIO, PASSWORD, PERFIL, ESTADO) VALUES (:Nombre, :Apellido, :Usuario, :Password, 'Administrador', 'Activo')" );
            //Asignacion de valores de sentencia SQL y parametros recibidos por el metodo
            $statement->bindParam(':Nombre', $Nombre);
            $statement->bindParam(':Apellido', $Apellido);
            $statement->bindParam(':Usuario', $Usuario);
            $statement->bindParam(':Password', $Password);
            //Insercion correcta = Redireccionamiento al index de administradores
            if($statement->execute()){
                header('Location: ../Pages/index.php');
            }else{
                header('Location: ../Pages/add.php');
            }
        }
        //Retorno de todos los administradores
        public function get(){
            $rows= null;
            //Sentencia preparada que obtiene la informacion de la tabla de administradores
            $statement = $this->db->prepare("SELECT * FROM usuarios WHERE PERFIL = 'Administrador'");
            //Ejecucion de la sentencia
            $statement->execute();
            //Obtiene la fila del conjunto de resultado y la almacena continuamente en el arra "rows"
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            //Retorno del arreglo
            return $rows;
        }
        //Retorno de un administrador en especifico
        public function getById($Id){
            $rows= null;
            //Sentencia preparada que obtiene la informacion de la tabla de administradores
            $statement = $this->db->prepare("SELECT * FROM usuarios WHERE PERFIL = 'Administrador' AND ID_USUARIO = :Id");
            //Asignacion del valor del parametro para la sentencia preparada
            $statement->bindParam(':Id', $Id);
            //Ejecucion de la sentencia
            $statement->execute();
            //Obtiene la fila del conjunto de resultado y la almacena continuamente en el arra "rows"
            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            //Retorno del arreglo
            return $rows;
        }
        //Actualizacion de administrador
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
        //Eliminacion de administrador
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