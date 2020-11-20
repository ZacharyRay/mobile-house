<?php

if ( ! class_exists('Component') ) {
	class Component {
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
			if( locate_template('./components/' . $this->file . '.php') ){
				include( locate_template('./components/' . $this->file . '.php') );
			}
		}

		public function props($arr = false) {
			if($arr) {
				foreach($arr as $key => $prop) {
					if($prop['required'] && !array_key_exists($key, $this->args)) {
						throw new Exception('Property ' . $key . ' was expected, but none given');
						die;
					} 
					$type = gettype($this->args[$key]);
					if($this->args[$key] && $prop['type'] && strtolower($prop['type']) !== strtolower($type)) {
						throw new Exception('Property ' . $key . ' expected type ' . $prop['type'] . ', but found ' . ucfirst($type));
						die;
					}
					if($prop['default'] && !array_key_exists($key, $this->args)) {
						$this->args[$key] = $prop['default'];
					}			
				}
			}
		}
	}
}

if( ! function_exists('component') ) {
	function component($file, $args = array()){
		$component = new Component($file, $args);
		$component->render();
	}
}