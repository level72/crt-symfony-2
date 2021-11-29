-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 29 2021 г., 00:17
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `animals`
--

CREATE TABLE `animals` (
  `id` int NOT NULL COMMENT 'ID - уникальный идентификатор записи',
  `name` text COLLATE utf8mb4_general_ci NOT NULL COMMENT 'название животного: хрюшка, кот, черепаха и тому подобные',
  `can_flying` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'признак - умеют ли летать',
  `legs_count` int DEFAULT NULL COMMENT 'количество лап',
  `class_id` int NOT NULL COMMENT 'ID класса животного'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `animal_classes`
--

CREATE TABLE `animal_classes` (
  `id` int NOT NULL COMMENT 'ID - уникальный идентификатор записи',
  `name` text COLLATE utf8mb4_general_ci NOT NULL COMMENT 'название класса животных: млекопитающие, рыба,птица и тому подобное',
  `can_flying` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'признак - бывают ли среди них те, кто может летать'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` int NOT NULL COMMENT 'ID - уникальный идентификатор записи',
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'название города',
  `founded_at` datetime DEFAULT NULL COMMENT 'дата основания города',
  `country_id` int NOT NULL COMMENT 'id страны, в которой находится этот город'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `id` int NOT NULL COMMENT 'ID - уникальный идентификатор записи',
  `name` text COLLATE utf8mb4_general_ci NOT NULL COMMENT 'название страны',
  `code` varchar(3) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'символьный код страны'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`);

--
-- Индексы таблицы `animal_classes`
--
ALTER TABLE `animal_classes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID - уникальный идентификатор записи';

--
-- AUTO_INCREMENT для таблицы `animal_classes`
--
ALTER TABLE `animal_classes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID - уникальный идентификатор записи';

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID - уникальный идентификатор записи';

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID - уникальный идентификатор записи';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
