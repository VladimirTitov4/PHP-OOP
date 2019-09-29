-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Сен 29 2019 г., 18:39
-- Версия сервера: 8.0.15
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rusdom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `id_good` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `session_id`, `id_good`, `qty`) VALUES
(258, '6je9gu8saq14vee0pm8tj0kbm4nnmrop', 3, 1),
(259, '6je9gu8saq14vee0pm8tj0kbm4nnmrop', 4, 1),
(260, 'pvglklct2kqn1on6vj7hsufnissafgb7', 3, 1),
(261, 'pvglklct2kqn1on6vj7hsufnissafgb7', 2, 1),
(262, 'pvglklct2kqn1on6vj7hsufnissafgb7', 2, 1),
(263, 'pvglklct2kqn1on6vj7hsufnissafgb7', 2, 1),
(264, 'pvglklct2kqn1on6vj7hsufnissafgb7', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Спорт'),
(2, 'Политика');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `feedback` text NOT NULL,
  `id_img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`, `id_img`) VALUES
(15, 'Владимир', 'Отзыв', 2),
(17, 'Владимир', 'Отзыв', 2),
(18, 'Анастасия', 'Отзыв', 2),
(19, '', '', 2),
(20, '', '', 2),
(21, 'Владимир', 'Отзыв', 2),
(22, 'Владимир', 'Отзыв', 2),
(23, 'Владимир', 'Отзыв к товару 1', 1),
(24, '', '', 1),
(25, '', '', 2),
(26, 'Владимир', 'Отзыв', 2),
(28, 'Владимир', 'Отзыв', 3),
(30, 'Владимир', 'Отзыв', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` text NOT NULL,
  `description` text NOT NULL,
  `seen` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `price`, `description`, `seen`) VALUES
(1, '01.jpg', '100', 'description', 40),
(2, '02.jpg', '100', 'description', 124),
(3, '03.jpg', '100', 'description', 13),
(4, '04.jpg', '100', 'description', 0),
(5, '05.jpg', '100', 'description', 2),
(6, '06.jpg', '100', 'description', 96),
(7, '07.jpg', '100', 'description', 6),
(8, '08.jpg', '100', 'description', 1),
(9, '09.jpg', '100', 'description', 3),
(10, '10.jpg', '100', 'description', 0),
(11, '11.jpg', '100', 'description', 25),
(12, '12.jpg', '100', 'description', 1),
(13, '13.jpg', '100', 'description', 1),
(14, '14.jpg', '100', 'description', 1),
(15, '15.jpg', '100', 'description', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_session` text NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `id_session`, `name`, `phone`, `status`) VALUES
(36, 'g6a1g5echctd5u8l9qnd83mathv84913', 'Владимир', '89277795290', 'обработан'),
(37, 'qd2illfah8oo2lts0oke4aage9jdg6f2', 'Анастасия', '89879700137', 'новый'),
(38, 'qd2illfah8oo2lts0oke4aage9jdg6f2', 'Иван', '111', 'новый');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `hash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`) VALUES
(1, 'admin', '$2y$10$GAh95KWqFf1Fw4YyH/BCnuODYbJ1Mln78vDuOIwj7WQvChhR8QcX.', '21255787435d641ba0296111.41509116');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
