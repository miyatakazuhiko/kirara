-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018 年 7 朁E09 日 14:25
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kadai_07`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `kadai_07_table`
--

CREATE TABLE IF NOT EXISTS `kadai_07_table` (
`No` int(12) NOT NULL,
  `書籍名` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `書籍URL` text COLLATE utf8mb4_unicode_ci,
  `書籍コメント` text COLLATE utf8mb4_unicode_ci,
  `登録日時` datetime DEFAULT NULL,
  `pass` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `kadai_07_table`
--

INSERT INTO `kadai_07_table` (`No`, `書籍名`, `書籍URL`, `書籍コメント`, `登録日時`, `pass`, `ID`) VALUES
(1, 'ガールズ＆パンツァー！', 'http://girls-und-panzer-finale.jp/', 'CV33', '2018-05-29 02:55:08', '1', '1'),
(63, 'ガールズ＆パンツァー！！！！', 'syaro', 'coffeeﾊｲa', '2018-06-12 06:20:56', '55', '55'),
(85, 'ガールズ＆パンツァー！！！！', 'ちょ', 'っとだけ', '2018-06-13 00:02:15', '55', '55'),
(95, NULL, NULL, NULL, '0000-00-00 00:00:00', 'maho', 'miho'),
(96, 'ふおんコネクト', 'https://www.amazon.co.jp/%E3%81%B5%E3%81%8A%E3%82%93%E3%82%B3%E3%83%8D%E3%82%AF%E3%83%88-1-%E3%81%BE%E3%82%93%E3%81%8C%E3%82%BF%E3%82%A4%E3%83%A0KR%E3%82%B3%E3%83%9F%E3%83%83%E3%82%AF%E3%82%B9-%E3%81%96%E3%82%89/dp/4832276204', 'また読みたい', '2018-06-14 01:34:12', 'maho', 'miho'),
(97, 'きつねさんに化かされたい! ', 'https://ja.wikipedia.org/wiki/%E3%81%8D%E3%81%A4%E3%81%AD%E3%81%95%E3%82%93%E3%81%AB%E5%8C%96%E3%81%8B%E3%81%95%E3%82%8C%E3%81%9F%E3%81%84', '鼻血', '2018-06-14 01:35:10', 'maho', 'miho'),
(98, '四季おりおりっ! ', 'https://www.amazon.co.jp/%E5%9B%9B%E5%AD%A3%E3%81%8A%E3%82%8A%E3%81%8A%E3%82%8A%E3%81%A3-ID%E3%82%B3%E3%83%9F%E3%83%83%E3%82%AF%E3%82%B9-4%E3%82%B3%E3%83%9EKINGS%E3%81%B1%E3%82%8C%E3%81%A3%E3%81%A8%E3%82%B3%E3%83%9F%E3%83%83%E3%82%AF%E3%82%B9-%E7%A8%B2%E5%9F%8E-%E3%81%82%E3%81%95%E3%81%AD/dp/4758080232', '4姉妹', '2018-06-14 01:38:17', 'maho', 'miho'),
(99, 'ごちうさ', 'kawaii', 'kawaiiiii', '2018-06-14 01:50:13', 'maho', 'miho'),
(100, 'これが本当のアンツィオ戦です！', 'http://www.movic.jp/info/girls-und-panzer-ova/', 'ピザ食べたい。', '2018-06-14 02:39:53', '1', '1'),
(102, 'iii', 'kk', 'nn', '2018-06-14 03:26:21', '55', '55'),
(103, NULL, NULL, NULL, NULL, '666', '666'),
(104, NULL, NULL, NULL, NULL, '6666', '6666');

-- --------------------------------------------------------

--
-- テーブルの構造 `kadai_07_user`
--

CREATE TABLE IF NOT EXISTS `kadai_07_user` (
`No` int(20) NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kID` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kpass` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL DEFAULT '0',
  `life_flg` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `kadai_07_user`
--

INSERT INTO `kadai_07_user` (`No`, `name`, `kID`, `kpass`, `kanri_flg`, `life_flg`) VALUES
(1, '1', '1', '1', 1, 1),
(2, 'miyata', '111', '222', 1, 1),
(25, 'miyata1', '11111', '2222', 0, 1),
(26, '111', '111', '111', 0, 0),
(27, 'ayayaya', '111', '111', 0, 1),
(28, 'アア', '123', '123', 0, 1),
(29, 'ii', 'k1', '1k', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kadai_07_table`
--
ALTER TABLE `kadai_07_table`
 ADD PRIMARY KEY (`No`);

--
-- Indexes for table `kadai_07_user`
--
ALTER TABLE `kadai_07_user`
 ADD PRIMARY KEY (`No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kadai_07_table`
--
ALTER TABLE `kadai_07_table`
MODIFY `No` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `kadai_07_user`
--
ALTER TABLE `kadai_07_user`
MODIFY `No` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
