<?php
    require_once('../../Usuarios/Modelo/Usuarios.php');
    //Validar Sesion
    $ModeloUsuario = new Usuarios();
    $ModeloUsuario->validateSession();
     //Enmvio de Id por metodo GET
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
    <h1>Eliminar Administrador</h1>
    <form method="POST" action="../Controladores/delete.php">
        <input type="hidden" name="Id" value="<?php echo $Id ?>">
        <p>¿Estás seguro que deseas eliminar este administrador?</p>
        <input type="submit" value="Eliminar Administrador">

    </form>
</body>
</html>