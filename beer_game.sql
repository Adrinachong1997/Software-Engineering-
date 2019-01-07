-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2019 年 01 月 07 日 06:05
-- 伺服器版本: 10.1.37-MariaDB
-- PHP 版本： 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `test1`
--

-- --------------------------------------------------------

--
-- 資料表結構 `gamecycle`
--

CREATE TABLE `gamecycle` (
  `week` int(11) NOT NULL,
  `demand` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `gamecycle`
--

INSERT INTO `gamecycle` (`week`, `demand`) VALUES
(1, 20),
(2, 4),
(3, 19),
(4, 13),
(5, 14),
(6, 15),
(7, 18),
(8, 3),
(9, 12),
(10, 17),
(11, 5),
(12, 9),
(13, 2),
(14, 3),
(15, 7),
(16, 12),
(17, 16),
(18, 8),
(19, 19),
(20, 7),
(21, 6),
(22, 13),
(23, 11),
(24, 4),
(25, 6),
(26, 15),
(27, 19),
(28, 9),
(29, 2),
(30, 18),
(31, 12),
(32, 14),
(33, 3),
(34, 5),
(35, 18),
(36, 1),
(37, 17),
(38, 19),
(39, 7),
(40, 11),
(41, 7),
(42, 17),
(43, 7),
(44, 14),
(45, 2),
(46, 3),
(47, 1),
(48, 17),
(49, 9),
(50, 10);

-- --------------------------------------------------------

--
-- 資料表結構 `period`
--

CREATE TABLE `period` (
  `id` int(20) NOT NULL,
  `week` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `period`
--

INSERT INTO `period` (`id`, `week`) VALUES
(1, 5);

-- --------------------------------------------------------

--
-- 資料表結構 `player`
--

CREATE TABLE `player` (
  `pid` int(20) NOT NULL,
  `player_n` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `player`
--

INSERT INTO `player` (`pid`, `player_n`) VALUES
(1, 'factory'),
(2, 'distributor'),
(3, 'wholesaler'),
(4, 'retailer');

-- --------------------------------------------------------

--
-- 資料表結構 `player_record`
--

CREATE TABLE `player_record` (
  `id` int(20) NOT NULL,
  `tname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pid` int(20) NOT NULL,
  `week` int(20) NOT NULL,
  `original_stock` int(20) NOT NULL,
  `expected_arrival` int(50) NOT NULL,
  `actual_arrival` int(50) NOT NULL,
  `orders` int(50) NOT NULL,
  `cost` int(50) NOT NULL,
  `acc_cost` int(50) NOT NULL,
  `demand` int(50) DEFAULT NULL,
  `actual_shipment` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `player_record`
--

INSERT INTO `player_record` (`id`, `tname`, `pid`, `week`, `original_stock`, `expected_arrival`, `actual_arrival`, `orders`, `cost`, `acc_cost`, `demand`, `actual_shipment`) VALUES
(1, 'tset1', 4, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(2, 'tset1', 3, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(3, 'tset1', 2, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(4, 'tset1', 1, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(5, 'tset111', 4, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(6, 'tset111', 3, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(7, 'tset111', 2, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(8, 'tset111', 1, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(9, '123', 4, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(10, '123', 3, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(11, '123', 2, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(12, '123', 1, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(13, 'gg', 4, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(14, 'gg', 3, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(15, 'gg', 2, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(16, 'gg', 1, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(17, 'testim', 4, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(18, 'testim', 3, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(19, 'testim', 2, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(20, 'testim', 1, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(21, '555', 4, 1, 15, 0, 0, 12, 15, 15, 20, 15),
(22, '555', 3, 1, 15, 0, 0, 13, 15, 15, 12, 12),
(23, '555', 2, 1, 15, 0, 0, 12, 15, 15, 13, 13),
(24, '555', 1, 1, 15, 0, 0, 12, 15, 15, 12, 12),
(25, '555', 4, 2, -5, 0, 0, 12, 10, 25, 4, 0),
(26, '555', 3, 2, 3, 0, 0, 12, 3, 18, 12, 3),
(27, '555', 2, 2, 2, 0, 0, 13, 2, 17, 12, 2),
(28, '555', 1, 2, 3, 0, 0, 13, 3, 18, 13, 3),
(29, '555', 4, 3, 3, 12, 12, 13, 3, 28, 19, 3),
(30, '555', 3, 3, 4, 13, 13, 23, 4, 22, 13, 4),
(31, '555', 2, 3, 2, 12, 12, 13, 2, 19, 23, 2),
(32, '555', 1, 3, 2, 12, 12, 13, 2, 20, 13, 2),
(33, '555', 4, 4, -13, 12, 3, 13, 26, 54, 13, 0),
(34, '555', 3, 4, -7, 12, 2, 23, 14, 36, 13, 0),
(35, '555', 2, 4, -18, 13, 3, 13, 36, 55, 23, 0),
(36, '555', 1, 4, -8, 13, 3, 13, 16, 36, 13, 0),
(37, '555', 4, 5, -22, 13, 4, 23, 44, 98, 14, 0),
(38, '555', 3, 5, -18, 23, 2, 13, 36, 72, 23, 0),
(39, '555', 2, 5, -39, 13, 2, 13, 78, 133, 13, 0),
(40, '555', 1, 5, -19, 13, 2, 13, 38, 74, 13, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `player_status`
--

CREATE TABLE `player_status` (
  `id` int(20) NOT NULL,
  `tname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `week` int(20) NOT NULL,
  `p1` int(20) NOT NULL,
  `p2` int(20) NOT NULL,
  `p3` int(20) NOT NULL,
  `p4` int(20) NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `player_status`
--

INSERT INTO `player_status` (`id`, `tname`, `week`, `p1`, `p2`, `p3`, `p4`, `status`) VALUES
(1, 'tset1', 0, 0, 0, 0, 0, 0),
(2, 'tset111', 0, 0, 0, 0, 0, 0),
(3, '123', 0, 0, 0, 0, 0, 0),
(4, 'gg', 0, 0, 0, 0, 0, 0),
(5, 'testim', 0, 0, 0, 0, 0, 0),
(6, '555', 6, 5, 5, 5, 5, 5);

-- --------------------------------------------------------

--
-- 資料表結構 `tgame`
--

CREATE TABLE `tgame` (
  `serno` int(11) NOT NULL,
  `tname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `r1` varchar(11) CHARACTER SET latin1 DEFAULT NULL,
  `r2` varchar(11) CHARACTER SET latin1 DEFAULT NULL,
  `r3` varchar(11) CHARACTER SET latin1 DEFAULT NULL,
  `r4` varchar(11) CHARACTER SET latin1 DEFAULT NULL,
  `go` int(11) NOT NULL,
  `totalcost` int(11) NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `tgame`
--

INSERT INTO `tgame` (`serno`, `tname`, `r1`, `r2`, `r3`, `r4`, `go`, `totalcost`, `rank`) VALUES
(30, '555', 'test4', 'test2', 'test1', 'test3', -1, 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `sort` int(10) NOT NULL DEFAULT '1',
  `admin` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`id`, `password`, `mail`, `sort`, `admin`, `score`) VALUES
('admin', 'admin', 'admin@admin.com', 1, 1, 0),
('tes1', 'we', 'er@', 1, 0, 0),
('test1', '123', 'test1@test.com', 1, 0, 104),
('test2', '123', 'test2@test.com', 1, 0, 26),
('test3', '123', 'test3@test.com', 1, 0, 52),
('test4', '123', 'test4@test.com', 1, 0, 78);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `gamecycle`
--
ALTER TABLE `gamecycle`
  ADD PRIMARY KEY (`week`);

--
-- 資料表索引 `period`
--
ALTER TABLE `period`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`pid`);

--
-- 資料表索引 `player_record`
--
ALTER TABLE `player_record`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `player_status`
--
ALTER TABLE `player_status`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `tgame`
--
ALTER TABLE `tgame`
  ADD PRIMARY KEY (`serno`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `gamecycle`
--
ALTER TABLE `gamecycle`
  MODIFY `week` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- 使用資料表 AUTO_INCREMENT `period`
--
ALTER TABLE `period`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表 AUTO_INCREMENT `player_record`
--
ALTER TABLE `player_record`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- 使用資料表 AUTO_INCREMENT `player_status`
--
ALTER TABLE `player_status`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表 AUTO_INCREMENT `tgame`
--
ALTER TABLE `tgame`
  MODIFY `serno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
