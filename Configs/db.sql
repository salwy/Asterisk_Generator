-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jan 21, 2016 at 06:16 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `asterisk`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` text NOT NULL,
  `command` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `time`, `user`, `command`) VALUES
  (1, '2015-12-29 15:57:46', 'dsalvet', 'SELECT * from numbers'),
  (2, '2015-12-29 16:05:54', 'jkasalek', 'SELECT id FROM numbers'),
  (3, '2015-12-29 17:48:00', 'root', 'UPDATE numbers SET in_use=1 WHERE number=420607690201'),
  (4, '2015-12-29 17:55:32', 'root', 'UPDATE numbers SET in_use=1 WHERE number=420564987451'),
  (5, '2015-12-29 18:12:30', 'root', 'INSERT INTO numbers (number, in_use) VALUES (420788987552, 0)'),
  (6, '2015-12-29 18:47:16', 'root', 'INSERT INTO sip (ext, secret, ip, number_id) VALUES (288, d4jhdj64jhg, 193.17.251.31, 13)'),
  (7, '2015-12-29 18:47:16', 'root', 'UPDATE numbers SET in_use=1 WHERE number=420788987555'),
  (8, '2015-12-29 21:08:33', 'root', 'INSERT INTO sip (ext, secret, ip, number_id) VALUES (''291'', ''4ktglgg64jf'', ''193.17.251.31'', ''7'')'),
  (9, '2015-12-29 21:08:33', 'root', 'UPDATE numbers SET in_use=1 WHERE number=420745124541'),
  (10, '2015-12-30 18:36:55', 'root', 'DELETE FROM sip WHERE ext=287'),
  (11, '2015-12-30 18:37:47', 'root', 'DELETE FROM sip WHERE ext=286'),
  (12, '2015-12-30 18:37:47', 'root', 'UPDATE numbers SET in_use=0 WHERE id=1'),
  (13, '2015-12-30 18:38:54', 'root', 'DELETE FROM sip WHERE ext=285'),
  (14, '2015-12-30 18:38:54', 'root', 'UPDATE numbers SET in_use=0 WHERE id=16'),
  (15, '2015-12-30 20:52:08', 'root', 'UPDATE sip SET secret=fgj7f98j4jj, ip=82.142.106.150, number_id=8 WHERE ext=282'),
  (16, '2015-12-30 20:52:08', 'root', 'UPDATE numbers SET in_use=1 WHERE id=8'),
  (17, '2015-12-30 20:54:38', 'root', 'UPDATE sip SET secret=Ned!#s!453, ip=82.142.106.150, number_id=16 WHERE ext=272'),
  (18, '2015-12-30 20:54:38', 'root', 'UPDATE numbers SET in_use=1 WHERE id=16'),
  (19, '2015-12-30 20:59:26', 'root', 'DELETE FROM sip WHERE ext=284'),
  (20, '2015-12-30 20:59:26', 'root', 'UPDATE numbers SET in_use=0 WHERE id=0'),
  (21, '2015-12-30 20:59:52', 'root', 'DELETE FROM sip WHERE ext=272'),
  (22, '2015-12-30 20:59:52', 'root', 'UPDATE numbers SET in_use=0 WHERE id=16'),
  (23, '2015-12-30 21:14:55', 'root', 'INSERT INTO sip (ext, secret, ip, number_id) VALUES (272, fa4ga5da4a, 192.168.1.15, 9)'),
  (24, '2015-12-30 21:14:55', 'root', 'UPDATE numbers SET in_use=1 WHERE number=420678953451'),
  (25, '2015-12-30 21:15:29', 'root', 'INSERT INTO numbers (number, in_use) VALUES (420487854214, 0)'),
  (26, '2015-12-30 21:15:51', 'root', 'UPDATE sip SET secret=fafa54d5a5fa1, ip=84.152.46.48, number_id=16 WHERE ext=279'),
  (27, '2015-12-30 21:15:51', 'root', 'UPDATE numbers SET in_use=1 WHERE id=16'),
  (28, '2015-12-30 21:16:43', 'root', 'DELETE FROM sip WHERE ext=279'),
  (29, '2015-12-30 21:16:43', 'root', 'UPDATE numbers SET in_use=0 WHERE id=16'),
  (30, '2015-12-30 21:16:59', 'root', 'DELETE FROM numbers WHERE number=420487854214'),
  (31, '2015-12-30 21:16:59', 'root', 'UPDATE sip SET number_id=0 WHERE number_id=17'),
  (32, '2016-01-21 13:24:06', '', 'INSERT INTO sip (ext, secret, ip, number_id) VALUES (284, alfal4g4a, 192.168.1.1, 16)'),
  (33, '2016-01-21 13:24:06', '', 'UPDATE numbers SET in_use=1 WHERE number=420788987552'),
  (34, '2016-01-21 13:25:49', '', 'INSERT INTO sip (ext, secret, ip, number_id) VALUES (284, 56g46sgsf, 192.168.1.1, 1)'),
  (35, '2016-01-21 13:25:49', '', 'UPDATE numbers SET in_use=1 WHERE number=420607690201'),
  (36, '2016-01-21 13:46:34', 'david', 'INSERT INTO sip (ext, secret, ip, number_id) VALUES (285, yd5ttuj4ute, 194.228.32.220, 11)'),
  (37, '2016-01-21 13:46:34', 'david', 'UPDATE numbers SET in_use=1 WHERE number=420678953451'),
  (38, '2016-01-21 13:50:27', 'david', 'DELETE FROM sip WHERE ext=285'),
  (39, '2016-01-21 13:50:27', 'david', 'UPDATE numbers SET in_use=0 WHERE id=11'),
  (40, '2016-01-21 16:35:26', 'david', 'UPDATE sip SET secret=fa4ga5da4a, ip=192.168.1.15, number_id=4 WHERE ext=272'),
  (41, '2016-01-21 16:35:26', 'david', ''),
  (42, '2016-01-21 16:41:19', '', 'INSERT INTO numbers (number, in_use) VALUES (420587464124, 0)'),
  (43, '2016-01-21 16:41:58', 'david', 'INSERT INTO numbers (number, in_use) VALUES (420354874547, 0)'),
  (44, '2016-01-21 16:48:33', 'david', 'DELETE FROM numbers WHERE number=420607690201'),
  (45, '2016-01-21 16:48:33', 'david', 'UPDATE sip SET number_id=0 WHERE number_id=1'),
  (46, '2016-01-21 16:52:44', 'david', 'UPDATE sip SET secret=56g46sgsf, ip=192.168.1.1, number_id=5 WHERE ext=284'),
  (47, '2016-01-21 16:52:44', 'david', ''),
  (48, '2016-01-21 16:53:22', 'david', 'UPDATE sip SET secret=56g46sgsf, ip=192.168.1.1, number_id=18 WHERE ext=284'),
  (49, '2016-01-21 16:53:22', 'david', 'UPDATE numbers SET in_use=1 WHERE id=18'),
  (50, '2016-01-21 16:54:55', 'david', 'INSERT INTO numbers (number, in_use) VALUES (420874874547, 0)'),
  (51, '2016-01-21 16:56:35', 'david', 'DELETE FROM sip WHERE ext=284'),
  (52, '2016-01-21 16:56:35', 'david', 'UPDATE numbers SET in_use=0 WHERE id=18'),
  (53, '2016-01-21 16:56:43', 'david', 'DELETE FROM numbers WHERE number=420874874547'),
  (54, '2016-01-21 16:56:43', 'david', 'UPDATE sip SET number_id=0 WHERE number_id=19');

-- --------------------------------------------------------

--
-- Table structure for table `numbers`
--

CREATE TABLE `numbers` (
  `id` int(11) NOT NULL,
  `number` bigint(11) NOT NULL,
  `in_use` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `numbers`
--

INSERT INTO `numbers` (`id`, `number`, `in_use`) VALUES
  (4, 420487870350, 1),
  (5, 420564987451, 1),
  (6, 420731554042, 0),
  (7, 420745124541, 0),
  (11, 420678953451, 0),
  (12, 420788987554, 0),
  (13, 420788987555, 0),
  (14, 420788987557, 0),
  (15, 420788987551, 0),
  (16, 420788987552, 0),
  (17, 420587464124, 0),
  (18, 420354874547, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sip`
