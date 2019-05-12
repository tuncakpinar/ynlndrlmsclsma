<?php defined( '_ERISIM' ) or die( 'Erisim engellendi!' );?>
<?php
	$kod=$_GET['akt'];
	$kontrol=$ifo->sec('*','uyeler','aktivasyon="'.$kod.'" AND aktif=1 AND onay=1')->oku();
	if(empty($kontrol))
	{
		$ifo->sec('*','uyeler','aktivasyon="'.$kod.'"');
		if($aktive=$ifo->oku())
		{
			$id=$aktive['id'];
			$ifo->sql="UPDATE uyeler SET aktif=1, onay=1 where id=$id";
			echo $ifo->calistir()?'<div id="hata" class="alert alert-success alert-dismissable">
	<h3>Tebrikler!</h3><br/><b>Üyeliğiniz Aktifleşti!</b><br/><br/>Artık üst bölümde bulunan giriş formunu kullanarak giriş yapabilirsiniz..
</div>':'<div id="hata" class="alert alert-danger alert-dismissable">
	<h3><i class="fa fa-frown-o"></i> Hata!</h3></div>';
		}
		else	echo '<div id="hata" class="alert alert-danger alert-dismissable">
	<h3><i class="fa fa-frown-o"></i> Hata!</h3><br/>Doğrulama kodu yanlış!</div>';
	}
	else	echo '<div id="hata" class="alert alert-warning alert-dismissable">
	<h3><i class="fa fa-meh-o"></i> Hata!</h3><br/>Üyeliğiniz daha önce aktif edilmiş!</div>';
?>