<?php
/* ============================================================
   SISTEMA IPETyM 246 - TODO EN UN ARCHIVO
   Secciones: inicio, alumnos, profesores, y las 8 tablas:
   barrios, zonas, civil, generos, cursos, materias,
   especialidades y aulas.
   ============================================================ */

include 'conexion.php';

/* ------------------------------------------------------------
   1) CONFIGURACION DE LAS 8 TABLAS SIMPLES
   "padre" = otra tabla de la que depende (ej: barrio -> zona)
   "extra" = un campo adicional (ej: aula -> capacidad)
   Si una tabla no tiene padre o extra, no se pone esa linea.
   ------------------------------------------------------------ */
 $config = array(

    "barrios" => array(
        "titulo" => "Barrios", "tabla" => "barrios", "id" => "ID_Barrios",
        "nombre" => "Nombre_Barrios", "etiqueta" => "Nombre del barrio",
        "padre_tabla" => "zonas", "padre_id" => "ID_Zonas",
        "padre_nombre" => "Nombre_Zonas", "padre_campo" => "ID_Zonasb",
        "padre_etiqueta" => "Zona"
    ),

    "zonas" => array(
        "titulo" => "Zonas", "tabla" => "zonas", "id" => "ID_Zonas",
        "nombre" => "Nombre_Zonas", "etiqueta" => "Nombre de la zona"
    ),

    "civil" => array(
        "titulo" => "Estado Civil", "tabla" => "civil", "id" => "ID_Civil",
        "nombre" => "Estado_Civil", "etiqueta" => "Estado civil"
    ),

    "generos" => array(
        "titulo" => "Generos", "tabla" => "generos", "id" => "ID_Generos",
        "nombre" => "Nombre_Generos", "etiqueta" => "Nombre del genero"
    ),

    "cursos" => array(
        "titulo" => "Cursos", "tabla" => "cursos", "id" => "ID_Cursos",
        "nombre" => "Nombre_Cursos", "etiqueta" => "Nombre del curso"
    ),

    "materias" => array(
        "titulo" => "Materias", "tabla" => "materias", "id" => "ID_Materias",
        "nombre" => "Nombre_Materias", "etiqueta" => "Nombre de la materia",
        "padre_tabla" => "especialidad", "padre_id" => "ID_Especialidad",
        "padre_nombre" => "Nombre_especialidad", "padre_campo" => "CODIGO_MATERIAS",
        "padre_etiqueta" => "Especialidad"
    ),

    "especialidades" => array(
        "titulo" => "Especialidades", "tabla" => "especialidad", "id" => "ID_Especialidad",
        "nombre" => "Nombre_especialidad", "etiqueta" => "Nombre de la especialidad",
        "extra_campo" => "Codigo_Especialidad", "extra_tipo" => "text",
        "extra_etiqueta" => "Codigo (una letra)"
    ),

    "aulas" => array(
        "titulo" => "Aulas", "tabla" => "aulas", "id" => "ID_Aulas",
        "nombre" => "Numero_Aulas", "etiqueta" => "Numero de aula",
        "padre_tabla" => "tipos_aulas", "padre_id" => "ID_Tipos",
        "padre_nombre" => "Nombre_Tipo_Aula", "padre_campo" => "TIPOS_AULAS",
        "padre_etiqueta" => "Tipo de aula",
        "extra_campo" => "Capacidad_Aulas", "extra_tipo" => "number",
        "extra_etiqueta" => "Capacidad"
    )
);

/* que seccion estoy mostrando (inicio por defecto) */
 $seccion = isset($_GET['seccion']) ? $_GET['seccion'] : "inicio";

 $aviso = "";
 $fila = null;
 $editando = false;

/* ------------------------------------------------------------
   Funcion para dibujar un <select> lleno con datos de una tabla
   ------------------------------------------------------------ */
