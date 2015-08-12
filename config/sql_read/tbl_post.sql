-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 11 2015 г., 12:34
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `yiitst`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_post`
--

CREATE TABLE IF NOT EXISTS `tbl_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `anons` text,
  `content` mediumtext,
  `category_id` int(10) unsigned DEFAULT NULL,
  `author_id` int(10) unsigned DEFAULT NULL,
  `publish_status` enum('draft','publish') NOT NULL DEFAULT 'draft',
  `publish_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_post_category` (`category_id`),
  KEY `FK_post_author` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `tbl_post`
--

INSERT INTO `tbl_post` (`title`, `anons`, `content`, `category_id`, `author_id`, `publish_status`, `publish_date`) VALUES
('Первая статья', 'анонс статьи', '<font color=gree>текст тектстствыыва ыва ыва <hr><br>sdfsdf<font color=red>sdfsdfsd', 2, 1, 'publish', '2015-08-03 07:51:59'),
('Вторая статья', 'ыва ыва ыва', '<font color=green>текст тектстствыыва ыва ыва <hr><br>sdfsdf<font color=red>sdfsdfsd<bre><br>\n<div class="grow pic">\n  <img src="http://dc475.4shared.com/img/w460QXRb/s3/1390ece5980/ima_3" alt="portrait" width="50" heigth="50">\n</div> <br><br>\n<div class="blokimg">\n<div class="overlay" id="contenedor1">\n<div class="overlay_container">\n<a href="#close">\n<img src="http://dc475.4shared.com/img/w460QXRb/s3/1390ece5980/ima_3" />\n</a>\n</div>\n</div>\n<a href="#contenedor1">\n<img src="http://dc475.4shared.com/img/w460QXRb/s3/1390ece5980/ima_3" id="imagenM1" width="100" />\n</a>\n</div>', 1, 1, 'publish', '2015-08-04 05:58:05'),
('3статья', 'анонс статьи', '<font color=gree>текст тектстствыыва ыва ыва <hr><br>sdfsdf<font color=red>sdfsdfsd<bre><br>\n<a href="http://dc475.4shared.com/img/w460QXRb/s3/1390ece5980/ima_3" class="zoom"><img src="http://dc475.4shared.com/img/w460QXRb/s3/1390ece5980/ima_3" width="90" /></a>\n', 3, 1, 'publish', '2015-08-03 11:30:33'),
('4статья', 'анонс статьи', '<div class="image-row">\n            <a class="example-image-link" href="images/image-1.jpg" data-lightbox="example-1"><img class="example-image" src="images/thumb-1.jpg" alt="Girl looking out people on beach"></a>\n            <a class="example-image-link" href="images/image-2.jpg" data-lightbox="example-2" data-title="Optional caption."><img class="example-image" src="images/thumb-2.jpg" alt="Two men in bicycle jerseys sitting outside at table having coffee"></a>\n          </div>\n', 2, 1, 'publish', '2015-08-04 06:41:17'),
('5статья', 'анонс статьи', '<font color=gree>текст тектстствыыва ыва ыва <hr><br>sdfsdf<font color=red>sdfsdfsd', 3, 1, 'publish', '2015-08-03 08:18:25');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD CONSTRAINT `FK_post_author` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_post_category` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
