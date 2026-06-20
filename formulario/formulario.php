<?php
include "Ipetym_conexion.php";

// Traemos los datos para los menúes desplegables
 $rGenero = mysqli_query($conexion, "select * from generos");
 $rBarrio = mysqli_query($conexion, "select * from barrios");
 $rCivil = mysqli_query($conexion, "select * from civil");
 $rCurso = mysqli_query($conexion, "select * from cursos");
 $rAula = mysqli_query($conexion, "select * from aulas");
 $rEspecialidad = mysqli_query($conexion, "select * from especialidad");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Carga IPETYM</title>
</head>
<body>

    <h1 align="center">Sistema de Carga</h1>
    <hr>

    <!-- MENU DE ICONOS -->
    <?php if(!isset($_GET['tabla'])): ?>
        <div align="center" style="margin-top: 50px;">
            <h2>¿Qué querés cargar?</h2><br>
            
            <a href="?tabla=alumnos" style="text-decoration:none; border:3px solid black; padding:30px; background-color:yellow; display:inline-block; margin:20px;">
                <span style="font-size:80px;">👦</span><br>
                <b>ALUMNO</b>
            </a>

            <a href="?tabla=profesores" style="text-decoration:none; border:3px solid black; padding:30px; background-color:cyan; display:inline-block; margin:20px;">
                <span style="font-size:80px;">👨‍🏫</span><br>
                <b>PROFESOR</b>
            </a>
        </div>
    <?php endif; ?>


    <!-- FORMULARIO ALUMNO -->
    <?php if(isset($_GET['tabla']) && $_GET['tabla'] == 'alumnos'): ?>
    <a href="formulario.php"><button>Volver al menu</button></a>
    <h2>Inscribir Alumno</h2>
    <!-- CAMBIO: Acá apunta a guardado.php -->
    <form method="POST" action="guardado.php">
        <input type="hidden" name="tabla" value="alumnos">
        
        <fieldset>
            <legend>Datos Alumno</legend>
            <label>Apellido </label><input type="text" name="Apellido_Alumnos" required>
            <label>Nombre </label><input type="text" name="Nombre_Alumnos" required><br><br>
            <label>Documento </label><input type="number" name="Documento_Alumnos" required>
            <label>Fecha de Nacimiento </label><input type="date" name="FecNac_Alumnos" required><br><br>
            <label>Genero </label>
            <select name="GENEROS_ALUMNOS">
                <?php while ($reg = mysqli_fetch_array($rGenero)) { echo '<option value="'.$reg[0].'">'.$reg[1].'</option>'; } ?>
            </select>
        </fieldset>

        <fieldset>
            <legend>Comunicacion y Direccion</legend>
            <label>Telefono</label><input type="number" name="Telefono_Alumnos" required>
            <label>Correo</label><input type="text" name="Mail_Alumnos" required><br><br>
            <label>Calle</label><input type="text" name="Calle_Alumnos" required>
            <label>Numero</label><input type="number" name="Numero_Alumnos" required><br><br>
            <label>Piso</label><input type="text" name="Piso_Alumnos">
            <label>Depto</label><input type="text" name="Depto_Alumnos">
            <label>Edificio</label><input type="text" name="Edificio_Alumnos"><br><br>
            <label>Barrio</label>
            <select name="BARRIOS_ALUMNOS">
                <?php while ($reg = mysqli_fetch_array($rBarrio)) { echo '<option value="'.$reg[0].'">'.$reg[1].'</option>'; } ?>
            </select>
            <label>Estado civil</label>
            <select name="CIVIL_ALUMNOS">
                <?php while ($reg = mysqli_fetch_array($rCivil)) { echo '<option value="'.$reg[0].'">'.$reg[1].'</option>'; } ?>
            </select>
        </fieldset>

        <fieldset>
            <legend>Datos Academicos del Alumno</legend>
            <label>Curso </label>
            <select name="CURSOS_ALUMNOS">
                <?php while ($reg = mysqli_fetch_array($rCurso)) { echo '<option value="'.$reg[0].'">'.$reg[1].'</option>'; } ?>
            </select>
            <label>Aula </label>
            <select name="AULAS_ALUMNOS">
                <?php while ($reg = mysqli_fetch_array($rAula)) { echo '<option value="'.$reg[0].'">Aula Nro: '.$reg[1].'</option>'; } ?>
            </select>
            <label>Especialidad </label>
            <select name="ESPECIALIDAD_ALUMNOS">
                <?php while ($reg = mysqli_fetch_array($rEspecialidad)) { echo '<option value="'.$reg[0].'">'.$reg[1].'</option>'; } ?>
            </select>
        </fieldset>
        <br>
        <input type="submit" value="Guardar Alumno">
    </form>
    <?php endif; ?>


    <hr>


    <!-- FORMULARIO PROFESOR -->
    <?php if(isset($_GET['tabla']) && $_GET['tabla'] == 'profesores'): ?>
    <a href="formulario.php"><button>Volver al menu</button></a>
    <h2>Inscribir Profesor</h2>
    <!-- CAMBIO: Acá apunta a guardado.php -->
    <form method="POST" action="guardado.php">
        <input type="hidden" name="tabla" value="profesores">
        
        <fieldset>
            <legend>Datos Profesor</legend>
            <label>Apellido </label><input type="text" name="Apellido_Profesores" required>
            <label>Nombre </label><input type="text" name="Nombre_Profesores" required><br><br>
            <label>Documento </label><input type="number" name="Documento_Profesores" required>
            <label>Fecha de Nacimiento </label><input type="date" name="FecNac_Profesores" required><br><br>
            <label>Genero </label>
            <select name="GENERO_PROFESORES">
                <?php mysqli_data_seek($rGenero, 0); while ($reg = mysqli_fetch_array($rGenero)) { echo '<option value="'.$reg[0].'">'.$reg[1].'</option>'; } ?>
            </select>
        </fieldset>

        <fieldset>
            <legend>Comunicacion y Direccion</legend>
            <label>Telefono</label><input type="number" name="Telefono_Profesores" required>
            <label>Correo</label><input type="text" name="Mail_Profesores" required><br><br>
            <label>Calle</label><input type="text" name="Calle_Profesores" required>
            <label>Numero</label><input type="number" name="Numero_Profesores" required><br><br>
            <label>Piso</label><input type="text" name="Piso_Profesores">
            <label>Depto</label><input type="text" name="Depto_Profesores">
            <label>Edificio</label><input type="text" name="Edificio_Profesores"><br><br>
            <label>Barrio</label>
            <select name="BARRIOS_PROFESORES">
                <?php mysqli_data_seek($rBarrio, 0); while ($reg = mysqli_fetch_array($rBarrio)) { echo '<option value="'.$reg[0].'">'.$reg[1].'</option>'; } ?>
            </select>
            <label>Estado civil</label>
            <select name="CIVIL_PROFESORES">
                <?php mysqli_data_seek($rCivil, 0); while ($reg = mysqli_fetch_array($rCivil)) { echo '<option value="'.$reg[0].'">'.$reg[1].'</option>'; } ?>
            </select>
        </fieldset>

        <fieldset>
            <legend>Datos Academicos del Profesor</legend>
            <label>Curso que da </label>
            <select name="CURSOS_PROFESORES">
                <?php mysqli_data_seek($rCurso, 0); while ($reg = mysqli_fetch_array($rCurso)) { echo '<option value="'.$reg[0].'">'.$reg[1].'</option>'; } ?>
            </select>
            <label>Aula donde da </label>
            <select name="AULAS_PROFESORES">
                <?php mysqli_data_seek($rAula, 0); while ($reg = mysqli_fetch_array($rAula)) { echo '<option value="'.$reg[0].'">Aula Nro: '.$reg[1].'</option>'; } ?>
            </select>
            <label>Especialidad </label>
            <select name="ESPECIALIDAD_PROFESORES">
                <?php mysqli_data_seek($rEspecialidad, 0); while ($reg = mysqli_fetch_array($rEspecialidad)) { echo '<option value="'.$reg[0].'">'.$reg[1].'</option>'; } ?>
            </select>
        </fieldset>
        <br>
        <input type="submit" value="Guardar Profesor">
    </form>
    <?php endif; ?>

</body>
</html>