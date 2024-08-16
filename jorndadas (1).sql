-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-08-2024 a las 19:12:43
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jorndadas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `año jornada`
--
-- Error leyendo la estructura de la tabla jorndadas.año jornada: #1932 - Table 'jorndadas.año jornada' doesn't exist in engine
-- Error leyendo datos de la tabla jorndadas.año jornada: #1064 - Algo está equivocado en su sintax cerca 'FROM `jorndadas`.`año jornada`' en la linea 1

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `año_jornada`
--

CREATE TABLE `año_jornada` (
  `año` int(70) NOT NULL,
  `charla` varchar(70) NOT NULL,
  `Descripción` varchar(254) NOT NULL,
  `dia` varchar(70) NOT NULL,
  `hora` varchar(70) NOT NULL,
  `IDCharla` int(11) NOT NULL,
  `lugar` varchar(70) NOT NULL,
  `Titular` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `año_jornada`
--

INSERT INTO `año_jornada` (`año`, `charla`, `Descripción`, `dia`, `hora`, `IDCharla`, `lugar`, `Titular`) VALUES
(2024, 'Biotecnología aplicada a la extracción de petróleo en zonas de guerra', 'Una charla sobre como la biotecnología cambia la forma en que las empresas petroleras realizan distintas extracciones en zonas en conflicto, principalmente en naciones subdesarrolladas.', '15/09', '11:00', 1, 'Comedor', 'Carlos Trioni'),
(2019, 'Inteligencia Artificial', 'Inteligencia Artificial y los distintos usos que puede tener', '20/5', '09:30', 2, '1er año', 'Jorge Peralta'),
(2024, 'Deportes y Salud', 'Los beneficios del deporte y la importancia del ejercicio diario', '14/06', '15:00', 3, 'Comedor', 'Julio Kolor'),
(2019, 'La esclavitud ', 'La historia de la esclavitud a lo largo de los años', '13/12', '8:00', 4, 'Baño', 'Mateo Mizutamari'),
(2019, 'Veterinaria', 'Los avances tecnológicos en los animales', '4/06', '5:00', 5, 'Baño', 'Carlos Trioni'),
(2024, 'Abogacia', 'Derechos civiles ', '4/10', '14:00', 6, 'Comedor', 'Guido Herrera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornadas`
--
-- Error leyendo la estructura de la tabla jorndadas.jornadas: #1932 - Table 'jorndadas.jornadas' doesn't exist in engine
-- Error leyendo datos de la tabla jorndadas.jornadas: #1064 - Algo está equivocado en su sintax cerca 'FROM `jorndadas`.`jornadas`' en la linea 1

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornadass`
--

CREATE TABLE `jornadass` (
  `Año` year(4) NOT NULL,
  `ID` int(11) NOT NULL,
  `Titulo` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jornadass`
--

INSERT INTO `jornadass` (`Año`, `ID`, `Titulo`) VALUES
('2024', 1, 'Jornada de libros y lectura'),
('2019', 2, 'Jornadas Interactivas');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `año_jornada`
--
ALTER TABLE `año_jornada`
  ADD PRIMARY KEY (`IDCharla`);

--
-- Indices de la tabla `jornadass`
--
ALTER TABLE `jornadass`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `año_jornada`
--
ALTER TABLE `año_jornada`
  MODIFY `IDCharla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `jornadass`
--
ALTER TABLE `jornadass`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
