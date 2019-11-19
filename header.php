<?php
/**
 * Header template
 *
 * @package hygiea
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body>
    
<body <?php body_class(); ?>>
	<header>
		<div class="header-content">
			<div id="mobile-menu-button">|||</div>
			<div class="title">
				<h1 class="site-title"><?php bloginfo( 'title' ); ?></h1>
				<p class="site-description"><?php bloginfo( 'description' ); ?></p>
			</div>
			<div id="header-nav">
				<div><?php echo ( has_custom_logo() ) ? get_custom_logo() : null; ?></div>
				<nav>Home About Contacts</nav>
			</div>
		</div>
	</header>
	
