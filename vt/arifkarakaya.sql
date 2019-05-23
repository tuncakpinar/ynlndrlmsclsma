-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 24 May 2019, 00:00:47
-- Sunucu sürümü: 10.1.28-MariaDB
-- PHP Sürümü: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `arifkarakaya`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `adres` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `slogan` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` varchar(200) COLLATE utf8_turkish_ci DEFAULT NULL COMMENT 'description',
  `kelimeler` varchar(500) COLLATE utf8_turkish_ci NOT NULL COMMENT 'keywords',
  `hakkimizda` varchar(500) COLLATE utf8_turkish_ci NOT NULL COMMENT 'kısa hakkımızda yazısı',
  `umenu` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'üst menü',
  `sutun` smallint(6) NOT NULL DEFAULT '1' COMMENT 'anasayfa sütun sayısı',
  `say` smallint(6) NOT NULL DEFAULT '5' COMMENT 'anasayfa içerik sayısı',
  `uyelik` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'üye girişi',
  `slider` tinyint(1) NOT NULL DEFAULT '1',
  `aside` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'yan sütun',
  `copyright` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `aktif` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci COMMENT='site ayarları';

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `adi`, `adres`, `slogan`, `aciklama`, `kelimeler`, `hakkimizda`, `umenu`, `sutun`, `say`, `uyelik`, `slider`, `aside`, `copyright`, `aktif`) VALUES
(1, 'ARİF KARAKAYA', 'anasayfa', 'Sadece Hayal Et!', 'Emlak Uzmanı', 'arif karakaya,arif,karakaya,emlak,emlak danışmanı,danışman', 'emlak danışmanı', 1, 2, 2, 1, 1, 0, 'Tüm hakları saklıdır ARİF KARAKAYA © 2019', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

CREATE TABLE `iletisim` (
  `id` int(11) NOT NULL,
  `adres` varchar(300) COLLATE utf8_turkish_ci DEFAULT NULL,
  `koordinat` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `tel` varchar(11) COLLATE utf8_turkish_ci DEFAULT NULL,
  `fax` varchar(11) COLLATE utf8_turkish_ci DEFAULT NULL,
  `gsm` varchar(11) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `facebook` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `linkedin` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `twitter` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `google_plus` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `iletisim`
--

INSERT INTO `iletisim` (`id`, `adres`, `koordinat`, `tel`, `fax`, `gsm`, `email`, `facebook`, `linkedin`, `twitter`, `google_plus`, `aktif`) VALUES
(1, 'Dilek Sok.Mehmet Akif M.m', '41.001574, 29.122986', '02245733664', '45656456405', '45645645614', 'info@arifkarakaya.com', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `id` int(11) NOT NULL,
  `ust` int(11) NOT NULL DEFAULT '0',
  `adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `onay` tinyint(1) NOT NULL DEFAULT '1',
  `sabit` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`id`, `ust`, `adi`, `onay`, `sabit`) VALUES
