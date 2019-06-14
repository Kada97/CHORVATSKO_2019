-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Sob 08. čen 2019, 16:06
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
(1, 'coin_nv_ch_white', 47, 10, 0, 44),
(2, 'coin_nv_ch_red', 46, 50, 0, 46),
(3, 'coin_nv_ch_blue', 44, 500, 0, 41),
(4, 'coin_nv_ch_green', 25, 250, 0, 23),
(5, 'coin_nv_ch_black', 21, 100, 0, 19),
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
-- Struktura tabulky `data_team_games`
--

CREATE TABLE `data_team_games` (
  `id` int(11) NOT NULL,
  `game_name` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `when_played` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `game_popularity` int(11) NOT NULL,
  `preparation_time_minutes` int(11) NOT NULL,
  `game_budget` int(11) NOT NULL,
  `average_result` double(20,2) NOT NULL,
  `firstlast_diff` double(20,2) NOT NULL,
  `'team_'` decimal(20,2) NOT NULL,
  `'team_8'` decimal(20,2) NOT NULL,
  `team_9` decimal(20,2) NOT NULL,
  `horna` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `data_team_kolik`
--

CREATE TABLE `data_team_kolik` (
  `id` int(11) NOT NULL,
  `team` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `total_points_balance` int(11) NOT NULL DEFAULT '0',
  `total_points_earned` int(11) NOT NULL DEFAULT '0',
  `total_points_lost` int(11) NOT NULL DEFAULT '0',
  `total_points_saved` int(11) NOT NULL DEFAULT '0',
  `total_points_penalty` int(11) NOT NULL DEFAULT '0',
  `best_player` varchar(75) COLLATE utf8_czech_ci NOT NULL,
  `arch_enemy_team` varchar(50) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

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
  `total_saved_points` int(11) NOT NULL DEFAULT '0',
  `last_capture` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `logger`
--

CREATE TABLE `logger` (
  `id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `who` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `location` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `what` text COLLATE utf8_czech_ci NOT NULL,
  `detail` text COLLATE utf8_czech_ci NOT NULL,
  `priority` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `log_codes`
--

CREATE TABLE `log_codes` (
  `id` int(11) NOT NULL,
  `code` text COLLATE utf8_czech_ci NOT NULL,
  `creationtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

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
  `userteam` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `userteamId` int(11) NOT NULL,
  `captured_kolik_idTeam` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `daypart` varchar(30) COLLATE utf8_czech_ci NOT NULL
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
  `coin_value_returned` decimal(20,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

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
-- Klíče pro tabulku `data_user_kolik`
--
ALTER TABLE `data_user_kolik`
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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `data_code_kolik`
--
ALTER TABLE `data_code_kolik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `data_team_games`
--
ALTER TABLE `data_team_games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `data_team_kolik`
--
ALTER TABLE `data_team_kolik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `data_user_kolik`
--
ALTER TABLE `data_user_kolik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `logger`
--
ALTER TABLE `logger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `log_codes`
--
ALTER TABLE `log_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
