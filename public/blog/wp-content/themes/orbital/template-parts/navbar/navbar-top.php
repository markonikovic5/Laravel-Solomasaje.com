

	<?php do_action('orbital_before_navbar'); ?>

	<header class="site-header<?php if ( orbital_customize_option('orbital_layout_menu_orbital')) echo ' with-header'; ?>">
		<div class="container">

			<?php if ( !get_header_image() ) : ?>

				<div class="site-logo">

					<?php
					if(has_custom_logo()){
						orbital_the_custom_logo();
					}else{ ?>
					<a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a>
					<?php }  ?>

				</div>

			<?php endif; ?>

			<?php if ( has_nav_menu( 'primary' ) ) : ?>

			<nav class="site-navbar site-navbar-right">
				<?php
				wp_nav_menu(array(
					'theme_location' => 'primary',
					'container' => false,
					'fallback_cb' => 'orbital_default_menu',
					'items_wrap' => '<ul>%3$s</ul>', )
				);
				?>
			</nav>
			<div class="site-trigger">
				<a class="site-nav-trigger">
					<span></span>
				</a>
			</div>

			<?php endif; ?>
		</div>
	</header>

	<?php do_action('orbital_after_navbar'); ?>


