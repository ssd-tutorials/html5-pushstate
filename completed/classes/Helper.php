<?php
class Helper {





	public static function getColumn($file = null) {
		$file = 'columns/'.$file.'.php';
		if (is_file($file)) {
			ob_start();
			require_once($file);
			return ob_get_clean();
		}
	}
	
	
	
	
	
	
	
	
	
	
	public static function getContent($file = null) {
		$file = 'content/'.$file.'.php';
		if (is_file($file)) {
			ob_start();
			require_once($file);
			return ob_get_clean();
		}
	}







}