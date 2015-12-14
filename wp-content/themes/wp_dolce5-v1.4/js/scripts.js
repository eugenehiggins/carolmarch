jQuery(document).ready(function($)
{
	// Drop Down Navigation
	$("ul.sf-menu").supersubs(
	{
		minWidth:    12,
		maxWidth:    27,
		extraWidth:  1
	}).superfish(
	{
		delay: 500,
		animation: {opacity:'show'},
		speed: 'fast',
		autoArrows: true,
		dropShadows: false
	});


	$(".ci-gallery li").hover(
		function (){
			var o = $(this).find('.overlay');
			var img = $(this).find('img');
			o.fadeIn('fast');
			img.fadeTo('fast', 0.4);
		},
		function (){
			$(this).find('.overlay').fadeOut('fast');
			$(this).find('img').fadeTo('fast', 1);
		}
	);

	$(".img-wrap").hover(
		function ()
		{
			var o = $(this).find('.overlay');
			var img = $(this).find('img');
			o.fadeIn('fast');
			img.fadeTo('fast', 0.4);
		},
		function ()
		{
			$(this).find('.overlay').fadeOut('fast');
			$(this).find('img').fadeTo('fast', 1);
		});



	// Create the dropdown base
    $("<select class='alt-nav' />").appendTo(".navigation");

    // Create default option "Go to..."
    $("<option />", {
    "selected": "selected",
    "value"   : "",
    "text"    : "Go to..."
    }).appendTo(".navigation select");

    // Populate dropdown with menu items
    $(".navigation a").each(function()
    {
        var el = $(this);
        $("<option />", {
            "value"   : el.attr("href"),
            "text"    : el.text()
        }).appendTo("nav select");
    });

    $(".navigation select").change(function()
    {
        window.location = $(this).find("option:selected").val();
    });


	$('body').fitVids();

	// Flexslider

	$('.banner').flexslider({
			'controlNav': false,
			'animation': ThemeOption.slider_effect,
			'direction': ThemeOption.slider_direction,
			'slideshow': Boolean(ThemeOption.slider_autoslide),
			'slideshowSpeed': Number(ThemeOption.slider_speed),
			'animationSpeed': Number(ThemeOption.slider_duration)
	});

	// Flexslider - Gallery
	$('.ci-gallery').flexslider(
		{
			'directionNav': false,
			'animation': ThemeOption.internal_slider_effect,
			'direction': ThemeOption.internal_slider_direction,
			'slideshow': Boolean(ThemeOption.internal_slider_autoslide),
			'slideshowSpeed': Number(ThemeOption.internal_slider_speed),
			'animationSpeed': Number(ThemeOption.internal_slider_duration)
		});
});