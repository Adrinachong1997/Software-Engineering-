-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019 年 01 月 05 日 16:20
-- 伺服器版本: 10.1.35-MariaDB
-- PHP 版本： 7.2.9

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
(1, 4),
(2, 11),
(3, 2),
(4, 10),
(5, 5),
(6, 20),
(7, 11),
(8, 14),
(9, 20),
(10, 11),
(11, 7),
(12, 1),
(13, 2),
(14, 11),
(15, 8),
(16, 11),
(17, 8),
(18, 15),
(19, 1),
(20, 15),
(21, 3),
(22, 15),
(23, 3),
(24, 14),
(25, 10),
(26, 6),
(27, 8),
(28, 14),
(29, 17),
(30, 10),
(31, 15),
(32, 12),
(33, 17),
(34, 11),
(35, 19),
(36, 4),
(37, 5),
(38, 14),
(39, 18),
(40, 9),
(41, 18),
(42, 4),
(43, 8),
(44, 15),
(45, 6),
(46, 4),
(47, 14),
(48, 16),
(49, 4),
(50, 8);

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
(1, 17);

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
-- 資料表結構 `player_ordered`
--

CREATE TABLE `player_ordered` (
  `no` int(11) NOT NULL,
  `tname` int(11) NOT NULL,
  `p1` int(11) DEFAULT '0',
  `p2` int(11) DEFAULT '0',
  `p3` int(11) DEFAULT '0',
  `p4` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `player_ordered`
--

INSERT INTO `player_ordered` (`no`, `tname`, `p1`, `p2`, `p3`, `p4`) VALUES
(11, 1, 0, 0, 0, 0);

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
(1, '1', 4, 1, 15, 0, 0, 52, 15, 15, 4, 4),
(2, '1', 3, 1, 15, 0, 0, 1, 15, 15, 12, 12),
(3, '1', 2, 1, 15, 0, 0, 52, 15, 15, 1, 1),
(4, '1', 1, 1, 15, 0, 0, 12, 15, 15, 52, 15);

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
(1, '1', 1, 5, 5, 2, 5, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `tname` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `pid` int(11) NOT NULL,
  `week` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `demand` int(11) NOT NULL,
  `ontheway` int(11) NOT NULL,
  `readyin` int(11) NOT NULL,
  `ordered` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `actual_shipment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `test`
--

INSERT INTO `test` (`id`, `tname`, `pid`, `week`, `stock`, `demand`, `ontheway`, `readyin`, `ordered`, `cost`, `actual_shipment`) VALUES
(1, '1', 1, 1, 15, 0, 0, 0, 0, 15, 0),
(2, '1', 2, 1, 15, 0, 0, 0, 0, 15, 0),
(3, '1', 3, 1, 15, 0, 0, 0, 0, 15, 0),
(4, '1', 4, 1, 15, 0, 0, 0, 0, 15, 0);

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
  `go` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `tgame`
--

INSERT INTO `tgame` (`serno`, `tname`, `r1`, `r2`, `r3`, `r4`, `go`) VALUES
(50, 'uuu', 'im', 'im123', '1', 'im', 1),
(53, 'qqq', '1', 'eee', 'eee', 'eee', 1),
(55, 'u777', 'eee', 'eee', 'eee', 'eee', 1),
(56, '12356', 'eee', 'eee', 'eee', 'eee', 1),
(57, '12', '1', '1', '1', '1', 1),
(58, '12', '1', '1', '1', '1', 1),
(59, '854', '1', '1', '1', '1', 1),
(60, '56', '1', '1', '1', '1', 1),
(61, '23', '1', '1', '1', '1', 1),
(62, '1234568', '1', '1', '1', '1', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `sort` int(10) NOT NULL DEFAULT '1',
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`id`, `password`, `mail`, `sort`, `admin`) VALUES
('1', '1', '', 1, 0),
('a', '1', '', 1, 0),
('admin1', '321', 'admin@admin.com', 1, 1),
('b', 'a', '', 0, 0),
('im', '123', 'asd@123', 1, 0),
('im123', '123', 'asd@ads', 1, 0),
('test', 'test', '', 1, 0),
('test2', 'test2', '', 1, 0),
('test3', 'test3', '', 1, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `week_changed`
--

CREATE TABLE `week_changed` (
  `no` int(11) NOT NULL,
  `tname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `week` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `week_changed`
--

INSERT INTO `week_changed` (`no`, `tname`, `week`) VALUES
(1, '1', 1);

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
-- 資料表索引 `player_ordered`
--
ALTER TABLE `player_ordered`
  ADD PRIMARY KEY (`no`);

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
-- 資料表索引 `test`
--
ALTER TABLE `test`
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
-- 資料表索引 `week_changed`
--
ALTER TABLE `week_changed`
  ADD PRIMARY KEY (`no`);

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
-- 使用資料表 AUTO_INCREMENT `player_ordered`
--
ALTER TABLE `player_ordered`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表 AUTO_INCREMENT `player_record`
--
ALTER TABLE `player_record`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表 AUTO_INCREMENT `player_status`
--
ALTER TABLE `player_status`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表 AUTO_INCREMENT `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- 使用資料表 AUTO_INCREMENT `tgame`
--
ALTER TABLE `tgame`
  MODIFY `serno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- 使用資料表 AUTO_INCREMENT `week_changed`
--
ALTER TABLE `week_changed`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
