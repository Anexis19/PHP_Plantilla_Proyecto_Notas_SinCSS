<?php
    require_once('../../Usuarios/Modelo/Usuarios.php');
    require_once('../Modelo/Docentes.php');
    //Validacion de sesion
    $ModeloUsuarios = new Usuarios();
    $ModeloUsuarios->validateSession();
    //Creacion de objeto docente
    $Modelo = new Docentes();
    //Se trae el Id del docente por URL
    $Id = $_GET['Id'];
    $InformacionDocente = $Modelo->getById($Id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistemas de Notas</title>
</head>
<body>
    <h1>Editar Docente</h1>
    <form method="POST" action="../Controladores/edit.php">
        <!-- Campo invisible para el id-->
        <input type="hidden" name="Id" value="<?php echo $Id ?>">
        <?php
            if($InformacionDocente != null){
                foreach ($InformacionDocente as $Info) {
        ?>
        Nombre <br>
        <input type="text" name="Nombre" required="" autocomplete="off" value="<?php echo $Info['NOMBRE']?>"><br><br>
        Apellido <br>
        <input type="text" name="Apellido" required="" autocomplete="off" value="<?php echo $Info['APELLIDO'] ?>"><br><br>
        Usuario <br>
        <input type="text" name="Usuario" required="" autocomplete="off" value="<?php echo $Info['USUARIO'] ?>"><br><br>
        Password <br>
        <input type="password" name="Password" required="" autocomplete="off" value="<?php echo $Info['PASSWORD'] ?>"><br><br>
        Estado <br>
        <select name="Estado" required>
        <?php
            if ( $Info['ESTADO'] == "Activo"){

        ?>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
        <?php
            }else {

        ?>
                <option value="Inactivo">Inactivo</option>
                <option value="Activo">Activo </option>
        <?php
            }
        ?>
        </select><br><br>
        <?php
                }
            }
        ?>
        <input type="submit" value="Editar Docente">
    </form>
</body>
</html>