<?php

function getLabCss($labFolder){
	$files = glob($labFolder."/css/*.css");
	$css = array();
	$len = strlen($labFolder."/css/");
	
	foreach($files as $n=>$fileName){
		$ind = strrpos($fileName, $labFolder."/css/");
		if($ind !== false){
			$css[] = substr($fileName, $ind+$len);
		}
	}
	
	return $css;
}

function getLabJs($labFolder){
	$files = glob($labFolder."/js/*.js");
	$js = array();
	$len = strlen($labFolder."/js/");
	
	foreach($files as $n=>$fileName){
		$ind = strrpos($fileName, $labFolder."/js/");
		if($ind !== false){
			$js[] = substr($fileName, $ind+$len);
		}
	}
	
	return $js;
}

function getLabInstance($labName){

	$folderDir = LABS_PATH."/".$labName;
	if(file_exists($folderDir)){
		
		$result = array(
			"css" => getLabCss($folderDir),
			"js" => getLabJs($folderDir),
			"index" => "index.php",
			"excerpt" => "excerpt.php"
		);
		
		if(!file_exists(LABS_PATH."/".$labName."/config.php")){
			return $result;
		}
		
		require LABS_PATH."/".$labName."/config.php";
		
		foreach($GLOBALS[$labName] as $key => $val){
			$result[$key] = $val;
		}
		
		unset($GLOBALS[$labName]);
		
		return $result;
	}
	
	return false;
}

function getLabInstances(){
	$folders = glob(LABS_PATH."/*", GLOB_ONLYDIR);
	$labs = array();
	
	foreach($folders as $n=>$folderDir){
		$ind = strrpos($folderDir, '/');
		if($ind === false){
			continue;
		}
		$labName = substr($folderDir, $ind+1);
		if(!file_exists(LABS_PATH.'/'.$labName.'/config.php')){
			continue;
		}
			
		$labs[$labName] = getLabInstance($labName);
		
	}
	
	return $labs;
}