<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
</head>
<body>

<?php
//$ID=$_GET('ID');

include "Ipetym_conexion.php";

$Query= "SELECT * from barrios,zonas where id_zona=BARRIO_ZONAS order by 2";

$Resultado= mysqli_Query($conexion, $Query);

if (isset($_POST ["submit"])) {
    $ID= $_POST ['ID'];
    $ID= $_POST ['Nombre'];
    $ID= $_POST ['Zona'];

    $Query= "UPDATE 'barrios' SET 'Nombre_barrio' = '$Nombre', ";
    $Resultado= mysqli_Query($conexion, $Query) or die("error al cargar dato".mysql_error());
    echo "Modificacion Exitosa ";
}
else {
    $ID=$_GET['ID'];
    $Query="SELECT * from barrios,zonas where Id_zonas=ZONAS_BARRIOS and Id_barrios='$ID' ";
    $Resultado= mysqli_Query($conexion, $Query) or die ("error al cargar datos".misql_error() );
    if (mysqli_num_rows(Resultado)>0) {
        while ($Registro) {
        ?>


        <form class="form1" method="POST" action="ModificarBarrio.php">
            <h4 style="font-size: 25px;" > Modificar los datos</h4>
            <label> ID </label>
            <input class="form1" type="int" name="ID" value=" <?php echo $Registro[0]: ?>">
            <br>
            <label> Nombre Barrio </label>
            <input class="input1" type="int" name="Nombre" placeholder="Nombre" value=" <?php echo $Registro[1]: ?>">
            <br>

            <label> Zona </label>
            <input class="input1" type="int" name="Nombre" placeholder="Nombre" value=" <?php echo $Registro[3]: ?>">
            <br>
            <br>
            <input class="botones" type="submit" name="submit" value="guardar cambios">
            <input class="botones" type="reset" name="Cancelar" >

                

        </form>
<?php
          
        }
    }
}
mysqli_close($conexion);

?>

</body>

</html>
