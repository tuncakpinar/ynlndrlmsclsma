<?php defined( '_ERISIM' ) or die( 'Erisim engellendi!' );?>
<!-- /sağ bölüm-->

      <?php 
	  		if($ayarlar['uyelik']) {
			if(empty($_SESSION['yetki'])){	
	  ?>
      <form class="navbar-form navbar-right" role="form" id="frmGiris" method="post">
        <input name="frm" value="giris" type="hidden" />
        <div class="form-group">
          <input name="email"  required type="email" placeholder="Email" class="form-control input-sm radius0">
        </div>
        <div class="form-group">
          <input name="sifre" required type="password" placeholder="Şifre" class="form-control input-sm radius0">
        </div>
        <div class="btn-group">
          <button id="btnGiris" type="submit" class="btn btn-info btn-sm radius0"> <i class="fa fa-check-square-o"></i>  Giriş </button>
          <a href="unuttum" type="button" class="btn btn-info btn-sm radius0"> <i class="fa fa-question"></i> Unuttum </a>
          <a href="yeniUye" type="button" class="btn btn-info btn-sm radius0"> <i class="fa fa-user"></i> Yeni Üye </a>
        </div>
      </form>
      <?php }else{?>
      <ul class="nav navbar-nav navbar-right">
        <li>
			<a>Hoşgeldin,
			<?php
				if($_SESSION['yetki']==1) echo ' admin ';
				else if($_SESSION['yetki']==2) echo ' editör ';
				else if($_SESSION['yetki']==3) echo ' üye ';
				echo $_SESSION['adi'];
			?>
			</a>
		</li>
        <li><a href="profilim"><i class="fa fa-user "></i> Profilim</a></li>
        <li><a style="cursor:pointer;" id="btnCikis"><i class="fa fa-power-off"></i> Çıkış</a></li>
      </ul>
      <?php }} ?>
      
