-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-06-14 13:53:50
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `exchangerate`
--

-- --------------------------------------------------------

--
-- 資料表結構 `exchange`
--

CREATE TABLE `exchange` (
  `currency` varchar(20) NOT NULL,
  `value` float(30,20) NOT NULL,
  `update_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `exchange`
--

INSERT INTO `exchange` (`currency`, `value`, `update_date`) VALUES
('HKDADA', 0.13250893354415894000, '2022-04-20T00:00:00Z'),
('HKDBTC', 0.00000306011770589976, '2022-04-20T00:00:00Z'),
('HKDCNY', 0.81814646720886230000, '2022-04-20 13:59:59'),
('HKDDog', 0.89250111579895020000, '2022-04-20T00:00:00Z'),
('HKDETH', 0.00004105331390746869, '2022-04-20T00:00:00Z'),
('HKDEUR', 0.11759037524461746000, '2022-04-20 13:59:59'),
('HKDJPY', 16.30636787414550800000, '2022-04-20 13:59:59'),
('HKDUSD', 0.12748679518699646000, '2022-04-20 13:59:59');

-- --------------------------------------------------------

--
-- 資料表結構 `record`
--

CREATE TABLE `record` (
  `rid` int(100) NOT NULL,
  `username` varchar(40) NOT NULL,
  `from_currency` varchar(20) NOT NULL,
  `to_currency` varchar(20) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `value` float(30,20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `record`
--

INSERT INTO `record` (`rid`, `username`, `from_currency`, `to_currency`, `datetime`, `value`) VALUES
(1, 'test', 'HKD', 'EUR', '2022-04-20 09:02:29', 1.41454422473907470000),
(3, 'rex', 'HKD', 'EUR', '2022-04-20 13:12:50', 0.11742425709962845000),
(4, 'rex', 'HKD', 'EUR', '2022-04-20 13:14:31', 0.11742425709962845000),
(6, 'rex', 'HKD', 'EUR', '2022-04-20 13:23:43', 0.11742425709962845000),
(8, 'rex', 'HKD', 'EUR', '2022-04-20 13:26:15', 0.11742425709962845000),
(9, 'rex', 'HKD', 'EUR', '2022-04-20 13:26:47', 0.23484851419925690000),
(10, 'rex', 'HKD', 'JPY', '2022-04-20 13:27:27', 488.76239013671875000000),
(11, 'rex', 'HKD', 'USD', '2022-04-20 13:28:36', 1.91258823871612550000),
(12, 'rex', 'HKD', 'USD', '2022-04-20 15:50:30', 2.03994655609130860000),
(13, 'alex', 'HKD', 'EUR', '2022-04-20 16:35:05', 0.11759037524461746000),
(14, 'alex', 'HKD', 'JPY', '2022-04-20 16:35:57', 1956.76416015625000000000);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `HKD` float(30,20) NOT NULL,
  `CNY` float(30,20) NOT NULL,
  `JPY` float(30,20) NOT NULL,
  `EUR` float(30,20) NOT NULL,
  `USD` float(30,20) NOT NULL,
  `ETH` float(30,20) NOT NULL,
  `BTC` float(30,20) NOT NULL,
  `ADA` float(30,20) NOT NULL,
  `Dog` float(30,20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `HKD`, `CNY`, `JPY`, `EUR`, `USD`, `ETH`, `BTC`, `ADA`, `Dog`) VALUES
(2, 'rex', '$2y$10$Pf9rp8SgWPaWUJKdPXKJc.mfiXTD1TiOfo6NcwY6kwzWmGvmy3VCG', 'rex@gmail.com', 9931.00000000000000000000, 0.00000000000000000000, 488.76239013671875000000, 0.70454555749893190000, 3.95253467559814450000, 0.00000000000000000000, 0.00000000000000000000, 0.00000000000000000000, 0.00000000000000000000),
(3, 'alex', '$2y$10$92wt8yFd1Tcg22uRRZ/iL.k3JEyhsqHFSlT6G6ZQULaqVAL3P8utu', 'alex@gmail.com', 9879.00000000000000000000, 0.00000000000000000000, 1956.76416015625000000000, 0.11759037524461746000, 0.00000000000000000000, 0.00000000000000000000, 0.00000000000000000000, 0.00000000000000000000, 0.00000000000000000000);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `exchange`
--
ALTER TABLE `exchange`
  ADD PRIMARY KEY (`currency`);

--
-- 資料表索引 `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`rid`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `record`
--
ALTER TABLE `record`
  MODIFY `rid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
