-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2020 a las 05:11:53
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_swapmeet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `help_support`
--

CREATE TABLE `help_support` (
  `support_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `support` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `evaluation` int(11) NOT NULL,
  `suggestion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `help_support`
--

INSERT INTO `help_support` (`support_id`, `user_id`, `support`, `description`, `evaluation`, `suggestion`) VALUES
(13, 62, 'Mejor Intercamnio', 'no veo el precio de los articulos', 0, ''),
(18, 62, '', '', 3, 'si incluyen el precio dare mas estrellas'),
(24, 62, '', '', 3, 'si incluyen el precio dare mas estrellas'),
(25, 62, 'Mejor Intercamnio', 'no veo el precio de los articulos', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_data`
--

CREATE TABLE `products_data` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `product_description` varchar(50) DEFAULT NULL,
  `change_description` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `price_sale` varchar(50) DEFAULT NULL,
  `price_rental` varchar(20) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `time_rental` varchar(20) DEFAULT NULL,
  `sale_type` varchar(50) NOT NULL,
  `product_category` varchar(20) NOT NULL,
  `change_category` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products_data`
--

INSERT INTO `products_data` (`product_id`, `user_id`, `name`, `product_description`, `change_description`, `status`, `price_sale`, `price_rental`, `img`, `time_rental`, `sale_type`, `product_category`, `change_category`) VALUES
(79, 62, 'Balon de futbol americano', 'Solo lo usamos 5 temporadas', '', 'Nuevo', '100', '', 'products/425497pc.jpg', '', 'Venta', 'Herramientas', ''),
(80, 62, 'Consola xbox', 'Rento consola pirata con 100 juegos', '', 'Usado', '', '100 ', 'products/239975xbox.jpg', '3 dias', 'Renta', 'Electronicos', ''),
(81, 46, 'Carretilla', 'Carretilla nueva sin usarse', '', 'Usado', '', '40', 'products/261085prro.png', '1 hora', 'Renta', 'Ropa', 'Herramientas'),
(83, 46, 'Calcetines', 'Calcetin nuevo uan puesta', '', 'Nuevo', '', '100', 'products/913832calcetineswilson.jpg', '1 hora', 'Renta', 'Ropa', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `request_saaaaale`
--

CREATE TABLE `request_saaaaale` (
  `request_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `request_sale`
--

CREATE TABLE `request_sale` (
  `request_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_data`
--

CREATE TABLE `users_data` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `social_network` varchar(100) DEFAULT NULL,
  `img` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users_data`
--

INSERT INTO `users_data` (`user_id`, `first_name`, `last_name`, `password`, `age`, `email`, `address`, `phone`, `social_network`, `img`) VALUES
(46, 'yael', 'linares', 'puto', 50, 'dmorales1@uabc.edu.mx', 'col joyita', '6462230430', 'https://web.facebook.com/Yaeln18', 'users/194420yael.jpg'),
(62, 'luis', 'cozatl', 'z', 65, 'dmorales1@uabc.edu.mx', 'papeleria', '6462230956', 'https://web.facebook.com/luisalberto.hernandezcozatl/', 'users/170743luis.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indices de la tabla `help_support`
--
ALTER TABLE `help_support`
  ADD PRIMARY KEY (`support_id`);

--
-- Indices de la tabla `products_data`
--
ALTER TABLE `products_data`
  ADD PRIMARY KEY (`product_id`);

--
-- Indices de la tabla `request_sale`
--
ALTER TABLE `request_sale`
  ADD PRIMARY KEY (`request_id`);

--
-- Indices de la tabla `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `help_support`
--
ALTER TABLE `help_support`
  MODIFY `support_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `products_data`
--
ALTER TABLE `products_data`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de la tabla `request_sale`
--
ALTER TABLE `request_sale`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users_data`
--
ALTER TABLE `users_data`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
