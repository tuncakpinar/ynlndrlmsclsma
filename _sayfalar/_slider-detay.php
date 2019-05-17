<?php defined( '_ERISIM' ) or die( 'Erisim engellendi!' );
$id=@$_GET['id'];
$slider=$ifo->sec('*','slider','id='.$id)->oku();
?>

<section id="icerik" class="buyuk">
	<img src="_rsm/_slider/<?=$slider['resim'];?>" class="img-responsive" style="width:100%;height:auto;"/>
    <h2 align="center"><a href="_slider-detay?id=<?=$id;?>"target="_blank"><?=$slider['baslik'];?> </a></h2>
    <p><?=$slider['aciklama'];?></p>
</section>