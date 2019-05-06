-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 06. kvě 2019, 15:44
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
(1, 'coin_nv_ch_white', 47, 10, 0, 47),
(2, 'coin_nv_ch_red', 46, 50, 0, 46),
(3, 'coin_nv_ch_blue', 44, 500, 0, 44),
(4, 'coin_nv_ch_green', 25, 250, 0, 25),
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
  `value` int(20) NOT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT '1',
  `invoker` varchar(40) COLLATE utf8_czech_ci DEFAULT NULL,
  `typegame` int(2) NOT NULL,
  `creationtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usetime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `detail` text COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `data_team_kolik`
--

CREATE TABLE `data_team_kolik` (
  `id` int(11) NOT NULL,
  `teamId` int(11) NOT NULL,
  `team` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `total_points_balance` int(11) NOT NULL,
  `total_points_earned` int(11) NOT NULL,
  `total_points_lost` int(11) NOT NULL,
  `total_points_saved` int(11) NOT NULL,
  `total_points_penalty` int(11) NOT NULL,
  `best_player` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `arch_enemy_team` varchar(50) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `data_user_kolik`
--

CREATE TABLE `data_user_kolik` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `userteam` int(11) NOT NULL,
  `userteamId` int(11) NOT NULL,
  `total_captured_points` int(11) NOT NULL,
  `total_saved_points` int(11) NOT NULL,
  `last_capture` varchar(50) COLLATE utf8_czech_ci NOT NULL
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

--
-- Vypisuji data pro tabulku `logger`
--

INSERT INTO `logger` (`id`, `time`, `who`, `location`, `what`, `detail`, `priority`) VALUES
(1, '2019-05-05 19:39:57', 'Admin', 'addNewPicturePage', 'Nejsou žádní uživatelé', '[mobileOptions] => addPicPage  |  ', 0),
(2, '2019-05-05 19:40:25', 'None', 'loginPage', 'Přístup na loginPage.', '', 0),
(3, '2019-05-05 19:40:31', 'Admin', 'loginPage', 'Přihlášení na admina.', '[username] => #sys#  |  [password] =>   |  [login] => Přihlásit  |  ', 1),
(4, '2019-05-05 19:40:33', 'Admin', '', 'Nejsou žádní uživatelé', '[mobileOptions] => addPicPage  |  ', 0),
(5, '2019-05-05 19:40:58', 'Admin', 'addNewPicturePage', 'Nejsou žádní uživatelé', '[picrights] => all  |  [choosePurposeTo] => msg  |  [image_text] => abcd  |  [addNewPic] => Přidat obrázek   |  ', 0),
(6, '2019-05-05 19:51:01', 'None', 'loginPage', 'Přístup na loginPage.', '', 0),
(7, '2019-05-05 19:51:08', 'Admin', 'loginPage', 'Přihlášení na admina.', '[username] => #sys#  |  [password] =>   |  [login] => Přihlásit  |  ', 1),
(8, '2019-05-05 20:41:42', 'Admin', '', 'Uživatel se odhlašuje.', '[mobileOptions] => LOGOUT  |  ', 0),
(9, '2019-05-05 20:41:42', 'None', 'loginPage', 'Přístup na loginPage.', '', 0),
(10, '2019-05-05 20:41:44', 'None', 'registerPage', 'Přístup na registerPage.', '[registerPage] =>   |  ', 0),
(11, '2019-05-05 20:42:03', 'None', 'registerPage', 'Pokus o registraci účtu: qqwwee s heslem: <qweqwe>, jménem: qqq www.', '[username] => qqwwee  |  [password] => qweqwe  |  [passwordCheck] => qweqwe  |  [firstname] => qqq  |  [lastname] => www  |  [birthdate] => 2019-04-29  |  [sex] => Male  |  [agree1] => ON  |  [agree2] => ON  |  [register] => Dokončit registraci  |  ', 1),
(12, '2019-05-05 20:42:25', 'None', 'registerPage', 'Pokus o registraci účtu: qqwwee s heslem: <qweqwe>, jménem: qqq www.', '[username] => qqwwee  |  [password] => qweqwe  |  [passwordCheck] => qweqwe  |  [firstname] => qqq  |  [lastname] => www  |  [birthdate] => 2019-04-29  |  [sex] => Male  |  [agree1] => ON  |  [agree2] => ON  |  [register] => Dokončit registraci  |  ', 1),
(13, '2019-05-05 20:42:25', 'None', 'registerPage', 'Úspěšně vytvořený účet: qqwwee jménem: qqq www.', '[username] => qqwwee  |  [password] => qweqwe  |  [passwordCheck] => qweqwe  |  [firstname] => qqq  |  [lastname] => www  |  [birthdate] => 2019-04-29  |  [sex] => Male  |  [agree1] => ON  |  [agree2] => ON  |  [register] => Dokončit registraci  |  ', 0),
(14, '2019-05-05 20:42:25', 'None', 'loginPage', 'Přístup na loginPage.', '', 0),
(15, '2019-05-05 20:42:34', 'None', 'loginPage', 'Pokus o přihlášení na účet: qweqwe.', '[username] => qweqwe  |  [password] => qweqwe  |  [login] => Přihlásit  |  ', 1),
(16, '2019-05-05 20:42:34', 'None', 'loginPage', 'Přístup na loginPage.', '[username] => qweqwe  |  [password] => qweqwe  |  [login] => Přihlásit  |  ', 0),
(17, '2019-05-05 20:42:34', 'None', 'loginPage', 'Uživatelské jméno < qweqwe > nebylo registrováno.', '[username] => qweqwe  |  [password] => qweqwe  |  [login] => Přihlásit  |  ', 0),
(18, '2019-05-05 20:42:34', 'None', 'loginPage', 'Uživatelské jméno < qweqwe > nebylo registrováno.', '[username] => qweqwe  |  [password] => qweqwe  |  [login] => Přihlásit  |  ', 0),
(19, '2019-05-05 20:42:38', 'None', 'loginPage', 'Pokus o přihlášení na účet: qqqwww.', '[username] => qqqwww  |  [password] => qweqwe  |  [login] => Přihlásit  |  ', 1),
(20, '2019-05-05 20:42:39', 'None', 'loginPage', 'Přístup na loginPage.', '[username] => qqqwww  |  [password] => qweqwe  |  [login] => Přihlásit  |  ', 0),
(21, '2019-05-05 20:42:39', 'None', 'loginPage', 'Uživatelské jméno < qqqwww > nebylo registrováno.', '[username] => qqqwww  |  [password] => qweqwe  |  [login] => Přihlásit  |  ', 0),
(22, '2019-05-05 20:42:39', 'None', 'loginPage', 'Uživatelské jméno < qqqwww > nebylo registrováno.', '[username] => qqqwww  |  [password] => qweqwe  |  [login] => Přihlásit  |  ', 0),
(23, '2019-05-05 20:42:56', 'qqwwee', 'loginPage', 'Uživatel: qqwwee se úspěšně přihlásil.', '[username] => qqwwee  |  [password] => qweqwe  |  [login] => Přihlásit  |  ', 0),
(24, '2019-05-05 20:42:56', 'qqwwee', '_home', 'Uživatel qqwwee potvrzuje přihlášení načtením stránky Home.', '', 0),
(25, '2019-05-05 20:44:35', 'qqwwee', 'loginPage', 'Uživatel se odhlašuje.', '[mobileOptions] => LOGOUT  |  ', 0),
(26, '2019-05-05 20:44:36', 'None', 'loginPage', 'Přístup na loginPage.', '', 0),
(27, '2019-05-05 20:44:41', 'Admin', 'loginPage', 'Přihlášení na admina.', '[username] => #sys#  |  [password] =>   |  [login] => Přihlásit  |  ', 1),
(28, '2019-05-05 20:45:19', 'Admin', '', 'Uživatel se odhlašuje.', '[mobileOptions] => LOGOUT  |  ', 0),
(29, '2019-05-05 20:45:20', 'None', 'loginPage', 'Přístup na loginPage.', '', 0),
(30, '2019-05-05 20:45:26', 'qqwwee', 'loginPage', 'Uživatel: qqwwee se úspěšně přihlásil.', '[username] => qqwwee  |  [password] => qweqwe  |  [login] => Přihlásit  |  ', 0),
(31, '2019-05-05 20:45:26', 'qqwwee', '_home', 'Uživatel qqwwee potvrzuje přihlášení načtením stránky Home.', '', 0),
(32, '2019-05-05 20:52:45', 'qqwwee', '', 'Uživatel se odhlašuje.', '[mobileOptions] => LOGOUT  |  ', 0),
(33, '2019-05-05 20:52:46', 'None', 'loginPage', 'Přístup na loginPage.', '', 0),
(34, '2019-05-05 20:52:49', 'Admin', 'loginPage', 'Přihlášení na admina.', '[username] => #sys#  |  [password] =>   |  [login] => Přihlásit  |  ', 1),
(35, '2019-05-05 22:18:28', 'Admin', '', 'Uživatel se odhlašuje.', '[mobileOptions] => LOGOUT  |  ', 0),
(36, '2019-05-05 22:18:28', 'None', 'loginPage', 'Přístup na loginPage.', '', 0);

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
-- Struktura tabulky `photo_forall`
--

CREATE TABLE `photo_forall` (
  `id` int(11) NOT NULL,
  `photo` text COLLATE utf8_czech_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `comment` text COLLATE utf8_czech_ci NOT NULL,
  `creationtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `photo_forall`
