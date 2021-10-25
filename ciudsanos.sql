-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2021 a las 15:03:33
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ciudsanos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `idConsulta` int(11) NOT NULL,
  `cedula` int(15) NOT NULL,
  `fechConsulta` date NOT NULL,
  `detalles` varchar(500) NOT NULL,
  `medico` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`idConsulta`, `cedula`, `fechConsulta`, `detalles`, `medico`) VALUES
(1, 1231, '2021-10-25', 'Consulta de prueba', ' Test '),
(2, 11111, '2022-10-13', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sapien ipsum, imperdiet nec elit at, molestie sodales diam. Suspendisse pulvinar posuere tortor luctus porta. Ut egestas mauris at nisi rhoncus molestie. Nulla laoreet mauris sed leo commodo sollicitudin. Suspendisse eu odio lacus. Sed non elit diam. Quisque id magna sit amet ex egestas lobortis ut in enim. Nullam pharetra tellus quis libero tristique, luctus pulvinar dolor posuere. ', 'Medico 2'),
(3, 11111, '2021-10-20', 'Donec sed dui eu elit elementum facilisis. Donec rhoncus mattis augue, interdum scelerisque urna cursus rutrum. Proin sodales tortor in magna consequat, nec laoreet turpis mattis. Cras ornare neque odio, facilisis consectetur tellus faucibus eu. Aenean arcu sem, porta venenatis massa id, ultricies semper arcu. Morbi mollis, odio finibus lacinia faucibus, massa velit consectetur sem, a semper massa tortor id felis. Integer non lorem condimentum, lacinia sapien id, curs.', ' Test ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cedula` int(15) NOT NULL,
  `telefono` int(10) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `fechaNac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`id`, `nombre`, `password`, `cedula`, `telefono`, `genero`, `fechaNac`) VALUES
(1, 'Test', 'asd', 123, 321, 'Masc', '2021-10-05'),
(15, 'Medico 2', 'asd', 321, 444444, 'Femenino', '2016-10-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `idPaciente` int(11) NOT NULL,
  `cedula` int(15) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `genero` varchar(11) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `dpto` varchar(20) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `fechaNac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`idPaciente`, `cedula`, `nombre`, `genero`, `direccion`, `dpto`, `ciudad`, `telefono`, `email`, `fechaNac`) VALUES
(1, 11111, 'Potato', 'Masculino', '0', '0', 'ciud', 3333, 'email', '2021-09-28'),
(2, 1231, 'pprueba', 'Femenino', '44', '5566', '666', 123412354, 'dasd', '2021-09-29');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`idConsulta`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`idPaciente`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `idConsulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `idPaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
