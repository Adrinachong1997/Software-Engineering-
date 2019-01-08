-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019 年 01 月 08 日 14:13
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
-- 資料庫： `beer_game`
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
(1, 8),
(2, 5),
(3, 15),
(4, 4),
(5, 14),
(6, 12),
(7, 19),
(8, 13),
(9, 7),
(10, 1),
(11, 10),
(12, 12),
(13, 8),
(14, 19),
(15, 1),
(16, 15),
(17, 15),
(18, 17),
(19, 1),
(20, 14),
(21, 5),
(22, 12),
(23, 14),
(24, 14),
(25, 2),
(26, 5),
(27, 5),
(28, 1),
(29, 11),
(30, 15),
(31, 19),
(32, 2),
(33, 16),
(34, 15),
(35, 11),
(36, 6),
(37, 17),
(38, 5),
(39, 6),
(40, 2),
(41, 15),
(42, 18),
(43, 19),
(44, 20),
(45, 9),
(46, 16),
(47, 8),
(48, 1),
(49, 14),
(50, 20);

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
(1, 'yanjie', 4, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(2, 'yanjie', 3, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(3, 'yanjie', 2, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(4, 'yanjie', 1, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(5, 'yanjie1', 4, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(6, 'yanjie1', 3, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(7, 'yanjie1', 2, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(8, 'yanjie1', 1, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(9, '123', 4, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(10, '123', 3, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(11, '123', 2, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(12, '123', 1, 0, 15, 0, 0, 0, 15, 15, 0, 0),
(13, 'TEST', 4, 1, 15, 0, 0, 12, 15, 15, 23, 15),
(14, 'TEST', 3, 1, 15, 0, 0, 14, 15, 15, 12, 12),
(15, 'TEST', 2, 1, 15, 0, 0, 12, 15, 15, 14, 14),
(16, 'TEST', 1, 1, 15, 0, 0, 6, 15, 15, 12, 12),
(17, 'TEST', 4, 2, -8, 0, 0, 15, 16, 31, 4, 0),
(18, 'TEST', 3, 2, 3, 0, 0, 2, 3, 18, 15, 3),
(19, 'TEST', 2, 2, 1, 0, 0, 10, 1, 16, 2, 1),
(20, 'TEST', 1, 2, 3, 0, 0, 1, 3, 18, 10, 3),
(21, 'TEST', 4, 3, 0, 12, 12, 12, 0, 31, 18, 0),
(22, 'TEST', 3, 3, 2, 14, 14, 90, 2, 20, 12, 2),
(23, 'TEST', 2, 3, 11, 12, 12, 101, 11, 27, 90, 11),
(24, 'TEST', 1, 3, 5, 6, 12, 209, 5, 23, 101, 5),
(25, 'TEST', 4, 4, -15, 15, 3, 3, 30, 61, 22, 0),
(26, 'TEST', 3, 4, -9, 2, 1, 12, 18, 38, 3, 0),
(27, 'TEST', 2, 4, -76, 10, 3, 12, 152, 179, 12, 0),
(28, 'TEST', 1, 4, -93, 1, 3, 1, 186, 209, 12, 0),
(29, 'TEST', 4, 5, -35, 12, 2, 23, 70, 131, 21, 0),
(30, 'TEST', 3, 5, -1, 90, 11, 12, 2, 40, 23, 0),
(31, 'TEST', 2, 5, -83, 101, 5, 33, 166, 345, 12, 0),
(32, 'TEST', 1, 5, -100, 209, 5, 0, 200, 409, 33, 0);

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
(4, 'TEST', 6, 5, 5, 5, 5, 5);

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
(36, 'TEST', 'test', 'test2', 'test3', 'test4', -1, 925),
(38, 'I LUV U', 'iloveIM01', 'iloveIM02', 'iloveIM03', 'iloveIM04', 1, 0),
(39, 'IMBB', NULL, NULL, NULL, NULL, 0, 0);

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
('105213026', '123', '105213026@xxx.com', 1, 0, 0),
('admin', 'admin', 'admin@admin.com', 1, 1, 0),
('tes1', 'we', 'er@', 1, 0, 0),
('test1', '123', 'test1@test.com', 1, 0, 116),
('test2', '123', 'test2@test.com', 1, 0, 52),
('test3', '123', 'test3@test.com', 1, 0, 84),
('test4', '123', 'test4@test.com', 1, 0, 108);

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- 使用資料表 AUTO_INCREMENT `player_status`
--
ALTER TABLE `player_status`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表 AUTO_INCREMENT `tgame`
--
ALTER TABLE `tgame`
  MODIFY `serno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
