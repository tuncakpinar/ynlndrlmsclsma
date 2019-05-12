<?php 
	//yerel ayarları türkçe yap
	#@setlocale(LC_ALL,'tr_TR.UTF-8','turkish');
	//sayfa tipini ve karakter setini ayarla
	header('Content-Type:text/html; charset=utf8');
	//iceriği sıkıştır
	ob_start('ob_gzhandler');
	//oturum açılmadıysa oturumu başlat
	if (empty($_SESSION)) {
		@session_start();
	}
	//sayfa koruması için ERISIM sabitini tanımla
	define('_ERISIM',1);
	//ayarları yükle
	require_once('_localayarlar.php');
	//gerekli sınıfları yükle
	require_once('_inc/_class.php');
	//sorgu nesnesini oluştur
	$ifo=new ifo();
	//veritabanından site ayarlarını al
	$ayarlar=$ifo->sec('*','ayarlar','aktif=1')->oku();
	$iletisim=$ifo->sec('*','iletisim','aktif=1')->oku();
	//zaman dilimini ayarla
	date_default_timezone_set('Europe/Istanbul');
	ini_set("error_reporting",E_ALL);
	ini_set("display_errors",1);


?>