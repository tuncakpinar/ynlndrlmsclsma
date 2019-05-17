<?php 
	defined( '_ERISIM' ) or die( 'Erisim engellendi!' );
	$sorgu=$ifo->sec('*','yorumlar','ana=1 AND onay=1')->oku(false);
?>
	<section id="icerik" class="buyuk">
         <?php foreach($sorgu as $yorumlar) { ?>
             <div class="panel panel-default"> 
        		<div class="panel-body">
            		<div class="col-md-12">
              			<h4><a href="<?=$yorumlar['link'];?>"><?=$yorumlar['baslik'];?></a></h4>
              			<p class="text-danger">
              				<i class="fa fa-clock-o"></i>
             				<?=$ifo::tarih($yorumlar['tarih']); ?>
                            
                            <?php if($yorumlar['firma']): ?>
                				<i class="fa fa-building"></i> <?=$yorumlar['firma'];?>
                            <?php
								endif;
								if($yorumlar['adsoyad']): ?>
                					<i class="fa fa-user"></i> <?=$yorumlar['adsoyad'];?>
                            <?php
								endif;
							?>
              			</p>
              			<div class="row info-list">
                			<div class="col-sm-12>">
                    		<p><?=$yorumlar['metin'];?></p>
                   		 	</div>
             			 </div>
            		</div>
      			</div>
            </div>
    		<?php }//foreach ?>
            <a href="_yorumekle" class="btn btn-lg btn-info">Yorum Ekle</a>
	</section>