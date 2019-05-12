<?php defined( '_ERISIM' ) or die( 'Erisim engellendi!' );?>

<section id="icerik" class="buyuk">
	<?php if($referanslar) {?>
    <div class="col-md-12">
    <h3><a href="<?=$referanslar['link'];?>"><?=$referanslar['baslik'];?></a></h3>
    <p class="text-danger"><i class="fa fa-clock-o"></i> 
   <?=$ifo::tarih($referanslar['tarih']);?> <i class="fa fa-user"></i> <?=$referanslar['adi'];?></p>
    <p class="text-justify"><?=$referanslar['giris'];?></p>
    <p class="text-justify"><?=$referanslar['metin'];?></p>
  </div>
  <?php }else echo 'İçerik bulunamadı!'; ?>
</section>