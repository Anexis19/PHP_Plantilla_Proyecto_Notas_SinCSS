<?php
    require_once('../../Usuarios/Modelo/Usuarios.php');
    //Validar sesion
    $ModeloUsuarios= new Usuarios();
    $ModeloUsuarios->validateSession();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistemas de Notas</title>
</head>
<body>
    <h1>Registrar Docente</h1>
    <form method="POST" action="../Controladores/add.php">
        Nombre <br>
        <input type="text" name="Nombre" required="" autocomplete="off" placeholder="Nombre"><br><br>
        Apellido <br>
        <input type="text" name="Apellido" required="" autocomplete="off" placeholder="Apellido"><br><br>
        Usuario <br>
        <input type="text" name="Usuario" required="" autocomplete="off" placeholder="Usuario"><br><br>
        Password <br>
        <input type="password" name="Password" required="" autocomplete="off" placeholder="Contraseña"><br><br>
        <input type="submit" value="Registrar Docente">



    </form>
</body>
</html>