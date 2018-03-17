-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: 17 март 2018 в 11:32
-- Версия на сървъра: 5.7.20
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hangman`
--

-- --------------------------------------------------------

--
-- Структура на таблица `game`
--

CREATE TABLE `game` (
  `game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `word_id` int(11) NOT NULL,
  `given_letters` varchar(255) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `difficulty` int(11) DEFAULT NULL,
  `fails` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `game`
--

INSERT INTO `game` (`game_id`, `user_id`, `word_id`, `given_letters`, `score`, `difficulty`, `fails`) VALUES
(1, 3, 1, '', 0, 3, 0),
(2, 3, 1, '', 0, 3, 0),
(3, 3, 1, '', 0, 3, 0),
(4, 3, 1, '', 0, 3, 0),
(5, 3, 1, '', 0, 3, 0),
(6, 3, 1, '', 0, 3, 0),
(7, 3, 1, '', 0, 3, 0),
(8, 3, 1, 'M,N,D,P', 4, 3, 1),
(9, 3, 1, 'M,N', 9, 3, 0),
(11, 3, 1, 'M,N', -15, 3, 0),
(10, 3, 1, 'M,N', 0, 3, 0),
(12, 3, 1, 'M,N', 0, 3, 0),
(13, 0, 1, 'M,N,A,R,C,P,F,G,Q', 17, 3, 3),
(14, 3, 1, '', 0, 3, 0),
(15, 3, 1, 'M,N', 0, 3, 0),
(16, 3, 1, 'M,N', 0, 3, 0),
(17, 1, 1, '', 0, 3, 0),
(18, 3, 1, 'M,N', 0, 3, 0),
(19, 3, 1, 'M,N', 0, 3, 0),
(20, 1, 1, 'M,N', 0, 3, 0),
(21, 1, 1, 'M,N', 0, 3, 0),
(22, 3, 1, 'M,N', 0, 3, 0),
(23, 3, 1, 'M,N,Q', -1, 3, 1),
(24, 3, 1, 'M,N,Q,F,Y', -3, 3, 3),
(25, 0, 1, 'M,N', 0, 3, 0),
(26, 0, 1, 'M,N,Я,В,Е', -3, 3, 3),
(27, 0, 1, 'M,N', 0, 3, 0),
(28, 1, 1, '', 0, 3, 0),
(29, 1, 1, '', 0, 3, 0),
(30, 0, 1, 'M,N', 0, 3, 0),
(93, 9, 1, 'П,К,S,D,А,У', 2, 4, 3),
(32, 0, 1, 'M,N', 0, 3, 0),
(33, 0, 1, 'M,N', 0, 3, 0),
(34, 0, 1, 'M,N', 0, 3, 0),
(35, 0, 1, 'M,N', 0, 3, 0),
(36, 0, 1, 'M,N', 0, 3, 0),
(37, 0, 1, 'M,N', 0, 3, 0),
(38, 1, 1, 'M,N', 0, 3, 0),
(39, 1, 1, 'M,N', 0, 3, 0),
(40, 1, 1, 'M,N', 0, 3, 0),
(41, 3, 1, 'M,N', 0, 3, 0),
(42, 0, 1, 'M,N', 0, 3, 0),
(43, 0, 1, 'M,N', 0, 3, 0),
(44, 0, 1, 'M,N', 0, 3, 0),
(45, 0, 1, 'M,N', 0, 3, 0),
(46, 0, 1, 'M,N', 0, 3, 0),
(47, 0, 1, 'M,N', 0, 3, 0),
(48, 0, 1, 'M,N', 0, 3, 0),
(49, 0, 1, 'M,N', 0, 3, 0),
(50, 0, 1, 'M,N', 0, 3, 0),
(51, 0, 1, 'M,N', 0, 3, 0),
(52, 0, 1, 'M,N', 0, 3, 0),
(53, 0, 1, 'M,N', 0, 3, 0),
(54, 0, 1, 'M,N', 0, 3, 0),
(55, 0, 1, 'M,N', 0, 3, 0),
(56, 0, 1, 'M,N', 0, 3, 0),
(57, 0, 1, 'M,N', 0, 3, 0),
(58, 0, 1, 'M,N', 0, 3, 0),
(59, 0, 1, 'M,N', 0, 3, 0),
(60, 0, 1, 'M,N', 0, 3, 0),
(61, 0, 1, 'M,N', 0, 3, 0),
(62, 0, 1, 'M,N', 0, 3, 0),
(63, 0, 1, 'M,N,A,R,C,I,P', 25, 4, 0),
(64, 0, 1, 'M,N,S,T,Q', -3, 3, 3),
(65, 0, 1, 'M,N', 0, 3, 0),
(66, 0, 1, 'M,N', 0, 3, 0),
(67, 0, 1, 'M,N', 0, 3, 0),
(68, 0, 1, 'M,N', 0, 3, 0),
(69, 0, 1, 'M,N', 0, 3, 0),
(70, 0, 1, '', 0, 3, 0),
(71, 1, 1, 'M,N', 0, 3, 0),
(72, 1, 1, 'M,N', 0, 3, 0),
(73, 1, 1, '', 0, 3, 0),
(74, 0, 1, 'M,N', 0, 3, 0),
(75, 0, 1, 'M,N', 0, 3, 0),
(76, 0, 1, 'M,N', 0, 3, 0),
(77, 0, 1, 'M,N', 0, 3, 0),
(78, 3, 1, 'M,N', 0, 3, 0),
(79, 3, 10, 'К,А,Щ,О,П,Р,И,В,Ц', 35, 3, 0),
(80, 3, 10, '', 0, 3, 0),
(81, 3, 10, 'К,А', -30, 2, 0),
(82, 3, 11, 'П,Е', 0, 3, 0),
(83, 3, 1, 'П,К', 0, 3, 0),
(84, 3, 1, 'П,К,У,С,Т,Я,Л,М,Й', 17, 3, 3),
(85, 3, 1, 'M,N', 0, 3, 0),
(86, 3, 2, 'C,Y', -15, 3, 0),
(87, 1, 1, 'M,N', 0, 3, 0),
(88, 1, 1, 'П,К', 0, 3, 0),
(89, 1, 2, 'А,Ч,Б,С,О,П', 2, 3, 3),
(90, 9, 10, 'К,А,Р,В,П,И,О,Щ,Ц', 35, 3, 0),
(91, 9, 10, 'К,А', 0, 3, 0),
(92, 9, 10, 'К,А,S,F,Щ', 3, 3, 2),
(94, 9, 1, 'П,К', 0, 3, 0),
(95, 20, 10, 'К,А,О', 5, 3, 0),
(96, 20, 11, 'П,Е,А', -5, 3, 0),
(97, 20, 1, 'M,N', -15, 3, 0),
(98, 20, 2, 'C,Y,A,O,W,B', -4, 3, 1),
(99, 20, 10, 'К,А,S,D,A', -3, 3, 3),
(100, 20, 11, 'П,Е', 20, 3, 0),
(102, 20, 1, 'П,К,У,С,Т,И,Н,Я', 30, 3, 0),
(101, 20, 12, 'К,А', 0, 3, 0),
(103, 20, 2, 'А,Ч,Б,Д,С,Т', 2, 3, 3),
(104, 20, 3, 'С,К,У,Е', 10, 3, 0),
(105, 9, 1, 'П,К', 0, 3, 0);

