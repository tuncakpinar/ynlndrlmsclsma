<?php defined( '_ERISIM' ) or die( 'Erisim engellendi!' );?>
<?php 
	 $link=isset($_GET['link'])?$_GET['link']:'anasayfa';
	 echo $ifo->liste('menu',@$_GET['link']);
?>
