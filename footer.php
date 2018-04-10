<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tsumugi
 */

?>

	</div><!-- #content -->

	</div><!-- .container -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'tsumugi' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'tsumugi' ), 'WordPress' ); ?></a>
			<span class="sep d-none d-md-inline"> | </span><br class="d-md-none">
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'tsumugi' ), '<a href="http://littlebirdjp.github.io/tsumugi/">tsumugi</a>', '<a href="http://littlebird.mobi/" rel="designer">youthkee</a>' ); ?>
		</div><!-- .site-info -->
	</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
