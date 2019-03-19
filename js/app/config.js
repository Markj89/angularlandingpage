require.config({
    baseUrl         : '',
    waitSeconds     : 30,
    paths: {
        //jQuery
        'jquery'            : ['//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min'],
        'jquery-migrate'    : ['//code.jquery.com/jquery-migrate-1.2.1.min'],
        'jquery-latest'     : ['//code.jquery.com/jquery-latest.min'],
        'jquery-ui'         : ['//code.jquery.com/ui/1.10.2/jquery-ui'],
        'domReady'          : '../lib/domReady',

        // Angular
        'angular': [ 
            '//ajax.googleapis.com/ajax/libs/angularjs/1.3.12/angular.min',
            '../lib/angular.min'
        ],
        'angular-route': [
            '//ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular-route',
            '../lib/angular-route.min'
        ],
        'ui.router'         : ['//angular-ui.github.io/ui-router/release/angular-ui-router'],
        'angularAMD'        : '../lib/angularAMD',
        'angularAnimate'    : ['//code.angularjs.org/1.5.6/angular-animate.min'],
        'autocomplete'      : '../lib/autocomplete.min',

        // Moment
        'moment'            : '../lib/moment.min',
        'moment-timezone'   : '../lib/moment-timezone',
        'angular-moment'    : '../lib/angular-moment.min',

        // Kendo.UI
        'kendo.all.min': [
            '//kendo.cdn.telerik.com/2016.3.1118/js/kendo.all.min',
            '../lib/kendo.all.min'
        ],
    },
    shim: {
        'jquery'        : { exports: '$' },
        'jquery-migrate': { deps: ["jquery"] },
        'jquery-basic'  : { deps: ["jquery"] },
        'jquery-ui'     : { deps: ["jquery"] },
        'angular': {
            deps: ["jquery"],
            exports: 'angular' 
        },
        'angularAMD'        : { deps: ['angular'] },
        'angular-route'     : { deps: ['angular'] },
        'ui.router'         : { deps: ['angular'] },
        'angularAnimate'    : { deps: ['angular'] },
        'autocomplete'      : { deps: ['angular'] },
        'moment'            : { deps: ['angular'] },
        'moment-timezone'   : { deps: ['angular'] },
        'angular-moment'    : { deps: ['angular'] },
        'kendo.all.min'     : { deps: ['angular'] },
    },
    deps: ['../app/app']
});

require([
    "../app/app",
    "../app/tabs",
    "../app/controller"
  ], function(app) {
    app.init();
});

/*require.optimize(config, function(buildResponse) {
    var contents = fs.readFileSync(config.out, 'utf8');
}, function(err) {
    return false;
});

require.onError = function(err) {
    console.log(err.requireType);
    if (err.requireType === 'timeout') {
        console.log('modules: ' + err.requireModules);
    }
    throw err;
};*/