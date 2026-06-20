<?php
// CAMBIO: Acá incluye a tu archivo ipetym_conexion.php
include "Ipetym_conexion.php";

 $tabla = $_POST['tabla'];

if ($tabla == "alumnos") {
    $sql = "INSERT INTO alumnos (Apellido_Alumnos, Nombre_Alumnos, Documento_Alumnos, FecNac_Alumnos, GENEROS_ALUMNOS, Telefono_Alumnos, Mail_Alumnos, Calle_Alumnos, Numero_Alumnos, Piso_Alumnos, Depto_Alumnos, Edificio_Alumnos, BARRIOS_ALUMNOS, CIVIL_ALUMNOS, CURSOS_ALUMNOS, AULAS_ALUMNOS, ESPECIALIDAD_ALUMNOS) 
            VALUES ('$_POST[Apellido_Alumnos]', '$_POST[Nombre_Alumnos]', '$_POST[Documento_Alumnos]', '$_POST[FecNac_Alumnos]', '$_POST[GENEROS_ALUMNOS]', '$_POST[Telefono_Alumnos]', '$_POST[Mail_Alumnos]', '$_POST[Calle_Alumnos]', '$_POST[Numero_Alumnos]', '$_POST[Piso_Alumnos]', '$_POST[Depto_Alumnos]', '$_POST[Edificio_Alumnos]', '$_POST[BARRIOS_ALUMNOS]', '$_POST[CIVIL_ALUMNOS]', '$_POST[CURSOS_ALUMNOS]', '$_POST[AULAS_ALUMNOS]', '$_POST[ESPECIALIDAD_ALUMNOS]')";
} 
elseif ($tabla == "profesores") {
    $sql = "INSERT INTO profesores (Apellido_Profesores, Nombre_Profesores, Documento_Profesores, FecNac_Profesores, GENERO_PROFESORES, Telefono_Profesores, Mail_Profesores, Calle_Profesores, Numero_Profesores, Piso_Profesores, Depto_Profesores, Edificio_Profesores, BARRIOS_PROFESORES, CIVIL_PROFESORES, CURSOS_PROFESORES, AULAS_PROFESORES, ESPECIALIDAD_PROFESORES) 
            VALUES ('$_POST[Apellido_Profesores]', '$_POST[Nombre_Profesores]', '$_POST[Documento_Profesores]', '$_POST[FecNac_Profesores]', '$_POST[GENERO_PROFESORES]', '$_POST[Telefono_Profesores]', '$_POST[Mail_Profesores]', '$_POST[Calle_Profesores]', '$_POST[Numero_Profesores]', '$_POST[Piso_Profesores]', '$_POST[Depto_Profesores]', '$_POST[Edificio_Profesores]', '$_POST[BARRIOS_PROFESORES]', '$_POST[CIVIL_PROFESORES]', '$_POST[CURSOS_PROFESORES]', '$_POST[AULAS_PROFESORES]', '$_POST[ESPECIALIDAD_PROFESORES]')";
}

if (mysqli_query($conexion, $sql)) {
    echo "<h1>Guardado con exito</h1>";
} else {
    echo "<h1>Fallo el guardado</h1>";
    echo "Error: " . mysqli_error($conexion);
}

// CAMBIO: Acá vuelve a formulario.php
echo "<br><a href='formulario.php'><button>Volver al menu</button></a>";
?>