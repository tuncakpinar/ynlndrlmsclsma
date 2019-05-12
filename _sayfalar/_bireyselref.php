<article>
	<div style="overflow:auto; margin-bottom:20px;">
    	<?php
			$referances = $ifo->sec('*', 'referanslar AS r', 'r.onay = 1 and r.tip = 1')->oku(false);
			foreach($referances AS $referance):
		?>
                <div class="col-md-4">
                    <h4><?=$referance['baslik']?></h4>
                    <a href="_rsm/_referans/<?=$referance['resim']?>" data-lightbox="image-<?=$referance['id']?>" data-title="<?=strip_tags($referance['aciklama'])?>">
                    	<img src="_rsm/_referans/<?=$referance['resim']?>" class="img-rounded img-responsive"/>
                    </a>
                </div>
		<?php
			endforeach;	
		?>
    </div>
</article>