function dibujarSelect($conexion, $name, $etiqueta, $sql, $campoId, $campoNombre, $seleccionado) {
    echo "<label>$etiqueta</label>";
    echo "<select name='$name'>";
    echo "<option value='0'>-- Seleccione --</option>";
    $res = mysqli_query($conexion, $sql);
    while ($r = mysqli_fetch_assoc($res)) {
        $marca = "";
        if ($seleccionado == $r[$campoId]) { $marca = "selected"; }
        echo "<option value='" . $r[$campoId] . "' $marca>" . $r[$campoNombre] . "</option>";
    }
    echo "</select>";
}

/* ------------------------------------------------------------
   2) ACCIONES DE LAS 8 TABLAS SIMPLES (agregar/modificar/borrar)
   ------------------------------------------------------------ */
if (isset($config[$seccion])) {
    $c = $config[$seccion];
    $hay_padre = isset($c['padre_tabla']);
    $hay_extra = isset($c['extra_campo']);

    // BORRAR
    if (isset($_GET['borrar'])) {
        $idv = intval($_GET['borrar']);
        mysqli_query($conexion, "DELETE FROM {$c['tabla']} WHERE {$c['id']} = $idv");
        $aviso = "Se borro el registro";
    }

    // GUARDAR CAMBIOS (modificar)
    if (isset($_POST['guardar'])) {
        $idv = intval($_POST['id']);
        $nombrev = mysqli_real_escape_string($conexion, $_POST['nombre']);

        $sql = "UPDATE {$c['tabla']} SET {$c['nombre']} = '$nombrev'";
        if ($hay_padre) {
            $sql .= ", {$c['padre_campo']} = " . intval($_POST['padre']);
        }
        if ($hay_extra) {
            if ($c['extra_tipo'] == "number") {
                $sql .= ", {$c['extra_campo']} = " . intval($_POST['extra']);
            } else {
                $sql .= ", {$c['extra_campo']} = '" . mysqli_real_escape_string($conexion, $_POST['extra']) . "'";
            }
        }
        $sql .= " WHERE {$c['id']} = $idv";

        if (mysqli_query($conexion, $sql)) {
            $aviso = "Se modifico el registro";
        } else {
            $aviso = "Error: " . mysqli_error($conexion);
        }
    }

    // AGREGAR
    if (isset($_POST['agregar'])) {
        $campos  = $c['nombre'];
        $valores = "'" . mysqli_real_escape_string($conexion, $_POST['nombre']) . "'";

        if ($hay_padre) {
            $campos  .= ", {$c['padre_campo']}";
            $valores .= ", " . intval($_POST['padre']);
        }
        if ($hay_extra) {
            $campos .= ", {$c['extra_campo']}";
            if ($c['extra_tipo'] == "number") {
                $valores .= ", " . intval($_POST['extra']);
            } else {
                $valores .= ", '" . mysqli_real_escape_string($conexion, $_POST['extra']) . "'";
            }
        }

        $sql = "INSERT INTO {$c['tabla']} ($campos) VALUES ($valores)";

        if (mysqli_query($conexion, $sql)) {
            $aviso = "Se agrego el registro";
        } else {
            $aviso = "Error: " . mysqli_error($conexion);
        }
    }

    // si toque Modificar busco los datos para mostrarlos en el formulario
    if (isset($_GET['modificar'])) {
        $idv = intval($_GET['modificar']);
        $res = mysqli_query($conexion, "SELECT * FROM {$c['tabla']} WHERE {$c['id']} = $idv");
        $fila = mysqli_fetch_assoc($res);
    }
    $editando = ($fila != null);
}

/* ------------------------------------------------------------
   3) ACCIONES DE ALUMNOS Y PROFESORES
   Las dos tablas son casi iguales, solo cambian los nombres
   de las columnas. Uso la variable $sufijo para no repetir
   todo el codigo dos veces.
   ------------------------------------------------------------ */
