<?php
	 /**
      * Basic class-map auto loader generated by install.php.
	  * Do not modify.
	  */
	 class PPAutoloader {
        private static $vendorDir = '';
        private static $map = array();

        public static function loadClass($class) {
			if ('\\' == $class[0]) {
				$class = substr($class, 1);
			}
			
			if (false !== $pos = strrpos($class, '\\')) {
				// namespaced class name
				$classPath = str_replace('\\', DIRECTORY_SEPARATOR, substr($class, 0, $pos)) . DIRECTORY_SEPARATOR;
				$className = substr($class, $pos + 1);
			} else {
				// PEAR-like class name
				$classPath = null;
				$className = $class;
			}
			
			$classPath .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
            foreach (self::$map as $prefix => $dirs) {
	        	if (0 === strpos($class, $prefix)) {
	        		foreach ($dirs as $dir) {
	        			if (file_exists($dir . DIRECTORY_SEPARATOR . $classPath)) {
	        				include $dir . DIRECTORY_SEPARATOR . $classPath;
                            return;
	        			}
	        		}
	        	}
	        }
    	}

		public static function register() {
            self::$vendorDir = dirname(__FILE__);
         	self::$map = array (
  'PayPal' => 
  array (
    0 => self::$vendorDir .'/vendor/paypal//paypal-sdk-core-php-811c13c/lib/',
  ),
  'PayPal\\CoreComponentTypes' => 
  array (
    0 => self::$vendorDir .'/vendor/paypal//paypal-merchant-sdk-php-251a6bd/lib/',
  ),
  'PayPal\\EBLBaseComponents' => 
  array (
    0 => self::$vendorDir .'/vendor/paypal//paypal-merchant-sdk-php-251a6bd/lib/',
  ),
  'PayPal\\EnhancedDataTypes' => 
  array (
    0 => self::$vendorDir .'/vendor/paypal//paypal-merchant-sdk-php-251a6bd/lib/',
  ),
  'PayPal\\PayPalAPI' => 
  array (
    0 => self::$vendorDir .'/vendor/paypal//paypal-merchant-sdk-php-251a6bd/lib/',
  ),
  'PayPal\\Service' => 
  array (
    0 => self::$vendorDir .'/vendor/paypal//paypal-merchant-sdk-php-251a6bd/lib/',
    1 => self::$vendorDir .'/vendor/paypal//paypal-permissions-sdk-php-eef386c/lib/',
  ),
  'PayPal\\Types' => 
  array (
    0 => self::$vendorDir .'/vendor/paypal//paypal-permissions-sdk-php-eef386c/lib/',
  ),
);
	        spl_autoload_register(array(__CLASS__, 'loadClass'), true);
    	}
}