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

app.controller('EditController', function($scope, $http) {
    // test JSON data, this is the format that the data from the DB needs to be in
    $scope.semesters = [
        {'semester':'Fall','year':'2018','grade':4.0},
        {'semester':'Spring','year':'2018','grade':3.3},
        {'semester':'Summer','year':'2018','grade':3.7}
    ];
    // from: https://www.w3schools.com/angular/angular_sql.asp
    // the get request should be able to get JSON data from the file and then load into the view, when it works. currently just displays the error message
    
//    $http.get("semesterData.php")
//    .then(function(response) {
//        //first function handles success
//        $scope.semesters = response.data.records;
//        $scope.message = 'success';
//        $scope.statuscode = response.status;
//        $scope.statustext = response.statusText;
//    }, function(response) {
//        //second function handles error
//        $scope.message = 'error';
//
//    });

  //$scope.message = '';
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

angular.module('GPAapp')
.directive('bsActiveLink', ['$location', function ($location) {
return {
    restrict: 'A', //use as attribute 
    replace: false,
    link: function (scope, elem) {
        //after the route has changed
        scope.$on("$routeChangeSuccess", function () {
            var hrefs = ['/#' + $location.path(),
                         '#' + $location.path(), //html5: false
                         $location.path()]; //html5: true
            angular.forEach(elem.find('a'), function (a) {
                a = angular.element(a);
                if (-1 !== hrefs.indexOf(a.attr('href'))) {
                    a.parent().addClass('active');
                } else {
                    a.parent().removeClass('active');   
                };
            });     
        });
    }
}
}]);
