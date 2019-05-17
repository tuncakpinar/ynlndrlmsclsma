<?php defined( '_ERISIM' ) or die( 'Erisim engellendi!' );?>
<?php
	if($ayarlar['aside']) {require('_inc/_aside.php');$boyut='kucuk';}else $boyut='buyuk';
?>
<section id="icerik" class="<?=$boyut;?>">
    <?php if($ayarlar['slider']) require('_inc/_slider.php'); ?>
    
    <div class="row">
        <article class="col-md-10"> <?php require('_inc/_article.php'); ?></article>
        <aside class="col-md-2">
            <div class="list-group">
            	<a class="list-group-item" href="javascript:;">
                	<h4 class="text-center">Yazarlarımız</h4>
                </a>
            	<?php
					$authors = $ifo->sec('u.*', 'yazilar AS y JOIN uyeler AS u ON u.id = y.uid GROUP BY y.uid')->oku(false);
					foreach($authors AS $author):
				?>
                        <div class="list-group-item" href="_yazilarh" style="overflow:auto;">
                        
                        	<div class="media">
                              <div class="media-left media-middle">
                                <a href="_yazilarh">
                                  <img class="media-object" style="width:64px;height:auto;" src="_rsm/<?=$author['resim']?>" alt="<?=$author['adi']?>">
                                </a>
                              </div>
                              <div class="media-body">
                                <a href="_yazilarh"><h5 class="media-heading"><?=$author['adi']?></h5></a>
                              </div>
                            </div>
                        </div>
                <?php
					endforeach;
				?>
                
            </div>
       
        </aside>
	</div>
</section>