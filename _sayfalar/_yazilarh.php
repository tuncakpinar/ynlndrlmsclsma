<?php 
	defined( '_ERISIM' ) or die( 'Erisim engellendi!' );
	$sorgu=$ifo->sec('y.*,u.adi','yazilar AS y JOIN uyeler AS u ON u.id = y.uid','y.ana=1 AND y.onay=1')->oku(false);
?>
	<section id="icerik" class="buyuk">
            <?php foreach($sorgu as $yazilar) { ?>
             <div class="panel panel-default"> 
        		<div class="panel-body">
            		<div class="col-md-12">
              			<h4><a href="<?=$yazilar['link'];?>"><?=$yazilar['baslik'];?></a></h4>
              			<p class="text-danger">
              				<i class="fa fa-clock-o"></i>
             				<?=$ifo::tarih($yazilar['tarih']);?>
                			<i class="fa fa-user"></i> <?=$yazilar['adi'];?>
              			</p>
              			<div class="row info-list">
                			<div class="col-sm-12>">
                    		<p><?=$yazilar['giris'];?></p>
							<?php if($yazilar['metin']){?>
                				<p class="pull-right"><a class="btn btn-default" href="<?=$yazilar['link'];?>"> Devamı <i class="fa fa-angle-right"></i> </a> 
                			</p>
                    		<?php }//if ?>
                   		 	</div>
             			 </div>
            		</div>
      			</div>
            </div>
    		<?php }//foreach ?>
            
	</section>