-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 23 2020 г., 22:49
-- Версия сервера: 5.5.44-log
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `jjj`
--

-- --------------------------------------------------------

--
-- Структура таблицы `аутентификация`
--

CREATE TABLE IF NOT EXISTS `аутентификация` (
  `номер_аунт` int(11) NOT NULL,
  `номер_пользователя` int(11) NOT NULL,
  `ip_пользователя` int(11) NOT NULL,
  `дата` time NOT NULL,
  `номер_сессии` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `заказы`
--

CREATE TABLE IF NOT EXISTS `заказы` (
  `id` int(11) NOT NULL,
  `пользователь` int(11) NOT NULL,
  `техника` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `заказы`
--

INSERT INTO `заказы` (`id`, `пользователь`, `техника`) VALUES
(1, 1, '1 ,2 ,3'),
(2, 2, '1 ,3'),
(3, 2, '1 ,2 ,3 ,4 ,5 ,6'),
(4, 2, '1 ,2 ,3');

-- --------------------------------------------------------

--
-- Структура таблицы `пользователи`
--

CREATE TABLE IF NOT EXISTS `пользователи` (
  `номер_пользователя` int(11) NOT NULL,
  `логин` varchar(50) NOT NULL,
  `пароль` int(11) DEFAULT NULL,
  `имя` varchar(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `пользователи`
--

INSERT INTO `пользователи` (`номер_пользователя`, `логин`, `пароль`, `имя`) VALUES
(1, 'admin', 123, 'ADMIN'),
(2, 'dswd', 12, 'Ярослав'),
(3, 'dswd2', 1, 'N');

-- --------------------------------------------------------

--
-- Структура таблицы `техника`
--

CREATE TABLE IF NOT EXISTS `техника` (
  `id` int(11) NOT NULL,
  `фото` varchar(1000) NOT NULL,
  `марка` varchar(1000) NOT NULL,
  `модель` varchar(1000) NOT NULL,
  `цена` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `техника`
--

INSERT INTO `техника` (`id`, `фото`, `марка`, `модель`, `цена`) VALUES
(1, '/pic/texnika/buldozer.jpg', 'TOMCST', 'buldozeeer', 12000),
(2, '/pic/texnika/ekpog.jpg', 'JCB', 'J100', 7000),
(3, '/pic/texnika/frontpogr.jpg', 'JCB', 'CAST', 8900),
(4, '/pic/texnika/gysenich.jpg', 'JCB', 'EXC', 15899),
(5, '/pic/texnika/mini-bara.jpg', 'Беларус', '920', 3560),
(6, '/pic/texnika/samosval.jpg', 'Камаз', 'Камаз', 12000);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `аутентификация`
--
ALTER TABLE `аутентификация`
  ADD PRIMARY KEY (`номер_аунт`);

--
-- Индексы таблицы `заказы`
--
ALTER TABLE `заказы`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `пользователи`
--
ALTER TABLE `пользователи`
  ADD PRIMARY KEY (`номер_пользователя`);

--
-- Индексы таблицы `техника`
--
ALTER TABLE `техника`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `аутентификация`
--
ALTER TABLE `аутентификация`
  MODIFY `номер_аунт` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT для таблицы `заказы`
--
ALTER TABLE `заказы`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `пользователи`
--
ALTER TABLE `пользователи`
  MODIFY `номер_пользователя` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `техника`
--
ALTER TABLE `техника`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
