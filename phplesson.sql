-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Фев 09 2020 г., 12:55
-- Версия сервера: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- Версия PHP: 7.2.24-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `phplesson`
--

-- --------------------------------------------------------

--
-- Структура таблицы `carts`
--

CREATE TABLE `carts` (
  `order_id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_img` varchar(250) NOT NULL,
  `product_col` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `carts`
--

INSERT INTO `carts` (`order_id`, `product_id`, `product_name`, `product_price`, `product_img`, `product_col`) VALUES
(19, 1, 'Xiaomi Redmi Note Black', '16490.00', 'smartfon_xiaomi_redmi_note_8_64gb_4gb_white_belyy.png', 2),
(19, 2, 'Xiaomi Redmi Note Black White', '16980.00', 'smartfon_xiaomi_mi_9_lite_128gb_6gb_black_chernyy.jpg', 3),
(21, 1, 'Xiaomi Redmi Note Black', '16490.00', 'smartfon_xiaomi_redmi_note_8_64gb_4gb_white_belyy.png', 2),
(21, 2, 'Xiaomi Redmi Note Black White', '16980.00', 'smartfon_xiaomi_mi_9_lite_128gb_6gb_black_chernyy.jpg', 2),
(22, 1, 'Xiaomi Redmi Note Black', '16490.00', 'smartfon_xiaomi_redmi_note_8_64gb_4gb_white_belyy.png', 1),
(22, 2, 'Xiaomi Redmi Note Black White', '16980.00', 'smartfon_xiaomi_mi_9_lite_128gb_6gb_black_chernyy.jpg', 3),
(23, 1, 'Xiaomi Redmi Note Black', '16490.00', 'smartfon_xiaomi_redmi_note_8_64gb_4gb_white_belyy.png', 1),
(23, 2, 'Xiaomi Redmi Note Black White', '16980.00', 'smartfon_xiaomi_mi_9_lite_128gb_6gb_black_chernyy.jpg', 2),
(23, 3, 'Xiaomi Mi 9 Lite Black', '16980.00', 'smartfon_xiaomi_redmi_note_8_pro_64gb_6gb_white_belyy.png', 3),
(25, 1, 'Xiaomi Redmi Note Black', '16490.00', 'smartfon_xiaomi_redmi_note_8_64gb_4gb_white_belyy.png', 1),
(25, 2, 'Xiaomi Redmi Note Black White', '16980.00', 'smartfon_xiaomi_mi_9_lite_128gb_6gb_black_chernyy.jpg', 3),
(26, 1, 'Xiaomi Redmi Note Black', '16490.00', 'smartfon_xiaomi_redmi_note_8_64gb_4gb_white_belyy.png', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `id_image` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `text` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `id_image`, `name`, `date`, `text`) VALUES
(1, 1, 'Вася', '2020-01-31 21:00:00', 'Прикольная фотка'),
(2, 1, 'Коля', '2019-11-11 21:00:00', 'Плохая фотка'),
(4, 1, 'Вася', '2020-02-01 21:53:39', 'Прикольная фотка'),
(7, 4, 'Василий Петров', '2020-02-01 22:03:29', 'Самая лучшая фотка на свете'),
(8, 4, 'Светогор Белинский', '2020-02-02 07:14:50', 'Не понравилось.'),
(9, 2, 'Иванов Иван', '2020-02-02 12:25:30', 'Замечательно, положительно, фигня.'),
(10, 3, 'Вася', '2020-02-02 13:26:50', 'Мой первый отзыв'),
(11, 2, 'Коля', '2020-02-03 14:11:24', 'Какая-то странная картинка'),
(12, 3, 'Коля', '2020-02-03 14:13:03', 'ывфа фыв ывафп ыва прыв'),
(13, 3, 'Коля Иванов', '2020-02-03 14:16:52', 'Замечательная картинка '),
(14, 3, 'Коля Козлов', '2020-02-03 14:18:07', '1111111111111111111111'),
(15, 2, 'Василий Петров', '2020-02-03 14:22:07', 'Замечательная картинка.'),
(16, 4, 'Егор', '2020-02-03 14:30:05', 'Прикольная фота'),
(17, 1, 'Коля', '2020-02-04 12:54:56', 'Класс!!!');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(10) NOT NULL,
  `mini` varchar(50) NOT NULL,
  `max` varchar(50) NOT NULL,
  `countclick` int(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `mini`, `max`, `countclick`) VALUES
(1, 'images/min/1.jpg', 'images/max/1.jpg', 83),
(2, 'images/min/2.jpg', 'images/max/2.jpg', 73),
(3, 'images/min/3.jpg', 'images/max/3.jpg', 48),
(4, 'images/min/4.jpg', 'images/max/4.jpg', 73);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_login` varchar(50) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `user_login`, `order_date`) VALUES
(19, 14, 'admin222', '2020-02-08 13:39:42'),
(21, 14, 'admin222', '2020-02-08 14:59:59'),
(22, 11, 'user1', '2020-02-09 06:22:46'),
(23, 11, 'user1', '2020-02-09 08:48:02'),
(25, 15, 'user2', '2020-02-09 09:48:59'),
(26, 12, 'admin321', '2020-02-09 09:53:54');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `product_type` int(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` decimal(10,0) NOT NULL,
  `product_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `product_type`, `product_name`, `product_price`, `product_img`) VALUES
(1, 1, 'Xiaomi Redmi Note Black', '16490', 'smartfon_xiaomi_redmi_note_8_64gb_4gb_white_belyy.png'),
(2, 1, 'Xiaomi Redmi Note Black White', '16980', 'smartfon_xiaomi_mi_9_lite_128gb_6gb_black_chernyy.jpg'),
(3, 1, 'Xiaomi Mi 9 Lite Black', '16980', 'smartfon_xiaomi_redmi_note_8_pro_64gb_6gb_white_belyy.png');

-- --------------------------------------------------------

--
-- Структура таблицы `products_type`
--

CREATE TABLE `products_type` (
  `type_id` int(10) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products_type`
--

INSERT INTO `products_type` (`type_id`, `type_name`) VALUES
(1, 'Смартфон'),
(2, 'Телефон');

-- --------------------------------------------------------

--
-- Структура таблицы `product_info`
--

CREATE TABLE `product_info` (
  `info_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_length` decimal(10,2) NOT NULL,
  `product_width` decimal(10,2) NOT NULL,
  `product_color` varchar(50) NOT NULL,
  `product_ram` int(10) NOT NULL,
  `product_hdd` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `product_info`
--

INSERT INTO `product_info` (`info_id`, `product_id`, `product_length`, `product_width`, `product_color`, `product_ram`, `product_hdd`) VALUES
(1, 1, '6.00', '2.00', 'Черный', 8, 128),
(2, 2, '6.00', '7.00', 'белый', 16, 256),
(5, 3, '6.50', '7.50', 'белый', 16, 128);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `login` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(2) NOT NULL DEFAULT '0',
  `name` varchar(30) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `is_admin`, `name`, `address`, `phone`) VALUES
(1, 'admin', '$2y$10$g/FsmaNR29nTmM9zo6dILOsP3wBDcYpnIyqUK6JnFRBZ9pbzniYym', 1, 'Вася', '', ''),
(11, 'user1', '$2y$10$lHHdaLYUIFWnWiuRYWwvEu720BclTiPyAfrmLxA7vWkGMfMY4Dyke', 0, 'Коля', '', ''),
(12, 'admin321', '$2y$10$4X3RWZLt7KcP3cgxMxfGPO0OgJ78Regsf9XyJyKKue6gASFj7xb/q', 0, 'Василий', 'Петербург', '89602502546'),
(14, 'admin222', '$2y$10$tMHNRSwjwgd5k79.ou2iTuwTz0Rtd34WWk1fgc07jqqRVkHn5MPzS', 0, 'Маша', '1-а микрорайон, 40', '89602502546'),
(15, 'user2', '$2y$10$1Y0CFjBNxkH.anvO3X4bFupoyp.4ViaSz6nUK3gBjKxC7aJz1jHum', 0, 'Василий Васильев', 'г Самара', '89602502546');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `carts`
--
ALTER TABLE `carts`
  ADD UNIQUE KEY `order_id_2` (`order_id`,`product_id`) USING BTREE,
  ADD KEY `order_id` (`order_id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_image` (`id_image`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_type` (`product_type`);

--
-- Индексы таблицы `products_type`
--
ALTER TABLE `products_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Индексы таблицы `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`info_id`),
  ADD KEY `products_id` (`product_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `products_type`
--
ALTER TABLE `products_type`
  MODIFY `type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `product_info`
--
ALTER TABLE `product_info`
  MODIFY `info_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_image`) REFERENCES `images` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
