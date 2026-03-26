<?php

    include "Ipetym_conexion.php";
    $QueryGenero="select * from Genero order by 2 ";
    $resultadoGenero= mysqli_query($conexion,$QueryGenero);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carga Formulario Alumno</title>
</head>
<body>
  
    <form>
        <fieldset>
            <legend> Datos personales </legend>


            <label>Apellido </label>
            <input type="text" name="Apellido" maxleng="30">

            <br>
            <br>

            <label>Nombre </label>
            <input type="text" name="Nombre" maxleng="30">
            <br>
            <br>

            <label>Documento </label>
            <input type="text" name="Documento" maxleng="8">

            <br>
            <br>

            <label>Fecha de Nacimiento </label>
            <input type="date" name="FNac">

            <br>
            <br>
            
            <label>Genero </label>
            <select name="Genero">
                
                <!-- comentarios en HTML-->
                <!-- Abro PHP para cargar el selec-->
                <?php
                    #En la variable fila guardo la cantidad de filas que tiene el array
                    $filas= mysqli_num_rows($resultadoGenero);
                    #Pregunto si la cantidad de filas del arrays es mayor a 0
                    if ($filas > 0)
                        {
                        #Recorro el array hasta que el valor de la filas sea null
                            while ($registroGenero= mysqli_fetch_array($resultadoGenero))
                            {
                                echo '<option value="'.$registroGenero[0].'">'.$registroGenero[1].'</option>';

                            }

                        
                        }
                        else
                        {
                            echo '<option> sin datos</option>';
                        }

                ?>
            </select>
            <br>
            <br>
            <label>Telefono </label>
            <input type="text" name="Telefono" maxleng="20">

            <br>
            <br>

            <label>Mail Alumno </label>
            <input type="text" name="Mail" maxleng="50">

            <br>
            <br>

            <label>Calle </label>
            <input type="text" name="calle" maxleng="30">

            <br>
            <br>
            <label>Numero </label>
            <input type="text" name="Numero" maxleng="10">

            <br>
            <br>
            <label>Piso</label>
            <input type="text" name="Piso" maxleng="3">

            <br>
            <br>
            <label>Depto </label>
            <input type="text" name="Depto" maxleng="30">

            <br>
            <br>
            <label>Edificio </label>
            <input type="text" name="Edificio" maxleng="30">

            <br>
            <br>
            
            

        </fieldset>
            


    </form>

</body>



</html>