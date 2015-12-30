-- --------------------------------------------------------
-- Hostitel:                     127.0.0.1
-- Verze serveru:                10.1.9-MariaDB - mariadb.org binary distribution
-- OS serveru:                   Win32
-- HeidiSQL Verze:               9.3.0.5036
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- Exportování dat pro tabulku asterisk.logs: ~25 rows (přibližně)
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` (`id`, `time`, `user`, `command`) VALUES
	(1, '2015-12-29 16:57:46', 'dsalvet', 'SELECT * from numbers'),
	(2, '2015-12-29 17:05:54', 'jkasalek', 'SELECT id FROM numbers'),
	(3, '2015-12-29 18:48:00', 'root', 'UPDATE numbers SET in_use=1 WHERE number=420607690201'),
	(4, '2015-12-29 18:55:32', 'root', 'UPDATE numbers SET in_use=1 WHERE number=420564987451'),
	(5, '2015-12-29 19:12:30', 'root', 'INSERT INTO numbers (number, in_use) VALUES (420788987552, 0)'),
	(6, '2015-12-29 19:47:16', 'root', 'INSERT INTO sip (ext, secret, ip, number_id) VALUES (288, d4jhdj64jhg, 193.17.251.31, 13)'),
	(7, '2015-12-29 19:47:16', 'root', 'UPDATE numbers SET in_use=1 WHERE number=420788987555'),
	(8, '2015-12-29 22:08:33', 'root', 'INSERT INTO sip (ext, secret, ip, number_id) VALUES (\'291\', \'4ktglgg64jf\', \'193.17.251.31\', \'7\')'),
	(9, '2015-12-29 22:08:33', 'root', 'UPDATE numbers SET in_use=1 WHERE number=420745124541'),
	(10, '2015-12-30 19:36:55', 'root', 'DELETE FROM sip WHERE ext=287'),
	(11, '2015-12-30 19:37:47', 'root', 'DELETE FROM sip WHERE ext=286'),
	(12, '2015-12-30 19:37:47', 'root', 'UPDATE numbers SET in_use=0 WHERE id=1'),
	(13, '2015-12-30 19:38:54', 'root', 'DELETE FROM sip WHERE ext=285'),
	(14, '2015-12-30 19:38:54', 'root', 'UPDATE numbers SET in_use=0 WHERE id=16'),
	(15, '2015-12-30 21:52:08', 'root', 'UPDATE sip SET secret=fgj7f98j4jj, ip=82.142.106.150, number_id=8 WHERE ext=282'),
	(16, '2015-12-30 21:52:08', 'root', 'UPDATE numbers SET in_use=1 WHERE id=8'),
	(17, '2015-12-30 21:54:38', 'root', 'UPDATE sip SET secret=Ned!#s!453, ip=82.142.106.150, number_id=16 WHERE ext=272'),
	(18, '2015-12-30 21:54:38', 'root', 'UPDATE numbers SET in_use=1 WHERE id=16'),
	(19, '2015-12-30 21:59:26', 'root', 'DELETE FROM sip WHERE ext=284'),
	(20, '2015-12-30 21:59:26', 'root', 'UPDATE numbers SET in_use=0 WHERE id=0'),
	(21, '2015-12-30 21:59:52', 'root', 'DELETE FROM sip WHERE ext=272'),
	(22, '2015-12-30 21:59:52', 'root', 'UPDATE numbers SET in_use=0 WHERE id=16'),
	(23, '2015-12-30 22:14:55', 'root', 'INSERT INTO sip (ext, secret, ip, number_id) VALUES (272, fa4ga5da4a, 192.168.1.15, 9)'),
	(24, '2015-12-30 22:14:55', 'root', 'UPDATE numbers SET in_use=1 WHERE number=420678953451'),
	(25, '2015-12-30 22:15:29', 'root', 'INSERT INTO numbers (number, in_use) VALUES (420487854214, 0)'),
	(26, '2015-12-30 22:15:51', 'root', 'UPDATE sip SET secret=fafa54d5a5fa1, ip=84.152.46.48, number_id=16 WHERE ext=279'),
	(27, '2015-12-30 22:15:51', 'root', 'UPDATE numbers SET in_use=1 WHERE id=16'),
	(28, '2015-12-30 22:16:43', 'root', 'DELETE FROM sip WHERE ext=279'),
	(29, '2015-12-30 22:16:43', 'root', 'UPDATE numbers SET in_use=0 WHERE id=16'),
	(30, '2015-12-30 22:16:59', 'root', 'DELETE FROM numbers WHERE number=420487854214'),
	(31, '2015-12-30 22:16:59', 'root', 'UPDATE sip SET number_id=0 WHERE number_id=17');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;

-- Exportování dat pro tabulku asterisk.numbers: ~13 rows (přibližně)
/*!40000 ALTER TABLE `numbers` DISABLE KEYS */;
INSERT INTO `numbers` (`id`, `number`, `in_use`) VALUES
	(1, 420607690201, 0),
	(4, 420487870350, 0),
	(5, 420564987451, 0),
	(6, 420731554042, 0),
	(7, 420745124541, 0),
	(9, 420678953451, 1),
	(11, 420678953451, 0),
	(12, 420788987554, 0),
	(13, 420788987555, 0),
	(14, 420788987557, 0),
	(15, 420788987551, 0),
	(16, 420788987552, 0);
/*!40000 ALTER TABLE `numbers` ENABLE KEYS */;

-- Exportování dat pro tabulku asterisk.sip: ~12 rows (přibližně)
/*!40000 ALTER TABLE `sip` DISABLE KEYS */;
INSERT INTO `sip` (`ext`, `secret`, `ip`, `number_id`) VALUES
	(272, 'fa4ga5da4a', '192.168.1.15', 9),
	(273, '1253434Ygf55#a', '193.17.251.31', 0),
	(274, 'jgod^3546fd', '82.142.106.150', 0),
	(275, 'afkja65aggfdag', '193.17.251.31', 0),
	(276, 'ks:"#5346fa', '194.228.32.220', 0),
	(277, 'afja545fa3#TF#l', '194.228.32.220', 0),
	(278, 'afl:""F#R\'5', '194.228.32.220', 0),
	(280, '"PKLWE""$P', '193.17.251.31', 0),
	(281, 'lag#"#54651', '192.168.1.15', 0),
	(282, 'fgj7f98j4jj', '82.142.106.150', 0),
	(283, 'fgj7f98j4jj', '82.142.106.150', 0);
/*!40000 ALTER TABLE `sip` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
