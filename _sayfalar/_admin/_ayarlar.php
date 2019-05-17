<?php 
	defined( '_ERISIM' ) or die( 'Erisim engellendi!' );
	ifo::yetki('1');
?>
<section id="icerik" class="buyuk">
<form id="frm" method="post">
	<input  type="hidden" name="frm" value="siteAyarlar"/>
	
    <h4 class="well">
        	SİTE AYARLARI
            <p class="pull-right">
            	<a href="anasayfa">
                	<i class="fa fa-fw fa-chevron-left"></i> Geri
                </a>
            </p>
        </h4>
        <?php 
			$ayarlars=$ifo->sec('*','ayarlar',"aktif=1")->oku();
			$iletisims=$ifo->sec('*','iletisim',"aktif=1")->oku();
		?>
        <input  type="hidden" name="ida" value="<?=$ayarlars['id'];?>"/>
        <input  type="hidden" name="idi" value="<?=$iletisims['id'];?>"/>
        <h4>AYARLAR</h4>
     <div class="form-group col-md-12">
            	SİTE ADI <br>
                <input name="adi" type="text" required class="form-control" placeholder="Site adı" value="<?=$ayarlars['adi'];?>"/>
            </div>
     <div class="form-group col-md-12">
            	SİTE ADRESİ <br>
                <input name="adres" type="text" required class="form-control" placeholder="Site adresi" value="<?=$ayarlars['adres'];?>"/>
            </div>
     <div class="form-group col-md-12">
            	SLOGAN<br>
                <input name="slogan" type="text" required class="form-control" placeholder="Slogan" value="<?=$ayarlars['slogan'];?>"/>
            </div>
     <div class="form-group col-md-12">
            	AÇIKLAMA<br>
                <textarea name="aciklama" type="text" required class="form-control" placeholder="Açıklama" ><?=$ayarlars['aciklama'];?></textarea>
            </div>
     <div class="form-group col-md-12">
            	ANAHTAR KELİMELER<br>
                <textarea name="kelimeler" type="text" required class="form-control" placeholder="Anahtar Kelimeler" ><?=$ayarlars['kelimeler'];?></textarea>
            </div>
     <div class="form-group col-md-12">
            	HAKKIMIZDA<br>
                <textarea name="hakkimizda" type="text" required class="form-control" placeholder="Hakkımızda yazısı..." ><?=$ayarlars['hakkimizda'];?></textarea>
            </div>
                 <div class="form-group col-md-12">
            	SÜTUN SAYISI<br>
                <input name="sutun" type="number" required min="1" max="4" class="form-control" value="<?=$ayarlars['sutun'];?>"/>
            </div>
                 <div class="form-group col-md-12">
            	İÇERİK SAYISI<br>
                <input name="say" type="number" required min="1" max="50" class="form-control"  value="<?=$ayarlars['say'];?>"/>
            </div>
                 <div class="form-group col-md-12">
            	COPYRIGHT<br>
                <input name="copyright" type="text" required class="form-control" placeholder="Copyright" value="<?=$ayarlars['copyright'];?>"/>
            </div>
            <div class="checkbox form-group col-md-12">
            	<label><input <?=$ayarlars['umenu']?'checked':'';?> type="checkbox" value="1" name="umenu"/> Üst Menü</label>
            	<label><input <?=$ayarlars['uyelik']?'checked':'';?> type="checkbox" value="1" name="uyelik"/> Üyelik</label>
            	<label><input <?=$ayarlars['slider']?'checked':'';?> type="checkbox" value="1" name="slider"/> Slider</label>
            	<label><input <?=$ayarlars['aside']?'checked':'';?> type="checkbox" value="1" name="aside"/> Aside</label>
            	
            </div>
			<h4>İLETİŞİM</h4>
            <div class="form-group col-md-12">
            	ADRES <br>
                <input name="iadres" type="text" required class="form-control" placeholder="İletişim Adresi" value="<?=$iletisims['adres'];?>"/>
            </div>
                        <div class="form-group col-md-12">
            	KOORDİNAT <br>
                <input name="koordinat" type="text" required class="form-control" placeholder="Koordinat" value="<?=$iletisims['koordinat'];?>"/>
            </div>
                        <div class="form-group col-md-12">
            	TEL <br>
                <input name="tel" type="tel"  class="form-control" placeholder="Telefon" value="<?=$iletisims['tel'];?>"/>
            </div>
            <div class="form-group col-md-12">
            	FAX <br>
                <input name="fax" type="tel"  class="form-control" placeholder="Fax" value="<?=$iletisims['fax'];?>"/>
            </div>
            <div class="form-group col-md-12">
            	GSM <br>
                <input name="gsm" type="tel"  class="form-control" placeholder="Gsm" value="<?=$iletisims['gsm'];?>"/>
            </div>
            <div class="form-group col-md-12">
            	E-POSTA <br>
                <input name="email" type="email" required class="form-control" placeholder="İletişim Epostası" value="<?=$iletisims['email'];?>"/>
            </div>
            <div class="form-group col-md-12">
            	FACEBOOK <br>
                <input name="facebook" type="url"  class="form-control" placeholder="Facebook" value="<?=$iletisims['facebook'];?>"/>
            </div>
            <div class="form-group col-md-12">
            	LINKEDIN <br>
                <input name="linkedin" type="url"  class="form-control" placeholder="Linkedin" value="<?=$iletisims['linkedin'];?>"/>
            </div>
            <div class="form-group col-md-12">
            	TWITTER <br>
                <input name="twitter" type="url"  class="form-control" placeholder="Twitter" value="<?=$iletisims['twitter'];?>"/>
            </div>
            <div class="form-group col-md-12">
            	GOOGLE-PLUS <br>
                <input name="google_plus" type="url"  class="form-control" placeholder="Google-Plus" value="<?=$iletisims['google_plus'];?>"/>
            </div>
			<div class="form-group col-md-12">
            	<button class="btn btn-block btn-info btn-lg"><i class="fa fa-floppy-o"></i> Kaydet</button>
            </div>

</form>
</section>