-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2026 a las 01:14:23
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ipetym246`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `Id_Alumnos` int(11) NOT NULL,
  `Apellido_Alumnos` varchar(30) NOT NULL,
  `Nombre_Alumnos` varchar(30) NOT NULL,
  `Documento_Alumnos` int(8) NOT NULL,
  `FecNac_Alumnos` date NOT NULL,
  `GENEROS_ALUMNOS` int(11) NOT NULL,
  `Telefono_Alumnos` bigint(20) NOT NULL,
  `Mail_Alumnos` varchar(50) NOT NULL,
  `Calle_Alumnos` varchar(30) NOT NULL,
  `Numero_Alumnos` int(15) NOT NULL,
  `Piso_Alumnos` varchar(3) NOT NULL,
  `Depto_Alumnos` varchar(3) NOT NULL,
  `Edificio_Alumnos` varchar(30) NOT NULL,
  `BARRIOS_ALUMNOS` int(11) NOT NULL,
  `CIVIL_ALUMNOS` int(11) NOT NULL,
  `CURSOS_ALUMNOS` int(11) NOT NULL,
  `AULAS_ALUMNOS` int(11) NOT NULL,
  `ESPECIALIDAD_ALUMNOS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`Id_Alumnos`, `Apellido_Alumnos`, `Nombre_Alumnos`, `Documento_Alumnos`, `FecNac_Alumnos`, `GENEROS_ALUMNOS`, `Telefono_Alumnos`, `Mail_Alumnos`, `Calle_Alumnos`, `Numero_Alumnos`, `Piso_Alumnos`, `Depto_Alumnos`, `Edificio_Alumnos`, `BARRIOS_ALUMNOS`, `CIVIL_ALUMNOS`, `CURSOS_ALUMNOS`, `AULAS_ALUMNOS`, `ESPECIALIDAD_ALUMNOS`) VALUES
