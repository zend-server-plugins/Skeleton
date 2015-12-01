<?php
/**
 * Example Module's entry point (standard ZF2 Module.php)
 * The namespace should be the same as the module's folder name
 */
namespace ExampleAngularModule;

use Zend\Mvc\MvcEvent;

class Module {
	
	/**
	 * @brief The entry point of the module
	 * @param \MvcEvent $e  
	 */
	public function onBootstrap(MvcEvent $e) {
		// ..
	}
	
	/**
	 * @brief Tell the autoloader where to look for module's source files
	 * @return array
	 */
	public function getAutoloaderConfig() {
		return array(
			'Zend\Loader\StandardAutoloader' => array(
				'namespaces' => array(
					__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
				),
			),
		);
	}
	
	/**
	 * @brief Return module's configuration. For convenience, the configuration is defined 
	 * 	in module.config.php file under "config" folder
	 * @return array
	 */
	public function getConfig() {
		return include __DIR__ . '/config/module.config.php';
	}
	
}
