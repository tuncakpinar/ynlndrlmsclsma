<?php defined( '_ERISIM' ) or die( 'Erisim engellendi!' );?>
<?php 
	//açılacak sayfayı belirlemek
	$url='_sayfalar/_ana.php';
	
	switch ($link) {
		case 'anasayfa':$url='_sayfalar/_ana.php';break;
		case 'iletisim':$url='_sayfalar/_iletisim.php';break;
		case 'yorum-ekle':$url='_sayfalar/_yorum-ekle.php';break;
		case '_yorum-guncelle':$url='_sayfalar/_admin/_yorum-guncelle.php';break;
		case 'unuttum':$url='_sayfalar/_uye/_unuttum.php';break;
		case 'yeniUye':$url='_sayfalar/_uye/_yeniUye.php';break;
		case 'aktivasyon':$url='_sayfalar/_uye/_aktivasyon.php';break;
		case 'profilim':$url='_sayfalar/_uye/_profilim.php';break;
		case '_referanslar':$url='_sayfalar/_admin/_referanslar.php';break;
		case '_referans-guncelle':$url='_sayfalar/_admin/_referans-guncelle.php';break;
		case '_referans-ekle':$url='_sayfalar/_admin/_referans-ekle.php';break;
		case '_referans':$url='_sayfalar/_admin/_referans.php';break;
		case '_yenireferans':$url='_sayfalar/_admin/_yenireferans.php';break;
		case '_yeniyazi':$url='_sayfalar/_admin/_yeniyazi.php';break;
		case 'ayarlar':$url='_sayfalar/_admin/_ayarlar.php';break;
		case 'asizdengelenler':$url='_sayfalar/_admin/_asizdengelenler.php';break;
		case '_uyeler':$url='_sayfalar/_admin/_uyeler.php';break;
		case '_admin':$url='_sayfalar/_admin/_admin.php';break;
		case '_slider':$url='_sayfalar/_admin/_slider.php';break;
		case '_slider-ekle':$url='_sayfalar/_admin/_slider-ekle.php';break;
		case '_slider-guncelle':$url='_sayfalar/_admin/_slider-guncelle.php';break;
		case '_slider-detay':$url='_sayfalar/_slider-detay.php';break;
		case '_yazilar':$url='_sayfalar/_admin/_yazilar.php';break;
		case '_yazilarh':$url='_sayfalar/_yazilarh.php';break;
		case '_sizdengelen':$url='_sayfalar/_sizdengelenler.php';break;
		case '_bireyselr':$url='_sayfalar/_bireyselref.php';break;
		case '_kurumsalr':$url='_sayfalar/_kurumsalselref.php';break;
		case '_hakkimda':$url='_sayfalar/_hakkimda.php';break;
		case '_portföy':$url='_sayfalar/_portföy.php';break;
		case '_kategoriler':$url='_sayfalar/_admin/_kategoriler.php';break;
		case '_yorumekle':$url='_sayfalar/_yorum-ekle.php';break;
		case '_yorumlar':$url='_sayfalar/_yorumlar.php';break;
		case '_uyeduzenle':$url='_sayfalar/_admin/_uyedznl.php';break;
		case '_icerikgncll':$url='_sayfalar/_admin/_icerikgncll.php';break;
		case '_aportföylerim':$url='_sayfalar/_admin/_aportföyleerim.php';break;
		case '_portfoygncll':$url='_sayfalar/_admin/_portfoygncll.php';break;
		case '_portfoyekle':$url='_sayfalar/_admin/_portfoyekle.php';break;

		case 'deneme':$url='_sayfalar/deneme.php';break;
		case '_yorumlar':$url='_sayfalar/_portföy.php';break;

		default:$url='_sayfalar/_icerik.php';break;
	}

	require($url);

?>