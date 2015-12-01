(function() {
	// define an angular controller for the example page. 
	// Define the services - we are going to use web API and a popup modal
	// The name of the controller is the same name as in module.config.php file -
	// the "controller" key under the relevant "navigation" settings
	zsApp.controller('exampleZf2ModuleController', ['$scope', '$rootScope', 'WebAPI', 'ngDialog', function($scope, $rootScope, WebAPI, ngDialog) {
		
		$scope.people = [];
		
		/**
		 * Get person object
		 * @param int personId
		 * @return Object
		 */
		var getPersonData = function(personId) {
			var thePersonData = false;
			$scope.people.forEach(function(personData) {
				if (personData.id == personId) {
					thePersonData = personData;
				}
			});
			
			return thePersonData;
		};
		
		/**
		 * Define callback function for "info" button. The function opens a modal popup
		 * @param int personId
		 */
		$scope.viewPersonData = function(personId) {
			$scope.thePersonData = getPersonData(personId);
			ngDialog.open({
				template: '/ZendServer/ModuleResource/ExampleZf2Module/templates/person-data.html',
				scope: $scope,
				closeByEscape: true
			});
		};
		
		// Using the "WebAPI" factory to load data from the module's web API
		WebAPI({
			method: 'get',
			url: '/ZendServer/Api/exampleZf2ModuleData',
			//data: {},
		}).then(function(res) {
			// set the received data to the local "people" var in the $scope
			$scope.people = res.data.responseData.people;
		}, function() {
			// Some error occurred. Reset the "people" var
			$scope.people = [];
		}).finally(function() {
			// .. 
		});
		
	}]);
	
}());
