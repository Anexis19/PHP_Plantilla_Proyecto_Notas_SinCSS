<?php
    require_once('../../Usuarios/Modelo/Usuarios.php');
    require_once('../../Metodos.php');
    //Verificacion de sesion
    $ModeloUsuarios = new Usuarios();
    $ModeloUsuarios->validateSession();
    //Objeto de clase metodos
    $ModeloMetodos = new Metodos();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Notas</title>
</head>
<body>
    <h1>Registrar Estudiante</h1>
    <form method="POST" action="../Controladores/add.php">
        Nombre <br>
        <input type="text" name="Nombre" required="" autocomplete="off" placeholder="Nombre"><br><br>
        Apellido <br>
        <input type="text" name="Apellido" required="" autocomplete="off" placeholder="Apellido"><br><br>
        Documento <br>
        <input type="text" name="Documento" required="" autocomplete="off" placeholder="Documento"><br><br>
        Correo <br>
        <input type="email" name="Correo" required="" autocomplete="off" placeholder="Correo"><br><br>
        Materia <br>
        <select name="Materia" required>
            <option>Seleccion</option>
            <!-- Acceso a base datos para obtener las materias registradas-->
            <?php
            $Materias = $ModeloMetodos->getMaterias();
            if($Materias != null){
                foreach ($Materias as $Materia) {
                ?>
                    <option value="<?php echo $Materia['MATERIA']; ?>"><?php echo $Materia['MATERIA']; ?></option>
                    <?php
                }
            }
            ?>
        </select><br><br>
        Docente <br>
        <select name="Docente" required>
            <option>Seleccione</option>
            <!-- Acceso a base de datos apra obtener docentes registrados-->
            <?php
            $Docentes = $ModeloMetodos->getDocentes();
            if($Docentes != null){
                foreach ($Docentes as $Docente) {
                ?>
                    <option value="<?php echo $Docente['NOMBRE']. ' '. $Docente['APELLIDO']; ?>"><?php echo $Docente['NOMBRE']. ' '.$Docente['APELLIDO']; ?></option>
                    <?php
                }
            }
            ?>
        </select><br><br>
        Promedio <br>
        <input type="number" name="Promedio" required="" autocomplete="off" placeholder="Promedio"><br><br>
        <input type="submit" value="Registar Estudiante">


    </form>
</body>
</html>