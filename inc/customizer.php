<?php
/**
 * tsumugi Theme Customizer.
 *
 * @package tsumugi
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tsumugi_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
    'selector' => '.site-title a',
    'render_callback' => 'tsumugi_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
    'selector' => '.site-description',
    'render_callback' => 'tsumugi_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'tsumugi_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function tsumugi_customize_preview_js() {
	wp_enqueue_script( 'tsumugi_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'tsumugi_customize_preview_js' );
