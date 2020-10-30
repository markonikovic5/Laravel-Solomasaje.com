<?php
/**
 * The footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Orbital
 * @since 1.0
 */

do_action('orbital_before_footer');
?>

<footer class="site-footer">
	<div class="container">
		<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
		<?php get_template_part( 'template-parts/footer/footer', 'credits' ); ?>
	</div>
</footer>

<?php do_action('orbital_after_footer'); ?>

<!-- Site Overlay -->
<div class="site-overlay"></div>

<?php wp_footer(); ?>
</body>
</html>