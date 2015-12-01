<?php
/**
 * This file is a standard Zend Framework 2 configuration file. All the components 
 * of your plugin like controllers, models, view helpers, routes, etc have to be 
 * described below
 */
return array(
	// define server side controllers
	'controllers' => array(
		'invokables' => array(
			/**
			 * define web API controller. Web API controller should have a version number
			 * in its "invokable" name and in the view folder. 
			 * format:
			 * 	<invokable name> => <controller class namespace>
			 */
			'exampleAngularModuleWebApi-1_12' => 'ExampleAngularModule\Controller\WebApiController',
		),
	),
	
	// define view helpers
	'view_helpers' => array(
		'invokables' => array(
			// view helpers are defined in the next way
			// 'myViewHelper' => 'ExampleAngularModule\View\Helper\MyViewHelper',
		)
	),
	
	// By default new controllers aren't accessible. Please define who may access 
	// the resource.
	'acl' => array(
		'route' => array(
			// key name has to be the same as the controller invokable name 
			// (skip the version number in the name for web API controllers names)
			'exampleAngularModuleWebApi' => array(
				// which roles are allowed to access the resource
				'role' => \Application\Module::ACL_ROLE_ADMINISTRATOR,
				// define specific controller actions, OR leave an empty array to allow all the actions
				'allowedMethods' => array(),
			),
		),
	),
	
	// define folder for the view files
	'view_manager' => array(
		'template_path_stack' => array(
			__DIR__ . '/../views',
		),
	),
	
	// define (ZF2 standard) services here
	'service_manager' => array(
	    'invokables' => array(
			// ..
	    ),
	),
	
	// Add an item to the main menu of the UI. 
	// The main menu definition is located at:
	// 	"<Zend Server Install Dir>/gui/config/autoload/navigation.global.config.php"
	// Find the right place in the main menu for your plugin, and add it in the same format.
	'navigation' => array(
		// the default menu (and currently the only one)
		'default' => array(
			// add the item under "performance" section ("Job Queue" in the main menu)
			'performance' => array(
				// add your item under "pages" - Your plugin item will be displayed as a sub menu
				'pages' => array(
					array(
						// Label - how it's going to be displayed in the menu
						'label' => 'Example Module',
						
						// This one is static - Don't change! 
						// All the plugins should have their "route" key set to "extensions"
						'route' => 'extensions',
						
						// define the URL of the page (Angular's URL)
						// With the following value the URL will look like:
						// http://localhost:10081/ZendServer/#!/example-module
						'url' => '/example-module',
						
						// define the template URL, where the HTML of the page will be located (Angular's template)
						// URL format:
						// 	/ZendServer/ModuleResource/<module name>/<path to the file in "public" folder" of the module>
						'templateUrl' => '/ZendServer/ModuleResource/ExampleAngularModule/templates/example-module.html',
						
						// define the name of the angular controller (on the client side)
						// This controller will be defined in a JavaScript file like:
						// zsApp.controller('exampleAngularModuleController', [..., function(...) {...}]);
						'angularController' => 'exampleAngularModuleController',
						
						// Define resources that will be loaded when the UI starts
						'resources' => array(
							// Defined javascript sources with all the angular's definitions
							'js' => array(
								// URL format:
								// 	/ZendServer/ModuleResource/<module name>/<path to the file in "public" folder" of the module>
								'/ZendServer/ModuleResource/ExampleAngularModule/example-module.js',
							),
							'css' => array(
								'/ZendServer/ModuleResource/ExampleAngularModule/example-module.css',
							),
						),
					),
				),
			),
		),
	),
	
	// Web APIs have to be defined in a separate config section. 
	// This section is a standard ZF2 routing settings.
	// http://framework.zend.com/manual/current/en/modules/zend.mvc.routing.html
	'webapi_routes' => array(
		// Give your routing a name
		'exampleAngularModuleData' => array(
			'type'	=> 'Zend\Mvc\Router\Http\Literal',
			'options' => array(
				// define a URL for the web API
				'route'	=> '/Api/exampleAngularModuleData',
				'defaults' => array(
					// define Controller/Action for the web API
					'controller' => 'exampleAngularModuleWebApi',
					'action'	 => 'exampleAngularModuleData',
					// define the version of the web API for this routing
					'versions'	 => array('1.12'),
				),
			),
		),
	),
);
