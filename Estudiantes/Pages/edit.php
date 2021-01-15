<?php
    require_once('../Modelo/Estudiantes.php');
    require_once('../../Usuarios/Modelo/Usuarios.php');
    require_once('../../Metodos.php'); //Acceso a metodos para listar materias y docentes
    //Validacion de Sesion
    $ModeloUsuarios = new Usuarios();
    $ModeloUsuarios->validateSession();

    //Creacion de objeto estudiante
    $Modelo = new Estudiantes();
    //Se trae el Id del estudiante por URL y se lo pasa como parametro al metodo getById
    //(Linea 58, Estudiantes/Pages/index.php)
    $Id= $_GET['Id'];
    $InformacionEstudiante = $Modelo->getById($Id);

    //Creacion de objeto Metodos
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
    <h1>Editar Estudiante</h1>
    <form method="POST" action="../Controladores/edit.php">
        <!--Campo de tipo oculto para al momento de editar un estudiante, muestre su respectivo Id-->
        <input type="hidden" name="Id" value="<?php echo $Id; ?>">
        <?php
            //Consulta si objeto InformacionEstudiante es nulo o no
            if($InformacionEstudiante != null){
                //Recorre el array de Estudiantes
                foreach ($InformacionEstudiante as $Info) {
        ?>
        <!--Imprime los datos actuales del estudiante sobre el formulario y se pueden editar en el mismo momento-->
        Nombre <br>
        <input type="text" name="Nombre" required="" autocomplete="off" placeholder="Nombre" value="<?php echo $Info['NOMBRE'] ?>"><br><br>
        Apellido <br>
        <input type="text" name="Apellido" required="" autocomplete="off" placeholder="Apellido" value="<?php echo $Info['APELLIDO'] ?>"><br><br>
        Documento <br>
        <input type="text" name="Documento" required="" autocomplete="off" placeholder="Documento" value="<?php echo $Info['DOCUMENTO'] ?>"><br><br>
        Correo <br>
        <input type="email" name="Correo" required="" autocomplete="off" placeholder="Correo" value="<?php echo $Info['CORREO'] ?>"><br><br>
        Materia <br>
        <select name="Materia" required>
            <option value="<?php echo $Info['MATERIA'] ?>"><?php echo $Info['MATERIA'] ?></option>
            <?php
            // Creacion de obejto de tipo Metodos para consultar las materias
            $Materias = $ModeloMetodos->getMaterias();
            //Recorrer base de datos de la tabla materias
            if($Materias != null){
                foreach ($Materias as $Materia) {

            ?>
            <!-- Impresion de las materias que hay en la base de datos-->
            <option value="<?php echo $Materia['MATERIA'] ?>"><?php echo $Materia['MATERIA']?></option>
            <?php
                }
            }
            ?>
        </select><br><br>
        Docente <br>
        <select name="Docente" required>
            <option value="<?php echo $Info['DOCENTE'] ?>"><?php echo $Info['DOCENTE'] ?></option>
            <?php
            // Creacion de obejto de tipo Metodos para consultar los docentes
            $Docentes = $ModeloMetodos->getDocentes();
            if($Docentes != null){
                //Recorrer base de datos de la tabla usuarios y compara el perfil con docente
                foreach ($Docentes as $Docente) {

            ?>
             <!-- Impresion de los docentes que hay en la base de datos-->
            <option value="<?php echo $Docente['NOMBRE'].' '.$Docente['APELLIDO']; ?>"><?php echo $Docente['NOMBRE']. ' '.$Docente['APELLIDO']; ?></option>
            <?php
                }
            }
            ?>

        </select><br><br>
        Promedio <br>
        <input type="number" name="Promedio" required="" autocomplete="off" placeholder="Promedio" value="<?php echo $Info['PROMEDIO'];?>"><br><br>
        <?php   }
            }
        ?>
        <input type="submit" value="Editar Estudiante">


    </form>
</body>
</html>