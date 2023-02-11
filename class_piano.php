<?php

	class Instrument{

		static $dossier = 'banque_son\\';
		public $instrument; 

		function select_instrument($instrument = 'piano'){
			$files = glob(self::$dossier . 'notes_' . $instrument . '\*.*');  
			// return self::$dossier . 'notes_' . $instrument . '\*.*';
			return $files;
		}

		function pick_randnote(){
			$randnote = array_rand($this->select_instrument());
			return $this->select_instrument()[$randnote];
		}

		function name_file($randnote){
			$name = substr($randnote, 23, 1);
			return $name;
		}

	}