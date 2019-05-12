<?php defined( '_ERISIM' ) or die( 'Erisim engellendi!' );?>

<div class="row">
	<?php 
		$sorgu=$ifo->sec('u.adi,i.baslik,i.link,i.tarih,i.giris,i.metin','yazilar AS i,uyeler AS u','i.uid=u.id AND i.onay=1 AND i.ana=1','i.id DESC',$ayarlar['say'])->oku(false);
		
		$sutun=ceil(12/$ayarlar['sutun']);
		foreach($sorgu as $haber){
	?>
  <div class="col-md-<?=$sutun;?>">
    <h3><a href="<?=$haber['link'];?>"><?=$haber['baslik'];?></a></h3>
    <p class="text-danger"><i class="fa fa-clock-o"></i> 
   <?=$ifo::tarih($haber['tarih']);?> <i class="fa fa-user"></i> <?=$haber['adi'];?></p>
    <p><?=$haber['giris'];?></p>
    
	<?php if($haber['metin']){?>
    <p class="pull-right"><a class="btn btn-default" href="<?=$haber['link'];?>"> Devamı <i class="fa fa-angle-right"></i> </a> </p>
    <?php }//if?>
  </div>
  <?php }//while ?>
</div>
	<?php $ifo->navigasyon('article','center');?>


