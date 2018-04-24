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
  $scope.message = 'To create or add a new class to a semester simply slick add.To review or edit an existing semester please click edit If you are dine with the GPA monitor/forcaster just click logout (it is all pretty intuitive)';
});

app.controller('EditController', function($scope) {
  $scope.message = 'Hello from EditController';
});

app.controller('NewController', function($scope) {
  $scope.message = '';
});

app.controller('ClassController', function($scope) {
  $scope.message = 'make this work';
});

app.controller('GPAController', function($scope) {
  $scope.message = 'Well, Were getting there.';
});

app.controller('SemesterController', function($scope) {
  $scope.message = 'table needs populated from the DB';
});