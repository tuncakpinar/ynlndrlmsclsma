<?php 
	defined( '_ERISIM' ) or die( 'Erisim engellendi!' );
	$sorgu=$ifo->sec('*','referanslar','ana=1 AND onay=1')->oku(false);
?>
	<section id="icerik" class="buyuk">
            <?php foreach($sorgu as $referanslar) { ?>
             <div class="panel panel-default"> 
        		<div class="panel-body">
            		<div class="col-md-12">
              			<h4><a href="<?=$referanslar['link'];?>"><?=$referanslar['baslik'];?></a></h4>
              			<p class="text-danger">
              				<i class="fa fa-clock-o"></i>
             				<?=$ifo::tarih($referanslar['tarih']);?>
                			<i class="fa fa-user"></i> <?=$referanslar['adi'];?>
              			</p>
              			<div class="row info-list">
                			<div class="col-sm-12>">
                    		<p><?=$referanslar['giris'];?></p>
							<?php if($referanslar['metin']){?>
                				<p class="pull-right"><a class="btn btn-default" href="<?=$referanslar['link'];?>"> Devamı <i class="fa fa-angle-right"></i> </a> 
                			</p>
                    		<?php }//if ?>
                   		 	</div>
             			 </div>
            		</div>
      			</div>
            </div>
    		<?php }//foreach ?>
            <a href="_referans-ekle">Referans Ekle</a>
	</section>