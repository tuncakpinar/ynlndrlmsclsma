<?php defined( '_ERISIM' ) or die( 'Erisim engellendi!' );
	ifo::yetki('1');
?>
<section id="icerik" class="buyuk">
	<h4 class="well">REFERANSLAR <p class="pull-right"> <a href="_referans-ekle"><i class="fa fa-fw fa-plus"></i> Yeni Referans</a></p></h4>
    
    <table id="datatable" class="table table-striped table-bordered">
    	<thead>
        	<tr>
            	
            	<th><i class="fa fa-fw fa-picture-o"></i> RESİM</th>
            	
            	
            </tr>
        </thead>
        <tbody>
        	<?php
            	$ifo->sec('r.*','referanslar AS r','1=1','id DESC');
				while($referans=$ifo->oku()){
			?>
        	<tr>
            	<td >
                <a class="btn" href="_slider?id=<?=$referans['id'];?>" data-toggle="popover" data-placement="bottom" data-title="Açıklama" data-content="<?=substr(strip_tags($referans['aciklama']),0,250);?> ..." data-trigger="hover" ><i class="fa fa-fw fa-puzzle-piece"></i> <b><?=$referans['baslik'];?></b></a>
                <p class="pull-right">
                	
                    <a class="text-info" title="Güncelle" href="_referans-guncelle?id=<?=$referans['id'];?>"><i class="fa fa-fw fa-pencil"></i></a>
									<a class="btn-ajax-confirm text-danger" frm="referansSil" data-id="<?=$referans['id'];?>" title="Sil" style="cursor:pointer;"><i class="fa fa-fw fa-eraser"></i></a>
									
									<a class="btn-ajax-confirm text-<?=$referans['onay']?'info':'danger';?>" frm="referansOnayla" data-id="<?=$referans['id'];?>" title="Onayla" style="cursor:pointer;"><i class="fa fa-fw fa-<?=$referans['onay']?'check':'circle-o';?>"></i></a>
							
                </p>
                <hr />
               <img src="_rsm/_referans/<?=$referans['resim'];?>" class="img-rounded img-responsive" /></td>
            	
            	
            	
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
</section>