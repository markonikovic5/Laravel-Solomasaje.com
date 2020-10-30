<?php if(is_active_sidebar( 'widget-footer-1' )
|| is_active_sidebar( 'widget-footer-2' )
|| is_active_sidebar( 'widget-footer-3' )
|| is_active_sidebar( 'widget-footer-4' )) : ?>

<div class="widget-area">
	<?php
	if ( is_active_sidebar( 'widget-footer-1' ) ) {
		dynamic_sidebar( 'widget-footer-1' );
	}

	if ( is_active_sidebar( 'widget-footer-2' ) ) {
		dynamic_sidebar( 'widget-footer-2' );
	}
	
	if ( is_active_sidebar( 'widget-footer-3' ) ) {
		dynamic_sidebar( 'widget-footer-3' );
	}

	if ( is_active_sidebar( 'widget-footer-4' ) ) {
		dynamic_sidebar( 'widget-footer-4' );
	} ?>
</div>

<?php endif; ?>
