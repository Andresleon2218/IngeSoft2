-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 24-11-2020 a las 20:45:48
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Base de datos: `gestor_citas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `ID_Cita` int(10) UNSIGNED NOT NULL,
  `Fecha_Cita` date NOT NULL,
  `HoraInicio_Cita` varchar(15) NOT NULL,
  `HoraFin_Cita` varchar(15) NOT NULL,
  `Dia_Cita` varchar(15) NOT NULL,
  `Semana_Cita` int(11) NOT NULL,
  `ID_Profesional` int(10) UNSIGNED NOT NULL,
  `ID_Persona` int(10) UNSIGNED NOT NULL,
  `Estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`ID_Cita`, `Fecha_Cita`, `HoraInicio_Cita`, `HoraFin_Cita`, `Dia_Cita`, `Semana_Cita`, `ID_Profesional`, `ID_Persona`, `Estado`) VALUES
(1, '2020-11-24', '08:30', '09:00', '1', 1, 1, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia_profesional`
--

CREATE TABLE `dia_profesional` (
  `ID_Dia_Profesional` int(10) UNSIGNED NOT NULL,
  `ID_Profesional` int(10) UNSIGNED NOT NULL,
  `Dia` varchar(1) NOT NULL,
  `Estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dia_profesional`
--

INSERT INTO `dia_profesional` (`ID_Dia_Profesional`, `ID_Profesional`, `Dia`, `Estado`) VALUES
(1, 1, '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `ID_Especialidad` int(10) UNSIGNED NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` text NOT NULL,
  `Estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`ID_Especialidad`, `Nombre`, `Descripcion`, `Estado`) VALUES
(1, 'Penal', 'El Derecho procesal penal es el conjunto de normas jurídicas correspondientes al derecho público interno que regulan cualquier proceso de carácter penal desde su inicio hasta su fin entre el estado y los particulares', 1),
(2, 'Administrativo', 'Derecho administrativo es aquella rama del Derecho público que regula la actividad del Estado.\r\n\r\nDentro del derecho administrativo, podemos encontrar las siguientes ramas: procesal administrativo, Responsabilidad del Estado, Derecho municipal o local, Derecho ambiental, Derecho urbanístico, Derecho vial, Derecho aduanero y Derecho migratorio', 1),
(3, 'Familia', 'Derecho de Familia', 1),
(6, 'Propiedad Intelectual', 'La propiedad intelectual es el conjunto de derechos morales y de explotación que corresponden a los autores y a otros titulares como artistas, productores, escritores, etc, respecto de las obras creadas.\r\n\r\nLos derechos que conforman la propiedad intelectual, esto es, los derechos morales y los patrimoniales, han de ser protegidos, lo que exige un asesoramiento adecuado y especializado por un abogado experto en la materia, con el fin de velar por la salvaguarda de los mismos y procurar una correcta gestión de su explotación.', 1),
(7, 'Internet', 'Especialistas en Derecho de Nuevas Tecnologías e Internet', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hora_profesional`
--

CREATE TABLE `hora_profesional` (
  `ID_Hora_Profesional` int(10) UNSIGNED NOT NULL,
  `ID_Dia_Profesional` int(10) UNSIGNED NOT NULL,
  `Hora_Inicial` varchar(15) NOT NULL,
  `Hora_Final` varchar(15) NOT NULL,
  `Estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hora_profesional`
--

INSERT INTO `hora_profesional` (`ID_Hora_Profesional`, `ID_Dia_Profesional`, `Hora_Inicial`, `Hora_Final`, `Estado`) VALUES
(1, 1, '08:00', '09:30', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `ID_Persona` int(10) UNSIGNED NOT NULL,
  `Identificacion` char(8) NOT NULL,
  `Nombres` varchar(100) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `Telefono` varchar(9) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Sexo` char(1) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `FechaRegistro` date NOT NULL,
  `Estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ID_Persona`, `Identificacion`, `Nombres`, `Apellidos`, `Telefono`, `Direccion`, `Sexo`, `FechaNacimiento`, `FechaRegistro`, `Estado`) VALUES
(1, '89009404', 'andres', 'leon', '300000000', 'calle 23', '1', '1978-11-02', '2020-11-24', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesional`
--

CREATE TABLE `profesional` (
  `ID_Profesional` int(10) UNSIGNED NOT NULL,
  `Nombres` varchar(20) NOT NULL,
  `Apellidos` varchar(20) NOT NULL,
  `Sexo` varchar(1) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `Telefono` varchar(25) DEFAULT NULL,
  `Descripcion` text,
  `ID_Especialidad` int(10) UNSIGNED NOT NULL,
  `ID_Usuario` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `Estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesional`
--

INSERT INTO `profesional` (`ID_Profesional`, `Nombres`, `Apellidos`, `Sexo`, `FechaNacimiento`, `Email`, `Direccion`, `Telefono`, `Descripcion`, `ID_Especialidad`, `ID_Usuario`, `Estado`) VALUES
(1, 'JOAQUIN ', 'SERRANOS SERRANOS', '1', '1978-11-02', 'SERRANOS@gmail.com', 'Calle 23a 60 35', '3101010101', 'nn', 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_Usuario` int(10) UNSIGNED NOT NULL,
  `Nombre_Usuario` varchar(50) NOT NULL,
  `Contrasena_Usuario` varchar(100) NOT NULL,
  `Rol_Usuario` varchar(20) NOT NULL,
  `Estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`ID_Cita`),
  ADD KEY `ID_Profesional` (`ID_Profesional`),
  ADD KEY `ID_Persona` (`ID_Persona`);

--
-- Indices de la tabla `dia_profesional`
--
ALTER TABLE `dia_profesional`
  ADD PRIMARY KEY (`ID_Dia_Profesional`),
  ADD KEY `ID_Profesional` (`ID_Profesional`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`ID_Especialidad`);

--
-- Indices de la tabla `hora_profesional`
--
ALTER TABLE `hora_profesional`
  ADD PRIMARY KEY (`ID_Hora_Profesional`),
  ADD KEY `ID_Dia_Profesional` (`ID_Dia_Profesional`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ID_Persona`);

--
-- Indices de la tabla `profesional`
--
ALTER TABLE `profesional`
  ADD PRIMARY KEY (`ID_Profesional`),
  ADD KEY `ID_Especialidad` (`ID_Especialidad`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `ID_Cita` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `dia_profesional`
--
ALTER TABLE `dia_profesional`
  MODIFY `ID_Dia_Profesional` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `ID_Especialidad` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `hora_profesional`
--
ALTER TABLE `hora_profesional`
  MODIFY `ID_Hora_Profesional` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `ID_Persona` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `profesional`
--
ALTER TABLE `profesional`
  MODIFY `ID_Profesional` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_Usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`ID_Profesional`) REFERENCES `profesional` (`ID_Profesional`),
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`ID_Persona`) REFERENCES `persona` (`ID_Persona`);

--
-- Filtros para la tabla `dia_profesional`
--
ALTER TABLE `dia_profesional`
  ADD CONSTRAINT `dia_profesional_ibfk_1` FOREIGN KEY (`ID_Profesional`) REFERENCES `profesional` (`ID_Profesional`);

--
-- Filtros para la tabla `hora_profesional`
--
ALTER TABLE `hora_profesional`
  ADD CONSTRAINT `hora_profesional_ibfk_1` FOREIGN KEY (`ID_Dia_Profesional`) REFERENCES `dia_profesional` (`ID_Dia_Profesional`);

--
-- Filtros para la tabla `profesional`
--
ALTER TABLE `profesional`
  ADD CONSTRAINT `profesional_ibfk_1` FOREIGN KEY (`ID_Especialidad`) REFERENCES `especialidad` (`ID_Especialidad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
