-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-03-2019 a las 21:50:33
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `servicio_social`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `IdDepartamento` int(25) NOT NULL,
  `NombreDepartamento` varchar(30) NOT NULL,
  `contraseña` int(25) NOT NULL,
  `IdRol` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`IdDepartamento`, `NombreDepartamento`, `contraseña`, `IdRol`) VALUES
(1, 'Administrador', 414, 1),
(2, 'Asistencias', 32104, 2),
(3, 'Dispensario', 3200, 3),
(4, 'Portería', 0, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedad`
--

CREATE TABLE `enfermedad` (
  `IdEnfermedad` int(25) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `IdPaciente` int(25) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `FechadeNacimiento` date NOT NULL,
  `Sexo` char(1) NOT NULL,
  `Activo` tinyint(1) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Telefono` int(10) NOT NULL,
  `Celular` int(10) NOT NULL,
  `Religion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `IdPermiso` int(25) NOT NULL,
  `NombrePermiso` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `IdRol` int(25) NOT NULL,
  `NombreRol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodeservicio`
--

CREATE TABLE `tipodeservicio` (
  `IdServicio` int(25) NOT NULL,
  `idDepartmaneto` int(25) NOT NULL,
  `NombreServicio` varchar(30) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipodeservicio`
--

INSERT INTO `tipodeservicio` (`IdServicio`, `idDepartmaneto`, `NombreServicio`, `Descripcion`, `Fecha`) VALUES
(1, 1, 'Inyeccion', 'Inyeccion a paciente', '2019-03-05'),
(2, 2, 'Despensa Familiar', 'Entrega a Despensa familiar', '2019-02-06'),
(3, 2, 'Comida', 'Entrega de Comida', '2019-01-15'),
(4, 3, 'Asistencia Diurna', 'Ayuda al paciente', '2019-03-13'),
(5, 1, 'Entrega de Medicinas', 'Entrega de medicinas', '2019-03-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voluntarios`
--

CREATE TABLE `voluntarios` (
  `IdVoluntario` int(25) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `FechadeNacimiento` date NOT NULL,
  `Sexo` char(1) NOT NULL,
  `Cargo` varchar(30) NOT NULL,
  `Tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `voluntarios`
--

INSERT INTO `voluntarios` (`IdVoluntario`, `Nombre`, `FechadeNacimiento`, `Sexo`, `Cargo`, `Tipo`) VALUES
(1, 'Madre Gabriela Aldana Meza', '0000-00-00', 'F', 'Representante Legal', 'Superiora'),
(2, 'Sor Ma. Del  Pilar Cedeno Tole', '0000-00-00', 'F', 'Vicepresidente', 'Enfermera'),
(3, 'Sor Fe Nistal Gonzalez', '0000-00-00', 'F', 'Secretaria', 'Enfermera'),
(4, 'Sor Amalia Lopez Caicedo', '0000-00-00', 'F', '', 'Enfermera'),
(5, 'Sor Maria Garayalde Martinez', '0000-00-00', 'F', '', 'Enfermera'),
(6, 'Sor Herminia Montes Mediavilla', '0000-00-00', 'F', '', 'Enfermera'),
(7, 'Sor Guillermina Castro Cervant', '0000-00-00', 'F', '', 'Enfermera'),
(8, 'Sor Juana Lopez Facio', '0000-00-00', 'F', 'Tesorera', 'Enfermera'),
(9, 'Sor Veronica Mares Escalera', '0000-00-00', 'F', '', 'Enfermera'),
(10, 'Sor Rosa Juarez Hernandez', '0000-00-00', 'F', '', 'Enfermera'),
(11, 'Sor Luz  Maria Batres Alvarez', '0000-00-00', 'F', '', 'Enfermera'),
(12, 'Sor Patricia Medeles Romero', '0000-00-00', 'F', '', 'Enfermera'),
(13, 'Sor Ma. De Jesus Garcia Calvil', '0000-00-00', 'F', '', 'Enfermera'),
(14, 'Rosa Maria Silva Ramos', '0000-00-00', 'F', '', 'Enfermera'),
(15, 'Luis Javier Rodriguez Baez', '0000-00-00', 'M', '', 'Medico Familiar'),
(16, 'Sonia Dimas', '0000-00-00', 'F', '', 'Voluntario'),
(17, 'Isacc Olvera', '0000-00-00', 'M', '', 'Voluntario'),
(18, 'Raul Soto', '0000-00-00', 'M', '', 'Voluntario'),
(19, ' Ma. del Carmen Hernandez Rodr', '0000-00-00', 'F', '', 'Voluntario'),
(20, 'Agustin Mendoza', '0000-00-00', 'M', '', 'Voluntario'),
(21, 'Ana Claudia Barrera', '0000-00-00', 'F', '', 'Voluntario'),
(22, 'Bertha  Hilda Ugalde Monrroy', '0000-00-00', 'F', '', 'Voluntario'),
(23, 'Eduardo Moreno Aguilar', '0000-00-00', 'F', '', 'Voluntario'),
(24, 'Elia Martinez Lazaro', '0000-00-00', 'M', '', 'Voluntario'),
(25, 'Elisa Leiva Ojeda', '0000-00-00', 'F', '', 'Voluntario'),
(26, 'Elsa Maricela Alvarez Vazquez', '0000-00-00', 'F', '', 'Voluntario'),
(27, 'Francisco Eliseo Fuentes Linar', '0000-00-00', 'F', '', 'Voluntario'),
(28, 'Gabriela Olvera', '0000-00-00', 'F', '', 'Voluntario'),
(29, 'Isabel Sanchez  Duran', '0000-00-00', 'F', '', 'Voluntario'),
(30, 'Ivonne Garcia Valencia', '0000-00-00', 'F', '', 'Voluntario'),
(31, 'Jose Cesar Sanchez Baeza', '0000-00-00', 'F', '', 'Voluntario'),
(32, 'Jose Luis Ramirez Esquivel', '0000-00-00', 'M', '', 'Voluntario'),
(33, 'Jose Manuel Romero Navarro', '0000-00-00', 'M', '', 'Voluntario'),
(34, 'Juana Sanchez Sanchez', '0000-00-00', 'F', '', 'Voluntario'),
(35, 'Laura Rojas Montalvo', '0000-00-00', 'F', '', 'Voluntario'),
(36, 'Laura Ruiz Ojeda', '0000-00-00', 'F', '', 'Voluntario'),
(37, 'Leticia Barajas Haro', '0000-00-00', 'F', '', 'Voluntario'),
(38, 'Lidia Berzunza  Gloria', '0000-00-00', 'F', '', 'Voluntario'),
(39, 'Ma.  Pueblito Martinez Eliseo', '0000-00-00', 'F', '', 'Voluntario'),
(40, 'Ma. Cruz Maria Martinez Morale', '0000-00-00', 'F', '', 'Voluntario'),
(41, 'Ma. del Carmen Aviles Aguilar', '0000-00-00', 'F', '', 'Voluntario'),
(42, 'Ma. del Pilar Gomez Capucheta', '0000-00-00', 'F', '', 'Voluntario'),
(43, 'Ma. Delia Jimenez Chavez', '0000-00-00', 'F', '', 'Voluntario'),
(44, 'Ma. Estela Ruiz Hern?ndez', '0000-00-00', 'F', '', 'Voluntario'),
(45, 'Ma. Isabel Arias Olvera', '0000-00-00', 'F', '', 'Voluntario'),
(46, 'Ma. Sofia Sanchez Escobedo', '0000-00-00', 'F', '', 'Voluntario'),
(47, 'Ma. Del Carmen Palomino Laguna', '0000-00-00', 'F', '', 'Voluntario'),
(48, 'Ma. Angela Hortensia Olalde Go', '0000-00-00', 'F', '', 'Voluntario'),
(49, 'Maria Dolores Gudino Martinez', '0000-00-00', 'F', '', 'Voluntario'),
(50, 'Maria de  Lourdes Collazo Sand', '0000-00-00', 'F', '', 'Voluntario'),
(51, 'Nancy Sanchez Duran', '0000-00-00', 'F', '', 'Voluntario'),
(52, 'Patricia Martinez Salinas', '0000-00-00', 'F', '', 'Voluntario'),
(53, 'Rocio Guerrero Yanez', '0000-00-00', 'F', '', 'Voluntario'),
(54, 'Rosalinda Ramos Ruiz', '0000-00-00', 'F', '', 'Voluntario'),
(55, 'Salvador Aguilar Ramorez', '0000-00-00', 'M', '', 'Voluntario'),
(56, 'Yolanda Esperanza Favela Yzita', '0000-00-00', 'F', '', 'Voluntario'),
(57, 'Yolanda Ruiz Ojeda', '0000-00-00', 'F', '', 'Voluntario'),
(58, 'Filiberto', '2019-03-12', 'm', 'ninguno', 'voluntario'),
(59, 'Tont', '1998-12-21', 'm', 'ninguno', 'voluntario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`IdDepartamento`);

--
-- Indices de la tabla `enfermedad`
--
ALTER TABLE `enfermedad`
  ADD PRIMARY KEY (`IdEnfermedad`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`IdPaciente`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`IdPermiso`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`IdRol`);

--
-- Indices de la tabla `tipodeservicio`
--
ALTER TABLE `tipodeservicio`
  ADD PRIMARY KEY (`IdServicio`);

--
-- Indices de la tabla `voluntarios`
--
ALTER TABLE `voluntarios`
  ADD PRIMARY KEY (`IdVoluntario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `IdDepartamento` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `enfermedad`
--
ALTER TABLE `enfermedad`
  MODIFY `IdEnfermedad` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `IdPaciente` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `IdPermiso` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `IdRol` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipodeservicio`
--
ALTER TABLE `tipodeservicio`
  MODIFY `IdServicio` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `voluntarios`
--
ALTER TABLE `voluntarios`
  MODIFY `IdVoluntario` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
