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

  	// $(".h-cart arrow").toggle(function(){
			// $(".icon-up-open-mini").css("display","block");
			// // $(".icon-up-open-mini").css("display","none");
			// // $("i").css("display","none");
			// // $(this).css("display","block !important");
  	// 	},
  	// 	function(){
			// // $(".icon-down-open-mini").css("display","none");
			// // $(".icon-down-open-mini").css("display","none");
			// // $(this).css("display","block !important");
  	// 	});

$(".h-cart").click(function(){
	$(this).find(".arrow").toggleClass("icon-down-open-mini icon-up-open-mini");
	$(".widget_shopping_cart").toggleClass("mc-show");
}); 

});