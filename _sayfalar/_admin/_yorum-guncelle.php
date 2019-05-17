<?php 
	defined( '_ERISIM' ) or die( 'Erisim engellendi!' );
	ifo::yetki(1);
	
	$id = ifo::kontrol($_GET['id'], 'int');
	if(!$query = $ifo->sec('*', 'yorumlar', "id={$id}")->oku()){
		exit();
	}
	
?>
	<section id="icerik" class="buyuk">
        
    	<h4 class="well">
        	Yorum Güncelle
            <p class="pull-right">
            	<a href="_asizdengelenler">
                	<i class="fa fa-fw fa-chevron-left"></i> Geri
                </a>
            </p>
        </h4>
        
        <form id="frm" method="post">
        	<input type="hidden" name="frm" value="yorumGuncelle" />
            <input type="hidden" name="id" value="<?=$query['id']?>" />
            
           
            
            <div class="form-group col-md-12">
            	Firma Adı <br>
                <input name="firma" type="text" required class="form-control" placeholder="Firma Adı" value="<?=$query['firma']?>" required/>
            </div>
             <div class="form-group col-md-12">
            	Ad Soyad <br>
                <input name="adsoyad" type="text" required class="form-control" placeholder="Ad Soyad" value="<?=$query['adsoyad']?>" required/>
            </div>
             <div class="form-group col-md-12">
            	Ünvan <br>
                <input name="unvan" type="text" required class="form-control" placeholder="Ünvan" value="<?=$query['unvan']?>" required/>
            </div>
            <div class="form-group col-md-12">
            	Başlık <br>
                <input name="baslik" type="text" required class="form-control" placeholder="Yorum başlığı..." value="<?=$query['baslik']?>" />
            </div>
            
            <div class="form-group col-md-12">
            	Giriş <br>
                <textarea class="form-control" id="igiris" name="giris"><?=$query['giris']?></textarea>
            </div>
            <div class="form-group col-md-12">
            	Metin <br>
                <textarea class="form-control" id="imetin" name="metin"><?=$query['metin']?></textarea>
            </div>
            <div class="form-group col-md-12">
            	<button type="submit" class="btn btn-primary">Kaydet</button>
            </div>
            
        </form>
        
    </section>