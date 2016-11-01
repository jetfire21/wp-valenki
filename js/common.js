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

	// $(".h-cart").click(function(){
	// 	$(this).find(".arrow").toggleClass("icon-down-open-mini icon-up-open-mini");
	// 	$(".widget_shopping_cart").toggleClass("mc-show");
	// }); 


	$(".widget_shopping_cart").on("click",".h-cart",function(){
		$(this).find(".arrow").toggleClass("icon-down-open-mini icon-up-open-mini");
		$(this).parent().find(".minicart-content").toggleClass("mc-show");
	
	}); 


	if( $(window).width() < 480 ){
		 jQuery('.scroll-pane').jScrollPane({
		 	// horizontalGutter:40
		 });
	}

	$('.popup-modal').magnificPopup({
		type: 'inline',
		preloader: false,
		focus: '#username',
		modal: true
	});

	$(document).on('click', '.popup-modal-dismiss', function (e) {
		e.preventDefault();
		$.magnificPopup.close();
	});



	$('#send_call_me').click(function(e){
		e.preventDefault();
		var form_data = $('#call_me form').serialize();
		 $.ajax({
			  type: 'post',
			  url: '/wp-content/themes/valenki/mail.php',
			  data: form_data,
			  success: function(data){
			  	var data = JSON.parse(data);
				if(data.res == 'success') { 
					alert("Ваше сообщение успешно отправлено!"); 
					$("#call_me .woocommerce-error").remove();
					$.magnificPopup.close();
				}
				if(data.res == 'error_empty') {
					$("#call_me .woocommerce-error").remove();
					 // $("#call_me form").append("<p class='woocommerce-error'>Вы не заполнили какое-то поле!</p>");
					 $(".wrap_send_call_me").prepend("<p class='woocommerce-error'>Вы не заполнили какое-то поле!</p>");
				}
			  },
			  error:function(){
				alert("error");
			}
		});	
	});	




	// $(".add_to_cart_button").click(function(){
	// 	console.log(wc_add_to_cart_params.ajax_url);
	// 	// var ajax_url = 'http://big-wp-test/wp-admin/admin-ajax.php';
	// 	// console.log(ajax_url);
	// 	var data = {
	// 		'action': 'alex_minicart',
	// 		'umc': 1
	// 	};

	// 	$.ajax({
	// 	url:wc_add_to_cart_params.ajax_url, // обработчик
	// 	data:data, // данные
	// 	type:'POST', // тип запроса
	// 	success:function(data){
	// 		console.log("ajax yes!");
	// 		if( data ) { 
	// 			console.log(data);

	// 		} else {
	// 		}
	// 	},
	//     error: function(errorThrown){
 //          alert(errorThrown);
 //      	} 

	// 	 });

	// });


});