(1, 'Luna Perez', 'Gonzalo Pablo', 67231231, '2008-06-07', 1, 351543223, 'gonzaloperez@gmail.com', 'San Martin', 6767, '', '', '', 1, 0, 0, 0, 0),
(2, 'Cortez', 'Javier Jeremias', 44569341, '2008-06-10', 1, 351725626, 'javicortez@gmail.com', 'Rivadavia', 4563, '', '', '', 2, 0, 0, 0, 0),
(3, 'Paz', 'Nicolas', 47420710, '2007-07-26', 1, 351911086, 'nicolas.p@gmail.com', 'Los Robles', 1911, '', '', '', 3, 0, 0, 0, 0),
(4, 'Robledo', 'Micaela Brisa', 48246702, '2008-06-10', 2, 351233564, 'micaela_robledo@gmail.com', 'Defensa ', 4850, '', '', '', 4, 0, 0, 0, 0),
(5, 'Ramos Lopez', 'Lucia', 48246702, '2009-10-05', 2, 351672318, 'ramos_l@outlook.com', 'Arroyo de la Reduccion', 128, '', '', '', 2, 0, 0, 0, 0),
(6, 'Olariaga', 'Javier Nahuel', 49500520, '2009-05-04', 1, 351754460, 'javinahuolariaga@hotmail.com', 'San Juan', 1570, '2', 'B01', 'Edificio San Juan', 6, 0, 0, 0, 0),
(7, 'Gonzales', 'Micaela', 48654340, '2008-03-19', 2, 351640253, 'micagonzales08@gmail.com', 'Belgrano', 1342, '', '', '', 7, 0, 0, 0, 0),
(8, 'Aguirres', 'Ariana', 48976387, '2008-01-28', 2, 351776302, 'ariana11@gmail.com', 'Bogota', 1453, '', '', '', 5, 0, 0, 0, 0),
(11, 'Cortez', 'Lautaro', 48231704, '2008-11-21', 2, 3518452344, 'Earl123@gmail.com', 'Rio Negro', 1322, '', '', '', 1, 1, 0, 0, 0),
(12, 'Martinez', 'Luis', 48228102, '2009-02-12', 1, 3512237865, 'LuisMuertoXD@gmail.com', 'New City', 1233, '', '', '', 1, 1, 0, 0, 0),
(13, 'Soliente', 'Alejandra', 48577552, '2007-12-22', 2, 3517899642, 'AleSoliEnte@gmail.com', 'San Antonio', 291, '', '', '', 7, 2, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

CREATE TABLE `aulas` (
  `ID_Aulas` int(11) NOT NULL,
  `Numero_Aulas` varchar(100) NOT NULL,
  `TIPOS_AULAS` varchar(100) NOT NULL,
  `Capacidad_Aulas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`ID_Aulas`, `Numero_Aulas`, `TIPOS_AULAS`, `Capacidad_Aulas`) VALUES
(1, '101', '5', 0),
(2, '102', '1', 12),
(3, '103', '8', 30),
(4, '104', '7', 0),
(5, '105', '12', 0),
(6, '106', '4', 0),
(7, '107', '14', 0),
(8, '108', '13', 0),
(9, '109', '3', 25),
(10, '110', '3', 28),
(11, '111', '4', 0),
(12, '112', '3', 22),
(13, '113', '3', 20),
(14, '114', '1', 22),
(15, '115', '10', 24),
(16, '116', '9', 13),
(17, '117', '11', 13),
(18, '201', '3', 23),
(19, '202', '8', 37),
(20, '204', '4', 0),
(21, '205', '3', 28),
(22, '206', '3', 36),
(23, '207', '13', 22),
(24, '208', '13', 20),
(25, '209', '1', 20),
(26, '210', '2', 30),
(27, '211', '2', 18),
(28, '212', '2', 25),
(29, '213', '2', 32),
(30, '301', '3', 23),
(31, '302', '6', 25),
(32, '303', '4', 2),
(33, '304', '3', 20),
(34, '305', '3', 32),
(35, '306', '3', 34),
(36, '307', '3', 26),
(37, '308', '4', 2),
(38, '309', '3', 30),
(39, '310', '3', 30),
(40, '311', '3', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barrios`
--

CREATE TABLE `barrios` (
  `ID_Barrios` int(11) NOT NULL,
  `Nombre_Barrios` varchar(30) NOT NULL,
  `ID_Zonasb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `barrios`
--

INSERT INTO `barrios` (`ID_Barrios`, `Nombre_Barrios`, `ID_Zonasb`) VALUES
(1, 'Villa El Libertador', 3),
(2, 'comercial', 3),
(3, 'Guemes', 1),
(4, 'Alta Cordoba', 2),
(5, 'Nueva Italia', 5),
(6, 'San Roque', 4),
(7, 'Angeleli I', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capm`
--

CREATE TABLE `capm` (
  `ID_CAMP` int(11) NOT NULL,
  `CURSOS_AULAS` int(11) NOT NULL,
  `PROFE_MATERIAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `capm`
--

INSERT INTO `capm` (`ID_CAMP`, `CURSOS_AULAS`, `PROFE_MATERIAS`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 6),
(4, 3, 2),
(5, 3, 4),
(6, 3, 7),
(7, 5, 8),
(8, 5, 5),
(9, 5, 10),
(10, 6, 12),
(11, 6, 13),
(12, 6, 11),
(13, 1, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `civil`
--

CREATE TABLE `civil` (
  `ID_Civil` int(11) NOT NULL,
  `Estado_Civil` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `civil`
--

INSERT INTO `civil` (`ID_Civil`, `Estado_Civil`) VALUES
(1, 'Soltero'),
(2, 'Casado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `ID_Cursos` int(11) NOT NULL,
  `Nombre_Cursos` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`ID_Cursos`, `Nombre_Cursos`) VALUES
(1, '4C'),
(2, '5C'),
(3, '6C'),
(4, '7C'),
(5, '4D'),
(6, '5D'),
(7, '6D'),
(8, '7E'),
(9, '4B'),
(10, '5B'),
(11, '6B'),
(12, '4A'),
(13, '5A'),
(14, '6A'),
(15, '1A'),
(16, '1B'),
(17, '1C'),
(18, '2A'),
(19, '2B'),
(20, '2C'),
(21, '3A'),
(22, '3B'),
(23, '3C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_aulas`
--

CREATE TABLE `cursos_aulas` (
  `ID_Cursos_Aulas` int(11) NOT NULL,
  `CURSO_AULAS_AULAS` int(11) NOT NULL,
  `CURSO_AULAS_CURSO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `cursos_aulas`
--

INSERT INTO `cursos_aulas` (`ID_Cursos_Aulas`, `CURSO_AULAS_AULAS`, `CURSO_AULAS_CURSO`) VALUES
(1, 38, 1),
(2, 26, 1),
(3, 30, 2),
(4, 25, 2),
(5, 14, 3),
(6, 12, 4),
(7, 36, 5),
(8, 39, 6),
(9, 29, 6),
(10, 28, 7),
(11, 27, 8),
(12, 10, 12),
(13, 13, 13),
(14, 12, 14),
(15, 21, 15),
(16, 18, 16),
(17, 9, 17),
(18, 33, 18),
(19, 22, 19),
(20, 40, 20),
(21, 35, 21),
(22, 34, 22),
(23, 0, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `ID_Especialidad` int(11) NOT NULL,
  `Nombre_especialidad` varchar(100) NOT NULL,
  `Codigo_Especialidad` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`ID_Especialidad`, `Nombre_especialidad`, `Codigo_Especialidad`) VALUES
(1, 'Programacion', 'C'),
(2, 'Optica', 'D'),
(3, 'Economia y Gestion', 'B'),
(4, 'Artes', 'A'),
(5, 'Materias Basicas', 'O');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `ID_Generos` int(11) NOT NULL,
  `Nombre_Generos` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`ID_Generos`, `Nombre_Generos`) VALUES
(1, 'Masculino'),
(2, 'Femenino'),
(3, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `ID_Materias` int(11) NOT NULL,
  `Nombre_Materias` varchar(30) NOT NULL,
  `CODIGO_MATERIAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`ID_Materias`, `Nombre_Materias`, `CODIGO_MATERIAS`) VALUES
(1, 'Informatica Aplicada I', 1),
(2, 'Programacion I', 1),
(3, 'Logica Matematica', 1),
(4, 'Informatica Aplicada II', 1),
(5, 'Programacion II', 1),
(6, 'Sistemas de Informacion', 1),
(7, 'Base de Datos', 1),
(8, 'Programacion III', 1),
(9, 'Sistemas de Telecomunicaciones', 1),
(10, 'Ingles Tecnico', 1),
(11, 'Emprendimiento', 1),
(12, 'Higiene y Seguridad', 1),
(13, 'Base de Datos II', 1),
(14, 'Laboratorio de informatica', 1),
(15, 'Aplicacion de las Nuevas Tecno', 1),
(16, 'Marco juridico de las Activida', 1),
(17, 'Formacion de Ambiente de Traba', 1),
(18, 'Laboratorio de Optica I', 2),
(19, 'Lenguaje Italiano', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor-materias`
--

CREATE TABLE `profesor-materias` (
  `ID_Profesor_Materias` int(11) NOT NULL,
  `PROFESOR_Profesor_Materias` int(11) NOT NULL,
  `MATERIAS_Profesor_Materias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `profesor-materias`
--

INSERT INTO `profesor-materias` (`ID_Profesor_Materias`, `PROFESOR_Profesor_Materias`, `MATERIAS_Profesor_Materias`) VALUES
(1, 1, 1),
(2, 1, 4),
(3, 2, 2),
(4, 2, 5),
(5, 2, 8),
(6, 3, 3),
(7, 3, 6),
(8, 4, 7),
(9, 4, 13),
(10, 5, 9),
(11, 5, 12),
(12, 6, 10),
(13, 6, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `Id_Profesores` int(11) NOT NULL,
  `Apellido_Profesores` varchar(30) NOT NULL,
  `Nombre_Profesores` varchar(30) NOT NULL,
  `Documento_Profesores` int(8) NOT NULL,
  `FecNac_Profesores` date NOT NULL,
  `GENERO_PROFESORES` int(11) NOT NULL,
  `Telefono_Profesores` bigint(20) NOT NULL,
  `Mail_Profesores` varchar(40) NOT NULL,
  `Calle_Profesores` varchar(30) NOT NULL,
  `Numero_Profesores` int(11) NOT NULL,
  `Piso_Profesores` varchar(2) NOT NULL,
  `Depto_Profesores` varchar(3) NOT NULL,
  `Edificio_Profesores` varchar(30) NOT NULL,
  `BARRIOS_PROFESORES` int(11) NOT NULL,
  `CIVIL_PROFESORES` int(11) NOT NULL,
  `CURSOS_PROFESORES` int(11) NOT NULL,
  `AULAS_PROFESORES` int(11) NOT NULL,
  `ESPECIALIDAD_PROFESORES` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`Id_Profesores`, `Apellido_Profesores`, `Nombre_Profesores`, `Documento_Profesores`, `FecNac_Profesores`, `GENERO_PROFESORES`, `Telefono_Profesores`, `Mail_Profesores`, `Calle_Profesores`, `Numero_Profesores`, `Piso_Profesores`, `Depto_Profesores`, `Edificio_Profesores`, `BARRIOS_PROFESORES`, `CIVIL_PROFESORES`, `CURSOS_PROFESORES`, `AULAS_PROFESORES`, `ESPECIALIDAD_PROFESORES`) VALUES
(1, 'Gimenez', 'Ricardoz', 28390118, '1980-07-19', 3, 3517810297, 'ricardito.123@hotmail.com', 'Los Robles', 1913, '', '', '', 9, 2, 0, 0, 0),
(2, 'Maldonado', 'Claudia', 29339604, '1981-08-13', 2, 3513604970, 'claudia_01@gmail.com', 'Rios Del Cajon', 4950, '', '', '', 8, 2, 0, 0, 0),
(3, 'Lofedu', 'Marcelo', 27250312, '1978-01-07', 3, 3519105800, 'soymarcelomatero@hotmail.com', 'AV Peron', 1001, '', '', '', 11, 2, 0, 0, 0),
(4, 'Corvalan', 'Osvaldo', 31890478, '1980-07-31', 3, 3514402801, 'Oscaldito.el.pro@gmail.com', 'Paso De Los Andes', 103, '', '', '', 7, 1, 0, 0, 0),
(5, 'Luna', 'Federico', 26325111, '1977-03-01', 1, 3516241820, 'Fede.pro.2006@hotmail.com', 'Av. Mala Vida', 532, '', '', '', 3, 1, 0, 0, 0),
(6, 'Luna', 'Javier', 66675342, '1967-09-11', 1, 3516741679, 'Javicito.elinsanito.1967', 'Av. Gaykin Sala', 867, '', '', '', 1, 1, 0, 0, 0),
(7, 'Quito', 'Esteban', 72481905, '1972-04-23', 1, 1159328841, 'esteban.quito72@gmail.com', 'Calle Advincula', 742, '', '', '', 3, 2, 0, 0, 0),
(8, 'Gimenez', 'Monada', 11230456, '1991-11-01', 1, 3514050225, 'La.monada@hotmail.com', 'Alta Cordoba', 203, '', '', '', 3, 2, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_aulas`
--

CREATE TABLE `tipos_aulas` (
  `ID_Tipos` int(11) NOT NULL,
  `Nombre_Tipo_Aula` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_aulas`
--

INSERT INTO `tipos_aulas` (`ID_Tipos`, `Nombre_Tipo_Aula`) VALUES
(1, 'Laboratorio de Programación'),
(2, 'Laboratorio de Óptica'),
(3, 'Aula'),
(4, 'Preceptoria'),
(5, 'Direccion'),
(6, 'Laboratorio de ciencias naturales'),
(7, 'Sala de profesores'),
(8, 'Laboratorio de Informática'),
(9, 'Taller de Carpinteria'),
(10, 'Taller de Electricidad'),
(11, 'Taller de Transformación de materiales'),
(12, 'Secretaria'),
(13, 'otros'),
(14, 'Deposito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `ID_Zonas` int(11) NOT NULL,
  `Nombre_Zonas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`ID_Zonas`, `Nombre_Zonas`) VALUES
(1, 'Centro'),
(2, 'Norte'),
(3, 'Sur'),
(4, 'Oeste'),
(5, 'Este');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`Id_Alumnos`);

--
-- Indices de la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`ID_Aulas`);

--
-- Indices de la tabla `barrios`
--
ALTER TABLE `barrios`
  ADD PRIMARY KEY (`ID_Barrios`);

--
-- Indices de la tabla `capm`
--
ALTER TABLE `capm`
  ADD PRIMARY KEY (`ID_CAMP`);

--
-- Indices de la tabla `civil`
--
ALTER TABLE `civil`
  ADD PRIMARY KEY (`ID_Civil`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`ID_Cursos`);

--
-- Indices de la tabla `cursos_aulas`
--
ALTER TABLE `cursos_aulas`
  ADD PRIMARY KEY (`ID_Cursos_Aulas`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`ID_Especialidad`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`ID_Generos`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`ID_Materias`);

--
-- Indices de la tabla `profesor-materias`
--
ALTER TABLE `profesor-materias`
  ADD PRIMARY KEY (`ID_Profesor_Materias`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`Id_Profesores`);

--
-- Indices de la tabla `tipos_aulas`
--
ALTER TABLE `tipos_aulas`
  ADD PRIMARY KEY (`ID_Tipos`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`ID_Zonas`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `Id_Alumnos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `aulas`
--
ALTER TABLE `aulas`
  MODIFY `ID_Aulas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `barrios`
--
ALTER TABLE `barrios`
  MODIFY `ID_Barrios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `capm`
--
ALTER TABLE `capm`
  MODIFY `ID_CAMP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `civil`
--
ALTER TABLE `civil`
  MODIFY `ID_Civil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `ID_Cursos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `cursos_aulas`
--
ALTER TABLE `cursos_aulas`
  MODIFY `ID_Cursos_Aulas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `ID_Especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `ID_Generos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `ID_Materias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `profesor-materias`
--
ALTER TABLE `profesor-materias`
  MODIFY `ID_Profesor_Materias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `Id_Profesores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `ID_Zonas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
