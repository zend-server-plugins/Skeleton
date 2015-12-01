<?php
/**
 * Web API controller
 */
namespace ExampleZf2Module\Controller;

use ZendServer\Mvc\Controller\WebAPIActionController;

// The Web API controller should extend Zend Server's base controller
class WebApiController extends WebAPIActionController
{
	// implement the action defined in the config file
	public function exampleZf2ModuleDataAction() {
		// For the example use some dummy data
		$people = array(
			array('id' => '1', 'name' => 'Gregory', 'family' => 'Chris', 'bmonth' => 'August'),
			array('id' => '2', 'name' => 'Anya', 'family' => 'Suraski', 'bmonth' => 'May'),
			array('id' => '3', 'name' => 'Idan', 'family' => 'Gozlan', 'bmonth' => 'June'),
		);
		
		// pass the data to the view
		return array(
			'people' => $people,
			'total' => count($people),
		);
	}
	
}
