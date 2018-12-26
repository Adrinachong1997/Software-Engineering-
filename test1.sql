-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2018 年 12 月 26 日 03:27
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
-- 資料表結構 `stu_tel`
--

CREATE TABLE `stu_tel` (
  `no` int(11) NOT NULL,
  `uid` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sid` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tel` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `stu_tel`
--

INSERT INTO `stu_tel` (`no`, `uid`, `sid`, `email`, `tel`) VALUES
(5, '陳浩鋐', '105213060', 's105213060@mail1.ncnu.edu.tw', 912345342),
(6, '蕭泓恩', '105213014', 's105213014@mail1.ncnu.edu.tw', 912345365),
(7, '宋晨', '105213057', 's105123057@mail1.ncnu.edu.tw', 982734534),
(8, '香荏彬', '105213069', 's105213069@mail1.ncnu.edu.tw', 912342342),
(9, '許中昱', '105213002', 's105213002@mail1.ncnu.edu.tw', 988745342),
(10, '何宏歷', '105213075', 's105213075@mail1.ncnu.edu.tw', 912342341),
(11, 'asd', '123', 'asd@ad', 123);

-- --------------------------------------------------------

--
-- 資料表結構 `team`
--

CREATE TABLE `team` (
  `tno` int(11) NOT NULL,
  `tname` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `team`
--

INSERT INTO `team` (`tno`, `tname`) VALUES
(1, 'asd'),
(2, 'asddd'),
(3, 'asddd'),
(4, 'asddd'),
(5, 'asddd'),
(6, '123'),
(7, '123'),
(8, '123');

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
(1, 'test', 1, 1, 0, 0),
(2, 'test2', 1, 0, 0, 1);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `gamecycle`
--
ALTER TABLE `gamecycle`
  ADD PRIMARY KEY (`no`);

--
-- 資料表索引 `stu_tel`
--
ALTER TABLE `stu_tel`
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
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=505;

--
-- 使用資料表 AUTO_INCREMENT `stu_tel`
--
ALTER TABLE `stu_tel`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表 AUTO_INCREMENT `team`
--
ALTER TABLE `team`
  MODIFY `tno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表 AUTO_INCREMENT `tgame`
--
ALTER TABLE `tgame`
  MODIFY `serno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
