-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 март 2018 в 22:22
-- Версия на сървъра: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hang`
--

-- --------------------------------------------------------

--
-- Структура на таблица `bg_dictonary`
--

CREATE TABLE `bg_dictonary` (
  `bgword_id` int(11) NOT NULL,
  `bgword` varchar(20) NOT NULL,
  `bghint` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `bg_dictonary`
--

INSERT INTO `bg_dictonary` (`bgword_id`, `bgword`, `bghint`) VALUES
(1, 'ПЛОЩАД', 'МЕГДАН'),
(2, 'ПАРАЛЕЛЕПИПЕД', 'ПРИЗМА'),
(3, 'ЗАКОН', 'ПРАВИЛНИК'),
(4, 'ВЕСТНИК', 'ПРЕСА'),
(5, 'ТЕЛЕВИЗИЯ', 'МЕДИЯ'),
(6, 'ИНТЕРНЕТ', 'МРЕЖА'),
(7, 'ПРОТЕСТ', 'НЕПОДЧИНЕНИЕ'),
(8, 'ЛЕКАР', 'ДОКТОР'),
(9, 'ПРЕПОДАВАТЕЛ', 'ЛЕКТОР'),
(10, 'ЦИТАДЕЛА', 'КРЕПОСТ'),
(11, 'ЕНЦИКЛОПЕДИЯ', 'СПРАВОЧНИК'),
(12, 'АПАРТАМЕНТ', 'ЖИЛИЩЕ'),
(13, 'ГРЪМОТЕВИЦА', 'СВЕТКАВИЦА'),
(14, 'ФЕЛДФЕБЕЛ', 'СТАРШИНА'),
(15, 'КОРЕСПОНДЕНЦИЯ', 'ПОЩА'),
(16, 'ВИАДУКТ', 'МОСТ'),
(17, 'ТРАНШЕЯ', 'ОКОП');

-- --------------------------------------------------------

--
-- Структура на таблица `en_dictonary`
--

CREATE TABLE `en_dictonary` (
  `enword_id` int(11) NOT NULL,
  `enword` varchar(20) NOT NULL,
  `enhint` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `en_dictonary`
--

INSERT INTO `en_dictonary` (`enword_id`, `enword`, `enhint`) VALUES
(1, 'ORANGE', 'FRUIT'),
(2, 'MIRROR', 'ON THE WALL'),
(3, 'SUITCASE', 'BAG'),
(4, 'FURNITURE', 'JOINERY'),
(5, 'PROCESSOR', 'INTEL'),
(6, 'UNIVERSITY', 'VARSITY'),
(7, 'PRESIDENT', 'ABRAHAM LINKOLN'),
(8, 'TIRANOZAVER', 'REX'),
(9, 'LANDSCAPE', 'SCENERY'),
(10, 'ELEPHANT', 'JUMBO'),
(11, 'PANTER', 'JAGUAR'),
(12, 'CATERPILLAR', 'CANKERWORM'),
(13, 'HURRICANE', 'STORM'),
(14, 'CONTINENT', 'MAINLAND'),
(15, 'FOREIGNER', 'STRANGER');

-- --------------------------------------------------------

--
-- Структура на таблица `games_history`
--

CREATE TABLE `games_history` (
  `game_id` int(10) NOT NULL,
  `game_score` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(30) NOT NULL,
  `user_hiscore` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bg_dictonary`
--
ALTER TABLE `bg_dictonary`
  ADD PRIMARY KEY (`bgword_id`);

--
-- Indexes for table `en_dictonary`
--
ALTER TABLE `en_dictonary`
  ADD PRIMARY KEY (`enword_id`);

--
-- Indexes for table `games_history`
--
ALTER TABLE `games_history`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bg_dictonary`
--
ALTER TABLE `bg_dictonary`
  MODIFY `bgword_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `en_dictonary`
--
ALTER TABLE `en_dictonary`
  MODIFY `enword_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `games_history`
--
ALTER TABLE `games_history`
  MODIFY `game_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
