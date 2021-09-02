<?php
/**
 * Чистый Шаблон для разработки
 * Шаблон хэдера
 * @package WordPress
 * @subpackage terehovenergo
 */
?>
<!DOCTYPE html>
<html <?php body_class(); ?> lang="ru">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- RSS, стиль и всякая фигня -->
<link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo('rdf_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="Comments RSS" href="<?php bloginfo('comments_rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.6.0.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/common.js"></script>
 <!--[if lt IE 9]>
 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->
<title>
<?php // Генерируем тайтл в зависимости от контента с разделителем " | "
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
<body class="<?php if (is_front_page() ) { ?>home<?php } ?>">
<header>
	<div class="container top-line">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
				<div class="top-line__menu">
					<div class="top-line__logo">
						<?php if (is_front_page() ) { ?>
							<span class="logo">
								<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="logo" class="img-fluid">
							</span>
						<?php } else { ?>
							<a href="<?php echo esc_url( home_url('/') ); ?>" class="logo">
								<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="logo" class="img-fluid">
							</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container menu-cont">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10 top-menu">
				<nav class="navbar navbar-expand-md navbar-light">
					<div class="container">
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						
						<div class="collapse navbar-collapse" id="main-menu">
							<?php
							wp_nav_menu(array(
								'theme_location' => 'top',
								'container' => false,
								'menu_class' => '',
								'fallback_cb' => '__return_false',
								'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
								'depth' => 2,
								'walker' => new bootstrap_5_wp_nav_menu_walker()
							));
							?>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>