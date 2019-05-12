<?php defined( '_ERISIM' ) or die( 'Erisim engellendi!' );?>

<div id="slider" class="carousel slide"> 
  <?php
  	$ifo->sec('*','slider','onay=1');
	$indicators='';$items='';$i=0;
	while($slider=$ifo->oku()){
		$aktif=$slider['aktif']?'active':'';
		$indicators.='<li data-target="#slider" data-slide-to="'.$i.'" class="'.$aktif.'"></li>';$i++;
		$items.='<div class="item '.$aktif.'"><a href="_slider-detay?id='.$slider['id'].'"> <img  src="_rsm/_slider/'.$slider['resim'].'"/></a><div class="carousel-caption"><h3>'.$slider['baslik'].'</h3></div></div>';
	}
  ?>
  
  <!-- Indicators -->
  <ol class="carousel-indicators"><?=$indicators;?></ol>
  <!-- Wrapper for slides -->
  <div class="carousel-inner"><?=$items;?></div>
  
  <a class="left carousel-control" href="#slider" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a> 			<a class="right carousel-control" href="#slider" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a> </div>
<!-- carousel -->