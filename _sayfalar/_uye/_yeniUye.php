<?php defined( '_ERISIM' ) or die( 'Erisim engellendi!' );?>

<section id="icerik" class="buyuk">
	<form id="frm" method="post">
		<input type="hidden" name="frm" value="yeniUye">
		<input type="hidden" name="aktivasyonkodu" value="<?=$ifo->uret(5);?>">
		<div class="col-md-6">
			<h3>Yeni Üye</h3>
			
			<div class="form-group col-lg-12">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-user fa-2x fa-fw"></i>
					</span>
					<input name="adi" type="text" placeholder="Ad Soyad" required class="form-control input-lg" maxlength="60" />
				</div>
			</div>
			<div class="form-group col-lg-6">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-asterisk fa-2x fa-fw"></i>
					</span>
					<input id="sifre1" name="sifre1" type="password" placeholder="Şifre" required class="form-control input-lg" maxlength="60" />
				</div>
			</div>
			<div class="form-group col-lg-6">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-asterisk fa-2x fa-fw"></i>
					</span>
					<input id="sifre2" name="sifre2" type="password" placeholder="Şifre Tekrar" required class="form-control input-lg" maxlength="60" />
				</div>
			</div>
			<div class="form-group col-lg-12">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-envelope-o fa-2x fa-fw"></i>
					</span>
					<input name="email" type="email" placeholder="Email" required class="form-control input-lg" maxlength="60" />
				</div>
			</div>
			<div class="form-group col-lg-12" >
				<div id="hata" class="alert alert-danger alert-dismissable" style="display:none;">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p>Şifreler Uyuşmuyor!</p>
				</div>
			</div>

		</div>
		
		<div class="col-md-6">
			<h3>Üyelik Hakkında</h3>
			<p>Formu doldurduktan sonra "Kayıt Ol" butonuna basarak kayıt işlemini tamamlayınız.</p>
			<p>Kayıt işleminiz başarıyla gerçekleşirse, girdiğiniz eposta adresine mail onaylama linki gönderilecektir. Epostanıza gelen bağlantıya tıklayarak epostanızı onaylayınız.</p>
			<p>Herhangi bir sorun yaşadıysanız site yöneticisine <a href="iletisim">iletişim</a> bölümünden ulaşabilirsiniz.</p>
			<p>Sitemizi tercih ettiniz için teşekkür ederiz...</p>
			<button id="btnKayitOl" type="submit" class="btn btn-info">Kayıt Ol</button>
		</div>
	
	</form>
</section>