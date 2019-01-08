-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2019 年 01 月 08 日 12:01
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
(1, 'imtest', 4, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(2, 'imtest', 3, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(3, 'imtest', 2, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(4, 'imtest', 1, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(5, 'op', 4, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(6, 'op', 3, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(7, 'op', 2, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(8, 'op', 1, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(9, 'test9', 4, 1, 15, 0, 0, 12, 15, 15, 20, 15),
(10, 'test9', 3, 1, 15, 0, 0, 12, 15, 15, 12, 12),
(11, 'test9', 2, 1, 15, 0, 0, 40, 15, 15, 12, 12),
(12, 'test9', 1, 1, 15, 0, 0, 50, 15, 15, 40, 15),
(13, 'test9', 4, 2, -5, 0, 0, 40, 10, 25, 4, 0),
(14, 'test9', 3, 2, 3, 0, 0, 30, 3, 18, 40, 3),
(15, 'test9', 2, 2, 3, 0, 0, 24, 3, 18, 30, 3),
(16, 'test9', 1, 2, -25, 0, 0, 60, 50, 65, 24, 0),
(17, 'test9', 4, 3, 3, 12, 12, 5, 3, 28, 19, 3),
(18, 'test9', 3, 3, -25, 12, 12, 10, 50, 68, 5, 0),
(19, 'test9', 2, 3, -12, 40, 15, 30, 24, 42, 10, 0),
(20, 'test9', 1, 3, -34, 50, 15, 12, 68, 133, 30, 0),
(21, 'test9', 4, 4, -13, 40, 3, 62, 26, 54, 13, 0),
(22, 'test9', 3, 4, -27, 30, 3, 5, 54, 122, 62, 0),
(23, 'test9', 2, 4, -22, 24, 0, 2, 44, 86, 5, 0),
(24, 'test9', 1, 4, -64, 60, 0, 50, 128, 261, 2, 0),
(25, 'test9', 4, 5, -26, 5, 0, 15, 52, 106, 14, 0),
(26, 'test9', 3, 5, -89, 10, 0, 12, 178, 300, 15, 0),
(27, 'test9', 2, 5, -27, 30, 0, 12, 54, 140, 12, 0),
(28, 'test9', 1, 5, -66, 12, 0, 12, 132, 393, 12, 0);

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
(1, 'imtest', 0, 0, 0, 0, 0, 0),
(2, 'op', 0, 0, 0, 0, 0, 0),
(3, 'test9', 6, 5, 5, 5, 5, 5);

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
  `totalcost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `tgame`
--

INSERT INTO `tgame` (`serno`, `tname`, `r1`, `r2`, `r3`, `r4`, `go`, `totalcost`) VALUES
(30, '555', 'test4', 'test2', 'test1', 'test3', -1, 0),
(31, 'test1', 'test1', 'test3', 'test2', 'test4', -1, 405),
(32, '123123', 'test1', 'test2', 'test3', 'test4', -1, 307),
(33, '123123321', 'test1', 'test1', 'test1', 'test1', -1, 349),
(34, 'imtest', 'test2', 'test2', 'test2', 'test2', 1, 0),
(35, '123', 'test1', 'test2', 'test3', 'test4', -1, 379),
(36, 'op', 'test3', 'test2', 'test3', 'test4', 1, 0),
(37, 'TEST5', NULL, NULL, 'test1', 'test1', 0, 0),
(38, 'test9', 'test1', 'test2', 'test3', 'test4', -1, 939);

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
('test1', '123', 'test1@test.com', 1, 0, 212),
('test2', '123', 'test2@test.com', 1, 0, 74),
('test3', '123', 'test3@test.com', 1, 0, 129),
('test4', '123', 'test4@test.com', 1, 0, 145),
('test9', '123', '123@', 1, 0, 0);

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- 使用資料表 AUTO_INCREMENT `player_status`
--
ALTER TABLE `player_status`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表 AUTO_INCREMENT `tgame`
--
ALTER TABLE `tgame`
  MODIFY `serno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
