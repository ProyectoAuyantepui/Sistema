<?php 
/**
 Clase Esteganografía
*/
class Esteganografia
{
	function obtenerDatos($texto,$img) {
		$file=$img;		
			$ext=strtolower(substr($file['name'],strrpos($file['name'],'.')));
				
				$img=imagecreatefromstring(file_get_contents($file['tmp_name']));
		if(strtoupper($ext)=='.PNG'){
				$img=imagecreatefromstring(file_get_contents($file['tmp_name']));		
				Esteganografia::unirImgYTexto($img,$texto);
				ob_start();// iniciar el almacenamiento en búfer
				imagepng($img);//este es formato de salida 
				$contents = ob_get_contents();//aqui te captura el string de la foto
               	ob_end_clean();//este libera el almacenamiento en buffer
				imagedestroy($img);//Destruye la imagen del buffer
				$fh = fopen("public/img/steganografy/ste/".$file['name'], "a+" );//abre la carpeta 
    			fwrite( $fh, $contents );//le mete el archivo con el nombre del img.png
				fclose( $fh );//cierra la carpeta
				exit;//termina el proceso
		}else $msg_error='Solo se procesan imagenes PNG.';
	} 

	function unirImgYTexto(&$img,$texto){
		$bits=Esteganografia::convertirImgABinario($texto); $lenbit=strlen($bits);
		$nx=imagesx($img);	 $ny=imagesy($img);
		for($x=0,$bit=0; $x<$nx; $x++){ 
			for($y=0; $y<$ny; $y++){
			 $pix=Esteganografia::obtenerColor($img,$x,$y);
		  	 foreach(array('R','G','B') as $C)
			  $col[$C]=$bit<$lenbit?($pix[$C]|$bits[$bit])&(254|$bits[$bit++]):$pix[$C];
			  imagesetpixel($img,$x,$y,Esteganografia::reEscribirColor($img,$col['R'],$col['G'],$col['B']));
			}
		}
	}

	function convertirImgABinario($str){
		$data=''; 
		$len = strlen($str);
		for($i=0;$i<$len;$i++)$data.=str_pad(decbin(ord($str[$i])),8,'0',STR_PAD_LEFT);	  
		return $data.'00000000';
	}

	function obtenerColor($img,$x,$y){ 	
		$color = imagecolorat($img,$x,$y);
		return array('R'=>($color>>16)&0xFF,'G'=>($color>>8)&0xFF,'B'=>$color&0xFF);
	} 

	function reEscribirColor($img,$r,$g,$b){
	  $c=imagecolorexact($img,$r,$g,$b); if($c!=-1)return $c;
	  $c=imagecolorallocate($img,$r,$g,$b); if($c!=-1)return $c;
	  return imagecolorclosest($img,$r,$g,$b); 
	} 

	function extraerDataBinario($str){
		$data='';
		$len = strlen($str); 
		for ($i=0;$i<$len;$i+=8){ $ch=chr(bindec(substr($str,$i,8))); if(!ord($ch))break; $data.=$ch; }
		return $data; 
	}
}
 ?>