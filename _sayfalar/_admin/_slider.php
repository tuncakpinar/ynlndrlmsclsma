<?php defined( '_ERISIM' ) or die( 'Erisim engellendi!' );
	ifo::yetki('1');
?>
<section id="icerik" class="buyuk">
	<h4 class="well">SLIDER <p class="pull-right"> <a href="_slider-ekle"><i class="fa fa-fw fa-plus"></i> Yeni Slider</a></p></h4>
    
    <table id="datatable" class="table table-striped table-bordered">
    	<thead>
        	<tr>
            	
            	<th><i class="fa fa-fw fa-picture-o"></i> RESİM</th>
            	
            	
            </tr>
        </thead>
        <tbody>
        	<?php
            	$ifo->sec('s.id,s.baslik,s.resim,s.onay,s.aktif,s.aciklama','slider AS s','1=1','id DESC',100);
				while($slider=$ifo->oku()){
			?>
        	<tr>
            	<td >
                <a class="btn" href="_slider?id=<?=$slider['id'];?>" data-toggle="popover" data-placement="bottom" data-title="Açıklama" data-content="<?=substr(strip_tags($slider['aciklama']),0,250);?> ..." data-trigger="hover" ><i class="fa fa-fw fa-puzzle-piece"></i> <b><?=$slider['baslik'];?></b></a>
                <p class="pull-right">
                	
                    <a class="text-info" title="Güncelle" href="_slider-guncelle?id=<?=$slider['id'];?>"><i class="fa fa-fw fa-pencil"></i></a>
									<a class="btn-ajax-confirm text-danger" frm="sliderSil" data-id="<?=$slider['id'];?>" title="Sil" style="cursor:pointer;"><i class="fa fa-fw fa-eraser"></i></a>
									
									<a class="btn-ajax-confirm text-<?=$slider['onay']?'info':'danger';?>" frm="sliderOnayla" data-id="<?=$slider['id'];?>" title="Onayla" style="cursor:pointer;"><i class="fa fa-fw fa-<?=$slider['onay']?'check':'circle-o';?>"></i></a>
									
									<a class="btn-ajax-confirm text-<?=$slider['aktif']?'info':'danger';?>" frm="sliderAktif" data-id="<?=$slider['id'];?>" title="Aktif Et" style="cursor:pointer;"><i class="fa fa-fw fa-<?=$slider['aktif']?'key':'close';?>"></i></a>
                </p>
                <hr />
               <img src="_rsm/_slider/<?=$slider['resim'];?>" class="img-rounded img-responsive" /></td>
            	
            	
            	
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
</section>