--

INSERT INTO `photo_forall` (`id`, `photo`, `username`, `comment`, `creationtime`) VALUES
(1, '1-1557085257.jpeg', 'Admin', 'abcd', '2019-05-05 19:40:57'),
(2, '2-1557085257.jpeg', 'Admin', 'abcd', '2019-05-05 19:40:57'),
(3, '3-1557085257.jpeg', 'Admin', 'abcd', '2019-05-05 19:40:57'),
(4, '4-1557085257.jpeg', 'Admin', 'abcd', '2019-05-05 19:40:57'),
(5, '5-1557085257.jpeg', 'Admin', 'abcd', '2019-05-05 19:40:57'),
(6, '6-1557085257.png', 'Admin', 'abcd', '2019-05-05 19:40:57'),
(7, '7-1557085258.jpeg', 'Admin', 'abcd', '2019-05-05 19:40:58'),
(8, '8-1557085258.jpeg', 'Admin', 'abcd', '2019-05-05 19:40:58'),
(9, '9-1557085258.png', 'Admin', 'abcd', '2019-05-05 19:40:58'),
(10, '10-1557085258.jpeg', 'Admin', 'abcd', '2019-05-05 19:40:58'),
(11, '11-1557085258.jpeg', 'Admin', 'abcd', '2019-05-05 19:40:58'),
(12, '12-1557085258.jpeg', 'Admin', 'abcd', '2019-05-05 19:40:58'),
(13, '13-1557085258.jpeg', 'Admin', 'abcd', '2019-05-05 19:40:58'),
(14, '14-1557085258.jpeg', 'Admin', 'abcd', '2019-05-05 19:40:58'),
(15, '15-1557085258.jpeg', 'Admin', 'abcd', '2019-05-05 19:40:58'),
(16, '16-1557085258.jpeg', 'Admin', 'abcd', '2019-05-05 19:40:58'),
(17, '17-1557085258.jpeg', 'Admin', 'abcd', '2019-05-05 19:40:58'),
(18, '18-1557085258.jpeg', 'Admin', 'abcd', '2019-05-05 19:40:58'),
(19, '19-1557085258.jpeg', 'Admin', 'abcd', '2019-05-05 19:40:58');

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

