$(document).ready(function() {

    $("#owl-home-slider").owlCarousel({
 
	      navigation : true, // Show next and prev buttons
	      slideSpeed : 400,
	      paginationSpeed : 500,
	      singleItem:true,
	      navigationText:["",""],
	      autoPlay: true,

	      // "singleItem:true" is a shortcut for:
	      // items : 1, 
	      // itemsDesktop : false,
	      // itemsDesktopSmall : false,
	      // itemsTablet: false,
	      // itemsMobile : false
 
  	}); 

});