<?php defined( '_ERISIM' ) or die( 'Erisim engellendi!' );?>
<div id="syolu">
<ul class="breadcrumb">
  <?php 
	if($link){
		$ifo->sec('*','menu',"link='$link'");$adres=$ifo->oku();
		$sayfaBaslik=$adres['adi'];
		$iid=$adres['iid'];
		if($iid) $ifo->sec('i.id,i.link,i.kid,k.adi AS kategori, i.baslik, i.giris, i.metin, i.tarih, u.adi','referanslar AS i,uyeler AS u,kategoriler AS k','i.kid=k.id AND i.onay=1 AND u.id=i.uid AND i.id='.$iid);
	else $ifo->sec('i.id,i.link,i.kid,k.adi AS kategori,i.baslik, i.giris, i.metin, i.tarih, u.adi','referanslar AS i,uyeler AS u,kategoriler AS k','i.kid=k.id AND i.onay=1 AND u.id=i.uid AND i.link='.ifo::kontrol($link,'text'));
		if($referanslar=$ifo->oku()){
			$alink[]='<li class="active">'.$referanslar['baslik'].'</li>';
		}
		
		else $alink[]='<li class="active">'.$adres['adi'].'</li>';
		while($adres['ust']){
			$ust=$adres['ust'];
			$ifo->sec('*','menu',"id='$ust'");
			$adres=$ifo->oku();
			$alink[]='<li><a href="'.$adres['link'].'">'.$adres['adi'].'</a></li>';
		}
		if($link!='anasayfa') $alink[]='<li><a href="anasayfa">Anasayfa</a></li>';
		foreach(array_reverse($alink) as $url) echo $url;
	 } 
  	else echo '<li class="active">Anasayfa</li>';	
 ?>
</ul>
</div>