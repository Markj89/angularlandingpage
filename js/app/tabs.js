/**
 *
 *  Multi-Step Controller
 *  Author Marcus Jackson, <marcusj98@gmail.com>
 *
**/
define(['../app/app'], function(app) {
    //return $.noConflict( true );
    $(function() {

        // Form Steps-by-Step
        var form        = $('.registration-form'),
            firstStep   = $('.registration-form fieldset:first-child'),
            next        = $('.btn-next'),
            previous    = $('.btn-previous');

        // Icons
        var icon_one        = $('.form-tab i.fa'),
            //icon_two        = $('.form-tab i'),            
            //icon_three      = $('.form-tab i:nth-child(3)'),
            unchecked       = $('fa-circle-o'),
            checked         = $('fa-check-circle');

        var first_section = $('input[name="firstname"], input[name="lastname"], input[name="email"], input[name="phone"]');

        $(firstStep).fadeIn('slow');
        $(icon_one).addClass(unchecked);
        
        // First Tab
        $(first_section).on('focus', function() {
            $(this).removeClass('input-error');
        });
        
        // Next Step
        $(next).on('click', function() {
            var parent_fieldset = $(this).parents('fieldset'),
                next_step = true;

            parent_fieldset.find('input[name="firstname"], input[name="lastname"], input[name="email"], input[name="phone"]').each(function() {
                if( $(this).val() == "" ) {
                    $(this).addClass('input-error');

                    next_step = false;
                } else {
                    $(this).removeClass('input-error');
                }
            });
            if( next_step ) {
                parent_fieldset.fadeOut(400, function() {

                    $(this).next().fadeIn();
                });
            }
        });

        // Previous Step
        $(previous).on('click', function() {
        
            $(this).parents('fieldset').fadeOut( 400, function() {
        
                $(this).prev().fadeIn();
        
            });
        
        });

        // Submit
        $(form).on('submit', function(e) {      
        
            $(this).find('input[name="firstname"], input[name="lastname"], input[name="email"], input[name="phone"], input[name="autocomplete"],  input[name="destination"], input[name="arrival_date"], input[name="depart_date"], inpute[name="passengers"], textarea').each(function() {
        
                if( $(this).val() == "" ) {
        
                    e.preventDefault();
                    $(this).addClass('input-error');
        
                } else {
        
                    $(this).removeClass('input-error');
        
                }
            });

        });

    });
    return app;
});