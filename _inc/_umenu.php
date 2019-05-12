<?php defined( '_ERISIM' ) or die( 'Erisim engellendi!' );?>
<div class="navbar navbar-fixed-top navbar-default" role="navigation">
    
    <div class="container" >
      
      <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span><span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="anasayfa"> <i class="fa fa-bolt"></i> <?=$ayarlar['adi'];?></a> </div>
    
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="iletisim"><i class="fa fa-phone-square"></i> İletişim</a></li>
        <?php if(@$_SESSION['yetki']==1) {?>
        <li><a href="ayarlar"><i class="fa fa-cog"></i> Ayarlar</a></li>
        <?php }?>
      </ul>
        <div id="amenu">
        <?php require('_inc/_menu.php'); ?>
        </div>
        <!-- /sağ bölüm--> 
        <div id="giris">
          <?php require('_inc/_giris.php'); ?>
        </div>
      </div>
      <!-- /.nav-collapse --> 
    </div>
    <!-- /.container --> 
  </div>
<!-- /.navbar --> 
