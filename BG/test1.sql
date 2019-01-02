-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2018 年 12 月 26 日 16:51
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
  `no` int(11) NOT NULL,
  `setno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `gamecycle`
--

INSERT INTO `gamecycle` (`no`, `setno`) VALUES
(1, 44),
(2, 23),
(3, 43),
(4, 32),
(5, 9),
(6, 41),
(7, 37),
(8, 1),
(9, 11),
(10, 12),
(11, 31),
(12, 40),
(13, 19),
(14, 40),
(15, 24),
(16, 20),
(17, 36),
(18, 34),
(19, 33),
(20, 33),
(21, 27),
(22, 24),
(23, 27),
(24, 3),
(25, 24),
(26, 10),
(27, 17),
(28, 3),
(29, 25),
(30, 18),
(31, 9),
(32, 25),
(33, 4),
(34, 24),
(35, 4),
(36, 18),
(37, 37),
(38, 9),
(39, 5),
(40, 30),
(41, 25),
(42, 48),
(43, 16),
(44, 1),
(45, 35),
(46, 18),
(47, 47),
(48, 15),
(49, 44),
(50, 3);

-- --------------------------------------------------------

--
-- 資料表結構 `team`
--

CREATE TABLE `team` (
  `tno` int(11) NOT NULL,
  `tname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `uid1` int(11) NOT NULL,
  `uid2` int(11) NOT NULL,
  `uid3` int(11) NOT NULL,
  `uid4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `team`
--

INSERT INTO `team` (`tno`, `tname`, `uid1`, `uid2`, `uid3`, `uid4`) VALUES
(1, 'asd', 0, 0, 0, 0),
(2, 'asddd', 0, 0, 0, 0),
(3, 'asddd', 0, 0, 0, 0),
(4, 'asddd', 0, 0, 0, 0),
(5, 'asddd', 0, 0, 0, 0),
(6, '123', 0, 0, 0, 0),
(7, '123', 0, 0, 0, 0),
(8, '123', 0, 0, 0, 0),
(9, '123', 0, 2, 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `tgame`
--

CREATE TABLE `tgame` (
  `serno` int(11) NOT NULL,
  `tname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `r1` int(11) NOT NULL,
  `r2` int(11) NOT NULL,
  `r3` int(11) NOT NULL,
  `r4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `tgame`
--

INSERT INTO `tgame` (`serno`, `tname`, `r1`, `r2`, `r3`, `r4`) VALUES
(1, 'test', 90, 90, 90, 1),
(2, 'test2', 90, 90, 1, 90),
(3, '123', 90, 90, 90, 90),
(4, '123', 90, 90, 90, 90),
(5, '1231', 90, 90, 90, 90),
(6, '13', 90, 90, 3, 90),
(7, 'hihihihihih', 90, 90, 90, 4),
(8, '你好', 1, 0, 90, 0),
(9, '1你好', 0, 2, 0, 0),
(10, 'UI', 0, 2, 90, 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `gamecycle`
--
ALTER TABLE `gamecycle`
  ADD PRIMARY KEY (`no`);

--
-- 資料表索引 `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`tno`);

--
-- 資料表索引 `tgame`
--
ALTER TABLE `tgame`
  ADD PRIMARY KEY (`serno`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `gamecycle`
--
ALTER TABLE `gamecycle`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- 使用資料表 AUTO_INCREMENT `team`
--
ALTER TABLE `team`
  MODIFY `tno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表 AUTO_INCREMENT `tgame`
--
ALTER TABLE `tgame`
  MODIFY `serno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
