/** 
* Form Controller
* @author Marcus Jackson, <marcusj98@gmail.com>
* 
**/
define(['../app/app'], function(app) {
  var moment = require('moment-timezone');
  moment().format();
  app.filter('unique', function() {
    return function(collection, keyname) {
      var output = [],
      keys = [];
      
      angular.forEach(collection, function(field) {
        var key = field[keyname];
        if (keys.indexOf(key) === -1) {
          keys.push(key);
          output.push(field);
        }
      });
      return output;
    };
  });
  
  app.directive('phoneInput', function($filter, $browser) {
    return {
      require: 'ngModel',
      link: function($scope, $element, $attrs, ngModelCtrl) {
        var listener = function() {
          var value = $element.val().replace(/[^0-9]/g, '');
          $element.val($filter('tel')(value, false));
        };
        
        ngModelCtrl.$parsers.push(function(viewValue) {
          return viewValue.replace(/[^0-9]/g, '').slice(0, 10);
        });
        
        ngModelCtrl.$render = function() {
          $element.val($filter('tel')(ngModelCtrl.$viewValue, false));
        };
        
        $element.bind('change', listener);
        $element.bind('keydown', function(event) {
          var key = event.keyCode;
          if (key == 91 || (15 < key && key < 19) || (37 <= key && key <= 40)) {
            return;
          }
          $browser.defer(listener);
        });
        $element.bind('paste cut', function() {
          $browser.defer(listener);
        });
      }
    };
  });
  app.filter('tel', function() {
    return function(tel) {
      console.log(tel);
      if (!tel) {
        return '';
      }
      var value = tel.toString().trim().replace(/^\+/, '');
      if (value.match(/[^0-9]/)) {
        return tel;
      }
      var country, city, number;
      switch (value.length) {
        case 1:
        case 2:
        case 3:
        city = value;
        break;
        default:
        city = value.slice(0, 3);
        number = value.slice(3);
      }
      if (number) {
        if (number.length > 3) {
          number = number.slice(0, 3) + '-' + number.slice(3, 7);
        } else {
          number = number;
        }
        return ("(" + city + ") " + number).trim();
      } else {
        return "(" + city;
      }
    };
  });
  
  app.controller('MainCtrl', ['$scope', '$http', function($scope, $http) {
    // Google Autocomplete
    $scope.autocompleteOptions = {
      types: ['geocode', 'establishment'],
      componentRestrictions: { country: 'US' }
    };
    
    // Location values
    $scope.fields = [{
      location: {}
    }];
    $scope.stops = [{}];
    
    // Lead values
    $scope.viewModel = {};
    $scope.stopFields = true;
    
    $scope.pickUpFields = true;
    $scope.removeButton = false;
    $scope.addStops = function() {
      if ($scope.stops.length < 10) {
        $scope.stops.push({});
        $scope.removeButton = true;
      } else {
        return false;
      }
    };
    $scope.deleteStops = function(index) {
      $scope.stops.splice(-1, 1);
      if ($scope.stopFields.length < 2) {
        $scope.pickUpFields = true;
      } else {
        return false;
      }
    };
    $scope.fields = angular.extend($scope.stops);
    
    // Kendo Datepicker & Timepicker
    $scope.openPicker = function() { $scope.myPicker.open(); }
    $scope.timePicker = function() { $scope.myPicker2.open(); }
    
    var dateValue = new Date();
    var dateToString = moment.utc(dateValue, "MM/DD/YYYY hh:mma").add(1, 'days').format();
    
    $scope.dateTimePickerOptions = {
      format: "MM/dd/yyyy hh:mmtt",
      timeFormat: "hh:mmtt",
      parseFormats: [dateValue],
      min: dateValue,
      interval: 15
    };
    
    $scope.datePickerOptions = {
      format: "MM/dd/yyyy",
      parseFormats: [regularDateToString]
    };
    
    $scope.isActive = false;
    $scope.changeClass = function() { $scope.isActive = !$scope.isActive; }
    
    // Templating
    $scope.templates = [{
      title: "",
      url: ""
    }, {
      title: "",
      url: ""
    }];
    $scope.currentTemplate = "";
    $scope.isActiveTemplate = function(templateUrl) {
      return templateUrl == $scope.currentTemplate;
    };
    $scope.updateTemplate = function() {
      $scope.currentTemplate = "";
    };
    
    $scope.submitForm = function() {
      var theDate = new Date();
      var tzone = theDate.getTimezoneOffset();
      var btn = $('button.submit');
      var incoming = $('.incoming');
      var zone = moment.tz.guess();
      var locationData = angular.extend({}, $scope.fields.reverse());
      
      for (var stopData in locationData) {
        stopData = locationData[stopData];
      }
      var origincity = stopData[0]['location']['city'];
      var originstate = stopData[0]['location']['state'];
      
      angular.forEach(stopData, function(value, index) {
        var departDate = moment.parseZone(stopData[index]['depart_date'], "MM/DD/YYYY hh:mmaZ").format("LLL");
        stopData[index]['depart_date'] = departDate;
      });
      var endDate = angular.element("input#depart_date").val();
      var leadData = {
        passengers: $scope.viewModel.passengers,
        email: $scope.viewModel.email,
        first_name: $scope.viewModel.firstname,
        last_name: $scope.viewModel.lastname,
        phone: $scope.viewModel.phone,
        account_name:$scope.viewModel.firstname + $scope.viewModel.lastname,
        description: $scope.viewModel.itinerary,
        timezone: tzone,
        stops: stopData
      };
      
      $(btn).html('<i class="fa fa-spinner"></i>');
      $(btn).attr("disabled", true);
      $(incoming).html("<div class='prompting'><p>Please wait a few seconds while we process your itinerary.</p></div>");
      var theData = {
        data: leadData
      };
      var leads = JSON.stringify( theData, function( key, value ) {
        if( key === "$$hashKey" ) {
          return undefined;
        }
        return value;
      });
      $http({
        method: 'POST',
        url: '',
        data: { data: leads }
      }).then(function(data) {
        if (data.errors == true) {
          $(btn).attr('disabled', false).html("Get Your Quote");
          $(incoming).html("<div class='has-error' id='no-success' <span class='has-error' id='validated'>" + data.unsuccessful + "</span></div>");
        } else {
          console.log(JSON.stringify(data.successful));
          window.location = ""; // Success
        }
      });
      return false;
    };
  }]);
  return app;
});