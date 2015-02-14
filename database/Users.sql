-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 05 2015 г., 21:23
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `Users`
--

-- --------------------------------------------------------

--
-- Структура таблицы `NewUser`
--

CREATE TABLE IF NOT EXISTS `NewUser` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `YearOfBirth` int(11) NOT NULL,
  `Sex` varchar(100) NOT NULL,
  `Login` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `NewUser`
--

INSERT INTO `NewUser` (`ID`, `UserName`, `LastName`, `YearOfBirth`, `Sex`, `Login`, `Password`) VALUES
(12, 'AlexKNPro', 'Pnkl', 1920, 'Male', 'AlexKNPro', 'e10adc3949ba59abbe56e057f20f883e'),
(13, 'Alex', 'Pavlov', 1920, 'Male', 'Alex', '550e1bafe077ff0b0b67f4e32f29d751');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
