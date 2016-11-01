<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8" />
	<title>Профессиональные услуги по созданию сайтов. Алексей Шебалов</title>
	<meta name="description" content="Профессиональные услуги по созданию сайтов" />
    <meta name="keywords" content="создание сайтов, веб-разработчик, разработка сайтов, заказать сайт, landing page" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	
	<!-- <link href="https://fonts.googleapis.com/css?family=Ruslan+Display" rel="stylesheet"> -->
	<link href="https://fonts.googleapis.com/css?family=Neucha" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/fonts.css" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/libs/fontello/css/fontello.css" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/libs/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/libs/magnific-popup/magnific-popup.css" />
	<!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/main.css" /> -->

	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/libs/jScrollPane/jquery.jscrollpane.css"/>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/media.css" />
	<script src="https://vk.com/js/api/openapi.js?133" type="text/javascript"></script>
</head>
<body>

<div class="container">
<header>
	<div class="col-md-2">
		<a href="/"><img class="img-responsive" src="<?php echo get_template_directory_uri();?>/img/logo_val.png" alt=""></a>
	</div>
	<div class="col-md-10 h-right">
		<div class="col-md-8  col-sm-8  reset_pad_lr">
			<!-- <h1>Валенки ручной работы</h1> -->
			<h1><?php echo get_option('blogname'); ?></h1>
			<p>интернет-магазин</p>
		</div>
		<div class="col-md-4 col-sm-4 phone-callback reset_pad_r">
			<!-- <span>+ 7 (999) 999-99-99</span> -->
			<span> <?php echo get_option('option_phone'); ?> </span>
			<a href="#call_me" class="popup-modal button add_to_cart_button"><i class="demo-icon icon-phone">&#xe800;</i> Позвоните мне</a>	
		</div>
	</div>
	<div class="separator"></div>
</header>
<?php if ( is_active_sidebar( 'header_right' ) ) : ?>
	<?php dynamic_sidebar( 'header_right' ); ?>
<?php endif; ?>
	<div id="call_me" class="white-popup-block mfp-hide">
		<h3>Позвоните мне</h3>
		<form action="">
			<div class="input-row"><label>Имя</label> <input type="text" name="name"></div>
			<div class="clearfix"></div>
			<div class="input-row"><label>Телефон </label><input type="text" name="phone"></div>
			<div class="wrap_send_call_me"><input type="submit" class="button" id="send_call_me" value="Отправить"></div>
		</form>
		<a class="popup-modal-dismiss" href="#">x</a>
	</div>
</div>


