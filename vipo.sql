-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-05-20 13:53:51
-- サーバのバージョン： 10.4.22-MariaDB
-- PHP のバージョン: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `vipo`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `beers`
--

CREATE TABLE `beers` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `user_id` int(11) DEFAULT NULL COMMENT 'ユーザID',
  `name` varchar(255) DEFAULT NULL COMMENT 'ビール名',
  `brewery` varchar(255) NOT NULL COMMENT '醸造所名',
  `style` varchar(255) NOT NULL COMMENT 'ビアスタイル',
  `price` int(11) NOT NULL COMMENT '値段',
  `bitter` int(11) NOT NULL DEFAULT 1 COMMENT '苦み',
  `sour` int(11) NOT NULL DEFAULT 1 COMMENT '酸味',
  `sweet` int(11) NOT NULL DEFAULT 1 COMMENT '甘味',
  `aftertaste` int(11) NOT NULL DEFAULT 1 COMMENT '後味',
  `body` int(11) NOT NULL DEFAULT 1 COMMENT 'ボディ',
  `foam` int(11) NOT NULL DEFAULT 1 COMMENT '泡',
  `impressions` varchar(255) NOT NULL COMMENT '感想',
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '登録日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `beers`
--

INSERT INTO `beers` (`id`, `user_id`, `name`, `brewery`, `style`, `price`, `bitter`, `sour`, `sweet`, `aftertaste`, `body`, `foam`, `impressions`, `image`, `created_at`) VALUES
(4, 2, '伊勢角谷ペールエール', '伊勢角谷麦酒', 'ペールエール', 380, 4, 1, 2, 5, 3, 2, 'これぞペールエール', '', '2022-04-08 01:37:09'),
(6, 1, '湘南ゴールド', 'サンクトガーレン', 'フルーツビール', 500, 1, 3, 4, 3, 2, 2, '柑橘の香りが強烈で、飲んだ後も息のにおいが湘南ゴールドになるほど。', '0', '2022-04-08 01:42:15'),
(7, 1, 'マヌカハニーエール', '伊勢角谷麦酒', '', 0, 1, 2, 5, 4, 3, 2, '', '', '2022-04-08 01:43:18'),
(8, 1, 'よなよなエール', 'ヤッホーブルーイング', 'ペールエール', 300, 4, 1, 2, 4, 3, 2, '', '', '2022-04-08 01:45:40'),
(9, 1, 'インドの赤鬼', 'ヤッホーブルーイング', 'IPA', 300, 5, 1, 2, 3, 3, 3, '', '', '2022-04-08 01:46:45'),
(10, 1, 'グロールシュ　プレミアムラガー', 'グロールシュ', '', 500, 3, 2, 2, 4, 2, 2, '', '', '2022-04-08 01:47:37'),
(11, 1, 'リーフマンス', 'リーフマンス', '', 380, 1, 4, 4, 3, 1, 3, '', '', '2022-04-08 01:51:44'),
(25, 1, 'シメイグリーン', 'シメイ醸造所', 'トラピスト', 500, 1, 1, 1, 1, 1, 1, '複雑な味わい', '', '2022-04-04 11:13:21'),
(46, 1, '<script>alert(\"警告\")</script>', '<script>alert(\"警告\")</script>', '<script>alert(\"警告\")</script>', 11, 1, 1, 1, 1, 1, 1, '<script>alert(\"警告\")</script>', '', '2022-04-17 12:11:39'),
(54, 21, 'saaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '', '', 0, 1, 1, 1, 1, 1, 1, '', '', '2022-05-07 12:35:53'),
(61, 21, 'sa', 'sa', 'sa', 12, 3, 3, 3, 1, 1, 1, 'sa', '', '2022-05-14 18:20:39'),
(66, 1, 'テスト', '', '', 0, 1, 1, 1, 1, 1, 1, '', 'storage/IMG_2964.jpeg', '2022-05-17 11:29:05'),
(70, 21, 'さ', '', '', 0, 1, 1, 1, 1, 1, 1, '', '', '2022-05-20 12:56:28');

-- --------------------------------------------------------

--
-- テーブルの構造 `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `beer_id` int(11) DEFAULT NULL COMMENT 'ビールID',
  `user_id` int(11) DEFAULT NULL COMMENT '登録ユーザID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '登録日時',
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `favorites`
--

INSERT INTO `favorites` (`id`, `beer_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 6, 2, '2022-04-11 00:20:54', '2022-04-11 09:25:07'),
(35, 4, 1, '2022-05-07 05:54:26', '2022-05-07 14:54:26'),
(39, 54, 1, '2022-05-07 07:19:01', '2022-05-07 16:19:01');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `name` varchar(255) DEFAULT NULL COMMENT 'ユーザ名',
  `password` varchar(255) DEFAULT NULL COMMENT 'パスワード',
  `email` varchar(255) DEFAULT NULL COMMENT 'メールアドレス',
  `role` int(11) NOT NULL DEFAULT 0 COMMENT '権限',
  `passReset` varchar(255) NOT NULL COMMENT 'パスワードリセット',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '登録日時',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `role`, `passReset`, `created_at`, `updated_at`) VALUES
