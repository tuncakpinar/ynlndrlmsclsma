<?php 
	defined( '_ERISIM' ) or die( 'Erisim engellendi!' );
	$ic=$ifo->sec('s.onay,y.baslik,y.aciklama,y.metin','yorumlar AS y')->oku();
?>
	<section id="icerik" class="buyuk">
        
    	<h4 class="well">
        	Yeni Yorum
            <p class="pull-right">
            	<a href="_referans">
                	<i class="fa fa-fw fa-chevron-left"></i> Geri
                </a>
            </p>
        </h4>
        
        <form id="frm" method="post">
        	<input type="hidden" name="frm" value="yorumEkle" />
            <input type="hidden" value="1" name="ana"/>
            <input type="hidden" value="0" name="onay"/>
            <input type="hidden" value="<?=$ifo->suan;?>" name="tarih"/>
            <input type="hidden" value="2" name="kid"/>
            <input type="hidden" value="5" name="yetki"/>
            </div>
            
            <div class="form-group col-md-12">
            	Firma Adı <br>
                <input name="firma" type="text" required class="form-control" value="" placeholder="Firma Adı" required/>
            </div>
             <div class="form-group col-md-12">
            	Ad Soyad <br>
                <input name="adsoyad" type="text" required class="form-control" placeholder="Ad Soyad" required/>
            </div>
             <div class="form-group col-md-12">
            	Ünvan <br>
                <input name="unvan" type="text" required class="form-control" placeholder="Ünvan" required/>
            </div>
            <div class="form-group col-md-12">
            	Başlık <br>
                <input name="baslik" type="text" required class="form-control" placeholder="İçerik başlığı..." />
            </div>
            <div class="form-group col-md-12">
            	Metin <br>
                <textarea class="form-control" name="metin"></textarea>
            </div>
            <div class="form-group col-md-12">
            	<button type="submit" class="btn btn-primary">Ekle</button>
            </div>
            
        </form>
        
    </section>