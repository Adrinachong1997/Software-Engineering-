-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018 年 12 月 22 日 18:38
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
-- 資料表結構 `distributor`
--

CREATE TABLE `distributor` (
  `week` int(100) NOT NULL,
  `stock` int(100) NOT NULL,
  `orders` int(100) NOT NULL,
  `current_cost` int(100) NOT NULL,
  `accumulation_cost` int(100) NOT NULL,
  `demand` int(100) NOT NULL,
  `total_sales` int(100) NOT NULL,
  `incoming_stock` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `factory`
--

CREATE TABLE `factory` (
  `week` int(100) NOT NULL,
  `stock` int(100) NOT NULL,
  `orders` int(100) NOT NULL,
  `current_cost` int(100) NOT NULL,
  `accumulation_cost` int(100) NOT NULL,
  `demand` int(100) NOT NULL,
  `total_sales` int(100) NOT NULL,
  `incoming_stock` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `retailer`
--

CREATE TABLE `retailer` (
  `week` int(100) NOT NULL,
  `stock` int(100) NOT NULL,
  `orders` int(100) NOT NULL,
  `current_cost` int(100) NOT NULL,
  `accumulation_cost` int(100) NOT NULL,
  `demand` int(100) NOT NULL,
  `total_sales` int(100) NOT NULL,
  `incoming_stock` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `wholesaler`
--

CREATE TABLE `wholesaler` (
  `week` int(100) NOT NULL,
  `stock` int(100) NOT NULL,
  `orders` int(100) NOT NULL,
  `current_cost` int(100) NOT NULL,
  `accumulation_cost` int(100) NOT NULL,
  `demand` int(100) NOT NULL,
  `total_sales` int(100) NOT NULL,
  `incoming_stock` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`week`);

--
-- 資料表索引 `factory`
--
ALTER TABLE `factory`
  ADD PRIMARY KEY (`week`);

--
-- 資料表索引 `retailer`
--
ALTER TABLE `retailer`
  ADD PRIMARY KEY (`week`);

--
-- 資料表索引 `wholesaler`
--
ALTER TABLE `wholesaler`
  ADD PRIMARY KEY (`week`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `distributor`
--
ALTER TABLE `distributor`
  MODIFY `week` int(100) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表 AUTO_INCREMENT `factory`
--
ALTER TABLE `factory`
  MODIFY `week` int(100) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表 AUTO_INCREMENT `retailer`
--
ALTER TABLE `retailer`
  MODIFY `week` int(100) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表 AUTO_INCREMENT `wholesaler`
--
ALTER TABLE `wholesaler`
  MODIFY `week` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