(1, 0, 'Sayfa', 1, 0),
(2, 0, 'Haber', 1, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `ust` int(11) NOT NULL DEFAULT '0',
  `adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `iid` int(11) NOT NULL DEFAULT '0' COMMENT 'içerik id',
  `onay` tinyint(1) NOT NULL DEFAULT '1',
  `sabit` tinyint(1) NOT NULL DEFAULT '0',
  `yetki` varchar(10) COLLATE utf8_turkish_ci NOT NULL DEFAULT '5'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`id`, `ust`, `adi`, `link`, `iid`, `onay`, `sabit`, `yetki`) VALUES
(1, 0, 'Anasayfa', 'anasayfa', 0, 1, 1, '5'),
(25, 0, 'İletişim', 'iletisim', 0, 0, 1, '5'),
(3, 0, 'Şifremi Unuttum', 'unuttum', 0, 0, 1, '5'),
(4, 0, 'Yeni Üye', 'yeniUye', 0, 0, 1, '5'),
(5, 0, 'Profilim', 'profilim', 0, 0, 1, '5'),
(6, 0, 'Admin', '_admin', 0, 1, 1, '1'),
(7, 6, 'Üyeler', '_uyeler', 0, 1, 1, '1'),
(8, 6, 'Referanslar', '_referanslar', 0, 1, 1, '1'),
(9, 6, 'Slider', '_slider', 0, 1, 1, '1'),
(10, 6, 'Yazılar', '_yazilar', 0, 1, 1, '1'),
(43, 6, 'Sizden Gelenler', 'asizdengelenler', 0, 1, 0, '1'),
(13, 8, 'İçerik Güncelle', '_icerik', 0, 0, 1, '1'),
(14, 8, 'Yeni İçerik', '_yeniIcerik', 0, 0, 1, '1'),
(15, 6, 'Site Ayarları', 'ayarlar', 0, 0, 1, '1'),
(16, 4, 'Aktivasyon', 'aktivasyon', 0, 0, 1, '5'),
(2, 0, 'Referanslar', '#', 0, 1, 0, '5'),
(26, 0, 'Yazılar', '_yazilarh ', 0, 1, 0, '5'),
(27, 0, 'Yorum Ekle', 'yorum-ekle', 0, 0, 0, '5'),
(28, 9, 'Slider Ekle', '_slider-ekle', 0, 0, 0, '5'),
(29, 9, 'Slider Güncelle', '_slider-guncelle', 0, 0, 0, '1'),
(30, 0, 'Slider Detay', '_slider-detay', 0, 0, 0, '5'),
(31, 2, 'Bireysel', '_bireyselr', 0, 1, 0, '5'),
(32, 2, 'Kurumsal', '_kurumsalr', 0, 1, 0, '5'),
(33, 0, 'Sizden Gelenler', '_sizdengelen', 0, 1, 1, '5'),
(44, 43, 'Yorum Güncelle', '_yorum-guncelle', 0, 0, 0, '1'),
(36, 0, 'Portföylerim', '_portföy', 0, 1, 1, '5'),
(39, 0, 'Hakkımda', '_hakkimda', 0, 1, 1, '5'),
(42, 0, 'İletişim', 'iletisim', 0, 1, 0, '5'),
(45, 8, 'Referans Ekle', '_referans-ekle', 0, 0, 0, '1'),
(46, 8, 'Referans Güncelle', '_referans-guncelle', 0, 0, 0, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `portfoylerim`
--

CREATE TABLE `portfoylerim` (
  `id` int(11) NOT NULL,
  `baslik` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` text COLLATE utf32_turkish_ci NOT NULL,
  `resim` varchar(200) COLLATE utf32_turkish_ci NOT NULL,
  `adres` varchar(100) COLLATE utf32_turkish_ci NOT NULL,
  `onay` int(1) NOT NULL,
  `tip` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_turkish_ci;

--
-- Tablo döküm verisi `portfoylerim`
--

INSERT INTO `portfoylerim` (`id`, `baslik`, `aciklama`, `resim`, `adres`, `onay`, `tip`) VALUES
(1, 'şişlide ferah daire', 'şişli merkeze metroya yakın ferah daire', 'modal.jpg', 'şişli merkez mahallesi palazoğlu sokak', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `referanslar`
--

CREATE TABLE `referanslar` (
  `id` int(11) NOT NULL,
  `tip` tinyint(1) NOT NULL DEFAULT '1',
  `baslik` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` text COLLATE utf8_turkish_ci,
  `onay` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `referanslar`
--

INSERT INTO `referanslar` (`id`, `tip`, `baslik`, `resim`, `aciklama`, `onay`) VALUES
(1, 2, 'REFERANS 1', '590f2b92afc808.73834463.jpg', '<p>Peugeot ve Citroen araçların üreticisi olan Fransız PSA, ABD’li General Motors (GM) ile Opel’in satışı konusunda anlaştı. GM ve PSA\'nın 3 Mart Cuma günü el sıkıştığı bilgisi yayınlanmıştı. </p>\n\n<p>PSA ve GM konuyla ilgili açıklama yapmazken Opel\'le birlikte GM bünyesinde yer alan Vauxhall\'ın da PSA bünyesine geçmesi bekleniyor. </p>\n\n<p>Opel yetkilileri dün şirket çalışanlarını toplayarak şirketin satış sürecinde olduğunu belirtti fakat detay vermedi. General Motors son 16 yıldır üst üste Avrupa’da zarar açıklıyor. Opel’in ödemek zorunda olduğu borç ve tazminat tutarlarının 10 milyar dolara yakın olduğu belirtiliyor.</p>\n\n<p>PSA’nın patronu Carlos Tavares anlaşmayla ilgili yaptığı konuşmada “Avrupa’nın otomobil şampiyonunu yaratabiliriz” ifadesini kullandı. </p>\n\n<p><span style=\"font-family:pt_sansbold\">ENDİŞELER SÜRÜYOR</span></p>\n\n<p>Öte yandan satış sonrası işten çıkarma olup olmayacağı Opel\'in faaliyette bulunduğu ülkelerde endişe yaratıyor. GM\'nin sattığı ifade edilen varlıklar arasında olan İngiltere\'deki Vauxhall tesislerinde 4500 kişi çalışıyor.</p>\n\n<p>İngiltere, satış görüşmelerinin açıklanmasının ardından General Motors yetkilileri ile temas kurarak kaygılarını iletmişti. İngiltere Ticaret Bakanlığı, hükümetin GM ile yakın temasta bulunduğunu ve iki şirketin satış görüşmeleri yaptıklarını açıklamalarının ardından konunun yakından takip edildiğini açıklamıştı.</p>', 1),
(17, 1, 'deneme referaans', '5ce703561bf327.52192634.jpg', '<p>asdsadasdffasdfeffdf</p>', 0),
(18, 2, 'deneme düzenle kurumsal', '5ce703dcb9fe50.19097213.jpg', '<p>sdçkndasuıhdfouashfpısdzajfgpoadkfıdhspfıjfdgs</p>', 1),
(8, 1, 'REFERANS 2', 's2.jpg', '<h5>ağaoğlu</h5>', 1),
(14, 1, 'REFERANS 3', '590f3035444767.30314529.jpg', '<p>dfgdfgfd</p>', 0),
(19, 1, 'denemessoooon', '5ce7041a6998d7.31984042.jpg', NULL, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `baslik` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` text COLLATE utf8_turkish_ci,
  `aktif` tinyint(1) NOT NULL DEFAULT '0',
  `onay` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`id`, `baslik`, `resim`, `aciklama`, `aktif`, `onay`) VALUES
(1, 'SLİDER 1', 's1.jpg', '<p>Peugeot ve Citroen araçların üreticisi olan Fransız PSA, ABD’li General Motors (GM) ile Opel’in satışı konusunda anlaştı. GM ve PSA\'nın 3 Mart Cuma günü el sıkıştığı bilgisi yayınlanmıştı. </p>\n\n<p>PSA ve GM konuyla ilgili açıklama yapmazken Opel\'le birlikte GM bünyesinde yer alan Vauxhall\'ın da PSA bünyesine geçmesi bekleniyor. </p>\n\n<p>Opel yetkilileri dün şirket çalışanlarını toplayarak şirketin satış sürecinde olduğunu belirtti fakat detay vermedi. General Motors son 16 yıldır üst üste Avrupa’da zarar açıklıyor. Opel’in ödemek zorunda olduğu borç ve tazminat tutarlarının 10 milyar dolara yakın olduğu belirtiliyor.</p>\n\n<p>PSA’nın patronu Carlos Tavares anlaşmayla ilgili yaptığı konuşmada “Avrupa’nın otomobil şampiyonunu yaratabiliriz” ifadesini kullandı. </p>\n\n<p><span style=\"font-family:pt_sansbold\">ENDİŞELER SÜRÜYOR</span></p>\n\n<p>Öte yandan satış sonrası işten çıkarma olup olmayacağı Opel\'in faaliyette bulunduğu ülkelerde endişe yaratıyor. GM\'nin sattığı ifade edilen varlıklar arasında olan İngiltere\'deki Vauxhall tesislerinde 4500 kişi çalışıyor.</p>\n\n<p>İngiltere, satış görüşmelerinin açıklanmasının ardından General Motors yetkilileri ile temas kurarak kaygılarını iletmişti. İngiltere Ticaret Bakanlığı, hükümetin GM ile yakın temasta bulunduğunu ve iki şirketin satış görüşmeleri yaptıklarını açıklamalarının ardından konunun yakından takip edildiğini açıklamıştı.</p>', 0, 1),
(8, 'Özyurtlar, Ödül İstanbul Beylikdüzü\'nü satışa çıkardı!', 's2.jpg', '<h5>ağaoğlu</h5>', 1, 1),
(13, 'deneme slider', '5ce70446030254.43772903.jpg', NULL, 0, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int(11) NOT NULL,
  `adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `resim` varchar(50) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'no-image.png',
  `email` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `yetki` int(11) NOT NULL DEFAULT '3',
  `tarih` date DEFAULT NULL,
  `onay` tinyint(1) NOT NULL DEFAULT '0',
  `aktif` tinyint(1) NOT NULL DEFAULT '0',
  `aktivasyon` varchar(5) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `adi`, `resim`, `email`, `sifre`, `yetki`, `tarih`, `onay`, `aktif`, `aktivasyon`) VALUES
(1, 'Arif Karakayaa', 'no-image.png', 'admin@admin', '2e99bf4e42962410038bc6fa4ce40d97', 1, '2019-04-10', 1, 1, ''),
(2, 'tunç akpınar', 'no-image.png', 'tuncakpinar@hotmail.com', '2e99bf4e42962410038bc6fa4ce40d97', 3, '2019-04-10', 1, 0, 'S43jd'),
(3, 'deneme üye', 'no-image.png', 'tuncakpinar05@gmail.com', '2e99bf4e42962410038bc6fa4ce40d97', 3, '2019-05-22', 1, 0, 'GM8nq'),
(4, 'memoli', 'no-image.png', 'memoli@hotmail.com', '2e99bf4e42962410038bc6fa4ce40d97', 3, '2019-05-23', 1, 1, '<br /');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazilar`
--

CREATE TABLE `yazilar` (
  `id` int(11) NOT NULL,
  `kid` int(11) NOT NULL COMMENT 'kategori id',
  `uid` int(11) NOT NULL COMMENT 'üye id',
  `link` varchar(200) COLLATE utf8_turkish_ci DEFAULT NULL COMMENT 'sef link',
  `baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `giris` text COLLATE utf8_turkish_ci NOT NULL,
  `metin` text COLLATE utf8_turkish_ci,
  `tarih` datetime NOT NULL,
  `ayar` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `ana` tinyint(1) NOT NULL DEFAULT '1',
  `onay` tinyint(1) NOT NULL DEFAULT '1',
  `yetki` varchar(10) COLLATE utf8_turkish_ci NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci ROW_FORMAT=COMPACT;

--
-- Tablo döküm verisi `yazilar`
--

INSERT INTO `yazilar` (`id`, `kid`, `uid`, `link`, `baslik`, `giris`, `metin`, `tarih`, `ayar`, `ana`, `onay`, `yetki`) VALUES
(1, 2, 1, 'sitemize hosgeldiniz', 'yazılar', '<p>Ekle sekmesinde, galeriler belgenizin genel g&ouml;r&uuml;n&uuml;m&uuml;n&uuml; d&uuml;zenlemek i&ccedil;in tasarlanan &ouml;ğeleri eklerler. Bu galerileri, tablolar, &uuml;stbilgiler, altbilgiler, kapak sayfaları ve diğer belge yapı taşlarını eklemek i&ccedil;in kullanabilirsiniz. Resimler, kartlar veya grafikler oluşturduğunuzda, aynı zamanda ge&ccedil;erli belge g&ouml;r&uuml;n&uuml;m&uuml;n&uuml;z&uuml; de d&uuml;zenlerler.</p>', '<p>Belgedeki se&ccedil;ili metnin bi&ccedil;imlendirmesini, Giriş sekmesindeki Hızlı Stiller galerisinden se&ccedil;ilen metin g&ouml;r&uuml;n&uuml;m&uuml;n&uuml; se&ccedil;erek kolayca değiştirebilirsiniz. Metni doğrudan Giriş sekmesindeki diğer denetimleri kullanarak da bi&ccedil;imlendirebilirsiniz. Denetimlerin &ccedil;oğu ge&ccedil;erli temadan g&ouml;r&uuml;n&uuml;m kullanma ya da doğrudan belirlediğiniz bi&ccedil;imi kullanma se&ccedil;eneği sunar. Belgenizin genel g&ouml;r&uuml;n&uuml;m&uuml;n&uuml; değiştirmek i&ccedil;in, Sayfa D&uuml;zeni sekmesinde yeni Tema &ouml;ğeleri se&ccedil;in. Hızlı Stil galerinde bulunan g&ouml;r&uuml;n&uuml;mleri değiştirmek i&ccedil;in, Ge&ccedil;erli Stil Ayarını Değiştir komutunu kullanın. Ge&ccedil;erli şablonunuzda bulunan belgenizin g&ouml;r&uuml;n&uuml;m&uuml;n&uuml; her zaman &ouml;zg&uuml;n haline geri d&ouml;nd&uuml;rebilmeniz i&ccedil;in, Temalar galerisi ve Hızlı Stiller galerisi komutları sıfırlar.</p>', '2019-04-12 15:36:00', '', 1, 1, '5'),
(2, 2, 3, 'sadece-hayal-et', 'deneme', 'Ekle sekmesinde, galeriler belgenizin genel görünümünü düzenlemek için tasarlanan öğeleri eklerler.  Bu galerileri, tablolar, üstbilgiler, altbilgiler, kapak sayfaları ve diğer belge yapı taşlarını eklemek için kullanabilirsiniz.  Resimler, kartlar veya grafikler oluşturduğunuzda, aynı zamanda geçerli belge görünümünüzü de düzenlerler. ', NULL, '2019-04-12 05:07:07', '', 1, 1, '5'),
(3, 1, 2, 'urunlerimiz', 'emlak', '<p>dfhklsjfh ksjf jklsfh sjklfh kwejlhf kljhf wekljfhwekl jfhwekjlfh wklf</p>\r\n\r\n<p>fsdfsdfsdf</p>', '<p>sfsghfrev wuıfh fvıwu rıucwı chwrkl chwkjfy hwckjhfklcwhkj cwkjfh cwkhfr wkcjkwh ckjwh rckw fr wc</p>', '2019-04-12 07:24:00', '', 1, 1, '5');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yetkiler`
--

CREATE TABLE `yetkiler` (
  `id` int(11) NOT NULL,
  `adi` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `onay` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yetkiler`
--

INSERT INTO `yetkiler` (`id`, `adi`, `onay`) VALUES
(1, 'Admin', 1),
(2, 'Editör', 1),
(3, 'Üye', 1),
(4, 'Misafir', 1),
(5, 'Herkes', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `id` int(11) NOT NULL,
  `kid` int(11) NOT NULL COMMENT 'kategori id',
  `uid` int(11) NOT NULL COMMENT 'üye id',
  `link` varchar(200) COLLATE utf8_turkish_ci DEFAULT NULL COMMENT 'sef link',
  `baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `metin` text COLLATE utf8_turkish_ci,
  `tarih` datetime NOT NULL,
  `ayar` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `ana` tinyint(1) NOT NULL DEFAULT '1',
  `onay` tinyint(1) NOT NULL DEFAULT '1',
  `yetki` varchar(10) COLLATE utf8_turkish_ci NOT NULL DEFAULT '5',
  `firma` varchar(200) COLLATE utf8_turkish_ci DEFAULT NULL,
  `adsoyad` varchar(200) COLLATE utf8_turkish_ci DEFAULT NULL,
  `unvan` varchar(200) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci ROW_FORMAT=COMPACT;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`id`, `kid`, `uid`, `link`, `baslik`, `metin`, `tarih`, `ayar`, `ana`, `onay`, `yetki`, `firma`, `adsoyad`, `unvan`) VALUES
(1, 2, 1, 'deneme-yorum', 'deneme yorum', '<p>Belgedeki se&ccedil;ili metnin bi&ccedil;imlendirmesini, Giriş sekmesindeki Hızlı Stiller galerisinden se&ccedil;ilen metin g&ouml;r&uuml;n&uuml;m&uuml;n&uuml; se&ccedil;erek kolayca değiştirebilirsiniz. Metni doğrudan Giriş sekmesindeki diğer denetimleri kullanarak da bi&ccedil;imlendirebilirsiniz. Denetimlerin &ccedil;oğu ge&ccedil;erli temadan g&ouml;r&uuml;n&uuml;m kullanma ya da doğrudan belirlediğiniz bi&ccedil;imi kullanma se&ccedil;eneği sunar. Belgenizin genel g&ouml;r&uuml;n&uuml;m&uuml;n&uuml; değiştirmek i&ccedil;in, Sayfa D&uuml;zeni sekmesinde yeni Tema &ouml;ğeleri se&ccedil;in. Hızlı Stil galerinde bulunan g&ouml;r&uuml;n&uuml;mleri değiştirmek i&ccedil;in, Ge&ccedil;erli Stil Ayarını Değiştir komutunu kullanın. Ge&ccedil;erli şablonunuzda bulunan belgenizin g&ouml;r&uuml;n&uuml;m&uuml;n&uuml; her zaman &ouml;zg&uuml;n haline geri d&ouml;nd&uuml;rebilmeniz i&ccedil;in, Temalar galerisi ve Hızlı Stiller galerisi komutları sıfırlar.</p>', '2019-04-12 18:36:00', '', 1, 1, '5', NULL, NULL, NULL),
(2, 2, 1, 'denemeyorum2', 'deneme yorum2', '<p>deneme metin</p>\r\n\r\n<p>Belgedeki se&ccedil;ili metnin bi&ccedil;imlendirmesini, Giriş sekmesindeki Hızlı Stiller galerisinden se&ccedil;ilen metin g&ouml;r&uuml;n&uuml;m&uuml;n&uuml; se&ccedil;erek kolayca değiştirebilirsiniz. Metni doğrudan Giriş sekmesindeki diğer denetimleri kullanarak da bi&ccedil;imlendirebilirsiniz. Denetimlerin &ccedil;oğu ge&ccedil;erli temadan g&ouml;r&uuml;n&uuml;m kullanma ya da doğrudan belirlediğiniz bi&ccedil;imi kullanma se&ccedil;eneği sunar. Belgenizin genel g&ouml;r&uuml;n&uuml;m&uuml;n&uuml; değiştirmek i&ccedil;in, Sayfa D&uuml;zeni sekmesinde yeni Tema &ouml;ğeleri se&ccedil;in. Hızlı Stil galerinde bulunan g&ouml;r&uuml;n&uuml;mleri değiştirmek i&ccedil;in, Ge&ccedil;erli Stil Ayarını Değiştir komutunu kullanın. Ge&ccedil;erli şablonunuzda bulunan belgenizin g&ouml;r&uuml;n&uuml;m&uuml;n&uuml; her zaman &ouml;zg&uuml;n haline geri d&ouml;nd&uuml;rebilmeniz i&ccedil;in, Temalar galerisi ve Hızlı Stiller galerisi komutları sıfırlar.</p>', '2019-04-12 05:07:07', '', 1, 1, '5', 'deneme firma', 'tunç akpınar', 'öğrenci'),
(5, 2, 0, 'baslik-deneme', 'Başlık deneme', '<p>Metin deneme</p>', '2017-03-08 12:24:15', '', 1, 1, '5', 'Deneme firma', 'Deneme isim', 'Deneme ünvan'),
(10, 2, 0, 'deneme', 'deneme', 'yorumEkleyorumEkleyorumEkleyorumEkleyorumEkleyorumEkleyorumEkleyorumEkleyorumEkleyorumEkleyorumEkleyorumEkleyorumEkleyorumEkleyorumEkleyorumEkleyorumEkle', '2019-05-17 21:03:30', '', 1, 1, '5', 'deneme', 'Hacı Tunç Akpınar', 'deneme');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iletisim`
--
ALTER TABLE `iletisim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `portfoylerim`
--
ALTER TABLE `portfoylerim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `referanslar`
--
ALTER TABLE `referanslar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yazilar`
--
ALTER TABLE `yazilar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yetkiler`
--
ALTER TABLE `yetkiler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `iletisim`
--
ALTER TABLE `iletisim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Tablo için AUTO_INCREMENT değeri `portfoylerim`
--
ALTER TABLE `portfoylerim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `referanslar`
--
ALTER TABLE `referanslar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `yazilar`
--
ALTER TABLE `yazilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `yetkiler`
--
ALTER TABLE `yetkiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
