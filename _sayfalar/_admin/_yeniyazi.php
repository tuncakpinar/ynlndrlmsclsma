﻿<?php 
	defined( '_ERISIM' ) or die( 'Erisim engellendi!' );
	ifo::yetki('1');
?>
	<section id="icerik" class="buyuk">
        
    	<h4 class="well">
        	YENİ YAZI
            <p class="pull-right">
            	<a href="_yazilar">
                	<i class="fa fa-fw fa-chevron-left"></i> Geri
                </a>
            </p>
        </h4>
        
        <form id="frm" method="post">
        	<input type="hidden" name="frm" value="yeniIcerik" />
        	<input type="hidden" name="uid" value="<?=$_SESSION['id']?>" />
            <div class="checkbox form-group col-md-12">
            	<label><input  type="checkbox" value="1" name="onay"/> Onayla</label>
            </div>
            
            <div class="form-group col-md-12">
            	Kategori <br>
                <select class="form-control" name="kid" required>
                	<?=$ifo->options('kategoriler',2);?>
                </select>
            </div>
            
            <div class="form-group col-md-12">
            	Başlık <br>
                <input name="baslik" type="text" required class="form-control" placeholder="İçerik başlığı..." />
            </div>
            
            <div class="form-group col-md-12">
            	Giriş <br>
                <textarea class="form-control" id="igiris" name="giris"></textarea>
            </div>
            <div class="form-group col-md-12">
            	Metin 
                <textarea class="form-control" id="imetin" name="metin"></textarea>
            </div>
            <div class="form-group col-md-12">
            	Tarih <br>
                	<div class="input-group">
                    	<span class="input-group-btn">
                        	<button type="button" class="btn btn-default btn-tarih"><i class="fa fa-fw fa-calendar"></i></button>
                        </span>
                  		<input name="tarih" type="text" required class="form-control tarih" placeholder="<?=$ifo->suan;?>" />
                  </div>
            </div>
            <div class="form-group col-md-12">
            	Yetkiler <br>
                <select class="form-control" name="yetkiler[]" size="5" multiple >
                	<?php
						echo $ifo->options('yetkiler',5);
					?>
                </select>
            </div>
            <div class="form-group col-md-12">
            	<button type="submit" class="btn btn-primary">Kaydet</button>
            </div>
            
        </form>
        
    </section>