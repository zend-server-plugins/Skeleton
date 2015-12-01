<?php
/**
 * This file is a standard Zend Framework 2 configuration file. All the components 
 * of your plugin like controllers, models, view helpers, routes, etc have to be 
 * described here
 */
return array(
	// define the controllers
	'controllers' => array(
		'invokables' => array(
			/**
			 * Define an invokable controller
			 * 	<invokable name> => <controller class namespace>
			 */
			'exampleZf2Module' => 'ExampleZf2Module\Controller\IndexController',
			
			/**
			 * define web API controller. Web API controller should have a version number
			 * in its "invokable" name and in the view folder. 
			 * format:
			 * 	<invokable name> => <controller class namespace>
			 */
			'exampleZf2ModuleWebApi-1_12' => 'ExampleZf2Module\Controller\WebApiController',
		),
	),
	
	// define view helpers
	'view_helpers' => array(
		'invokables' => array(
			// view helpers are defined in the next way
			// 'myViewHelper' => 'ExampleZf2Module\View\Helper\MyViewHelper',
		)
	),
	
	// By default new controllers aren't accessible. Please define who may access 
	// the resource.
	'acl' => array(
		'route' => array(
			// key name has to be the same as the controller invokable name 
			// define a controller ACL
			'exampleZf2Module' => array(
				// which roles are allowed to access the resource
				'role' => \Application\Module::ACL_ROLE_ADMINISTRATOR,
				// define specific controller actions, OR leave an empty array to allow all the actions
				'allowedMethods' => array(),
			),
			// (for web API controllers names skip the version number in the name )
			'exampleZf2ModuleWebApi' => array(
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
						'label' => 'Example Module #2',
						
						// This one is static - Don't change! 
						// All the plugins should have their "route" key set to "extensions"
						'route' => 'extensions',
						
						// define the controller and the action for that routing. The name of the controller has
						// to be the same as the controller name in the "controllers > invokables" from above.
						'controller' => 'exampleZf2Module',
						'action' => 'index',
						
						// define the order of this menu item.
						// the numbers are defined in the main navigation file (gui/config/autoload/navigation.global.config.php)
						'order' => 725,
						
						// define the icon that will appear in the menu. The class names are taken from the "glyphicons" set
						'class' => 'glyphicons white cargo no-menu-arrow',
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
		'exampleZf2ModuleData' => array(
			'type'	=> 'Zend\Mvc\Router\Http\Literal',
			'options' => array(
				// define a URL for the web API
				'route'	=> '/Api/exampleZf2ModuleData',
				'defaults' => array(
					// define Controller/Action for the web API
					'controller' => 'exampleZf2ModuleWebApi',
					'action'	 => 'exampleZf2ModuleData',
					// define the version of the web API for this routing
					'versions'	 => array('1.12'),
				),
			),
		),
	),
);
