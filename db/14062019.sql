-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pát 14. čen 2019, 12:18
-- Verze serveru: 10.1.38-MariaDB
-- Verze PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `pakostanecamp`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `coins`
--

CREATE TABLE `coins` (
  `id` int(2) NOT NULL,
  `label` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `quantity` int(10) NOT NULL,
  `value` int(10) NOT NULL,
  `released` int(11) NOT NULL,
  `remains` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `coins`
--

INSERT INTO `coins` (`id`, `label`, `quantity`, `value`, `released`, `remains`) VALUES
(0, 'bills', 12007360, 1, -22, 12007382),
(1, 'coin_nv_ch_white', 47, 10, 0, 47),
(2, 'coin_nv_ch_red', 46, 50, 0, 46),
(3, 'coin_nv_ch_blue', 44, 500, 0, 44),
(4, 'coin_nv_ch_green', 25, 250, 0, 23),
(5, 'coin_nv_ch_black', 21, 100, 0, 21),
(6, 'coin_nv_std_white', 98, 10, 0, 98),
(7, 'coin_nv_std_red', 99, 50, 0, 99),
(8, 'coin_nv_std_blue', 99, 500, 0, 99),
(9, 'coin_nv_std_green', 98, 250, 0, 98),
(10, 'coin_nv_std_black', 94, 100, 0, 94),
(11, 'coin_yv_std_white', 100, 5, 0, 100),
(12, 'coin_yv_std_blue', 50, 10, 0, 50),
(13, 'coin_yv_std_green', 50, 25, 0, 50),
(14, 'coin_yv_std_red', 50, 50, 0, 50),
(15, 'coin_yv_std_black', 50, 100, 0, 50),
(16, 'coin_yv_oth_red', 48, 5, 0, 48),
(17, 'coin_yv_oth_green', 2, 25, 0, 2),
(18, 'coin_yv_oth_lightblue', 30, 50, 0, 30),
(19, 'coin_yv_oth_whitepurple', 28, 500, 0, 28),
(20, 'coin_yv_ult_red', 50, 5, 0, 50),
(21, 'coin_yv_ult_darkblue', 50, 10, 0, 50),
(22, 'coin_yv_ult_green', 134, 25, 0, 134),
(23, 'coin_yv_ult_lightblue', 121, 50, 0, 121),
(24, 'coin_yv_ult_black', 244, 100, 0, 244),
(25, 'coin_yv_ult_purple', 198, 500, 0, 198),
(26, 'coin_yv_ult_yellow', 135, 1000, 0, 135),
(27, 'coin_special', 19, 0, 0, 19);

-- --------------------------------------------------------

--
-- Struktura tabulky `data_codes`
--

CREATE TABLE `data_codes` (
  `id` int(50) NOT NULL,
  `code` text COLLATE utf8_czech_ci NOT NULL,
  `typeuser` int(2) NOT NULL,
  `value` decimal(20,2) NOT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT '1',
  `invoker` varchar(40) COLLATE utf8_czech_ci DEFAULT NULL,
  `typegame` int(2) NOT NULL,
  `creationtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usetime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `detail` text COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `data_codes`
--

INSERT INTO `data_codes` (`id`, `code`, `typeuser`, `value`, `valid`, `invoker`, `typegame`, `creationtime`, `usetime`, `detail`) VALUES
(1, 'usergame1val500', 1, '500.00', 1, NULL, 1, '2019-06-09 12:22:40', NULL, ''),
(2, 'usergame2val1600', 1, '1600.00', 1, NULL, 2, '2019-06-09 12:23:44', NULL, ''),
(3, 'usergame3val2300', 1, '2300.00', 1, NULL, 3, '2019-06-09 12:24:16', NULL, ''),
(4, 'usergame4val2900', 1, '2900.00', 1, NULL, 4, '2019-06-09 12:24:35', NULL, ''),
(5, 'usergame5val3400', 1, '3400.00', 1, NULL, 5, '2019-06-09 12:24:59', NULL, ''),
(6, 'usergame6val4000', 1, '4000.00', 1, NULL, 6, '2019-06-09 12:25:42', NULL, ''),
(7, 'usergame7val5000', 1, '5000.00', 1, NULL, 7, '2019-06-09 12:26:19', NULL, ''),
(8, 'usergame8val6000', 1, '6000.00', 1, NULL, 8, '2019-06-09 12:26:46', NULL, 'usergame8val6000 - poznámka'),
(9, 'teamgame1val10000', 2, '10000.00', 1, NULL, 1, '2019-06-09 12:27:13', NULL, ''),
(10, 'teamgame2val12000', 2, '12000.00', 1, NULL, 2, '2019-06-09 12:27:31', NULL, ''),
(11, 'teamgame3val14000', 2, '14000.00', 1, NULL, 3, '2019-06-09 12:27:51', NULL, ''),
(12, 'teamgame4val16000', 2, '16000.00', 1, NULL, 4, '2019-06-09 12:28:08', NULL, ''),
(13, 'teamgame6val18000', 2, '18000.00', 1, NULL, 6, '2019-06-09 12:28:34', NULL, ''),
(14, 'teamgame8val20000', 2, '20000.00', 1, NULL, 8, '2019-06-09 12:29:00', NULL, 'teamgame8val20000 - poznámka');

-- --------------------------------------------------------

--
-- Struktura tabulky `data_code_kolik`
--

CREATE TABLE `data_code_kolik` (
  `id` int(11) NOT NULL,
  `founder` varchar(75) COLLATE utf8_czech_ci NOT NULL,
  `teamId` int(11) NOT NULL,
  `code` text COLLATE utf8_czech_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `data_game_best_score`
--

CREATE TABLE `data_game_best_score` (
  `id` int(11) NOT NULL,
  `gamename` text COLLATE utf8_czech_ci NOT NULL,
  `gametype` int(11) NOT NULL,
  `score` decimal(20,2) NOT NULL DEFAULT '0.00',
  `unit` varchar(50) COLLATE utf8_czech_ci DEFAULT NULL,
  `number_overcomes` int(11) NOT NULL DEFAULT '0',
  `username` varchar(75) COLLATE utf8_czech_ci DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `updatetime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `data_game_best_score`
--

INSERT INTO `data_game_best_score` (`id`, `gamename`, `gametype`, `score`, `unit`, `number_overcomes`, `username`, `userId`, `updatetime`) VALUES
(1, 'Ringo', 0, '1000.00', 'b.', 3, 'ffffff', 6, '2019-06-13 22:17:51'),
(2, 'Karty', 0, '55632.00', 'počet žolíků', 1, 'eeeeee', 5, '2019-06-13 22:38:20');

-- --------------------------------------------------------

--
-- Struktura tabulky `data_team_games`
--

CREATE TABLE `data_team_games` (
  `id` int(11) NOT NULL,
  `game_name` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `when_played` datetime NOT NULL,
  `game_popularity` int(11) NOT NULL,
  `preparation_time_minutes` int(11) NOT NULL,
  `game_budget` int(11) NOT NULL,
  `average_result` double(20,2) NOT NULL,
  `firstlast_diff` double(20,2) NOT NULL,
  `Alfa` decimal(20,2) NOT NULL,
  `Beta` decimal(20,2) NOT NULL,
  `Gamma` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `data_team_games`
--

INSERT INTO `data_team_games` (`id`, `game_name`, `when_played`, `game_popularity`, `preparation_time_minutes`, `game_budget`, `average_result`, `firstlast_diff`, `Alfa`, `Beta`, `Gamma`) VALUES
(1, 'Triathlon', '2019-06-19 15:15:00', 74, 20, 10000, 60.00, 40.00, '60.00', '80.00', '40.00');

-- --------------------------------------------------------

--
-- Struktura tabulky `data_team_kolik`
--

CREATE TABLE `data_team_kolik` (
  `id` int(11) NOT NULL,
  `team` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `total_points_balance` int(11) NOT NULL DEFAULT '0',
  `total_points_earned` int(11) NOT NULL DEFAULT '0',
  `total_points_earned_org` int(11) NOT NULL DEFAULT '0',
  `total_points_lost` int(11) NOT NULL DEFAULT '0',
  `total_points_saved` int(11) NOT NULL DEFAULT '0',
  `total_points_penalty` int(11) NOT NULL DEFAULT '0',
  `best_player` varchar(75) COLLATE utf8_czech_ci NOT NULL,
  `arch_enemy_team` varchar(50) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `data_team_kolik`
--

INSERT INTO `data_team_kolik` (`id`, `team`, `total_points_balance`, `total_points_earned`, `total_points_earned_org`, `total_points_lost`, `total_points_saved`, `total_points_penalty`, `best_player`, `arch_enemy_team`) VALUES
(1, 'Alfa', 0, 0, 0, 0, 0, 0, '', '3'),
(2, 'Beta', 0, 0, 0, 0, 0, 0, '', '1'),
(3, 'Gamma', 0, 0, 0, 0, 0, 0, '', '2');

-- --------------------------------------------------------

--
-- Struktura tabulky `data_user_games`
--

CREATE TABLE `data_user_games` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_czech_ci NOT NULL,
  `unit` text COLLATE utf8_czech_ci,
  `number_games` int(11) NOT NULL DEFAULT '0',
  `total_time` int(11) NOT NULL DEFAULT '0',
  `creationtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `data_user_games`
--

INSERT INTO `data_user_games` (`id`, `name`, `unit`, `number_games`, `total_time`, `creationtime`) VALUES
(1, 'Ringo', 'b.', 1480, 0, '2019-06-13 22:12:43'),
(2, 'Karty', 'počet žolíků', 26958, 0, '2019-06-13 22:37:30');

-- --------------------------------------------------------

--
-- Struktura tabulky `data_user_kolik`
--

CREATE TABLE `data_user_kolik` (
  `id` int(11) NOT NULL,
  `username` varchar(75) COLLATE utf8_czech_ci NOT NULL,
  `userteam` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `userteamId` int(11) NOT NULL DEFAULT '0',
  `total_captured_points` int(11) NOT NULL DEFAULT '0',
  `total_captured_points_org` int(11) NOT NULL DEFAULT '0',
  `total_saved_points` int(11) NOT NULL DEFAULT '0',
  `total_points_penalty` int(11) NOT NULL DEFAULT '0',
  `last_capture` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `data_user_kolik`
--

INSERT INTO `data_user_kolik` (`id`, `username`, `userteam`, `userteamId`, `total_captured_points`, `total_captured_points_org`, `total_saved_points`, `total_points_penalty`, `last_capture`) VALUES
(1, 'aaaaaa', 'Alfa', 1, 0, 0, 0, 0, '2019-06-12 01:05:14'),
(2, 'bbbbbb', 'Beta', 2, 0, 0, 0, 0, '2019-06-12 01:05:10'),
(3, 'cccccc', 'Gamma', 3, 0, 0, 0, 0, '2019-06-12 01:05:12'),
(4, 'dddddd', 'Alfa', 1, 0, 0, 0, 0, '2019-06-12 01:05:04'),
(5, 'eeeeee', 'Beta', 2, 0, 0, 0, 0, '2019-06-09 12:05:13'),
(6, 'ffffff', 'Gamma', 3, 0, 0, 0, 0, '2019-06-09 12:06:06'),
(7, 'gggggg', 'Alfa', 1, 0, 0, 0, 0, '2019-06-09 12:06:21'),
(8, 'hhhhhh', 'Beta', 2, 0, 0, 0, 0, '2019-06-09 12:06:49'),
(9, 'iiiiii', 'Gamma', 3, 0, 0, 0, 0, '2019-06-09 12:07:10'),
(10, 'jjjjjj', 'Alfa', 1, 0, 0, 0, 0, '2019-06-09 12:07:49'),
(11, 'kkkkkk', 'Beta', 2, 0, 0, 0, 0, '2019-06-09 12:08:42'),
(12, 'llllll', 'Gamma', 3, 0, 0, 0, 0, '2019-06-09 12:09:10'),
(13, 'mmmmmm', 'Alfa', 1, 0, 0, 0, 0, '2019-06-09 12:09:28'),
(14, 'nnnnnn', 'Beta', 2, 0, 0, 0, 0, '2019-06-09 12:10:05'),
(15, 'oooooo', 'Gamma', 3, 0, 0, 0, 0, '2019-06-09 12:10:25');

-- --------------------------------------------------------

--
-- Struktura tabulky `ig_data_karty`
--

CREATE TABLE `ig_data_karty` (
  `id` int(11) UNSIGNED NOT NULL,
  `idUser` int(11) NOT NULL,
  `idUserTeam` int(11) NOT NULL,
  `username` varchar(75) COLLATE utf8_czech_ci NOT NULL,
  `money_balance` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_won` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_lost` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_bet` decimal(20,2) NOT NULL DEFAULT '0.00',
  `games_total` int(11) NOT NULL DEFAULT '0',
  `games_won` int(11) NOT NULL DEFAULT '0',
  `games_lost` int(11) NOT NULL DEFAULT '0',
  `games_draw` int(11) NOT NULL DEFAULT '0',
  `last_played` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `ig_data_karty`
--

INSERT INTO `ig_data_karty` (`id`, `idUser`, `idUserTeam`, `username`, `money_balance`, `money_won`, `money_lost`, `money_bet`, `games_total`, `games_won`, `games_lost`, `games_draw`, `last_played`) VALUES
(1, 1, 1, 'aaaaaa', '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, NULL),
(2, 2, 2, 'bbbbbb', '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, NULL),
(3, 3, 3, 'cccccc', '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, NULL),
(4, 4, 1, 'dddddd', '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, NULL),
(5, 5, 2, 'eeeeee', '27755.00', '55667.00', '27912.00', '5673.00', 26938, 22463, 2242, 2233, '2019-06-13 23:29:38'),
(6, 6, 3, 'ffffff', '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, NULL),
(7, 7, 1, 'gggggg', '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, NULL),
(8, 8, 2, 'hhhhhh', '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, NULL),
(9, 9, 3, 'iiiiii', '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, NULL),
(10, 10, 1, 'jjjjjj', '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, NULL),
(11, 11, 2, 'kkkkkk', '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, NULL),
(12, 12, 3, 'llllll', '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, NULL),
(13, 13, 1, 'mmmmmm', '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, NULL),
(14, 14, 2, 'nnnnnn', '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, NULL),
(15, 15, 3, 'oooooo', '5.00', '25.00', '20.00', '10.00', 20, 10, 5, 5, '2019-06-13 23:35:49');

-- --------------------------------------------------------

--
-- Struktura tabulky `ig_data_ringo`
--

CREATE TABLE `ig_data_ringo` (
  `id` int(11) UNSIGNED NOT NULL,
  `idUser` int(11) NOT NULL,
  `idUserTeam` int(11) NOT NULL,
  `username` varchar(75) COLLATE utf8_czech_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `money_balance` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_won` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_lost` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_bet` decimal(20,2) NOT NULL DEFAULT '0.00',
  `games_total` int(11) NOT NULL DEFAULT '0',
  `games_won` int(11) NOT NULL DEFAULT '0',
  `games_lost` int(11) NOT NULL DEFAULT '0',
  `games_draw` int(11) NOT NULL DEFAULT '0',
  `last_played` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `ig_data_ringo`
--

INSERT INTO `ig_data_ringo` (`id`, `idUser`, `idUserTeam`, `username`, `rating`, `money_balance`, `money_won`, `money_lost`, `money_bet`, `games_total`, `games_won`, `games_lost`, `games_draw`, `last_played`) VALUES
(1, 1, 1, 'aaaaaa', 3, '214.00', '330.00', '116.00', '110.00', 36, 22, 11, 3, '2019-06-13 22:35:57'),
(2, 2, 2, 'bbbbbb', 4, '5.00', '70.00', '65.00', '30.00', 653, 321, 121, 211, '2019-06-13 22:35:57'),
(3, 3, 3, 'cccccc', 0, '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, NULL),
(4, 4, 1, 'dddddd', 0, '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, NULL),
(5, 5, 2, 'eeeeee', 0, '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, NULL),
(6, 6, 3, 'ffffff', 1, '600.00', '1000.00', '400.00', '200.00', 197, 121, 43, 33, '2019-06-13 22:34:10'),
(7, 7, 1, 'gggggg', 0, '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, NULL),
(8, 8, 2, 'hhhhhh', 0, '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, NULL),
(9, 9, 3, 'iiiiii', 0, '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, NULL),
(10, 10, 1, 'jjjjjj', 2, '500.00', '550.00', '50.00', '30.00', 592, 565, 4, 23, '2019-06-13 22:35:57'),
(11, 11, 2, 'kkkkkk', 0, '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, NULL),
(12, 12, 3, 'llllll', 0, '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, NULL),
(13, 13, 1, 'mmmmmm', 5, '1.00', '4.00', '3.00', '3.00', 2, 1, 1, 0, '2019-06-13 22:35:57'),
(14, 14, 2, 'nnnnnn', 0, '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, NULL),
(15, 15, 3, 'oooooo', 0, '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `logger`
--

CREATE TABLE `logger` (
  `id` int(11) NOT NULL,
  `who` text COLLATE utf8_czech_ci NOT NULL,
  `location` text COLLATE utf8_czech_ci NOT NULL,
  `what` text COLLATE utf8_czech_ci NOT NULL,
  `detail` text COLLATE utf8_czech_ci NOT NULL,
  `priority` text COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `logger`
--

INSERT INTO `logger` (`id`, `who`, `location`, `what`, `detail`, `priority`) VALUES
(1, 'Admin', '', 'Nejsou žádné hry k dispozici, vytvoř nějakou', '[mobileOptions] => addIndividualGameResultPage  |  ', '0'),
(2, 'Admin', 'addNewIndividualGame', 'Jméno jednotky nezadáno!', '[name] => lukosttřelba  |  [nameUnit] => střely  |  [addNewGame] => Přidat hru  |  ', '0'),
(3, 'Admin', 'addNewIndividualGame', 'Nebyl vybrán uživatel!', '[whichGame] => lukosttřelba  |  [chooseUserTo] =>   |  [moneyBet] => 7  |  [moneyWon] => 6  |  [moneyLost] => 5  |  [numberGamesWon] => 4  |  [numberGamesLost] => 3  |  [numberGamesDraw] => 2  |  [addIndividualGameResult] => Přidat výsledky  |  ', '0'),
(4, 'Admin', 'addNewIndividualGame', 'Nebyl vybrán uživatel!', '[whichGame] => lukosttřelba  |  [chooseUserTo] =>   |  [moneyBet] => 7  |  [moneyWon] => 6  |  [moneyLost] => 5  |  [numberGamesWon] => 4  |  [numberGamesLost] => 3  |  [numberGamesDraw] => 2  |  [addIndividualGameResult] => Přidat výsledky  |  ', '0'),
(5, 'Admin', 'addNewIndividualGame', 'Nebyl vybrán uživatel!', '[whichGame] => lukosttřelba  |  [chooseUserTo] =>   |  [moneyBet] => 7  |  [moneyWon] => 6  |  [moneyLost] => 5  |  [numberGamesWon] => 4  |  [numberGamesLost] => 3  |  [numberGamesDraw] => 2  |  [addIndividualGameResult] => Přidat výsledky  |  ', '0'),
(6, 'Admin', 'addNewIndividualGame', 'Nebyl vybrán uživatel!', '[whichGame] => lukosttřelba  |  [chooseUserTo] =>   |  [moneyBet] => 7  |  [moneyWon] => 6  |  [moneyLost] => 5  |  [numberGamesWon] => 4  |  [numberGamesLost] => 3  |  [numberGamesDraw] => 2  |  [addIndividualGameResult] => Přidat výsledky  |  ', '0'),
(7, 'Admin', 'addNewIndividualGame', 'Nebyl vybrán uživatel!', '[whichGame] => lukosttřelba  |  [chooseUserTo] =>   |  [moneyBet] => 7  |  [moneyWon] => 6  |  [moneyLost] => 5  |  [numberGamesWon] => 4  |  [numberGamesLost] => 3  |  [numberGamesDraw] => 2  |  [addIndividualGameResult] => Přidat výsledky  |  ', '0'),
(8, 'Admin', 'addNewIndividualGame', 'Uživatel se odhlašuje.', '[mobileOptions] => LOGOUT  |  ', '0'),
(9, 'None', 'loginPage', 'Přístup na loginPage.', '', '0'),
(10, 'aaaaaa', 'loginPage', 'Uživatel: aaaaaa se úspěšně přihlásil.', '[username] => aaaaaa  |  [password] => a  |  [login] => Přihlásit  |  ', '0'),
(11, 'aaaaaa', '_home', 'Uživatel aaaaaa potvrzuje přihlášení načtením stránky Home.', '', '0'),
(12, 'aaaaaa', '', 'Uživatel se odhlašuje.', '[mobileOptions] => LOGOUT  |  ', '0'),
(13, 'None', 'loginPage', 'Přístup na loginPage.', '', '0'),
(14, 'Admin', 'loginPage', 'Přihlášení na admina.', '[username] => #sys#  |  [password] =>   |  [login] => Přihlásit  |  ', '1'),
(15, 'Admin', '', 'Uživatel se odhlašuje.', '[mobileOptions] => LOGOUT  |  ', '0'),
(16, 'None', 'loginPage', 'Přístup na loginPage.', '', '0'),
(17, 'aaaaaa', 'loginPage', 'Uživatel: aaaaaa se úspěšně přihlásil.', '[username] => aaaaaa  |  [password] => a  |  [login] => Přihlásit  |  ', '0'),
(18, 'aaaaaa', '_home', 'Uživatel aaaaaa potvrzuje přihlášení načtením stránky Home.', '', '0'),
(19, 'aaaaaa', '', 'Uživatel se odhlašuje.', '[mobileOptions] => LOGOUT  |  ', '0'),
(20, 'None', 'loginPage', 'Přístup na loginPage.', '', '0'),
(21, 'dddddd', 'loginPage', 'Uživatel: dddddd se úspěšně přihlásil.', '[username] => dddddd  |  [password] => d  |  [login] => Přihlásit  |  ', '0'),
(22, 'dddddd', '_home', 'Uživatel dddddd potvrzuje přihlášení načtením stránky Home.', '', '0'),
(23, 'dddddd', '', 'Uživatel se odhlašuje.', '[mobileOptions] => LOGOUT  |  ', '0'),
(24, 'None', 'loginPage', 'Přístup na loginPage.', '', '0'),
(25, 'Admin', 'loginPage', 'Přihlášení na admina.', '[username] => #sys#  |  [password] =>   |  [login] => Přihlásit  |  ', '1'),
(26, 'None', 'loginPage', 'Přístup na loginPage.', '', '0'),
(27, 'Admin', 'loginPage', 'Přihlášení na admina.', '[username] => #sys#  |  [password] =>   |  [login] => Přihlásit  |  ', '1'),
(28, 'Admin', '', 'Uživatel se odhlašuje.', '[mobileOptions] => LOGOUT  |  ', '0'),
(29, 'None', 'loginPage', 'Přístup na loginPage.', '', '0'),
(30, 'None', 'loginPage', 'Pokus o přihlášení na účet: cccccc s heslem: <cc>.', '[username] => cccccc  |  [password] => cc  |  [login] => Přihlásit  |  ', '1'),
(31, 'None', 'loginPage', 'Přístup na loginPage.', '[username] => cccccc  |  [password] => cc  |  [login] => Přihlásit  |  ', '0'),
(32, 'None', 'loginPage', 'Špatné heslo!', '[username] => cccccc  |  [password] => cc  |  [login] => Přihlásit  |  ', '0'),
(33, 'None', 'loginPage', 'Špatné heslo!', '[username] => cccccc  |  [password] => cc  |  [login] => Přihlásit  |  ', '0'),
(34, 'cccccc', 'loginPage', 'Uživatel: cccccc se úspěšně přihlásil.', '[username] => cccccc  |  [password] => c  |  [login] => Přihlásit  |  ', '0'),
(35, 'cccccc', '_home', 'Uživatel cccccc potvrzuje přihlášení načtením stránky Home.', '', '0'),
(36, 'cccccc', '_home', 'Uživatel cccccc potvrzuje přihlášení načtením stránky Home.', '[mobileOptions] => home  |  ', '0'),
(37, 'cccccc', '_home', 'Uživatel cccccc potvrzuje přihlášení načtením stránky Home.', '[mobileOptions] => home  |  ', '0'),
(38, 'cccccc', '_home', 'Uživatel cccccc potvrzuje přihlášení načtením stránky Home.', '[mobileOptions] => home  |  ', '0'),
(39, 'cccccc', 'manualsAndInstruction', 'Přístup do manualsAndInstruction.', '[mobileOptions] => manuals  |  ', '0'),
(40, 'cccccc', 'manualsAndInstruction', 'Přístup do manualsAndInstruction.', '[mobileOptionsManInstr] => manuals  |  ', '0'),
(41, 'cccccc', 'loginPage', 'Uživatel se odhlašuje.', '[mobileOptions] => LOGOUT  |  ', '0'),
(42, 'None', 'loginPage', 'Přístup na loginPage.', '', '0'),
(43, 'Admin', 'loginPage', 'Přihlášení na admina.', '[username] => #sys#  |  [password] =>   |  [login] => Přihlásit  |  ', '1'),
(44, 'Admin', '', 'Uživatel se odhlašuje.', '[mobileOptions] => LOGOUT  |  ', '0'),
(45, 'None', 'loginPage', 'Přístup na loginPage.', '', '0'),
(46, 'Admin', 'loginPage', 'Přihlášení na admina.', '[username] => #sys#  |  [password] =>   |  [login] => Přihlásit  |  ', '1'),
(47, 'None', 'loginPage', 'Přístup na loginPage.', '', '0'),
(48, 'Admin', 'loginPage', 'Přihlášení na admina.', '[username] => #sys#  |  [password] =>   |  [login] => Přihlásit  |  ', '1'),
(49, 'Admin', '', 'Uživatel se odhlašuje.', '[mobileOptions] => LOGOUT  |  ', '0'),
(50, 'None', 'loginPage', 'Přístup na loginPage.', '', '0'),
(51, 'cccccc', 'loginPage', 'Uživatel: cccccc se úspěšně přihlásil.', '[username] => cccccc  |  [password] => c  |  [login] => Přihlásit  |  ', '0'),
(52, 'cccccc', '_home', 'Uživatel cccccc potvrzuje přihlášení načtením stránky Home.', '', '0'),
(53, 'cccccc', '_home', 'Uživatel cccccc potvrzuje přihlášení načtením stránky Home.', '[mobileOptions] => home  |  ', '0');

-- --------------------------------------------------------

--
-- Struktura tabulky `log_codes`
--

CREATE TABLE `log_codes` (
  `id` int(11) NOT NULL,
  `code` text COLLATE utf8_czech_ci NOT NULL,
  `creationtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `log_codes`
--

INSERT INTO `log_codes` (`id`, `code`, `creationtime`) VALUES
(1, 'usergame1val500', '2019-06-09 12:22:40'),
(2, 'usergame2val1600', '2019-06-09 12:23:44'),
(3, 'usergame3val2300', '2019-06-09 12:24:16'),
(4, 'usergame4val2900', '2019-06-09 12:24:35'),
(5, 'usergame5val3400', '2019-06-09 12:24:59'),
(6, 'usergame6val4000', '2019-06-09 12:25:42'),
(7, 'usergame7val5000', '2019-06-09 12:26:19'),
(8, 'usergame8val6000', '2019-06-09 12:26:46'),
(9, 'teamgame1val10000', '2019-06-09 12:27:13'),
(10, 'teamgame2val12000', '2019-06-09 12:27:31'),
(11, 'teamgame3val14000', '2019-06-09 12:27:51'),
(12, 'teamgame4val16000', '2019-06-09 12:28:08'),
(13, 'teamgame6val18000', '2019-06-09 12:28:35'),
(14, 'teamgame8val20000', '2019-06-09 12:29:00'),
(15, 'takykolik', '2019-06-10 23:52:59');

-- --------------------------------------------------------

--
-- Struktura tabulky `log_coins`
--

CREATE TABLE `log_coins` (
  `id` int(11) NOT NULL,
  `coin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `log_gifts`
--

CREATE TABLE `log_gifts` (
  `id` int(11) NOT NULL,
  `type` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `for_username` varchar(50) COLLATE utf8_czech_ci DEFAULT NULL,
  `for_teamname` varchar(50) COLLATE utf8_czech_ci DEFAULT NULL,
  `value` decimal(20,2) NOT NULL,
  `creator` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `description` text COLLATE utf8_czech_ci NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `log_kolik`
--

CREATE TABLE `log_kolik` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `userteamId` int(11) NOT NULL,
  `captured_kolik_idTeam` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `money_records`
--

CREATE TABLE `money_records` (
  `id` int(11) NOT NULL,
  `teamId` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `score` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_actual_total` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_total_received` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_total_bet` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_total_won` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_total_lost` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_sent` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_received` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_web_balance` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_web_bet` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_web_won` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_web_lost` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_ig_balance` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_ig_bet` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_ig_won` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_ig_lost` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_tg_received` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_extra_total` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_extra_tg_total` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_extra_tg_cl` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_extra_tg_dk` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_extra_tg_org` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_extra_tg_cpt` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_extra_tg_sys` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_extra_ig_total` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_extra_ig_cl` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_extra_ig_dk` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_extra_ig_org` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_extra_ig_sys` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_extra_web_total` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_extra_web_rank` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_extra_web_achievements` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_extra_qr_total` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_extra_qr_ig` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_extra_qr_tg` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_extra_code` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_extra_code_total` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_extra_clean_balance` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_extra_clean_won` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_extra_clean_lost` decimal(20,2) NOT NULL DEFAULT '0.00',
  `money_sanctions` decimal(20,2) NOT NULL DEFAULT '0.00',
  `coin_value_total` decimal(20,2) NOT NULL DEFAULT '0.00',
  `coin_value_earned` decimal(20,2) NOT NULL DEFAULT '0.00',
  `coin_value_returned` decimal(20,2) NOT NULL DEFAULT '0.00',
  `bills_value_total` decimal(20,2) NOT NULL DEFAULT '0.00',
  `bills_value_earned` decimal(20,2) NOT NULL DEFAULT '0.00',
  `bills_value_returned` decimal(20,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `money_records`
--

INSERT INTO `money_records` (`id`, `teamId`, `username`, `score`, `money_actual_total`, `money_total_received`, `money_total_bet`, `money_total_won`, `money_total_lost`, `money_sent`, `money_received`, `money_web_balance`, `money_web_bet`, `money_web_won`, `money_web_lost`, `money_ig_balance`, `money_ig_bet`, `money_ig_won`, `money_ig_lost`, `money_tg_received`, `money_extra_total`, `money_extra_tg_total`, `money_extra_tg_cl`, `money_extra_tg_dk`, `money_extra_tg_org`, `money_extra_tg_cpt`, `money_extra_tg_sys`, `money_extra_ig_total`, `money_extra_ig_cl`, `money_extra_ig_dk`, `money_extra_ig_org`, `money_extra_ig_sys`, `money_extra_web_total`, `money_extra_web_rank`, `money_extra_web_achievements`, `money_extra_qr_total`, `money_extra_qr_ig`, `money_extra_qr_tg`, `money_extra_code`, `money_extra_code_total`, `money_extra_clean_balance`, `money_extra_clean_won`, `money_extra_clean_lost`, `money_sanctions`, `coin_value_total`, `coin_value_earned`, `coin_value_returned`, `bills_value_total`, `bills_value_earned`, `bills_value_returned`) VALUES
(1, 1, 'aaaaaa', '1854.07', '1854.07', '1074.07', '0.00', '780.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '780.00', '1074.07', '1074.07', '0.00', '0.00', '0.00', '1074.07', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(2, 2, 'bbbbbb', '1040.00', '1040.00', '0.00', '0.00', '1040.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1040.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(3, 3, 'cccccc', '520.00', '520.00', '0.00', '0.00', '520.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '520.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(4, 1, 'dddddd', '1854.07', '1854.07', '1074.07', '0.00', '780.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '780.00', '1074.07', '1074.07', '0.00', '0.00', '0.00', '1074.07', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(5, 2, 'eeeeee', '1349.75', '1337.75', '279.75', '6.00', '1070.00', '12.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '18.00', '6.00', '30.00', '12.00', '1040.00', '279.75', '279.75', '0.00', '0.00', '0.00', '279.75', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(6, 3, 'ffffff', '520.00', '520.00', '0.00', '0.00', '520.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '520.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(7, 1, 'gggggg', '1854.07', '1854.07', '1074.07', '0.00', '780.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '780.00', '1074.07', '1074.07', '0.00', '0.00', '0.00', '1074.07', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(8, 2, 'hhhhhh', '1319.75', '1319.75', '279.75', '0.00', '1040.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1040.00', '279.75', '279.75', '0.00', '0.00', '0.00', '279.75', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(9, 3, 'iiiiii', '520.00', '520.00', '0.00', '0.00', '520.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '520.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(10, 1, 'jjjjjj', '1854.07', '1854.07', '1074.07', '0.00', '780.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '780.00', '1074.07', '1074.07', '0.00', '0.00', '0.00', '1074.07', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(11, 2, 'kkkkkk', '1319.75', '1319.75', '279.75', '0.00', '1040.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1040.00', '279.75', '279.75', '0.00', '0.00', '0.00', '279.75', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(12, 3, 'llllll', '520.00', '520.00', '0.00', '0.00', '520.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '520.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(13, 1, 'mmmmmm', '1854.07', '1854.07', '1074.07', '0.00', '780.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '780.00', '1074.07', '1074.07', '0.00', '0.00', '0.00', '1074.07', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(14, 2, 'nnnnnn', '1319.75', '1319.75', '279.75', '0.00', '1040.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1040.00', '279.75', '279.75', '0.00', '0.00', '0.00', '279.75', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(15, 3, 'oooooo', '545.00', '525.00', '0.00', '10.00', '545.00', '20.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '5.00', '10.00', '25.00', '20.00', '520.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Struktura tabulky `photo_forall`
--

CREATE TABLE `photo_forall` (
  `id` int(11) NOT NULL,
  `photo` text COLLATE utf8_czech_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `comment` text COLLATE utf8_czech_ci NOT NULL,
  `creationtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `photo_forusers`
--

CREATE TABLE `photo_forusers` (
  `id` int(11) NOT NULL,
  `photo` text COLLATE utf8_czech_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `forwho` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `comment` text COLLATE utf8_czech_ci NOT NULL,
  `creationtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `purpose` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `picture` text COLLATE utf8_czech_ci NOT NULL,
  `text` text COLLATE utf8_czech_ci NOT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT '1',
  `creationtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `teamdata`
--

CREATE TABLE `teamdata` (
  `id` int(20) NOT NULL,
  `mon_all_bal` decimal(20,2) NOT NULL DEFAULT '0.00',
  `mon_all_won` decimal(20,2) NOT NULL DEFAULT '0.00',
  `mon_all_lost` decimal(20,2) NOT NULL DEFAULT '0.00',
  `mon_all_bet` decimal(20,2) NOT NULL DEFAULT '0.00',
  `mon_cg_tot` decimal(20,2) NOT NULL DEFAULT '0.00',
  `cg_kolik_total` int(20) NOT NULL DEFAULT '0',
  `score` decimal(20,2) NOT NULL DEFAULT '0.00',
  `wg_numb_played_tot` int(20) NOT NULL DEFAULT '0',
  `wg_numb_played_won` int(20) NOT NULL DEFAULT '0',
  `wg_numb_played_lost` int(20) NOT NULL DEFAULT '0',
  `wg_numb_played_draw` int(11) NOT NULL DEFAULT '0',
  `mon_wg_all_bal` decimal(20,2) DEFAULT '0.00',
  `mon_wg_all_won` decimal(20,2) NOT NULL DEFAULT '0.00',
  `mon_wg_all_lost` decimal(20,2) NOT NULL DEFAULT '0.00',
  `mon_wg_all_bet` decimal(20,2) NOT NULL DEFAULT '0.00',
  `ig_numb_played_tot` int(20) NOT NULL DEFAULT '0',
  `ig_numb_played_won` int(20) NOT NULL DEFAULT '0',
  `ig_numb_played_lost` int(20) NOT NULL DEFAULT '0',
  `ig_numb_played_draw` int(11) NOT NULL DEFAULT '0',
  `mon_ig_all_bal` decimal(20,2) NOT NULL DEFAULT '0.00',
  `mon_ig_all_won` decimal(20,2) NOT NULL DEFAULT '0.00',
  `mon_ig_all_lost` decimal(20,2) NOT NULL DEFAULT '0.00',
  `mon_ig_all_bet` decimal(20,2) NOT NULL DEFAULT '0.00',
  `gifts_tot` int(11) NOT NULL DEFAULT '0',
  `gifts_val` decimal(20,2) NOT NULL DEFAULT '0.00',
  `gifts_user_tot` int(11) NOT NULL DEFAULT '0',
  `gifts_user_val` decimal(20,2) NOT NULL DEFAULT '0.00',
  `gifts_user_by_dom_tot` int(20) NOT NULL DEFAULT '0',
  `gifts_user_by_dom_val` decimal(20,2) NOT NULL DEFAULT '0.00',
  `gifts_user_by_org_tot` int(20) NOT NULL DEFAULT '0',
  `gifts_user_by_org_val` decimal(20,2) NOT NULL DEFAULT '0.00',
  `gifts_user_by_cl_tot` int(20) NOT NULL DEFAULT '0',
  `gifts_user_by_cl_val` decimal(20,2) NOT NULL DEFAULT '0.00',
  `gifts_user_by_sys_tot` int(20) NOT NULL DEFAULT '0',
  `gifts_user_by_sys_val` decimal(20,2) NOT NULL DEFAULT '0.00',
  `gifts_team_tot` int(11) NOT NULL DEFAULT '0',
  `gifts_team_val` decimal(20,2) NOT NULL DEFAULT '0.00',
  `gifts_team_by_dom_tot` int(20) NOT NULL DEFAULT '0',
  `gifts_team_by_dom_val` decimal(20,2) NOT NULL DEFAULT '0.00',
  `gifts_team_by_org_tot` int(20) NOT NULL DEFAULT '0',
  `gifts_team_by_org_val` decimal(20,2) NOT NULL DEFAULT '0.00',
  `gifts_team_by_cl_tot` int(20) NOT NULL DEFAULT '0',
  `gifts_team_by_cl_val` decimal(20,2) NOT NULL DEFAULT '0.00',
  `gifts_team_by_cpt_tot` int(20) NOT NULL DEFAULT '0',
  `gifts_team_by_cpt_val` decimal(20,2) NOT NULL DEFAULT '0.00',
  `gifts_team_by_sys_tot` int(20) NOT NULL DEFAULT '0',
  `gifts_team_by_sys_val` decimal(20,2) NOT NULL DEFAULT '0.00',
  `mon_to_div_from_cg_remains` decimal(20,2) NOT NULL DEFAULT '0.00',
  `mon_to_div_from_cg_divided_already` decimal(20,2) NOT NULL DEFAULT '0.00',
  `mon_to_div_from_cpt_remains` decimal(20,2) NOT NULL DEFAULT '0.00',
  `mon_to_div_from_cpt_divided_already` decimal(20,2) NOT NULL DEFAULT '0.00',
  `mon_to_div_from_qr_remains` decimal(20,2) NOT NULL DEFAULT '0.00',
  `mon_to_div_from_qr_divided_already` decimal(20,2) NOT NULL DEFAULT '0.00',
  `mon_to_div_divided_tot` decimal(20,2) NOT NULL DEFAULT '0.00',
  `qr_tot` int(20) NOT NULL DEFAULT '0',
  `qr_mon_tot` decimal(20,2) DEFAULT '0.00',
  `qr_mon_users` decimal(20,2) NOT NULL DEFAULT '0.00',
  `qr_mon_teams` decimal(20,2) NOT NULL DEFAULT '0.00',
  `code_total` int(11) NOT NULL DEFAULT '0',
  `code_mon` double(20,2) NOT NULL DEFAULT '0.00',
  `code_mon_total` decimal(20,2) NOT NULL DEFAULT '0.00',
  `memb_activ_first` varchar(75) COLLATE utf8_czech_ci NOT NULL,
  `memb_activ_second` varchar(75) COLLATE utf8_czech_ci NOT NULL,
  `memb_activ_third` varchar(75) COLLATE utf8_czech_ci NOT NULL,
  `memb_profit_first` varchar(75) COLLATE utf8_czech_ci NOT NULL,
  `memb_profit_second` varchar(75) COLLATE utf8_czech_ci NOT NULL,
  `memb_profit_third` varchar(75) COLLATE utf8_czech_ci NOT NULL,
  `data_weblogins` int(20) NOT NULL DEFAULT '0',
  `data_teamcpt` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `data_cleanpts_bal` decimal(20,2) NOT NULL DEFAULT '0.00',
  `data_cleanpts_earned` decimal(20,2) NOT NULL DEFAULT '0.00',
  `data_cleanpts_lost` decimal(20,2) NOT NULL DEFAULT '0.00',
  `data_bank_trans_tot` int(20) NOT NULL DEFAULT '0',
  `data_bank_trans_val_sent` decimal(20,2) NOT NULL DEFAULT '0.00',
  `data_bank_trans_val_received` decimal(20,2) NOT NULL DEFAULT '0.00',
  `data_bank_trans_numb_sent` int(11) NOT NULL DEFAULT '0',
  `data_bank_trans_numb_received` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `teamdata`
--

INSERT INTO `teamdata` (`id`, `mon_all_bal`, `mon_all_won`, `mon_all_lost`, `mon_all_bet`, `mon_cg_tot`, `cg_kolik_total`, `score`, `wg_numb_played_tot`, `wg_numb_played_won`, `wg_numb_played_lost`, `wg_numb_played_draw`, `mon_wg_all_bal`, `mon_wg_all_won`, `mon_wg_all_lost`, `mon_wg_all_bet`, `ig_numb_played_tot`, `ig_numb_played_won`, `ig_numb_played_lost`, `ig_numb_played_draw`, `mon_ig_all_bal`, `mon_ig_all_won`, `mon_ig_all_lost`, `mon_ig_all_bet`, `gifts_tot`, `gifts_val`, `gifts_user_tot`, `gifts_user_val`, `gifts_user_by_dom_tot`, `gifts_user_by_dom_val`, `gifts_user_by_org_tot`, `gifts_user_by_org_val`, `gifts_user_by_cl_tot`, `gifts_user_by_cl_val`, `gifts_user_by_sys_tot`, `gifts_user_by_sys_val`, `gifts_team_tot`, `gifts_team_val`, `gifts_team_by_dom_tot`, `gifts_team_by_dom_val`, `gifts_team_by_org_tot`, `gifts_team_by_org_val`, `gifts_team_by_cl_tot`, `gifts_team_by_cl_val`, `gifts_team_by_cpt_tot`, `gifts_team_by_cpt_val`, `gifts_team_by_sys_tot`, `gifts_team_by_sys_val`, `mon_to_div_from_cg_remains`, `mon_to_div_from_cg_divided_already`, `mon_to_div_from_cpt_remains`, `mon_to_div_from_cpt_divided_already`, `mon_to_div_from_qr_remains`, `mon_to_div_from_qr_divided_already`, `mon_to_div_divided_tot`, `qr_tot`, `qr_mon_tot`, `qr_mon_users`, `qr_mon_teams`, `code_total`, `code_mon`, `code_mon_total`, `memb_activ_first`, `memb_activ_second`, `memb_activ_third`, `memb_profit_first`, `memb_profit_second`, `memb_profit_third`, `data_weblogins`, `data_teamcpt`, `data_cleanpts_bal`, `data_cleanpts_earned`, `data_cleanpts_lost`, `data_bank_trans_tot`, `data_bank_trans_val_sent`, `data_bank_trans_val_received`, `data_bank_trans_numb_sent`, `data_bank_trans_numb_received`) VALUES
(1, '3900.00', '3900.00', '0.00', '0.00', '6000.00', 0, '9270.35', 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 5, '5370.35', 5, '5370.35', 0, '0.00', 0, '0.00', 0, '0.00', 0, '0.00', 0, '0.00', 0, '0.00', 0, '0.00', 0, '0.00', 5, '5370.35', 0, '0.00', '0.00', '5370.33', '600.00', '0.00', '0.00', '0.00', '0.00', 0, '0.00', '0.00', '0.00', 0, 0.00, '0.00', 'aaaaaa (koeficient: 3)', 'dddddd (koeficient: 2)', 'mmmmmm (koeficient: 1)', 'mmmmmm (score: 1854.07)', 'dddddd (score: 1854.07)', 'gggggg (score: 1854.07)', 3, 'dddddd', '0.00', '0.00', '0.00', 0, '0.00', '0.00', 0, 0),
(2, '5218.00', '5230.00', '12.00', '6.00', '8000.00', 0, '6349.00', 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 21, 7, 7, 7, '18.00', '30.00', '12.00', '6.00', 10, '1119.00', 10, '1119.00', 0, '0.00', 0, '0.00', 0, '0.00', 0, '0.00', 0, '0.00', 0, '0.00', 0, '0.00', 0, '0.00', 10, '1119.00', 0, '0.00', '279.75', '6713.88', '800.00', '0.00', '0.00', '0.00', '0.00', 0, '0.00', '0.00', '0.00', 0, 0.00, '0.00', 'eeeeee (koeficient: 23)', 'nnnnnn (koeficient: 2)', 'hhhhhh (koeficient: 2)', 'eeeeee (score: 1349.75)', 'nnnnnn (score: 1319.75)', 'hhhhhh (score: 1319.75)', 0, 'hhhhhh', '0.00', '0.00', '0.00', 0, '0.00', '0.00', 0, 0),
(3, '2605.00', '2625.00', '20.00', '10.00', '4000.00', 0, '2625.00', 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 20, 10, 5, 5, '5.00', '25.00', '20.00', '10.00', 0, '0.00', 0, '0.00', 0, '0.00', 0, '0.00', 0, '0.00', 0, '0.00', 0, '0.00', 0, '0.00', 0, '0.00', 0, '0.00', 0, '0.00', 0, '0.00', '3184.72', '0.00', '400.00', '0.00', '0.00', '0.00', '0.00', 0, '0.00', '0.00', '0.00', 0, 0.00, '0.00', 'oooooo (koeficient: 20)', 'cccccc (koeficient: 2)', 'iiiiii (koeficient: 0)', 'oooooo (score: 545.00)', 'ffffff (score: 520.00)', 'iiiiii (score: 520.00)', 2, 'llllll', '0.00', '0.00', '0.00', 0, '0.00', '0.00', 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `teams`
--

CREATE TABLE `teams` (
  `id` int(50) NOT NULL,
  `color` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `numb_members` int(10) NOT NULL,
  `numb_registered` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `teams`
--

INSERT INTO `teams` (`id`, `color`, `name`, `numb_members`, `numb_registered`) VALUES
(1, 'Áčková', 'Alfa', 5, 5),
(2, 'Betová', 'Beta', 5, 5),
(3, 'Gammová', 'Gamma', 5, 5);

-- --------------------------------------------------------

--
-- Struktura tabulky `userdata`
--

CREATE TABLE `userdata` (
  `id` int(11) NOT NULL,
  `teamId` int(11) NOT NULL DEFAULT '0',
  `username` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `score` decimal(20,2) NOT NULL DEFAULT '0.00',
  `last_access` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `weblogins` int(11) NOT NULL DEFAULT '0',
  `rank` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `rank_percent_bonus` decimal(20,2) NOT NULL DEFAULT '0.00',
  `data_bank_trans_total` int(11) NOT NULL DEFAULT '0',
  `data_bank_trans_outgoing` int(11) NOT NULL DEFAULT '0',
  `data_bank_trans_incoming` int(11) NOT NULL DEFAULT '0',
  `code_total` int(11) NOT NULL DEFAULT '0',
  `code_ig_entered` int(11) NOT NULL DEFAULT '0',
  `code_tg_entered` int(11) NOT NULL DEFAULT '0',
  `code_kolikCode` int(11) NOT NULL DEFAULT '0',
  `gifts_number_total` int(11) NOT NULL DEFAULT '0',
  `gifts_number_ig` int(11) NOT NULL DEFAULT '0',
  `gifts_number_ig_dk` int(11) NOT NULL DEFAULT '0',
  `gifts_number_ig_cl` int(11) NOT NULL DEFAULT '0',
  `gifts_number_ig_org` int(11) NOT NULL DEFAULT '0',
  `gifts_number_ig_sys` int(11) NOT NULL DEFAULT '0',
  `gifts_number_tg` int(11) NOT NULL DEFAULT '0',
  `gifts_number_tg_cl` int(11) NOT NULL DEFAULT '0',
  `gifts_number_tg_dk` int(11) NOT NULL DEFAULT '0',
  `gifts_number_tg_org` int(11) NOT NULL DEFAULT '0',
  `gifts_number_tg_cpt` int(11) NOT NULL DEFAULT '0',
  `gifts_number_tg_sys` int(11) NOT NULL DEFAULT '0',
  `gifts_number_wg` int(11) NOT NULL DEFAULT '0',
  `wg_numb_played_total` int(11) NOT NULL DEFAULT '0',
  `wg_numb_played_won` int(11) NOT NULL DEFAULT '0',
  `wg_numb_played_lost` int(11) NOT NULL DEFAULT '0',
  `wg_numb_played_draw` int(11) NOT NULL DEFAULT '0',
  `ig_numb_played_total` int(11) NOT NULL DEFAULT '0',
  `ig_numb_played_won` int(11) NOT NULL DEFAULT '0',
  `ig_numb_played_lost` int(11) NOT NULL DEFAULT '0',
  `ig_numb_played_draw` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `userdata`
--

INSERT INTO `userdata` (`id`, `teamId`, `username`, `score`, `last_access`, `weblogins`, `rank`, `rank_percent_bonus`, `data_bank_trans_total`, `data_bank_trans_outgoing`, `data_bank_trans_incoming`, `code_total`, `code_ig_entered`, `code_tg_entered`, `code_kolikCode`, `gifts_number_total`, `gifts_number_ig`, `gifts_number_ig_dk`, `gifts_number_ig_cl`, `gifts_number_ig_org`, `gifts_number_ig_sys`, `gifts_number_tg`, `gifts_number_tg_cl`, `gifts_number_tg_dk`, `gifts_number_tg_org`, `gifts_number_tg_cpt`, `gifts_number_tg_sys`, `gifts_number_wg`, `wg_numb_played_total`, `wg_numb_played_won`, `wg_numb_played_lost`, `wg_numb_played_draw`, `ig_numb_played_total`, `ig_numb_played_won`, `ig_numb_played_lost`, `ig_numb_played_draw`) VALUES
(1, 1, 'aaaaaa', '1854.07', '2019-06-13 23:40:42', 2, 'NOOB', '0.00', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 2, 'bbbbbb', '1040.00', '2019-06-13 23:40:42', 0, 'NOOB', '0.00', 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 3, 'cccccc', '520.00', '2019-06-14 01:26:59', 2, 'NOOB', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 1, 'dddddd', '1854.07', '2019-06-13 23:40:42', 1, 'NOOB', '0.00', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2, 'eeeeee', '1349.75', '2019-06-13 23:29:38', 0, 'NOOB', '0.00', 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 21, 7, 7, 7),
(6, 3, 'ffffff', '520.00', '2019-06-13 22:43:30', 0, 'NOOB', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 1, 'gggggg', '1854.07', '2019-06-13 23:40:42', 0, 'NOOB', '0.00', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 2, 'hhhhhh', '1319.75', '2019-06-13 23:40:42', 0, 'NOOB', '0.00', 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 3, 'iiiiii', '520.00', '2019-06-13 22:43:31', 0, 'NOOB', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 1, 'jjjjjj', '1854.07', '2019-06-13 23:40:42', 0, 'NOOB', '0.00', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 2, 'kkkkkk', '1319.75', '2019-06-13 23:40:43', 0, 'NOOB', '0.00', 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 3, 'llllll', '520.00', '2019-06-13 22:43:31', 0, 'NOOB', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 1, 'mmmmmm', '1854.07', '2019-06-13 23:40:43', 0, 'NOOB', '0.00', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 2, 'nnnnnn', '1319.75', '2019-06-13 23:40:43', 0, 'NOOB', '0.00', 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 3, 'oooooo', '545.00', '2019-06-13 23:40:43', 0, 'NOOB', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20, 10, 5, 5);

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `password` text COLLATE utf8_czech_ci NOT NULL,
  `verification` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `birthdate` date NOT NULL,
  `sex` varchar(10) COLLATE utf8_czech_ci NOT NULL,
  `age` int(4) NOT NULL,
  `agree1` varchar(10) COLLATE utf8_czech_ci NOT NULL,
  `agree2` varchar(10) COLLATE utf8_czech_ci NOT NULL,
  `needhelp` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `firstaccess` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `verification`, `firstname`, `lastname`, `birthdate`, `sex`, `age`, `agree1`, `agree2`, `needhelp`, `firstaccess`) VALUES
(1, 'aaaaaa', 'a', '8ana11', 'AA', 'AAAA', '2000-11-11', 'Male', 18, 'YES', 'YES', 'OK', '2019-06-09 12:03:38'),
(2, 'bbbbbb', 'b', '61bbn2', 'BB', 'BBBB', '2001-02-11', 'Female', 18, 'YES', 'YES', 'OK', '2019-06-09 12:04:08'),
(3, 'cccccc', 'c', 'cu1c62', 'CC', 'CCCC', '2002-03-11', 'Female', 17, 'YES', 'YES', 'OK', '2019-06-09 12:04:33'),
(4, 'dddddd', 'd', '9q92dd', 'DD', 'DDDD', '2003-04-11', 'Male', 16, 'YES', 'YES', 'OK', '2019-06-09 12:04:54'),
(5, 'eeeeee', 'e', 'p897ee', 'EE', 'EEEE', '2004-05-11', 'Female', 15, 'YES', 'YES', 'OK', '2019-06-09 12:05:13'),
(6, 'ffffff', 'f', 'f0fo39', 'FF', 'FFFF', '2005-05-11', 'Male', 14, 'YES', 'YES', 'OK', '2019-06-09 12:06:06'),
(7, 'gggggg', 'g', 'g18gl9', 'GG', 'GGGG', '2006-06-11', 'Male', 12, 'YES', 'YES', 'OK', '2019-06-09 12:06:21'),
(8, 'hhhhhh', 'h', 'z90h2h', 'HH', 'HHHH', '2007-07-11', 'Female', 11, 'YES', 'YES', 'OK', '2019-06-09 12:06:49'),
(9, 'iiiiii', 'i', 'io5i31', 'II', 'IIII', '2008-08-11', 'Male', 10, 'YES', 'YES', 'OK', '2019-06-09 12:07:10'),
(10, 'jjjjjj', 'j', '3jbj26', 'JJ', 'JJJJ', '2009-09-11', 'Female', 9, 'YES', 'YES', 'OK', '2019-06-09 12:07:48'),
(11, 'kkkkkk', 'k', '14kn6k', 'KK', 'KKKK', '2010-10-11', 'Female', 8, 'YES', 'YES', 'OK', '2019-06-09 12:08:42'),
(12, 'llllll', 'l', 'k5l9l6', 'LL', 'LLLL', '2011-11-11', 'Female', 7, 'YES', 'YES', 'OK', '2019-06-09 12:09:10'),
(13, 'mmmmmm', 'm', 'g5m7m7', 'MM', 'MMMM', '2012-12-11', 'Male', 6, 'YES', 'YES', 'OK', '2019-06-09 12:09:28'),
(14, 'nnnnnn', 'n', 'nn6v63', 'NN', 'NNNN', '2000-01-22', 'Male', 19, 'YES', 'YES', 'OK', '2019-06-09 12:10:05'),
(15, 'oooooo', 'o', 'po811o', 'OO', 'OOOO', '2001-02-22', 'Male', 18, 'YES', 'YES', 'OK', '2019-06-09 12:10:25');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `coins`
--
ALTER TABLE `coins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `label` (`label`);

--
-- Klíče pro tabulku `data_codes`
--
ALTER TABLE `data_codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Klíče pro tabulku `data_code_kolik`
--
ALTER TABLE `data_code_kolik`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `data_game_best_score`
--
ALTER TABLE `data_game_best_score`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `data_team_games`
--
ALTER TABLE `data_team_games`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `data_team_kolik`
--
ALTER TABLE `data_team_kolik`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `data_user_games`
--
ALTER TABLE `data_user_games`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `data_user_kolik`
--
ALTER TABLE `data_user_kolik`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `ig_data_karty`
--
ALTER TABLE `ig_data_karty`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `ig_data_ringo`
--
ALTER TABLE `ig_data_ringo`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `logger`
--
ALTER TABLE `logger`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `log_codes`
--
ALTER TABLE `log_codes`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `log_coins`
--
ALTER TABLE `log_coins`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `log_gifts`
--
ALTER TABLE `log_gifts`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `log_kolik`
--
ALTER TABLE `log_kolik`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `money_records`
--
ALTER TABLE `money_records`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `photo_forall`
--
ALTER TABLE `photo_forall`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `photo_forusers`
--
ALTER TABLE `photo_forusers`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `teamdata`
--
ALTER TABLE `teamdata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Klíče pro tabulku `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `coins`
--
ALTER TABLE `coins`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pro tabulku `data_codes`
--
ALTER TABLE `data_codes`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pro tabulku `data_code_kolik`
--
ALTER TABLE `data_code_kolik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `data_game_best_score`
--
ALTER TABLE `data_game_best_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pro tabulku `data_team_games`
--
ALTER TABLE `data_team_games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pro tabulku `data_team_kolik`
--
ALTER TABLE `data_team_kolik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pro tabulku `data_user_games`
--
ALTER TABLE `data_user_games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pro tabulku `data_user_kolik`
--
ALTER TABLE `data_user_kolik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pro tabulku `ig_data_karty`
--
ALTER TABLE `ig_data_karty`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pro tabulku `ig_data_ringo`
--
ALTER TABLE `ig_data_ringo`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pro tabulku `logger`
--
ALTER TABLE `logger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pro tabulku `log_codes`
--
ALTER TABLE `log_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pro tabulku `log_coins`
--
ALTER TABLE `log_coins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `log_gifts`
--
ALTER TABLE `log_gifts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `log_kolik`
--
ALTER TABLE `log_kolik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `money_records`
--
ALTER TABLE `money_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pro tabulku `photo_forall`
--
ALTER TABLE `photo_forall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `photo_forusers`
--
ALTER TABLE `photo_forusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `teamdata`
--
ALTER TABLE `teamdata`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pro tabulku `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pro tabulku `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `teamdata`
--
ALTER TABLE `teamdata`
  ADD CONSTRAINT `teamdata_ibfk_1` FOREIGN KEY (`id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
