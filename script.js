var app = angular.module('GPAapp', ['ngRoute']);

app.config(function($routeProvider) {
  $routeProvider

  .when('/', {
    templateUrl : 'pages/main.html',
    controller  : 'MainController',
  })

  .when('/edit', {
    templateUrl : 'pages/edit.html',
    controller  : 'EditController'
  })

  .when('/new', {
    templateUrl : 'pages/new.html',
    controller  : 'NewController'
  })

  .when('/editClass', {
    templateUrl : 'pages/editClass.html',
    controller  : 'ClassController',
  })

  .when('/editGPA', {
    templateUrl : 'pages/editGPA.html',
    controller  : 'GPAController',
  })

    .when('/viewSemester', {
    templateUrl : 'pages/viewSemester.html',
    controller  : 'SemesterController',
  })

  .otherwise({redirectTo: '/'});
});

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