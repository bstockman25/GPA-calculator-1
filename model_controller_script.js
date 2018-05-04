// Modual decleration
var app = angular.module('GPAapp', ['ngRoute'], function($httpProvider) {
    /*
        This code is a workaround to force angular to POST data in a format that PHP can read. This code is from:
        http://victorblog.com/2012/12/20/make-angularjs-http-service-behave-like-jquery-ajax/
    */
  // Use x-www-form-urlencoded Content-Type
  $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';

  /**
   * The workhorse; converts an object to x-www-form-urlencoded serialization.
   * @param {Object} obj
   * @return {String}
   */ 
  var param = function(obj) {
    var query = '', name, value, fullSubName, subName, subValue, innerObj, i;
      
    for(name in obj) {
      value = obj[name];
        
      if(value instanceof Array) {
        for(i=0; i<value.length; ++i) {
          subValue = value[i];
          fullSubName = name + '[' + i + ']';
          innerObj = {};
          innerObj[fullSubName] = subValue;
          query += param(innerObj) + '&';
        }
      }
      else if(value instanceof Object) {
        for(subName in value) {
          subValue = value[subName];
          fullSubName = name + '[' + subName + ']';
          innerObj = {};
          innerObj[fullSubName] = subValue;
          query += param(innerObj) + '&';
        }
      }
      else if(value !== undefined && value !== null)
        query += encodeURIComponent(name) + '=' + encodeURIComponent(value) + '&';
    }
      
    return query.length ? query.substr(0, query.length - 1) : query;
  };

  // Override $http service's default transformRequest
  $httpProvider.defaults.transformRequest = [function(data) {
    return angular.isObject(data) && String(data) !== '[object File]' ? param(data) : data;
  }];
});
    /* End of POST workaround */

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

app.controller('EditController', function($scope, $http, editData) {
    $http.get("api/semesterData.php")
    .then(function (response) {$scope.semesters = response.data.records;});
    // test
    this.sendSemester = function(data){
        
    };

    
});

app.controller('NewController', function($scope, $http, $location) {
    $scope.cName = null;
    $scope.Semester = null;
    $scope.cYear = null;
    $scope.cCredits = null;
    $scope.postData = function (cName, Semester, cYear, cCredits){
    var TestData = {
        name: cName,
        semester: Semester,
        year: cYear,
        credits: cCredits
    };
    $http.post('api/testPost.php', TestData).then(function (response) {
        if (response.data)
        // handles success:
        $scope.message = "Post Data Submitted Successfully";
        $location.path("/");
    }, function (response) {
        // handles failure:
        $scope.message = "Post didn't work.";
        $scope.statusval = response.status;
    });
    };
  
    

});

app.controller('ClassController', function($scope, editData) {
    var ctr = $scope;
    ctr.Name = editData.cName;
    ctr.Semester = editData.Semester;
    ctr.cYear = editData.cYear;
    ctr.cCredits = editData.cCredits;
    
  $scope.message = '';
});

app.controller('GPAController', function($scope) {
  $scope.message = '';
});

app.controller('SemesterController', function($scope) {
  $scope.message = '';
});

app.service('editData', function(){
    this.cName = 'testest';
    this.Semester = 'Interim';
    this.cYear = '2018';
    this.cCredits = '5';
})

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
              //case for having edit highlighted when in lower pages
                a.parent().addClass('active');
            } else {
              a.parent().removeClass('active');
          };
        });
      });
    }
  }
}]);
