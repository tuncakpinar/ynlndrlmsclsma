<?php

	class Haci{
			public function dosyayukle($file,$klasor='../_rsm/_pf/',$maxboy='250x250',$maxboyut=1048576,$uzantilar=array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF)){
			$file_name=$file['name'];
			$file_tmp=$file['tmp_name'];
			$file_size=$file['size'];
			$file_error=$file['error'];
			
			$file_ext=explode('.', $file_name);
			$file_ext=strtolower(end($file_ext));
			
			$tur=exif_imagetype($file_tmp);
			
			if(in_array($tur, $uzantilar)){
			//if(in_array($file_ext, $uzantilar)){
				if($file_error===0){
					if($file_size<=$maxboyut){
						
						$maxboy=explode('x', $maxboy);
						$boy=getimagesize($file['tmp_name']);
						if($boy[0]>$maxboy[0] || $boy[1]>$maxboy[1]){
							return 'WID';//EN BOY FAZLA
						}
						else {
							$file_name_new=uniqid('',true).'.'.$file_ext;
							$file_destination=$klasor.$file_name_new;
														
							if(move_uploaded_file($file_tmp, $file_destination)){
								return $file_destination;
							}
							else {
								return 'MOVE';//Dosya yüklenemedi
							}
						}
					}
					else {
						return 'LEN';//Dosya boyutu büyük
					}
				}
				else {
					return 'ER';//Dosya yüklenemedi
				}
			}
			else {
				return 'NA';//İzin verilmeyen dosya uzantısı
			}
		}
			
	}