<?php
	$GLOBALS['wasav-assets'] = array(
		'styles' => array(),
		'scripts' => array(),
		'add_actions' => array()
	);
		
	if(!function_exists('add_action')){
		function add_action($name, $function){
			$GLOBALS['wasav-assets']['add_actions'][] = $function;
		}
	}
	
	if(!function_exists('wp_enqueue_style') && !function_exists('wp_enqueue_script')){
		function wasav_enqueue($key, $name, $uri){
			$GLOBALS['wasav-assets'][$key][] = $uri;
		}
		
		function wp_enqueue_style($name, $url){
			wasav_enqueue('styles', $name, $url);
		}
		
		function wp_enqueue_script($name, $url){
			wasav_enqueue('scripts', $name, $url);
		}
	}
	
	// TODO: add packer for JS/CSS ?
	if(!function_exists('wp_head')){
		function wp_head(){
		
			foreach($GLOBALS['wasav-assets']['add_actions'] as $n => $func){
				$func();
			}
		
			foreach($GLOBALS['wasav-assets']['styles'] as $n => $url){
				echo '<link rel="stylesheet" href="'.$url.'" />';
			}
		}
	}
	
	if(!function_exists('wp_footer')){
		function wp_footer(){
			
			foreach($GLOBALS['wasav-assets']['scripts'] as $n => $url){
				echo '<script type="text/javascript" src="'.$url.'"></script>';
			}
		}
	}
	
	require_once WP_THEME_PATH."/functions-enqueue-scripts.php";
