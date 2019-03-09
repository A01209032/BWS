-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2019 at 08:26 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bws`
--

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

CREATE TABLE `departamento` (
  `IdDepartamento` int(25) NOT NULL,
  `NombreDepartamento` varchar(30) NOT NULL,
  `contraseña` int(25) NOT NULL,
  `IdRol` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enfermedad`
--

CREATE TABLE `enfermedad` (
  `IdEnfermedad` int(25) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pacientes`
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
-- Table structure for table `permisos`
--

CREATE TABLE `permisos` (
  `IdPermiso` int(25) NOT NULL,
  `NombrePermiso` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `IdRol` int(25) NOT NULL,
  `NombreRol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tipodeservicio`
--

CREATE TABLE `tipodeservicio` (
  `IdServicio` int(25) NOT NULL,
  `idDepartmaneto` int(25) NOT NULL,
  `NombreServicio` varchar(30) NOT NULL,
  `Descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `voluntarios`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`IdDepartamento`);

--
-- Indexes for table `enfermedad`
--
ALTER TABLE `enfermedad`
  ADD PRIMARY KEY (`IdEnfermedad`);

--
-- Indexes for table `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`IdPaciente`);

--
-- Indexes for table `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`IdPermiso`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`IdRol`);

--
-- Indexes for table `tipodeservicio`
--
ALTER TABLE `tipodeservicio`
  ADD PRIMARY KEY (`IdServicio`);

--
-- Indexes for table `voluntarios`
--
ALTER TABLE `voluntarios`
  ADD PRIMARY KEY (`IdVoluntario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departamento`
--
ALTER TABLE `departamento`
  MODIFY `IdDepartamento` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enfermedad`
--
ALTER TABLE `enfermedad`
  MODIFY `IdEnfermedad` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `IdPaciente` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permisos`
--
ALTER TABLE `permisos`
  MODIFY `IdPermiso` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `IdRol` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipodeservicio`
--
ALTER TABLE `tipodeservicio`
  MODIFY `IdServicio` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voluntarios`
--
ALTER TABLE `voluntarios`
  MODIFY `IdVoluntario` int(25) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
