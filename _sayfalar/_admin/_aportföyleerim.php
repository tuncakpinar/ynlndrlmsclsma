<?php defined( '_ERISIM' ) or die( 'Erisim engellendi!' );
	ifo::yetki('1');
?>
<section id="icerik" class="buyuk">
	<h4 class="well">Portföyler <p class="pull-right"> <a href="_portfoyekle"><i class="fa fa-fw fa-plus"></i> Yeni Portföy</a></p></h4>
    
    <table id="datatable" class="table table-striped table-bordered">
    	<thead>
        	<tr>
            	
            	<th><i class="fa fa-fw fa-picture-o"></i> RESİM</th>
            	
            	
            </tr>
        </thead>
        <tbody>
        	<?php
            	$ifo->sec('p.*','portfoylerim AS p','1=1','id DESC');
				while($portföy=$ifo->oku()){
			?>
        	<tr>
            	<td >
                <a class="btn" href="_portfoygncll?id=<?=$portföy['id'];?>" data-toggle="popover" data-placement="bottom" data-title="Açıklama" data-content="<?=substr(strip_tags($portföy['aciklama']),0,250);?> ..." data-trigger="hover" ><i class="fa fa-fw fa-puzzle-piece"></i> <b><?=$portföy['baslik'];?></b></a>
                <p class="pull-right">
                	
                    <a class="text-info" title="Güncelle" href="_portfoygncll?id=<?=$portföy['id'];?>"><i class="fa fa-fw fa-pencil"></i></a>
									<a class="btn-ajax-confirm text-danger" frm="portfoySil" data-id="<?=$portföy['id'];?>" title="Sil" style="cursor:pointer;"><i class="fa fa-fw fa-eraser"></i></a>
									
									<a class="btn-ajax-confirm text-<?=$portföy['onay']?'info':'danger';?>" frm="portföyOnayla" data-id="<?=$portföy['id'];?>" title="Onayla" style="cursor:pointer;"><i class="fa fa-fw fa-<?=$portföy['onay']?'check':'circle-o';?>"></i></a>
							
                </p>
                <hr />
               <img src="_rsm/portfoy/<?=$portföy['resim'];?>" class="img-rounded img-responsive" /></td>
            	
            	
            	
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
</section>