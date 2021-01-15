<?php
    require_once('../../Usuarios/Modelo/Usuarios.php');
    //Validar Sesion
    $ModeloUsuarios = new Usuarios();
    $ModeloUsuarios->validateSession();

    $Id = $_GET['Id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Notas</title>
</head>
<body>
    <h1>Eliminar Materia</h1>

    <!-- ENVIO DE INFORMACION POR METODO POST, SE ENVIA EL ID AL CONTROLADOR DE DELETE-->
    <form method="POST" action="../Controladores/delete.php">
        <input type="hidden" name="Id" value="<?php echo $Id ?>">
        <p>¿Estás seguro que deseas eliminar esta materia?</p>
        <input type="submit" value="Eliminar Materia">

    </form>
</body>
</html>