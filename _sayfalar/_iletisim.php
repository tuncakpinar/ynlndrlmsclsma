<?php defined( '_ERISIM' ) or die( 'Erisim engellendi!' );?>

<section id="icerik" class="buyuk"> 
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;language=tr"></script> 
  <script type="text/javascript">
        var mapyw0;
        google.maps.event.addDomListener(window, 'load', function(){
            var mapOptions = {'zoom':16,'center':new google.maps.LatLng(<?=$iletisim['koordinat'];?>)};
            mapyw0 = new google.maps.Map(document.getElementById('map-canvas-yw0'),mapOptions);
            var markeryw0 = new google.maps.Marker({'title':'<?=$ayarlar['adi'];?>','position':new google.maps.LatLng(<?=$iletisim['koordinat'];?>),'map':mapyw0});
            var infowindowyw0 = new google.maps.InfoWindow({content: '<?=$ayarlar['adi'];?>'});
            google.maps.event.addListener( markeryw0, 'click', function() {infowindowyw0.open(mapyw0,markeryw0);});
        });
</script> 
  
  <div class="row"> 
    <div class="col-md-6">
      <h3 class="well well-sm">İletişim Bilgileri</h3>
      <h4>
        <?=$ayarlar['adi']?>
      </h4>
      <?=$iletisim['adres']?'<p>'.$iletisim['adres'].'</p>':'';?>
      <?=$iletisim['tel']?'<p><i class="fa fa-phone"></i> '.substr($iletisim['tel'],0,4).' '.substr($iletisim['tel'],4,3).' '.substr($iletisim['tel'],7,2).' '.substr($iletisim['tel'],9,2).'</p>':'';?>
      <?=$iletisim['fax']?'<p><i class="fa fa-fax"></i> '.substr($iletisim['fax'],0,4).' '.substr($iletisim['fax'],4,3).' '.substr($iletisim['fax'],7,2).' '.substr($iletisim['fax'],9,2).'</p>':'';?>
      <?=$iletisim['gsm']?'<p><i class="fa fa-mobile-phone"></i> '.substr($iletisim['gsm'],0,4).' '.substr($iletisim['gsm'],4,3).' '.substr($iletisim['gsm'],7,2).' '.substr($iletisim['gsm'],9,2).'</p>':'';?>
      <?=$iletisim['email']?'<p><i class="fa fa-envelope-o"></i> <a href="mailto:'.$iletisim['email'].'">'.$iletisim['email'].'</a></p>':'';?>
      <?php if($iletisim['facebook'] or $iletisim['linkedin'] or $iletisim['twitter'] or $iletisim['google-plus']) {?>
      <ul class="list-unstyled list-inline list-social-icons">
        <?=$iletisim['facebook']?'<li><a  href="'.$iletisim['facebook'].'"><i class="fa fa-facebook-square fa-2x"></i></a> </li>':'';?>
        <?=$iletisim['linkedin']?'<li><a  href="'.$iletisim['linkedin'].'"><i class="fa fa-linkedin-square fa-2x"></i></a> </li>':'';?>
        <?=$iletisim['twitter']?'<li><a  href="'.$iletisim['twitter'].'"><i class="fa fa-twitter-square fa-2x"></i></a> </li>':'';?>
        <?=$iletisim['google_plus']?'<li><a " href="'.$iletisim['google_plus'].'"><i class="fa fa-google-plus-square fa-2x"></i></a> </li>':'';?>
      </ul>
      <?php }?>
      <div style="width: 100%;height: 400px;">
        <div style="width:100%;height:100%" id="map-canvas-yw0"></div>
      </div>
    </div>
    <div class="col-md-6">
      <h3 class="well well-sm">Bize Ulaşın</h3>
      <form  id="frm" method="post">
      	<input type="hidden" name="frm" value="iletisim"/>
        <div class="control-group form-group">
          <div class="controls">
            <label>Ad Soyad:</label>
            <input type="text" class="form-control radius0" name="adi" required />
            
          </div>
        </div>
        <div class="control-group form-group">
          <div class="controls">
            <label>Telefon:</label>
            <input type="tel" class="form-control radius0" name="tel" required />
          </div>
        </div>
        <div class="control-group form-group">
          <div class="controls">
            <label>Email Adresi:</label>
            <input type="email" class="form-control radius0" name="email" required />
          </div>
        </div>
        <div class="control-group form-group">
          <div class="controls">
            <label>Mesaj:</label>
            <textarea name="mesaj" rows="12" cols="100" class="form-control radius0"  required  maxlength="999" style="resize:none"></textarea>
          </div>
        </div>
        <div id="success"></div>
        <button type="submit" class="btn btn-info">Mesajı Gönder</button>
      </form>
    </div>
  </div>
</section>
