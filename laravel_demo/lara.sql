-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 07 2017 г., 15:25
-- Версия сервера: 5.7.17-0ubuntu0.16.04.1
-- Версия PHP: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lara`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(30) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`, `email`) VALUES
(1, 'Ivan Joker', '+7 (932) 295-18-57', 'joker@joker.loc'),
(3, 'Дарья Иванова', '+7 (923) 344-43-21', 'noch@noch.ru'),
(11, 'Григорий Петров', '+7 (343) 294-12-32', 'grigoriy@mk.loc'),
(12, 'Олег Туз', '+7 (555) 555-55-55', 'tuz@tuz.ru'),
(13, 'Дмитрий Удача', '+7 (343) 294-12-30', 'dmitrud@chk.com'),
(14, 'Виталий Берег', '+7 (325)-344-23-43', 'vbereg@hig.com'),
(15, 'Евгений J', '+7 (908) 342-64-96', 'evgjen@hop.org'),
(17, 'Василий Пупкин', '+7 (111) 111-11-11', 'pupkin@vasya.ru'),
(19, 'Игорь K', '+7 (343) 343-34-34', 'igor@ik.ru'),
(20, 'Мария Морозова', '+7 (566) 346-32-75', 'msh@morozova.org');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_02_06_112044_phones', 2),
(4, '2017_02_07_050908_all', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('resonix@yandex.ru', '$2y$10$lVaRxp866G.WC6zC8.oUu.5MmbAQTl97E8sqadnakLy1hNMSDjz7e', '2017-02-06 05:43:05');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Alex  Malozemov', 'resonix@yandex.ru', '$2y$10$.YkFJMYgIqSfkz4chMKA3uSaxRY1jvtsVUISFkXdSGkQre6t.GW8K', 'DC6X4J06Ot9fFzx5I7BufXuAwYkW0EYeZ79DBqAEMUzuF5s3WK4vFMVrNvn2', '2017-02-06 03:04:06', '2017-02-06 03:04:06'),
(2, 'tester', 'test@test.ru', '$2y$10$U6soTpEIHZQ4Owsf5fR8N.rhvF6FBnIs1Hmtn7Qq6X8KwWuP1XDqu', '9dFmuhkbKbp7WtuWwuniFfmZu9AscqsoHnvsnGIZq5gsn2YBAEGe9tszUbwA', '2017-02-06 05:30:24', '2017-02-06 05:30:24'),
(3, 'Ivan Ivanov', 'ivan@ivan.ru', '$2y$10$0MK8jcK5mfEE0eurL8S3kO40PfEakF8z4Ih8s6PIEnX6aV/ge.vUu', 'J89CQNIzRp2fKorZFXrIoDJGE5DsVWyuopSB5ctu7Ip1chqYNG4OLCtybJZA', '2017-02-06 05:33:45', '2017-02-06 05:33:45');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
