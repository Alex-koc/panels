-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 20 2020 г., 07:02
-- Версия сервера: 5.6.41
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `magazin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `user`, `name`, `text`, `photo`) VALUES
(1, 1, 'Новый завоз', 'Фрукты и овощи! У нас новое поступление самой свежей и натуральной продукции! Успейте приобрести', '134834263.jpg'),
(2, 4, 'Инжир', 'Новый товар в нашем ассортименте! Вкусный инжир!', '143-1.jpg'),
(3, 4, 'Продукты для похудения', 'Уже совсем скоро ожидается завоз продуктов для похудения', 'produkti_bistro.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `carts`
--

INSERT INTO `carts` (`id`, `id_orders`, `id_prod`, `count`) VALUES
(1, 5, 2, 2),
(2, 5, 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(4, 'Яблоки'),
(5, 'Мандарины'),
(6, 'Апельсины'),
(7, 'Экзотические');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `art` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `art`, `user`, `text`) VALUES
(1, 2, 3, 'Понял-принял'),
(2, 1, 4, 'Хорошие товары, высший сорт, цена приятная! Чудо а не магазмн'),
(3, 3, 5, 'Вкусно'),
(4, 0, 0, ''),
(5, 2, 4, 'Очень Вкусно!!!'),
(6, 2, 4, 'Оаыаыа'),
(7, 2, 1, 'Новый товар');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `adres`) VALUES
(1, 'Андрей', 'Лермонтова', '+53535353'),
(2, 'Андрей', 'Лермонтова', '+53535353'),
(3, 'Мандарины', 'sffsfsf', 'fsfsf'),
(4, 'Мандарины', 'sffsfsf', 'fsfsf'),
(5, 'Мандарины', 'sffsfsf', 'fsfsf');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `сat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `text`, `price`, `photo`, `сat`) VALUES
(2, 'Яблоко', 'Марроко', '15', '100165.aromatizator-ngf---zelenoe-yabloko.500x0.jpg', 0),
(3, 'Яблоко', 'Дагестан', '12', 'depositphotos_16322913-stock-photo-red-apple.jpg', 0),
(4, 'Мандарин', 'Сладкий', '17', '6XZSr6ddCl6cxfo0UchP.jpg', 0),
(5, 'Апельсин', 'Кислый из Марроко', '15', 'unnamed (1).jpg', 0),
(6, 'Банан', 'Африка', '18', 'Без названия.jfif', 0),
(7, 'Инжир', 'Плод фигового дерева', '40', '143-1.jpg', 0),
(8, 'Гуава', 'Сладкая, свежая', '28', 'guava.jpg', 0),
(9, 'Манго', 'Плод манго', '22', 'манго-1200x900.jpg', 0),
(10, 'Личи', 'Спелые', '30', 'личи.jpg', 0),
(11, 'Дуриан', 'Горький', '30', '16_2_durian-1.jpg', 0),
(12, 'Айва', 'Жёлтая', '32', 'айва.jpg', 0),
(13, 'Гранат', 'Красный, вкусный', '28', 'pomegranate.jpg', 0),
(14, 'Питая', 'Свежая', '40', 'hqdefault.jpg', 0),
(15, 'Хурма', 'Оранжевая', '33', 'hurma_polza_i_vred.jpg', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `admin` int(1) NOT NULL,
  `login` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `admin`, `login`, `name`, `phone`, `password`) VALUES
(1, 2, 'Admin', 'Администратор', '+3131312313', 'e3afed0047b08059d0fada10f400c1e5'),
(2, 1, 'User', 'Андрей', '+32323213131', '202cb962ac59075b964b07152d234b70'),
(3, 1, 'Lolka', 'Александр', '+1213131121', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 1, 'Tolia', 'Толя', '+86363632', '698d51a19d8a121ce581499d7b701668'),
(5, 1, 'JJ', 'Иван', '3457438954879', '698d51a19d8a121ce581499d7b701668');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
