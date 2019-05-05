<?php
  class ifo extends pdo
  {//intelligent functions object
	
	// SINIFIN DEĞİŞKENLERİ  
	private $sor;				// 	sorgu kaynağı   
	private $liste;			// 	istenen tablonun liste hali      
	public 	$sql; 			// 	sql sorgu cümlesi
	public 	$say;				// 	toplam kayıt sayısı
	public 	$hata;			// 	sorgu hataları
	public 	$sayfa;			// 	istenen sayfa numarası
	public 	$topsayfa; 	//	limete göre sayfa sayısı
	public 	$ip;				//	istemci ip adresi
	public 	$suan;			//	zaman Y-m-d G:i:s
	public 	$bugun;			//	zaman Y-m-d
	public 	$buyil;			//	zaman	Y
	
	// SINIFIN FONKSİYONLARI                  
  
	//statik fonksiyonlar
	static function sifrele($s)
	{//gönderilen değeri şifreleyerek geri döndürür
		return md5(md5(md5(trim($s))));
	}
	 
	static function tarih($t,$f='%d %B %Y, %A %H:%M')
	{//tarihi istenen formatta üretip geri döndürür
		$donustur = array(
			'Monday'	=> 'Pazartesi',
			'Tuesday'	=> 'Salı',
			'Wednesday'	=> 'Çarşamba',
			'Thursday'	=> 'Perşembe',
			'Friday'	=> 'Cuma',
			'Saturday'	=> 'Cumartesi',
			'Sunday'	=> 'Pazar',
			'January'	=> 'Ocak',
			'February'	=> 'Şubat',
			'March'		=> 'Mart',
			'April'		=> 'Nisan',
			'May'		=> 'Mayıs',
			'June'		=> 'Haziran',
			'July'		=> 'Temmuz',
			'August'	=> 'Ağustos',
			'September'	=> 'Eylül',
			'October'	=> 'Ekim',
			'November'	=> 'Kasım',
			'December'	=> 'Aralık',
			'Mon'		=> 'Pts',
			'Tue'		=> 'Sal',
			'Wed'		=> 'Çar',
			'Thu'		=> 'Per',
			'Fri'		=> 'Cum',
			'Sat'		=> 'Cts',
			'Sun'		=> 'Paz',
			'Jan'		=> 'Oca',
			'Feb'		=> 'Şub',
			'Mar'		=> 'Mar',
			'Apr'		=> 'Nis',
			'Jun'		=> 'Haz',
			'Jul'		=> 'Tem',
			'Aug'		=> 'Ağu',
			'Sep'		=> 'Eyl',
			'Oct'		=> 'Eki',
			'Nov'		=> 'Kas',
			'Dec'		=> 'Ara',
		);
		$tarih=strftime($f,strtotime($t));
		
		foreach($donustur as $en => $tr){
			$tarih = str_replace($en, $tr, $tarih);
		}
		
		return $tarih;
		
	}
	
	static function yetki($y=0,$k='s')
	{//yetkiye göre sayfayı görüntüleme iznini kontrol eder
		$y=explode(';',$y);
		if(empty($_SESSION['yetki']) or  ($y[0]>0 and !in_array($_SESSION['yetki'],$y))){
			if($k=='s') {die('<div style="padding:10px;font-size:20pt;"><div class="alert alert-danger">Bu sayfayı görüntüleme yetkiniz yok! Anasayfaya yönlendiriliyorsunuz...</div></div><meta http-equiv="refresh" content="1;URL=anasayfa">');}
			else {return false;}
		}
		elseif($k=='i'){return true;}
	}
	
	
	static function sonhata()
	{//sorgular sonucu oluşan son hatayı dizi olarak döndürür
		$hata = $this->errorInfo();if($hata[0] == 00000) return false;return $hata;
	}
	static function seflink($string)
	{
	  $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
	  $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
	  $string = strtolower(str_replace($find, $replace, $string));
	  $string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
	  $string = trim(preg_replace('/\s+/', ' ', $string));
	  $string = str_replace(' ', '-', $string);
	  return $string;
	}
	static function kontrol($deger, $tip='text', $tanimliDeger = "", $tanimsizDeger = "") 
	{// degerleri kontrol et temizle
	  $deger=trim($deger);
	  $deger = (!get_magic_quotes_gpc()) ? addslashes($deger) : $deger;
	  switch ($tip) {
		case "blob": case "string": case "text": case "VAR_STRING": case "STRING": case "BLOB":
		  $deger = ($deger != "") ? "'" . $deger . "'" : "NULL";
		  break;
		case "long": case "int":case "LONGLONG":case "LONG":case "TINY":case "SHORT":
		  $deger = ($deger != "") ? intval($deger) : "NULL";
		  break;
		case "double":case "DOUBLE":
		  $deger = ($deger != "") ? "'" . doubleval($deger) . "'" : "NULL";
		  break;
		case "date": case "datetime": case "DATETIME":case "DATE": case "TIMESTAMP":
		  $deger = ($deger != "") ? "'" . $deger . "'" : "NULL";
		  break;
		case "defined":
		  $deger = ($deger != "") ? $tanimliDeger : $tanimsizDeger;
		  break;
	  }
	  return $deger;
	}
	
	static function email($email='',$konu='',$mesaj='')
	{//phpmailer kullanarak mail gönderir
		$mail= new PHPMailer();
		$mail->IsSMTP(); 
		$mail->Host       = SMTP_HOST;
		$mail->SMTPDebug  = 1;                     
		$mail->SMTPAuth   = true;                 
		$mail->Host       = SMTP_HOST;    
		$mail->Port       = SMTP_PORT;
		$mail->CharSet = 'UTF-8';                   
		$mail->Username   = MAIL_KULLANICI;  
		$mail->Password   = MAIL_SIFRE;            
		$mail->SetFrom(MAIL_KULLANICI, MAIL_GONDEREN);				  
		$mail->Subject    = $konu;				  
		$mail->MsgHTML($mesaj);
		$mail->AddAddress($email, 'Üye');
		return($mail->Send());
	}
	
	//rastgele sayı üreten fonksiyon
	public function uret($kackarakter) 
	{ 
		$char="abcdefghijklmnoprstuwvyzqxABCDEFGHIJKLMNOPRSTUVWYZQX1234567890"; // İzin verilen karakterler
		for ($k=1;$k<=$kackarakter;$k++) 
		{ 
			$h=substr($char,mt_rand(0,strlen($char)-1),1); 
			$s.=$h; 
		}  
		return $s; 
	}
	
	//yapıcı fonksiyon
	public function __construct()
	{	$this->varsayılan();
	  $dns = 'mysql'.':dbname='.VT_ADI.";charset=utf8;host=".HOST;
	  try { parent::__construct($dns,VT_KULLANICI, VT_SIFRE);} 
	  catch (PDOException $e) {die( '<h3 style="color:red">Hata: '.$e->getMessage()).'</h3>';}  
	  $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	
	private function varsayılan(){
		$this->ip = ifo::kontrol($_SERVER['REMOTE_ADDR'],'text');
		$this->suan=date('Y-m-d G:i:s' ,strtotime('now'));
		$this->bugun=date('Y-m-d',strtotime('now'));
		$this->buyil=date('Y',strtotime('now'));
	}
	//yıkıcı fonksiyon
	public function __destruct(){$this->sor = null;}
	
	//seçme işlemi yapan fonksiyon	  
	public function sec($sutunlar,$tablolar,$sartlar='',$sirala='',$limit='')
	{
	  $this->sql="SELECT $sutunlar FROM $tablolar";
	  $this->sql.=$sartlar?" WHERE $sartlar":'';
	  $this->sql.=$sirala?" ORDER BY $sirala":'';
	  
	  $this->sor=$this->prepare($this->sql);
	  try {$this->sor->execute();}
	  catch(PDOException $e){$this->hata='Hata: '.$e->getMessage();}
	  
	  $this->say=$this->query("SELECT FOUND_ROWS()")->fetchColumn();
	  
	  if($limit)
	  {
		$this->sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
		$this->topsayfa=ceil($this->say/$limit);
		$this->sayfa=($this->sayfa >$this->topsayfa)?$this->topsayfa:$this->sayfa;
		$this->sayfa=($this->sayfa<1)?1:$this->sayfa;
		$bkayit=($this->sayfa-1)*$limit;
		$this->sql.=" LIMIT $bkayit,$limit";
		$this->sor=$this->prepare($this->sql);
		try {$this->sor->execute();}
	  	catch(PDOException $e){$this->hata='Hata: '.$e->getMessage();}
	  }
	  
	  //echo $this->hata?'<h3 style="color:red">'.$this->hata.'</h3>':'';
	  return $this;
	}
	
	//tablodan bir yada birden fazla satır okur	
	public function oku($tek=true){ return $tek ? $this->sor->fetch():$this->sor->fetchAll();;}
	
	//liste oluştur
	public function liste($tablo,$link=1,$ust=0,$ul='')
	{
	  //$ul boşsa istenilen tabloyu diziye aktar
	  if(!$ul) $this->liste=$this->sec('*',$tablo,'onay=1')->oku(false);
	  //echo $this->sql;
		//$uste göre yeni dizi oluştur
	  foreach($this->liste as $dal) 
		  if($dal['ust']==$ust) $agac[]=$dal;
	  //yeni dizide eleman varsa liste oluştur
	  if(isset($agac)){
		  $ul.='<ul>';
		  foreach($agac as $dal)
		  {	//aktif olan öğe için class hazırla
			  $class=($link==$dal['link'])?'aktif':'';
			  $cocuk=$this->sec('*',$tablo,'onay=1 and ust='.$dal['id'])->oku();
			  $class.=($cocuk['id'])?' cocuk-var':'';
			  //ana id yi bul
			  $aid=($dal['ust']==0)?$dal['id'] :$dal['ust'];
			  //cocuk id yi bul
			  $cid=$dal['id'];
			  //linki oluştur
			  $url=$dal['link'];
			  //recursive fonksiyon ile ulyi oluştur
				$yetkiler=explode(';',$dal['yetki']);
				if((isset($_SESSION['yetki']) and in_array($_SESSION['yetki'],$yetkiler)) OR $dal['yetki']==5){
			  $ul.='<li><a class="'.$class.'" alt="'.$link.'" href="'.$url.'" >'.$dal['adi'].' </a>';
				  $ul = $this->liste($tablo,$link,$cid,$ul);
			  $ul.='</li>';}
		  }
		  $ul.='</ul>';
	  }
	  return $ul;
	}
	
	function sil($tablo,$id)
	{//id ye göre kaydı siler
	   $this->sql="DELETE FROM $tablo WHERE id='$id'";
	   return $this->calistir();
	}
	function calistir()
	{
	  $this->sor=$this->exec($this->sql);
	  return $this->sor;
  	} 
  
	function form_ekle($tablo)
	{//tabloya hızlı form ekleme
	  $degerler=$this->deger_olustur($this->tablo_bilgi($tablo),"ekle");
	  $this->sql="INSERT INTO $tablo $degerler";
	  return $this->calistir();
	}
	
	function form_guncelle($tablo,$id)
	{//id ye göre hızlı güncelleme
	  $degerler=$this->deger_olustur($this->tablo_bilgi($tablo),"guncelle");
	  $this->sql="UPDATE $tablo SET $degerler WHERE id='$id'";
	  return $this->calistir();
	}
	
	function tablo_bilgi($tablo)
	{//tablo alan-adı ve alan tiplerini döndürür
	  $this->sql="SELECT * FROM $tablo";
	  $this->sor=$this->query($this->sql);
	  $alanSay = $this->sor->columnCount(); //alan-adlarını say
	  for ($i=0; $i<$alanSay ; $i++ ) {
		$meta = $this->sor->getColumnMeta($i);
		$a = @$meta['name']; // alan-adi
		$t = @$meta['native_type']; // alan-tipi
		$alan[] = array($a,$t); //bilgileri diziye ata
	  }
	  return $alan;		
	}
	
  function options($tablo,$id=0,$sart='onay=1',$deger='id',$sira="id ASC",$adi="adi")
	{// select nesnesi için optionları oluşturur
		$this->sec("id,$adi",$tablo,"$sart",$sira);
		$o='';
		while($s=$this->oku()){
			$sl=(in_array($s['id'],$id) OR $s['id']==$id) ? 'selected' : '';
			$o.='<option '.$sl.' value="'.$s[$deger].'">'.$s[$adi].'</option>';
		}
		return $o;
	}
	
	function deger_olustur($tablo,$tip)
	{//güncelleme ve ekleme işlemleri için değerleri uygun biçimde oluşturur
	  $s='';$d='';
	  if($tip=="guncelle"){
		foreach($tablo as $t) if(isset($_POST[$t[0]]))$d.=$t[0].'='.ifo::kontrol($_POST[$t[0]],$t[1]).',';
		$sondeger=substr($d,0,-1); // sütun1=değer1,sütun2=değer2
	  }elseif($tip=="ekle"){
		foreach($tablo as $t){ if(isset($_POST[$t[0]])){$s.=$t[0].',';$d.=ifo::kontrol($_POST[$t[0]],$t[1]).',';} }
		$s=substr($s,0,-1);$d=substr($d,0,-1);
		$sondeger="($s) VALUES ($d)"; // sütunlar VALUES değerler
	  }
	  return $sondeger;
	}
	//sayfa navigasyonu oluşturur
	public function navigasyon($adres='',$konum='left',$sgoster=11)
  	{
	  $ul='<div class="row"><div class="col-md-12"><ul id="nav_'.$adres.'" class="pagination pull-'.$konum.'">';
	  $en_az_orta = ceil($sgoster/2);
	  $en_fazla_orta = ($this->topsayfa+1) - $en_az_orta;
	  $sayfa_orta = $this->sayfa;
	  $sayfa_orta=($sayfa_orta < $en_az_orta)?$en_az_orta:$this->sayfa;
	  $sayfa_orta=($sayfa_orta > $en_fazla_orta)?$en_fazla_orta:$this->sayfa;
	  $sol_sayfalar = round($sayfa_orta - (($sgoster-1) / 2));
	  $sag_sayfalar = round((($sgoster-1) / 2) + $sayfa_orta);
	  $sol_sayfalar=($sol_sayfalar < 1) ?1:$sol_sayfalar;
	  $sag_sayfalar=($sag_sayfalar > $this->topsayfa)?$this->topsayfa:$sag_sayfalar;
	  $ul.=($this->sayfa != 1)?'<li style="margin:0px;"><a title="İlk Sayfa" sayfa="1"> <span class="glyphicon glyphicon-step-backward"></span></a></li>':'<li><a style="color:gray;" title="İlk Sayfa" sayfa="1"> <span class="glyphicon glyphicon-step-backward"></span></a></li>';
	  $ul.=($this->sayfa != 1)?'<li style="margin:0px;"><a title="Önceki Sayfa" sayfa="'.($this->sayfa-1).'" link="'.@$_GET['link'].'"><span class="glyphicon glyphicon-chevron-left"></span></a></li>':'<li><a style="color:gray;" title="Önceki Sayfa" sayfa="'.($this->sayfa-1).'" link="'.@$_GET['link'].'"><span class="glyphicon glyphicon-chevron-left"></span></a></li>';
	  for($s = $sol_sayfalar; $s <= $sag_sayfalar; $s++) 
		$ul.=($this->sayfa == $s)?'<li class="active" style="margin:0px;"><a sayfa="'.$s.'" title="Aktif Sayfa" link="'.@$_GET['link'].'">'.$s.'</a></li>':'<li><a title="'.$s.'.Sayfa" sayfa="'.$s.'" link="'.@$_GET['link'].'">'.$s.'</a></li> ';
	  $ul.=($this->sayfa != $this->topsayfa)?' <li style="margin:0px;"><a title="Sonraki Sayfa" sayfa="'.($this->sayfa+1).'" link="'.@$_GET['link'].'"><span class="glyphicon glyphicon-chevron-right"></span></a></li>':'<li><a style="color:gray;" title="Sonraki Sayfa" sayfa="'.($this->sayfa+1).'" link="'.@$_GET['link'].'"><span class="glyphicon glyphicon-chevron-right"></span></a></li>';
	  $ul.=($this->sayfa != $this->topsayfa)?' <li style="margin:0px;"><a title="Son Sayfa" sayfa="'.$this->topsayfa.'" link="'.@$_GET['link'].'"><span class="glyphicon glyphicon-step-forward"></span></a></li>':'<li><a style="color:gray;" title="Son Sayfa" sayfa="'.$this->topsayfa.'" link="'.@$_GET['link'].'"><span class="glyphicon glyphicon-step-forward"></span></a></li>';
	  $ul.='</ul></div></div>';echo $ul;
  	}
  }//class ifo
	
