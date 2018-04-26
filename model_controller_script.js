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
    // the GET request will need to go here
    $scope.semesters = [
        {semester:'Fall',year:'2018',grade:4.0},
        {semester:'Spring',year:'2018',grade:3.3},
        {semester:'Summer',year:'2018',grade:3.7}
    ];
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

app.controller('TabController', function () {
        this.tab = 1;

        this.setTab = function (tabId) {
            this.tab = tabId;
        };

        this.isSet = function (tabId) {
            return this.tab === tabId;
        };
    });
