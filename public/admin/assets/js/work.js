$(document).ready(function () {

    'use strict';

    $('.confirm').click(function () {
       return confirm('Are You Sure Delete Item?');
    });


    $('.confirm_accept').click(function () {
       return confirm('Are You Sure Accept Item?');
    });


    /*=====================================
     Start Slider Control
     =====================================*/

    $(".owl-buttons .owl-prev").append("<i class='fa fa-angle-left'></i>")
    $(".owl-buttons .owl-next").append("<i class='fa fa-angle-right'></i>")

    /*=====================================
     End  Slider Control
     =====================================*/




    /*======================================
    Start Active Project
    /*====================================*/

    $(".view_projects .project").on('click', function () {
        $(".view_projects .project").removeClass('active');
        $(this).addClass('active');
    });


    $(".view_types .project").on('click', function () {
        $(".view_types .project").removeClass('active');
        $(this).addClass('active');
    });

    $(".view_categories .project").on('click', function () {
        $(".view_categories .project").removeClass('active');
        $(this).addClass('active');
    });

    /*======================================
    End Active Project
    /*====================================*/


    $(".projects_get .f_edit_project .form-body, .projects_get .f_edit_types .form-body, .projects_get .f_edit_categories .form-body").each(function(){
        $(this).find(':input, select, textarea').prop("disabled", true);
    });

});