<?php 
	defined( '_ERISIM' ) or die( 'Erisim engellendi!' );
	ifo::yetki('1');
	$id=@$_GET['id'];
	$ic=$ifo->sec('s.onay,s.baslik,s.aciklama,s.resim','slider AS s',"s.id=$id")->oku();
?>
	<section id="icerik" class="buyuk">
        
    	<h4 class="well">
        	SLIDER GÜNCELLE
            <p class="pull-right">
            	<a href="_slider">
                	<i class="fa fa-fw fa-chevron-left"></i> Geri
                </a>
            </p>
        </h4>
        
        <form method="post" id="ajaxForm" data-toggle="validator">
				<input type="hidden" name="frm" value="sliderGuncelle"/>
				<input type="hidden" name="id" value="<?=$id?>"/>
				<div class="col-md-12">
					<label><input type="checkbox" class="icheck" name="onay" value="1" <?=($ic['onay'])?'checked':''?>/> ONAY</label>
				</div>
				<div class="form-group col-md-12">
					<label class="control-label">Başlık:</label><br />
					<input type="text" class="form-control" placeholder="Slider Başlığı" name="baslik" value="<?=$ic['baslik']?>" required/>
				</div>
				<div class="form-group col-md-12">
					<label class="control-label">Açıklama:</label><br />
					<textarea class="form-control" id="igiris" name="aciklama"><?=$ic['aciklama'];?></textarea>
				</div>
				<div class="form-group col-md-12">
					<label class="control-label">Şu Anki Resim:</label>
					<a href="_rsm/_slider/<?=$ic['resim']?>" data-lightbox="image-1">
						<img src="_rsm/_slider/<?=$ic['resim']?>" alt="Slider Resmi" class="img-responsive img-thumbnail">
					</a>
				</div>
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div class="input-group">
						<span class="input-group-btn">
							<span class="btn btn-primary btn-file btn-md">
								Seç&hellip; <input type="file" name="slider">
							</span>
						</span>
						<input type="text" class="form-control input-md" readonly>
					</div>
					<span class="help-block">
						Yeni Slider'i Yüklemek İçin Seç'e Tıkla <span class="text-danger">Maksimum Boyut 1980x800 px olmalı.</span>
					</span>
				</div>
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<button type="submit" class="btn btn-primary btn-sm full">Güncelle</button>
				</div>
				<div class="col-lg-12 col-sm-12 col-xs-12 progressbar" style="margin-top:10px; display:none;">
					<div class="progress progress-striped active">
					    <div class="progress-bar progress-bar-striped" role="progressbar"></div>
					</div>
				</div>
			</form>
        
             
     
    </section>