(1, 'とっとこビア太郎', '$2y$10$dHmvHP.7BRCppcuuXBsrsODEKTj82BgI12n8s03Zlm.85DtWvqUPW', 'tarutaru.c@outlook.com', 1, '2fac86f36f4d9989eb43a5bfd225090c', '2022-04-14 19:28:01', '2022-05-16 10:49:33'),
(2, 'ニケ', '$2y$10$lM.xrkSAMrKCSz51bUqvuuQIwQCiJva9SpJ0M5XLlHM/mldhm.oHq', 'user2@sd.ds', 0, '2011', '2022-04-14 19:28:01', '2022-05-07 13:51:55'),
(10, 'as', '$2y$10$gwg2FCSPJBdDudXXsy5yg.frmHdcsfQ2pfs6ZIHshtfX1fkL9Kz8m', 'ss@ssaa.aa', 0, '', '2022-04-17 02:26:24', '2022-04-17 02:26:24'),
(11, '様', '$2y$10$92qaSwFTKwDxcHoDa5SbMuBK9JlO2VxzUaOlFcSWmkgkWqi3blC4u', '1@1.asa', 0, '', '2022-04-17 02:32:10', '2022-04-17 02:32:10'),
(12, '山田', '$2y$10$si2MuNT6I7RsXrrcCBkHsup/fPRrz5rfme5EcirYB.uOr5p8vWMhS', 'xxc@zx.as', 0, '', '2022-04-17 02:34:10', '2022-04-17 02:34:10'),
(13, '山田', '$2y$10$x5TNTetGZRP6WU10hEeT8e64SK.gK15z2KR.ti.Gr6GZpkSjy4n/C', 'sa@asaa.sa', 0, '', '2022-04-17 02:36:21', '2022-04-17 02:36:21'),
(14, '山田', '$2y$10$v6aLreaTsZ4AavTyY..S6O20j5Cpy7tbng71LIVVWKuOe4YlYj1bO', 'user3@as.as', 0, '', '2022-04-17 02:37:18', '2022-04-17 02:37:18'),
(15, 'sa', '$2y$10$//YlSiyc.ul/eDqbg0.O5.e82XcjArVkPqB8i.sNHP3njjmmkmX.S', 'sasa@asa.sa', 0, '', '2022-04-17 02:37:41', '2022-04-17 02:37:41'),
(16, 'ssssssssssssssssssssssssssssssssss', '$2y$10$MBSXbycM3GJEQRrXWJ.OM.aKeCFU6FNMqroRd4A0DRWEoxSU55.b.', '1@1.s', 0, '', '2022-04-17 02:38:58', '2022-04-17 02:38:58'),
(21, 'ユーザー', '$2y$10$P7iPs6p6iDGvWSBKqR8zAetTYW0G/Ms0Ov8t34AUHFje4TG1NaVIO', 'test@test.test', 0, '0', '2022-05-04 05:10:30', '2022-05-20 03:45:49'),
(22, '管理者', '$2y$10$7wODxruGtJhEnOhbizIluuTDabcqUdJcX53muKRBqIERaDmDCc.zm', 'kanri@kanri.kanri', 1, '', '2022-05-07 22:44:59', '2022-05-07 22:45:26'),
(23, 'test@test.test', '$2y$10$ZImGcF6/2YBJMhE/ZXXlsOM2.l7EDYNjlx5eCKWBylOGpM/YahcGm', 'as@sssssssssssssssssssssss', 0, '0', '2022-05-16 01:03:43', '2022-05-16 01:03:43');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `beers`
--
ALTER TABLE `beers`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `beers`
--
ALTER TABLE `beers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=71;

--
-- テーブルの AUTO_INCREMENT `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=44;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
