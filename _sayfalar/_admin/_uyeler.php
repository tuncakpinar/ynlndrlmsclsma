<?php defined( '_ERISIM' ) or die( 'Erisim engellendi!' );
	ifo::yetki('1');
?>
<section id="icerik" class="buyuk">
	<h4 class="well"><?=$sayfaBaslik;?> <p class="pull-right"> <a href="_admin"><i class="fa fa-fw fa-chevron-left"></i> Geri</a></p></h4>
    
    <?php
	$uyeler=$ifo->sec('u.id,u.onay,u.aktif,u.adi,u.resim,u.email,u.tarih,y.adi AS yetki','uyeler AS u LEFT JOIN yetkiler AS y ON u.yetki=y.id')->oku(false);
	
	   foreach($uyeler AS $uye){
	?>
    <div class="panel panel-default">
    	<div class="panel-body">
        	<div class="col-md-2">
            	<img class="img-thumbnail img-responsive" src="_rsm/<?=$uye['resim']?>"/>
            </div>
        	<div class="col-md-10">
            	<h4><?=$uye['adi'];?> 
                <p class="pull-right">
                <a class="text-info" title="Güncelle" href="_uye?id=<?=$uye['id'];?>"><i class="fa fa-fw fa-pencil"></i></a>
                    <a class="btn-ajax-confirm text-danger" frm="uyeSil" data-id="<?=$uye['id'];?>" title="Sil" style="cursor:pointer;"><i class="fa fa-fw fa-times"></i></a>
                    <a class="btn-ajax-confirm text-<?=$uye['onay']?'info':'danger';?>" frm="uyeOnayla" data-id="<?=$uye['id'];?>" title="Onayla" style="cursor:pointer;"><i class="fa fa-fw fa-<?=$uye['onay']?'check':'circle-o';?>"></i></a>
                </p>
                </h4>
                <div class="col-md-4"><i class="fa fa-briefcase"></i> YETKİ<br><?=$uye['yetki'];?></div>
                <div class="col-md-4"><i class="fa fa-<?=$uye['aktif']?'link':'unlink';?>"></i>
                E-POSTA<br><?=$uye['email'];?></div>
                <div class="col-md-4"><i class="fa fa-clock-o"></i> KAYIT TARİHİ<br><?=ifo::tarih($uye['tarih']);?></div>
            </div>
        </div>
    </div>
    <?php }?>
    
</section>