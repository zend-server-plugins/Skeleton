<?php
/**
 * ZF2 controller file
 */
namespace ExampleZf2Module\Controller;

use ZendServer\Mvc\Controller\ActionController;

class IndexController extends ActionController
{
	public function IndexAction() {
		// For the example, create some dummy data
		$people = array(
			array('id' => '1', 'name' => 'Gregory', 'family' => 'Chris', 'bmonth' => 'August'),
			array('id' => '2', 'name' => 'Anya', 'family' => 'Suraski', 'bmonth' => 'May'),
			array('id' => '3', 'name' => 'Idan', 'family' => 'Gozlan', 'bmonth' => 'June'),
		);
		
		// pass the data to the view file
		return array(
			'people' => $people,
		);
	}
}
