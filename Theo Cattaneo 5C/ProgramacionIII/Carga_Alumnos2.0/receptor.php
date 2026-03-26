<?php

   
    $SERVER="127.0.0.1";
    $Usuario="root";
    $pass="";
    $Base="ipetyn246";
    #me conecto a la Base de datos
    $conexion=mysqli_connect($SERVER,$Usuario,$pass,$Base);
    #creo la Query a enviar al motor de la BDD

    $Query="INSERT INTO idalumnos('0`, Apellido_Alumnos,
    Nombre_Alumnos, DNI_Alumnos, FechNac_Alumnos,
    GENERO_ALUMNOS, Telefono, Mail_Alumnos,
    Calle_Alumnos,Numero_Alumnos, Piso_Alumnos,
    Depto_Alumnos, Edificio_Alumnos,
    BARRIO_ALUMNO, CIVIL_ALUMNO) VALUES
    ('0','$Apellido','$Nombre','$DNI','$FechNac','$Genero',
    '$Telefono','$Mail','$Calle','$Numero','$Piso','$Depto',
    '$Edificio','$Barrio','$Civil')";


    $Resultado=mysqli_Query($conexion,$Query);

    if ($Resultado)
        {

            echo " Los datos se guardaron";

        }
    else 
        {
            echo "Erro la carga";
        }
    mysqli_close($conexion);


?>