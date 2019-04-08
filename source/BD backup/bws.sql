-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 08, 2019 at 12:26 AM
-- Server version: 8.0.13-4
-- PHP Version: 7.2.15-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thdR7Lb9W9`
--

-- --------------------------------------------------------

--
-- Table structure for table `atienden`
--

CREATE TABLE `atienden` (
  `idAtienden` int(10) NOT NULL,
  `IdDepartamento` int(25) NOT NULL,
  `IdPaciente` int(25) NOT NULL,
  `IdVoluntario` int(25) NOT NULL,
  `IdServicio` int(25) NOT NULL,
  `Fecha` date NOT NULL,
  `Observaciones` varchar(140) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CuotaRecup` decimal(8,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `atienden`
--

INSERT INTO `atienden` (`idAtienden`, `IdDepartamento`, `IdPaciente`, `IdVoluntario`, `IdServicio`, `Fecha`, `Observaciones`, `CuotaRecup`) VALUES
(12, 4, 1, 4, 7, '2019-04-02', NULL, NULL),
(13, 2, 2, 15, 1, '2019-04-04', NULL, NULL),
(24, 3, 1, 4, 5, '2019-04-01', '', '0.0000'),
(25, 3, 1, 4, 5, '2019-04-04', '', '0.0000');

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

CREATE TABLE `departamento` (
  `IdDepartamento` int(25) NOT NULL,
  `NombreDepartamento` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `IdRol` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `departamento`
--

INSERT INTO `departamento` (`IdDepartamento`, `NombreDepartamento`, `contrasena`, `IdRol`) VALUES
(1, 'administrador', '1', 1),
(2, 'asistencias', '1', 2),
(3, 'dispensario', '1', 3),
(4, 'porteria', '1', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pacientes`
--

CREATE TABLE `pacientes` (
  `IdPaciente` int(25) NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `FechadeNacimiento` date NOT NULL,
  `Sexo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `Activo` int(1) NOT NULL,
  `Direccion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Telefono` int(10) NOT NULL,
  `Celular` int(10) NOT NULL,
  `Religion` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `NivelEconomico` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pacientes`
--

INSERT INTO `pacientes` (`IdPaciente`, `Nombre`, `FechadeNacimiento`, `Sexo`, `Activo`, `Direccion`, `Telefono`, `Celular`, `Religion`, `NivelEconomico`) VALUES
(1, 'Francisco', '1999-07-15', 'M', 1, 'Mesa del Millar 89', 442454875, 565468454, 'ateo', ''),
(2, 'Samuel Ramirez', '2019-04-03', 'M', 1, 'san joaquin, san jeronimo', 0, 0, 'Catolico', 'Medio');

-- --------------------------------------------------------

--
-- Table structure for table `permisos`
--

CREATE TABLE `permisos` (
  `IdPermiso` int(25) NOT NULL,
  `NombrePermiso` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `IdRol` int(25) NOT NULL,
  `NombreRol` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipodeservicio`
--

CREATE TABLE `tipodeservicio` (
  `IdServicio` int(25) NOT NULL,
  `IdDepartamento` int(25) NOT NULL,
  `NombreServicio` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tipodeservicio`
--

INSERT INTO `tipodeservicio` (`IdServicio`, `IdDepartamento`, `NombreServicio`) VALUES
(1, 2, 'domiciliaria'),
(2, 2, 'nocturna'),
(3, 2, 'diurna'),
(4, 2, 'hospitalaria'),
(5, 3, 'Dispensario'),
(6, 4, 'Servicio'),
(7, 4, 'Alimento'),
(8, 4, 'Despensa'),
(9, 4, 'Ropa');

-- --------------------------------------------------------

--
-- Table structure for table `voluntarios`
--

CREATE TABLE `voluntarios` (
  `IdVoluntario` int(25) NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `FechadeNacimiento` date NOT NULL,
  `Sexo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `Cargo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Tipo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Activo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `voluntarios`
--

INSERT INTO `voluntarios` (`IdVoluntario`, `Nombre`, `FechadeNacimiento`, `Sexo`, `Cargo`, `Tipo`, `Activo`) VALUES
(1, 'Madre Gabriela Aldana Meza', '1980-01-01', 'F', 'Representante Legal', 'Superiora', 1),
(2, 'Sor Ma. Del  Pilar Cedeno Tole', '1980-01-01', 'F', 'Vicepresidente', 'Enfermera', 1),
(3, 'Sor Fe Nistal Gonzalez', '1980-01-01', 'F', 'Secretaria', 'Enfermera', 1),
(4, 'Sor Amalia Lopez Caicedo', '1980-01-01', 'F', '', 'Enfermera', 1),
(5, 'Sor Maria Garayalde Martinez', '1980-01-01', 'F', 'tesorera', 'enfermera', 1),
(6, 'Sor Herminia Montes Mediavilla', '1980-01-01', 'F', 'representante', 'enfermera', 1),
(7, 'Sor Guillermina Castro Cervant', '1980-01-01', 'F', '', 'Enfermera', 1),
(8, 'Sor Juana Lopez Facio', '1980-01-01', 'F', 'Tesorera', 'Enfermera', 1),
(9, 'Sor Veronica Mares Escalera', '1980-01-01', 'F', '', 'Enfermera', 1),
(10, 'Sor Rosa Juarez Hernandez', '1980-01-01', 'F', '', 'Enfermera', 1),
(11, 'Sor Luz  Maria Batres Alvarez', '1980-01-01', 'F', '', 'Enfermera', 1),
(12, 'Sor Patricia Medeles Romero', '1980-01-01', 'F', '', 'Enfermera', 1),
(13, 'Sor Ma. De Jesus Garcia Calvil', '1980-01-01', 'F', '', 'Enfermera', 1),
(14, 'Rosa Maria Silva Ramos', '1980-01-01', 'F', '', 'Enfermera', 1),
(15, 'Luis Javier Rodriguez Baez', '1980-01-01', 'M', '', 'Medico Familiar', 1),
(16, 'Sonia Dimas', '1980-01-01', 'F', '', 'Voluntario', 1),
(17, 'Isacc Olvera', '1980-01-01', 'M', '', 'Voluntario', 1),
(18, 'Raul Soto', '1980-01-01', 'M', '', 'Voluntario', 1),
(19, ' Ma. del Carmen Hernandez Rodr', '1980-01-01', 'F', '', 'Voluntario', 1),
(20, 'Agustin Mendoza', '1980-01-01', 'M', '', 'Voluntario', 1),
(21, 'Ana Claudia Barrera', '1980-01-01', 'F', '', 'Voluntario', 1),
(22, 'Bertha  Hilda Ugalde Monrroy', '1980-01-01', 'F', '', 'Voluntario', 1),
(23, 'Eduardo Moreno Aguilar', '1980-01-01', 'F', '', 'Voluntario', 1),
(24, 'Elia Martinez Lazaro', '1980-01-01', 'M', '', 'Voluntario', 1),
(25, 'Elisa Leiva Ojeda', '1980-01-01', 'F', '', 'Voluntario', 1),
(26, 'Elsa Maricela Alvarez Vazquez', '1980-01-01', 'F', '', 'Voluntario', 1),
(27, 'Francisco Eliseo Fuentes Linar', '1980-01-01', 'F', '', 'Voluntario', 1),
(28, 'Gabriela Olvera', '1980-01-01', 'F', '', 'Voluntario', 1),
(29, 'Isabel Sanchez  Duran', '1980-01-01', 'F', '', 'Voluntario', 1),
(30, 'Ivonne Garcia Valencia', '1980-01-01', 'F', '', 'Voluntario', 1),
(31, 'Jose Cesar Sanchez Baeza', '1980-01-01', 'F', '', 'Voluntario', 1),
(32, 'Jose Luis Ramirez Esquivel', '1980-01-01', 'M', '', 'Voluntario', 1),
(33, 'Jose Manuel Romero Navarro', '1980-01-01', 'M', '', 'Voluntario', 1),
(34, 'Juana Sanchez Sanchez', '1980-01-01', 'F', '', 'Voluntario', 1),
(35, 'Laura Rojas Montalvo', '1980-01-01', 'F', '', 'Voluntario', 1),
(36, 'Laura Ruiz Ojeda', '1980-01-01', 'F', '', 'Voluntario', 1),
(37, 'Leticia Barajas Haro', '1980-01-01', 'F', '', 'Voluntario', 1),
(38, 'Lidia Berzunza  Gloria', '1980-01-01', 'F', '', 'Voluntario', 1),
(39, 'Ma.  Pueblito Martinez Eliseo', '1980-01-01', 'F', '', 'Voluntario', 1),
(40, 'Ma. Cruz Maria Martinez Morale', '1980-01-01', 'F', '', 'Voluntario', 1),
(41, 'Ma. del Carmen Aviles Aguilar', '1980-01-01', 'F', '', 'Voluntario', 1),
(42, 'Ma. del Pilar Gomez Capucheta', '1980-01-01', 'F', '', 'Voluntario', 1),
(43, 'Ma. Delia Jimenez Chavez', '1980-01-01', 'F', '', 'Voluntario', 1),
(44, 'Ma. Estela Ruiz Hern?ndez', '1980-01-01', 'F', '', 'Voluntario', 1),
(45, 'Ma. Isabel Arias Olvera', '1980-01-01', 'F', '', 'Voluntario', 1),
(46, 'Ma. Sofia Sanchez Escobedo', '1980-01-01', 'F', '', 'Voluntario', 1),
(47, 'Ma. Del Carmen Palomino Laguna', '1980-01-01', 'F', '', 'Voluntario', 1),
(48, 'Ma. Angela Hortensia Olalde Go', '1980-01-01', 'F', '', 'Voluntario', 1),
(49, 'Maria Dolores Gudino Martinez', '1980-01-01', 'F', '', 'Voluntario', 1),
(50, 'Maria de  Lourdes Collazo Sand', '1980-01-01', 'F', '', 'Voluntario', 1),
(51, 'Nancy Sanchez Duran', '1980-01-01', 'F', '', 'Voluntario', 1),
(52, 'Patricia Martinez Salinas', '1980-01-01', 'F', '', 'Voluntario', 1),
(53, 'Rocio Guerrero Yanez', '1980-01-01', 'F', '', 'Voluntario', 1),
(54, 'Rosalinda Ramos Ruiz', '1980-01-01', 'F', '', 'Voluntario', 1),
(55, 'Salvador Aguilar Ramorez', '1980-01-01', 'M', '', 'Voluntario', 1),
(56, 'Yolanda Esperanza Favela Yzita', '1980-01-01', 'F', '', 'Voluntario', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atienden`
--
ALTER TABLE `atienden`
  ADD PRIMARY KEY (`idAtienden`),
  ADD KEY `IdDepartamento` (`IdDepartamento`),
  ADD KEY `IdPaciente` (`IdPaciente`),
  ADD KEY `IdVoluntario` (`IdVoluntario`),
  ADD KEY `IdServicio` (`IdServicio`);

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`IdDepartamento`);

--
-- Indexes for table `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`IdPaciente`);

--
-- Indexes for table `tipodeservicio`
--
ALTER TABLE `tipodeservicio`
  ADD PRIMARY KEY (`IdServicio`),
  ADD KEY `idDepartmaneto` (`IdDepartamento`);

--
-- Indexes for table `voluntarios`
--
ALTER TABLE `voluntarios`
  ADD PRIMARY KEY (`IdVoluntario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atienden`
--
ALTER TABLE `atienden`
  MODIFY `idAtienden` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `departamento`
--
ALTER TABLE `departamento`
  MODIFY `IdDepartamento` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `IdPaciente` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipodeservicio`
--
ALTER TABLE `tipodeservicio`
  MODIFY `IdServicio` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `voluntarios`
--
ALTER TABLE `voluntarios`
  MODIFY `IdVoluntario` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `atienden`
--
ALTER TABLE `atienden`
  ADD CONSTRAINT `ForeignDepartamento` FOREIGN KEY (`IdDepartamento`) REFERENCES `departamento` (`IdDepartamento`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ForeignPaciente` FOREIGN KEY (`IdPaciente`) REFERENCES `pacientes` (`idpaciente`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ForeignServicio` FOREIGN KEY (`IdServicio`) REFERENCES `tipodeservicio` (`IdServicio`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ForeignVoluntario` FOREIGN KEY (`IdVoluntario`) REFERENCES `voluntarios` (`idvoluntario`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tipodeservicio`
--
ALTER TABLE `tipodeservicio`
  ADD CONSTRAINT `tipodeservicio_ibfk_1` FOREIGN KEY (`IdDepartamento`) REFERENCES `departamento` (`IdDepartamento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
