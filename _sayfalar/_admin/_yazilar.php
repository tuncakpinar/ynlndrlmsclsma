<?php defined( '_ERISIM' ) or die( 'Erisim engellendi!' );
	ifo::yetki('1');
?>
<section id="icerik" class="buyuk">
	<h4 class="well"> Yazılar <p class="pull-right"> <a href="_yeniyazi"><i class="fa fa-fw fa-plus"></i> Yeni Yazı</a></p></h4>
    <table id="datatable" class="table table-striped table-bordered">
    	<thead>
        	<tr>
            	<th class="gizli text-center">ID</th>
            	<th><i class="fa fa-fw fa-puzzle-piece"></i> BAŞLIK</th>
            	<th class="gizli"><i class="fa fa-fw fa-list"></i> KATEGORİ</th>
            	<th class="gizli"><i class="fa fa-fw fa-user"></i> YAZAR</th>
            	<th class="gizli"><i class="fa fa-fw fa-clock-o"></i> TARİH</th>
            </tr>
        </thead>
        <tbody>
        	<?php
            	$ifo->sec('i.giris,i.ana,i.onay,i.id,i.baslik,i.tarih,k.adi AS kategori,u.adi AS yazar','yazilar AS i LEFT JOIN uyeler AS u ON i.uid=u.id LEFT JOIN kategoriler AS k ON i.kid=k.id','1=1','id DESC',100);
				while($yazilar=$ifo->oku()){
			?>
        	<tr>
            	<td class="gizli text-center"><?=$yazilar['id'];?></td>
            	<td><a class="btn" href="_icerik?id=<?=$yazilar['id'];?>" data-toggle="popover" data-placement="bottom" data-title="Giriş" data-content="<?=substr(strip_tags($yazilar['giris']),0,250);?> ..." data-trigger="hover" ><i class="fa fa-fw fa-puzzle-piece"></i> <b><?=$yazilar['baslik'];?></b></a>
                <p class="pull-right">
                	
                    <a class="text-info" title="Güncelle" href="_icerik?id=<?=$yazilar['id'];?>"><i class="fa fa-fw fa-pencil"></i></a>
                    <a class="btn-ajax-confirm text-danger" frm="icerikSil" data-id="<?=$yazilar['id'];?>" title="Sil" style="cursor:pointer;"><i class="fa fa-fw fa-times"></i></a>
                    <a class="btn-ajax-confirm text-<?=$yazilar['ana']?'info':'danger';?>" frm="icerikAna" data-id="<?=$yazilar['id'];?>" title="Anasayfada Yayınla" style="cursor:pointer;"><i class="fa fa-fw fa-home"></i></a>
                    <a class="btn-ajax-confirm text-<?=$yazilar['onay']?'info':'danger';?>" frm="icerikOnayla" data-id="<?=$yazilar['id'];?>" title="Onayla" style="cursor:pointer;"><i class="fa fa-fw fa-<?=$yazilar['onay']?'check':'circle-o';?>"></i></a>
                    
                    
                </p>
                
                </td>
            	<td class="gizli"><?=$yazilar['kategori'];?></td>
            	<td class="gizli"><?=$yazilar['yazar'];?></td>
            	<td class="gizli"><?=ifo::tarih($yazilar['tarih'],'%d/%m/%Y');?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</section>