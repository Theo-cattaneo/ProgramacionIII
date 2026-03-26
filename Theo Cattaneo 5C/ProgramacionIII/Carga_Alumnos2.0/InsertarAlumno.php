<?php
    include "receptor.php";

    $Apellido=$_POST[`Apellido`];
    $Nombre=$_POST[`Nombre`];
    $Documento=$_POST[`Documento`];
    $FechNac=$_POST[`FechNac`];
    $Genero=$_POST[`Genero`];
    $Civil=$_POST[`Civil`];
    $Telefono=$_POST[`Telefono`];
    $Mail=$_POST[`Mail`];
    $Calle=$_POST[`Calle`];
    $Numero=$_POST[`Numero`];
    $Piso=$_POST[`Piso`];
    $Depto=$_POST[`Depto`];
    $Edificio=$_POST[`Edificio`];
    $Barrio=$_POST[`Barrio`];
    

    $Query="INSERT INTO `idalumnos`('0`, `Apellido_Alumnos`,
    `Nombre_Alumnos`, `DNI_Alumnos`, `FechNac_Alumnos`,
    `GENERO_ALUMNOS`, `Telefono`, `Mail_Alumnos`,
    `Calle_Alumnos`, `Numero_Alumnos`, `Piso_Alumnos`,
    `Depto_Alumnos`, `Edificio_Alumnos`,
    `BARRIO_ALUMNO`, `CIVIL_ALUMNO`) VALUES
    ('0','$Apellido','$Nombre','$DNI','$FechNac','$Genero',
    '$Telefono','$Mail','$Calle','$Numero','$Piso','$Depto',
    '$Edificio','$Barrio','$Civil')";
    
    echo $Query

    $Resultado=mysqli_query($conexion,$Query);
    if ($Resultado)
    {

      echo "se guardo correctamente";


    }

    else 
    {

      echo "Error al guardar los datos";

    }

?>