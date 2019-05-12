<?php require('_inc.php'); ?>
<!DOCTYPE html>
<html>
<head>
<?php require('_inc/_head.php'); ?>
</head>
<body>
<?php if($ayarlar['umenu']) require('_inc/_umenu.php'); ?>
<section id="site" class="container">
  
  <header>
    <div id="baslik"> 
     <?php require('_inc/_baslik.php'); ?>
    </div>
    <nav id="menu" class="navbar-inverse"><?php require('_inc/_menu.php'); ?></nav>
  </header>
  
  <?php require('_inc/_sayfayolu.php'); ?> 
  <?php require('_sayfa.php'); ?>
  
  <footer class="row text-center" style="margin:0px;">
  <?php require('_inc/_alt.php'); ?>
  </footer>
  
</section>
<?php require('_inc/_script.php');?>
<div id="mesaj" style="display:none;">
    <div id="alert" ></div><div class="alert" role="alert">
<button type="button" class="close" ><span aria-hidden="true">&times;</span></button><p></p></div>
</div>
<?php $ifo = null;
unset($ifo);
?>
</body>
</html>