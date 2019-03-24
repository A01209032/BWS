-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 10, 2019 at 03:52 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

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
-- Table structure for table `voluntarios`
--

CREATE TABLE `voluntarios` (
  `IdVoluntario` int(25) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `FechadeNacimiento` date NOT NULL,
  `Sexo` char(1) NOT NULL,
  `Cargo` varchar(30) DEFAULT NULL,
  `Tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voluntarios`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `voluntarios`
--
ALTER TABLE `voluntarios`
  ADD PRIMARY KEY (`IdVoluntario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `voluntarios`
--
ALTER TABLE `voluntarios`
  MODIFY `IdVoluntario` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
