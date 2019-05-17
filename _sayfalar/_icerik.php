<?php defined( '_ERISIM' ) or die( 'Erisim engellendi!' );?>

<?php
	$id = ifo::kontrol($link, 'string');
	$article = $ifo->sec('y.*, u.adi', 'yazilar AS y JOIN uyeler AS u ON u.id = y.uid', "link={$id}")->oku();
?>

<section id="icerik" class="buyuk">
	<?php if($article) {?>
    <div class="col-md-12">
    <h3><a href="<?=$article['link'];?>"><?=$article['baslik'];?></a></h3>
    <p class="text-danger"><i class="fa fa-clock-o"></i> 
   <?=$ifo::tarih($article['tarih']);?> <i class="fa fa-user"></i> <?=$article['adi'];?></p>
    <p class="text-justify"><?=$article['giris'];?></p>
    <p class="text-justify"><?=$article['metin'];?></p>
  </div>
  <?php }else echo 'İçerik bulunamadı!'; ?>
</section>