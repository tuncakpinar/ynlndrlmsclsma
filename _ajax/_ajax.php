<?php require('../_inc.php');  ?>
<?php
 
  if(isset($_POST['frm'])){
	switch($_POST['frm']){
	  case 'article':
	  	$_GET['sayfa']=$_POST['sayfa'];
		include('../_inc/_article.php');
	  break;
	  case 'giris':
		$email=ifo::kontrol($_POST['email'],"text");
		$sifre=ifo::sifrele($_POST['sifre']);
		$sifre=ifo::kontrol($sifre,"text");
        $alert=[];
		//gönderilen email ve sifreye sahip kullanıcı varmı kontrol ediliyor
		$uye=$ifo->sec("*","uyeler","email=$email and sifre=$sifre")->oku();

		if($ifo->say){
		//üye varmı?
			if($uye['aktif']) {//kullanıcının üyeliği onaylanmış mı?
				$_SESSION['id']=$uye['id']; 
				$_SESSION['email']=$uye['email']; 
				$_SESSION['adi']=$uye['adi']; 
				$_SESSION['yetki']=$uye['yetki'];
			} else {
				$alert[0]='warning';
				$alert[1]='<h4><i class="fa fa-fw fa-lock"></i>Üyeliğiniz henüz aktifleşmemiş!</h4> E-posta adresinize gönderdiğimiz bağlantıya tıkladığınızdan emin misiniz?.<br><a class="btn btn-warning btn-sm pull-right"> Bağlantıyı tekrar gönder! <i class="fa fa-paper-plane"> </i></a> ';}	
			
		} else {
			$alert[0]='danger';
			$alert[1]='<h4><i class="fa fa-fw fa-lock"></i> Şifre veya e-posta hatalı!</h4> Lütfen tekrar deneyiniz... <br><a href="unuttum" class="btn btn-danger btn-sm pull-right"> Şifremi unuttum?</a> ';
		}
		include('../_inc/_giris.php');
		if($alert) echo '~'.$alert[0].'~'.$alert[1];
	  break;
	  case 'unuttum':
		$mail=$_POST['email'];
		if(empty($mail))
		{
			echo '~danger~<h4>Lütfen bir e-mail adresi giriniz!</h4>';
		}
		else
		{
			/*bu mailde bir üye varmı?*/
			$varmi=$ifo->sec('*','uyeler','email='.$email)->oku();
			if($varmi)
			{
				
			}
			else
			{
				echo '~warning~<h4>Lütfen kayıtlı bir e-mail adresi giriniz!</h4>';
			}
		}
	  break;
	  case 'cikis':
	  	$_SESSION=array();session_destroy();
	  break;
	  case 'yeniUye':
	  	//şifre kontrol
		if($_POST['sifre1']!=$_POST['sifre2']){
			echo '~danger~<h4><i class="fa fa-fw fa-frown-o"></i>Şifreler Uyuşmuyor!</h4> Lütfen kontrol ediniz...';exit;
		}
		//aynı email daha önce kayıt olmuşmu?
		$email=ifo::kontrol($_POST['email'],'text');
		$ifo->sec('*','uyeler',"email=$email");
		if($ifo->say){
			echo '~danger~<h4><i class="fa fa-fw fa-meh-o"></i>Kayıtlı bir e-posta adresi girdiniz!</h4> Lütfen farklı e-posta adresiyle kayıt işlemini tekrar deneyiniz';exit;	
		}
		//şifreyi şifrele
		$_POST['sifre']=ifo::sifrele($_POST['sifre1']);
		if($_POST['yetki']==1 OR $_POST['yetki']==2) echo '~warning~<h1>Ekleme Başarısız. Yetki hatası!</h1>Bilgileri kontrol ediniz...';
		else
		{
			$_POST['aktivasyon']=$_POST['aktivasyonkodu'];
			$mail=$_POST['email'];
			$_POST['tarih']=$ifo->bugun;
			ifo::email($_POST['email'],'Üyelik Aktivasyon','<h4>Merhaba Sayın '.$_POST['adi'].',</h4>Sitemize Hoşgeldiniz!<br/><br/>Hemen aşağıda görmüş olduğunuz linke tıklayarak üyeliğinizi aktif edebilirsiniz!<br/><br/>localhost/webuz/aktivasyon?akt='.$_POST['aktivasyon']);
			if($ifo->form_ekle('uyeler'))
			{
				echo '~info~<h4><i class="fa fa-fw fa-smile-o"></i>Kayıt işlemi başarıyla gerçekleşti.</h4> Lütfen e-posta adresinize gönderilen bağlantıya tıklayarak üyeliğiniz aktifleştiriniz.<br/><b>NOT : </b>Gönderilen mail spam kutunuza düşmüş olabilir, lütfen kontrol ediniz..';exit;	
			}
			else
			{
				echo '~warning~<h4><i class="fa fa-fw fa-meh-o"></i>Ekleme başarısız.</h4> Bilgilerinizi kontrol ediniz...';exit;
			}
		}
	  break;
	  case 'uyeGuncelle':
	  
		if(ifo::yetki('1','i')){
		$_POST['link']=ifo::seflink($_POST['baslik']);		
		
		if($_POST['sifre1']){
		if($_POST['sifre1']!=$_POST['sifre2']){
			echo '~danger~<h4><i class="fa fa-fw fa-frown-o"></i>Şifreler Uyuşmuyor!</h4> Lütfen kontrol ediniz...';exit;
		}
		$_POST['sifre']=ifo::sifrele($_POST['sifre1']);
		}
		//aynı email daha önce kayıt olmuşmu?
		$email=ifo::kontrol($_POST['email'],'text');
		$uye=$ifo->sec('*','uyeler',"email=$email")->oku();
		if($ifo->say and $uye['id']!=$_POST['id']){
			echo '~danger~<h4><i class="fa fa-fw fa-meh-o"></i>Kayıtlı bir e-posta adresi girdiniz!</h4> Lütfen farklı e-posta adresiyle kayıt işlemini tekrar deneyiniz';exit;	
		}
		if(($_SESSION['yetki']!=1 OR $_SESSION['yetki']!=2) AND ($_POST['yetki']==1 OR $_POST['yetki']==2))
			echo '~warning~<h1>Güncelleme Başarısız. Yetki hatası!</h1>Bilgileri kontrol ediniz...';
			else{
				echo $ifo->form_guncelle('uyeler',$_POST['id'])?'~info~<h4><i class="fa fa-fw fa-thumbs-o-up"></i> Profiliniz güncellendi!</h4>Tebrikler...':'~warning~<h4><i class="fa fa-fw fa-meh-o"></i>Değişiklik yapmadınız</h4>Bilgilerinizde değişiklik yapmadan güncelleme yapamazsınız...';
			}
		}
	  break;
	  
	  case 'iletisim':
	  	$mesaj='<h3><a href="'.$ayarlar['adres'].'">'.$ayarlar['adi'].'</a></h3>';
		$mesaj.='<h4><b>Gönderen:</b>'.$_POST['adi'].'</h4>';
		$mesaj.='<div><b>Telefon:</b>'.$_POST['tel'].'</div>';
		$mesaj.='<div><b>E-Posta:</b>'.$_POST['email'].'</div>';
		$mesaj.='<div><b>Mesaj:</b></div><div>'.$_POST['mesaj'].'</div>';
		
	  	echo ifo::email($iletisim['email'],'İletişim Maili',$mesaj)?'~success~<h4><i class="fa fa-fw fa-smile-o"></i> Mesajınız gönderildi!</h4>En kısa zamanda size geri dönüş yapılacaktır.':'~danger~<h4><i class="fa fa-fw fa-meh-o"></i> Mesajınız gönderilemedi</h4>Lütfen daha sonra tekrar deneyiniz.';
	  break;
	
	
	case 'yorumGuncelle':
		if(ifo::yetki('1','i')){
		$_POST['link']=ifo::seflink($_POST['baslik']);		
		
		if($ifo->form_guncelle('yorumlar',$_POST['id'])){
			echo '~info~<h4><i class="fa fa-fw fa-thumbs-o-up"></i> Yorum Güncellendi!</h4>~asizdengelenler';
		}
		else{
			echo '~warning~<h4><i class="fa fa-fw fa-meh-o"></i> Değişiklik yapmadınız!</h4>';}
		}
		
		exit();
	break;
	
	case 'yorumEkle':
			$_POST['link']=ifo::seflink($_POST['baslik']);
			if($ifo->form_ekle('yorumlar'))
			{ 
				echo '~info~<h4><i class="fa fa-fw fa-thumbs-o-up"></i> İçerik Eklendi!</h4>~anasayfa';
			}
			else
			{
				echo '~warning~<h4><i class="fa fa-fw fa-meh-o"></i> İçerik Ekleme Başarısız!</h4>';
			}
	break;
	
	case 'referansOnayla':
	if(ifo::yetki('1;2','i')){
		$id=ifo::kontrol($_POST['id'],'int');
		$icerik=$ifo->sec('id,onay','referanslar',"id=$id")->oku();
		$onay=$icerik['onay']?0:1;
		$ifo->sql="UPDATE referanslar SET onay=$onay WHERE id=$id";
		echo $ifo->calistir()?'reload~warning~<h4><i class="fa fa-fw fa-check-circle-o"></i> İşlem yapıldı!</h4>':'~danger~<h4><i class="fa fa-fw fa-close"></i> İşlem yapılamadı!</h4>';
	}
	break;
	
	case 'yorumOnayla':
	if(ifo::yetki('1;2','i')){
		$id=ifo::kontrol($_POST['id'],'int');
		$icerik=$ifo->sec('id,onay','yorumlar',"id=$id")->oku();
		$onay=$icerik['onay']?0:1;
		$ifo->sql="UPDATE yorumlar SET onay=$onay WHERE id=$id";
		echo $ifo->calistir()?'reload~warning~<h4><i class="fa fa-fw fa-check-circle-o"></i> İşlem yapıldı!</h4>':'~danger~<h4><i class="fa fa-fw fa-close"></i> İşlem yapılamadı!</h4>';
	}
	break;
	case 'uyeOnayla':
		if(ifo::yetki('1;2','i')){
		$id=ifo::kontrol($_POST['id'],'int');
		$uye=$ifo->sec('id,onay','uyeler',"id=$id")->oku();
		$onay=$uye['onay']?0:1;
		$ifo->sql="UPDATE uyeler SET onay=$onay WHERE id=$id";
		echo $ifo->calistir()?'reload~warning~<h4><i class="fa fa-fw fa-check-circle-o"></i> İşlem yapıldı!</h4>':'~danger~<h4><i class="fa fa-fw fa-close"></i> İşlem yapılamadı!</h4>';
		}
	break;
	case 'sliderOnayla':
		if(ifo::yetki('1;2','i')){
		$id=ifo::kontrol($_POST['id'],'int');
		$slider=$ifo->sec('id,onay','slider',"id=$id")->oku();
		$onay=$slider['onay']?0:1;
		$ifo->sql="UPDATE slider SET onay=$onay WHERE id=$id";
		echo $ifo->calistir()?'reload~warning~<h4><i class="fa fa-fw fa-check-circle-o"></i> İşlem yapıldı!</h4>':'~danger~<h4><i class="fa fa-fw fa-close"></i> İşlem yapılamadı!</h4>';
		}
	break;
	case 'sliderAktif':
				if(ifo::yetki('1','i')){
					$_POST['id']=ifo::kontrol($_POST['id'],'int');
					if($ifo->sec('id,aktif','slider',"id={$_POST['id']} and aktif=1")->oku()){echo '~warning~Zaten bu slider aktif.'; exit();}
					$ifo->sql="UPDATE slider SET aktif=0";
					$ifo->calistir();
					$ifo->sql="UPDATE slider SET aktif=1 WHERE id={$_POST['id']}";
					echo $ifo->calistir()?'~success~<h4><i class="fa fa-fw fa-thumbs-up"></i> İşlem yapıldı.</h4>~_slider':'~danger~<h4><i class="fa fa-fw fa-exclamation-triangle"></i> Bir Hata Oluştu.</h4>Lütfen daha sonra tekrar deneyin.';
				}
	break;
	case 'referansSil':
		if(ifo::yetki('1','i')){
		$id=ifo::kontrol($_POST['id'],'int');
		echo $ifo->sil('referanslar',$id)?'reload~warning~<h4><i class="fa fa-fw fa-check-circle-o"></i> İşlem yapıldı!</h4>':'~danger~<h4><i class="fa fa-fw fa-close"></i> İşlem yapılamadı!</h4>';
		}
	break;
	case 'yorumSil':
		if(ifo::yetki('1;2','i')){
		$id=ifo::kontrol($_POST['id'],'int');
		echo $ifo->sil('yorumlar',$id)?'reload~warning~<h4><i class="fa fa-fw fa-check-circle-o"></i> İşlem yapıldı!</h4>':'~danger~<h4><i class="fa fa-fw fa-close"></i> İşlem yapılamadı!</h4>';
		}
	break;
	case 'uyeSil':
		if(ifo::yetki('1;2','i')){
		$id=ifo::kontrol($_POST['id'],'int');
		echo $ifo->sil('uyeler',$id)?'reload~warning~<h4><i class="fa fa-fw fa-check-circle-o"></i> İşlem yapıldı!</h4>':'~danger~<h4><i class="fa fa-fw fa-close"></i> İşlem yapılamadı!</h4>';
		}
	break;
	case 'sliderSil':
		if(ifo::yetki('1;2','i')){
		$id=ifo::kontrol($_POST['id'],'int');
		echo $ifo->sil('slider',$id)?'reload~warning~<h4><i class="fa fa-fw fa-check-circle-o"></i> İşlem yapıldı!</h4>':'~danger~<h4><i class="fa fa-fw fa-close"></i> İşlem yapılamadı!</h4>';
		}
	break;
	
	case 'referansGuncelle':
		if(ifo::yetki('1','i')){
					if(isset($_FILES['slider'])){
						$r=$ifo->dosyayukle($_FILES['slider'],'../_rsm/_referans/','1980x800');
						if($r=='ER'){echo '~danger~<h4><i class="fa fa-fw fa-exclamation-triangle"></i> Resim Yüklenirken Bir Hata Oluştu.</h4>Lütfen daha sonra tekrar deneyin.'; exit;}
						else if($r=='LEN'){echo '~warning~<h4><i class="fa fa-fw fa-exclamation-triangle"></i> Resim Boyutu İstenilenden Büyük.</h4>Lütfen Daha Küçük Boyutlu Bir Resim Yükleyin.'; exit;}
						else if($r=='NA'){echo '~danger~<h4><i class="fa fa-fw fa-exclamation-triangle"></i> Desteklenmeyen Dosya Türü</h4>Sadece Resim Yükleyebilirsin!'; exit;}
						else if($r=='MOVE'){echo '~warning~<h4><i class="fa fa-fw fa-exclamation-triangle"></i> Resim Yüklenirken Bir Hata Oluştu.</h4>Lütfen daha sonra tekrar deneyin.'; exit;}
						else if($r=='WID'){echo '~warning~<h4><i class="fa fa-fw fa-exclamation-triangle"></i> Resim Çözünürlüğü İstenilenden Büyük</h4>Lütfen daha küçük çözünürlüklü bir resim yüklemeyi deneyin.'; exit;}
						else{
							$r=explode('/', $r);
							$_POST['resim']=$r[3];
							//Eski Resimi Sil
								$eski=$ifo->sec('resim,id','slider','id='.$_POST['id'])->oku();
								unlink('../_rsm/_referans/'.$eski['resim']);
							//
							echo $ifo->form_guncelle('referanslar',$_POST['id'])?'~success~<h4><i class="fa fa-fw fa-thumbs-up"></i> Başarıyla Referans\'ı Güncelledin.</h4>~_referanslar':'~danger~<h4><i class="fa fa-fw fa-exclamation-triangle"></i> Bir Hata Oluştu.</h4>Lütfen daha sonra tekrar deneyin.';
						}
					}
					else{
						echo $ifo->form_guncelle('referanslar',$_POST['id'])?'~success~<h4><i class="fa fa-fw fa-thumbs-up"></i> Başarıyla Referans\'ı Güncelledin.</h4>~_referanslar':'~warning~<h4><i class="fa fa-fw fa-exclamation-triangle"></i> Değişiklik Yapmadınız.</h4>Değişiklik Yapmadan Güncelleme Yapamazsınız.';
					}
				}
	break;
	
	case 'sliderGuncelle':
		if(ifo::yetki('1','i')){
					if(isset($_FILES['slider'])){
						$r=$ifo->dosyayukle($_FILES['slider'],'../_rsm/_slider/','1980x800');
						if($r=='ER'){echo '~danger~<h4><i class="fa fa-fw fa-exclamation-triangle"></i> Resim Yüklenirken Bir Hata Oluştu.</h4>Lütfen daha sonra tekrar deneyin.'; exit;}
						else if($r=='LEN'){echo '~warning~<h4><i class="fa fa-fw fa-exclamation-triangle"></i> Resim Boyutu İstenilenden Büyük.</h4>Lütfen Daha Küçük Boyutlu Bir Resim Yükleyin.'; exit;}
						else if($r=='NA'){echo '~danger~<h4><i class="fa fa-fw fa-exclamation-triangle"></i> Desteklenmeyen Dosya Türü</h4>Sadece Resim Yükleyebilirsin!'; exit;}
						else if($r=='MOVE'){echo '~warning~<h4><i class="fa fa-fw fa-exclamation-triangle"></i> Resim Yüklenirken Bir Hata Oluştu.</h4>Lütfen daha sonra tekrar deneyin.'; exit;}
						else if($r=='WID'){echo '~warning~<h4><i class="fa fa-fw fa-exclamation-triangle"></i> Resim Çözünürlüğü İstenilenden Büyük</h4>Lütfen daha küçük çözünürlüklü bir resim yüklemeyi deneyin.'; exit;}
						else{
							$r=explode('/', $r);
							$_POST['resim']=$r[3];
							//Eski Resimi Sil
								$eski=$ifo->sec('resim,id','slider','id='.$_POST['id'])->oku();
								unlink('../_rsm/_slider/'.$eski['resim']);
							//
							echo $ifo->form_guncelle('slider',$_POST['id'])?'~success~<h4><i class="fa fa-fw fa-thumbs-up"></i> Başarıyla Slider\'i Güncelledin.</h4>~_slider':'~danger~<h4><i class="fa fa-fw fa-exclamation-triangle"></i> Bir Hata Oluştu.</h4>Lütfen daha sonra tekrar deneyin.';
						}
					}
					else{
						echo $ifo->form_guncelle('slider',$_POST['id'])?'~success~<h4><i class="fa fa-fw fa-thumbs-up"></i> Başarıyla Slider\'i Güncelledin.</h4>~_slider':'~warning~<h4><i class="fa fa-fw fa-exclamation-triangle"></i> Değişiklik Yapmadınız.</h4>Değişiklik Yapmadan Güncelleme Yapamazsınız.';
					}
				}
	break;
	
	
	case 'referansEkle':
		if(ifo::yetki('1','i')){
				if(isset($_FILES['referans'])){
					$_POST['tarih']=$ifo->suan;
					$_POST['ekleyen']=$_SESSION['id'];
					$r=$haci->dosyayukle($_FILES['referans'],'../_rsm/_referans/','1980x800');
					if($r=='ER'){echo '~danger~Resim yüklenirken bir hata oluştu.'; exit;}
					else if($r=='LEN'){echo '~warning~Resim Boyutu İstenilenden Büyük.'; exit;}
					else if($r=='NA'){echo '~warning~Sadece Resim Yükleyebilirsin.'; exit;}
					else if($r=='MOVE'){echo '~warning~Resim Taşınırken Bir Hata Oluştu'; exit;}
					else if($r=='WID'){echo '~warning~Resim Çözünürlüğü İstenilenden Yüksek.'; exit;}
					else{
						$r=explode('/', $r);
						$_POST['onay']=isset($_POST['onay'])?'1':'0';
						$_POST['resim']=$r[3];
						echo $ifo->form_ekle('referanslar')?'~success~<h4><i class="fa fa-fw fa-thumbs-up"></i> Başarıyla Yeni Referansı Ekledin.</h4>~_referanslar':'~warning~<h4><i class="fa fa-fw fa-exclamation-triangle"></i> Bir Hata Oluştu.</h4>Lütfen daha sonra tekrar deneyin.';
					}
				}
				else echo '~warning~<h4><i class="fa fa-fw fa-exclamation-triangle"></i> Resim Seçmedin.</h4>Lütfen bir resim seç.';
			}
	break;
	
	
	
	case 'sliderEkle':
		if(ifo::yetki('1','i')){
					if(isset($_FILES['slider'])){
						$_POST['tarih']=$ifo->suan;
						$_POST['ekleyen']=$_SESSION['id'];
						$r=$haci->dosyayukle($_FILES['slider'],'../_rsm/_slider/','1980x800');
						if($r=='ER'){echo '~danger~Resim yüklenirken bir hata oluştu.'; exit;}
						else if($r=='LEN'){echo '~warning~Resim Boyutu İstenilenden Büyük.'; exit;}
						else if($r=='NA'){echo '~warning~Sadece Resim Yükleyebilirsin.'; exit;}
						else if($r=='MOVE'){echo '~warning~Resim Taşınırken Bir Hata Oluştu'; exit;}
						else if($r=='WID'){echo '~warning~Resim Çözünürlüğü İstenilenden Yüksek.'; exit;}
						else{
							$r=explode('/', $r);
							$_POST['onay']=isset($_POST['onay'])?'1':'0';
							$_POST['resim']=$r[3];
							echo $ifo->form_ekle('slider')?'~success~<h4><i class="fa fa-fw fa-thumbs-up"></i> Başarıyla Yeni Slideri Ekledin.</h4>~_slider':'~warning~<h4><i class="fa fa-fw fa-exclamation-triangle"></i> Bir Hata Oluştu.</h4>Lütfen daha sonra tekrar deneyin.';
						}
					}
					else{ echo '~warning~<h4><i class="fa fa-fw fa-exclamation-triangle"></i> Resim Seçmedin.</h4>Lütfen bir resim seç.';}
				}
	break;
	
	 case 'siteAyarlar':
		if(ifo::yetki('1;2','i')){
	 	$_POST['umenu']=isset($_POST['umenu'])?1:0;
	 	$_POST['uyelik']=isset($_POST['uyelik'])?1:0;
	 	$_POST['slider']=isset($_POST['slider'])?1:0;
	 	$_POST['aside']=isset($_POST['aside'])?1:0;
		$ida=ifo::kontrol($_POST['ida'],'int');
	 	$idi=ifo::kontrol($_POST['idi'],'int');
	 	$a=$ifo->form_guncelle('ayarlar',$ida)?1:0;
		$_POST['adres']=$_POST['iadres'];
		$i=$ifo->form_guncelle('iletisim',$idi)?1:0;
		echo ($a OR $i)?'reload~warning~<h4><i class="fa fa-fw fa-check-circle-o"></i> Ayarlar Güncellendi!</h4>':'~danger~<h4><i class="fa fa-fw fa-close"></i> İşlem yapılamadı!</h4>';
		}
	 break;
	
	}//switch
 }
?>