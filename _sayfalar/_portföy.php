<article>
	<div style="overflow:auto; margin-bottom:20px;">
    	<?php
			$portfoy = $ifo->sec('*', 'portfoylerim AS p', 'p.onay = 1 and p.tip = 1')->oku(false);
			foreach($portfoy AS $portfoy):
		?>
                <div class="col-md-4">
                    <h4><?=$portfoy['baslik']?></h4>
                    <a href="_rsm/portfoy/<?=$portfoy['resim']?>" data-lightbox="image-<?=$portfoy['id']?>" data-title="<?=strip_tags($portfoy['aciklama'])?>">
                    	<img src="_rsm/portfoy/<?=$portfoy['resim']?>" class="img-rounded img-responsive"/>
                    </a>
			<div style="margin-top:20px;"><button type="submit" class="btn btn-info"><a href="_yorumekle">Yorum Ekle</a></button></div>
                </div>
                
                <div>
                </div>
		<?php
			endforeach;	
		?>
    </div>
</article>