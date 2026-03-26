<?php

    include "Ipetym_conexion.php";
    $QueryGenero="select * from Genero order by 2 ";
    $resultadoGenero= mysqli_query($conexion,$QueryGenero);

    $QueryBarrio="select * from BARRIO order by 2";
    $resultadoBarrio= mysqli_query($conexion,$QueryBarrio);

    $QueryCivil="select * from CIVIL order by 2";
    $resultadoCivil= mysqli_query($conexion,$QueryCivil);


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
  
    <form method="post" action="InsertarAlumno.php">
        <!-- fieldset encuadra lo que esta adentro-->
        <fieldset>
            <!--le pone un titulo al cuadro-->
            <legend> Ddatos Alumno</legend>


            <label>Apellido </label>
            <input type="text" name="Apellido" maxleng="30">

            <label>Nombre </label>
            <input type="text" name="Nombre" maxleng="30">
            <br>
            <br>

            <label>Documento </label>
            <input type="text" name="DNI" maxleng="8">


            <label>Fecha de Nacimiento </label>
            <input type="date" name="FechNac">

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


            <label>Estadi civil</label>
            <select name="Civil">
                <?php
                    $fila=mysqli_num_rows($resultadoCivil);
                    
                    if ($fila > 0)
                    {
                        while ($registroCivil= mysqli_fetch_array ($resultadoCivil))
                        {
                             echo '<option value="'.$registroCivil[0].'">'.$registroCivil[1].'</option>';
                           
                        }

        
                    }
                    else
                    {

                        echo '<option>Sin datos</optin>';
                    }

                
                ?>
            </select>
            
            

        </fieldset>
            <br>
            <br>
    
        <fieldset>
            <legend> Medio de comunicacion</legend>

            <label>Telefono</label>
            <input type="text" name="Telefono" maxleng="10">
            <label>Mail</label>
            <input type="text" name="Mail" maxleng="50">
            <br>
            <br>

        </fieldset>


        <fieldset>
            <legend>Direccion Alumno </legend>

            <label>Calle</label>
            <input type="text" name="Calle">

            <label>Numero</label>
            <input type="text" name= "Numero" >
            <br>
            <br>
            <label>Piso</label>
            <input type="text" name="Piso" maxleng="2">

            <label>Depto</label>
            <input type="text" name="Depto">

            <br>
            <br>

            <label>Edificio</label>
            <input type="text" name="Edificio">


            <label>Barrio</label>
            <select name="Barrio">
                <?php
                    $fila=mysqli_num_rows($resultadoBarrio);
                    
                    if ($fila > 0)
                    {
                        while ($registroBarrio= mysqli_fetch_array ($resultadoBarrio))
                        {
                             echo '<option value="'.$registroBarrio[0].'">'.$registroBarrio[1].'</option>';
                           
                        }

        
                    }
                    else
                    {

                        echo '<option>Sin datos</optin>';
                    }

                
                ?>




            </select>

        </fieldset>
   

        <br>
        <br>
        <input type="submit" value="enviar">
        <input type="reset" value="cancelar">

    </form>
<?php
    mysqli_close($conexion);

?>
</body>



</html>