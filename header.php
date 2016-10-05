<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tsumugi
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tsumugi' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<nav id="site-navigation" class="main-navigation navbar navbar-light" role="navigation">
			<button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#primary-menu">
				&#9776;
			</button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'menu collapse navbar-toggleable-sm' ) ); ?>
		</nav><!-- #site-navigation -->

	<div class="container">

		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?><br class="hidden-md-up"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</h1>
			<?php else : ?>
				<p class="site-title"><?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><br class="hidden-md-up"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>

			<?php if ( get_header_image() ) : ?>
				<div class="custom-header">
					<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
				</div>
			<?php endif; // End header image check. ?>

		</div><!-- .site-branding -->

	</div><!-- .container -->

	</header><!-- #masthead -->

	<div class="container">

	<div id="content" class="site-content">
