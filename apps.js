var app = angular.module('myApp',[]);

app.controller('MainController', ['$scope', 'main', function($scope, main){
	main.success(function(data) {
		$scope.clients = data;
	  	$scope.sortType     = 'name'; // set the default sort type
		$scope.sortReverse  = false;  // set the default sort order
  		$scope.searchFish   = ''; 			 
			
		
	});

	}]);




app.factory('main', ['$http', function($http) {
	return $http.get('results.json')
		.success(function(data) {
			return data;
		})
		.error(function(err) {
			return err;
		});
	}]);