--
-- Vypisuji data pro tabulku `photo_forusers`
--

INSERT INTO `photo_forusers` (`id`, `photo`, `username`, `forwho`, `comment`, `creationtime`) VALUES
(1, '1-1557089010.jpeg', 'qqwwee', 'qqwwee', 'test', '2019-05-05 20:43:30'),
(2, '2-1557089110.jpeg', 'Admin', 'qqwwee', 'saagasasdsasddgsgsdgsgewwwwwwwwwwwwwwwwwwwwwwwwwww', '2019-05-05 20:45:10');

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
  `mon_all_bal` decimal(20,2) NOT NULL,
  `mon_all_won` decimal(20,2) NOT NULL,
  `mon_all_lost` decimal(20,2) NOT NULL,
  `mon_all_bet` decimal(20,2) NOT NULL,
  `mon_cg_tot` decimal(20,2) NOT NULL,
  `cg_kolik_total` int(20) NOT NULL,
  `score` int(20) NOT NULL,
  `wg_numb_played_tot` int(20) NOT NULL,
  `wg_numb_played_won` int(20) NOT NULL,
  `wg_numb_played_lost` int(20) NOT NULL,
  `mon_wg_all_bal` decimal(20,2) NOT NULL,
  `mon_wg_all_won` decimal(20,2) NOT NULL,
  `mon_wg_all_lost` decimal(20,2) NOT NULL,
  `mon_wg_all_bet` decimal(20,2) NOT NULL,
  `ig_numb_played_tot` int(20) NOT NULL,
  `ig_numb_played_won` int(20) NOT NULL,
  `ig_numb_played_lost` int(20) NOT NULL,
  `mon_ig_all_bal` decimal(20,2) NOT NULL,
  `mon_ig_all_won` decimal(20,2) NOT NULL,
  `mon_ig_all_lost` decimal(20,2) NOT NULL,
  `mon_ig_all_bet` decimal(20,2) NOT NULL,
  `gifts_user_by_dom_tot` int(20) NOT NULL,
  `gifts_user_by_dom_val` int(20) NOT NULL,
  `gifts_user_by_org_tot` int(20) NOT NULL,
  `gifts_user_by_org_val` int(20) NOT NULL,
  `gifts_user_by_cl_tot` int(20) NOT NULL,
  `gifts_user_by_cl_val` int(20) NOT NULL,
  `gifts_user_by_sys_tot` int(20) NOT NULL,
  `gifts_user_by_sys_val` int(20) NOT NULL,
  `gifts_team_by_dom_tot` int(20) NOT NULL,
  `gifts_team_by_dom_val` int(20) NOT NULL,
  `gifts_team_by_org_tot` int(20) NOT NULL,
  `gifts_team_by_org_val` int(20) NOT NULL,
  `gifts_team_by_cl_tot` int(20) NOT NULL,
  `gifts_team_by_cl_val` int(20) NOT NULL,
  `gifts_team_by_cpt_tot` int(20) NOT NULL,
  `gifts_team_by_cpt_val` int(20) NOT NULL,
  `gifts_team_by_sys_tot` int(20) NOT NULL,
  `gifts_team_by_sys_val` int(20) NOT NULL,
  `mon_to_div_from_cg_remains` decimal(20,2) NOT NULL,
  `mon_to_div_from_cg_divided_already` decimal(20,2) NOT NULL,
  `mon_to_div_from_cpt_remains` decimal(20,2) NOT NULL,
  `mon_to_div_from_cpt_divided_already` decimal(20,2) NOT NULL,
  `mon_to_div_divided_tot` decimal(20,2) NOT NULL,
  `qr_tot` int(20) NOT NULL,
  `qr_mon_tot` int(20) NOT NULL,
  `qr_mon_users` int(20) NOT NULL,
  `qr_mon_teams` int(20) NOT NULL,
  `memb_activ_first` varchar(75) COLLATE utf8_czech_ci NOT NULL,
  `memb_activ_second` varchar(75) COLLATE utf8_czech_ci NOT NULL,
  `memb_activ_third` varchar(75) COLLATE utf8_czech_ci NOT NULL,
  `memb_profit_first` varchar(75) COLLATE utf8_czech_ci NOT NULL,
  `memb_profit_second` varchar(75) COLLATE utf8_czech_ci NOT NULL,
  `memb_profit_third` varchar(75) COLLATE utf8_czech_ci NOT NULL,
  `data_weblogins` int(20) NOT NULL,
  `data_teamcpt` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `data_cleanpts_bal` int(20) NOT NULL,
  `data_cleanpts_earned` int(20) NOT NULL,
  `data_cleanpts_lost` int(20) NOT NULL,
  `data_bank_trans_tot` int(20) NOT NULL,
  `data_bank_trans_val_sent` decimal(20,2) NOT NULL,
  `data_bank_trans_val_received` decimal(20,2) NOT NULL
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
  `username` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `last_access` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `weblogins` int(11) NOT NULL DEFAULT '0',
  `rank` varchar(50) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `userdata`
--

INSERT INTO `userdata` (`id`, `username`, `last_access`, `weblogins`, `rank`) VALUES
(1, 'qqwwee', '2019-05-05 20:45:26', 2, 'NOOB');

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
  `needhelp` varchar(50) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `verification`, `firstname`, `lastname`, `birthdate`, `sex`, `age`, `agree1`, `agree2`, `needhelp`) VALUES
(1, 'qqwwee', 'qweqwe', '345uee', 'qqq', 'www', '2019-04-29', 'Male', 0, 'YES', 'YES', 'OK');

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
-- Klíče pro tabulku `log_kolik`
--
ALTER TABLE `log_kolik`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pro tabulku `log_codes`
--
ALTER TABLE `log_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `log_kolik`
--
ALTER TABLE `log_kolik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `photo_forall`
--
ALTER TABLE `photo_forall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pro tabulku `photo_forusers`
--
ALTER TABLE `photo_forusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
