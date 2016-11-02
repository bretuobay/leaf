-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Creato il: Set 18, 2016 alle 20:43
-- Versione del server: 5.6.26
-- Versione PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kalories`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `calories`
--

CREATE TABLE IF NOT EXISTS `calories` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `description` text NOT NULL,
  `num_calories` int(10) NOT NULL,
  `curr_user` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `calories`
--

INSERT INTO `calories` (`id`, `date`, `time`, `description`, `num_calories`, `curr_user`) VALUES
(2, '2016-09-16', '08:20:20', 'Another x of our awesome recipes used for energizing after work out packed with calories', 301, 'demo'),
(3, '2016-09-16', '08:20:20', 'The third of our  awesome recipes used for energizing after work out packed with calories', 300, ''),
(4, '2016-09-16', '08:20:20', 'Fourth delicious recipes used for energizing after work out packed with calories', 200, ''),
(5, '2016-09-16', '08:20:20', 'A secret recipe packed with 1000Kalories', 100, ''),
(8, '2016-09-18', '08:20:20', 'Awesome 8th heaven  recipe', 800, ''),
(9, '2016-09-17', '00:00:12', 'This is our last add to the app of calories , hopefully.', 210, 'demo'),
(12, '2016-09-15', '12:09:00', 'awesome last entry', 1300, ''),
(15, '0000-00-00', '12:09:00', 'This is another entry', 1300, 'demo'),
(16, '0000-00-00', '12:34:00', 'This is my first add to the the list after summer', 1000, 'demo'),
(17, '2016-09-18', '13:23:00', 'This is a the TOP calories counter in the world', 3400, 'demo');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `daily_cal` int(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `email`, `daily_cal`, `password`) VALUES
(1, 'user@email.com', 0, 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1'),
(2, 'user1@email.com', 0, 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1'),
(3, 'demo', 450, 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1'),
(4, 'original@hotmail.com', 0, 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1'),
(7, 'bretuobay3@gmail.com', 0, '1baa0bf841637be5dfd10df0c1f06b0a72def0b9b33a80cb2080e1291ad3d743'),
(8, 'john@hot.com', 0, 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1'),
(9, 'email@email.com', 0, '82244417f956ac7c599f191593f7e441a4fafa20a4158fd52e154f1dc4c8ed92'),
(15, 'hack@hack.com', 0, 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1'),
(16, 'eunice@hot.com', 0, 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1'),
(18, 'eunice@baidoo.com', 0, 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `calories`
--
ALTER TABLE `calories`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `calories`
--
ALTER TABLE `calories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
