-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-02-02 15:06:57
-- 伺服器版本: 10.1.16-MariaDB
-- PHP 版本： 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `admin_db`
--

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `mbr_id` int(11) UNSIGNED NOT NULL,
  `mbr_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mbr_account` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mbr_password` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `mbr_cellphone` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `merchant`
--

CREATE TABLE `merchant` (
  `mct_id` int(11) UNSIGNED NOT NULL,
  `mct_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mct_account` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mct_password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mct_telephone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mct_address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mct_memo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mct_picurl` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `merchant`
--

INSERT INTO `merchant` (`mct_id`, `mct_name`, `mct_account`, `mct_password`, `mct_telephone`, `mct_address`, `mct_memo`, `mct_picurl`) VALUES
(31, '升升商城', 'test1', 'test123', '02-2202-1234', '地球台灣', '測試用', 'images/test123.png'),
(32, '', '', '', '', '', '', '../images/shop.png');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mbr_id`);

--
-- 資料表索引 `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`mct_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `mbr_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `merchant`
--
ALTER TABLE `merchant`
  MODIFY `mct_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
