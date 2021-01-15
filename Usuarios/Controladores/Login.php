<?php
    //Acceso al modelo
    require_once('../Modelo/Usuarios.php');
    //Determina si se ha recibido informacion mediante un METODO POST
    if($_POST){
        $Usuario = $_POST['Usuario'];
        $Password = $_POST['Contrasena'];

        //Creacion de objeto Usuarios y acceso a metodoLogin definido en la clase Usuarios (Modelo)
        $Modelo = new Usuarios();
        if ($Modelo->login($Usuario, $Password)){
            header('Location: ../../Estudiantes/Pages/index.php');
        }
        else{
            header('Location: ../../index.php');
        }
    }else{
        header('Location: ../../index.php');
    }

?>