--

CREATE TABLE `sip` (
  `id` int(11) NOT NULL,
  `ext` int(11) NOT NULL,
  `secret` text NOT NULL,
  `ip` text,
  `number_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sip`
--

INSERT INTO `sip` (`id`, `ext`, `secret`, `ip`, `number_id`) VALUES
  (1, 272, 'fa4ga5da4a', '192.168.1.15', 4),
  (2, 273, '1253434Ygf55#a', '193.17.251.31', 0),
  (3, 274, 'jgod^3546fd', '82.142.106.150', 0),
  (4, 275, 'afkja65aggfdag', '193.17.251.31', 0),
  (5, 276, 'ks:"#5346fa', '194.228.32.220', 0),
  (6, 277, 'afja545fa3#TF#l', '194.228.32.220', 0),
  (7, 278, 'afl:""F#R''5', '194.228.32.220', 0),
  (8, 280, '"PKLWE""$P', '193.17.251.31', 0),
  (9, 281, 'lag#"#54651', '192.168.1.15', 0),
  (10, 282, 'fgj7f98j4jj', '82.142.106.150', 0),
  (11, 283, 'fgj7f98j4jj', '82.142.106.150', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `secret` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `secret`) VALUES
  (1, 'test', 'test'),
  (2, 'david', 'testing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `logs_id_uindex` (`id`);

--
-- Indexes for table `numbers`
--
ALTER TABLE `numbers`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `numbers_id_uindex` (`id`),
ADD UNIQUE KEY `numbers_number_uindex` (`number`);

--
-- Indexes for table `sip`
--
ALTER TABLE `sip`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `sip_id_uindex` (`id`),
ADD UNIQUE KEY `sip_ext_uindex` (`ext`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `users_id_uindex` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `numbers`
--
ALTER TABLE `numbers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `sip`
--
ALTER TABLE `sip`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;