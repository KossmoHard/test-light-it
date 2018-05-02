-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Май 02 2018 г., 13:19
-- Версия сервера: 10.1.31-MariaDB-cll-lve
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `schur186_light`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Projects`
--

CREATE TABLE `Projects` (
  `Id` int(11) NOT NULL,
  `Name` text CHARACTER SET latin1 NOT NULL,
  `color` text CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Projects`
--

INSERT INTO `Projects` (`Id`, `Name`, `color`) VALUES
(90, 'Other', 'FA8F14'),
(89, 'Music', '1CCC16'),
(88, 'Home', '2900CC'),
(87, 'Work', 'F02E07');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `name_task` text CHARACTER SET latin1 NOT NULL,
  `priority` text CHARACTER SET latin1 NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `date2` date NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`task_id`, `name_task`, `priority`, `date`, `status`, `date2`, `project_id`) VALUES
(144, 'New', 'low', '2018-05-08 11:53:02', 1, '2018-05-08', 88),
(143, 'Ð¢ÐµÑÑ‚ Ñ€ÐµÐ´Ð°ÐºÑ‚herh', 'hight', '2018-05-02 22:52:03', 1, '2018-05-02', 90),
(142, 'bbrtbrt', 'not_done', '2018-05-02 10:29:14', 1, '2018-05-02', 87),
(141, 'Test done', 'hight', '2018-05-03 10:20:04', 0, '2018-05-03', 90),
(140, 'Buy guitar', 'low', '2018-05-02 21:19:22', 1, '2018-05-02', 89),
(138, 'Test work edit', 'hight', '2018-05-02 23:17:55', 1, '2018-05-02', 87),
(139, 'Send email', 'low', '2018-05-02 21:18:56', 1, '2018-05-02', 87),
(137, 'Jogging', 'middle', '2018-05-02 23:17:13', 1, '2018-05-02', 90),
(136, 'To wash the dishes', 'middle', '2018-05-02 23:15:17', 1, '2018-05-02', 88),
(135, 'Todo Test task', 'not_done', '2018-05-01 10:14:24', 1, '2018-05-01', 90);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET latin1 NOT NULL,
  `email` text CHARACTER SET latin1 NOT NULL,
  `password` text CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(38, 'greheh', 'Test@teshehet.com', '123456'),
(37, 'Test2', 'Test2@test.com', '123456'),
(36, 'Test', 'Test@test.com', '123456'),
(35, 'hsdh', 'bgsdhsdh@gmail.com', '11qwerty11qz'),
(34, 'hsdh', 'zvladsz@gmail.com', '11qwerty11qz');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Projects`
--
ALTER TABLE `Projects`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Projects`
--
ALTER TABLE `Projects`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
