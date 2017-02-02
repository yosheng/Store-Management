-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-02-02 15:07:09
-- 伺服器版本: 10.1.16-MariaDB
-- PHP 版本： 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `test1_shop`
--

-- --------------------------------------------------------

--
-- 資料表結構 `category`
--

CREATE TABLE `category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `category`
--

INSERT INTO `category` (`category_id`, `category_title`) VALUES
(3, '耗材類');

-- --------------------------------------------------------

--
-- 資料表結構 `item`
--

CREATE TABLE `item` (
  `ap_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `ap_subject` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ap_price` int(11) UNSIGNED NOT NULL,
  `ap_desc` text COLLATE utf8_unicode_ci,
  `ap_picurl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ap_hits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `item`
--

INSERT INTO `item` (`ap_id`, `category_id`, `ap_subject`, `ap_price`, `ap_desc`, `ap_picurl`, `ap_hits`) VALUES
(4, 3, 'HP564 黑色墨水匣', 2, '測試', 'test1/HP564-1.jpg', 1),
(5, 3, 'HP564 黃色墨水匣', 3, '測試', 'test1/HP564-2.jpg', 0),
(6, 3, 'HP564 紅色墨水匣', 4, '測試', 'test1/HP564-3.jpg', 0),
(7, 3, 'HP564 藍色墨水匣', 5, '測試', 'test1/HP564-4.jpg', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `weblog`
--

CREATE TABLE `weblog` (
  `log_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `count` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `singlemoney` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- 資料表索引 `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ap_id`);

--
-- 資料表索引 `weblog`
--
ALTER TABLE `weblog`
  ADD PRIMARY KEY (`log_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `item`
--
ALTER TABLE `item`
  MODIFY `ap_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用資料表 AUTO_INCREMENT `weblog`
--
ALTER TABLE `weblog`
  MODIFY `log_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
