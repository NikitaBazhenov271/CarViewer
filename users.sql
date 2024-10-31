-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 22 2024 г., 22:03
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `CarViewer`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `name`) VALUES
(1, 'student', '6efe21577d9e96c7edce1347afae8000', 'mike'),
(2, 'qwerty', '6efe21577d9e96c7edce1347afae8000', 'mike'),
(3, 'zxcvb', '6efe21577d9e96c7edce1347afae8000', 'aaa'),
(4, 'login', '6efe21577d9e96c7edce1347afae8000', 'name'),
(5, 'bazhenov_n_e', '6efe21577d9e96c7edce1347afae8000', 'nikita'),
(6, 'bazhenov_n_e', '6efe21577d9e96c7edce1347afae8000', 'ktotam'),
(7, 'nikita', '8068097158f682af1d65f81e72e875b3', 'nikita'),
(8, 'nikita', 'd8a44867701aa04658aab69d7f7aad65', 'nikita'),
(9, 'nikita', 'e48341b22f0eed0d468c673da3c3877f', 'nikita'),
(10, 'nikita', 'e48341b22f0eed0d468c673da3c3877f', 'nikita'),
(11, 'nikita', 'e48341b22f0eed0d468c673da3c3877f', 'nikita'),
(12, 'nikita', 'e48341b22f0eed0d468c673da3c3877f', 'nikita'),
(13, 'nikita', 'e48341b22f0eed0d468c673da3c3877f', 'nikita'),
(14, 'nikita', 'e48341b22f0eed0d468c673da3c3877f', 'nikita'),
(15, 'bazhenov_n_e', '6efe21577d9e96c7edce1347afae8000', 'musdof'),
(16, '123123', '6c398da6ae626dd7cf93da791a1d0059', '1231233');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
