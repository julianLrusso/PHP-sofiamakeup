-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2021 a las 23:06:23
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dw3_lopezrusso_julian`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categorias` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categorias`, `nombre`) VALUES
(1, 'maquillaje'),
(2, 'skincare'),
(3, 'accesorios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(10) UNSIGNED NOT NULL,
  `categoria_id` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `precio` float NOT NULL,
  `descripcion` text NOT NULL,
  `texto` mediumtext NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `categoria_id`, `nombre`, `precio`, `descripcion`, `texto`, `imagen`, `alt`, `usuario_id`) VALUES
(1, 3, 'Vinchas Skincare', 300, 'Cómodas, funcionales y muy combinables. Además son reutilizables.', 'Ideal para tu rutina skincare.\r\n¡Que tu cabello no te moleste nunca más!\r\nCómodas, funcionales y muy combinables. Además son reutilizables.', 'vinchas300x300.jpg', 'Vinchas hechas a mano', 1),
(2, 2, 'Promoter Exel', 899, 'Una fórmula creada por el laboratorio Exel para lograr unas pestañas y cejas que destaquen tu mirada.', 'Es muy importante cuidarte las pestañas, y más si usas máscara de pestañas a diario. Estimulá su crecimiento y fortalecelas con Promoter. Una fórmula creada por el laboratorio Exel para lograr unas pestañas y cejas que destaquen tu mirada.\r\nModo de uso: Sostener el envase aproximadamente de 15 a 20 cm de distancia de los ojos y con los parpados bien cerrados rociar el spray directamente sobre su superficie. Mantener los parpados cerrados durante unos 5 segundos y abrirlos. Se recomienda utilizarlo 2 a 3 veces por día.', 'exepromoter300x300.jpg', 'Promoter marca exel', 1),
(3, 2, 'Lidherma crema Hydrapore', 1160, 'Alivia la sensación de tirantez y brinda elasticidad y suavidad.', 'Alivia la sensación de tirantez y brinda elasticidad y suavidad.\r\nIndicada para toda edad y en todo tipo de piel, con muy buena tolerancia en pieles sensibles y grasas deshidratadas.', 'hydrapore300x300.jpg', 'Crema Hydrapore de Lidherma', 1),
(4, 3, 'Pads reutilizables', 300, 'Los pads estan hechos a manos, de tela lavable, muy suaves de un lado y del otro lado son para exfoliar', 'Los pads estan hechos a manos, hechos de tela lavable, muy suaves de un lado para desmaquillar y del otro lado son de tela de toalla como para exfoliar o retirar una mascarilla.\r\nSe humedecen, se los pueden pasar solos húmedos o con el producto que utilicen. Después de que los hayan utilizado los limpian con jabon blanco o natural y los dejan secar.\r\n¡Dejemos atrás el algodón, cuidemos el medioambiente!', 'pads300x300.jpg', 'Pads hechos a mano', 1),
(5, 2, 'Idraet Vitamin C serum', 1499, 'Repara las pieles dañadas o prematuramente envejecidas⁣.', 'Repara las pieles dañadas o prematuramente envejecidas⁣.\r\nMejora visiblemente el tono de la piel e incentiva producción de colágeno.⁣\r\nDisminuye el aspecto de manchas y pecas⁣.\r\nIndicado para casos de flacidez, pieles fumadoras o fotodañas⁣.', 'vitaminc300x300.jpg', 'Serum con vitamina c marca Idraet', 1),
(6, 2, 'Ultra Renova pads', 799, 'Sirven para realizar una limpieza profunda y renovar nuestra piel. Mejora manchas, lesiones por sol, acné, control de sebo (oleosidad).', 'Los Ultra renova pads son un tipo de exfoliación química, donde a diferencia de los exfoliantes mas comunes (es decir, físicos, con granitos), no tenemos que hacer fuerza ni enjuagar.⁣\r\nSirven para realizar una limpieza profunda y renovar nuestra piel. Mejora manchas, lesiones por sol, acné, control de sebo (oleosidad).\r\nEs recomendado para pieles normales, mixtas o grasas. Apto toda edad.', 'lidhermapads300x300.jpg', 'Pads Ultra Renova marca Lidherma', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` varchar(140) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `email`, `password`) VALUES
(1, 'usuario', 'prueba', 'usuarioprueba@prueba.com', '$2y$10$qDnmN9zNmMCJ/VYvLLp5F.SIeG/MdB9MXZLUUMkT.qu8xjxk9wXtq');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categorias`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `categoria_id_idx` (`categoria_id`),
  ADD KEY `usuario_id_idx` (`usuario_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `categoria_id` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id_categorias`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
