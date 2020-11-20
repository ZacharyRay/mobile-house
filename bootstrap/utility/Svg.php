<?php

if ( ! class_exists('Svg') ) {
	class Svg {
		private $args;
		private $file;
 
		public function __get($name) {
			return $this->args[$name];
		}
 
		public function __construct($file, $args = array()) {
			$this->file = $file;
			$this->args = $args;
		}
 
		public function __isset($name){
			return isset( $this->args[$name] );
		}
 
		public function render() {
			if( locate_template('./svg/' . $this->file . '.php') ){
				include( locate_template('./svg/' . $this->file . '.php') );
			}
		}
	}
}

if( ! function_exists('svg') ){
	function svg($file, $args = array()){
		$svg = new Svg($file, $args);
		$svg->render();
	}
}