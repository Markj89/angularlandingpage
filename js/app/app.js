/**
 * Web-app Controller
 * @author Marcus Jackson, <marcusj98@gmail.com>
**/
define([ 'jquery', 'angular', 'angularAMD', 'angular-route', 'ui.router', 'angularAnimate', 'autocomplete', 'kendo.all.min', 'moment', 'moment-timezone', 'angular-moment'], function($, angular, angularAMD, moment) {
  'use strict';
  var app = angular.module("MyApp", ["ngRoute", "ui.router", "vsGoogleAutocomplete",  "kendo.directives", "ngAnimate", "angularMoment"]);
  app.init = function() {
    angular.bootstrap(document, ["MyApp"]);
  };

  return app;
});
