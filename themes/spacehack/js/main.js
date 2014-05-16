$=jQuery.noConflict();

$(document).ready(function() {


	spacehack.nav_layout_fix();
    spacehack.behaviors();
});

var spacehack = {

    behaviors: function () {
     	$('.nav li').click(function() {

	     	$('.nav li').each(function() {
	     		$(this).removeClass('selected');
	     	});
     		$(this).addClass('selected');
     	});

     	// run nav_layout_fix on browser zoom changes
     	$(window).resize(function() {
     		spacehack.nav_layout_fix();
     	});

    },


    /**
    	this is a hack for webkit which shows strange borders around white things if there is an element behind that is black
    	it decides how wide the black bar in the nav menu should be and resizes it, and changes the background of the container
    	div from black to white to avoid the lines. (without this it looks fine everywhere but mobile safari)
    	this also helps to adjust the menu on browser zoom level changes
    **/

    nav_layout_fix: function() {
    	if ( $.browser.msie) return;
    	nav_width = $('.header .nav').width();
    	buttons_list_width = $('.header div.nav ul ').outerWidth();
    	black_bar_width = nav_width-buttons_list_width-1;
    	$('.header .nav div').width(black_bar_width).show();
    	$('.header .nav').css('background-color', 'white');
    }


}