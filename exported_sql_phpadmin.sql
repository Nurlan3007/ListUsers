-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 26 2024 г., 11:33
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `for_test_task`
--

-- --------------------------------------------------------

--
-- Структура таблицы `phones`
--

CREATE TABLE `phones` (
                          `id` bigint UNSIGNED NOT NULL,
                          `phone` varchar(100) NOT NULL,
                          `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `phones`
--

INSERT INTO `phones` (`id`, `phone`, `user_id`) VALUES
                                                    (6, '+77057092640', 7),
                                                    (7, '87057092640', 7),
                                                    (8, '87776002310', 7),
                                                    (11, '+78005553590', 10),
                                                    (12, '89001231233', 10),
                                                    (13, '+77032892321', 10),
                                                    (14, '+77057032321', 16),
                                                    (15, '87774302310', 23),
                                                    (16, '89392431112', 11);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
                         `id` bigint UNSIGNED NOT NULL,
                         `first_name` varchar(50) NOT NULL,
                         `last_name` varchar(50) NOT NULL,
                         `email` varchar(100) NOT NULL,
                         `company_name` varchar(50) DEFAULT NULL,
                         `position` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `company_name`, `position`) VALUES
                                                                                               (7, 'Nurlan', 'Marat', 'maratnurlan3007@gmail.com', 'Aitu', 'PHP'),
                                                                                               (10, 'Amir', 'Amangeldinov', 'amir@mail.ru', 'AstanaHub', 'Big Data'),
                                                                                               (11, 'Dastan ', 'Mukhan', 'Mukhan@mail.ru', 'ENU', 'Student'),
                                                                                               (12, 'Anel ', 'Satybaldinova', 'Satybaldinova@gmail.ru', '', ''),
                                                                                               (13, 'Alexey ', 'Safonov', 'Safonov@gmail.com', '', ''),
                                                                                               (14, 'Denis ', 'Pak', 'Pak@mail.dog', '', ''),
                                                                                               (15, 'NARGIZ ', 'MOLDAGALIYEVA', 'MOLDAGALIYEVA@mail.ru', '', ''),
                                                                                               (16, 'Damir ', 'Manatbekov', 'Manatbekov@mail.ru', '', ''),
                                                                                               (17, 'Arsen ', 'Maxutov', 'Maxuto@gmail.com', '', ''),
                                                                                               (18, 'Amirkhan ', 'Salimgerey', 'Salimgerey@gmail.com', '', ''),
                                                                                               (19, 'Adilet Samigulla', 'Samigulla', 'AdiletSamigulla@gmail.com', '', ''),
                                                                                               (20, 'Madiyar ', 'Rakhmangali', 'MadiyarRakhmangali@gmail.com', '', ''),
                                                                                               (21, 'Abdulla Satanov', 'Satanov', 'Abdulla@gmail.com', '', ''),
                                                                                               (22, 'Margulan Kassymkhan', 'Kassymkhan', 'MargulanKassymkhan@mail.ru', '', ''),
                                                                                               (23, 'Aruan Rakhimov', 'Rakhimov', 'Aruan90Rakhimov@gmail.com', '', ''),
                                                                                               (24, 'Alen', 'Issayev', 'alen@mail.ru', 'Mind games', 'Boss');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `phones`
--
ALTER TABLE `phones`
    ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `phones`
--
ALTER TABLE `phones`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `phones`
--
ALTER TABLE `phones`
    ADD CONSTRAINT `phones_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
