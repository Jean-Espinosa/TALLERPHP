-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-02-2020 a las 05:24:52
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sena`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getAula` (IN `id` INT)  NO SQL
BEGIN
SELECT*FROM aula WHERE idAula = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getUser` (IN `id` VARCHAR(255))  READS SQL DATA
BEGIN
SELECT*FROM usuario WHERE correo=id OR idUsuario=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateUser` (IN `id` INT, IN `name` VARCHAR(255), IN `second` VARCHAR(255), IN `email` VARCHAR(255), IN `pass` VARCHAR(255), IN `position` VARCHAR(255))  NO SQL
BEGIN
UPDATE usuario SET idUsuario=id,Nombre=name, 
Apellido=second,Correo=email,Clave=pass,Cargo=position WHERE idUsuario = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `validateUser` (IN `id` VARCHAR(255))  NO SQL
BEGIN
SELECT*FROM usuario WHERE correo=id OR idUsuario=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `validateUserPass` (IN `id` VARCHAR(255), IN `pass` VARCHAR(255))  READS SQL DATA
BEGIN

SELECT*FROM usuario WHERE (correo=id OR idUsuario=id) AND Clave=pass;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `idAula` int(11) NOT NULL,
  `idUsuario` bigint(11) DEFAULT NULL,
  `Capacidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`idAula`, `idUsuario`, `Capacidad`) VALUES
(101, 1006814000, 50),
(102, 1006813353, 23),
(103, 1006814000, 32),
(201, 1006813353, 35),
(202, 1006814000, 51),
(203, 1006814000, 50),
(301, 1006814000, 32),
(302, 1006813353, 25),
(303, 1006813353, 31),
(401, 1006813353, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula_tv`
--

CREATE TABLE `aula_tv` (
  `idAula` int(11) NOT NULL,
  `idTV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `aula_user`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `aula_user` (
`idAula` int(11)
,`Capacidad` int(11)
,`idUsuario` bigint(11)
,`Nombre` varchar(255)
,`Apellido` varchar(255)
,`Correo` varchar(255)
,`Clave` varchar(255)
,`Cargo` varchar(255)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedad_aula`
--

CREATE TABLE `novedad_aula` (
  `idNovedad` int(11) NOT NULL,
  `idAula` int(11) NOT NULL,
  `Descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pc`
--

CREATE TABLE `pc` (
  `idPC` int(11) NOT NULL,
  `idAula` int(11) DEFAULT NULL,
  `Marca` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Modelo` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tv`
--

CREATE TABLE `tv` (
  `idTV` int(11) NOT NULL,
  `Marca` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Modelo` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` bigint(11) NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Correo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Clave` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Cargo` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `Nombre`, `Apellido`, `Correo`, `Clave`, `Cargo`) VALUES
(1006813353, 'Santiago\r\n', 'Velez Perilla', 'z', 'zanty123', 'Docente'),
(1006814000, 'Juan Esteban', 'Vélez Perilla', 'esteban29velezp@gmail.com', 'maritza123', 'Cuentadante');

-- --------------------------------------------------------

--
-- Estructura para la vista `aula_user`
--
DROP TABLE IF EXISTS `aula_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `aula_user`  AS  select `a`.`idAula` AS `idAula`,`a`.`Capacidad` AS `Capacidad`,`u`.`idUsuario` AS `idUsuario`,`u`.`Nombre` AS `Nombre`,`u`.`Apellido` AS `Apellido`,`u`.`Correo` AS `Correo`,`u`.`Clave` AS `Clave`,`u`.`Cargo` AS `Cargo` from (`aula` `a` join `usuario` `u` on(`a`.`idUsuario` = `u`.`idUsuario`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`idAula`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `aula_tv`
--
ALTER TABLE `aula_tv`
  ADD UNIQUE KEY `idAula` (`idAula`),
  ADD UNIQUE KEY `idTV` (`idTV`);

--
-- Indices de la tabla `novedad_aula`
--
ALTER TABLE `novedad_aula`
  ADD PRIMARY KEY (`idNovedad`),
  ADD KEY `idEntidad` (`idAula`);

--
-- Indices de la tabla `pc`
--
ALTER TABLE `pc`
  ADD PRIMARY KEY (`idPC`),
  ADD KEY `idAula` (`idAula`);

--
-- Indices de la tabla `tv`
--
ALTER TABLE `tv`
  ADD PRIMARY KEY (`idTV`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `Correo` (`Correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `novedad_aula`
--
ALTER TABLE `novedad_aula`
  MODIFY `idNovedad` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aula`
--
ALTER TABLE `aula`
  ADD CONSTRAINT `aula_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `aula_tv`
--
ALTER TABLE `aula_tv`
  ADD CONSTRAINT `aula_tv_ibfk_1` FOREIGN KEY (`idAula`) REFERENCES `aula` (`idAula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aula_tv_ibfk_2` FOREIGN KEY (`idTV`) REFERENCES `tv` (`idTV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `novedad_aula`
--
ALTER TABLE `novedad_aula`
  ADD CONSTRAINT `novedad_aula_ibfk_1` FOREIGN KEY (`idAula`) REFERENCES `aula` (`idAula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pc`
--
ALTER TABLE `pc`
  ADD CONSTRAINT `pc_ibfk_1` FOREIGN KEY (`idAula`) REFERENCES `aula` (`idAula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
