<?php

class BlindTest{
	public $niveau=1;	
	static $dossier = 'banque_son\blindtest\\';

	function read_files(){
		$files = glob(self::$dossier .'*.*');
		return $files;
	}

	function name_files(){
		$name = str_replace(self::$dossier, '', $this->read_files());
		$name = str_replace(explode(' ', ' \ .mp3'), explode(' ', ' '), $name);
		$name = str_replace('_', ' ', $name);
		return $name;
	}

	function pick_randfile(){
		$random_pick = array_rand($this->read_files()); 
		return array($random_pick, $this->read_files()[$random_pick]);
	}

	function low_2_stripAccents($userinput="test"){
		$userinput = mb_strtolower($userinput);
    	return str_replace(explode(' ', 'à á â ã ä ç è é ê ë ì í î ï ñ ò ó ô õ ö ù ú û ü ý ÿ À Á Â Ã Ä Ç È É Ê Ë Ì Í Î Ï Ñ Ò Ó Ô Õ Ö Ù Ú Û Ü Ý'), explode(' ', 'a a a a a c e e e e i i i i n o o o o o u u u u y y A A A A A C E E E E I I I I N O O O O O U U U U Y'), $userinput); 
    }

}