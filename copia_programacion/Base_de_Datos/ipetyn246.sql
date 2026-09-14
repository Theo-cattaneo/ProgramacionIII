-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-03-2026 a las 14:12:37
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ipetyn246`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barrio`
--

CREATE TABLE `barrio` (
  `id_Barrio` int(11) NOT NULL,
  `Nombre_barrios` varchar(30) NOT NULL,
  `ZONA_BARRIOS` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `barrio`
--

INSERT INTO `barrio` (`id_Barrio`, `Nombre_barrios`, `ZONA_BARRIOS`) VALUES
(5, 'Villa el li', '3'),
(6, 'Comercial', '3'),
(7, 'Villa el libertador', '3'),
(8, 'Comercial', '3'),
(9, 'Guemes', '1'),
(10, 'Alta cordoba', '2'),
(11, 'Nueva italia', '5'),
(12, 'San roque', '4'),
(13, 'Anelelli I', '3'),
(14, 'Los olmos sud', '3'),
(15, 'Bella vista', '4'),
(16, 'Nuestro hogar III', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `civil`
--

CREATE TABLE `civil` (
  `id_civil` int(11) NOT NULL,
  `Estado_Civil` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `civil`
--

INSERT INTO `civil` (`id_civil`, `Estado_Civil`) VALUES
(3, 'Soltero/a'),
(4, 'Casado/a'),
(7, 'Divorciado/a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `Id_Genero` int(11) NOT NULL,
  `Nombre_Genero` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`Id_Genero`, `Nombre_Genero`) VALUES
(1, 'Masculino'),
(2, 'Femenino'),
(3, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idalumnos`
--

CREATE TABLE `idalumnos` (
  `id_Alumnos` int(11) NOT NULL,
  `Apellido_Alumnos` varchar(30) NOT NULL,
  `Nombre_Alumnos` varchar(30) NOT NULL,
  `DNI_Alumnos` int(11) NOT NULL,
  `FechNac_Alumnos` date NOT NULL,
  `GENERO_ALUMNOS` int(11) NOT NULL,
  `Telefono_Alumnos` bigint(20) NOT NULL,
  `Mail_Alumnos` varchar(40) NOT NULL,
  `Calle_Alumnos` varchar(30) NOT NULL,
  `Numero_Alumnos` varchar(11) NOT NULL,
  `Piso_Alumnos` varchar(2) NOT NULL,
  `Depto_Alumnos` varchar(3) NOT NULL,
  `Edificio_Alumnos` varchar(30) NOT NULL,
  `BARRIO_ALUMNO` int(11) NOT NULL,
  `CIVIL_ALUMNO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `idalumnos`
--

INSERT INTO `idalumnos` (`id_Alumnos`, `Apellido_Alumnos`, `Nombre_Alumnos`, `DNI_Alumnos`, `FechNac_Alumnos`, `GENERO_ALUMNOS`, `Telefono_Alumnos`, `Mail_Alumnos`, `Calle_Alumnos`, `Numero_Alumnos`, `Piso_Alumnos`, `Depto_Alumnos`, `Edificio_Alumnos`, `BARRIO_ALUMNO`, `CIVIL_ALUMNO`) VALUES
(1, 'Robledo', 'Micaela Brisa', 0, '2008-06-10', 2, 351233564, 'micaela_robledo@gmail.com', 'defensa', '4850', '', '', '', 4, 0),
(2, 'Ramos Lopez', 'Lucia ', 0, '2009-10-05', 2, 351672318, 'ramos_l@outlook.com', 'arrollo de reduccion', '0128', '', '', '', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `id_zonas` int(11) NOT NULL,
  `Nombre_zona` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`id_zonas`, `Nombre_zona`) VALUES
(1, 'Centro'),
(2, 'Norte'),
(3, 'Sur'),
(4, 'Oeste'),
(5, 'Este');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `barrio`
--
ALTER TABLE `barrio`
  ADD PRIMARY KEY (`id_Barrio`);

--
-- Indices de la tabla `civil`
--
ALTER TABLE `civil`
  ADD PRIMARY KEY (`id_civil`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`Id_Genero`);

--
-- Indices de la tabla `idalumnos`
--
ALTER TABLE `idalumnos`
  ADD PRIMARY KEY (`id_Alumnos`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`id_zonas`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `barrio`
--
ALTER TABLE `barrio`
  MODIFY `id_Barrio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `civil`
--
ALTER TABLE `civil`
  MODIFY `id_civil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `Id_Genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `idalumnos`
--
ALTER TABLE `idalumnos`
  MODIFY `id_Alumnos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `id_zonas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
