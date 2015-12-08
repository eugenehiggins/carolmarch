jQuery(window).on("load", function() {
	"use strict";

});

jQuery(document).ready(function($) {
	"use strict";

	/* -----------------------------------------
	 Main Navigation Init
	 ----------------------------------------- */
	$('ul#navigation').superfish({
		delay:       300,
		animation:   { opacity:'show', height:'show' },
		speed:       'fast',
		dropShadows: false
	});

	/* -----------------------------------------
	 Responsive Menus Init with mmenu
	 ----------------------------------------- */
	$("#mobilemenu").mmenu();

	/* -----------------------------------------
	 Responsive Videos with fitVids.js
	 ----------------------------------------- */
	$("#main").fitVids();


});