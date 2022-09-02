-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2020 a las 23:49:20
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `documental`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

CREATE TABLE `archivo` (
  `cod_arch` int(11) NOT NULL,
  `nom_arch` varchar(200) DEFAULT NULL,
  `num_arch` varchar(200) DEFAULT NULL,
  `tip_arch` varchar(200) DEFAULT NULL,
  `desc_arch` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `archivo`
--

INSERT INTO `archivo` (`cod_arch`, `nom_arch`, `num_arch`, `tip_arch`, `desc_arch`) VALUES
(1, 'A', '1', 'Central 1.', 'Primer archivo central.'),
(3, 'A', '2', 'Central', 'Archivo central 2.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carpeta`
--

CREATE TABLE `carpeta` (
  `cod_carp` int(11) NOT NULL,
  `cod_tip_carp` int(11) NOT NULL,
  `cod_reg_oper` int(11) NOT NULL,
  `des_carp` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_propiedad`
--

CREATE TABLE `categoria_propiedad` (
  `id_cat_prop` int(11) NOT NULL,
  `nom_cat_prop` varchar(200) DEFAULT NULL,
  `desc_cat_prop` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria_propiedad`
--

INSERT INTO `categoria_propiedad` (`id_cat_prop`, `nom_cat_prop`, `desc_cat_prop`) VALUES
(2900, 'Inmuebles', 'Inmueble de vivienda y comerciales.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `id_con` int(11) NOT NULL,
  `ced_pers_con` int(11) NOT NULL,
  `cod_reg_oper_con` int(11) NOT NULL,
  `id_tip_pers_con` int(11) NOT NULL,
  `orden_tip_pers_con` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `cod_doc` int(11) NOT NULL,
  `cod_carp` int(11) NOT NULL,
  `id_subse` int(11) NOT NULL,
  `nom_doc` varchar(200) NOT NULL,
  `desc_doc` varchar(200) NOT NULL,
  `tip_arch_doc` varchar(200) NOT NULL,
  `orden_doc` int(200) NOT NULL,
  `cod_doc_prop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_emp` int(11) NOT NULL,
  `nit_emp` varchar(200) NOT NULL,
  `nom_emp` varchar(200) NOT NULL,
  `dir_emp` varchar(200) DEFAULT NULL,
  `reg_emp` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_emp`, `nit_emp`, `nom_emp`, `dir_emp`, `reg_emp`) VALUES
(1, '8905013522', 'Vivienda y Valores S.A', 'Calle 11 1E - 145 Cúcuta CENTRO DE NEGOCIOS L-4', 'Sociedad Comercial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operacion`
--

CREATE TABLE `operacion` (
  `cod_reg_oper` int(11) NOT NULL,
  `id_tip_oper` int(11) NOT NULL,
  `id_prop` int(11) NOT NULL,
  `desc_oper` varchar(200) DEFAULT NULL,
  `cod_reg_oper_dep` int(11) NOT NULL,
  `estado_oper` int(11) NOT NULL,
  `fec_oper` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `ced_pers` int(11) NOT NULL,
  `id_emp` int(11) NOT NULL,
  `nom_pers` varchar(200) DEFAULT NULL,
  `ape_pers` varchar(200) DEFAULT NULL,
  `fec_exp_ced_pers` date DEFAULT NULL,
  `cel_pers` varchar(200) DEFAULT NULL,
  `tel_pers` varchar(200) DEFAULT NULL,
  `email_pers` varchar(200) DEFAULT NULL,
  `sex_pers` varchar(20) DEFAULT NULL,
  `dir_pers` varchar(200) DEFAULT NULL,
  `ciud_pers` varchar(200) DEFAULT NULL,
  `fec_reg_pers` varchar(200) DEFAULT NULL,
  `fec_act_pers` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ced_pers`, `id_emp`, `nom_pers`, `ape_pers`, `fec_exp_ced_pers`, `cel_pers`, `tel_pers`, `email_pers`, `sex_pers`, `dir_pers`, `ciud_pers`, `fec_reg_pers`, `fec_act_pers`) VALUES
(109034939, 1, 'Luis', 'Manuel', '1991-03-07', '321939393', '584940', 'todo@gmail.com', 'Masculino', 'calle 20', 'Cucuta', '2020-11-02', '2020-12-30'),
(109493939, 1, 'Lucia Fanny', 'Martinez Acevedo', '1994-01-23', '5893939', '5893939', 'lucia@gmail.com', 'Femenino', 'calle 10 Centro', 'Cucuta', '1604980006', '2020-11-10'),
(1090321234, 1, 'Jaime Luis', 'Laguado Lemus', '1999-11-02', '3208971235', '5789012', 'jaimeluis@gmail.com', 'Masculino', 'Av 2 Cll 12 Centro', 'Cúcuta', '2020-11-21', '2020-12-04'),
(1091222333, 1, 'Josefina Finja', 'Ferrer Montes', '2000-03-12', '3217899090', '5783344', 'josefina@gmail.com', 'Femenino', 'Av 2 Calle 25 Centro', 'Cúcuta', '2020-12-03', '2020-12-04'),
(1092345789, 1, 'Jaime Luis', 'Roa Boada', '2000-12-02', '3212901095', '5802030', 'jaimeluis@gmail.com', 'Masculino', 'Av 12 Cll 12 Centro', 'Cúcuta', '2020-11-21', '2020-12-03'),
(1092999888, 1, 'Jorge Marcos', 'Ferrer Caceres', '2000-12-12', '5789034', '5789034', 'jorge@gmail.com', 'Masculino', 'Avenida 5 Calle 14 Centro', 'Cúcuta', '2020-11-12', '2020-12-04'),
(1093456890, 1, 'Fernando', 'Silva', '2003-11-03', '320393030', '5879202', 'todo@hotmail.com', 'Masculino', 'Calle 20 Centro', 'Cucuta', '2020-11-06', '2020-11-06'),
(1095677888, 1, 'Karina Sofia', 'Delgado Marquez', '1999-01-31', '3229990909', '5901233', 'karina@gmail.com', 'Femenino', 'Av 3 Cll 12 Centro', 'Cúcuta', '2020-12-03', '2020-12-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedad`
--

CREATE TABLE `propiedad` (
  `id_prop` int(11) NOT NULL,
  `id_tip_prop` int(11) NOT NULL,
  `dir_prop` varchar(200) DEFAULT NULL,
  `ubi_prop` varchar(200) DEFAULT NULL,
  `desc_prop` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nom_rol` varchar(200) DEFAULT NULL,
  `esp_rol` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nom_rol`, `esp_rol`) VALUES
(1, 'Administrador', 'Maneja todo el sistema'),
(2, 'Asesor', 'Asesor Comercial'),
(4, 'Auxiliar de Inventario', 'Gestion de inventario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serie`
--

CREATE TABLE `serie` (
  `id_serie` int(11) NOT NULL,
  `nom_serie` varchar(200) NOT NULL,
  `desc_serie` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `serie`
--

INSERT INTO `serie` (`id_serie`, `nom_serie`, `desc_serie`) VALUES
(9992, 'Contrato Mandato', 'Gestionar los anexos del contrato de mandato y su correspondiente contrato.'),
(9993, 'Contrato Arrendamiento', 'Gestión de los requisitos indispensables en el contrato de arrendamiento.'),
(9994, 'Inventario', 'Gestión de los requisitos indispensables en el inventario de un inmueble con contrato de arrendamiento.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soportes`
--

CREATE TABLE `soportes` (
  `id_sop` int(11) NOT NULL,
  `cod_docs` int(11) NOT NULL,
  `nom_sop` varchar(200) NOT NULL,
  `ext_arch_sop` varchar(100) NOT NULL,
  `orden_sop` int(200) NOT NULL,
  `rep_sop` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subserie`
--

CREATE TABLE `subserie` (
  `id_subse` int(11) NOT NULL,
  `id_serie` int(11) NOT NULL,
  `nom_subse` varchar(200) NOT NULL,
  `orden_subse` int(11) NOT NULL,
  `desc_subse` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subserie`
--

INSERT INTO `subserie` (`id_subse`, `id_serie`, `nom_subse`, `orden_subse`, `desc_subse`) VALUES
(9120, 9992, 'Requisitos Propietario', 0, 'Los requisitos correspondientes en la realización del contrato de mandato.'),
(9121, 9992, 'Requisitos Inmueble', 1, 'Gestión delos requisitos correspondientes del registro del inmueble en el contrato de mandato.'),
(9122, 9993, 'Formatos Vinculación', 0, 'Gestión de formatos de solicitud en el arrendamiento de un inmueble.'),
(9123, 9993, 'Requisitos Arrendatario', 2, 'Gestión de los requisitos correspondientes a los codeudores del contrato de arrendamiento.'),
(9124, 9993, 'Requisitos Propietario', 3, 'Requisitos correspondientes del propietario del inmueble que será parte del contrato de arrendamiento.'),
(9126, 9994, 'Levantar Inventario', 0, 'Gestionar levantamiento del inventario de un inmueble con contrato de arrendamiento.'),
(9127, 9993, 'Contrato Arrendamiento', 1, 'Gestionar el contrato arrendatario por medio del arrendatario de la vivienda.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_carpeta`
--

CREATE TABLE `tipo_carpeta` (
  `cod_tip_carp` int(11) NOT NULL,
  `cod_arch` int(11) NOT NULL,
  `nom_tip_carp` varchar(200) DEFAULT NULL,
  `orden_tip_carp` int(11) NOT NULL,
  `desc_tip_carp` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_carpeta`
--

INSERT INTO `tipo_carpeta` (`cod_tip_carp`, `cod_arch`, `nom_tip_carp`, `orden_tip_carp`, `desc_tip_carp`) VALUES
(9988, 1, 'Principal', 1, 'Carpeta Principal del contrato de arrendamiento.'),
(9989, 1, 'Auxiliar', 2, 'Se referencia a la carpeta auxiliar del contrato de arrendamiento.'),
(9990, 1, 'Inmueble', 0, 'Se referencia a la carpeta inmueble del contrato de mandato.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_operacion`
--

CREATE TABLE `tipo_operacion` (
  `id_tip_oper` int(11) NOT NULL,
  `nom_tip_oper` varchar(200) DEFAULT NULL,
  `desc_tip_oper` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_operacion`
--

INSERT INTO `tipo_operacion` (`id_tip_oper`, `nom_tip_oper`, `desc_tip_oper`) VALUES
(9920, 'Mandato', 'Realizar contrato de mandato.'),
(9921, 'Arriendo', 'Se define la operación de arriendo.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_persona`
--

CREATE TABLE `tipo_persona` (
  `id_tip_pers` int(11) NOT NULL,
  `nom_tip_pers` varchar(200) DEFAULT NULL,
  `desc_tip_pers` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_persona`
--

INSERT INTO `tipo_persona` (`id_tip_pers`, `nom_tip_pers`, `desc_tip_pers`) VALUES
(1190, 'Propietario', 'Representa el propietario del inmueble.'),
(1191, 'Arrendatario', 'Representa el cliente arrendatario del inmueble.'),
(1192, 'Codeudor', 'Es la persona que hace parte del contrato de arrendamiento.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_propiedad`
--

CREATE TABLE `tipo_propiedad` (
  `id_tip_prop` int(11) NOT NULL,
  `id_cat_prop` int(11) NOT NULL,
  `nom_tip_prop` varchar(200) DEFAULT NULL,
  `desc_tip_prop` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_propiedad`
--

INSERT INTO `tipo_propiedad` (`id_tip_prop`, `id_cat_prop`, `nom_tip_prop`, `desc_tip_prop`) VALUES
(9021, 2900, 'Vivienda', 'Lugar para vivir comodamente y relajdamente.'),
(9022, 2900, 'Comercial', 'Inmueble comercial, economico y ventas.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cod_usua` int(11) NOT NULL,
  `ced_pers` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `nom_usua` varchar(200) DEFAULT NULL,
  `pass_usua` varchar(200) DEFAULT NULL,
  `fec_ing_usua` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cod_usua`, `ced_pers`, `id_rol`, `nom_usua`, `pass_usua`, `fec_ing_usua`) VALUES
(90294, 109034939, 1, 'Manuel', '123456', '2020-11-06'),
(90295, 1093456890, 2, 'Fernando', '12345', '2020-11-06'),
(90296, 109493939, 4, 'Fanny', '12345', '2020-11-12'),
(90298, 1092999888, 4, 'JorgeM', '12345', '2020-11-12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`cod_arch`);

--
-- Indices de la tabla `carpeta`
--
ALTER TABLE `carpeta`
  ADD PRIMARY KEY (`cod_carp`,`cod_tip_carp`,`cod_reg_oper`),
  ADD KEY `cod_reg_oper` (`cod_reg_oper`),
  ADD KEY `cod_tip_carp` (`cod_tip_carp`);

--
-- Indices de la tabla `categoria_propiedad`
--
ALTER TABLE `categoria_propiedad`
  ADD PRIMARY KEY (`id_cat_prop`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id_con`),
  ADD KEY `ced_pers_con` (`ced_pers_con`),
  ADD KEY `cod_reg_oper_con` (`cod_reg_oper_con`),
  ADD KEY `id_tip_pers_con` (`id_tip_pers_con`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`cod_doc`),
  ADD KEY `cod_doc_prop` (`cod_doc`) USING BTREE,
  ADD KEY `cod_carp` (`cod_carp`),
  ADD KEY `id_subse` (`id_subse`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_emp`);

--
-- Indices de la tabla `operacion`
--
ALTER TABLE `operacion`
  ADD PRIMARY KEY (`cod_reg_oper`,`id_tip_oper`,`id_prop`) USING BTREE,
  ADD KEY `fk_operacion_tipo_operacion1_idx` (`id_tip_oper`),
  ADD KEY `fk_operacion_propiedad1_idx` (`id_prop`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ced_pers`,`id_emp`),
  ADD KEY `fk_persona_empresa_idx` (`id_emp`);

--
-- Indices de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  ADD PRIMARY KEY (`id_prop`,`id_tip_prop`),
  ADD KEY `fk_propiedad_tipo_propiedad1_idx` (`id_tip_prop`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`id_serie`);

--
-- Indices de la tabla `soportes`
--
ALTER TABLE `soportes`
  ADD PRIMARY KEY (`id_sop`),
  ADD KEY `cod_docs` (`cod_docs`);

--
-- Indices de la tabla `subserie`
--
ALTER TABLE `subserie`
  ADD PRIMARY KEY (`id_subse`,`id_serie`),
  ADD KEY `fk_subserie_serie1_idx` (`id_serie`);

--
-- Indices de la tabla `tipo_carpeta`
--
ALTER TABLE `tipo_carpeta`
  ADD PRIMARY KEY (`cod_tip_carp`,`cod_arch`),
  ADD KEY `fk_tipo_carpeta_archivo1_idx` (`cod_arch`);

--
-- Indices de la tabla `tipo_operacion`
--
ALTER TABLE `tipo_operacion`
  ADD PRIMARY KEY (`id_tip_oper`);

--
-- Indices de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
  ADD PRIMARY KEY (`id_tip_pers`);

--
-- Indices de la tabla `tipo_propiedad`
--
ALTER TABLE `tipo_propiedad`
  ADD PRIMARY KEY (`id_tip_prop`,`id_cat_prop`),
  ADD KEY `fk_tipo_propiedad_categoria_propiedad1_idx` (`id_cat_prop`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usua`,`ced_pers`,`id_rol`),
  ADD KEY `fk_usuario_persona1_idx` (`ced_pers`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivo`
--
ALTER TABLE `archivo`
  MODIFY `cod_arch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `carpeta`
--
ALTER TABLE `carpeta`
  MODIFY `cod_carp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id_con` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `cod_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `soportes`
--
ALTER TABLE `soportes`
  MODIFY `id_sop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=364;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90299;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carpeta`
--
ALTER TABLE `carpeta`
  ADD CONSTRAINT `carpeta_ibfk_1` FOREIGN KEY (`cod_tip_carp`) REFERENCES `tipo_carpeta` (`cod_tip_carp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carpeta_ibfk_2` FOREIGN KEY (`cod_reg_oper`) REFERENCES `operacion` (`cod_reg_oper`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `contrato_ibfk_1` FOREIGN KEY (`id_tip_pers_con`) REFERENCES `tipo_persona` (`id_tip_pers`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contrato_ibfk_2` FOREIGN KEY (`ced_pers_con`) REFERENCES `persona` (`ced_pers`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contrato_ibfk_3` FOREIGN KEY (`cod_reg_oper_con`) REFERENCES `operacion` (`cod_reg_oper`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `documentos_ibfk_2` FOREIGN KEY (`id_subse`) REFERENCES `subserie` (`id_subse`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `documentos_ibfk_3` FOREIGN KEY (`cod_carp`) REFERENCES `carpeta` (`cod_carp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `operacion`
--
ALTER TABLE `operacion`
  ADD CONSTRAINT `fk_operacion_propiedad1` FOREIGN KEY (`id_prop`) REFERENCES `propiedad` (`id_prop`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_operacion_tipo_operacion1` FOREIGN KEY (`id_tip_oper`) REFERENCES `tipo_operacion` (`id_tip_oper`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_persona_empresa` FOREIGN KEY (`id_emp`) REFERENCES `empresa` (`id_emp`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `propiedad`
--
ALTER TABLE `propiedad`
  ADD CONSTRAINT `fk_propiedad_tipo_propiedad1` FOREIGN KEY (`id_tip_prop`) REFERENCES `tipo_propiedad` (`id_tip_prop`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `soportes`
--
ALTER TABLE `soportes`
  ADD CONSTRAINT `soportes_ibfk_1` FOREIGN KEY (`cod_docs`) REFERENCES `documentos` (`cod_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `subserie`
--
ALTER TABLE `subserie`
  ADD CONSTRAINT `fk_subserie_serie1` FOREIGN KEY (`id_serie`) REFERENCES `serie` (`id_serie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tipo_carpeta`
--
ALTER TABLE `tipo_carpeta`
  ADD CONSTRAINT `tipo_carpeta_ibfk_1` FOREIGN KEY (`cod_arch`) REFERENCES `archivo` (`cod_arch`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipo_propiedad`
--
ALTER TABLE `tipo_propiedad`
  ADD CONSTRAINT `fk_tipo_propiedad_categoria_propiedad1` FOREIGN KEY (`id_cat_prop`) REFERENCES `categoria_propiedad` (`id_cat_prop`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_persona1` FOREIGN KEY (`ced_pers`) REFERENCES `persona` (`ced_pers`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
