// Modual decleration
var app = angular.module('GPAapp', ['ngRoute']);

// route configuration
app.config(function($routeProvider) {
  $routeProvider

  .when('/', {
    templateUrl : './views/main.php',
    controller  : 'MainController'
  })

  .when('/edit', {
    templateUrl : './views/edit.php',
    controller  : 'EditController'
  })

  .when('/new', {
    templateUrl : './views/new.php',
    controller  : 'NewController'
  })

  .when('/editClass', {
    templateUrl : './views/editClass.php',
    controller  : 'ClassController'
  })

  .when('/editGPA', {
    templateUrl : './views/editGPA.php',
    controller  : 'GPAController'
  })

    .when('/viewSemester', {
    templateUrl : './views/viewSemester.php',
    controller  : 'SemesterController'
  })

  .otherwise({redirectTo: '/'});
});


// Controllers
app.controller('MainController', function($scope) {
  $scope.message = '';
});

app.controller('EditController', function($scope) {
  $scope.message = '';
});

app.controller('NewController', function($scope) {
  $scope.message = '';
});

app.controller('ClassController', function($scope) {
  $scope.message = '';
});

app.controller('GPAController', function($scope) {
  $scope.message = '';
});

app.controller('SemesterController', function($scope) {
  $scope.message = '';
});
