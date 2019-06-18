<?php 
	defined( '_ERISIM' ) or die( 'Erisim engellendi!' );
	ifo::yetki('1');
	$id=@$_GET['id'];
	$ic=$ifo->sec('p.*','portfoylerim AS p',"p.id=$id")->oku();
?>
	<section id="icerik" class="buyuk">
        
    	<h4 class="well">
        	PORTFÖY GÜNCELLE
            <p class="pull-right">
            	<a href="_aportföylerim">
                	<i class="fa fa-fw fa-chevron-left"></i> Geri
                </a>
            </p>
        </h4>
        
        <form method="post" id="ajaxForm" data-toggle="validator">
				<input type="hidden" name="frm" value="portfoyGuncelle"/>
				<input type="hidden" name="id" value="<?=$id?>"/>
				
				<div class="form-group col-md-12">
					<label class="control-label">Başlık:</label><br />
					<input type="text" class="form-control" placeholder="Portföy Başlığı" name="baslik" value="<?=$ic['baslik']?>" required/>
				</div>
				<div class="form-group col-md-12">
					<label class="control-label">Açıklama:</label><br />
					<textarea class="form-control" id="igiris" name="aciklama"><?=$ic['aciklama'];?></textarea>
				</div>
				<div class="form-group col-md-12">
					<label class="control-label">Şu Anki Resim:</label>
					<a href="_rsm/portfoy/<?=$ic['resim']?>" data-lightbox="image-1">
						<img src="_rsm/portfoy/<?=$ic['resim']?>" alt="Portföy Resmi" class="img-responsive img-thumbnail">
					</a>
				</div>
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div class="input-group">
						<span class="input-group-btn">
							<span class="btn btn-primary btn-file btn-md">
								Seç&hellip; <input type="file" name="portfoy">
							</span>
						</span>
						<input type="text" class="form-control input-md" readonly>
					</div>
					<span class="help-block">
						Yeni Portföy'ü Yüklemek İçin Seç'e Tıkla <span class="text-danger">Maksimum Boyut 1980x800 px olmalı.</span>
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