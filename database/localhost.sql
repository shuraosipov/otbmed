-- phpMyAdmin SQL Dump
-- version 3.4.10.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июл 13 2012 г., 16:03
-- Версия сервера: 5.5.16
-- Версия PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `otbmed`
--
CREATE DATABASE `otbmed` DEFAULT CHARACTER SET cp1251 COLLATE cp1251_general_ci;
USE `otbmed`;

-- --------------------------------------------------------

--
-- Структура таблицы `checkup`
--

CREATE TABLE IF NOT EXISTS `checkup` (
  `checkup_id` int(10) NOT NULL AUTO_INCREMENT,
  `checkup_linkkey` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `next` date DEFAULT NULL,
  PRIMARY KEY (`checkup_id`),
  KEY `checkup_linkkey` (`checkup_linkkey`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `checkup`
--

INSERT INTO `checkup` (`checkup_id`, `checkup_linkkey`, `title`, `date`, `next`) VALUES
(9, 22, 'флюрография', '2012-07-16', '2013-07-16'),
(10, 22, 'профосмотр', '2012-07-13', '2012-07-14');

-- --------------------------------------------------------

--
-- Структура таблицы `days`
--

CREATE TABLE IF NOT EXISTS `days` (
  `day_id` varchar(4) NOT NULL,
  PRIMARY KEY (`day_id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `days`
--

INSERT INTO `days` (`day_id`) VALUES
('01'),
('02'),
('03'),
('04'),
('05'),
('06'),
('07'),
('08'),
('09'),
('10'),
('11'),
('12'),
('13'),
('14'),
('15'),
('16'),
('17'),
('18'),
('19'),
('20'),
('21'),
('22'),
('23'),
('24'),
('25'),
('26'),
('27'),
('28'),
('29'),
('30'),
('31'),
('32');

-- --------------------------------------------------------

--
-- Структура таблицы `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `department`
--

INSERT INTO `department` (`department_id`, `title`) VALUES
(1, 'Ремонтно-строительный участок № 1'),
(2, 'Ремонтно-строительный участок № 2'),
(3, 'ОГМ');

-- --------------------------------------------------------

--
-- Структура таблицы `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `secondname` varchar(255) NOT NULL,
  `department_id` int(10) NOT NULL,
  `job_id` int(10) NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=25 ;

--
-- Дамп данных таблицы `employee`
--

INSERT INTO `employee` (`employee_id`, `name`, `surname`, `secondname`, `department_id`, `job_id`) VALUES
(22, 'Сопронюк', 'Евгений', 'Владимирович', 1, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `job_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `job`
--

INSERT INTO `job` (`job_id`, `title`) VALUES
(1, 'плотник-бетонщик'),
(2, 'сварщик'),
(5, 'Начальник участка'),
(8, 'Прораб');

-- --------------------------------------------------------

--
-- Структура таблицы `months`
--

CREATE TABLE IF NOT EXISTS `months` (
  `month_id` varchar(4) NOT NULL,
  PRIMARY KEY (`month_id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `months`
--

INSERT INTO `months` (`month_id`) VALUES
('01'),
('02'),
('03'),
('04'),
('05'),
('06'),
('07'),
('08'),
('09'),
('10'),
('11'),
('12');

-- --------------------------------------------------------

--
-- Структура таблицы `years`
--

CREATE TABLE IF NOT EXISTS `years` (
  `year_id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`year_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2018 ;

--
-- Дамп данных таблицы `years`
--

INSERT INTO `years` (`year_id`) VALUES
(2008),
(2009),
(2010),
(2011),
(2012),
(2013),
(2014),
(2015),
(2016),
(2017);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