if ($seccion == "alumnos" || $seccion == "profesores") {

    if ($seccion == "alumnos") {
        $tabla = "alumnos";
        $idc = "Id_Alumnos";
        $sufijo = "_Alumnos";
        $campoGenero = "GENEROS_ALUMNOS";
        $tituloPersona = "alumno";
    } else {
        $tabla = "profesores";
        $idc = "Id_Profesores";
        $sufijo = "_Profesores";
        $campoGenero = "GENERO_PROFESORES";
        $tituloPersona = "profesor";
    }

    // BORRAR
    if (isset($_GET['borrar'])) {
        $idv = intval($_GET['borrar']);
        mysqli_query($conexion, "DELETE FROM $tabla WHERE $idc = $idv");
        $aviso = "Se borro el $tituloPersona";
    }

    // AGREGAR o GUARDAR CAMBIOS (los dos usan los mismos campos)
    if (isset($_POST['agregar']) || isset($_POST['guardar'])) {

        $apellido = mysqli_real_escape_string($conexion, $_POST['apellido']);
        $nombre   = mysqli_real_escape_string($conexion, $_POST['nombre']);
        $documento = intval($_POST['documento']);
        $fecha    = $_POST['fecha'];
        $genero   = intval($_POST['genero']);
        $telefono = intval($_POST['telefono']);
        $mail     = mysqli_real_escape_string($conexion, $_POST['mail']);
        $calle    = mysqli_real_escape_string($conexion, $_POST['calle']);
        $numero   = intval($_POST['numero']);
        $piso     = mysqli_real_escape_string($conexion, $_POST['piso']);
        $depto    = mysqli_real_escape_string($conexion, $_POST['depto']);
        $edificio = mysqli_real_escape_string($conexion, $_POST['edificio']);
        $barrio   = intval($_POST['barrio']);
        $civil    = intval($_POST['civil']);
        $curso    = intval($_POST['curso']);
        $aula     = intval($_POST['aula']);
        $especialidad = intval($_POST['especialidad']);

        if (isset($_POST['agregar'])) {
            $sql = "INSERT INTO $tabla
                (Apellido$sufijo, Nombre$sufijo, Documento$sufijo, FecNac$sufijo,
                $campoGenero, Telefono$sufijo, Mail$sufijo, Calle$sufijo, Numero$sufijo,
                Piso$sufijo, Depto$sufijo, Edificio$sufijo,
                BARRIOS$sufijo, CIVIL$sufijo, CURSOS$sufijo, AULAS$sufijo, ESPECIALIDAD$sufijo)
                VALUES
                ('$apellido', '$nombre', $documento, '$fecha', $genero, $telefono, '$mail', '$calle',
                $numero, '$piso', '$depto', '$edificio', $barrio, $civil, $curso, $aula, $especialidad)";
        } else {
            $idv = intval($_POST['id']);
            $sql = "UPDATE $tabla SET
                Apellido$sufijo = '$apellido',
                Nombre$sufijo = '$nombre',
                Documento$sufijo = $documento,
                FecNac$sufijo = '$fecha',
                $campoGenero = $genero,
                Telefono$sufijo = $telefono,
                Mail$sufijo = '$mail',
                Calle$sufijo = '$calle',
                Numero$sufijo = $numero,
                Piso$sufijo = '$piso',
                Depto$sufijo = '$depto',
                Edificio$sufijo = '$edificio',
                BARRIOS$sufijo = $barrio,
                CIVIL$sufijo = $civil,
                CURSOS$sufijo = $curso,
                AULAS$sufijo = $aula,
                ESPECIALIDAD$sufijo = $especialidad
                WHERE $idc = $idv";
        }

        if (mysqli_query($conexion, $sql)) {
            $aviso = "Se guardo el $tituloPersona correctamente";
        } else {
            $aviso = "Error: " . mysqli_error($conexion);
        }
    }

    // si toque Modificar busco los datos (con nombres comunes usando AS)
    if (isset($_GET['modificar'])) {
        $idv = intval($_GET['modificar']);
        $res = mysqli_query($conexion, "SELECT $idc AS idp,
            Apellido$sufijo AS apellido, Nombre$sufijo AS nombre,
            Documento$sufijo AS documento, FecNac$sufijo AS fecha,
            $campoGenero AS genero, Telefono$sufijo AS telefono,
            Mail$sufijo AS mail, Calle$sufijo AS calle, Numero$sufijo AS numero,
            Piso$sufijo AS piso, Depto$sufijo AS depto, Edificio$sufijo AS edificio,
            BARRIOS$sufijo AS barrio, CIVIL$sufijo AS civil, CURSOS$sufijo AS curso,
            AULAS$sufijo AS aula, ESPECIALIDAD$sufijo AS especialidad
            FROM $tabla WHERE $idc = $idv");
        $fila = mysqli_fetch_assoc($res);
    }
    $editando = ($fila != null);
}

/* titulo de la pagina segun la seccion */
 $tituloPagina = "Sistema de Gestion";
if ($seccion == "alumnos") $tituloPagina = "Alumnos";
if ($seccion == "profesores") $tituloPagina = "Profesores";
if (isset($config[$seccion])) $tituloPagina = $config[$seccion]['titulo'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $tituloPagina; ?> - Sistema de Gestion</title>
    <!-- los estilos van aca adentro para usar un solo archivo -->
    <style>
    body { font-family: Arial, sans-serif; background: #eceff1; margin: 0; }
    .encabezado { background: #2c3e50; }
    .titulo {
        color: #fff; font-size: 22px; font-weight: bold;
        text-decoration: none; padding: 14px 20px; display: inline-block;
    }
    .menu { list-style: none; margin: 0; padding: 0; display: flex; flex-wrap: wrap; }
    .item { position: relative; }
    .enlace { display: block; color: #fff; text-decoration: none; padding: 14px 16px; }
    .enlace:hover { background: #34495e; }
    .flecha { font-size: 10px; }
    .submenu {
        display: none; position: absolute; list-style: none;
        margin: 0; padding: 0; background: #fff; min-width: 160px; z-index: 10;
    }
    .con-submenu:hover .submenu { display: block; }
    .submenu a { display: block; color: #333; text-decoration: none; padding: 10px 12px; }
    .submenu a:hover { background: #dce6ef; }
    .contenido { padding: 20px; }
    .tabla { border-collapse: collapse; width: 100%; background: #fff; margin: 10px 0 25px; }
    .tabla th { background: #2c3e50; color: #fff; }
    .tabla th, .tabla td { border: 1px solid #ccc; padding: 6px 10px; text-align: left; font-size: 14px; }
    .formulario { background: #fff; padding: 15px; max-width: 500px; margin-bottom: 25px; }
    .formulario label { display: block; margin-top: 10px; font-weight: bold; font-size: 13px; }
    .formulario input, .formulario select { width: 100%; padding: 6px; margin-top: 3px; }
    .boton {
        padding: 8px 14px; border: none; color: #fff; cursor: pointer;
        text-decoration: none; font-size: 13px; display: inline-block; margin: 2px;
    }
    .boton-verde { background: #27ae60; }
    .boton-azul { background: #2980b9; }
    .boton-rojo { background: #c0392b; }
    .boton-gris { background: #7f8c8d; }
    .aviso { background: #d4efdf; color: #1e8449; padding: 10px; margin: 10px 0; }
    .error { background: #fadbd8; color: #922b21; padding: 10px; margin: 10px 0; }
    </style>
</head>
<body>

    <!-- Encabezado principal de la pagina -->
    <div class="encabezado">
        <div class="barra">
            <!-- Nombre del sistema o logo -->
            <a href="index.php?seccion=inicio" class="titulo">Sistema Web</a>

            <!-- Menu principal de navegacion -->
            <ul class="menu">
                <li class="item">
                    <a href="index.php?seccion=inicio" class="enlace">Inicio</a>
                </li>

                <!-- Opciones de Alumnos -->
                <li class="item con-submenu">
                    <a href="index.php?seccion=alumnos" class="enlace">Alumnos <span class="flecha">&#9662;</span></a>
                    <ul class="submenu">
                        <li><a href="index.php?seccion=alumnos">Alta</a></li>
                        <li><a href="index.php?seccion=alumnos">Consultar</a></li>
                        <li><a href="index.php?seccion=alumnos">Modificar</a></li>
                        <li><a href="index.php?seccion=alumnos">Baja</a></li>
                    </ul>
                </li>

                <!-- Opciones de Profesores -->
                <li class="item con-submenu">
                    <a href="index.php?seccion=profesores" class="enlace">Profesores <span class="flecha">&#9662;</span></a>
                    <ul class="submenu">
                        <li><a href="index.php?seccion=profesores">Alta</a></li>
                        <li><a href="index.php?seccion=profesores">Consultar</a></li>
                        <li><a href="index.php?seccion=profesores">Modificar</a></li>
                        <li><a href="index.php?seccion=profesores">Baja</a></li>
                    </ul>
                </li>

                <!-- Opciones de Materias -->
                <li class="item con-submenu">
                    <a href="index.php?seccion=materias" class="enlace">Materias <span class="flecha">&#9662;</span></a>
                    <ul class="submenu">
                        <li><a href="index.php?seccion=materias">Alta</a></li>
                        <li><a href="index.php?seccion=materias">Consultar</a></li>
                        <li><a href="index.php?seccion=materias">Modificar</a></li>
                        <li><a href="index.php?seccion=materias">Baja</a></li>
                    </ul>
                </li>

                <!-- Opciones de Barrios -->
                <li class="item con-submenu">
                    <a href="index.php?seccion=barrios" class="enlace">Barrios <span class="flecha">&#9662;</span></a>
                    <ul class="submenu">
                        <li><a href="index.php?seccion=barrios">Alta</a></li>
                        <li><a href="index.php?seccion=barrios">Consultar</a></li>
                        <li><a href="index.php?seccion=barrios">Modificar</a></li>
                        <li><a href="index.php?seccion=barrios">Baja</a></li>
                    </ul>
                </li>

                <!-- Opciones de Zonas -->
                <li class="item con-submenu">
                    <a href="index.php?seccion=zonas" class="enlace">Zonas <span class="flecha">&#9662;</span></a>
                    <ul class="submenu">
                        <li><a href="index.php?seccion=zonas">Alta</a></li>
                        <li><a href="index.php?seccion=zonas">Consultar</a></li>
                        <li><a href="index.php?seccion=zonas">Modificar</a></li>
                        <li><a href="index.php?seccion=zonas">Baja</a></li>
                    </ul>
                </li>

                <!-- Opciones de Civil -->
                <li class="item con-submenu">
                    <a href="index.php?seccion=civil" class="enlace">Civil <span class="flecha">&#9662;</span></a>
                    <ul class="submenu">
                        <li><a href="index.php?seccion=civil">Alta</a></li>
                        <li><a href="index.php?seccion=civil">Consultar</a></li>
                        <li><a href="index.php?seccion=civil">Modificar</a></li>
                        <li><a href="index.php?seccion=civil">Baja</a></li>
                    </ul>
                </li>

                <!-- Opciones de Generos -->
                <li class="item con-submenu">
                    <a href="index.php?seccion=generos" class="enlace">Generos <span class="flecha">&#9662;</span></a>
                    <ul class="submenu">
                        <li><a href="index.php?seccion=generos">Alta</a></li>
                        <li><a href="index.php?seccion=generos">Consultar</a></li>
                        <li><a href="index.php?seccion=generos">Modificar</a></li>
                        <li><a href="index.php?seccion=generos">Baja</a></li>
                    </ul>
                </li>

                <!-- Opciones de Aulas -->
                <li class="item con-submenu">
                    <a href="index.php?seccion=aulas" class="enlace">Aulas <span class="flecha">&#9662;</span></a>
                    <ul class="submenu">
                        <li><a href="index.php?seccion=aulas">Alta</a></li>
                        <li><a href="index.php?seccion=aulas">Consultar</a></li>
                        <li><a href="index.php?seccion=aulas">Modificar</a></li>
                        <li><a href="index.php?seccion=aulas">Baja</a></li>
                    </ul>
                </li>

                <!-- Opciones de Cursos -->
                <li class="item con-submenu">
                    <a href="index.php?seccion=cursos" class="enlace">Cursos <span class="flecha">&#9662;</span></a>
                    <ul class="submenu">
                        <li><a href="index.php?seccion=cursos">Alta</a></li>
                        <li><a href="index.php?seccion=cursos">Consultar</a></li>
                        <li><a href="index.php?seccion=cursos">Modificar</a></li>
                        <li><a href="index.php?seccion=cursos">Baja</a></li>
                    </ul>
                </li>

                <!-- Opciones de Especialidades -->
                <li class="item con-submenu">
                    <a href="index.php?seccion=especialidades" class="enlace">Especialidades <span class="flecha">&#9662;</span></a>
                    <ul class="submenu">
                        <li><a href="index.php?seccion=especialidades">Alta</a></li>
                        <li><a href="index.php?seccion=especialidades">Consultar</a></li>
                        <li><a href="index.php?seccion=especialidades">Modificar</a></li>
                        <li><a href="index.php?seccion=especialidades">Baja</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!-- Contenido central de la pagina -->
    <div class="contenido">

    <?php if ($seccion == "inicio") { ?>

        <h1>Panel de Control</h1>
        <p>Seleccione una opci&oacute;n del men&uacute; para comenzar a trabajar.</p>
        <p>
            <a class="boton boton-azul" href="index.php?seccion=alumnos">Alumnos</a>
            <a class="boton boton-azul" href="index.php?seccion=profesores">Profesores</a>
            <a class="boton boton-verde" href="index.php?seccion=barrios">Barrios</a>
            <a class="boton boton-verde" href="index.php?seccion=zonas">Zonas</a>
            <a class="boton boton-verde" href="index.php?seccion=materias">Materias</a>
            <a class="boton boton-verde" href="index.php?seccion=civil">Civil</a>
            <a class="boton boton-verde" href="index.php?seccion=generos">Generos</a>
            <a class="boton boton-verde" href="index.php?seccion=aulas">Aulas</a>
            <a class="boton boton-verde" href="index.php?seccion=cursos">Cursos</a>
            <a class="boton boton-verde" href="index.php?seccion=especialidades">Especialidades</a>
        </p>

    <?php } elseif ($seccion == "alumnos" || $seccion == "profesores") { ?>

        <h1><?php echo ucfirst($tituloPersona); ?>s</h1>

        <?php
        if ($aviso != "") { echo "<div class='aviso'>$aviso</div>"; }
        ?>

        <!-- ============ LISTADO ============ -->
        <table class="tabla">
            <tr><th>ID</th><th>Apellido</th><th>Nombre</th><th>Documento</th><th>Curso</th><th>Acciones</th></tr>
            <?php
            $consulta = mysqli_query($conexion,
                "SELECT t.$idc AS idp, t.Apellido$sufijo AS apellido, t.Nombre$sufijo AS nombre,
                        t.Documento$sufijo AS documento, cursos.Nombre_Cursos AS curso
                 FROM $tabla t
                 LEFT JOIN cursos ON cursos.ID_Cursos = t.CURSOS$sufijo
                 ORDER BY t.Apellido$sufijo");
            while ($per = mysqli_fetch_assoc($consulta)) {
            ?>
            <tr>
                <td><?php echo $per['idp']; ?></td>
                <td><?php echo $per['apellido']; ?></td>
                <td><?php echo $per['nombre']; ?></td>
                <td><?php echo $per['documento']; ?></td>
                <td><?php echo $per['curso'] != null ? $per['curso'] : "-"; ?></td>
                <td>
                    <a class="boton boton-azul"
                       href="index.php?seccion=<?php echo $seccion; ?>&modificar=<?php echo $per['idp']; ?>">Modificar</a>
                    <a class="boton boton-rojo"
                       href="index.php?seccion=<?php echo $seccion; ?>&borrar=<?php echo $per['idp']; ?>"
                       onclick="return confirm('¿Seguro que queres borrar este <?php echo $tituloPersona; ?>?')">Borrar</a>
                </td>
            </tr>
            <?php } ?>
        </table>

        <!-- ============ FORMULARIO (alta y modificar) ============ -->
        <form method="post" class="formulario">
            <?php if ($editando) { ?>
                <h2>Modificar <?php echo $tituloPersona; ?></h2>
                <input type="hidden" name="id" value="<?php echo $fila['idp']; ?>">
            <?php } else { ?>
                <h2>Nuevo <?php echo $tituloPersona; ?></h2>
            <?php } ?>

            <label>Apellido</label>
            <input type="text" name="apellido" maxlength="30"
                   value="<?php if ($editando) echo $fila['apellido']; ?>" required>

            <label>Nombre</label>
            <input type="text" name="nombre" maxlength="30"
                   value="<?php if ($editando) echo $fila['nombre']; ?>" required>

            <label>Documento (hasta 8 numeros)</label>
            <input type="number" name="documento"
                   value="<?php if ($editando) echo $fila['documento']; ?>" required>

            <label>Fecha de nacimiento</label>
            <input type="date" name="fecha"
                   value="<?php if ($editando) echo $fila['fecha']; ?>" required>

            <?php dibujarSelect($conexion, "genero", "Genero",
                "SELECT * FROM generos", "ID_Generos", "Nombre_Generos",
                $editando ? $fila['genero'] : 0); ?>

            <label>Telefono</label>
            <input type="number" name="telefono"
                   value="<?php if ($editando) echo $fila['telefono']; ?>">

            <label>Mail</label>
            <input type="email" name="mail" maxlength="50"
                   value="<?php if ($editando) echo $fila['mail']; ?>">

            <label>Calle</label>
            <input type="text" name="calle" maxlength="30"
                   value="<?php if ($editando) echo $fila['calle']; ?>">

            <label>Numero</label>
            <input type="number" name="numero"
                   value="<?php if ($editando) echo $fila['numero']; ?>">

            <label>Piso</label>
            <input type="text" name="piso" maxlength="3"
                   value="<?php if ($editando) echo $fila['piso']; ?>">

            <label>Depto</label>
            <input type="text" name="depto" maxlength="3"
                   value="<?php if ($editando) echo $fila['depto']; ?>">

            <label>Edificio</label>
            <input type="text" name="edificio" maxlength="30"
                   value="<?php if ($editando) echo $fila['edificio']; ?>">

            <?php dibujarSelect($conexion, "barrio", "Barrio",
                "SELECT * FROM barrios ORDER BY Nombre_Barrios", "ID_Barrios", "Nombre_Barrios",
                $editando ? $fila['barrio'] : 0); ?>

            <?php dibujarSelect($conexion, "civil", "Estado civil",
                "SELECT * FROM civil", "ID_Civil", "Estado_Civil",
                $editando ? $fila['civil'] : 0); ?>

            <?php dibujarSelect($conexion, "curso", "Curso",
                "SELECT * FROM cursos ORDER BY Nombre_Cursos", "ID_Cursos", "Nombre_Cursos",
                $editando ? $fila['curso'] : 0); ?>

            <?php dibujarSelect($conexion, "aula", "Aula",
                "SELECT * FROM aulas ORDER BY Numero_Aulas", "ID_Aulas", "Numero_Aulas",
                $editando ? $fila['aula'] : 0); ?>

            <?php dibujarSelect($conexion, "especialidad", "Especialidad",
                "SELECT * FROM especialidad ORDER BY Nombre_especialidad", "ID_Especialidad", "Nombre_especialidad",
                $editando ? $fila['especialidad'] : 0); ?>

            <br><br>
            <?php if ($editando) { ?>
                <button class="boton boton-verde" name="guardar">Guardar cambios</button>
                <a class="boton boton-gris" href="index.php?seccion=<?php echo $seccion; ?>">Cancelar</a>
            <?php } else { ?>
                <button class="boton boton-verde" name="agregar">Agregar</button>
            <?php } ?>
        </form>

    <?php } elseif (isset($config[$seccion])) { ?>

        <h1><?php echo $c['titulo']; ?></h1>

        <?php
        if ($aviso != "") { echo "<div class='aviso'>$aviso</div>"; }
        ?>

        <!-- ============ FORMULARIO (alta y modificar) ============ -->
        <form method="post" class="formulario">
            <?php if ($editando) { ?>
                <h2>Modificar registro</h2>
                <input type="hidden" name="id" value="<?php echo $fila[$c['id']]; ?>">
            <?php } else { ?>
                <h2>Nuevo registro</h2>
            <?php } ?>

            <label><?php echo $c['etiqueta']; ?></label>
            <input type="text" name="nombre"
                   value="<?php if ($editando) echo $fila[$c['nombre']]; ?>" required>

            <?php if ($hay_padre) { ?>
                <label><?php echo $c['padre_etiqueta']; ?></label>
                <select name="padre">
                    <option value="0">-- Seleccione --</option>
                    <?php
                    $res = mysqli_query($conexion,
                        "SELECT {$c['padre_id']} AS idp, {$c['padre_nombre']} AS nombrep
                         FROM {$c['padre_tabla']} ORDER BY nombrep");
                    while ($p = mysqli_fetch_assoc($res)) {
                        $marca = "";
                        if ($editando && $fila[$c['padre_campo']] == $p['idp']) { $marca = "selected"; }
                        echo "<option value='" . $p['idp'] . "' $marca>" . $p['nombrep'] . "</option>";
                    }
                    ?>
                </select>
            <?php } ?>

            <?php if ($hay_extra) { ?>
                <label><?php echo $c['extra_etiqueta']; ?></label>
                <input type="<?php echo $c['extra_tipo']; ?>" name="extra"
                       value="<?php if ($editando) echo $fila[$c['extra_campo']]; ?>">
            <?php } ?>

            <br><br>
            <?php if ($editando) { ?>
                <button class="boton boton-verde" name="guardar">Guardar cambios</button>
                <a class="boton boton-gris" href="index.php?seccion=<?php echo $seccion; ?>">Cancelar</a>
            <?php } else { ?>
                <button class="boton boton-verde" name="agregar">Agregar</button>
            <?php } ?>
        </form>

        <!-- ============ LISTADO ============ -->
        <table class="tabla">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <?php if ($hay_padre) { echo "<th>{$c['padre_etiqueta']}</th>"; } ?>
                <?php if ($hay_extra) { echo "<th>{$c['extra_etiqueta']}</th>"; } ?>
                <th>Acciones</th>
            </tr>
            <?php
            // armo la consulta segun si la tabla tiene padre y/o extra
            $sql = "SELECT {$c['id']} AS id, {$c['nombre']} AS nombre";
            if ($hay_padre) {
                $sql .= ", (SELECT {$c['padre_nombre']} FROM {$c['padre_tabla']}
                            WHERE {$c['padre_tabla']}.{$c['padre_id']} = {$c['tabla']}.{$c['padre_campo']}) AS padre";
            }
            if ($hay_extra) {
                $sql .= ", {$c['extra_campo']} AS extra";
            }
            $sql .= " FROM {$c['tabla']} ORDER BY 2";

            $consulta = mysqli_query($conexion, $sql);
            while ($r = mysqli_fetch_assoc($consulta)) {
            ?>
            <tr>
                <td><?php echo $r['id']; ?></td>
                <td><?php echo $r['nombre']; ?></td>
                <?php if ($hay_padre) { echo "<td>" . ($r['padre'] != null ? $r['padre'] : "-") . "</td>"; } ?>
                <?php if ($hay_extra) { echo "<td>{$r['extra']}</td>"; } ?>
                <td>
                    <a class="boton boton-azul"
                       href="index.php?seccion=<?php echo $seccion; ?>&modificar=<?php echo $r['id']; ?>">Modificar</a>
                    <a class="boton boton-rojo"
                       href="index.php?seccion=<?php echo $seccion; ?>&borrar=<?php echo $r['id']; ?>"
                       onclick="return confirm('¿Seguro que queres borrar este registro?')">Borrar</a>
                </td>
            </tr>
            <?php } ?>
        </table>

    <?php } else { ?>

        <h1>Seccion no valida</h1>
        <a class="boton boton-gris" href="index.php?seccion=inicio">Volver al inicio</a>

    <?php } ?>

    </div>

</body>
</html>