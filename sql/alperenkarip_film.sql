-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 15 Tem 2013, 13:00:34
-- Sunucu sürümü: 5.5.32-cll
-- PHP Sürümü: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `batuhana_film`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `anket`
--

CREATE TABLE IF NOT EXISTS `anket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anket_baslik` varchar(225) NOT NULL,
  `anket_durum` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `anket`
--

INSERT INTO `anket` (`id`, `anket_baslik`, `anket_durum`) VALUES
(1, 'Sistemi nasıl buldunuz ?', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `anket_soru`
--

CREATE TABLE IF NOT EXISTS `anket_soru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anket_soru` varchar(500) NOT NULL,
  `anket_oy` int(11) NOT NULL,
  `anket_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `anket_soru`
--

INSERT INTO `anket_soru` (`id`, `anket_soru`, `anket_oy`, `anket_id`) VALUES
(1, 'Çok güzel', 23, 1),
(2, 'Fena değil', 5, 1),
(3, 'Geliştirilmeli', 28, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `etiketi`
--

CREATE TABLE IF NOT EXISTS `etiketi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etiket_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1102 ;

--
-- Tablo döküm verisi `etiketi`
--

INSERT INTO `etiketi` (`id`, `etiket_id`, `film_id`) VALUES
(1, 1, 1),
(2, 4, 2),
(3, 5, 2),
(4, 6, 2),
(5, 7, 2),
(6, 8, 3),
(7, 9, 3),
(8, 10, 3),
(9, 11, 3),
(12, 14, 5),
(13, 15, 5),
(14, 13, 5),
(15, 16, 6),
(16, 17, 6),
(17, 18, 6),
(18, 19, 6),
(19, 20, 7),
(20, 21, 7),
(21, 22, 7),
(28, 28, 9),
(29, 29, 9),
(30, 30, 9),
(31, 31, 9),
(32, 25, 9),
(33, 32, 9),
(34, 33, 9),
(35, 11, 9),
(36, 34, 10),
(37, 35, 10),
(38, 25, 10),
(39, 36, 10),
(40, 37, 10),
(41, 38, 10),
(42, 13, 10),
(43, 39, 11),
(44, 40, 11),
(45, 25, 11),
(46, 41, 11),
(47, 42, 11),
(48, 13, 11),
(49, 43, 12),
(50, 44, 12),
(51, 25, 12),
(52, 45, 12),
(53, 46, 12),
(54, 47, 12),
(55, 13, 12),
(56, 48, 13),
(57, 49, 13),
(58, 25, 13),
(59, 50, 13),
(60, 51, 13),
(61, 52, 13),
(62, 11, 13),
(63, 53, 14),
(64, 25, 14),
(65, 54, 14),
(66, 55, 14),
(67, 56, 14),
(68, 13, 14),
(69, 57, 15),
(70, 58, 15),
(71, 25, 15),
(72, 59, 15),
(73, 60, 15),
(74, 61, 15),
(75, 13, 15),
(76, 62, 16),
(77, 63, 16),
(78, 25, 16),
(79, 64, 16),
(80, 65, 16),
(81, 66, 16),
(82, 13, 16),
(83, 67, 17),
(84, 68, 17),
(85, 69, 17),
(86, 25, 17),
(87, 70, 17),
(88, 71, 17),
(89, 72, 17),
(90, 73, 17),
(91, 13, 17),
(92, 74, 18),
(93, 75, 18),
(94, 25, 18),
(95, 59, 18),
(96, 76, 18),
(97, 77, 18),
(98, 78, 18),
(99, 79, 19),
(100, 25, 19),
(101, 80, 19),
(102, 13, 19),
(103, 81, 20),
(104, 82, 20),
(105, 83, 20),
(106, 25, 20),
(107, 84, 20),
(108, 73, 20),
(109, 11, 20),
(110, 85, 21),
(111, 13, 21),
(112, 86, 22),
(113, 87, 22),
(114, 88, 22),
(115, 11, 22),
(116, 89, 23),
(117, 90, 23),
(118, 25, 23),
(119, 91, 23),
(120, 92, 23),
(121, 11, 23),
(122, 93, 24),
(123, 94, 24),
(124, 25, 24),
(125, 95, 24),
(126, 96, 24),
(127, 11, 24),
(134, 23, 26),
(135, 24, 26),
(136, 25, 26),
(137, 26, 26),
(138, 27, 26),
(139, 13, 26),
(140, 97, 27),
(141, 25, 27),
(142, 11, 27),
(143, 98, 28),
(144, 99, 28),
(145, 11, 28),
(165, 105, 32),
(166, 102, 32),
(331, 116, 64),
(332, 117, 64),
(333, 118, 64),
(334, 102, 64),
(335, 129, 65),
(336, 130, 65),
(337, 25, 65),
(338, 131, 65),
(339, 132, 65),
(340, 102, 65),
(341, 133, 66),
(342, 134, 66),
(343, 135, 66),
(344, 136, 66),
(345, 59, 66),
(346, 137, 66),
(347, 138, 66),
(348, 139, 66),
(349, 102, 66),
(350, 59, 67),
(351, 140, 67),
(352, 141, 67),
(353, 142, 67),
(354, 102, 67),
(355, 143, 68),
(356, 144, 68),
(357, 145, 68),
(358, 146, 68),
(359, 147, 68),
(360, 148, 68),
(361, 149, 68),
(362, 102, 68),
(363, 119, 69),
(364, 120, 69),
(365, 25, 69),
(366, 59, 69),
(367, 121, 69),
(368, 122, 69),
(369, 102, 69),
(370, 151, 70),
(371, 152, 70),
(372, 102, 70),
(373, 153, 71),
(374, 154, 71),
(375, 155, 71),
(376, 102, 71),
(377, 156, 72),
(378, 157, 72),
(379, 150, 72),
(380, 158, 72),
(381, 25, 72),
(382, 159, 72),
(383, 160, 72),
(384, 102, 72),
(385, 161, 73),
(386, 162, 73),
(387, 25, 73),
(388, 163, 73),
(389, 164, 73),
(390, 102, 73),
(391, 165, 74),
(392, 166, 74),
(393, 25, 74),
(394, 167, 74),
(395, 168, 74),
(396, 102, 74),
(397, 81, 75),
(398, 82, 75),
(399, 150, 75),
(400, 25, 75),
(401, 84, 75),
(402, 73, 75),
(403, 102, 75),
(404, 169, 76),
(405, 170, 76),
(406, 102, 76),
(407, 171, 77),
(408, 172, 77),
(409, 102, 77),
(410, 173, 78),
(411, 102, 78),
(412, 64, 79),
(413, 174, 79),
(414, 25, 79),
(415, 59, 79),
(416, 175, 79),
(417, 102, 79),
(418, 176, 80),
(419, 29, 80),
(420, 177, 80),
(421, 25, 80),
(422, 77, 80),
(423, 154, 80),
(424, 178, 80),
(425, 102, 80),
(528, 188, 98),
(529, 25, 98),
(530, 59, 98),
(531, 189, 98),
(532, 102, 98),
(1062, 190, 187),
(1063, 82, 187),
(1064, 25, 187),
(1065, 73, 187),
(1066, 136, 187),
(1067, 191, 187),
(1068, 102, 187),
(1069, 179, 188),
(1070, 180, 188),
(1071, 181, 188),
(1072, 25, 188),
(1073, 182, 188),
(1074, 102, 188),
(1075, 192, 189),
(1076, 25, 189),
(1077, 193, 189),
(1078, 102, 189),
(1079, 194, 190),
(1080, 29, 190),
(1081, 195, 190),
(1082, 25, 190),
(1083, 196, 190),
(1084, 154, 190),
(1085, 197, 190),
(1086, 102, 190),
(1087, 198, 191),
(1088, 199, 191),
(1089, 25, 191),
(1090, 59, 191),
(1091, 200, 191),
(1092, 201, 191),
(1093, 102, 191),
(1094, 202, 192),
(1095, 203, 192),
(1096, 25, 192),
(1097, 204, 192),
(1098, 205, 192),
(1099, 206, 192),
(1100, 207, 192),
(1101, 102, 192);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `etiketler`
--

CREATE TABLE IF NOT EXISTS `etiketler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `e_baslik` varchar(225) NOT NULL,
  `e_sef` varchar(225) NOT NULL,
  `e_ustun` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=208 ;

--
-- Tablo döküm verisi `etiketler`
--

INSERT INTO `etiketler` (`id`, `e_baslik`, `e_sef`, `e_ustun`) VALUES
(1, '720p Filmler', '720p-filmler', 1),
(2, 'Türk filmleri', 'turk-filmleri', 1),
(3, 'Mafya filmleri', 'mafya-filmleri', 1),
(4, 'Die', 'die', 0),
(5, 'tödliche', 'todliche', 0),
(6, 'Maria', 'maria', 0),
(7, '(1993)', '1993', 0),
(8, 'Gu', 'gu', 0),
(9, 'Family', 'family', 0),
(10, 'Book', 'book', 0),
(11, '(2013)', '2013', 0),
(12, '"Pramface"', '-pramface-', 0),
(13, '(2012)', '2012', 0),
(14, '"Baby', '-baby', 0),
(15, 'Daddy"', 'daddy-', 0),
(16, '"Better', '-better', 0),
(17, 'with', 'with', 0),
(18, 'You"', 'you-', 0),
(19, '(2010)', '2010', 0),
(20, '"Mad', '-mad', 0),
(21, 'Men"', 'men-', 0),
(22, '(2007)', '2007', 0),
(23, 'Garip', 'garip', 0),
(24, 'Komşular', 'komsular', 0),
(25, '-', '-', 0),
(26, 'Small', 'small', 0),
(27, 'Apartments', 'apartments', 0),
(28, 'Hızlı', 'hizli', 0),
(29, 've', 've', 0),
(30, 'Öfkeli', 'ofkeli', 0),
(31, '6', '6', 0),
(32, 'Fast', 'fast', 0),
(33, 'Furious', 'furious', 0),
(34, 'Vazgeçmem', 'vazgecmem', 0),
(35, 'Senden', 'senden', 0),
(36, 'Celeste', 'celeste', 0),
(37, 'Jesse', 'jesse', 0),
(38, 'Forever', 'forever', 0),
(39, 'Kral', 'kral', 0),
(40, 'Yolu', 'yolu', 0),
(41, 'Olba', 'olba', 0),
(42, 'kralligi', 'kralligi', 0),
(43, 'Sadece', 'sadece', 0),
(44, 'Aşk', 'ask', 0),
(45, 'Den', 'den', 0),
(46, 'skaldede', 'skaldede', 0),
(47, 'frisør', 'frisr', 0),
(48, 'Günlerin', 'gunlerin', 0),
(49, 'Köpüğü', 'kopugu', 0),
(50, 'L''écume', 'lecume', 0),
(51, 'des', 'des', 0),
(52, 'jours', 'jours', 0),
(53, 'Evde', 'evde', 0),
(54, 'Dans', 'dans', 0),
(55, 'la', 'la', 0),
(56, 'maison', 'maison', 0),
(57, 'Zoraki', 'zoraki', 0),
(58, 'Radikal', 'radikal', 0),
(59, 'The', 'the', 0),
(60, 'Reluctant', 'reluctant', 0),
(61, 'Fundamentalist', 'fundamentalist', 0),
(62, 'Kollarımda', 'kollarimda', 0),
(63, 'Kal', 'kal', 0),
(64, 'À', 'a', 0),
(65, 'coeur', 'coeur', 0),
(66, 'ouvert', 'ouvert', 0),
(67, 'Bir', 'bir', 0),
(68, 'Şarkının', 'sarkinin', 0),
(69, 'Peşinde', 'pesinde', 0),
(70, 'Searching', 'searching', 0),
(71, 'for', 'for', 0),
(72, 'Sugar', 'sugar', 0),
(73, 'Man', 'man', 0),
(74, 'Kara', 'kara', 0),
(75, 'Şövalye', 'sovalye', 0),
(76, 'Dark', 'dark', 0),
(77, 'Knight', 'knight', 0),
(78, '(2008)', '2008', 0),
(79, 'Devrim', 'devrim', 0),
(80, '"Revolution"', '-revolution-', 0),
(81, 'Demir', 'demir', 0),
(82, 'Adam', 'adam', 0),
(83, '3', '3', 0),
(84, 'Iron', 'iron', 0),
(85, '"Continuum"', '-continuum-', 0),
(86, '"Da', '-da', 0),
(87, 'Vinci''s', 'vincis', 0),
(88, 'Demons"', 'demons-', 0),
(89, 'Sıcak', 'sicak', 0),
(90, 'Kalpler', 'kalpler', 0),
(91, 'Warm', 'warm', 0),
(92, 'Bodies', 'bodies', 0),
(93, 'Acı', 'aci', 0),
(94, 'Reçete', 'recete', 0),
(95, 'Side', 'side', 0),
(96, 'Effects', 'effects', 0),
(97, 'Parker', 'parker', 0),
(98, '"Hemlock', '-hemlock', 0),
(99, 'Grove"', 'grove-', 0),
(100, 'Generation', 'generation', 0),
(101, 'Um', 'um', 0),
(102, 'izle', 'izle', 0),
(103, 'Savaşçının', 'savascinin', 0),
(104, 'Sanctuary', 'sanctuary', 0),
(105, 'Oblivion', 'oblivion', 0),
(106, 'Daha', 'daha', 0),
(107, 'İyi', 'iyi', 0),
(108, 'Hayat', 'hayat', 0),
(109, 'Better', 'better', 0),
(110, 'Life', 'life', 0),
(111, 'Dev', 'dev', 0),
(112, 'Avcısı', 'avcisi', 0),
(113, 'Jack', 'jack', 0),
(114, 'Giant', 'giant', 0),
(115, 'Slayer', 'slayer', 0),
(116, 'Küçük', 'kucuk', 0),
(117, 'Dahi:', 'dahi', 0),
(118, 'Vitus', 'vitus', 0),
(119, 'Maskeli', 'maskeli', 0),
(120, 'Süvari', 'suvari', 0),
(121, 'Lone', 'lone', 0),
(122, 'Ranger', 'ranger', 0),
(123, 'Aralık', 'aralik', 0),
(124, 'Çocukları', 'cocuklari', 0),
(125, 'December', 'december', 0),
(126, 'Boys', 'boys', 0),
(127, 'Kızım', 'kizim', 0),
(128, 'Girl', 'girl', 0),
(129, 'Kanlı', 'kanli', 0),
(130, 'Nehir', 'nehir', 0),
(131, 'Red', 'red', 0),
(132, 'River', 'river', 0),
(133, 'Watch', 'watch', 0),
(134, 'Full', 'full', 0),
(135, 'Night', 'night', 0),
(136, 'of', 'of', 0),
(137, 'Living', 'living', 0),
(138, 'Dead:', 'dead', 0),
(139, 'Resurrection', 'resurrection', 0),
(140, 'Devil', 'devil', 0),
(141, 'You', 'you', 0),
(142, 'Know', 'know', 0),
(143, 'Silahşörü', 'silahsoru', 0),
(144, 'Destekleyin', 'destekleyin', 0),
(145, '–', '', 0),
(146, 'Support', 'support', 0),
(147, 'Your', 'your', 0),
(148, 'Local', 'local', 0),
(149, 'Gunfighter', 'gunfighter', 0),
(150, '2', '2', 0),
(151, 'Suç', 'suc', 0),
(152, 'Sınırı', 'siniri', 0),
(153, 'William', 'william', 0),
(154, 'and', 'and', 0),
(155, 'Kate', 'kate', 0),
(156, '12', '12', 0),
(157, 'Tuzak', 'tuzak', 0),
(158, 'Kanunsuz', 'kanunsuz', 0),
(159, 'Rounds:', 'rounds', 0),
(160, 'Reloaded', 'reloaded', 0),
(161, 'Büyük', 'buyuk', 0),
(162, 'Umutlar', 'umutlar', 0),
(163, 'Great', 'great', 0),
(164, 'Expectations', 'expectations', 0),
(165, 'Yılbaşı', 'yilbasi', 0),
(166, 'Postası', 'postasi', 0),
(167, 'Christmas', 'christmas', 0),
(168, 'Mail', 'mail', 0),
(169, 'Cennet', 'cennet', 0),
(170, 'Yolculuğu', 'yolculugu', 0),
(171, 'Tanrının', 'tanrinin', 0),
(172, 'Ofisi', 'ofisi', 0),
(173, 'Karo', 'karo', 0),
(174, 'Takımı', 'takimi', 0),
(175, 'A-Team', 'a-team', 0),
(176, 'Gece', 'gece', 0),
(177, 'Gündüz', 'gunduz', 0),
(178, 'Day', 'day', 0),
(179, 'G.I.', 'gi', 0),
(180, 'Joe:', 'joe', 0),
(181, 'Misilleme', 'misilleme', 0),
(182, 'Retaliation', 'retaliation', 0),
(183, 'A.C.A.B.:', 'acab', 0),
(184, 'All', 'all', 0),
(185, 'Cops', 'cops', 0),
(186, 'Are', 'are', 0),
(187, 'Bastards', 'bastards', 0),
(188, 'Crood''lar', 'croodlar', 0),
(189, 'Croods', 'croods', 0),
(190, 'Çelik', 'celik', 0),
(191, 'Steel', 'steel', 0),
(192, 'Trans', 'trans', 0),
(193, 'Trance', 'trance', 0),
(194, 'Vur', 'vur', 0),
(195, 'Kaç', 'kac', 0),
(196, 'Hit', 'hit', 0),
(197, 'Run', 'run', 0),
(198, 'Kelebek', 'kelebek', 0),
(199, 'Odası', 'odasi', 0),
(200, 'Butterfly', 'butterfly', 0),
(201, 'Roo', 'roo', 0),
(202, 'Yokluğuna', 'yokluguna', 0),
(203, 'Çıldırdım', 'cildirdim', 0),
(204, 'Maddened', 'maddened', 0),
(205, 'by', 'by', 0),
(206, 'His', 'his', 0),
(207, 'Absence', 'absence', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `filmler`
--

CREATE TABLE IF NOT EXISTS `filmler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `film_baslik` varchar(255) NOT NULL,
  `film_sef` varchar(225) NOT NULL,
  `film_resim` varchar(555) NOT NULL,
  `film_arka` varchar(300) NOT NULL,
  `film_tip` int(11) NOT NULL,
  `film_imdb` varchar(225) NOT NULL,
  `film_gosterim_tarihi` varchar(225) NOT NULL,
  `film_eklenme_tarihi` datetime NOT NULL,
  `film_sgt` varchar(25) NOT NULL,
  `film_yonetmen` varchar(225) NOT NULL,
  `film_yapim` varchar(225) NOT NULL,
  `film_oyuncular` varchar(555) NOT NULL,
  `film_ozet` text NOT NULL,
  `film_ekleyen` varchar(25) NOT NULL,
  `film_zaman` datetime NOT NULL,
  `film_gosterim` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=193 ;

--
-- Tablo döküm verisi `filmler`
--

INSERT INTO `filmler` (`id`, `film_baslik`, `film_sef`, `film_resim`, `film_arka`, `film_tip`, `film_imdb`, `film_gosterim_tarihi`, `film_eklenme_tarihi`, `film_sgt`, `film_yonetmen`, `film_yapim`, `film_oyuncular`, `film_ozet`, `film_ekleyen`, `film_zaman`, `film_gosterim`) VALUES
(1, '"Borgen" (2010)', '-borgen-2010', 'http://www.batuhanaydin.com/film/resimler/kucuk/1-29_05_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/1-29_05_13-buyuk.jpg', '', 1, ' 7.9/10', 'belli değil', '2013-05-29 10:45:59', '', 'Louise Friedberg', ' 2010 -  Danimarka', 'Sidse Babett Knudsen,Birgitte Hjort S&#248;rensen,Emil Poulsen,Freja Riemann,S&#248;ren Malling,Thomas Levin,Johan Philip Asb&#230;k,Benedikte Hansen,Michael Birkkj&#230;r,Anders Juul,Lisbeth Wulff,Kasper Lange,Lars Knutzon,S&#xF8;ren Spanning,Christoph Bastrup', 'Bilgi :Ülkenin iki muhtemel başbakan adayı televizyon ekranında hesaplaşırken halkın güvenini kaybedince, ılımlı partinin zarif kadın lideri Birgitte Nyborg genel seçimden sürpriz bir zaferle çıkıyor. Kendisine hükümet kurma görevi verilmesiyle birlikte, biz de onunla Borgen koridorlarını arşınlamaya başlıyoruz. Arka plan, dünyanın refah seviyesi en yüksek yerlerinden biri de olsa, evli, iki çocuklu ve başbakan olarak çalışan bir kadın için hayat, mücadele demek. Politik yükselişi takip eden kaçınılmaz zamansızlık sorunu ile yaşamaya alışmak ve aile bireylerinin hayatlarının bu gelişmelerden mümkün olduğunca az etkilenmesini sağlamak için insanüstü gayret gösterirken, dengeleri korumak da zaman zaman imkânsız oluyor. luna - digiturk.com.tr ', 'alperen', '2013-05-29 10:42:00', 86),
(2, 'Die tödliche Maria (1993)', 'die-todliche-maria-1993', 'http://www.batuhanaydin.com/film/resimler/kucuk/2-29_05_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/2-29_05_13-buyuk.jpg', '', 1, ' 6.8/10', '1994', '2013-05-29 10:46:34', '', 'Tom Tykwer', ' 1993 -  Almanya', 'Nina Petri,Katja Studt,Juliane Heinemann,Josef Bierbichler,P&#233;ter Franke,Jean Maeser,Joachim Kr&#243;l,Rolf Peter Kahl,Renate Usko,Georg Winterfeld,Tom Spiess,Andreas Petri,Nada Daniels,Ortwin Spieler,Peter Hommen', 'Bilgi :Maria, duygusuz kocası ile yatalak babasından oluşan dapdaracık küçük burjuva dünyasında yaşayan bir kadındır. Yaşamı sürekli aşağılanmalardan ve tek tutkusu olan böcek koleksiyonundan ibarettir. ', 'alperen', '2013-05-29 10:43:00', 70),
(3, 'Gu Family Book (2013)', 'gu-family-book-2013', 'http://www.batuhanaydin.com/film/resimler/kucuk/3-29_05_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/3-29_05_13-buyuk.jpg', '0px||http://www.batuhanaydin.com/film/tema/arkaplanlar/3.jpg', 1, ' 4.6/10', 'belli değil', '2013-05-29 10:46:55', '29.05.13 12:54', 'Shin Woo Chul', ' 2013 -  Güney Kore', 'Hye-Young Jung,Seung-gi Lee,Lee Sung-jae,Su Ji Bae,Yeon-Seok Yoo', 'Bilgi :Yoon Seo Hwa (kahramanımızın annesi) ve Jiri Dağları''nın Koruyucu Tanrısı Gu Wal Ryung (kahramanımızın babası) birbirlerine aşıktırlar. Aşkın bir tarafı Tanrı da olsa aşıklar için düşman her zaman tetikte bekler. Bu hikayede de kahramanımızın anne ve babası düşmanların tuzağına düşerler ve Yoon ailesi için her şey yerle yeksan olur. Yoon Seo Hwa hizmetkarları ile kaçış yolundayken çocuğunun babsı Gu Wal Ryung''un bir kaza sonrası ortadan yok olduğu haberini alır. Bu kaçış sürecinde çocuğunu tek başına büyütemeyeceğini düşünerek belki biri bulur ümidiyle oğlunu bir sepet içinde nehire bırakır. Kang Chi onu nehirde bulan Cho ailesi tarafından büyütürlür. mirage ', 'alperen', '2013-05-29 10:43:00', 79),
(5, '"Baby Daddy" (2012)', '-baby-daddy-2012', 'http://www.batuhanaydin.com/film/resimler/kucuk/5-29_05_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/5-29_05_13-buyuk.jpg', '-500px||http://www.batuhanaydin.com/film/tema/arkaplanlar/5.jpg', 1, ' 6.5/10', 'belli değil', '2013-05-29 10:50:26', '29.05.13 12:59', 'Michael Lembeck', ' 2012 -  Amerika', 'Jean-Luc Bilodeau,Tahj Mowry,Derek Theler,Melissa Peterman,Chelsea Staub,Ali Louise Hartman,Susanne Allan Hartman,Jase Whitaker', 'Bilgi :Ben, bir gün kapısında ayrıldığı kız arkadaşı tarafından bırakılan bir bebek bulur. Ne yapacağını bilemez bir haldeyken, annesi Bonnie, erkek kardeşi Danny, en iyi arkadaşları Tucker ve Riley''in yardımları ile bu sevimli kız bebeğe bakıp, onu büyütmeye karar verir. C.Atakan - beyazperde ', 'alperen', '2013-05-29 10:47:00', 93),
(6, '"Better with You" (2010)', '-better-with-you-2010', 'http://www.batuhanaydin.com/film/resimler/kucuk/6-29_05_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/6-29_05_13-buyuk.jpg', '-670px||http://www.batuhanaydin.com/film/tema/arkaplanlar/6.jpg', 1, ' 6.5/10', 'belli değil', '2013-05-29 10:50:38', '29.05.13 01:08', 'Gary Halvorson', ' 2010 -  Amerika', 'Joanna Garcia,Jennifer Finnigan,Josh Cooke,Jake Lacy,Kurt Fuller,Debra Jo Rupp,Hannah Smith,Jonathan Slavin,Emma Hall,Loanne Bishop,Nick Swisher,Todd Stashwick,Symba,Michael J. Silver,Valorie Hubbard', 'Bilgi :Anne, baba, iki yetişkin kız ve onların erkek arkadaşları&#8230; Bir aile içindeki üç farklı çiftin ilişkileri üzerine kurulan Better With You&#8217;da komik anlar hiç eksik olmayacak. Friends&#8217;in yaratıcılarının en yeni projesi...\n\nBir aile, üç çift, bir sürü sorun... İlişkilerinde farklı aşamalarda bulunan üç çiftin gözünden aşk üzerine keyifli bir komedi. Henüz yedi buçuk haftadır birlikte olan ve cicim aylarını yaşayan Mia ile Casey, 9 yılın üzerine ilişkilerinde alışkanlıklar dönemine giren Maddie ile Ben ve artık 35 yıllık evlilikleriyle her şeyi aşan çift Joel ve Vicky izleyiciye ilişkilerin farklı evrelerini ve farklı hallerini sunacak. Friends&#8217;in yaratıcısından bu sefer bir aile komedisi.\n\nKaynak: cnbce.com ', 'alperen', '2013-05-29 10:47:00', 46),
(7, '"Mad Men" (2007)', '-mad-men-2007', 'http://www.batuhanaydin.com/film/resimler/kucuk/7-29_05_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/7-29_05_13-buyuk.jpg', '0px||http://www.batuhanaydin.com/film/tema/arkaplanlar/7.jpg', 1, ' 8.8/10', 'belli değil', '2013-05-29 10:51:06', '29.05.13 01:06', 'Phil Abraham', ' 2007 -  Amerika', 'Jon Hamm,Elisabeth Moss,Vincent Kartheiser,Christina Hendricks,Aaron Staton,Rich Sommer,John Slattery,January Jones,Robert Morse,Kiernan Shipka,Bryan Batt,Michael Gladis,Jared Harris,Alison Brie,Emelle', 'Bilgi :REKLAMIN ALTIN ÇAĞI, PİYASANIN DAHİ ÇOCUKLARI...ALTIN KÜRE ÖDÜLLÜ MAD MEN.Kim olduğunuzun, ne istediğinizin ya da neyi sevdiğinizin hiçbir önemi yok. Her şey elinizdekini nasıl pazarladığınızla alakalı. İşte The Sopranos''un Emmy ödüllü yapımcı ve yazarı Matthew Weiner''den gerçeğin nasıl satılabileceğine dair kışkırtıcı bir dram. 1960''ların New York''unda geçen Mad Men, sizi herkesin bir şeyler sattığı ve hiçbir şeyin beklentiniz doğrultusunda gerçekleşmediği sürprizlerle dolu bir dünyaya, reklamcılığın güçlü ve görkemli "Altın Çağı"na götürüyor. Egonun hüküm sürdüğü bu dünyada esas oyuncular satış sanatındaki ustalıklarını sergilerken, bazen satışa çıkan kendi özel yaşantıları olacak. Mad Men''de olaylar reklam gurusu Don Draper etrafında dönüyor ama sektörde yerini korumak o kadar kolay değil.Kaynak: e2.tv.tr ', 'alperen', '2013-05-29 10:48:00', 64),
(9, 'Hızlı ve Öfkeli 6 - Fast & Furious 6 (2013)', 'hizli-ve-ofkeli-6-fast-furious-6-2013', 'http://www.batuhanaydin.com/film/resimler/kucuk/9-29_05_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/9-29_05_13-buyuk.jpg', '-600px||http://www.batuhanaydin.com/film/tema/arkaplanlar/9.jpg', 1, ' 7.8/10', '24 Mayıs 2013', '2013-05-29 10:51:55', '29.05.13 12:54', 'Justin Lin', ' 2013 -  Amerika', 'Vin Diesel,Paul Walker,Dwayne Johnson,Jordana Brewster,Michelle Rodriguez,Tyrese Gibson,Sung Kang,Gal Gadot,Ludacris,Luke Evans,Elsa Pataky,Gina Carano,Clara Paget,Kim Kold,Joe Taslim', 'Bilgi :Dom (Diesel) ve Brianın (Walker) Rio soygunu bir liderin imparatorluğunu devirdikten ve ekibe 100 milyon dolar kazandırdıktan sonra, kahramanlarımız dünyanın dört bir tarafına dağılır. Ancak ülkelerine geri dönememeleri ve sonsuza kadar kaçak olarak yaşamaları hayatlarını olumsuz etkilemektedir.Bu sırada, Hobbs (Johnson) ise 12 ülkede oldukça yetenekli bir sürücü örgütünün peşindedir. Bu örgütün başındaki dahi (Evans) Domun öldüğünü sandığı Lettyden (Rodriguez) yardım almaktadır. Bu suçluları durdurmanın tek yolu onları sokakta yenmektir. Bu nedenle Hobbs Domdan elit takımını Londrada yeniden bir araya getirmesini ister. Karşılığında ise onlara af çıkaracaktır ki böylece evlerine geri dönüp ailelerine kavuşabileceklerdir.  ', 'alperen', '2013-05-29 10:48:00', 69),
(10, 'Vazgeçmem Senden - Celeste & Jesse Forever (2012)', 'vazgecmem-senden-celeste-jesse-forever-2012', 'http://www.batuhanaydin.com/film/resimler/kucuk/10-29_05_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/10-29_05_13-buyuk.jpg', '0px||http://www.batuhanaydin.com/film/tema/arkaplanlar/10.jpg', 1, ' 6.5/10', '24 Mayıs 2013', '2013-05-29 10:52:04', '29.05.13 12:46', 'Lee Toland Krieger', ' 2012 -  Amerika', 'Rashida Jones,Andy Samberg,Ari Graynor,Eric Christian Olsen,Rob Huebel,Elijah Wood,Shira Lazar,Will McCormack,Kate Krieger,Matthias Steiner,Andreas Beckett,Chris Messina,Rebecca Dayan,Emma Roberts,Janel Parrish', 'Bilgi :Celeste (Rashida Jones) ve Jesse (Andy Samberg) lisede tanışır, genç yaşta evlenirler. Ama zaman içinde uzaklaşırlar. Şimdi otuzlu yaşlarında olan Celeste medya danışmanlık firmasının sahibidir. Jesse ise yine işsiz kalmıştır ve hayatıyla ilgili bir şey yapma konusunda acele etmemektedir. Celeste Jesse&#8217;den boşanmanın yapılacak en doğru şey olduğuna inanmaya başlar. O kendi yolunda ilerlemekte, Jesse ise aynı yerde saymaktadır. Eğer şimdi boşanırlarsa, arkadaş kalabileceklerdir. Jesse bu arkadaşlığa geçişi pasif bir şekilde kabul eder. Oysa hala Celeste&#8217;ye aşıktır. İşler ciddileşmeye başlayınca, Celeste ilişkilerini küçümsediğini ve doğru olduğunu düşündüğü kararının bencilce olduğunu fark eder. Ama Jesse ile zamanlaması tesadüf bile sayılmaz. ', 'alperen', '2013-05-29 10:49:00', 83),
(11, 'Kral Yolu - Kral yolu - Olba kralligi (2012)', 'kral-yolu-kral-yolu-olba-kralligi-2012', 'http://www.batuhanaydin.com/film/resimler/kucuk/11-29_05_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/11-29_05_13-buyuk.jpg', '', 1, '8.8', '24 Mayıs 2013', '2013-05-29 10:52:16', '', 'Serli Seta Nisanyan', ' 2012 -  Türkiye', 'Nilg&#252;n Belg&#252;n,Betigül Ceylan,Arda Esen,Murat Soydan,Levent S&#252;l&#252;n', 'Bilgi :Anne ve babası arkeolog olan 10-11 yaşlarında bir çocuğun dedesiyle birlikte İstanbul''da başlayıp Erdemli''de devam eden macerası. Helenistik dönem kenti olan Erdemliye bağlı Ayaş beldesindeki Kanlıdivane Antik kentinde bir kazı çalışmasında başlayan, çocukların buldukları harita ile kendilerini karışık bir macera içinde bulmalarıyla devam eden tatlı ve heyecanlı bir film.Gerçeklerle yol alan genel hikâyenin içinde fantastik ögelerde bulunmakta. Olba Krallığı''nın Kraliçesi olan Aba''nın yardımcı karakter olarak kullanıldığı sahneler fantastik sahnelerdir. Film bir bakıma yerli Harry Potter olacak. Baştan sona merakla seyredilecek ve devamı planlanan bir proje. ', 'alperen', '2013-05-29 10:49:00', 122),
(12, 'Sadece Aşk - Den skaldede frisør (2012)', 'sadece-ask-den-skaldede-frisr-2012', 'http://www.batuhanaydin.com/film/resimler/kucuk/12-29_05_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/12-29_05_13-buyuk.jpg', '660px||http://www.batuhanaydin.com/film/tema/arkaplanlar/12.jpg', 1, '', '24 Mayıs 2013', '2013-05-29 10:52:31', '29.05.13 01:04', 'Susanne Bier', ' 2012 -  Danimarka  İsveç  İtalya  Fransa  Almanya', 'Pierce Brosnan,Trine Dyrholm,Kim Bodnia,Paprika Steen,Sebastian Jessen,Molly Blixt Egelind,Stina Ekblad,Bodil J&#248;rgensen,Christiane Schaumburg-Müller,Rikke Louise Andersson,Micky Skeel Hansen,Line Kruse,Birthe Neumann,Philip Zand&#233;n,Ciro Petrone', 'Bilgi :LOVE IS ALL YOU NEED Pierce Brosnan ve Trine Dyrholm''un rol aldığı ve senaryosunu  Susanne Bier ile Anders Thomas Jensen''ın yazdığı sıcak, eğlenceli ve hayatın içinden bir romantik komedi filmidir. Her şeyin bittiğini düşündüğünüzde, aslında her şeyin yeniden başlayacağını anlatan hikayede Susanna Bier aşk, absürtlük, mizah ve kalbe dokunan karakterlerle harikalar yaratıyor.  Birbirinden farklı iki aile limon bahçesinin ortasındaki güzel ve eski bir İtalyan köşkünde buluşurlar. Orada bulunma nedenleri her şeyin en ince detayına kadar planlandığı romantik bir düğündür. Elbette hiçbir şey plana uygun gitmez ancak sonunda her şey tatlıya bağlanır. LOVE IS ALL YOU NEED gerçekten farklı bir hikayesi olan ve izleyen herkese umut verecek nitelikte bir komedi filmi... ', 'alperen', '2013-05-29 10:49:00', 79),
(13, 'Günlerin Köpüğü - L''écume des jours (2013)', 'gunlerin-kopugu-lecume-des-jours-2013', 'http://www.batuhanaydin.com/film/resimler/kucuk/13-29_05_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/13-29_05_13-buyuk.jpg', '600px||http://www.batuhanaydin.com/film/tema/arkaplanlar/13.jpg', 1, ' 5.9/10', '24 Mayıs 2013', '2013-05-29 10:52:43', '29.05.13 12:53', 'Michel Gondry', ' 2013 -  Fransa', 'Romain Duris,Audrey Tautou,Gad Elmaleh,Omar Sy,A&#239;ssa Ma&#239;ga,Charlotte Lebon,Sacha Bourdo,Philippe Torreton,Vincent Rottiers,Laurent Lafitte,Natacha R&#233;gnier,Zinedine Soualem,Alain Chabat,Marina Rozenman,Mathieu Paulus', 'Bilgi :Colin, Chloé ile tanışır ve ona çılgınca âşık olur. Fakat Chloé akciğerinde çıkan nilüfer çiçeği yüzünden hastalanınca, bu masalsı evliliğin seyri değişir. Nilüfer çiçeğini korkutup soldurmak için, Colinin ona çiçekler getirmesi gerekir. Bohem bir hayat yaşayan ve günlerin farklı icatlarını hayata geçirmeye çalışmakla geçiren Colinin dostları para kazanması için ona yardım ederler. Günlerin Köpüğü insanın kaybettikleri ile olduğu kadar kazandıklarıyla da ilgileniyor; film aşk, sadakat, umut ve mizah arasında gidip geliyor. ', 'alperen', '2013-05-29 10:49:00', 60),
(14, 'Evde - Dans la maison (2012)', 'evde-dans-la-maison-2012', 'http://www.batuhanaydin.com/film/resimler/kucuk/14-29_05_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/14-29_05_13-buyuk.jpg', '750px||http://www.batuhanaydin.com/film/tema/arkaplanlar/14.jpg', 1, ' 7.3/10', '24 Mayıs 2013', '2013-05-29 10:52:54', '29.05.13 12:58', 'Fran&#231;ois Ozon', ' 2012 -  Fransa', 'Fabrice Luchini,Ernst Umhauer,Kristin Scott Thomas,Emmanuelle Seigner,Denis Menochet,Bastien Ughetto,Jean-Fran&#231;ois Balmer,Yolande Moreau,Catherine Davenier,Vincent Schmitt,Jacques Bosc,Stéphanie Campion,Diana Stewart,Ronny Pong,Jana Bittnerova', 'Bilgi :16 yaşında bir erkek çocuğu , sinsice sınıf arkadaşlarından birinin evine girer. Fransızca öğretmenine yazdığı kompozisyonlarda da bu olaydan bahseder. Fransızca öğretmeniyse bu yetenekli ve ilginç öğrenci karşısında öğretmenliğin tadını çıkarmaya başlar ve bundan kimseye bahsetmez, fakat bu ihlal başlarına bir çok dert açacağı gibi, bir sürü kontrol edilemeyecek olayın da ortaya çıkmasına yol açar. Filmin yönetmenliğini François Ozon yaparken başrollerini ise Fabrice Luchini, Ernst Umhauer ve Kristin Scott paylaşıyor.  ', 'alperen', '2013-05-29 10:49:00', 60),
(15, 'Zoraki Radikal - The Reluctant Fundamentalist (2012)', 'zoraki-radikal-the-reluctant-fundamentalist-2012', 'http://www.batuhanaydin.com/film/resimler/kucuk/15-29_05_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/15-29_05_13-buyuk.jpg', '-600px||http://www.batuhanaydin.com/film/tema/arkaplanlar/15.jpg', 1, ' 5.7/10', '24 Mayıs 2013', '2013-05-29 10:53:02', '29.05.13 12:38', 'Mira Nair', ' 2012 -  Amerika  İngiltere  ', 'Kate Hudson,Kiefer Sutherland,Liev Schreiber,Nelsan Ellis,Martin Donovan,Riz Ahmed,Adil Hussain,Om Puri,Shabana Azmi,Ashlyn Henson,Christopher Nicholas Smith,Victor Slezak,Haluk Bilginer,Ryan Nesset,Clayton Landey', 'Bilgi :Pakistan''lı bir adam Wall Street''te başarıyı yakalamanın peşinde koşmaktadır. Kendini beklenmedik bir şekilde Amerikan Rüyası''nın, bir düşmanlık krizinin ve ailesinin sürekli çağrısının arasında sıkışmış bulur. Wall Street ve Amerikan rüyasının beklediğimiz ya da düşündüğümüzün aksine o pembe ve hayal dolu görünümünün ardında aslında bir çok vazgeçiş ve geride bırakmayı gerektirdiğini, aslında bu başarının bir çok şeyi de kaybetmek olduğunun üzerinde duruyor film. Filmin yönetmenliğini Mira Nair yapmış , başrollerini ise Liev Schreiber, Kate Hudson ve Kiefer Sutherland paylaşıyor. leşh ', 'alperen', '2013-05-29 10:50:00', 85),
(16, 'Kollarımda Kal - À coeur ouvert (2012)', 'kollarimda-kal-a-coeur-ouvert-2012', 'http://www.batuhanaydin.com/film/resimler/kucuk/16-29_05_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/16-29_05_13-buyuk.jpg', '500px||http://www.batuhanaydin.com/film/tema/arkaplanlar/16.jpg', 1, ' 4.6/10', '24 Mayıs 2013', '2013-05-29 10:53:10', '29.05.13 12:41', 'Marion Laine', ' 2012 -  Fransa  Arjantin', 'Juliette Binoche,&#201;dgar Ram&#237;rez,Hippolyte Girardot,Amandine Dewasmes,Aur&#233;lia Petit,Bernard Verley,Elsa Tauveron,Romain Rondeau,Florence Huige,Jacques Mateu,Arrigo Lessana,Céline Jorrion,Bruno Blairet,Benhaïssa Ahouari,Gaël Lepingle', 'Bilgi :Kalp cerrahı olan Mila ve Javier 10 yıldır evlidirler. İnsanların kalplerini ellerine aldıkları ameliyat odasının dışında bohem bir hayat sürüyorlar. Bütün zevkler, seks, partiler, alkol, hayvanat bahçesi gezintileri, gece gezmeleri, motosiklet turları... Fakat Mila hamile kalır ve birbirleriyle kafa kafaya vererek kurdukları denge bozulur. Kadın hiç bir zaman çocuk istememiştir ama şüpheleri vardır. Adam zaten çok içiyordur ve daha da çok içmeye başlar. Çift çok derinden sarsılır ve bir sürü bağırış çağırışla büyük bir düşüş başlar... Fransız oyuncu Marion Laine''nin yönetmenliğini üstlendiği ikinci uzun metrajlı filmi olan yapımın başrollerinde güzel yıldız Juliette Binoche ve Édgar Ramírez yer alıyor... ', 'alperen', '2013-05-29 10:50:00', 85),
(17, 'Bir Şarkının Peşinde - Searching for Sugar Man (2012)', 'bir-sarkinin-pesinde-searching-for-sugar-man-2012', 'http://www.batuhanaydin.com/film/resimler/kucuk/17-29_05_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/17-29_05_13-buyuk.jpg', '450px||http://www.batuhanaydin.com/film/tema/arkaplanlar/17.jpg', 1, ' 8.1/10', '24 Mayıs 2013', '2013-05-29 10:53:29', '29.05.13 12:43', 'Malik Bendjelloul', ' 2012 -  İsveç  İngiltere', 'Stephen ''Sugar'' Segerman,Dennis Coffey,Mike Theodore,Dan Di Maggio,Jerome Ferretti,Steve Rowland,Willem Möller,Craig Bartholomew-Strydom,Ilse Assmann,Steve M. Harris,Robbie Mann,Clarence Avant,Eva Rodriguez,Rodriguez,Regan Rodriguez', 'Bilgi :1970li yılların başında geçen filmde, Sixto Rodriguez takdir edilmiş ama iyi satmamış iki albümü olan Detroitli bir folk şarkıcısıdır. Ancak Rodriguezin bilmediği bir şey vardır: müzik kariyeri Güney Afrikada aktif olarak devam etmektedir. Orada bir pop müzik ikonu ve genç nesillerin ilham kaynağı olmuştur.  ', 'alperen', '2013-05-29 10:50:00', 77),
(18, 'Kara Şövalye - The Dark Knight (2008)', 'kara-sovalye-the-dark-knight-2008', 'http://www.batuhanaydin.com/film/resimler/kucuk/18-29_05_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/18-29_05_13-buyuk.jpg', '-600px||http://www.batuhanaydin.com/film/tema/arkaplanlar/18.jpg', 1, ' 8.9/10', '25 Temmuz 2008', '2013-05-29 10:53:35', '29.05.13 12:45', 'Christopher Nolan', ' 2008 -  Amerika  İngiltere', 'Christian Bale,Heath Ledger,Aaron Eckhart,Michael Caine,Maggie Gyllenhaal,Gary Oldman,Morgan Freeman,Monique Curnen,Ron Dean,Cillian Murphy,Chin Han,Nestor Carbonell,Eric Roberts,Ritchie Coster,Anthony Michael Hall', 'Bilgi :"Batman Begins / Batman Başlıyor"da, Batman suça karşı savaşını daha da ileriye götürüyor: Teğmen Jim Gordon ve Bölge Savcısı Harvey Dent''in yardımlarıyla, Batman, şehir sokaklarını sarmış olan suç örgütlerinden geriye kalanları temizlemeye girişir. Bu ortaklığın etkili olduğu açıktır, ama ekip kısa süre sonra kendilerini, Joker olarak bilinen ve Gotham şehri sakinlerini daha önce de dehşete boğmuş olan suç dehasının yarattığı karmaşanın ortasında bulurlar. ', 'alperen', '2013-05-29 10:50:00', 105),
(19, 'Devrim - "Revolution" (2012)', 'devrim-revolution-2012', 'http://www.batuhanaydin.com/film/resimler/kucuk/19-29_05_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/19-29_05_13-buyuk.jpg', '-670px||http://www.batuhanaydin.com/film/tema/arkaplanlar/19.jpg', 1, ' 6.5/10', 'dizi', '2013-05-29 10:54:48', '29.05.13 12:36', 'Steve Boyum', ' 2012 -  Amerika', 'Billy Burke,Tracy Spiridakos,Giancarlo Esposito,Zak Orth,J.D. Pardo,David Lyons,Elizabeth Mitchell,Graham Rogers,Daniella Alonso,Robert Gregory Cole,David Meunier,Tim Guinee,Anna Lise Phillips,Maria Howell,Shane Callahan', 'Bilgi :Elektriğin var olmadığı bir dünyada ne yapardınız? Lost, Alias ve Person of Interest gibi dizilerle televizyon dünyasının en önemli isimlerinden birine dönüşen J.J. Abrams ile Eric Kripke&#8217;nin ortak imzasını taşıyan Revolution, bu sorudan yola çıkıyor.\n\nBilgisayarların, uçakların, telefonların, hatta aydınlatmanın dahi olmadığı, dünyanın sonsuza dek karanlığa gömüldüğü bir gelecekte hayatta kalma mücadelesine girişen insanların öyküsüne odaklanan Revolution, aynı zamanda aile olmanın anlamını da sorgulayacak.\nDizinin başkarakteri Charlie Matheson, fiziğiyle olduğu kadar karakteriyle de oldukça güçlü genç bir kız. 15 yıl önce elektrikle çalışan bütün aletlerin birdenbire durmasıyla başlayan kaotik ortamda sağ kalmayı başaran babası ve erkek kardeşiyle birlikte yaşamını sürdürürken kendini hiç beklemediği olayların içinde buluyor. Erkek kardeşi Danny milis kuvvetleri tarafından kaçırılıyor. Babası, Charlie&#8217;den uzun zamandır görüşmediği eski bir asker olan amcası Miles&#8217;ı bulmasını ve kardeşini kurtarmasını istiyor. Birkaç arkadaşıyla yola koyulan Charlie önce amcasını buluyor, onu ikna etmeyi başardıktan sonra kardeşini kurtarmak üzere yola koyuluyor.\n\nKaynak: cnbce.com ', 'alperen', '2013-05-29 10:51:00', 109),
(20, 'Demir Adam 3 - Iron Man 3 (2013)', 'demir-adam-3-iron-man-3-2013', 'http://www.batuhanaydin.com/film/resimler/kucuk/20-29_05_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/20-29_05_13-buyuk.jpg', '-550px||http://www.batuhanaydin.com/film/tema/arkaplanlar/20.jpg', 1, ' 7.7/10', '03 Mayıs 2013', '2013-05-29 10:55:05', '29.05.13 12:03', 'Shane Black', ' 2013 -  Amerika  Çin', 'Robert Downey Jr.,Gwyneth Paltrow,Don Cheadle,Guy Pearce,Rebecca Hall,Jon Favreau,Ben Kingsley,James Badge Dale,Stephanie Szostak,Paul Bettany,William Sadler,Dale Dickey,Ty Simpkins,Miguel Ferrer,Xueqi Wang', 'Bilgi :Marvel Stüdyoları''nın sunduğu Iron Man 3 küstah ama çok zeki sanayici Tony Stark/Iron Man''i gücü sınırsız bir düşmanla karşı karşıya getiriyor. Stark özel dünyasının düşmanının ellerinde altüst olduğunu görünce, bu durumdan sorumlu olanı bulmak için bir yolculuğa çıkıyor. Bu yolculuk, her adımda onun azmini sınıyor. Köşeye sıkışan Stark kendi yöntemleriyle hayatta kalmak zorundadır. Çevresindekileri korumak için yeteneklerine ve içgüdülerine güvenmek zorunda kalır. Çıktığı bu yolda mücadele ederken, Stark gizli gizli peşini bırakmayan bir sorunun da cevabını bulur: zırh mı karakteri yaratıyor, karakter mi zırhı? Robert Downey Jr., Gwyneth Paltrow, Don Cheadle, Guy Pearce, Rebecca Hall, Stephanie Szostak, James Badge Dale, Jon Favreau ve Ben Kingsley gibi oyuncuların rol aldığı Iron Man 3&#8217;ün yönetmenliğini Shane Black, senaristliğini Drew Pearce ve Shane Black üstlenmektedir. Film Marvel&#8217;ın ilk defa 1963 yılında Tales of Suspense&#8217;in sayfalarında yayınlanmış ve Mayıs 1968&#8217;de The Invincible Iron Man ile ilk solo çizgi romanı çıkan ikonik süper kahramanı Demir Adam hikayesinden uyarlanmıştır.Iron Man 3 Paramount Pictures ve DMG Entertainment ortaklığıyla Marvel Stüdyoları tarafından yapılmıştır. Marvel Stüdyoları Başkanı Kevin Feige filmin yapımcılığını, Jon Favreau, Louis D&#8217;Esposito, Stephen Broussard, Victoria Alonso, Alan Fine, Charles Newirth, Stan Lee ve Dan Mintz ise idari yapımcılığını üstlenmektedir. Film 3 Mayıs 2013&#8217;te vizyona girecek ve dağıtımı Walt Disney Studios Motion Pictures tarafından gerçekleştirilecektir. ', 'alperen', '2013-05-29 10:52:00', 109),
(21, '"Continuum" (2012)', '-continuum-2012', 'http://www.batuhanaydin.com/film/resimler/kucuk/21-29_05_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/21-29_05_13-buyuk.jpg', '-700px||http://www.batuhanaydin.com/film/tema/arkaplanlar/21.jpg', 1, ' 7.7/10', 'belli değil', '2013-05-29 10:55:16', '29.05.13 12:06', 'Pat Williams', ' 2012 -  Amerika  Kanada', 'Rachel Nichols,Victor Webster,Erik Knudsen,Stephen Lobo,Jennifer Spence,Richard Harmon,Lexa Doig,Omari Newton,Brian Markinson,Roger R. Cross,Luvia Petersen,Tony Amendola,John Reardon,Janet Kidder,Michael Rogers', 'Bilgi :Kanada yapımı bilim kurgu dizi; 2077 yılından bir dedektifin idamdan kaçan azılı suçluları 2012 yılına takip etmesini konu alıyor. Dedektif Kiera Cameron bir polis dedektifinin kimliğine bürünerek yerel polis departmanına katılıyor. Ancak yeni ortağı Carlos Fonegra ile pek de anlaşamıyor. Onun yerine yardımına dahi teknoloji uzmanı Alec Sadler koşuyor. Yapımın yanıtını aradığı soru "Geleceği mi değiştireceksiniz yoksa geçmişi mi koruyacaksınız?" Kocası ve oğluna kavuşma amacındaki bir dedektif için bu sorunun yanıtı o kadar kolay olmasa gerek.Kiera''yı Rachel Nichols canlandıracak. Kadroda ayrıca Castle''dan Victor Webster, Jericho''dan hatırlayacağınız Erik Knudsen, The Killing kadrosundan Richard Harmon veBrian Markinson, Alcatraz''dan Jennifer Spence yer alıyor. WhiteJAWS - Arzachel ', 'alperen', '2013-05-29 10:52:00', 75),
(22, '"Da Vinci''s Demons" (2013)', '-da-vincis-demons-2013', 'http://www.batuhanaydin.com/film/resimler/kucuk/22-29_05_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/22-29_05_13-buyuk.jpg', '-600px||http://www.batuhanaydin.com/film/tema/arkaplanlar/22.png', 1, ' 8.0/10', 'belli değil', '2013-05-29 10:55:32', '29.05.13 12:16', 'Michael J. Bassett', ' 2013 -  Amerika', 'Tom Riley,Laura Haddock,Ian Pirie,Eros Vlahos,Gregg Chillin,Lara Pulver,Tom Bateman,Hera Hilmarsd&#xF3;ttir,Elliot Levey,Ross O''Hennessey,Blake Ritson,Allan Corduner,Tim Faraday,Elliot Cowan,Paul Westwood', 'Bilgi :Yapımcılığını Batman ve Blade serilerinden tanıdığımız David S. Goyer''ın üstlendiği dizide Tom Riley ve Laura Haddock başrollerde yer alıyor. Leonardo Da Vinci''nin sır gibi saklanan gençliğinin konu alındığı dizide insanüstü zekaya sahip genç bir adam ile karşılaşıyoruz. 25 yaşında geleceği şekillendirmeye ve özgür kılmaya çalışan Leonardo; tarihi yalnızca gerçekleri örtbas etmek için kullananlara karşı, silah olarak sadece zekasını kullandığı bir savaş başlatıyor. Tek başına mücadele verdiği bu savaşta aklını yitirmenin sınırlarına yaklaşırken gerçek ve yalan, geçmiş ve gelecek gibi olgular arasındaki çelişkileri çözmeye uğraşıyor. luna - fxtv.com.tr ', 'alperen', '2013-05-29 10:52:00', 141),
(23, 'Sıcak Kalpler - Warm Bodies (2013)', 'sicak-kalpler-warm-bodies-2013', 'http://www.batuhanaydin.com/film/resimler/kucuk/23-29_05_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/23-29_05_13-buyuk.jpg', '300px||http://www.batuhanaydin.com/film/tema/arkaplanlar/23.jpg', 1, ' 7.4/10', '05 Nisan 2013', '2013-05-29 10:55:46', '29.05.13 12:22', 'Jonathan Levine', ' 2013 -  Amerika', 'Nicholas Hoult,Teresa Palmer,Analeigh Tipton,Rob Corddry,Dave Franco,John Malkovich,Cory Hardrict,Daniel Rindress-Kay,Vincent Leclerc,Clifford LeDuc-Vaillancourt,Billie Calmeau,Adam Driscoll,Chris Cavener,Jonathan Dubsky,Alec Bourgeois', 'Bilgi :İşkence görmüş zombi (Nicholas Hoult) yürüyen ölüleri öldürmekle görevli bir asker olan kızıyla (Teresa Palmer) yaşadığı sıradışı bir ilişkinin ardından derin bir dönüşüme uğrar... Canlı ve ölünün kurduğu zayıf iletişim köprüsü bir yanda, kavganın iki tarafındakiler de dünyanın bir daha asla eskisi gibi olamayacağını kavrar. Warm Bodies Isaac Marion''un romanına dayanan bir öykü... Rob Corddry ve John Malkovich de oyuncular arasında...Zombiler insanları sever, özellikle de insanların beyinlerini. Ama R (Nicholas Hault) diğer zombilerden farklı. Geride kalanları sağlam bir şekilde korunan bir şehre gönderen bir salgının kurbanları olan hırıldayan, ağzı sulanan diğer zombilerin aksine R içinde canlıdır. Zombiler artık bir havaalanında dolanıyor, insan arayarak kendilerinden bir sonraki aşama olan tehlikeli Boneylerin korkusuyla yaşıyorlardır.Bir gün R ve en iyi arkadaşı M yemek bulmak için şehre doğru gider. Orada R güzel bir kadın olan Julieyi (Teresa Palmer) görür. Julieyi once diğer zombilerden sonra da Boneylerden kurtarmaya karar veren R onu kendi evinde, darmadağın olmuş bir 747 uçağında saklar. Julie korkuyordur. Rnin güvenilir homurdanmaları biraz olsun Julieyi sakinleştirmiştir. Ama R Julieyi savunmaya, insan eti yemeyi reddetmeye ve hatta daha düzgün konuşmaya kısacası zombiden çok insan gibi davranmaya başlayınca, Julie Rnin özel biri olduğunu anlar.Boneylerle yaşanan birkaç olaydan ve babasının kendisi için arama çalışmaları başlattığını öğrendikten sonra Julie sonsuza kadar saklanamayacağını anlar. Bunun üzerine Ryi arkasında bırakarak evden ayrılır. Julieyi yeniden görmek için sabırsızlanan R saçlarını tarar, daha dik durmaya çalışır ve şehir muhafızlarını geçene kadar normal bir insan gibi davranır. Eğer insanlara zombilerin değişebileceğini kanıtlarsa, belki Julie ile bir şansı olabilecektir. Ama öfkeli Boneylerin şehre saldırması ve Julienin babasının R ve arkadaşlarını öldürmek istemesi her şeyi değiştirir ve ölülerle canlılar arasında bir savaşa zemin hazırlar.\nDiğerlerinden farklı bir aşk ve dönüşüm hikayesi olan WARM BODIES bir kıza deli gibi aşık olan bir gencin öyküsünü anlatıyor. ', 'alperen', '2013-05-29 10:52:00', 135),
(24, 'Acı Reçete - Side Effects (2013)', 'aci-recete-side-effects-2013', 'http://www.batuhanaydin.com/film/resimler/kucuk/24-29_05_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/24-29_05_13-buyuk.jpg', '650px||http://www.batuhanaydin.com/film/tema/arkaplanlar/24.jpg', 1, ' 7.4/10', '26 Nisan 2013', '2013-05-29 10:55:54', '29.05.13 12:33', 'Steven Soderbergh', ' 2013 -  Amerika', 'Rooney Mara,Carmen Pelaez,Marin Ireland,Channing Tatum,Polly Draper,Haraldo Alvarez,Jude Law,James Martinez,Vladimi Versailles,Jacqueline Antaramian,Michelle Vergara Moore,Catherine Zeta-Jones,Katie Lowes,David Costabile,Mamie Gummer', 'Bilgi :SIDE EFFECTS Emily ve Martinin (Rooney Mara ve Channing Tatum), hikayesini anlatan psikolojik bir yapım. Emily ve Martin New Yorklu bir çifttir ancak Emilynin psikiyatristinin (Jude Law) anksiyete hastalığını tedavi etmek için yazdığı yeni bir ilaçla hayatları değişir. ', 'alperen', '2013-05-29 10:52:00', 109),
(26, 'Garip Komşular - Small Apartments (2012)', 'garip-komsular-small-apartments-2012', 'http://www.batuhanaydin.com/film/resimler/kucuk/26-29_05_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/26-29_05_13-buyuk.jpg', '-600px||http://www.batuhanaydin.com/film/tema/arkaplanlar/26.jpg', 1, ' 5.8/10', 'belli değil', '2013-05-29 10:56:09', '29.05.13 11:37', 'Jonas &#197;kerlund', ' 2012 -  Amerika', 'Matt Lucas,Nugget,James Caan,Juno Temple,Saffron Burrows,Johnny Knoxville,Dolph Lundgren,Rebel Wilson,James Marsden,DJ Qualls,Peter Stormare,Tara Holt,Noel Gugliemi,David Koechner,Scott Sheldon', 'Bilgi :Kolpa bir adam yanlışlıkla ev sahibini öldürünce, cesedi saklamak için elinden gelen her şeyi yapmak zorundadır. Ancak daha sonra şehvetin dikkatini dağıtması, çok sevdiği kardeşinin ölümü ve bir grup uyumsuz karakter onu kendisini bir servetin beklediği bir yolculuğa sürükler. ', 'alperen', '2013-05-29 10:53:00', 148),
(27, 'Parker - Parker (2013)', 'parker-parker-2013', 'http://www.batuhanaydin.com/film/resimler/kucuk/27-29_05_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/27-29_05_13-buyuk.jpg', '500px||http://www.batuhanaydin.com/film/tema/arkaplanlar/27.jpg', 1, ' 6.2/10', '25 Ocak 2013', '2013-05-29 10:56:18', '29.05.13 11:53', 'Taylor Hackford', ' 2013 -  Amerika', 'Jason Statham,Jennifer Lopez,Michael Chiklis,Wendell Pierce,Clifton Collins Jr.,Bobby Cannavale,Patti LuPone,Carlos Carrasco,Micah A. Hauptman,Emma Booth,Nick Nolte,Daniel Bernhardt,Billy Slaughter,John Eyes,Carl J. Walker', 'Bilgi :Jason Statham ve Jennifer Lopez, Donald E. Westlake&#8217;in çok satan roman serisinde uyarlanan PARKER&#8217;da başroldeler! Parker (Jason Statham) kişisel ahlak kuralları olan profesyonel bir hırsızdır. Bu kurallardan bazıları şunlardır: Hırsızlığın altından kalkamayacak insanlardan hiçbir şey çalma, hak etmeyen insanlara acı çektirme. Ancak son soygununda, ekibi onu aldatır ve parasını çalarak onu ölüme terk eder.Eski çalışma arkadaşlarının böyle bir şey yaptıklarına pişman olmasını sağlamak isteyen Parker onları zengin ve ünlülerin oyun alanı olan ve ekiptekilerin en büyük soygunu yapmayı planladıkları Palm Beach&#8217;e kadar takip eder. Zengin bir Teksaslı kılığına giren Parker yanına bilgili birini alır: Leslie (Jennifer Lopez). Leslie maddi sıkıntı yaşayan ama güzel, akıllı ve hırslı bir kadındır. Parker ve Leslie soygunda çalınacak parayı çalmak ve daha sonra ortadan kaybolmak için bir plan yaparlar.PARKER&#8217;ın yönetmenliğini Oscar adayı Taylor Hackford (&#8220;Ray&#8221;) üstleniyor. Filmde Lopez ve Statham dışında, Michael Chiklis, Wendell Pierce (&#8220;The Wire&#8221;) ve Oscar adaylığına sahip oyuncu Nick Nolte. ', 'alperen', '2013-05-29 10:53:00', 156),
(28, '"Hemlock Grove" (2013)', '-hemlock-grove-2013', 'http://www.batuhanaydin.com/film/resimler/kucuk/28-29_05_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/28-29_05_13-buyuk.jpg', '240px||http://www.batuhanaydin.com/film/tema/arkaplanlar/28.jpg', 1, ' 7.1/10', 'belli değil', '2013-05-29 10:56:30', '29.05.13 11:58', 'Deran Sarafian', ' 2013 -  Amerika', 'Famke Janssen,Penelope Mitchell,Freya Tingley,Lili Taylor,Bill Skarsgård,Landon Liboiron,Dougray Scott,Nicole Boivin,Joel de la Fuente,Aaron Douglas,Laurie Fortier,Eliana Jones,Emilia McCarthy,Marty Adams,Emily Piggford', 'Bilgi :Pennsylvania''nın küçük bir kasabasında genç bir kızın parçalanmış halde bulunan cesedinin sorumlusu olarak bir kurt adamın görülmesi, kasabada büyük korku yaratır. Katili bulmak için yola koyulan Roman, aynı zamanda cinayetin şüphelilerinden de biridir. Cabin Fever, Hostel, Hostel: Part II ve The Last Exorcism gibi bir çok yapımla korku fanlarının yakından tanıdığı bir isim olan Eli Roth''un yapımcı ve yönetmen olarak imza attığı dizi 13 bölümden oluşuyor. Netflix''de yayınlanacak olan dizi Brian McGreevy''nin romanından uyarlanmış. luna - beyazperde ', 'alperen', '2013-05-29 10:53:00', 79),
(32, 'Oblivion İzle', 'oblivion-izle', 'http://www.batuhanaydin.com/film/resimler/kucuk/32-21_06_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/32-21_06_13-buyuk.jpg', '||', 1, '7.1/10', 'bulunamadı', '2013-06-21 12:17:04', '21.06.13 12:21', '  Joseph Kosinski', 'ı  2013 &#8211; ABD', '  Morgan Freeman , Tom Cruise , Olga Kurylenko , Nikolaj Coster-Waldau , Melissa Leo', 'Konusu:Profesyonel bir asker olan Jack üst yönetim tarafından isyancıların sürekli olay çıkardığı bir bölgeye görevlendirilir.. İyi seyirler..', 'alperen', '2013-06-21 12:12:00', 99),
(64, 'Küçük Dahi: Vitus İzle', 'kucuk-dahi-vitus-izle', 'http://www.batuhanaydin.com/film/resimler/kucuk/64-14_07_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/64-14_07_13-buyuk.jpg', '||', 2, '7.5/10', 'bulunamadı', '2013-07-14 02:01:55', '14.07.13 02:02', ' Fredi M. Murer', ' 2006 ~ İsviçre', ' Bruno Ganz ,  Julika Jenkins ,  Eleni Haupt ,  Fabrizio Borsani ,  Kristina Lykowa', 'Konusu:Vitus başka bir gezegenden gelmiş gibidir. Beş yaşındaki bu oğlan duvar gibi sağırdır, mükemmel piyano çalar ve ansiklopedi okumaya bayılır. Anne-babasının geleceği hakkında planlar yapması pek de şaşırtıcı değildir. Onlar Vitus’ün piyanist olmasını ister. Ama küçük dahi, tuhaf büyükbabasının atölyesinde oynamayı tercih eder. Normal bir çocuk olmayı ve uçmayı düşler. Sonunda, herkesi şaşırtan bir hamleyle, hayatının dizginlerini kendi ellerine alıverir&#8230; 2006 Oscar’larına İsviçre’nin aday adayı olan bu zekice kurgulanmış, duygusal komedide Mozart, Scarlatti, Liszt, Schumann ve Bach’ın eserleri var; çalan da başroldeki çocuk oyuncu Teo Gheorghiu. İyi seyirler.', 'alperen', '2013-07-14 13:00:00', 10),
(65, 'Kanlı Nehir - Red River İzle', 'kanli-nehir-red-river-izle', 'http://www.batuhanaydin.com/film/resimler/kucuk/65-14_07_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/65-14_07_13-buyuk.jpg', '', 2, '7.8/10', 'bulunamadı', '2013-07-14 02:02:36', '', '  Howard Hawks', 'ı  1948 &#8211; ABD', '  John Wayne , Montgomery Clift , Coleen Gray , John Ireland , Walter Brennan', 'Part 2', 'alperen', '2013-07-14 14:03:00', 12),
(66, 'Watch Full Night of the Living Dead: Resurrection İzle', 'watch-full-night-of-the-living-dead-resurrection-izle', 'http://www.batuhanaydin.com/film/resimler/kucuk/66-14_07_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/66-14_07_13-buyuk.jpg', '', 1, '2.9/10', 'bulunamadı', '2013-07-14 02:02:39', '', 'James Plumb', 'ı  2012 &#8211; İngiltere', ' Sarah Louise Madison, Sabrina Dickens, Richard Goss', 'Part 2', 'alperen', '2013-07-14 14:03:00', 9),
(67, 'The Devil You Know İzle', 'the-devil-you-know-izle', 'http://www.batuhanaydin.com/film/resimler/kucuk/67-14_07_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/67-14_07_13-buyuk.jpg', '', 1, '4.8/10', 'bulunamadı', '2013-07-14 02:02:43', '', 'James Oakley', 'ı  2013 &#8211; ABD', ' Jennifer Lawrence, Rosamund Pike, Lena Olin', 'Part 2', 'alperen', '2013-07-14 14:03:00', 8),
(68, 'Silahşörü Destekleyin – Support Your Local Gunfighter İzle', 'silahsoru-destekleyin-support-your-local-gunfighter-izle', 'http://www.batuhanaydin.com/film/resimler/kucuk/68-14_07_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/68-14_07_13-buyuk.jpg', '', 2, '6.8/10', 'bulunamadı', '2013-07-14 02:02:45', '', '  Burt Kennedy', 'ı  1971 &#8211; ABD', '  James Garner , Jack Elam , Henry Jones , Joan Blondell , Marie Windsor', 'Part 2', 'alperen', '2013-07-14 14:03:00', 10),
(69, 'Maskeli Süvari - The Lone Ranger İzle', 'maskeli-suvari-the-lone-ranger-izle', 'http://www.batuhanaydin.com/film/resimler/kucuk/69-14_07_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/69-14_07_13-buyuk.jpg', '', 2, '6,7/10', 'bulunamadı', '2013-07-14 02:03:02', '', '  Gore Verbinski', ' 2013 &#8211; ABD', '  Johnny Depp, Armie Hammer, William Fichtner, Helena Bonham Carter, James Badge Dale', 'Filmin Konusu: Vahşi Batı eyaletlerinde işlediği cinayetler ve zulümlerle azılı bir haydut olarak nam salmış Butch Cavendish, idama mahkum edilmiştir. Tren yolu açılış töreninde halka armağan olarak asılmasına karar verilir fakat bulunduğu trenden kaçmayı başarır. Peşine takılanları bir bir pusuya düşüren Cavendish''in önünde kimse kalmamıştır. Adalet için savaşan, gizemli maskeli süvari ve Kızılderili Tonto dışında..', 'alperen', '2013-07-14 14:02:00', 11),
(70, 'Suç Sınırı İzle', 'suc-siniri-izle', 'http://www.batuhanaydin.com/film/resimler/kucuk/70-14_07_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/70-14_07_13-buyuk.jpg', '', 2, '4,1/10', 'bulunamadı', '2013-07-14 02:03:06', '', ' Gabriela Tagliavini', '  2012 &#8211; ABD', ' Sharon Stone, Billy Zane, Rosemberg Salgado, Miguel Rodarte, Giovanna Zacarías', 'Filmin Konusu: Hırslı bir gazeteci olan Sofie, yasadışı göç sorunuyla savaşıyor gözükürken aslında bu olayın perde arkasında çalışan politikacıları halka açıklamaya karar verir. Bu planından haberdar olan bir grup, kardeşi Aaron''u kaçırırlar. Kardeşinin hayatta olup olmadığından habersiz bir şekilde suç, insan kaçırma ve şiddetin sürekli yaşandığı Amerika- Meksika sınırında kardeşini aramaya başlar.', 'alperen', '2013-07-14 14:02:00', 10),
(71, 'William and Kate İzle', 'william-and-kate-izle', 'http://www.batuhanaydin.com/film/resimler/kucuk/71-14_07_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/71-14_07_13-buyuk.jpg', '', 2, '4,5/10', 'bulunamadı', '2013-07-14 02:03:09', '', '  Mark Rosman', ' 2011 &#8211; ABD, İngiltere', '  Ben Cross, Serena Scott Thomas, Mary Elise Hayden, Trilby Glover, Christopher Cousins', 'Filmin Konusu: Prens Charles''ın en büyük oğlu Prens William, İskoçya''nın en köklü üniversitesinde okuyan tek kraliyet mensubudur. Trafik kazasında kaybettiği annesinden sonra, yaptığı saygısızlıktan dolayı basın ile ilişkilerini kesmiştir. İşadamı Michael Middleton''ın kızı Kate ile tanışır ve çift evlilikle sonlanacak bir ilişkiye başlar. Film, William ve Kate''in ilişkisini konu alan gerçek yaşam öykülerinden uyarlanmıştır.', 'alperen', '2013-07-14 14:02:00', 10),
(72, '12 Tuzak 2: Kanunsuz - 12 Rounds: Reloaded İzle', '12-tuzak-2-kanunsuz-12-rounds-reloaded-izle', 'http://www.batuhanaydin.com/film/resimler/kucuk/72-14_07_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/72-14_07_13-buyuk.jpg', '', 2, ',3 /10', 'bulunamadı', '2013-07-14 02:03:13', '', ' Roel Reiné', ' 2013 &#8211; ABD', ' Brian Markinson, Randy Orton, Cindy Busby, Sean Rogerson, Patrick Gilmore', 'Filmin Konusu: Sağlık çalışanı olan Nick Malloy, geçmişten beri peşini bırakmayan intikam dolu bir psikopatla telefon görüşmesi yapar ve kendini bir kovalamacanın içinde bulur. Karısının hayatı tehlike altındadır ve Nick, geç olmadan gizemli ipuçlarını çözüp katili yakalamak zorundadır.', 'alperen', '2013-07-14 14:02:00', 9),
(73, 'Büyük Umutlar - Great Expectations İzle', 'buyuk-umutlar-great-expectations-izle', 'http://www.batuhanaydin.com/film/resimler/kucuk/73-14_07_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/73-14_07_13-buyuk.jpg', '', 2, '6,2/10', 'bulunamadı', '2013-07-14 02:03:16', '', ' Mike Newell', ' 2012 &#8211; ABD, İngiltere', ' Helena Bonham Carter, Ralph Fiennes, Robbie Coltrane, Jason Flemyng, Jessie Cave', 'Filmin Konusu: Genç ve öksüz Pip, bir hayırseverin yardımı ile hayatta yeni bir şans yakalar.  Londra''nın sınıfsal sisteminde yükselmeye başlayan Pip, çocukluktan beri aşık olduğu şımarık Estella''yı elde etmeye çalışır. Pip, kazandığı servetin arkasındaki gerçeği öğrenince , hayatta değer verdiği herşeyin sarsılmasına neden olur. Charles Dickens'' ın sevilen romanından uyarlanan filmin yönetmen koltuğunda Mike Newell oturuyor.', 'alperen', '2013-07-14 14:02:00', 9),
(74, 'Yılbaşı Postası - Christmas Mail İzle', 'yilbasi-postasi-christmas-mail-izle', 'http://www.batuhanaydin.com/film/resimler/kucuk/74-14_07_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/74-14_07_13-buyuk.jpg', '', 2, '5,3/10', 'bulunamadı', '2013-07-14 02:03:20', '', ' John Murlowski', ' 2010 &#8211; ABD', ' Ashley Scott, A.J. Buckley, Lochlyn Munro, Vanessa Lee Evigan, Lisa Long', 'Filmin Konusu: Yaklaşan Noel''le birlikte postacı Matt, Kristi adlı bir kadınla tanışır. Kristi''nin yaptığı iş, çocukların Noel Baba''ya yazdıkları mektupları cevaplamak, bir nevi resmi Noel yazarlığı yapmaktır. Ancak patronu gizli kalması gereken kimliğinden şüpheye düşünce Kristi''yi takip etmesi için Matt''i görevlendirir. Matt, bu sırada Kristi''ye aşık olur. Kristi ise Matt''in mesleğini öğrenince hem işinden hem de Matt''ten ayrılır.', 'alperen', '2013-07-14 14:02:00', 10),
(75, 'Demir Adam 2 - Iron Man 2 İzle', 'demir-adam-2-iron-man-2-izle', 'http://www.batuhanaydin.com/film/resimler/kucuk/75-14_07_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/75-14_07_13-buyuk.jpg', '', 2, '7,1/10', 'bulunamadı', '2013-07-14 02:05:05', '', '  Jon Favreau', ' 2010 &#8211; ABD', '  Robert Downey Jr., Scarlett Johansson, Samuel L. Jackson, Gwyneth Paltrow, Paul Bettany', 'Filmin Konusu: Tony Stark''ın zırhlı Süper Kahraman Iron Man olduğu tüm dünyaca bilinmektedir. Teknolojisini orduyla paylaşması için hükümetten, basından ve halktan baskı görür. Fakat Stark, bu bilgilerin yanlış ellere geçmesinden korktuğu için, Iron Man zırhının sırrını açıklamak istemez. Stark, yeni ittifaklar kurarak büyük güçlerle yüzleşir.', 'alperen', '2013-07-14 14:00:00', 9),
(76, 'Cennet Yolculuğu İzle', 'cennet-yolculugu-izle', 'http://www.batuhanaydin.com/film/resimler/kucuk/76-14_07_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/76-14_07_13-buyuk.jpg', '', 2, '7,0/10', 'bulunamadı', '2013-07-14 02:05:49', '', ' Simon Brand', ' 2007 &#8211; ABD, Kolombiya', ' John Leguizamo, Ana De La Reguera, Aldemar Correa, Chiko Mendez, Germán Jaramillo', 'Filmin Konusu: Kolombiya''da yaşayan Marlon Cruz''u, kız arkadaşı Reina maceraya atılmaya ikna eder. Guatemala ve Meksika''yı aşarak kaçak yollarla Amerika''ya gideceklerdir. Bu uzun ve zorlu yolculuk, iki genç için unutamayacakları bir macera olacaktır.', 'alperen', '2013-07-14 14:00:00', 8),
(77, 'Tanrının Ofisi İzle', 'tanrinin-ofisi-izle', 'http://www.batuhanaydin.com/film/resimler/kucuk/77-14_07_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/77-14_07_13-buyuk.jpg', '', 2, '5,7/10', 'bulunamadı', '2013-07-14 02:06:09', '', '  Claire Simon', 'ı  2008 &#8211; Belçika, Fransa', '  Béatrice Dalle, Isabelle Carre, Rachida Brakni, Nathalie Baye, Lolita Chammah', 'Filmin Konusu: Filmde, hamile kadınlara yardım etmek için tahsis edilmiş gönüllü bir kuruluşta uzun ve sıkıcı vardiyalar geçiren sosyal hizmet görevlilerinin yaşantısı anlatılıyor.', 'alperen', '2013-07-14 14:01:00', 9),
(78, 'Karo İzle', 'karo-izle', 'http://www.batuhanaydin.com/film/resimler/kucuk/78-14_07_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/78-14_07_13-buyuk.jpg', '', 2, '6,9/10', 'bulunamadı', '2013-07-14 02:06:23', '', ' Danielle Proskar', ' 2006 &#8211; Avusturya', ' Resi Reiner, Petra Morzé, Markus Gertken, Branko Samarovski, Marie-Christine Friedrich', 'Filmin Konusu: 8 yaşındaki Karo, anne ve babası boşandığı için çok üzgündür. Annesiyle birlikte kalan Karo, babasını hafta sonları görür. Üzüntüsünü babasının verdiği telsizle gidermeye çalışan küçük kız, Allah''ın kendini dinlediğini ve bir gün kendisine cevap vereceğini ummaktadır. Beklemediği bir anda telsize biri cevap verir.', 'alperen', '2013-07-14 14:01:00', 8),
(79, 'A Takımı - The A-Team İzle', 'a-takimi-the-a-team-izle', 'http://www.batuhanaydin.com/film/resimler/kucuk/79-14_07_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/79-14_07_13-buyuk.jpg', '', 2, '6,8/10', 'bulunamadı', '2013-07-14 02:06:28', '', ' Joe Carnahan', ' 2010 &#8211; ABD', ' Bradley Cooper, Liam Neeson, Jessica Biel, Patrick Wilson, Sharlto Copley', 'Filmin Konusu: İşlemedikleri suçtan dolayı hapis yatan özel komando timi çok yüksek güvenlikli hapisten kaçmayı başarırlar. Devlet tarafından aranan grup, paralı askerler olarak çalışmaya başlar. Her biri kendine özel yeteneklerini kullanarak asıl suçluyu bulmayı hedefler.', 'alperen', '2013-07-14 14:01:00', 8),
(80, 'Gece ve Gündüz - Knight and Day İzle', 'gece-ve-gunduz-knight-and-day-izle', 'http://www.batuhanaydin.com/film/resimler/kucuk/80-14_07_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/80-14_07_13-buyuk.jpg', '', 2, '6,3/10', 'bulunamadı', '2013-07-14 02:06:32', '', ' James Mangold', ' 2010 ~ ABD', ' Tom Cruise, Cameron Diaz, Maggie Grace, Peter Sarsgaard, Marc Blucas', 'Filmin Konusu: Sıradan yalnız bir yaşam süren June Kız kardeşinin düğünü için hazırlık yapmaktadır. tesadüfen bir gün uçakta Milnerle karşılaşır. Tanıştıktan sonra macera hemen başlar. Milner'' in peşinde düşmanları iz sürerken, tesadüfler sonucu June ile birbirleriyle karşılaşmak zorunda kalırlar.', 'alperen', '2013-07-14 14:01:00', 8);
INSERT INTO `filmler` (`id`, `film_baslik`, `film_sef`, `film_resim`, `film_arka`, `film_tip`, `film_imdb`, `film_gosterim_tarihi`, `film_eklenme_tarihi`, `film_sgt`, `film_yonetmen`, `film_yapim`, `film_oyuncular`, `film_ozet`, `film_ekleyen`, `film_zaman`, `film_gosterim`) VALUES
(98, 'Crood''lar - The Croods izle', 'croodlar-the-croods-izle', 'http://www.batuhanaydin.com/film/resimler/kucuk/98-14_07_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/98-14_07_13-buyuk.jpg', '', 2, '7,4/10', 'bulunamadı', '2013-07-14 02:28:14', '', 'Yönetmen', 'yapim', 'oyuncular', '720 p mi kafaya saksımı düştü hiii', 'alperen', '2013-07-14 14:23:00', 8),
(187, 'Çelik Adam - Man Of Steel İzle', 'celik-adam-man-of-steel-izle', 'http://www.batuhanaydin.com/film/resimler/kucuk/187-14_07_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/187-14_07_13-buyuk.jpg', '', 2, '7.9/10', 'bulunamadı', '2013-07-14 04:37:14', '', '  Zack Snyder', 'ı  2013 &#8211; Kanada , ABD', '  Henry Cavill , Amy Adams , Michael Shannon , Kevin Costner , Russell Crowe', 'nov', 'alperen', '2013-07-14 16:32:00', 11),
(188, 'G.I. Joe: Misilleme - G.I. Joe: Retaliation İzle', 'gi-joe-misilleme-gi-joe-retaliation-izle', 'http://www.batuhanaydin.com/film/resimler/kucuk/188-14_07_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/188-14_07_13-buyuk.jpg', '', 2, '6,1/10', 'bulunamadı', '2013-07-14 04:37:45', '', '  Jon Chu', 'ı  2013 &#8211; ABD', '  Bruce Willis , Channing Tatum , Dwayne Johnson , Arnold Vosloo , Ray Stevenson', '', 'alperen', '2013-07-14 16:32:00', 7),
(189, 'Trans - Trance İzle', 'trans-trance-izle', 'http://www.batuhanaydin.com/film/resimler/kucuk/189-15_07_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/189-15_07_13-buyuk.jpg', '', 2, '7,1/10', 'bulunamadı', '2013-07-15 01:42:20', '', '  Danny Boyle', '  2013 &#8211; İngiltere', '  James McAvoy , Rosario Dawson , Vincent Cassel , Tuppence Middleton , Danny Sapani', 'Filmin Konusu: Bir sanat eseri müzesinde milyon dolarlar değerindeki tabloyu çalmayı planlayan, sokaklarda yaşayan bir gangster ve Komiser Simon hırsızlık eylemi yaparlarken Komiser`in kafasına aldığı bir darbe tüm işleri alt üst edecektir. Çünkü Komiser simon`un başına aldığı darbe hafızasını kaybetmesine neden olur.Yapılan tehdit ve işkenceye rağmen tabloyu koyduğu yeri hatırlamaz. Arkadaşı ise Simon`un hafızasını geri kazanabilmesi için bir hipnoz ustasına götürür. İyi seyirler&#8230;', 'rhs', '2013-07-15 01:42:00', 11),
(190, 'Vur ve Kaç - Hit and Run İzle', 'vur-ve-kac-hit-and-run-izle', 'http://www.batuhanaydin.com/film/resimler/kucuk/190-15_07_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/190-15_07_13-buyuk.jpg', '', 2, '6.0/10', 'bulunamadı', '2013-07-15 01:42:54', '', ' Dax Shepard', ' Yılı 2012', ' Michael Rosenbaum , Nate Tuck , Kal Bennett , Dax Shepard , Steve Agee , Shannon Joy Rodgers , Carly Hatter , Joy Bryant , Todd Conant , Matt Mosher', 'Part 2', 'rhs', '2013-07-15 01:42:00', 11),
(191, 'Kelebek Odası - The Butterfly Roo İzle', 'kelebek-odasi-the-butterfly-roo-izle', 'http://www.batuhanaydin.com/film/resimler/kucuk/191-15_07_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/191-15_07_13-buyuk.jpg', '', 2, '5.9/10', 'bulunamadı', '2013-07-15 01:49:08', '', ' Jonathan Zarantonello', '2012 &#8211; ABD İtalya', '  Barbara Steele , Ray Wise , Erica Leerhsen , Heather Langenkamp , Ellery Sprayberry , Julia Putnam , Camille Keaton', 'Mail.ru\n\n\n\r\n\r\n\r\n	var flashvars = {\r\n		"movieSrc":   "mail/haldun.tansel/_myvideo/367",\r\n		"rbAdvertismentSlotOverride": "1",\r\n		"isAdvertismentsSwitchOffForced": "1",\r\n		"providerId": "TrGino",\r\n		"showAd": false,\r\n		"isRelatedDisabled": "1",\r\n		"mp4": "1",\r\n		"noUpload": "1",\r\n		"isPreviewModeTurnedOnForRB": "1",\r\n		"redirectUrl": "http://www.google.com"\r\n	};\r\n	var params = {\r\n		"allowfullscreen": "true",\r\n		"allowscriptaccess": "always"\r\n	};\r\n	var attributes = {\r\n		"id": "swfmailru",\r\n		"name": "swfmailru"\r\n	};\r\n	swfobject.embedSWF("http://stg.odnoklassniki.ru/static/vp/0-0-77/vp.swf", "mmru4531", "450", "322", "9", "false", flashvars, params, attributes);', 'rhs', '2013-07-15 01:49:00', 7),
(192, 'Yokluğuna Çıldırdım - Maddened by His Absence İzle', 'yokluguna-cildirdim-maddened-by-his-absence-izle', 'http://www.batuhanaydin.com/film/resimler/kucuk/192-15_07_13-kucuk.jpg|http://www.batuhanaydin.com/film/resimler/buyuk/192-15_07_13-buyuk.jpg', '', 2, '5.9/10', 'bulunamadı', '2013-07-15 01:49:55', '', 'Sandrine Bonnaire', '2012', ' William Hurt, Alexandra Lamy, Augustin Legrand\n\n\n', 'var flashvars = {\r\n		"movieSrc":   "mail/haldun.tansel/_myvideo/287",\r\n		"rbAdvertismentSlotOverride": "1",\r\n		"isAdvertismentsSwitchOffForced": "1",\r\n		"providerId": "TrGino",\r\n		"showAd": false,\r\n		"isRelatedDisabled": "1",\r\n		"mp4": "1",\r\n		"noUpload": "1",\r\n		"isPreviewModeTurnedOnForRB": "1",\r\n		"redirectUrl": "http://www.google.com"\r\n	};\r\n	var params = {\r\n		"allowfullscreen": "true",\r\n		"allowscriptaccess": "always"\r\n	};\r\n	var attributes = {\r\n		"id": "swfmailru",\r\n		"name": "swfmailru"\r\n	};\r\n	swfobject.embedSWF("http://stg.odnoklassniki.ru/static/vp/0-0-77/vp.swf", "mmru1939", "450", "322", "9", "false", flashvars, params, attributes);', 'rhs', '2013-07-15 01:49:00', 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `film_turleri`
--

CREATE TABLE IF NOT EXISTS `film_turleri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tur_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=305 ;

--
-- Tablo döküm verisi `film_turleri`
--

INSERT INTO `film_turleri` (`id`, `tur_id`, `film_id`) VALUES
(1, 17, 1),
(2, 10, 2),
(3, 17, 2),
(4, 19, 2),
(5, 1, 3),
(6, 10, 3),
(7, 12, 3),
(8, 18, 3),
(10, 18, 5),
(11, 18, 6),
(12, 17, 7),
(16, 1, 9),
(17, 13, 9),
(18, 19, 9),
(19, 12, 10),
(20, 17, 10),
(21, 18, 10),
(22, 1, 11),
(23, 10, 11),
(24, 18, 11),
(25, 12, 12),
(26, 18, 12),
(27, 10, 13),
(28, 17, 13),
(29, 19, 14),
(30, 20, 14),
(31, 19, 15),
(32, 17, 16),
(33, 2, 17),
(34, 4, 17),
(35, 11, 17),
(36, 1, 18),
(37, 13, 18),
(38, 17, 18),
(39, 19, 18),
(40, 3, 19),
(41, 1, 20),
(42, 3, 20),
(43, 19, 20),
(44, 3, 21),
(45, 19, 21),
(46, 8, 22),
(47, 10, 22),
(48, 14, 22),
(49, 17, 22),
(50, 12, 23),
(51, 15, 23),
(52, 18, 23),
(53, 13, 24),
(54, 17, 24),
(55, 19, 24),
(59, 13, 26),
(60, 17, 26),
(61, 18, 26),
(62, 1, 27),
(63, 13, 27),
(64, 19, 27),
(65, 3, 28),
(66, 15, 28),
(67, 19, 28),
(76, 3, 32),
(77, 1, 32),
(78, 14, 32),
(132, 17, 64),
(133, 1, 65),
(134, 14, 65),
(135, 7, 65),
(136, 15, 66),
(137, 19, 66),
(138, 20, 67),
(139, 15, 67),
(140, 18, 68),
(141, 12, 68),
(142, 7, 68),
(143, 1, 69),
(144, 14, 69),
(145, 7, 69),
(146, 13, 70),
(147, 19, 70),
(148, 11, 71),
(149, 17, 71),
(150, 12, 71),
(151, 1, 72),
(152, 17, 73),
(153, 16, 74),
(154, 12, 74),
(155, 3, 75),
(156, 1, 75),
(157, 14, 75),
(158, 17, 76),
(159, 14, 76),
(160, 12, 76),
(161, 17, 77),
(162, 18, 77),
(163, 16, 78),
(164, 17, 78),
(165, 18, 78),
(166, 1, 79),
(167, 19, 79),
(168, 14, 79),
(169, 1, 80),
(177, 1, 98),
(289, 1, 187),
(290, 10, 187),
(291, 14, 187),
(292, 3, 188),
(293, 1, 188),
(294, 14, 188),
(295, 17, 189),
(296, 19, 189),
(297, 13, 189),
(298, 12, 190),
(299, 18, 190),
(300, 1, 190),
(301, 19, 191),
(302, 15, 191),
(303, 1, 192),
(304, 17, 192);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajlar`
--

CREATE TABLE IF NOT EXISTS `mesajlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `m_gonderen` varchar(225) NOT NULL,
  `m_mail` varchar(225) NOT NULL,
  `m_mesaj` text NOT NULL,
  `m_durum` int(11) NOT NULL,
  `m_tarih` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `mesajlar`
--

INSERT INTO `mesajlar` (`id`, `m_gonderen`, `m_mail`, `m_mesaj`, `m_durum`, `m_tarih`) VALUES
(1, 'bekir', 'bekir@mail.com', 'Merhaba Merhaba Merhaba Merhaba Merhaba Merhaba Merhaba', 1, '2013-07-07 01:04:24'),
(2, 'sdasd', 'asdasd@asdsad.com', 'sadasdasdasd', 1, '2013-07-14 12:52:58');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `partlar`
--

CREATE TABLE IF NOT EXISTS `partlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_baslik` varchar(225) NOT NULL,
  `p_sira` int(11) NOT NULL,
  `p_kod` text NOT NULL,
  `film_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=460 ;

--
-- Tablo döküm verisi `partlar`
--

INSERT INTO `partlar` (`id`, `p_baslik`, `p_sira`, `p_kod`, `film_id`) VALUES
(1, 'Borgen Fragman (Youtube) - Sezon 1', 1, '<object  ><param name="movie" value="http://www.youtube.com/v/Nw41sTh2mds"></param><embed src="http://www.youtube.com/v/Nw41sTh2mds" type="application/x-shockwave-flash"  ></embed></object>', 1),
(2, 'Die tödliche Maria Fragman (Youtube) ', 1, '<object  ><param name="movie" value="http://www.youtube.com/v/2lBisgHYqwk"></param><embed src="http://www.youtube.com/v/2lBisgHYqwk" type="application/x-shockwave-flash"  ></embed></object>', 2),
(3, 'Gu Family Book Fragman (Youtube) ', 1, '<object  ><param name="movie" value="http://www.youtube.com/v/-3WoAA0f0q8"></param><embed src="http://www.youtube.com/v/-3WoAA0f0q8" type="application/x-shockwave-flash"  ></embed></object>', 3),
(5, 'Baby Daddy Fragman (Youtube) - Sezon 1', 1, '<object  ><param name="movie" value="http://www.youtube.com/v/Qeb20oZRbqM"></param><embed src="http://www.youtube.com/v/Qeb20oZRbqM" type="application/x-shockwave-flash"  ></embed></object>', 5),
(6, 'Part 1', 1, '<object  ><param name="movie" value="http://www.youtube.com/v/abjBPL0026s"></param><embed src="http://www.youtube.com/v/abjBPL0026s" type="application/x-shockwave-flash"  ></embed></object>', 6),
(7, 'Fragman', 1, '<object  ><param name="movie" value="http://www.youtube.com/v/OZ4UErVAqF0"></param><embed src="http://www.youtube.com/v/OZ4UErVAqF0" type="application/x-shockwave-flash"  ></embed></object>', 7),
(9, 'Fast & Furious 6 / Hızlı ve Öfkeli 6 Son Fragmanı (Youtube) ', 1, '<object  ><param name="movie" value="http://www.youtube.com/v/C_puVuHoR6o"></param><embed src="http://www.youtube.com/v/C_puVuHoR6o" type="application/x-shockwave-flash"  ></embed></object>', 9),
(10, 'Celeste and Jesse Forever Fragman (Youtube) ', 1, '<object  ><param name="movie" value="http://www.youtube.com/v/NQoH1IGRB3w"></param><embed src="http://www.youtube.com/v/NQoH1IGRB3w" type="application/x-shockwave-flash"  ></embed></object>', 10),
(11, 'Kral Yolu - Olba Krallığı Fragman (Youtube) ', 1, '<object  ><param name="movie" value="http://www.youtube.com/v/WWsVA2jLsbg"></param><embed src="http://www.youtube.com/v/WWsVA2jLsbg" type="application/x-shockwave-flash"  ></embed></object>', 11),
(12, 'Sadece Aşk Türkçe Altyazılı Fragmanı (Youtube) ', 1, '<object  ><param name="movie" value="http://www.youtube.com/v/_dvitnMcEkQ"></param><embed src="http://www.youtube.com/v/_dvitnMcEkQ" type="application/x-shockwave-flash"  ></embed></object>', 12),
(13, 'L''écume des jours Fragman (Youtube) ', 1, '<object  ><param name="movie" value="http://www.youtube.com/v/ESs9sE6yuxI"></param><embed src="http://www.youtube.com/v/ESs9sE6yuxI" type="application/x-shockwave-flash"  ></embed></object>', 13),
(14, 'Dans la maison Fragman (Youtube) ', 1, '<object  ><param name="movie" value="http://www.youtube.com/v/UEqIuB8gDgQ"></param><embed src="http://www.youtube.com/v/UEqIuB8gDgQ" type="application/x-shockwave-flash"  ></embed></object>', 14),
(15, 'The Reluctant Fundamentalist Fragman (Youtube) ', 1, '<iframe  height="360" src="http://www.youtube.com/embed/7SQs2Y8drP8?rel=0" frameborder="0" allowfullscreen></iframe>', 15),
(16, 'Kollarımda Kal Türkçe Altyazılı Fragman (Youtube) ', 1, '<object  ><param name="movie" value="http://www.youtube.com/v/DTjuIivPgPo"></param><embed src="http://www.youtube.com/v/DTjuIivPgPo" type="application/x-shockwave-flash"  ></embed></object>', 16),
(17, 'Searching for Sugar Man Fragman (Youtube) ', 1, '<object  ><param name="movie" value="http://www.youtube.com/v/8hEojBYmR-o"></param><embed src="http://www.youtube.com/v/8hEojBYmR-o" type="application/x-shockwave-flash"  ></embed></object>', 17),
(18, 'The Dark Knight Trailer (YahooMovies) ', 1, '<object width="656" height="395">                                                                  <param name="allowscriptaccess" value="always"></param>                                 <param name="wmode" value="transparent"></param>                                 <param name="allowfullscreen" value="true"></param>                                 <embed src="http://d.yimg.com/m/up/ypp/movies/player.swf?vid=7653651" type="application/x-shockwave-flash" allowscriptaccess="always" wmode="transparent" allowfullscreen="true" width="656" height="395">                                 </embed>                                 </object>', 18),
(19, 'Bölüm', 1, '<object  ><param name="movie" value="http://www.youtube.com/v/eL4brIYV4Zs"></param><embed src="http://www.youtube.com/v/eL4brIYV4Zs" type="application/x-shockwave-flash"  ></embed></object>', 19),
(20, 'Iron Man 3 Fragman (Youtube) ', 1, '<object  ><param name="movie" value="http://www.youtube.com/v/0V1G7z26itc"></param><embed src="http://www.youtube.com/v/0V1G7z26itc" type="application/x-shockwave-flash"  ></embed></object>', 20),
(21, 'Part 1', 1, '<object  ><param name="movie" value="http://www.youtube.com/v/88oCAR3Qi_I"></param><embed src="http://www.youtube.com/v/88oCAR3Qi_I" type="application/x-shockwave-flash"  ></embed></object>', 21),
(22, 'Part 1', 1, '<object  ><param name="movie" value="http://www.youtube.com/v/ebpzx51cQes"></param><embed src="http://www.youtube.com/v/ebpzx51cQes" type="application/x-shockwave-flash"  ></embed></object>', 22),
(23, 'Warm Bodies Fragman (Youtube) ', 1, '<object  ><param name="movie" value="http://www.youtube.com/v/07s-cNFffDM"></param><embed src="http://www.youtube.com/v/07s-cNFffDM" type="application/x-shockwave-flash"  ></embed></object>', 23),
(24, 'Side Effects Fragman (Youtube) ', 1, '<object  ><param name="movie" value="http://www.youtube.com/v/QGe2ZE0prGg"></param><embed src="http://www.youtube.com/v/QGe2ZE0prGg" type="application/x-shockwave-flash"  ></embed></object>', 24),
(26, 'Small Apartments Fragman (Youtube) ', 1, '<object  ><param name="movie" value="http://www.youtube.com/v/jqXdvbCb2a8"></param><embed src="http://www.youtube.com/v/jqXdvbCb2a8" type="application/x-shockwave-flash"  ></embed></object>', 26),
(27, 'Parker Filmi Türkçe Altyazılı Fragmanı (Youtube) ', 1, '<object  ><param name="movie" value="http://www.youtube.com/v/vfBqdngIROg"></param><embed src="http://www.youtube.com/v/vfBqdngIROg" type="application/x-shockwave-flash"  ></embed></object>', 27),
(28, 'Hemlock Grove +18 Fragman (Youtube) ', 1, '<object  ><param name="movie" value="http://www.youtube.com/v/GvlFJmh6ktU"></param><embed src="http://www.youtube.com/v/GvlFJmh6ktU" type="application/x-shockwave-flash"  ></embed></object>', 28),
(38, 'vk.com', 1, '<div class=''postTabs_divs postTabs_curr_div'' id=''postTabs_0_38123''>\n<span class=''postTabs_titles''><b>vk.com</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165789853&#038;hash=e406db980a4d3480&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 32),
(39, 'Mail.ru 1', 2, '<div class=''postTabs_divs'' id=''postTabs_1_38123''>\n<span class=''postTabs_titles''><b>Mail.ru 1</b></span></p>\n<p>\n<!-- www.poisnet.net | PoisPlayer v4 ~ This software was written by PoisX Software. | satis@poisnet.net | Licenced by direkizle.com -->\n<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/swfobject/2.2/swfobject.js "></script>\r\n<div id="mmru563"></div><div id="mmru563"></div>\r\n<script type="text/javascript">\r\n	var flashvars = {\r\n		"movieSrc":   "mail/haldun.tansel/_myvideo/299",\r\n		"rbAdvertismentSlotOverride": "1",\r\n		"isAdvertismentsSwitchOffForced": "1",\r\n		"providerId": "TrGino",\r\n		"showAd": false,\r\n		"isRelatedDisabled": "1",\r\n		"mp4": "1",\r\n		"noUpload": "1",\r\n		"isPreviewModeTurnedOnForRB": "1",\r\n		"redirectUrl": "http://www.google.com"\r\n	};\r\n	var params = {\r\n		"allowfullscreen": "true",\r\n		"allowscriptaccess": "always"\r\n	};\r\n	var attributes = {\r\n		"id": "swfmailru",\r\n		"name": "swfmailru"\r\n	};\r\n	swfobject.embedSWF("http://stg.odnoklassniki.ru/static/vp/0-0-77/vp.swf", "mmru563", "450", "322", "9", "false", flashvars, params, attributes);\r\n</script></div>', 32),
(40, 'nov', 3, '<div class=''postTabs_divs'' id=''postTabs_2_38123''>\n<span class=''postTabs_titles''><b>nov</b></span><br />\n<center><a href="http://www.nowvideo.eu/video/25wf5mwto9km0" target="_blank"><img alt="" src="http://direkizle.com/player.jpg" /></a></center></p>\n<p></div>', 32),
(227, 'Part 1', 1, '<div class=''postTabs_divs postTabs_curr_div'' id=''postTabs_0_38687''>\n<span class=''postTabs_titles''><b>Part 1</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165947950&#038;hash=60d208c43e0be303&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 64),
(228, 'Part 2', 2, '<div class=''postTabs_divs'' id=''postTabs_1_38687''>\n<span class=''postTabs_titles''><b>Part 2</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165947951&#038;hash=8cfdb9fe1d13860a&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 64),
(229, 'Part 3', 3, '<div class=''postTabs_divs'' id=''postTabs_2_38687''>\n<span class=''postTabs_titles''><b>Part 3</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165947953&#038;hash=8639ddfbe170befe&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 64),
(230, 'Part 4', 4, '<div class=''postTabs_divs'' id=''postTabs_3_38687''>\n<span class=''postTabs_titles''><b>Part 4</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165947955&#038;hash=4451f533a5315cfe&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 64),
(231, 'Part 5', 5, '<div class=''postTabs_divs'' id=''postTabs_4_38687''>\n<span class=''postTabs_titles''><b>Part 5</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165947956&#038;hash=cc28a4da859a07a2&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 64),
(232, 'nov', 6, '<div class=''postTabs_divs'' id=''postTabs_5_38687''>\n<span class=''postTabs_titles''><b>nov</b></span><br />\n<center><a href="http://www.nowvideo.eu/video/ivu35ocbvj75o" target="_blank"><img alt="" src="http://direkizle.com/player.jpg" /></a></center></p>\n<p></div>', 64),
(233, 'Part 1', 1, '<div class=''postTabs_divs postTabs_curr_div'' id=''postTabs_0_38666''>\n<span class=''postTabs_titles''><b>Part 1</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165947939&#038;hash=335c6bdfd0bf9234&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 65),
(234, 'Part 2', 2, '<div class=''postTabs_divs'' id=''postTabs_1_38666''>\n<span class=''postTabs_titles''><b>Part 2</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165947940&#038;hash=7221c7c76fe7d007&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 65),
(235, 'Part 3', 3, '<div class=''postTabs_divs'' id=''postTabs_2_38666''>\n<span class=''postTabs_titles''><b>Part 3</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165947943&#038;hash=b80088a8ba7ad967&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 65),
(236, 'Part 4', 4, '<div class=''postTabs_divs'' id=''postTabs_3_38666''>\n<span class=''postTabs_titles''><b>Part 4</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165947945&#038;hash=58d7923ff082d026&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 65),
(237, 'Part 5', 5, '<div class=''postTabs_divs'' id=''postTabs_4_38666''>\n<span class=''postTabs_titles''><b>Part 5</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165947967&#038;hash=3ed61e93adaa2b1f&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 65),
(238, 'nov', 6, '<div class=''postTabs_divs'' id=''postTabs_5_38666''>\n<span class=''postTabs_titles''><b>nov</b></span><br />\n<center><a href="http://www.nowvideo.eu/video/lzu7sja8dcw94" target="_blank"><img alt="" src="http://direkizle.com/player.jpg" /></a></center></p>\n<p></div>', 65),
(239, 'Part 1', 1, '<div class=''postTabs_divs postTabs_curr_div'' id=''postTabs_0_38679''>\n<span class=''postTabs_titles''><b>Part 1</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165947791&#038;hash=663f85abae6874db&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 66),
(240, 'Part 2', 2, '<div class=''postTabs_divs'' id=''postTabs_1_38679''>\n<span class=''postTabs_titles''><b>Part 2</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165947793&#038;hash=be23582734776de0&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 66),
(241, 'Part 3', 3, '<div class=''postTabs_divs'' id=''postTabs_2_38679''>\n<span class=''postTabs_titles''><b>Part 3</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165947795&#038;hash=76d67d7fea2811d5&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 66),
(242, 'Part 4', 4, '<div class=''postTabs_divs'' id=''postTabs_3_38679''>\n<span class=''postTabs_titles''><b>Part 4</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165947796&#038;hash=c68ae3f9bf6bde04&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 66),
(243, 'Part 5', 5, '<div class=''postTabs_divs'' id=''postTabs_4_38679''>\n<span class=''postTabs_titles''><b>Part 5</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165947797&#038;hash=454de1709f0ab61b&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 66),
(244, 'nov', 6, '<div class=''postTabs_divs'' id=''postTabs_5_38679''>\n<span class=''postTabs_titles''><b>nov</b></span><br />\n<center><a href="http://www.nowvideo.eu/video/p0uy65wm0pqng" target="_blank"><img alt="" src="http://direkizle.com/player.jpg" /></a></center></p>\n<p></div>', 66),
(245, 'Part 1', 1, '<div class=''postTabs_divs postTabs_curr_div'' id=''postTabs_0_38675''>\n<span class=''postTabs_titles''><b>Part 1</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165947750&#038;hash=0e9d6894da926781&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 67),
(246, 'Part 2', 2, '<div class=''postTabs_divs'' id=''postTabs_1_38675''>\n<span class=''postTabs_titles''><b>Part 2</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165947752&#038;hash=4a7f02ebdd416e38&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 67),
(247, 'Part 3', 3, '<div class=''postTabs_divs'' id=''postTabs_2_38675''>\n<span class=''postTabs_titles''><b>Part 3</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165947755&#038;hash=19073c7b30ec036d&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 67),
(248, 'Part 4', 4, '<div class=''postTabs_divs'' id=''postTabs_3_38675''>\n<span class=''postTabs_titles''><b>Part 4</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165947756&#038;hash=02c96d790138bf68&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 67),
(249, 'Part 5', 5, '<div class=''postTabs_divs'' id=''postTabs_4_38675''>\n<span class=''postTabs_titles''><b>Part 5</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165947758&#038;hash=f76818c734794ed8&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 67),
(250, 'Part 1', 1, '<div class=''postTabs_divs postTabs_curr_div'' id=''postTabs_0_38669''>\n<span class=''postTabs_titles''><b>Part 1</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165947770&#038;hash=359bfdfd812cf3f5&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 68),
(251, 'Part 2', 2, '<div class=''postTabs_divs'' id=''postTabs_1_38669''>\n<span class=''postTabs_titles''><b>Part 2</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165947771&#038;hash=4ff977fac8fbbc56&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 68),
(252, 'Part 3', 3, '<div class=''postTabs_divs'' id=''postTabs_2_38669''>\n<span class=''postTabs_titles''><b>Part 3</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165947774&#038;hash=add845ae3f9db400&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 68),
(253, 'Part 4', 4, '<div class=''postTabs_divs'' id=''postTabs_3_38669''>\n<span class=''postTabs_titles''><b>Part 4</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165947775&#038;hash=bb2de2e69cc4cd9d&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 68),
(254, 'Part 5', 5, '<div class=''postTabs_divs'' id=''postTabs_4_38669''>\n<span class=''postTabs_titles''><b>Part 5</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165947776&#038;hash=62d4098f1e63b8d9&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 68),
(255, 'nov', 6, '<div class=''postTabs_divs'' id=''postTabs_5_38669''>\n<span class=''postTabs_titles''><b>nov</b></span><br />\n<center><a href="http://www.nowvideo.eu/video/wx603bdy3l5ak" target="_blank"><img alt="" src="http://direkizle.com/player.jpg" /></a></center></p>\n<p></div>', 68),
(256, 'Part1', 1, '<div class=''postTabs_divs postTabs_curr_div'' id=''postTabs_0_38633''>\n<span class=''postTabs_titles''><b>Part1</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165937086&#038;hash=3bbeceaba54c7f39&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 69),
(257, 'Part2', 2, '<div class=''postTabs_divs'' id=''postTabs_1_38633''>\n<span class=''postTabs_titles''><b>Part2</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165937089&#038;hash=313c225bc24c9e55&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 69),
(258, 'Part3', 3, '<div class=''postTabs_divs'' id=''postTabs_2_38633''>\n<span class=''postTabs_titles''><b>Part3</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165937090&#038;hash=9a030e35e865797d&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 69),
(259, 'Part4', 4, '<div class=''postTabs_divs'' id=''postTabs_3_38633''>\n<span class=''postTabs_titles''><b>Part4</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165937092&#038;hash=f7b76bb12071b18c&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 69),
(260, 'Part5', 5, '<div class=''postTabs_divs'' id=''postTabs_4_38633''>\n<span class=''postTabs_titles''><b>Part5</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165937095&#038;hash=ed9c94c870fbafc0&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 69),
(261, 'Part1', 1, '<div class=''postTabs_divs postTabs_curr_div'' id=''postTabs_0_38628''>\n<span class=''postTabs_titles''><b>Part1</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165938031&#038;hash=66e16af0dfc8e760&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 70),
(262, 'Part2', 2, '<div class=''postTabs_divs'' id=''postTabs_1_38628''>\n<span class=''postTabs_titles''><b>Part2</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165938034&#038;hash=763bc69ad2de4c9a&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 70),
(263, 'Part3', 3, '<div class=''postTabs_divs'' id=''postTabs_2_38628''>\n<span class=''postTabs_titles''><b>Part3</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165938036&#038;hash=61b81121de06482f&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 70),
(264, 'Part4', 4, '<div class=''postTabs_divs'' id=''postTabs_3_38628''>\n<span class=''postTabs_titles''><b>Part4</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165938038&#038;hash=1df50b9137250ebc&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 70),
(265, 'Part5', 5, '<div class=''postTabs_divs'' id=''postTabs_4_38628''>\n<span class=''postTabs_titles''><b>Part5</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165938044&#038;hash=277af158665bb452&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 70),
(266, 'Mail.ru', 6, '<div class=''postTabs_divs'' id=''postTabs_5_38628''>\n<span class=''postTabs_titles''><b>Mail.ru</b></span><br />\n\n<!-- www.poisnet.net | PoisPlayer v4 ~ This software was written by PoisX Software. | satis@poisnet.net | Licenced by direkizle.com -->\n<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/swfobject/2.2/swfobject.js "></script>\r\n<div id="mmru1856"></div><div id="mmru1856"></div>\r\n<script type="text/javascript">\r\n	var flashvars = {\r\n		"movieSrc":   "mail/cetin.89/_myvideo/21",\r\n		"rbAdvertismentSlotOverride": "1",\r\n		"isAdvertismentsSwitchOffForced": "1",\r\n		"providerId": "TrGino",\r\n		"showAd": false,\r\n		"isRelatedDisabled": "1",\r\n		"mp4": "1",\r\n		"noUpload": "1",\r\n		"isPreviewModeTurnedOnForRB": "1",\r\n		"redirectUrl": "http://www.google.com"\r\n	};\r\n	var params = {\r\n		"allowfullscreen": "true",\r\n		"allowscriptaccess": "always"\r\n	};\r\n	var attributes = {\r\n		"id": "swfmailru",\r\n		"name": "swfmailru"\r\n	};\r\n	swfobject.embedSWF("http://stg.odnoklassniki.ru/static/vp/0-0-77/vp.swf", "mmru1856", "450", "322", "9", "false", flashvars, params, attributes);\r\n</script></div>', 70),
(267, 'nov', 7, '<div class=''postTabs_divs'' id=''postTabs_6_38628''>\n<span class=''postTabs_titles''><b>nov</b></span><br />\n<center><a href="http://www.nowvideo.eu/video/5am8vqxixojoo" target="_blank"><img alt="" src="http://direkizle.com/player.jpg" /></a></center></p>\n<p></div>', 70),
(268, 'Part1', 1, '<div class=''postTabs_divs postTabs_curr_div'' id=''postTabs_0_38623''>\n<span class=''postTabs_titles''><b>Part1</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165937102&#038;hash=31fc973d47969ed4&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 71),
(269, 'Part2', 2, '<div class=''postTabs_divs'' id=''postTabs_1_38623''>\n<span class=''postTabs_titles''><b>Part2</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165937104&#038;hash=d8e276d548616284&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 71),
(270, 'Part3', 3, '<div class=''postTabs_divs'' id=''postTabs_2_38623''>\n<span class=''postTabs_titles''><b>Part3</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165937107&#038;hash=4c9a9e5bcceee690&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 71),
(271, 'Part4', 4, '<div class=''postTabs_divs'' id=''postTabs_3_38623''>\n<span class=''postTabs_titles''><b>Part4</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165937108&#038;hash=7256b9a65a0affc2&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 71),
(272, 'Part5', 5, '<div class=''postTabs_divs'' id=''postTabs_4_38623''>\n<span class=''postTabs_titles''><b>Part5</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165937113&#038;hash=fc62e594ff953276&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 71),
(273, 'nov', 6, '<div class=''postTabs_divs'' id=''postTabs_5_38623''>\n<span class=''postTabs_titles''><b>nov</b></span><br />\n<center><a href="http://www.nowvideo.eu/video/7oljz3pibuao6" target="_blank"><img alt="" src="http://direkizle.com/player.jpg" /></a></center></p>\n<p></div>', 71),
(274, 'Part1', 1, '<div class=''postTabs_divs postTabs_curr_div'' id=''postTabs_0_38616''>\n<span class=''postTabs_titles''><b>Part1</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165937078&#038;hash=b8bb2ce474730197&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 72),
(275, 'Part2', 2, '<div class=''postTabs_divs'' id=''postTabs_1_38616''>\n<span class=''postTabs_titles''><b>Part2</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165937079&#038;hash=c59e29238a74d68c&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 72),
(276, 'Part3', 3, '<div class=''postTabs_divs'' id=''postTabs_2_38616''>\n<span class=''postTabs_titles''><b>Part3</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165937081&#038;hash=4644035872c0f155&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 72),
(277, 'Part4', 4, '<div class=''postTabs_divs'' id=''postTabs_3_38616''>\n<span class=''postTabs_titles''><b>Part4</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165937082&#038;hash=a1539cb24168b0be&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 72),
(278, 'Part5', 5, '<div class=''postTabs_divs'' id=''postTabs_4_38616''>\n<span class=''postTabs_titles''><b>Part5</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165937084&#038;hash=b6e62fd4d5b01689&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 72),
(279, 'nov', 6, '<div class=''postTabs_divs'' id=''postTabs_5_38616''>\n<span class=''postTabs_titles''><b>nov</b></span><br />\n<center><a href="http://www.nowvideo.eu/video/t4pvzgp4quwaq" target="_blank"><img alt="" src="http://direkizle.com/player.jpg" /></a></center></p>\n<p></div>', 72),
(280, 'Part1', 1, '<div class=''postTabs_divs postTabs_curr_div'' id=''postTabs_0_38610''>\n<span class=''postTabs_titles''><b>Part1</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165937055&#038;hash=f2d72886a7b1cea5&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 73),
(281, 'Part2', 2, '<div class=''postTabs_divs'' id=''postTabs_1_38610''>\n<span class=''postTabs_titles''><b>Part2</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165937058&#038;hash=5a541bcd7fc65a19&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 73),
(282, 'Part3', 3, '<div class=''postTabs_divs'' id=''postTabs_2_38610''>\n<span class=''postTabs_titles''><b>Part3</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165937063&#038;hash=11f06774e1096469&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 73),
(283, 'Part4', 4, '<div class=''postTabs_divs'' id=''postTabs_3_38610''>\n<span class=''postTabs_titles''><b>Part4</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165937064&#038;hash=c2ab976d545df5b5&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 73),
(284, 'Part5', 5, '<div class=''postTabs_divs'' id=''postTabs_4_38610''>\n<span class=''postTabs_titles''><b>Part5</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165937069&#038;hash=ca9a84295c52bf18&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 73),
(285, 'nov', 6, '<div class=''postTabs_divs'' id=''postTabs_5_38610''>\n<span class=''postTabs_titles''><b>nov</b></span><br />\n<center><a href="http://www.nowvideo.eu/video/azro41989g9yn" target="_blank"><img alt="" src="http://direkizle.com/player.jpg" /></a></center></p>\n<p></div>', 73),
(286, 'Part1', 1, '<div class=''postTabs_divs postTabs_curr_div'' id=''postTabs_0_38587''>\n<span class=''postTabs_titles''><b>Part1</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165928388&#038;hash=9441c1acffc83dcf&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 74),
(287, 'Part2', 2, '<div class=''postTabs_divs'' id=''postTabs_1_38587''>\n<span class=''postTabs_titles''><b>Part2</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165928389&#038;hash=98477f9bb84833bd&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 74),
(288, 'Part3', 3, '<div class=''postTabs_divs'' id=''postTabs_2_38587''>\n<span class=''postTabs_titles''><b>Part3</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165928390&#038;hash=15596264ceabb33b&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 74),
(289, 'Part4', 4, '<div class=''postTabs_divs'' id=''postTabs_3_38587''>\n<span class=''postTabs_titles''><b>Part4</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165928391&#038;hash=73cf2dd3902a4c2c&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 74),
(290, 'Part5', 5, '<div class=''postTabs_divs'' id=''postTabs_4_38587''>\n<span class=''postTabs_titles''><b>Part5</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165928392&#038;hash=c046797eaaa1703d&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 74),
(291, 'nov', 6, '<div class=''postTabs_divs'' id=''postTabs_5_38587''>\n<span class=''postTabs_titles''><b>nov</b></span><br />\n<center><a href="http://www.nowvideo.eu/video/26acittlcd83f" target="_blank"><img alt="" src="http://direkizle.com/player.jpg" /></a></center></p>\n<p></div>', 74),
(292, 'Part1', 1, '<div class=''postTabs_divs postTabs_curr_div'' id=''postTabs_0_38638''>\n<span class=''postTabs_titles''><b>Part1</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165938049&#038;hash=7653d58fb6084626&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 75),
(293, 'Part2', 2, '<div class=''postTabs_divs'' id=''postTabs_1_38638''>\n<span class=''postTabs_titles''><b>Part2</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165938053&#038;hash=ee15eb47d4c040e3&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 75),
(294, 'Part3', 3, '<div class=''postTabs_divs'' id=''postTabs_2_38638''>\n<span class=''postTabs_titles''><b>Part3</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165938059&#038;hash=19746c19e782da3e&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 75),
(295, 'Part4', 4, '<div class=''postTabs_divs'' id=''postTabs_3_38638''>\n<span class=''postTabs_titles''><b>Part4</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165938090&#038;hash=a969456de5bb7708&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 75),
(296, 'Part5', 5, '<div class=''postTabs_divs'' id=''postTabs_4_38638''>\n<span class=''postTabs_titles''><b>Part5</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165938094&#038;hash=32f3f027143380be&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 75),
(297, 'nov', 6, '<div class=''postTabs_divs'' id=''postTabs_5_38638''>\n<span class=''postTabs_titles''><b>nov</b></span><br />\n<center><a href="http://www.nowvideo.eu/video/egxvjdgc379t8" target="_blank"><img alt="" src="http://direkizle.com/player.jpg" /></a></center></p>\n<p></div>', 75),
(298, 'Part1', 1, '<div class=''postTabs_divs postTabs_curr_div'' id=''postTabs_0_38592''>\n<span class=''postTabs_titles''><b>Part1</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165928376&#038;hash=c0332fc0ece0805d&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 76),
(299, 'Part2', 2, '<div class=''postTabs_divs'' id=''postTabs_1_38592''>\n<span class=''postTabs_titles''><b>Part2</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165928377&#038;hash=6d027de971af15fb&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 76),
(300, 'Part3', 3, '<div class=''postTabs_divs'' id=''postTabs_2_38592''>\n<span class=''postTabs_titles''><b>Part3</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165928379&#038;hash=736e13570a0cc426&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 76),
(301, 'Part4', 4, '<div class=''postTabs_divs'' id=''postTabs_3_38592''>\n<span class=''postTabs_titles''><b>Part4</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165928380&#038;hash=792f0507396f62b1&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 76),
(302, 'Part5', 5, '<div class=''postTabs_divs'' id=''postTabs_4_38592''>\n<span class=''postTabs_titles''><b>Part5</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165928381&#038;hash=c5c392beba501fe5&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 76),
(303, 'nov', 6, '<div class=''postTabs_divs'' id=''postTabs_5_38592''>\n<span class=''postTabs_titles''><b>nov</b></span><br />\n<center><a href="http://www.nowvideo.eu/video/vsjyupffso0ec" target="_blank"><img alt="" src="http://direkizle.com/player.jpg" /></a></center></p>\n<p></div>', 76),
(304, 'Part1', 1, '<div class=''postTabs_divs postTabs_curr_div'' id=''postTabs_0_38577''>\n<span class=''postTabs_titles''><b>Part1</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165928382&#038;hash=6cd5ed594940907c&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 77),
(305, 'Part2', 2, '<div class=''postTabs_divs'' id=''postTabs_1_38577''>\n<span class=''postTabs_titles''><b>Part2</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165928384&#038;hash=b89854b02a167070&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 77),
(306, 'Part3', 3, '<div class=''postTabs_divs'' id=''postTabs_2_38577''>\n<span class=''postTabs_titles''><b>Part3</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165928385&#038;hash=d7a200cfeacfb14c&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 77),
(307, 'Part4', 4, '<div class=''postTabs_divs'' id=''postTabs_3_38577''>\n<span class=''postTabs_titles''><b>Part4</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165928386&#038;hash=5751fe9348a4e92c&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 77),
(308, 'Part5', 5, '<div class=''postTabs_divs'' id=''postTabs_4_38577''>\n<span class=''postTabs_titles''><b>Part5</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165928387&#038;hash=9715b069f079669e&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 77),
(309, 'nov', 6, '<div class=''postTabs_divs'' id=''postTabs_5_38577''>\n<span class=''postTabs_titles''><b>nov</b></span><br />\n<center><a href="http://www.nowvideo.eu/video/j6d7v6cf3h1bz" target="_blank"><img alt="" src="http://direkizle.com/player.jpg" /></a></center></p>\n<p></div>', 77),
(310, 'Part1', 1, '<div class=''postTabs_divs postTabs_curr_div'' id=''postTabs_0_38571''>\n<span class=''postTabs_titles''><b>Part1</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165928370&#038;hash=09a088a954d768b4&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 78),
(311, 'Part2', 2, '<div class=''postTabs_divs'' id=''postTabs_1_38571''>\n<span class=''postTabs_titles''><b>Part2</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165928372&#038;hash=4fa1a20ae8b5aed4&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 78),
(312, 'Part3', 3, '<div class=''postTabs_divs'' id=''postTabs_2_38571''>\n<span class=''postTabs_titles''><b>Part3</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165928373&#038;hash=67ea5da3a5a5fab4&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 78),
(313, 'Part4', 4, '<div class=''postTabs_divs'' id=''postTabs_3_38571''>\n<span class=''postTabs_titles''><b>Part4</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165928374&#038;hash=5e1d1c10c45ae0f3&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 78),
(314, 'Part5', 5, '<div class=''postTabs_divs'' id=''postTabs_4_38571''>\n<span class=''postTabs_titles''><b>Part5</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165928375&#038;hash=f0a7eb41ae717576&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 78),
(315, 'nov', 6, '<div class=''postTabs_divs'' id=''postTabs_5_38571''>\n<span class=''postTabs_titles''><b>nov</b></span><br />\n<center><a href="http://www.nowvideo.eu/video/lprwfxq7jk2jo" target="_blank"><img alt="" src="http://direkizle.com/player.jpg" /></a></center></p>\n<p></div>', 78),
(316, 'Part1', 1, '<div class=''postTabs_divs postTabs_curr_div'' id=''postTabs_0_38582''>\n<span class=''postTabs_titles''><b>Part1</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165927802&#038;hash=fe4fed9ce021cf80&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 79),
(317, 'Part2', 2, '<div class=''postTabs_divs'' id=''postTabs_1_38582''>\n<span class=''postTabs_titles''><b>Part2</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165927812&#038;hash=4b5cfbbabe25c0e4&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 79),
(318, 'Part3', 3, '<div class=''postTabs_divs'' id=''postTabs_2_38582''><span class=''postTabs_titles''><b>Part3</b></span><br /><iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165927822&#038;hash=1090aa85fa95326b&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p><p></div>', 79),
(319, 'Part4', 4, '<div class=''postTabs_divs'' id=''postTabs_3_38582''>\n<span class=''postTabs_titles''><b>Part4</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165927831&#038;hash=c02914521027af21&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 79),
(320, 'Part5', 5, '<div class=''postTabs_divs'' id=''postTabs_4_38582''>\n<span class=''postTabs_titles''><b>Part5</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165927836&#038;hash=54bad5a298ee0913&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 79),
(321, 'nov', 6, '<div class=''postTabs_divs'' id=''postTabs_5_38582''>\n<span class=''postTabs_titles''><b>nov</b></span><br />\n<center><a href="http://www.nowvideo.eu/video/mma7i6errcao2" target="_blank"><img alt="" src="http://direkizle.com/player.jpg" /></a></center></p>\n<p></div>', 79),
(322, 'Part1', 1, '<div class=''postTabs_divs postTabs_curr_div'' id=''postTabs_0_38565''>\n<span class=''postTabs_titles''><b>Part1</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165927768&#038;hash=21b05b697d411feb&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 80),
(323, 'Part2', 2, '<div class=''postTabs_divs'' id=''postTabs_1_38565''>\n<span class=''postTabs_titles''><b>Part2</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165927774&#038;hash=ee592d56771ce668&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 80),
(324, 'Part3', 3, '<div class=''postTabs_divs'' id=''postTabs_2_38565''>\n<span class=''postTabs_titles''><b>Part3</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165927781&#038;hash=31644a5f088374e3&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 80),
(325, 'Part4', 4, '<div class=''postTabs_divs'' id=''postTabs_3_38565''>\n<span class=''postTabs_titles''><b>Part4</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165927788&#038;hash=1b469edab5710e73&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 80),
(326, 'Part5', 5, '<div class=''postTabs_divs'' id=''postTabs_4_38565''>\n<span class=''postTabs_titles''><b>Part5</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165927793&#038;hash=c41c5a8c10f8542c&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 80),
(327, 'nov', 6, '<div class=''postTabs_divs'' id=''postTabs_5_38565''>\n<span class=''postTabs_titles''><b>nov</b></span><br />\n<center><a href="http://www.nowvideo.eu/video/1nk2b427a4ksi" target="_blank"><img alt="" src="http://direkizle.com/player.jpg" /></a></center></p>\n<p></div>', 80),
(332, 'vkc.om', 1, '<div class=''postTabs_divs postTabs_curr_div'' id=''postTabs_0_38545''>\n<span class=''postTabs_titles''><b>vkc.om</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165921233&#038;hash=aad003f63949193c&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 98),
(333, 'Mail.ru', 2, '<div class=''postTabs_divs'' id=''postTabs_1_38545''>\n<span class=''postTabs_titles''><b>Mail.ru</b></span><br />\n\n<!-- www.poisnet.net | PoisPlayer v4 ~ This software was written by PoisX Software. | satis@poisnet.net | Licenced by direkizle.com -->\n<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/swfobject/2.2/swfobject.js "></script>\r\n<div id="mmru3167"></div><div id="mmru3167"></div>\r\n<script type="text/javascript">\r\n	var flashvars = {\r\n		"movieSrc":   "mail/cetin.89/_myvideo/2",\r\n		"rbAdvertismentSlotOverride": "1",\r\n		"isAdvertismentsSwitchOffForced": "1",\r\n		"providerId": "TrGino",\r\n		"showAd": false,\r\n		"isRelatedDisabled": "1",\r\n		"mp4": "1",\r\n		"noUpload": "1",\r\n		"isPreviewModeTurnedOnForRB": "1",\r\n		"redirectUrl": "http://www.google.com"\r\n	};\r\n	var params = {\r\n		"allowfullscreen": "true",\r\n		"allowscriptaccess": "always"\r\n	};\r\n	var attributes = {\r\n		"id": "swfmailru",\r\n		"name": "swfmailru"\r\n	};\r\n	swfobject.embedSWF("http://stg.odnoklassniki.ru/static/vp/0-0-77/vp.swf", "mmru3167", "450", "322", "9", "false", flashvars, params, attributes);\r\n</script></div>', 98),
(436, 'Mail.ru', 1, '<div class=''postTabs_divs postTabs_curr_div'' id=''postTabs_0_38182''>\n<span class=''postTabs_titles''><b>Mail.ru</b></span><br />\n\n<!-- www.poisnet.net | PoisPlayer v4 ~ This software was written by PoisX Software. | satis@poisnet.net | Licenced by direkizle.com -->\n<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/swfobject/2.2/swfobject.js "></script>\r\n<div id="mmru2460"></div><script type="text/javascript">\r\n	var flashvars = {\r\n		"movieSrc":   "mail/haldun.tansel/_myvideo/332",\r\n		"rbAdvertismentSlotOverride": "1",\r\n		"isAdvertismentsSwitchOffForced": "1",\r\n		"providerId": "TrGino",\r\n		"showAd": false,\r\n		"isRelatedDisabled": "1",\r\n		"mp4": "1",\r\n		"noUpload": "1",\r\n		"isPreviewModeTurnedOnForRB": "1",\r\n		"redirectUrl": "http://www.google.com"\r\n	};\r\n	var params = {\r\n		"allowfullscreen": "true",\r\n		"allowscriptaccess": "always"\r\n	};\r\n	var attributes = {\r\n		"id": "swfmailru",\r\n		"name": "swfmailru"\r\n	};\r\n	swfobject.embedSWF("http://stg.odnoklassniki.ru/static/vp/0-0-77/vp.swf", "mmru2460", "450", "322", "9", "false", flashvars, params, attributes);\r\n</script></div>', 187),
(437, 'nov', 2, '<div class=''postTabs_divs'' id=''postTabs_1_38182''>\n<span class=''postTabs_titles''><b>nov</b></span><br />\n<center><a href="http://www.nowvideo.eu/video/h7nwvbqohwbds" target="_blank"><img alt="" src="http://direkizle.com/player.jpg" /></a></center></p>\n<p></div>', 187),
(438, 'vk.com', 1, '<div class=''postTabs_divs postTabs_curr_div'' id=''postTabs_0_38539''>\n<span class=''postTabs_titles''><b>vk.com</b></span></p>\n<p><iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165921475&#038;hash=548664e58c52fedb&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 188),
(439, 'Mail.ru', 2, '<div class=''postTabs_divs'' id=''postTabs_1_38539''>\n<span class=''postTabs_titles''><b>Mail.ru</b></span><br />\n\n<!-- www.poisnet.net | PoisPlayer v4 ~ This software was written by PoisX Software. | satis@poisnet.net | Licenced by direkizle.com -->\n<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/swfobject/2.2/swfobject.js "></script>\r\n<div id="mmru2343"></div><script type="text/javascript">\r\n	var flashvars = {\r\n		"movieSrc":   "mail/cetin.89/_myvideo/4",\r\n		"rbAdvertismentSlotOverride": "1",\r\n		"isAdvertismentsSwitchOffForced": "1",\r\n		"providerId": "TrGino",\r\n		"showAd": false,\r\n		"isRelatedDisabled": "1",\r\n		"mp4": "1",\r\n		"noUpload": "1",\r\n		"isPreviewModeTurnedOnForRB": "1",\r\n		"redirectUrl": "http://www.google.com"\r\n	};\r\n	var params = {\r\n		"allowfullscreen": "true",\r\n		"allowscriptaccess": "always"\r\n	};\r\n	var attributes = {\r\n		"id": "swfmailru",\r\n		"name": "swfmailru"\r\n	};\r\n	swfobject.embedSWF("http://stg.odnoklassniki.ru/static/vp/0-0-77/vp.swf", "mmru2343", "450", "322", "9", "false", flashvars, params, attributes);\r\n</script></div>', 188),
(440, 'Part1', 1, '<div class=''postTabs_divs postTabs_curr_div'' id=''postTabs_0_38492''>\n<span class=''postTabs_titles''><b>Part1</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165916596&#038;hash=a3557be7165bb2ef&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 189),
(441, 'Part2', 2, '<div class=''postTabs_divs'' id=''postTabs_1_38492''>\n<span class=''postTabs_titles''><b>Part2</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165916601&#038;hash=cafa32886f8d0108&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 189),
(442, 'Part3', 3, '<div class=''postTabs_divs'' id=''postTabs_2_38492''>\n<span class=''postTabs_titles''><b>Part3</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165916603&#038;hash=b848ee9d77ff8f82&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 189),
(443, 'Part4', 4, '<div class=''postTabs_divs'' id=''postTabs_3_38492''>\n<span class=''postTabs_titles''><b>Part4</b></span></p>\n<p><iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165916607&#038;hash=301a09262f82a4fc&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 189),
(444, 'Part5', 5, '<div class=''postTabs_divs'' id=''postTabs_4_38492''>\n<span class=''postTabs_titles''><b>Part5</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165916614&#038;hash=4f75ff10704970d8&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 189),
(445, 'vk.com', 6, '<div class=''postTabs_divs'' id=''postTabs_5_38492''>\n<span class=''postTabs_titles''><b>vk.com</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=204379794&#038;id=165742767&#038;hash=39ee6546738436ff&#038;hd=2" width="450" height="360" frameborder="0"></iframe><br />\n</div>', 189),
(446, 'Mail.ru', 7, '<div class=''postTabs_divs'' id=''postTabs_6_38492''>\n<span class=''postTabs_titles''><b>Mail.ru</b></span><br />\n\n<!-- www.poisnet.net | PoisPlayer v4 ~ This software was written by PoisX Software. | satis@poisnet.net | Licenced by direkizle.com -->\n<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/swfobject/2.2/swfobject.js "></script>\r\n<div id="mmru2883"></div><script type="text/javascript">\r\n	var flashvars = {\r\n		"movieSrc":   "mail/haldun.tansel/_myvideo/439",\r\n		"rbAdvertismentSlotOverride": "1",\r\n		"isAdvertismentsSwitchOffForced": "1",\r\n		"providerId": "TrGino",\r\n		"showAd": false,\r\n		"isRelatedDisabled": "1",\r\n		"mp4": "1",\r\n		"noUpload": "1",\r\n		"isPreviewModeTurnedOnForRB": "1",\r\n		"redirectUrl": "http://www.google.com"\r\n	};\r\n	var params = {\r\n		"allowfullscreen": "true",\r\n		"allowscriptaccess": "always"\r\n	};\r\n	var attributes = {\r\n		"id": "swfmailru",\r\n		"name": "swfmailru"\r\n	};\r\n	swfobject.embedSWF("http://stg.odnoklassniki.ru/static/vp/0-0-77/vp.swf", "mmru2883", "450", "322", "9", "false", flashvars, params, attributes);\r\n</script></div>', 189),
(447, 'nov', 8, '<div class=''postTabs_divs'' id=''postTabs_7_38492''>\n<span class=''postTabs_titles''><b>nov</b></span><br />\n<center><a href="http://www.nowvideo.eu/video/new6p3pdm9rh9" target="_blank"><img alt="" src="http://direkizle.com/player.jpg" /></a></center></p>\n<p></div>', 189),
(448, 'Part 1', 1, '<div class=''postTabs_divs postTabs_curr_div'' id=''postTabs_0_38476''>\n<span class=''postTabs_titles''><b>Part 1</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165914805&#038;hash=38decc91a1dcf10b&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 190),
(449, 'Part 2', 2, '<div class=''postTabs_divs'' id=''postTabs_1_38476''>\n<span class=''postTabs_titles''><b>Part 2</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165914806&#038;hash=f7659f5d3644611a&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 190),
(450, 'Part 3', 3, '<div class=''postTabs_divs'' id=''postTabs_2_38476''>\n<span class=''postTabs_titles''><b>Part 3</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165914807&#038;hash=74ebc6cc22e43072&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 190);
INSERT INTO `partlar` (`id`, `p_baslik`, `p_sira`, `p_kod`, `film_id`) VALUES
(451, 'Part 4', 4, '<div class=''postTabs_divs'' id=''postTabs_3_38476''>\n<span class=''postTabs_titles''><b>Part 4</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165914809&#038;hash=6e4d982b777d07f2&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 190),
(452, 'Part 5', 5, '<div class=''postTabs_divs'' id=''postTabs_4_38476''>\n<span class=''postTabs_titles''><b>Part 5</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165914810&#038;hash=f31ed5d188c065d1&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 190),
(453, 'Mail.ru', 6, '<div class=''postTabs_divs'' id=''postTabs_5_38476''>\n<span class=''postTabs_titles''><b>Mail.ru</b></span><br />\n\n<!-- www.poisnet.net | PoisPlayer v4 ~ This software was written by PoisX Software. | satis@poisnet.net | Licenced by direkizle.com -->\n<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/swfobject/2.2/swfobject.js "></script>\r\n<div id="mmru3854"></div><script type="text/javascript">\r\n	var flashvars = {\r\n		"movieSrc":   "mail/haldun.tansel/_myvideo/433",\r\n		"rbAdvertismentSlotOverride": "1",\r\n		"isAdvertismentsSwitchOffForced": "1",\r\n		"providerId": "TrGino",\r\n		"showAd": false,\r\n		"isRelatedDisabled": "1",\r\n		"mp4": "1",\r\n		"noUpload": "1",\r\n		"isPreviewModeTurnedOnForRB": "1",\r\n		"redirectUrl": "http://www.google.com"\r\n	};\r\n	var params = {\r\n		"allowfullscreen": "true",\r\n		"allowscriptaccess": "always"\r\n	};\r\n	var attributes = {\r\n		"id": "swfmailru",\r\n		"name": "swfmailru"\r\n	};\r\n	swfobject.embedSWF("http://stg.odnoklassniki.ru/static/vp/0-0-77/vp.swf", "mmru3854", "450", "322", "9", "false", flashvars, params, attributes);\r\n</script></div>', 190),
(454, 'nov', 7, '<div class=''postTabs_divs'' id=''postTabs_6_38476''>\n<span class=''postTabs_titles''><b>nov</b></span><br />\n<center><a href="http://www.nowvideo.eu/video/zakxpbn5j1nzj" target="_blank"><img alt="" src="http://direkizle.com/player.jpg" /></a></center></p>\n<p></div>', 190),
(455, 'Vk.com', 1, '<div class=''postTabs_divs postTabs_curr_div'' id=''postTabs_0_38286''>\n<span class=''postTabs_titles''><b>Vk.com</b></span><br />\n<iframe src="http://vk.com/video_ext.php?oid=208956647&#038;id=165861148&#038;hash=b0887dc2e67087d1&#038;hd=2" width="450" height="360" frameborder="0"></iframe></p>\n<p></div>', 191),
(456, 'Mail.ru', 2, '<div class=''postTabs_divs'' id=''postTabs_1_38286''>\n<span class=''postTabs_titles''><b>Mail.ru</b></span><br />\n\n<!-- www.poisnet.net | PoisPlayer v4 ~ This software was written by PoisX Software. | satis@poisnet.net | Licenced by direkizle.com -->\n<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/swfobject/2.2/swfobject.js "></script>\r\n<div id="mmru4531"></div><script type="text/javascript">\r\n	var flashvars = {\r\n		"movieSrc":   "mail/haldun.tansel/_myvideo/367",\r\n		"rbAdvertismentSlotOverride": "1",\r\n		"isAdvertismentsSwitchOffForced": "1",\r\n		"providerId": "TrGino",\r\n		"showAd": false,\r\n		"isRelatedDisabled": "1",\r\n		"mp4": "1",\r\n		"noUpload": "1",\r\n		"isPreviewModeTurnedOnForRB": "1",\r\n		"redirectUrl": "http://www.google.com"\r\n	};\r\n	var params = {\r\n		"allowfullscreen": "true",\r\n		"allowscriptaccess": "always"\r\n	};\r\n	var attributes = {\r\n		"id": "swfmailru",\r\n		"name": "swfmailru"\r\n	};\r\n	swfobject.embedSWF("http://stg.odnoklassniki.ru/static/vp/0-0-77/vp.swf", "mmru4531", "450", "322", "9", "false", flashvars, params, attributes);\r\n</script></div>', 191),
(457, 'nov', 3, '<div class=''postTabs_divs'' id=''postTabs_2_38286''>\n<span class=''postTabs_titles''><b>nov</b></span><br />\n<center><a href="http://www.nowvideo.eu/video/kgqcrprrr9bej" target="_blank"><img alt="" src="http://direkizle.com/player.jpg" /></a></center></p>\n<p></div>', 191),
(458, 'Mail.ru', 1, '<div class=''postTabs_divs postTabs_curr_div'' id=''postTabs_0_38105''>\n<span class=''postTabs_titles''><b>Mail.ru</b></span></p>\n<p>\n<!-- www.poisnet.net | PoisPlayer v4 ~ This software was written by PoisX Software. | satis@poisnet.net | Licenced by direkizle.com -->\n<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/swfobject/2.2/swfobject.js "></script>\r\n<div id="mmru1939"></div><script type="text/javascript">\r\n	var flashvars = {\r\n		"movieSrc":   "mail/haldun.tansel/_myvideo/287",\r\n		"rbAdvertismentSlotOverride": "1",\r\n		"isAdvertismentsSwitchOffForced": "1",\r\n		"providerId": "TrGino",\r\n		"showAd": false,\r\n		"isRelatedDisabled": "1",\r\n		"mp4": "1",\r\n		"noUpload": "1",\r\n		"isPreviewModeTurnedOnForRB": "1",\r\n		"redirectUrl": "http://www.google.com"\r\n	};\r\n	var params = {\r\n		"allowfullscreen": "true",\r\n		"allowscriptaccess": "always"\r\n	};\r\n	var attributes = {\r\n		"id": "swfmailru",\r\n		"name": "swfmailru"\r\n	};\r\n	swfobject.embedSWF("http://stg.odnoklassniki.ru/static/vp/0-0-77/vp.swf", "mmru1939", "450", "322", "9", "false", flashvars, params, attributes);\r\n</script></div>', 192),
(459, 'nov', 2, '<div class=''postTabs_divs'' id=''postTabs_1_38105''>\n<span class=''postTabs_titles''><b>nov</b></span><br />\n<center><a href="http://www.nowvideo.eu/video/5o71lz8l98b0v" target="_blank"><img alt="" src="http://direkizle.com/player.jpg" /></a></center></p>\n<p></div>', 192);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `puanlar`
--

CREATE TABLE IF NOT EXISTS `puanlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_puan` varchar(1) NOT NULL,
  `p_ip` varchar(15) NOT NULL,
  `p_filmid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=110 ;

--
-- Tablo döküm verisi `puanlar`
--

INSERT INTO `puanlar` (`id`, `p_puan`, `p_ip`, `p_filmid`) VALUES
(1, '1', '88.242.183.135', 26),
(2, '1', '85.96.57.132', 23),
(3, '2', '88.252.63.108', 22),
(4, '1', '31.44.206.199', 22),
(5, '2', '88.247.38.52', 1),
(6, '2', '78.190.122.104', 29),
(7, '1', '88.228.146.61', 18),
(8, '1', '88.230.121.52', 22),
(9, '2', '212.253.249.236', 23),
(10, '2', '151.250.201.35', 16),
(11, '1', '151.250.201.35', 27),
(12, '2', '178.8.252.110', 22),
(13, '2', '85.106.216.81', 5),
(14, '1', '85.3.137.42', 7),
(15, '1', '78.175.11.197', 23),
(16, '2', '85.99.188.135', 1),
(17, '2', '195.175.242.24', 29),
(18, '1', '88.234.202.239', 11),
(19, '1', '88.242.159.84', 23),
(20, '3', '178.233.198.12', 26),
(21, '1', '178.233.198.12', 3),
(22, '1', '78.168.89.89', 7),
(23, '2', '94.123.119.237', 9),
(24, '1', '94.121.59.201', 7),
(25, '2', '78.181.80.230', 11),
(26, '2', '5.46.141.45', 24),
(27, '2', '88.234.235.28', 26),
(28, '2', '95.10.237.9', 19),
(29, '2', '213.47.237.204', 29),
(30, '1', '78.185.97.158', 15),
(31, '1', '78.185.101.18', 14),
(32, '2', '78.163.89.7', 18),
(33, '2', '85.97.62.253', 29),
(34, '2', '92.45.141.34', 11),
(35, '2', '78.160.201.56', 19),
(36, '3', '85.3.137.42', 21),
(37, '1', '209.107.208.252', 12),
(38, '1', '94.123.145.179', 12),
(39, '2', '88.240.147.113', 20),
(40, '1', '88.242.222.162', 26),
(41, '1', '88.251.1.57', 1),
(42, '3', '176.43.27.220', 12),
(43, '2', '78.177.38.133', 12),
(44, '2', '94.121.122.186', 26),
(45, '3', '81.213.227.154', 23),
(46, '2', '88.251.1.57', 17),
(47, '1', '78.187.44.159', 2),
(48, '2', '85.102.152.9', 3),
(49, '1', '88.238.121.66', 11),
(50, '1', '88.228.42.176', 24),
(51, '2', '149.255.228.17', 27),
(52, '3', '46.197.87.59', 27),
(53, '1', '88.247.136.102', 24),
(54, '1', '85.99.135.169', 15),
(55, '3', '78.166.158.97', 27),
(56, '3', '95.14.47.103', 12),
(57, '1', '88.246.151.33', 27),
(58, '1', '176.40.178.216', 5),
(59, '2', '95.10.80.83', 5),
(60, '3', '92.44.120.194', 23),
(61, '3', '93.184.144.98', 22),
(62, '3', '94.123.145.179', 18),
(63, '1', '88.243.154.40', 11),
(64, '1', '78.173.30.198', 19),
(65, '3', '46.197.36.144', 23),
(66, '2', '151.250.237.60', 22),
(67, '1', '88.233.141.16', 1),
(68, '1', '88.229.231.55', 2),
(69, '1', '78.168.19.94', 1),
(70, '3', '78.185.177.101', 26),
(71, '3', '176.33.224.250', 28),
(72, '1', '94.120.167.179', 1),
(73, '3', '78.163.32.5', 3),
(74, '1', '88.242.168.241', 32),
(75, '3', '159.146.72.150', 24),
(76, '1', '94.122.103.104', 32),
(77, '1', '78.186.150.137', 3),
(78, '1', '85.99.139.232', 6),
(79, '3', '31.200.108.17', 12),
(80, '1', '95.14.96.156', 23),
(81, '3', '95.8.6.81', 1),
(82, '3', '88.242.227.209', 1),
(83, '1', '78.166.30.114', 32),
(84, '1', '159.146.76.20', 19),
(85, '3', '78.179.179.102', 27),
(86, '2', '88.230.186.13', 16),
(87, '3', '78.161.9.60', 32),
(88, '1', '78.162.186.157', 26),
(89, '3', '78.169.214.78', 23),
(90, '1', '92.44.140.125', 21),
(91, '1', '88.232.31.229', 20),
(92, '2', '78.154.10.232', 5),
(93, '3', '95.15.122.93', 32),
(94, '3', '78.160.6.164', 1),
(95, '3', '46.1.248.236', 1),
(96, '1', '212.101.96.3', 23),
(97, '3', '88.235.34.99', 9),
(98, '1', '88.242.193.133', 32),
(99, '3', '31.200.24.54', 21),
(100, '3', '78.170.118.49', 27),
(101, '1', '78.189.215.97', 32),
(102, '2', '78.174.216.176', 22),
(103, '2', '94.121.254.113', 23),
(104, '3', '151.250.86.86', 24),
(105, '3', '78.173.81.67', 22),
(106, '3', '88.232.222.92', 20),
(107, '1', '178.233.198.12', 32),
(108, '3', '178.233.198.12', 27),
(109, '1', '85.106.244.218', 22);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reklam`
--

CREATE TABLE IF NOT EXISTS `reklam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `r_baslik` varchar(155) NOT NULL,
  `r_kod` text NOT NULL,
  `r_tarih` datetime NOT NULL,
  `r_sure` int(2) NOT NULL,
  `r_gec` int(11) NOT NULL,
  `r_gosterim` int(11) NOT NULL,
  `r_sinir` int(11) NOT NULL,
  `r_konum` int(11) NOT NULL,
  `r_durum` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `reklam`
--

INSERT INTO `reklam` (`id`, `r_baslik`, `r_kod`, `r_tarih`, `r_sure`, `r_gec`, `r_gosterim`, `r_sinir`, `r_konum`, `r_durum`) VALUES
(1, 'R1', '||||<h2><strong>KOD İLE REKLAM</strong></h2>\n', '2013-05-29 01:05:56', 5, 1, 0, 0, 1, 0),
(2, 'gelecek özellikler', '||||<h2><strong>Gelecek &ouml;zellikler</strong></h2>\n\n<p>&nbsp;</p>\n\n<ul>\n	<li><strong>Yorum botu</strong></li>\n	<li><strong>Bozuk film bildirimi</strong></li>\n</ul>\n', '2013-05-31 11:05:20', 0, 1, 0, 0, 4, 1),
(3, 'test', '||||<p><strong>Tsestsasadasdasdasdasd</strong></p>\n', '2013-07-14 12:07:54', 1000, 1, 265, 1000, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayfalar`
--

CREATE TABLE IF NOT EXISTS `sayfalar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_baslik` varchar(225) NOT NULL,
  `s_sef` varchar(225) NOT NULL,
  `s_icerik` text NOT NULL,
  `s_keyw` varchar(225) NOT NULL,
  `s_desc` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `sayfalar`
--

INSERT INTO `sayfalar` (`id`, `s_baslik`, `s_sef`, `s_icerik`, `s_keyw`, `s_desc`) VALUES
(1, 'Sistem bilgileri', 'sistem-bilgileri', '<h2><strong>Erenalp gelişmiş film sistemi &ouml;zellik listesi</strong></h2>\n\n<h2>&nbsp;</h2>\n\n<h2><strong>Sistemin MOBİL DESTEĞİ VARDIR.</strong></h2>\n\n<p>&nbsp;</p>\n\n<h2><strong>SEO</strong></h2>\n\n<ul style="margin-left:40px">\n	<li><strong>Sistemde ping sistemi vardır. Bu sistem, i&ccedil;erik g&uuml;ncellediğinizde arama motorlarına ping atarak &quot;Sitemi g&uuml;ncelledim gelip kontrol et ve i&ccedil;eriği indexle&quot; der. Google&#39;da ve diğer arama motorlarında b&ouml;ylece &uuml;st sıralarda olursunuz.</strong></li>\n	<li><strong>Sef link sistemi. Bu sistem, sistemdeki url(link)&#39;leri arama motorlarının daha iyi anlamasını sağlar.<br />\n	&Ouml;RN: &quot;index.php?git=izle&amp;film=demir-adam&quot; yerine &quot;/izle/demir-adam&quot; şeklinde değiştirir bu sayede sıralamalarda yukarıda olursunuz.</strong></li>\n	<li><strong>Sitede bulunan resimlerde &quot;ALT&quot; etiketi ve &quot;TİTLE&quot;&nbsp; etiketi bulunur buda arama motorlarının g&ouml;rsel arama b&ouml;l&uuml;mlerinde &uuml;st sıralarda olmanızı sağlar.</strong></li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><strong>Sistem</strong></p>\n\n<ul>\n	<li>\n	<h2><strong>Sistem CODEİGNİTER İLE YAZILMIŞTIR.</strong></h2>\n	</li>\n	<li>Adındanda anlaşılacağı gibi sistem piyasadaki film scriptlerinden olduk&ccedil;a gelişmiş ve esnek bir yapıya sahipdir.</li>\n	<li>Sistemde cache(&ouml;nbellek) &ouml;zelliği mevcutdur. Bu &ouml;zellik kullanıcıların ziyaret ettiği sayfaları &ouml;nbelleğe kaydeder. Herhangi bir ziyaret&ccedil;i &ouml;nbelleğe kayıt edilmiş bir sayfaya&nbsp;girdiğinde sayfa &ccedil;ok hızlı bir şekilde a&ccedil;ılır bu &ouml;zellik hem site hızını olduk&ccedil;a y&uuml;ksek bir seviyeye &ccedil;ıkarır hemde gereksiz yere sistemi kullanmaz.</li>\n	<li>Siteye &ouml;zel arkaplan verilebilir arkaplan &ouml;zelliklerini belirleye bilirsiniz.. &Ouml;RN: Arkaplanın s&uuml;rekli tekrarlanması,Arkaplanın konumu gibi..</li>\n	<li>Film listelerinde g&ouml;r&uuml;necek film sayısını ayarlayabilirsiniz.</li>\n	<li>Sistemde 4 Farklı d&uuml;zen &ccedil;eşidi verdır.\n	<ul>\n		<li>&nbsp;&nbsp; &nbsp;Bunlar :jQNested,Yanyana(Gelişmiş),Altalta,Yanyana(Tekbilgi) şeklindedir.</li>\n		<li>&nbsp;&nbsp; &nbsp;Her d&uuml;zenin ayrı bir g&ouml;r&uuml;nt&uuml;s&uuml; vardır.</li>\n	</ul>\n	</li>\n	<li>Site footer kısmını istediğiniz gibi d&uuml;zenleyebilirsiniz.</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><strong>Sen belirle</strong></p>\n\n<ul>\n	<li>Yukarıda men&uuml;de bulanan sen belirle kısmı kullanıcının istediği t&uuml;rlerdeki filmleri getirmeye yarar bu sistem kullanıcılar tarafından &ccedil;ok beğenilmektedir.</li>\n	<li>&Ouml;rnekle a&ccedil;ıklayacak olursak kullanıcı hem komedi hem aksiyon olan bir filmi men&uuml;den işaretleyerek hem komedi hemde aksiyon t&uuml;r&uuml;nden filmleri listeler.</li>\n</ul>\n\n<p><br />\n<strong>Filmler&nbsp;</strong></p>\n\n<ul>\n	<li>Kullanıcılar film i&ccedil;in oy verebilirler oy &ccedil;eşidi 3 tanedir. Bunlar &Ccedil;OK G&Uuml;ZEL,FENA DEĞİL ve BERBAT dır.</li>\n</ul>\n\n<p><strong>Arama sistemi</strong></p>\n\n<p>Kullanıcı film aradığında hem film başlıklarını kontrol eder hemde etiketleri kontrol eder b&ouml;ylece kullanıcıya doğru ve &ccedil;ok i&ccedil;erik &ccedil;ıkarır.</p>\n\n<p><br />\n<strong>Etiket sistemi</strong></p>\n\n<ul>\n	<li>Etiket sistemi gelişmişdir diğer scriptlerdeki gibi her i&ccedil;eriğe ayrı bir etiket eklemek yerine mevcut etiketi bir kere ekletir ve eklenen etiket diğer i&ccedil;eriklerde(Filmlerde)&nbsp;sınırsız şekilde kullanılır bu sayede performans bakımından iyilik sağlar.</li>\n	<li>Etiketi ka&ccedil; filmin kullandığını kolay bir şekilde bulur ve listeler.</li>\n	<li>Etiket sistemi 2 &ccedil;eşittir &Uuml;st&uuml;n etiket ve normal film etiketi olmak &uuml;zere 2 ye ayrılır.\n	<ul>\n		<li>Normal etiket b&uuml;t&uuml;n filmler tarafından kullanılır.</li>\n		<li>&Uuml;st&uuml;n etiket ise kategori sistemi gibi yukarıdaki men&uuml;de belirir. Bu etiket &ccedil;eşidi size istediğiniz gibi t&uuml;r oluşturmanızı sağlar.\n		<ul>\n			<li>&Ouml;rnek olarak : 720p Filmler,İMDB 7 &uuml;zeri filmler vs... gibi.&nbsp;</li>\n		</ul>\n		</li>\n	</ul>\n	</li>\n	<li>Bu sayede kullanıcılar kolay bir şekilde kendine g&ouml;re filmi bulur.</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><strong>Film ekleme sistemi</strong></p>\n\n<ul>\n	<li>Film ekleme panelinde her t&uuml;rl&uuml; kolaylık sağlanmıştır.</li>\n	<li>Filmi silerken filmin hi&ccedil; bir kalıntısı kalmıyacak şekilde silinir bu sayede gereksiz yer kaplamalar olmaz.</li>\n	<li>\n	<h2><strong>DivxPlanet.Com Botu</strong></h2>\n\n	<ul>\n		<li>DivxPlanet.com&#39;dan&nbsp;istediğiniz bir filmin linkini alarak panel&#39;de bulunan b&ouml;lgeye yapıştırdığızda filmin bilgileri otomatik olarak &ccedil;ekilir bu sayede film bilgilerini hem doğru&nbsp;hemde pratik bir şekilde girmiş olursunuz.</li>\n	</ul>\n	</li>\n	<li>Filme ait &uuml;st&uuml;n etiketi kolaylıkla belirleye bilirsiniz.</li>\n	<li>Filme &ouml;zel arkaplan belirleye bilir ve arkaplanın konumu ayarlayabilirsiniz.</li>\n	<li>Film i&ccedil;in resim eklediğinizde resimi bir b&uuml;y&uuml;k bir k&uuml;&ccedil;&uuml;k olacak şekilde belli boyutlarda &ccedil;oğaltır resim d&uuml;zenleme ile uğraşmazsınız.</li>\n	<li>Eklenecek filme ekleneceği saati belirleye bilirsiniz. &Ouml;RN: Sabah 5&#39;de eklediğiniz filmi &Ouml;ğleden sonra 3&#39;de yayınlaya bilirsiniz.</li>\n	<li>Film partlarına istediğiniz başlığı verebilirsiniz sıralamasını istediğiniz şekilde anlık olarak değiştirebilirsiniz.</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><strong>Kategori sistemi</strong></p>\n\n<ul>\n	<li>Her kategoriye ait keywords(Anahtar kelimeler) ve description(A&ccedil;ıklama) girebilirsiniz bu google i&ccedil;in &ccedil;ok &ouml;nemlidir size &uuml;st sıralara &ccedil;ıkartır..</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><strong>Yorum sistemi</strong></p>\n\n<ul>\n	<li>Yorum sistemi gelişmiş bir şekilde yapılmıştır.</li>\n	<li>Kullanıcılar yorumlara yanıt verebilirler ve yorumlara (+),(-) şeklinde puan verebilirler.</li>\n	<li>Filme ait pop&uuml;ler yorumlar yorum yapma formunun sağ tarafında belirir.</li>\n	<li>Sistem ayarlarından filmleri yorumlara kapatabilirsiniz ve yine sistem ayarlarından eklenen yorumların otomatik onaylı veya onaysız olarak kaydedilmesini sağlayabilirsiniz.</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><strong>Yardımcı sistemi</strong></p>\n\n<ul>\n	<li>Bu sistem bir nevi r&uuml;tbe sistemi gibidir yardımcı olarak kaydettiğiniz &uuml;yeliklerin yapabilecekleri kısıtlıdır film ekleyebilirler,d&uuml;zenleye bilirler , yorumlara bakabilirler&nbsp;vs.. Fakat sistem bilgilerine erişemezler bunlar sistem ayarları,mesajlar,takım(kullanıcı r&uuml;tbeleri vs.) , sayfalar,anketler ve reklamlardır.</li>\n	<li>Yardımcı kaydını sadece y&ouml;netici yapabilir.</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><strong>Sayfa sistemi</strong></p>\n\n<ul>\n	<li>Bu sistem kendinize &ouml;zel sayfa yaratmanızı sağlar &Ouml;RN: Hakkımızda sayfası,Bilgi sayfası vs.. sayfaya ait keyword(Anahtar kelimeler) ve description(A&ccedil;ıklama) girebilirsiniz.</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><strong>Anketler</strong></p>\n\n<ul>\n	<li>Anketleri sınırsız olarak girebilirsiz anketler sadece film izleme sayfasında pop&uuml;ler yorumların altında &ccedil;ıkarlar.</li>\n	<li>Anket cevaplarını sınırsız şekilde belirleye bilirsiniz. Sıralarını istediğiniz şekilde d&uuml;zenleye bilirsiniz ve AKTİF ve PASİF olarak g&uuml;ncelleyebilirsiniz.</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><strong>Reklamlar</strong></p>\n\n<ul>\n	<li>Bu sistemi elimden geldiğince gelişmiş olarak yapmaya &ccedil;alıştım .</li>\n	<li>Reklam eklerken 2 şekilde ekliyebilirsiniz.&nbsp;</li>\n	<li>Birisi Resim ve link belirleyerek. Diğeri ise belirlediğiniz kodu yapıştırarak... &Ouml;RN: Google reklamları.\n	<ul>\n		<li>Reklam &ccedil;eşitleri 7 tanedir 7 ayrı b&ouml;lgeye reklam verebilirsiniz.\n		<ul>\n			<li>Bunlar :Film &ouml;ncesi reklam\n			<ul>\n				<li>&nbsp;&Uuml;st reklam</li>\n				<li>&nbsp;(D3)Kategori altı</li>\n				<li>&nbsp;Sol reklam</li>\n				<li>&nbsp;Sağ reklam</li>\n				<li>&nbsp;Film izleme sayfası ortası</li>\n				<li>&nbsp;Ve Arkaplan&#39;dır.</li>\n			</ul>\n			</li>\n		</ul>\n		</li>\n	</ul>\n	</li>\n	<li>Bunları a&ccedil;ıklamadan &ouml;nce şunu belirteyim istediğiniz kadar reklam ekliyebilirsiniz bu reklamlar ne kadar &ccedil;ok olursa olsun herhangi bir karışıklık olmaz aynı &ccedil;eşide birden &ccedil;ok&nbsp;reklam verebilirsiniz aynı &ccedil;eşide birden &ccedil;ok reklam verildiğinde bu &ccedil;eşide ait reklamları rastgele g&ouml;sterir.</li>\n</ul>\n\n<p>&Ouml;RNEK OLARAK : Film &ouml;ncesi reklam&#39;a 5 ayrı reklam verdim diyelim. Kullanıcı izleme sayfasına girdiğinde sistem bu reklamlar arasında zar atar ve rastgele birini g&ouml;sterir.</p>\n\n<p><br />\nŞimdi gelelim a&ccedil;ıklamalara<br />\n&nbsp;&nbsp;</p>\n\n<ul>\n	<li>&nbsp;&nbsp; &nbsp;Her reklam &ccedil;eşidinde bulunan &ouml;zellikler şunlardır.\n	<ul style="margin-left:40px">\n		<li>Reklam g&ouml;sterim sayısını ayarlayabilirsiniz &Ouml;RN: Bir reklamın 5 kişiye g&ouml;r&uuml;nmesini sağlayabilirsiniz. 5 Kişiye g&ouml;sterdiğinde reklam otomatik olarak pasif hale gelir.</li>\n		<li>&nbsp;Her reklamı aktif yada pasif hale getirebilirsiniz.</li>\n	</ul>\n	</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<ul>\n	<li>&nbsp;&nbsp; &nbsp;Film &ouml;ncesi reklam :\n	<ul>\n		<li>&nbsp; &nbsp; &nbsp; &nbsp; Bu reklam &ccedil;eşidi film a&ccedil;ılmadan &ouml;nce belirir &ouml;zellikleri şunlardır.</li>\n		<li>​&nbsp; &nbsp; &nbsp; &nbsp; Bu reklam &ccedil;eşidine s&uuml;re verebilirsiniz mesela 5 dakika boyunca g&ouml;r&uuml;nmesini isteyebilirsiniz</li>\n		<li>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&quot;Reklamı ge&ccedil;&quot; butonunu aktif edebilir yada pasif hale getirebilirsiniz.</li>\n		<li>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;B&uuml;t&uuml;n d&uuml;zenlerde kullanılır.</li>\n	</ul>\n	</li>\n	<li>&nbsp;&nbsp; &nbsp;&Uuml;st Reklam:Bu reklam &ccedil;eşidi Yukarıda belirir.\n	<ul>\n		<li>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; jQNested ve Yanyana(Gelişmişde) hari&ccedil; hepsinde kullanılabilir.</li>\n	</ul>\n	</li>\n</ul>\n\n<p>&nbsp;&nbsp; &nbsp;</p>\n\n<ul>\n	<li>&nbsp;&nbsp; &nbsp;(D3)Kategori altı:\n	<ul>\n		<li>Bu reklam &ccedil;eşidi D&uuml;zen 3&#39;de sağ tarafda kategori ve t&uuml;rler b&ouml;l&uuml;m&uuml;n&uuml;n altında belirir</li>\n	</ul>\n	</li>\n</ul>\n\n<p>&nbsp;&nbsp; &nbsp;</p>\n\n<ul>\n	<li>&nbsp;&nbsp; &nbsp;Sol :\n	<ul>\n		<li>Bu reklam sol tarafda belirir. &nbsp;jQNested ve Yanyana(Gelişmişde) hari&ccedil; hepsinde kullanılabilir.</li>\n	</ul>\n	</li>\n</ul>\n\n<p>&nbsp;&nbsp; &nbsp;</p>\n\n<ul>\n	<li>&nbsp;&nbsp; &nbsp;Sağ :\n	<ul>\n		<li>Bu reklam sağ tarafda belirir . jQNested ve Yanyana(Gelişmişde) hari&ccedil; hepsinde kullanılabilir.</li>\n	</ul>\n	</li>\n	<li>&nbsp;&nbsp; &nbsp;Film izle orta :\n	<ul>\n		<li>Bu reklam film izleme sayfasında partların altında belirir. B&uuml;t&uuml;n d&uuml;zenlerde kullanılabilir.</li>\n	</ul>\n	</li>\n	<li>&nbsp;&nbsp; &nbsp;Arkaplan :\n	<ul>\n		<li>Bu reklam belirlediğiniz arkaplana link verir.</li>\n	</ul>\n	</li>\n</ul>\n\n<p><br />\n<strong>Film Botları</strong><br />\nFilm botları şuanlık sadece bir tane var ilerleyen zamanlarda bunu arttıracağım.<br />\n&nbsp;&nbsp; &nbsp;</p>\n\n<ul>\n	<li>&nbsp;&nbsp; &nbsp;Bulanan botlar:\n	<ul>\n		<li>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;Direkizle.com</li>\n	</ul>\n	</li>\n</ul>\n\n<p>&nbsp;&nbsp; &nbsp;</p>\n\n<ul>\n	<li>&nbsp;&nbsp; &nbsp;Eklenecek botlar:\n	<ul>\n		<li>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;filmizle.com.tr</li>\n		<li>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;vizyonfilmizle.net</li>\n		<li>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;cinee-izle.net</li>\n		<li>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;jetfilmizle.com</li>\n	</ul>\n	</li>\n</ul>\n\n<p>&nbsp;&nbsp; &nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>', '', ''),
(2, 'Test', 'test', '<p>Testttttttttttttt</p>', 'Test', 'Test');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sistem`
--

CREATE TABLE IF NOT EXISTS `sistem` (
  `site_baslik` varchar(225) NOT NULL,
  `site_key` varchar(333) NOT NULL,
  `site_desc` varchar(333) NOT NULL,
  `site_yorum` int(1) NOT NULL,
  `site_yorum_onay` int(1) NOT NULL,
  `site_duzen` int(11) NOT NULL,
  `site_film_sayi` int(11) NOT NULL,
  `site_facebook` varchar(333) NOT NULL,
  `site_twitter` varchar(333) NOT NULL,
  `site_eposta` varchar(225) NOT NULL,
  `site_arkaplan` varchar(300) NOT NULL,
  `site_arka_t` int(11) NOT NULL,
  `site_cache` int(11) NOT NULL,
  `site_cache_sure` int(11) NOT NULL,
  `site_alt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sistem`
--

INSERT INTO `sistem` (`site_baslik`, `site_key`, `site_desc`, `site_yorum`, `site_yorum_onay`, `site_duzen`, `site_film_sayi`, `site_facebook`, `site_twitter`, `site_eposta`, `site_arkaplan`, `site_arka_t`, `site_cache`, `site_cache_sure`, `site_alt`) VALUES
('Erenalp gelişmiş film sistemi - DEMO', 'eren,alp,alperen,karip', 'Codeigniter ile yazılmış bir film sistemi', 1, 0, 4, 24, 'https://www.facebook.com/', 'http://www.twitter.com/', 'alperenkarip1@gmail.com', 'http://www.batuhanaydin.com/film/tema/site_arka.jpg', 0, 0, 1, '<p><a href="http://www.scripti.org" target="_blank"><img alt="Script" src="http://www.scripti.org/images/scripti_yeralir.gif" /></a></p>\n');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `takim`
--

CREATE TABLE IF NOT EXISTS `takim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `t_isim` varchar(225) NOT NULL,
  `t_sifre` varchar(225) NOT NULL,
  `t_rutbe` int(11) NOT NULL,
  `t_mail` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `takim`
--

INSERT INTO `takim` (`id`, `t_isim`, `t_sifre`, `t_rutbe`, `t_mail`) VALUES
(1, 'alperen', 'f056fb0a47814d261f30858f132845b5', 1, 'yok'),
(2, 'rhs', 'af61eefe956955105226759f385c7784', 1, '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `turler`
--

CREATE TABLE IF NOT EXISTS `turler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tur_baslik` varchar(225) NOT NULL,
  `tur_sef` varchar(225) NOT NULL,
  `tur_keyw` varchar(225) NOT NULL,
  `tur_desc` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Tablo döküm verisi `turler`
--

INSERT INTO `turler` (`id`, `tur_baslik`, `tur_sef`, `tur_keyw`, `tur_desc`) VALUES
(1, 'Aksiyon', 'aksiyon', 'aksiyon,aksiyon filmleri,aksiyon izle', 'Burada aksiyon filmleri listelenir'),
(2, 'Belgesel', 'belgesel', 'belgesel,belgesel izle,belgesel film', 'Burada belgesel filmleri listelenir'),
(3, 'Bilim-kurgu', 'bilim-kurgu', 'bilim kurgu,bilim kurgu filmleri', 'Burada bilim kurgu filmleri listelenir'),
(4, 'Müzikal', 'muzikal', 'müzikal anahtar', 'müzikal açıklama'),
(5, 'Spor', 'spor', 'spor keyw', 'spor desc'),
(6, 'Animasyon', 'animasyon', 'animasyon keyw', 'animasyon desc'),
(7, 'Western', 'western', 'western keyw', 'western desc'),
(8, 'Tarih', 'tarih', 'tarih keyw', 'tarih desc'),
(9, 'Savaş', 'savas', 'savaş keyw', 'savaş desc'),
(10, 'Fantastik', 'fantastik', 'fantastik', 'fantastik'),
(11, 'Biyografi', 'biyografi', 'biyografi keyw', 'biyo desc'),
(12, 'Romantik', 'romantik', 'romantik keyw', 'romantik desc'),
(13, 'Suç', 'suc', 'suc keyw', 'suc desc'),
(14, 'Macera', 'macera', 'macera keyw', 'mac desc'),
(15, 'Korku', 'korku', 'korku', 'korku'),
(16, 'Aile', 'aile', 'ail', 'aile'),
(17, 'Dram', 'dram', 'dr', 'ram'),
(18, 'Komedi', 'komedi', 'kom', 'kom'),
(19, 'Gerilim', 'gerilim', 'gerl', 'ger'),
(20, 'Gizem', 'gizem', 'gizem', 'gizem');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE IF NOT EXISTS `yorumlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `y_yazan` varchar(225) NOT NULL,
  `y_mail` varchar(225) NOT NULL,
  `y_yorum` text NOT NULL,
  `y_tarih` datetime NOT NULL,
  `y_sgt` datetime NOT NULL,
  `y_onay` int(11) NOT NULL,
  `y_puan` int(11) NOT NULL,
  `y_ust` int(11) NOT NULL,
  `y_kip` varchar(100) NOT NULL,
  `film_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`id`, `y_yazan`, `y_mail`, `y_yorum`, `y_tarih`, `y_sgt`, `y_onay`, `y_puan`, `y_ust`, `y_kip`, `film_id`) VALUES
(1, 'testediyorum', 'testediyorum@hotmi.com', 'Kele bak keleeeeeeee', '2013-05-29 13:05:23', '2013-05-29 05:23:26', 1, 3, 0, '88.242.183.135', 26),
(2, 'testediyorum', 'testediyorum@hot.com', 'kendi yorumumu yanıtlıyorum :D', '2013-05-29 13:05:24', '2013-05-29 05:24:44', 1, 0, 1, '88.242.183.135', 26),
(3, 'sadasd', 'asdasd@sdasdas.com', 'sadasdasdasd', '2013-07-14 12:07:51', '2013-07-14 07:51:20', 1, 1, 0, '178.233.198.12', 32);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
