<?php
/**
* Чистый Шаблон для разработки
* Шаблон хэдера
* @package WordPress
* @subpackage clean
*/
?>
<!DOCTYPE html>
<html lang="ru">
	
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta charset="UTF-8">

<!-- RSS, стиль и всякая фигня -->
<link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo('rdf_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="Comments RSS" href="<?php bloginfo('comments_rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">

	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
	<?php if (!is_front_page()) echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . get_template_directory_uri() . "/dop-style.css\"/>" ?>
 <!--[if lt IE 9]>
 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->
<title>
<?php // Генерируем тайтл в зависимости от контента с разделителем " - "
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
?>
</title>
<?php
	wp_head(); // Необходимо для работы плагинов и функционала wp
?>
</head>
	
<body class="noside <?php if (is_front_page()) echo 'home' ?>">

	<header class="header">
        <div class="container">
            <div class="header__pane">
                <div class="header__logo"><?php the_custom_logo()?></div>
                <div class="header__tel">
                    <img src="<?php echo get_template_directory_uri() . '/imeg/tel.png'?>" alt="tel">
                    <span>+7 967 592 09 02</span>
                </div>
                <button class="main-btn"><a href="https://artroom-gatchina.ru/#oz_appointment">Онлайн запись</a></button>
                <div class="hamburger">
                    <div class="hamburger__stick"></div>
                    <div class="hamburger__stick"></div>
                    <div class="hamburger__stick hamburger__stick_small"></div>
				    <?php
	                   $args = array( // Выводим верхнее меню
		              'theme_location'=>'top',
		              'container'=>'',
		              'depth'=> 0);
	                   wp_nav_menu($args);
		            ?>
                </div>
            </div>
        </div>
    </header>
 <?php if (is_front_page()) : ?>
 <div class="head-1">
	<div class="header-background"><img src="<?php echo get_template_directory_uri() . '/imeg/main-background.png' ?>" alt="background"></div>
	<div class="waveWrapper waveAnimation">
  		<div class="waveWrapperInner bgTop">
    		<div class="wave waveTop" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-top.png')"></div>
  		</div>
  		<div class="waveWrapperInner bgMiddle">
    		<div class="wave waveMiddle" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png')"></div>
  		</div>
		<div class="waveWrapperInner bgBottom">
    		<div class="wave waveBottom" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-bot.png')"></div>
  		</div>
	</div>
 </div>
 <?php endif; ?>
 <?php if (!is_front_page()):  ?>
 <div class="head-2">
	<div class="header-background-2"></div>
	<div class="waveWrapper waveAnimation">
  		<div class="waveWrapperInner bgTop">
    		<div class="wave waveTop" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-top.png')"></div>
  		</div>
  		<div class="waveWrapperInner bgMiddle">
    		<div class="wave waveMiddle" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png')"></div>
  		</div>
		<div class="waveWrapperInner bgBottom">
    		<div class="wave waveBottom" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-bot.png')"></div>
  		</div>
	</div>
 </div>	
 <?php endif; ?>
	
<!-- <header>


<div class="head">
<div class="waveWrapper waveAnimation">
  <div class="waveWrapperInner bgTop">
    <div class="wave waveTop" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-top.png')"></div>
  </div>
  <div class="waveWrapperInner bgMiddle">
    <div class="wave waveMiddle" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png')"></div>
  </div>
  <div class="waveWrapperInner bgBottom">
    <div class="wave waveBottom" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-bot.png')"></div>
  </div>
</div>

<div class="top">
	    <div class="top-1">
			<div class="head-logo-1"><a href="/" class="column"><img src="/wp-content/themes/SYMMETRY/imeg/logo.png" alt=""></a></div>
		    <div class="head-tel-2"><a href="+7 967 592 09 02">+7 967 592 09 02</a></div>
		    <div class="head-onlinezap-3"><a class="zap-text" href="#">Онлайн запись</a></div>
		    <?php
	        $args = array( // Выводим верхнее меню
		        'theme_location'=>'top',
		        'container'=>'',
		        'depth'=> 0);
	        wp_nav_menu($args);
		    ?>
	    </div>
	</div>
</div> -->
		
		<script></script>
		</header>