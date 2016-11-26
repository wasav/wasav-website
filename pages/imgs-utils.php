<?php

function pickRandomImgs($folder){
	/*$files = glob($folder."/*.*");
	$len = strlen($folder."/");
	
	if($files !== false && count($files)>1){
		$file = $files[ array_rand($files, 1)];
		
		$ind = strrpos($file, $folder."/");
		if($ind !== false){
			return substr($file, $ind+$len);
		}
	}*/
	
	return "buf.jpg";
}