<?php defined( '_ERISIM' ) or die( 'Erisim engellendi!' );?>
<div class="col-md-4">
  <h4 class="well" style="color:#09F">DÖVİZ KURLARI</h4>
  <p><script type="text/javascript">
var para_birimleri="USD-EUR-GBP";
var arka_plan="FFFFFF";
var cerceve="333333";
var kutucuk="FFFFFF";
var piyasa_baslik="FFFFFF";
var tur_baslik="999999";
var fiyat_baslik="CC3300";
var kutu_kose="kare";
var genislik="300";
var bankalar="acik";
var paylasim="kapali";
</script>
<div style="width:120px;font-size:12px;text-align:right;"><a name="piyasadoviz" target="_blank"  href="http://www.piyasadoviz.com/tcmb">merkez bankası</a></div><script type="text/javascript" charset="iso-8859-9" src="http://eklenti.piyasadoviz.com/doviz.js"></script>
  </p>
</div>
<div class="col-md-4">
  <h4 class="well" style="color:#09F">ÖNEMLİ HİSSE SENETLERİ</h4>
  <p><iframe frameborder="0" scrolling="no"  width="439" allowtransparency="true" marginwidth="0" marginheight="0" src="https://ssleqrates.forexprostools.com/index.php?force_lang=10&pairs_ids=23641;22982;23552;22983;23640;23349;23343;&header-text-color=%23FFFFFF&curr-name-color=%230059b0&inner-text-color=%23000000&green-text-color=%232A8215&green-background=%23B7F4C2&red-text-color=%23DC0001&red-background=%23FFE2E2&inner-border-color=%23CBCBCB&border-color=%23cbcbcb&bg1=%23F6F6F6&bg2=%23ffffff&open=hide&change_in_percents=hide&last_update=hide"></iframe><div style="width:439px;"><span><span style="font-size: 11px;color: #333333;text-decoration: none;"></div></p>
  
</div>
<div class="col-md-4 " >
  <h4 class="well" style="color:#09f">KONUT KREDİSİ HESAPLAMA </h4>
		<script type="text/javascript" src="_js/kredi.js"></script>
<script type="text/javascript">kredipazari_displayCalc();</script>
  </div>
<?php if($ayarlar['copyright']) {?>
<div class="col-lg-12">
  <hr>
  <p><?=$ayarlar['copyright'];?></p>
</div>
<?php }?>