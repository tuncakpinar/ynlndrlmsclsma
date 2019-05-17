<?php defined( '_ERISIM' ) or die( 'Erisim engellendi!' );
	ifo::yetki('1');
?>
<section id="icerik" class="buyuk">
	<h4 class="well">SİZDEN GELENLER <p class="pull-right"> <a href="_yorumekle"><i class="fa fa-fw fa-plus"></i> Yeni Yorum</a></p></h4>
	
    <table id="datatable" class="table table-striped table-bordered">
    	<thead>
        	<tr>
            	<th class="gizli text-center">ID</th>
            	<th><i class="fa fa-fw fa-puzzle-piece"></i> BAŞLIK</th>
            	<th class="gizli"><i class="fa fa-fw fa-user"></i> YAZAR</th>
            	<th class="gizli"><i class="fa fa-fw fa-clock-o"></i> TARİH</th>
            </tr>
        </thead>
        <tbody>
        	<?php
            	$ifo->sec('i.ana,i.onay,i.id,i.baslik,i.tarih,i.adsoyad as yazar','yorumlar AS i','1=1','id DESC');
				while($yorumlar=$ifo->oku()){
			?>
        	<tr>
            	<td class="gizli text-center"><?=$yorumlar['id'];?></td>
            	<td><a class="btn" href="_yorum-guncelle?id=<?=$yorumlar['id'];?>" data-toggle="popover" data-placement="bottom" data-title="Giriş" data-content="<?=substr(strip_tags($yorumlar['giris']),0,250);?> ..." data-trigger="hover" ><i class="fa fa-fw fa-puzzle-piece"></i> <b><?=$yorumlar['baslik'];?></b></a>
                <p class="pull-right">
                	
                    <a class="text-info" title="Güncelle" href="_yorum-guncelle?id=<?=$yorumlar['id'];?>"><i class="fa fa-fw fa-pencil"></i></a>
                    <a class="btn-ajax-confirm text-danger" frm="yorumSil" data-id="<?=$yorumlar['id'];?>" title="Sil" style="cursor:pointer;"><i class="fa fa-fw fa-times"></i></a>
                    <a class="btn-ajax-confirm text-<?=$yorumlar['onay']?'info':'danger';?>" frm="yorumOnayla" data-id="<?=$yorumlar['id'];?>" title="Onayla" style="cursor:pointer;"><i class="fa fa-fw fa-<?=$yorumlar['onay']?'check':'circle-o';?>"></i></a>
                    
                    
                </p>
                
                </td>
            	<td class="gizli"><?=$yorumlar['yazar'];?></td>
            	<td class="gizli"><?=ifo::tarih($yorumlar['tarih'],'%d/%m/%Y');?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</section>