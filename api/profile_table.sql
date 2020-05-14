-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2020 年 5 月 07 日 15:56
-- サーバのバージョン： 10.4.11-MariaDB
-- PHP のバージョン: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `matchingapp`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `profile_table`
--

CREATE TABLE `profile_table` (
  `id` int(12) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bir` date NOT NULL,
  `tel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `type2` text COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `profile_table`
--

INSERT INTO `profile_table` (`id`, `name`, `bir`, `tel`, `email`, `pro`, `image`, `type`, `type2`, `comment`, `created_at`, `updated_at`) VALUES
(1, '山田太郎', '2020-03-01', '0', 'efgh@info.com', 'l', '', '', '', 'l', '2020-05-07 22:10:33', '2020-05-07 22:10:33');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `profile_table`
--
ALTER TABLE `profile_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `profile_table`
--
ALTER TABLE `profile_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
