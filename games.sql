-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `games`;
CREATE TABLE `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `to_play_solo` tinyint(4) NOT NULL DEFAULT '0',
  `to_play_multi` tinyint(4) NOT NULL DEFAULT '0',
  `copy` tinyint(4) NOT NULL DEFAULT '0',
  `many` tinyint(4) NOT NULL,
  `top_game` tinyint(4) NOT NULL DEFAULT '0',
  `comments` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `games` (`id`, `name`, `platform`, `to_play_solo`, `to_play_multi`, `copy`, `many`, `top_game`, `comments`) VALUES
(1,	'Sega Soccer',	'Megadrive II',	0,	0,	0,	0,	0,	'Sur une cartouche avec multi jeux'),
(2,	'Columns',	'Megadrive II',	0,	0,	0,	0,	0,	'Sur une cartouche avec multi jeux'),
(3,	'Super Monaco GP',	'Megadrive II',	0,	0,	0,	0,	0,	'Sur une cartouche avec multi jeux'),
(4,	'Revenge Of Shinobi',	'Megadrive II',	0,	0,	0,	0,	0,	'Sur une cartouche avec multi jeux'),
(5,	'Sonic',	'Megadrive II',	1,	0,	0,	0,	0,	'Sur une cartouche avec multi jeux. Jouer sur emulateur sur PC.'),
(6,	'Streets of Rage',	'Megadrive II',	0,	1,	0,	0,	0,	'Sur une cartouche avec multi jeux'),
(7,	'Fifa Soccer 96',	'Megadrive II',	0,	1,	0,	0,	0,	''),
(8,	'Tomb Raider',	'Saturn',	0,	0,	0,	0,	0,	''),
(9,	'ClockWork Knight',	'Saturn',	0,	0,	0,	0,	0,	''),
(10,	'Firestorm Thunderhawk 2',	'Saturn',	0,	0,	0,	0,	0,	''),
(11,	'Sega Rally',	'Saturn',	1,	0,	0,	1,	0,	''),
(12,	'True Pinball',	'Saturn',	0,	0,	0,	0,	0,	''),
(13,	'Daytona USA',	'Saturn',	1,	0,	0,	0,	0,	''),
(14,	'Bug',	'Saturn',	0,	0,	0,	0,	0,	''),
(15,	'Worlwide Soccer 97',	'Saturn',	1,	1,	0,	0,	0,	''),
(16,	'Virtua Cop 2',	'Saturn',	1,	1,	0,	0,	0,	'');

-- 2017-07-16 07:45:41
