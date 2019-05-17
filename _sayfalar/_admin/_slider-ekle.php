<?php 
	defined( '_ERISIM' ) or die( 'Erisim engellendi!' );
	ifo::yetki('1');
?>
	<section id="icerik" class="buyuk">
        
    	<h4 class="well">
        	YENİ SLIDER
            <p class="pull-right">
            	<a href="_slider">
                	<i class="fa fa-fw fa-chevron-left"></i> Geri
                </a>
            </p>
        </h4>
        
        <form method="post" id="ajaxForm">
				<input type="hidden" name="frm" value="sliderEkle"/>
				<div class="col-md-12">
					<label><input type="checkbox" class="icheck" name="onay" value="1" checked/> ONAY</label>
				</div>
				<div class="form-group col-md-12">
					<label class="control-label">Başlık:</label><br />
					<input type="text" class="form-control" placeholder="Slider Başlığı" name="baslik" required/>
				</div>
                <div class="form-group col-md-12">
            		Açıklama <br>
                	<textarea class="form-control" id="igiris" name="aciklama"></textarea>
           		 </div>
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div class="input-group">
						<span class="input-group-btn">
							<span class="btn btn-primary btn-file btn-md">
								Seç&hellip; <input type="file" name="slider" required>
							</span>
						</span>
						<input type="text" class="form-control input-md" required readonly>
					</div>
					<span class="help-block">
						Yeni Slider'i Yüklemek İçin Seç'e Tıkla. <span class="text-danger">Maksimum Boyut 1980x800 px ve Maksimum boyut 1 mb olmalı.</span>
					</span>
				</div>
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<button type="submit" class="btn btn-primary btn-sm full">Ekle</button>
				</div>
				<div class="col-lg-12 col-sm-12 col-xs-12 progressbar" style="margin-top:10px; display:none;">
					<div class="progress progress-striped active">
					    <div class="progress-bar progress-bar-striped" role="progressbar"></div>
					</div>
				</div>
			</form>
        
    </section>