-- --------------------------------------------------------

--
-- Структура на таблица `player`
--

CREATE TABLE `player` (
  `user_id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `player`
--

INSERT INTO `player` (`user_id`, `username`, `password`, `role`) VALUES
(5, 'stan', 'stanislav', 1),
(9, 'mitco', 'mitco', 1),
(20, 'vso', 'vso', 0);

-- --------------------------------------------------------

--
-- Структура на таблица `word`
--

CREATE TABLE `word` (
  `word_id` int(11) NOT NULL,
  `word` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `word`
--

INSERT INTO `word` (`word_id`, `word`) VALUES
(2, 'COWgirl'),
(3, 'TRAPPER'),
(4, 'RAFTER'),
(5, 'BUFFALO'),
(6, 'INDIAN'),
(7, 'REVOLVER'),
(8, 'MUSTANG'),
(9, 'GRIZZLY'),
(10, 'SALOON'),
(11, 'SHERIFF'),
(12, 'WANTED'),
(13, 'APACHE'),
(14, 'HORSE'),
(15, 'TRAMP'),
(16, 'WESTMAN'),
(18, 'f'),
(19, 'asd');

-- --------------------------------------------------------

--
-- Структура на таблица `words_bg`
--

CREATE TABLE `words_bg` (
  `word_bg_id` int(11) NOT NULL,
  `word_bg` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `words_bg`
--

INSERT INTO `words_bg` (`word_bg_id`, `word_bg`) VALUES
(10, 'КОПРИВЩИЦА'),
(11, 'ПАНАГЮРИЩЕ'),
(12, 'КЛИСУРАА'),
(13, 'БАТАК'),
(14, 'ЧИПРОВЦИ'),
(15, 'ТРЯВНА'),
(16, 'КАРЛОВО'),
(17, 'КАРЛОВО'),
(18, 'КАЛОФЕР'),
(19, 'ТРОЯН'),
(20, 'ГАБРОВО'),
(21, 'МЕЛНИК'),
(22, 'ПЛИСКА'),
(23, 'ПРЕСЛАВ'),
(24, 'ТЪРНОВО'),
(25, 'ВИДИН'),
(26, 'ОХРИД');

-- --------------------------------------------------------

--
-- Структура на таблица `words_vr`
--

CREATE TABLE `words_vr` (
  `word_vr_id` int(11) NOT NULL,
  `word_vr` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `words_vr`
--

INSERT INTO `words_vr` (`word_vr_id`, `word_vr`) VALUES
(1, 'ПУСТИНЯК'),
(2, 'АБИЧ'),
(3, 'СУЕК'),
(4, 'МАЖДРАМУНЯК'),
(5, 'ОМРАЗ'),
(6, 'ДЖВАНЬОК'),
(7, 'ШПОР'),
(8, 'ДЗВЕР'),
(9, 'ПРЕОДАНЕЦ'),
(10, 'ДЖУРУЛЯК'),
(11, 'ПРЪЛИЦА'),
(12, 'КАКАЛЯШКА'),
(13, 'СПАРЕНЯК'),
(14, 'УРУНГЕЛ'),
(15, 'БЕСОВИЦА'),
(16, 'ЗАРАН'),
(17, 'САТВЕР');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`game_id`),
  ADD KEY `game_uid` (`user_id`),
  ADD KEY `game_wid` (`word_id`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `word`
--
ALTER TABLE `word`
  ADD PRIMARY KEY (`word_id`);

--
-- Indexes for table `words_bg`
--
ALTER TABLE `words_bg`
  ADD PRIMARY KEY (`word_bg_id`);

--
-- Indexes for table `words_vr`
--
ALTER TABLE `words_vr`
  ADD PRIMARY KEY (`word_vr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `word`
--
ALTER TABLE `word`
  MODIFY `word_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `words_bg`
--
ALTER TABLE `words_bg`
  MODIFY `word_bg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `words_vr`
--
ALTER TABLE `words_vr`
  MODIFY `word_vr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
